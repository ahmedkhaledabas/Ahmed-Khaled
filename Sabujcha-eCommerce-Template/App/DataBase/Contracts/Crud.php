<?php
namespace App\DataBase\Contract;

interface Crud{
    function create();
    function update();
    function delete();
    function read();
}