<?php

namespace common;

require_once(__DIR__ . '/Logger.php');
require_once(__DIR__ . '/database_connection.php');

class Entity extends Logger
{
    protected $connection;


    public function __call($name, $arguments)
    {
    }

    /**
     * @return \PDO
     */
    public function getConnection()
    {
        return get_database_connection();
    }



}