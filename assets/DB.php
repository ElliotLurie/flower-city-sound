<?php
Class DB{
    private $dbh;

    public function __construct(){
        // connection to DB
        try {
            $this->dbh = new PDO("sqlite:../../adminer/fcs.db");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $pe) {
            die("Bad Database");
        }
    }

    // get the DB conn for models
    function getConn(){
        return $this->dbh;
    }
}
