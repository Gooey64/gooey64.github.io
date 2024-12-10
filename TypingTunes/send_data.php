<?php
    include "connect_db.php";

    //creates php variables for the javascript variables being sent to database
    $user = $_POST['username'];
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $wpm = $_POST['wpm'];
    $accuracy = $_POST['accuracy'];

    //sql query to insert user data to database
    $sql = "INSERT INTO games (username, title, artist, wpm, accuracy)
        VALUES ('$user', '$title', '$artist', '$wpm', '$accuracy')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Data inserted successfully"]);}
    else {
        echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
    }

    $conn->close();
?>
