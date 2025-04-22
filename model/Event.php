<?php
include_once("../assets/DB.php");

class Event{
    private $conn;

    public function __construct(){
        $db = new DB();
        $this->conn = $db->getConn();
    }

    function getEvent($id){
        $query = $this->conn->prepare("SELECT * FROM Event JOIN Page USING (id) WHERE id = :id");
        $query->bindParam (":id", $id);
        $query->execute();
        $artist = $query->fetch();
        return $artist;
    }

    function getRecent($count = null){
        $queryString = "SELECT * FROM Event JOIN Page USING (id) ORDER BY date_start";
        
        if ($count != null)
            $queryString .= " LIMIT $count";

        $query = $this->conn->prepare($queryString);
        $query->execute();

        $rows = array();
        while ($row = $query->fetch())
            $rows[]=$row;

        return $rows;
    }
}
