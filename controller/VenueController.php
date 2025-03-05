<?php
// validate and sanitize
class VenueController {
    public function __construct(){
        $this->model = new Venue ();
    }

    // not sure if this will be needed rn
    function getVenue($id){
        return $model->getVenue($id);
    }

    // get all venues
    function getAll(){
        return $model->getAll($id);
    }

    // filter venues (decade, ?, ?)
    function filter(){

    }
}
