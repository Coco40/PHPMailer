<?php   
include('functions/functions.php');

$object = "coucou";
$name = "coucou";
$email = "coucou@coucou.fr";
$message = "coucou";

sendEmail($object,$name,$email,$message);

// echo $twig->render('contact.html',
// array(
// 'objet' => $object,
// 'nom' => $name,
// 'email' => $email,
// 'message' => $message,
// )
// );