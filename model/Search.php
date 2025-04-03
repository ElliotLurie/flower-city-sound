<?php
include "../assets/DB.php";
class Search {
    private $conn;   

    public function __construct(){
        $db = new DB();
        $this->conn = $db->getConn();
    }

    // search through DB
    function search($filter, $type, $sort){
        $queryString = "SELECT Page.title FROM Page";

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
