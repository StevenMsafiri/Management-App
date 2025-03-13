<?php

Class Section extends Database

{
    function getAllSections()
    {
        $sql = "SELECT * FROM Sections";

        return $this->read($sql);

    }
}
