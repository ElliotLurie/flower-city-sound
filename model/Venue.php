<?php
include("../assets/DB.php");
class Venue {
    private $conn;

    public function __construct(){
        $db = new DB();
        $this->conn = $db->getConn();
    }

    // not sure if this will be needed rn
    function getVenue($id){
        $query = $this->conn->prepare ("SELECT Page.id, Page.blurb, Page.external_links, Page.last_modified, Page.sources, Page.thumbnail, Page.title, Venue.address, Venue.hours, Venue.open, Venue.year FROM Venue JOIN Page USING (id) WHERE id = :id");
        $query->bindParam (":id", $id);
        $query->execute();
        $venue = $query->fetch();
        return $venue;
    }

    function getVenues($status = -1, $decade = null, $order = null){ 
        $queryString = "SELECT Page.id, Page.blurb, Page.last_modified, Page.thumbnail, Page.title, Venue.address, Venue.hours FROM Venue JOIN Page USING (id)";

        if ($status != -1 || $decade != null){
            $queryString .= " WHERE ";
            $prev = false;

            if ($status != -1){
                $queryString .= "open = $status";
                $prev = true;
            }

            if ($decade != null){
                if ($prev) $queryString .= " AND ";
              
                if ($decade == "pre19") $queryString .= "year < 1900";
                else $queryString .= "year >= $decade AND year <= $decade + 10";
            }
        }

        $rows = array();
        $query = $this->conn->query ($queryString);
        while ($row = $query->fetch()){
            $rows[]=$row;
        }
        return $rows;
    }
}
