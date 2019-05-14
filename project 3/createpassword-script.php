<?php
//var_dump($_POST);

include("./connectdb.php");

include("./functions.php");

$password = sanitize($_POST["password"]);
$verify_password = sanitize($_POST["verify_password"]);
$id = sanitize($_POST["id"]);
$pw = sanitize($_POST["pw"]);

if(!strcmp( $password, $verify_password )) {

    $sql = "SELECT * FROM `users` WHERE `id` = $id";
    
    $result = mysqli_query($conn, $sql);

    if ( mysqli_num_rows($result) == 1 ) {

        $record = mysqli_fetch_assoc($result);

        if ( password_verify($record["password"], $pw) ){

            $blowfish_password = password_hash($password, PASSWORD_BCRYPT);
    
            if ( !empty($password)&& !empty($verify_password)){
                $sql = "UPDATE `users`
                        SET    `password` = '$blowfish_password'
                        WHERE  `id`        = $id";
                
                $result = mysqli_query($conn, $sql);
                
                if($result){
                    $sql = "SELECT * from `users` WHERE `id` = $id";
        
                    $result = mysqli_query($conn, $sql);
        
                    $record = mysqli_fetch_assoc($result);
        
                    $email = $record["email"];
        
                    echo '<div class="alert alert-info" role="alert">
                    U wordt doorgestuurd naar de inlogpagina waar  kunt inloggen.</div>';
                    header("Refresh: 2; url=./index.php?content=loginform&email=$email");
                } else{
                    echo '<div class="alert alert-danger" role="alert">
                    U heeft een verkeerd wachtwoord gegeven.</div>';
                    header("Refresh: 2; url=./index.php?content=home");
                } 
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                    U heeft een van beid wachtwoordvelden niet ingevuld. Probeer het nogmaals.</div>';
                    header("Refresh: 2; url=./index.php?content=createpassword&id=$id");
                }
        } else {
        }    
} else {
echo '<div class="alert alert-danger" role="alert">
Het id in de activatie link is niet bij ons bekent.</div>';
header("Refresh: 2; url=./index.php?content=home");
}
                
} else {
            echo '<div class="alert alert-danger" role="alert">
            U heeft een van beid wachtwoordvelden niet ingevuld. Probeer het nogmaals.</div>';
            header("Refresh: 2; url=./index.php?content=createpassword&id=$id&pw=$pw");

}


?>