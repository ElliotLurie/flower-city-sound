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
      $query = $this->conn->prepare ("SELECT Page.id, Page.blurb, Page.external_links, Page.last_modified, Page.sources, Page.thumbnail, Page.title, Venue.address, Venue.hours FROM Venue JOIN Page USING (id) WHERE id = :id");
        $query->bind_param (":id", $id);
        return $query->execute ()->fetch();
    }

    // get all venues
    function getAll(){
        $rows = array();
        $query = $this->conn->query ("SELECT Page.id, Page.blurb, Page.last_modified, Page.thumbnail, Page.title, Venue.address, Venue.hours FROM Venue JOIN Page USING (id) ");
        while ($row = $query->fetch()){
            $rows[]=$row;
        }
        return $rows;
    }

    // filter venues (decade, ?, ?)
    function filter(){

    }

}
