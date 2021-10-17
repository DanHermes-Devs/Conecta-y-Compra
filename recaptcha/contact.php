<?php
// require ReCaptcha class
require('recaptcha-master/src/autoload.php');

// configure
$from = 'Formulario Conecta y Compra <cyc@digitaltryout.com>';
$sendTo = 'armando@wearetrafika.com';
$subject = 'Nuevo mensaje | Formulario web';
$fields = array('name' => 'Nombre', 'surname' => 'Asunto', 'phone' => 'Teléfono', 'email' => 'Email', 'message' => 'Mensaje'); // array variable name => Text to appear in the email
$okMessage = '¡Gracias!, tu mensaje ha sido enviado correctamente.';
$errorMessage = 'Ocurrió un error al enviar tu mensaje, por favor intenta más tarde.';
$recaptchaSecret = '6LfM9kwUAAAAAHvf_7tVVIl35vPH3ENvQdhCzBVF';

// let's do the sending

try
{
    if (!empty($_POST)) {

        // validate the ReCaptcha, if something is wrong, we throw an Exception, 
        // i.e. code stops executing and goes to catch() block
        
        if (!isset($_POST['g-recaptcha-response'])) {
            throw new \Exception('ReCaptcha is not set.');
        }

        // do not forget to enter your secret key in the config above 
        // from https://www.google.com/recaptcha/admin
        
        $recaptcha = new \ReCaptcha\ReCaptcha($recaptchaSecret, new \ReCaptcha\RequestMethod\CurlPost());
        
        // we validate the ReCaptcha field together with the user's IP address
        
        $response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);


        if (!$response->isSuccess()) {
            throw new \Exception('ReCaptcha was not validated.');
        }
        
        // everything went well, we can compose the message, as usually
        
        $emailText = "Nuevo Mensaje del formulario Web\n=============================\n";

        foreach ($_POST as $key => $value) {

            if (isset($fields[$key])) {
                $emailText .= "$fields[$key]: $value\n";
            }
        }
        

        $headers = array('Content-Type: text/plain; charset="UTF-8";',
            'From: ' . $from,
            'Reply-To: ' . $from,
            'Return-Path: ' . $from,
        );

        mail($sendTo, $subject, $emailText, implode("\n", $headers));

        $responseArray = array('type' => 'success', 'message' => $okMessage);
    }
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
else {
    echo $responseArray['message'];
}
