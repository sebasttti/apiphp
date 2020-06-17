<?php

class Common{
    private $db;

    function __construct(){
        $this->db = new Database();
    }

    function showExample(){
        $query = "SELECT * from ejemplo";

        $this->db->query($query);

        $response = $this->db->responseAll();

        return $response;
    }
}

?>