<?php

require "../class/db.php";
session_start();

if(isAdminLoggedIn());

$value = $_GET['item'];
$extract_id = explode(',' ,($_GET['checked']));

if($value=="delete")
{
    foreach($extract_id as $key=>$id)
    {
    $sql = "Delete from tbl_program where pid=$id";
    $db->query($sql);
    }
}
else if($value=="active")
{
    foreach($extract_id as $key=>$id)
    {
    $sql = "Update tbl_program set pstatus=1 where pid=$id";
    $db->query($sql);
    }
}
else if($value=="inactive")
{
    foreach($extract_id as $key=>$id)
    {
    $sql = "Update tbl_program set pstatus=0 where pid=$id";
    $db->query($sql);
    }
}

header("location: index.php");

?>