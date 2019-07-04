<?php   
include('model/contact.php');
echo $twig->render('templates/contact.html', 
array(
'objet' => $object,
'nom' => $name,
'email' => $email,
'message' => $message,
)
);