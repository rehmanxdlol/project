<?php


if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["subject"]) && isset($_POST["message"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $header = "from: $name <$email>";
    $to = "rehmanstevenson@gmail.com";

    if (mail($to, $subject, $message, $header)) {
        header("Location: index.php");
    } else {
        echo("Error");
    }
} 
?>

}
