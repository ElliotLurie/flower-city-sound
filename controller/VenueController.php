<?php
include('../model/Venue.php');
// validate and sanitize
Class VenueController {
    private $model;
    public function __construct(){
        $this->model = new Venue ();
    }

    // not sure if this will be needed rn
    function getVenue($id){
        return $this->model->getVenue($id);
    }

    // get all venues
    function getAll(){
        return $this->model->getAll();
    }

    function getRandom($count){
      return $this->model->getRandom($count);
    }

    function getVenues($status = -1, $decade = null, $order = null){ 
        return $this->model->getVenues($status, $decade, $order);
    }
}
