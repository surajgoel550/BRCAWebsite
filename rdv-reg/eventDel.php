<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 4/5/17
 * Time: 12:51 AM
 */
include_once('auth.php');
$id = $_POST["id"];
$request=$con->query("SELECT * from `cv_events` where id='$id'");
$event = $request->fetch_assoc();
if(!($event["createdby"]==$entry_no&&$event["approved"]=="0"))
    die('{"success":false,"message":"Not authorized"}');

$con->query("DELETE FROM `cv_events` where id='$id'");
die('{"success":true,"message":"Deleted"}');

