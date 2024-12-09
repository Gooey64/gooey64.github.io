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

    $user = $_POST['username'];
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $wpm = $_POST['wpm'];
    $accuracy = $_POST['accuracy'];

    $sql = "INSERT INTO games (username, title, artist, wpm, accuracy)
        VALUES ('$user', '$title', '$artist', $wpm, $accuracy)";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Data inserted successfully"]);}
    else {
        echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
    }

    $conn->close();
?>
