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
    $sql = "Delete from tbl_subject where subid=$id";
    $db->query($sql);
    }
}
else if($value=="active")
{
    foreach($extract_id as $key=>$id)
    {
    $sql = "Update tbl_subject set bStatus=1 where fid=$id";
    $db->query($sql);
    }
}
else if($value=="inactive")
{
    foreach($extract_id as $key=>$id)
    {
    $sql = "Update tbl_batch set bStatus=0 where pbid=$id";
    $db->query($sql);
    }
}

header("location: index.php");

?>