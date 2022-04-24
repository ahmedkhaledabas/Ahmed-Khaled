<?php

if($_SERVER['REQUEST_METHOD'] === "GET"){
    http_response_code(405);
    include_once '../../../LayOut/Errors/405.php' ;
}