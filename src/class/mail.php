<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

class cocoPhpMailer extends PHPMailer
{

    /**
     * myPHPMailer constructor.
     *
     * @param bool|null $exceptions
     * @param string    $body A default HTML message body
     */
    public function __construct($exceptions, $body = '')
    {
        //Don't forget to do this or other things may not be set correctly!
        parent::__construct($exceptions);
        //Set a default 'From' address
        $this->setFrom('corinnefontagnedev40@gmail.com');
        //Send via SMTP
        $this->isSMTP();
        //Equivalent to setting `Host`, `Port` and `SMTPSecure` all at once
        $this->Host = 'ssl://smtp.gmail.com:465';
        //Set an HTML and plain-text body, import relative image references
        $this->msgHTML($body, './images/');
        //Show debug output
        $this->SMTPDebug = 2;
        //Inject a new debug output handler
        $this->Debugoutput = function ($str, $level) {
            echo "Debug level $level; message: $str\n";
        };
    }
    //Extend the send function
    public function send()
    {
        $this->object;
        $this->name;
        $this->email;
        $this->message;
        $r = parent::send();
        echo "I sent a message with subject " . $this->object;
        return $r;
    }
}
//Now creating and sending a message becomes simpler when you use this class in your app code
try {
    //Instantiate your new class, making use of the new `$body` parameter
    $mail = new cocoPhpMailer(true, '<strong>This is the message body</strong>');
    // Now you only need to set things that are different from the defaults you defined
    $mail->addAddress('corinnefontagnedev40@gmail.com');
    $mail->object= $_POST['objet'];
    $mail->name = $_POST['nom'];
    $mail->email = $_POST['email'];
    $mail->message = $_POST['message'];
    //$mail->addAttachment(__FILE__, 'myPHPMailer.php');
    $mail->send(); //no need to check for errors - the exception handler will do it
} catch (Exception $e) {
    //Note that this is catching the PHPMailer Exception class, not the global \Exception type!
    echo "Caught a " . get_class($e) . ": " . $e->getMessage();
}


?>