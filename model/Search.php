<?php
include "../assets/DB.php";
class Search {
    private $conn;   

    public function __construct(){
        $db = new DB();
        $this->conn = $db->getConn();
    }

    function getPageType($id){
        $page_type = "";

        foreach (["Artist", "Venue"] as $table){
            $query = $this->conn->query("SELECT id FROM $table WHERE id=$id");
            $query->execute();
            if ($query->fetch()){
                $page_type = $table;
                break;
            }
        }

        return strtolower($page_type);
    }

    // search through DB
    function search($filter, $type, $sort){
        $queryString = "SELECT id, title FROM Page";

        if ($type != "")
          $queryString .= " JOIN " . ucfirst($type) . " USING (id)";

        $queryString .= " WHERE title LIKE '%$filter%'";

        if ($sort != ""){
            $queryString .= " ORDER BY " . str_replace("-", "_",$sort);
        }

        $query = $this->conn->query ($queryString);

        $rows = array ();
        while ($row = $query->fetch())
            $rows[]=$row;

        return $rows;
    }
}
