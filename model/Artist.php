<?php
include_once("../assets/DB.php");

class Artist{
    private $conn;

    public function __construct(){
        $db = new DB();
        $this->conn = $db->getConn();
    }

    function getArtist($id){
        $query = $this->conn->prepare("SELECT Page.id, Page.body, Page.external_links, Page.last_modified, Page.sources, Page.thumbnail, Page.title, Artist.genres, Artist.labels, Artist.publishers, Artist.types, Artist.year_disbanded, Artist.year_founded FROM Artist JOIN Page USING (id) WHERE id = :id");
        $query->bindParam (":id", $id);
        $query->execute();
        $artist = $query->fetch();
        return $artist;
    }

    function getArtists($group = -1, $genre = null, $activity = -1, $decade = null, $order = null){
        $queryString = "SELECT Page.id, Page.last_modified, Page.thumbnail, Page.title, Artist.genres FROM Artist JOIN Page USING (id)";

        if ($group != -1) {
            $GROUP_STRING = "JOIN MemberOfGroup ON (Page.id=MemberOfGroup.group_id)";
            $INDIE_STRING = "JOIN MemberOfGroup ON (Page.id=MemberOfGroup.member_id)";

            $queryString .= " " . $group == 1 ? $GROUP_STRING : $INDIE_STRING;
        }

        if ($genre != null || $activity != -1 || $decade != null) {
            $prev = false;
            $queryString .= " WHERE ";

            if ($genre != null) {
                $queryString .= "genres LIKE '%$genre%'";
                $prev = true;
            }

            if ($activity != -1) {
                if ($prev) $queryString .= " AND ";
                $queryString .= "year_disbanded IS ";

                if ($activity == 0) $queryString .= "NOT ";
                $queryString .= "NULL";
                $prev = true;
            }
            
            if ($decade != null) {
                if ($prev) $queryString .= " AND ";

                if ($decade == "pre50") $queryString .= "year_disbanded IS NOT NULL AND year_disbanded < 1950";
                else $queryString .= "(year_disbanded >= $decade OR year_disbanded IS NULL) AND year_founded <= $decade";

            }
        }

        if ($order != null){
            $queryString .= " ORDER BY " . str_replace("-", "_",$order);
        }

        $rows = array();
        $query = null;

        try{
            $query = $this->conn->query ($queryString);
        } catch (PDOException $pe){
            die("Failed to load database with $queryString:\n" . $pe->getMessage());
        }

        while ($row = $query->fetch())
            $rows[]=$row;

        return $rows;
    }


    function getRandom($count){
        $query = $this->conn->prepare("SELECT * FROM Artist JOIN Page USING (id) ORDER BY random() LIMIT $count");
        $query->execute();

        $rows = array();
        while ($row = $query->fetch())
            $rows[]=$row;

        return $rows;
    }
}
