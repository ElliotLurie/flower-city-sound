<?php
// validate and sanitize
include("../model/Artist.php");
Class ArtistController{
  private $model;
  public function __construct(){
    $this->model = new Artist ();
  }

  // function getTestName(){
  //     $artist = new Artist();
  //     return $artist->getTestName();
  // }

  // user selects an artist from view
  // controller takes the input and sends it to model
  // to get info from db, model sends info back here 
  // and its returned to the view to go to the right page
  function getArtist($id){
    return $this->model->getArtist($id);
  }

  // get all bands -- for display in view
  function getAllGroup(){ 
    return $this->model->getAllGroup();
  }

  // get all individual artists -- for display in view
  function getAllIndividual(){
    return $this->model->getAllIndividual();
  }

  // filter artists (genre, activity status, decade)
  function filter(){

  }
}
