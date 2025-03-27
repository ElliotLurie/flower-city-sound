<?php
include("../assets/DB.php");

class Artist{
    private $conn;

    public function __construct(){
        $db = new DB();
        $this->conn = $db->getConn();
    }

    function getArtist ($id){
        $query = $this->conn->prepare ("SELECT Page.id, Page.blurb, Page.external_links, Page.last_modified, Page.sources, Page.thumbnail, Page.title, Artist.genres, Artist.publishers FROM Artist JOIN Page USING (id) WHERE id = :id");
        $query->bind_param (":id", $id);
        return $query->execute ()->fetch();
    }

    function getArtists($group = -1, $genre = null, $activity = -1, $decade = null, $order = null){
        $queryString = "SELECT Page.id, Page.blurb, Page.external_links, Page.last_modified, Page.sources, Page.thumbnail, Page.title, Artist.genres, Artist.publishers FROM Artist JOIN Page USING (id)";

        if ($group != -1) {
            $GROUP_STRING = "JOIN MemberOfGroup ON (Page.id=MemberOfGroup.group_id)";
            $INDIE_STRING = "JOIN MemberOfGroup ON (Page.id=MemberOfGroup.member_id)";

            $queryString .= " " . $group == 1 ? $GROUP_STRING : $INDIE_STRING;
        }

        if ($genre != null || $activity != -1 || $decade != null) {
            $prev = false;
            $queryString .= " WHERE ";

            if ($genre != null) {
                $queryString .= "genres LIKE %$genre%";
                $prev = true;
            }

            if ($activity != -1) {
                if ($prev) $queryString .= " AND ";
                $queryString .= "active = $activity";
                $prev = true;
            }
            
            if ($decade != null) {
                if ($prev) $queryString .= " AND ";

                if ($decade == "pre19") $queryString .= "year < 1900";
                else $queryString .= "year >= $decade AND year <= $decade + 10";
            }
        }

        $rows = array();

        $query = $this->conn->query ($queryString);

        while ($row = $query->fetch())
            $rows[]=$row;

        return $rows;
    }

    // get all individual artists -- for display in view
    function getAllIndividual(){
        $rows = array();
        $query = $this->conn->query ("SELECT Page.id, Page.blurb, Page.last_modified, Page.thumbnail, Page.title FROM Artist JOIN Page USING (id) LEFT JOIN MemberOfGroup ON (Page.id=MemberOfGroup.member_id)");

        while ($row = $query->fetch())
            $rows[]=$row;

        return $rows;
    }

    // get all bands -- for display in view
    function getAllGroup(){
        $rows = array ();
        $query = $this->conn->query ("SELECT Page.id, Page.blurb, Page.last_modified, Page.thumbnail, Page.title, FROM Artist JOIN Page USING (id) JOIN MemberOfGroup ON (Page.id=MemberOfGroup.group_id)");

        while ($row = $query->fetch ())
            $rows[]=$row;

        return $rows;
    }

    // filter artists (genre, activity status, decade)
    function filter(){
      
    }
}
