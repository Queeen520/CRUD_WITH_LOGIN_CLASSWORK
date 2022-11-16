<?php 

session_start();

require_once '../../components/db_connect.php';

if ($_POST) {
    $hotel_id = $_POST["hotel_id"];
    $user_id = $_SESSION["user"];
}

$sql = "INSERT INTO booking (fk_user_id, fk_hotels_id) VALUES ('$user_id', '$hotel_id')";

if (mysqli_query($connect, $sql) === true) {
    $class = "success";
    $message = "The booking was successfully sent ! <br>
        <table class='table w-50'><tr>
        <td> $name </td>
        <td> $city </td>
        </tr></table><hr>";
    $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
} else {
    $class = "danger";
    $message = "Error while creating record. Try again: <br>" . $connect->error;
    $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
}


mysqli_close($connect);


