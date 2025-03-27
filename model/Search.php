<?php
class Search {
    public function __construct(){
      $sqlite = new SQLite3 ("fcs.db");
    }

    // search through DB
    function search($filter){
      $stmnt = $sqlite->prepare ("SELECT * FROM PAGE WHERE (title=:filter)");
    }

    // filter results (genre, activity status, decade, type)
    function filter(){

    }

}
