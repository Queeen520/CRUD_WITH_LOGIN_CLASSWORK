<?php 

session_start();

require_once '../../components/db_connect.php';

if ($_POST) {
    $hotel_id = $_POST['hotel_id'];
    $user_id = $_SESSION['user'];


$sql = "INSERT INTO booking (fk_user_id, fk_hotel_id) VALUES ('$user_id', '$hotel_id')";

$sql_1 = "SELECT * FROM users WHERE id = $user_id";
$sql_2 = "SELECT * FROM hotels WHERE id = $hotel_id";

$result_user = mysqli_query($connect, $sql_1);
$user = mysqli_fetch_assoc($result_user);
//echo ($user['firstname']);

$result_hotel = mysqli_query($connect, $sql_2);
$hotel = mysqli_fetch_assoc($result_hotel);
//echo ($hotel['name']);


if (mysqli_query($connect, $sql) === true) {
    $class = "success";
    $message = "The booking was successfull! <br>
        <table class='table w-50'><tr>
        <td>Thank you, $user[firstname] for booking $hotel[name] Hotel</td>
        </tr></table><hr>";
} else {
    $class = "danger";
    $message = "Error while creating record. Try again: <br>" . $connect->error;
}
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Booking</title>
    <?php require_once '../../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Booking Succsess</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index_user.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
</body>
</html>
