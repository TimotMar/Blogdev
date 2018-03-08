<?php

namespace Devnetwork\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=boom;charset=utf8', 'root', 'TimPucelle:92');
        return $db;
    }
}