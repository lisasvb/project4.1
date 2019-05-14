<?php 
include("./connectdb.php");

function sanitize($raw_data) {
    global $conn;
    $data = htmlspecialchars($raw_data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}


$email = sanitize($_POST["email"]);

$sql = "SELECT * FROM `users` WHERE `email` = '$email'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1 ){
    echo '<div class="alert alert-danger" role="alert">
    Deze email bestaat al probeer het opnieuw.</div>';
    header("Refresh: 4; url=./index.php?content=registerform");   
} else {

    date_default_timezone_set("Europe/Amsterdam");

    $date = date('d-m-Y H:i:s'); 
    $part_of_email = substr($email,3,4);

    $password = $date.$part_of_email;


    $password_hash = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO `users` (`ID`,
                             `email`,
                             `password`,
                             `userrol`)
                VALUES      (NULL,
                             '$email',
                             '$password',
                             'customer')";
//echo $sql;
$result = mysqli_query($conn,$sql);

$id = mysqli_insert_id($conn);

//var_dump($result);

if ($result){
    $to = $email;
    $subject = "Activatielink http://www.geheugentraining.com";
    $message = '<!DOCTYPE html>
    <html>
    <body>
    <h1>Beste klant,<h1>
    <p>Bedankt voor het registreren, door op onderstaande link te klikken wordt het registratieproces voltooid.</p> <a href="http://www.geheugentraining.com/index.php?content=createpassword&id=' . $id .'&pw=' . $password_hash . '"> Activeer uw account.</a>


    </body>
    </html>';

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <admin@loginsysteem.nl>' . "\r\n";
    $headers .= 'Cc: myboss@example.com' . "\r\n";
    $headers .= 'Bcc: myboss@example.com' . "\r\n";
    mail($to,$subject,$message,$headers);

    echo '<div class="alert alert-info" role="alert">
    U heeft een email gekregen met een activatielink. Klik hierop om het registreren te voltooien.</div>';
    header("Refresh: 4; url=./index.php?content=registerform");
} else{
    echo '<div class="alert alert-danger" role="alert">
    Er is iets fout gegaan met de registratie. Probeer het nog maals.</div>';
    header("Refresh: 4; url=./index.php?content=registerform");

}
}

?>