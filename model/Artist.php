<?php
include("../assets/DB.php");
class Artist{

    public function __construct(){

    }

    // function getTestName(){
    //     $db = new DB();
    //     $data = "";
    //     $stmt = $db->getConn()->prepare('SELECT testname FROM testTable WHERE id = 1');
    //     $stmt->execute();
    //     while($name = $stmt->fetch()){
    //         $data = $name;
    //     }
    //     if($data != null){
    //         return $data[0];
    //     }
    // }

    // not sure if this will actually be needed rn
    function getArtist($id){

    }

    // get all individual artists -- for display in view
    function getAllIndividual(){

    }

    // get all bands -- for display in view
    function getAllGroup(){
        
    }

    // filter artists (genre, activity status, decade)
    function filter(){

    }

}