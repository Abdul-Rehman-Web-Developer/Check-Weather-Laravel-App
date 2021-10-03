<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function isFieldSet($request,$field,$fieldName){
		
		if (!$request->has($field)){ // Field is not set
      	    response()->json("Post parameter '$fieldName' is missing",409)->send();
			exit;
		}
	}

	protected function isEmpty($fieldValue,$fieldName){
	  	if( strlen(trim($fieldValue)) <= 0 ) { // Field is required
	       response()->json("The '$fieldName' field input value must not be empty", 409)->send();
	    	exit;
	    }	    
	}

	protected function isNumber($fieldValue,$fieldName){
	  	if( ! is_numeric(trim($fieldValue)) ) { // check for numeric value
	       response()->json("The '$fieldName' field input value must only be numeric", 409)->send();
	    	exit;
	    }	    
	}

	
	protected function haveMinLength($length,$fieldValue,$fieldName){
		if(strlen(trim($fieldValue)) < $length){ // The field input value is shorter than a given characters length
	        response()->json("The $fieldName field input value must be atleast $length characters long", 409)->send();
	        exit;
	      }
	}

	protected function haveMaxLength($length,$fieldValue,$fieldName){
		if(strlen(trim($fieldValue)) > $length){ // The field input value is greater than a given characters length
	        response()->json("The $fieldName field input value must not contain more than $length characters", 409)->send();
	        exit;
	      }
	}

	
	protected function validateEmail($fieldValue,$fieldName){
		if(!filter_var(trim($fieldValue), FILTER_VALIDATE_EMAIL)){ // The Email field input value is invalid
	        response()->json("The $fieldName field input value does not match a correct email address", 409)->send();
	        exit;
	    }
	}


	protected function generateRandomString($length = 30) {
	    $characters = '123456789abcdefghijklmnopqrstuvwxyz!@#$%&*-+=';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	protected function generateAlphaNumericRandomString($length = 30) {
	    $characters = '123456789abcdefghijklmnopqrstuvwxyz';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	protected function generateRandomDigits($length = 5) {
	    $characters = '123456789';
	    $charactersLength = strlen($characters);
	    $randomDigits = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomDigits .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomDigits;
	}

    protected function passwordRecoveryEmailHtml($message){
                       
        $html="           
               <div style='width:100%;overflow:auto;margin-top:70px'>
                 
                    <h1 style='text-align:center;margin-top:0px;font-family:arial'>
                    Check Weather Web Portal
                    
                    </h1>
                    
                    <h4 style='text-align:center;margin:-15px 0px 0px 0px;color:#8a8a5c;font-family:arial'>
                   		An automated weather checking system
                    </h4>
                 
                </div>
                $message
                      
            ";
        return $html;
    }

    protected function sendHtmlEmailForPasswordRecovery($email_to,$email_subject,$email_message){
               
        
        // Load Composer's autoloader
        require 'vendor/autoload.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP(); 							// Send using SMTP
            $mail->Host       = env('MAIL_HOST');                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = env('MAIL_USERNAME');                     // SMTP username
            $mail->Password   = env('MAIL_PASSWORD');                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = env('MAIL_PORT');                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom(env('MAIL_USERNAME'), 'Check Weather (Account Recovery)');
            $mail->addAddress($email_to);               // Name is optional
           
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $email_subject;
            
            
            $mail->Body    = $email_message;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
       
    }

}
