<?php


require_once "../models/Position.php";


class Positions
{

    private $positionModel;

    public function __construct()
    {
        $this->positionModel = new Position;
    }


    public function getAllPositions()
    {



        $positions = $this->positionModel->getAll();

        return $positions;
    }
}
