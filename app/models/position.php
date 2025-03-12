<?php

Class position
{
    protected $connection;
    function __construct()
    {
        $this->connection = new Database();
    }
}