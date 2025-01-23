<?php
session_start();

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "DELETE FROM actividades WHERE id='$id'";
    mysqli_query($conn, $query);
    header("Location: main.php");
}
?>