<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'catering_booking';
    $conn = new mysqli($servername, $username, $password, $db_name);

    session_start();
?>