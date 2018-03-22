<?php
/*
*This file is used for  managing the Db connection to posts and comments
*Using POO
*
**/
//
namespace Devnetwork\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=boom', 'root', 'TimDev:92');
        return $db;
    }
}