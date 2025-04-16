<?php
include "../model/Search.php";

// validate and sanitize
class SearchController{
    private $model;

    public function __construct(){
        $this->model = new Search();
    }

    function getPageType($id){
        return $this->model->getPageType($id);
    }

    // search through DB
    function search($filter, $type, $sort){
        return $this->model->search($filter, $type, $sort);
    }
}
