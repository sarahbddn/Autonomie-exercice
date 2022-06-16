<?php

$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG = "Veuillez renseigner votre nom ";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["email"])) {
    $errorMSG .= "Veuillez renseigner une adresse e-mail ";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["phoneNum"])) {
    $errorMSG .= "Veuillez renseigner un numéro de téléphone ";
} else {
    $email = $_POST["phoneNum"];
}

if (empty($_POST["msg_subject"])) {
    $errorMSG .= "Veuillez renseigner le sujet de votre message ";
} else {
    $msg_subject = $_POST["msg_subject"];
}


if (empty($_POST["message"])) {
    $errorMSG .= "Veuillez écrire votre demande ";
} else {
    $message = $_POST["message"];
}

//Add your email here
$EmailTo = "jappstore01@gmail.com";
$Subject = "Nouveau Message Reçu";

// prepare email body text
$Body = "";
$Body .= "Nom: ";
$Body .= $name;
$Body .= "\n";
$Body .= "E-mail: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Sujet: ";
$Body .= $msg_subject;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "De:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "Réussi !";
}else{
    if($errorMSG == ""){
        echo "Quelque chose s'est mal passé... :(";
    } else {
        echo $errorMSG;
    }
}

?>