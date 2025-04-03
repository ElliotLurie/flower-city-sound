<?php
include "../model/Search.php";

// validate and sanitize
class SearchController{
    private $model;

    public function __construct(){
        $this->model = new Search();
    }

    // search through DB
    function search($filter, $type, $sort){
        return $this->model->search($filter, $type, $sort);
    }
}
