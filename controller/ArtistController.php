<?php
// validate and sanitize
include("../model/Artist.php");
Class ArtistController{
  private $model;
  public function __construct(){
    $this->model = new Artist ();
  }

  // get artist by id
  function getArtist($id){
    return $this->model->getArtist($id);
  }

  // get artists
  function getArtists($group = -1, $genre = null, $activity = -1, $decade = null, $order = null){ 
    return $this->model->getArtists($group, $genre, $activity, $decade, $order);
  }
}
