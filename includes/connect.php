<?php

$con = mysqli_connect('localhost', 'root', '', 'coconutindustry_dbms');

if (!$con) {
    die(mysqli_connect_error());
}
