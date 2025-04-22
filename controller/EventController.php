<?php
// validate and sanitize
include("../model/Event.php");
Class EventController{
  private $model;
  public function __construct(){
    $this->model = new Event ();
  }

  // get event by id
  function getEvent($id){
    return $this->model->getEvent($id);
  }

  // get recent events
  function getRecent($count = null){
    return $this->model->getRecent($count);
  }
}
