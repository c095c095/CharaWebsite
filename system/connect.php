<?php

$conn = mysqli_connect("localhost", "root", "", "chara");

// if(mysqli_connect_error($conn)) {
//     echo "<p>Can't Connect to database.</p>";
//     die();
// }

if(mysqli_connect_error()) {
    echo "<p>Can't Connect to database.</p>";
    die();
}

mysqli_set_charset($conn, "utf8");