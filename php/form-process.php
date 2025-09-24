<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Du måste skriva in ditt namn :) ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Ange din mailadress, tack! ";
} else {
    $email = $_POST["email"];
}

// MSG Guest
if (empty($_POST["guest"])) {
    $errorMSG .= "Välj från listan :) ";
} else {
    $guest = $_POST["guest"];
}


// MSG Event
if (empty($_POST["event"])) {
    $errorMSG .= "Välj från listan. ";
} else {
    $event = $_POST["event"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Skriv ditt meddelande här! ";
} else {
    $message = $_POST["message"];
}

//TODO: Mail till?
//$EmailTo = "armanmia7@gmail.com";
$Subject = "OSA BRÖLLOP 16/5-26";

// prepare email body text
$Body = "";
$Body .= "Namn: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "gäst: ";
$Body .= $guest;
$Body .= "\n";
$Body .= "event: ";
$Body .= $event;
$Body .= "\n";
$Body .= "Meddelande: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "Från:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "Meddelande skickat!";
}else{
    if($errorMSG == ""){
        echo "Något gick fel :(";
    } else {
        echo $errorMSG;
    }
}

?>
