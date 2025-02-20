<?php
include("../assets/db.php");

class Artist{
    private $conn;

    public function __construct(){
      $db = new DB ();
      $conn = $db->getConn ();
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

    function getArtist ($id){
      $query = $conn->prepare ("SELECT Page.id, Page.blurb, Page.external_links, Page.last_modified, Page.sources, Page.thumbnail, Page.title, Artist.genres, Artist.publishers FROM Artist JOIN Page USING (id) WHERE id = :id");
      $query->bind_param (":id", $id);
      return $query->execute ()->fetch();
    }

    // get all individual artists -- for display in view
    function getAllIndividual(){
      $rows = array();
      $query = $conn->query ("SELECT Page.id, Page.blurb, Page.last_modified, Page.thumbnail, Page.title, FROM Artist JOIN Page USING (id) LEFT JOIN MemberOfGroup ON (Page.id=MemberOfGroup.member_id)");

      while ($row = $query->fetch())
        $rows[]=$row;

      return $rows;
    }

    // get all bands -- for display in view
    function getAllGroup(){
      $rows = array ();
      $query = $conn->query ("SELECT Page.id, Page.blurb, Page.last_modified, Page.thumbnail, Page.title, FROM Artist JOIN Page USING (id) JOIN MemberOfGroup ON (Page.id=MemberOfGroup.group_id)");

      while ($row = $query->fetch ())
        $rows[]=$row;

      return $rows;
    }

    // filter artists (genre, activity status, decade)
    function filter(){
      
    }
}
