<?php

function  show($stuff)
{
    echo "<pre>";
    var_dump($stuff);
    echo "</pre>";
}


function show_error()
{
    if(isset($_SESSION['errors']) && !empty($_SESSION['errors']))
    {
        echo $_SESSION['errors'];
    }
}

function export_excel($export_values)
{

    $filename = "Export_".date("d-m-Y").".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$filename");

    $isPrintHeader = false;
    if (!empty($export_values))
    {
        foreach ($export_values as $row)
        {
            if (! $isPrintHeader)
            {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();
}