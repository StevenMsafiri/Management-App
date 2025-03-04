<?php

require_once "../models/Zone.php";


class Zones
{

    private $zoneModel;

    public function __construct()
    {
        $this->zoneModel = new Zone;
    }


    public function getAllzones()
    {

        $zones = $this->zoneModel->getAll();

        return $zones;
    }
}
