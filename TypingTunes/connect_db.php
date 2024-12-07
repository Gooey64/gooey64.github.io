<?php
    // Constants
    $server = "127.0.0.1";
    $userid = "uyg15d3veq5ya";
    $pw = "=EPC9km4&VU#32s";
    $db = "dbuoanminggsar";

    // Create and check database cxn
    $conn = new mysqli($server, $userid, $pw);
    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);

    $conn->select_db($db);
?>