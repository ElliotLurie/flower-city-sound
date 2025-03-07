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
        return $model->getVenue($id);
    }

    // get all venues
    function getAll(){
        return $model->getAll();
    }

    // filter venues (decade, ?, ?)
    function filter(){

    }
}
