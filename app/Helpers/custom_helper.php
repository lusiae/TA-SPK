<?php
function userLogin()
{
    $db = \Config\Database::connect();
    return $db->table('super_admin')->where('id_Sadmin', session('id_Sadmin'))->get()->getRow();
}

function countData($table)
{
    $db = \Config\Database::connect();

    return $db->table($table)->countAllResults();
}
