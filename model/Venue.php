<?php
include_once("../assets/DB.php");

class Venue {
    private $conn;

    public function __construct(){
        $db = new DB();
        $this->conn = $db->getConn();
    }

    // not sure if this will be needed rn
    function getVenue($id){
        $query = $this->conn->prepare ("SELECT Page.id, Page.body, Page.external_links, Page.last_modified, Page.sources, Page.thumbnail, Page.title, Venue.access_features, Venue.address, Venue.age, Venue.contact, Venue.food, Venue.genres, Venue.hours, Venue.stage_size, Venue.space_type, Venue.year_closed, Venue.year_opened FROM Venue JOIN Page USING (id) WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $venue = $query->fetch();
        return $venue;
    }

    function getVenues($status = -1, $decade = null, $order = null){ 
        $queryString = "SELECT Page.id, Page.last_modified, Page.thumbnail, Page.title, Venue.address FROM Venue JOIN Page USING (id)";

        if ($status != -1 || $decade != null){
            $queryString .= " WHERE ";
            $prev = false;

            if ($status != -1) {
                if ($prev) $queryString .= " AND ";
                $queryString .= "year_closed IS ";

                if ($status == 0) $queryString .= "NOT ";
                $queryString .= "NULL";
                $prev = true;
            }

            if ($decade != null){
                if ($prev) $queryString .= " AND ";


                if ($decade == "pre50") $queryString .= "year_closed IS NOT NULL AND year_closed < 1950";
                else $queryString .= "(year_closed >= $decade OR year_closed IS NULL) AND year_opened <= $decade";

            }
        }

        if ($order != null){
            $queryString .= " ORDER BY " . str_replace("-", "_", $order);
        }

        $rows = array();
        $query = null;

        try{
            $query = $this->conn->query ($queryString);
        } catch (PDOException $pe){
            die("Failed to load database with $queryString:\n" . $pe->getMessage());
        }
        while ($row = $query->fetch()){
            $rows[]=$row;
        }
        return $rows;
    }
}
