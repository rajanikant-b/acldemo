<?php
session_start();
if(!isset($_SESSION["userid"]) || empty($_SESSION["userid"]))
{
  echo 'User not logged in';exit;
}
include("connection.php");

if('set-privilege' === $_GET['action']) {
    try
    {
        $checked = $_GET['checked'];
        $roleId = $_GET['roleId'];
        $resourceId = $_GET['resourceId'];
        $privilegeId = $_GET['privilegeId'];
        $sqlQuery = '';
        //when requested for delete
        if ('false' == $checked)
        {
            $sqlQuery = 'DELETE FROM role_resource_privilege WHERE role_id = ' .
                $roleId . ' AND resource_id =' . $resourceId . ' AND privilege_id ='
                . $privilegeId;
        }
        else
        {
            $sqlQuery = "INSERT INTO role_resource_privilege
                (role_id,  resource_id , privilege_id)
                VALUES ($roleId, $resourceId , $privilegeId)";
        }
        $result = mysql_query($sqlQuery);
    } catch(Exception $e) {
        echo $e->getMessage();exit;
    }
    if($result) {
        echo $result;
    }
}