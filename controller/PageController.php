<?php
include "../model/Page.php";

// validate and sanitize
class PageController{
    private $model;

    public function __construct(){
        $this->model = new Page();
    }

    function getPageType($id){
        return $this->model->getPageType($id);
    }

    function getPhotos($id){
        return $this->model->getPhotos($id);
    }

    // search through DB
    function search($filter, $type, $sort){
        return $this->model->search($filter, $type, $sort);
    }
}
