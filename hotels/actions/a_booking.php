<?php 

session_start();

require_once '../../components/db_connect.php';

if ($_POST) {
    $hotel_id = $_POST['hotel_id'];
    $user_id = $_SESSION['user'];


$sql = "INSERT INTO booking (fk_user_id, fk_hotel_id) VALUES ('$user_id', '$hotel_id')";

if (mysqli_query($connect, $sql) === true) {
    $class = "success";
    $message = "The booking was successfull! <br>
        <table class='table w-50'><tr>
        <td>  </td>
        <td>  </td>
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
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index_user.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
</body>
</html>
