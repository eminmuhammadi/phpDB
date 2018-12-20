<?php

/**
*   @version 1.0.0 
*   Connection for @filesource /../PDO/PURE/lib.php
*   Getting dynamic (POST) data with null values can be difficult 
*	to handle with PDO. Here is a helper function to detect the correct data type.
*/

function phpDB_type($phpDB_value)
{
    switch (true) {
        case is_bool($phpDB_value):
            $phpDB_type = PDO::PARAM_BOOL;
            break;
        case is_int($phpDB_value):
            $phpDB_type = PDO::PARAM_INT;
            break;
        case is_null($phpDB_value):
            $phpDB_type = PDO::PARAM_NULL;
            break;
        default:
            $phpDB_type = PDO::PARAM_STR;
    }
    return $phpDB_type;
}