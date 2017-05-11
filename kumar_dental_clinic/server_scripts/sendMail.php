<?php

$type = $_POST["type"];

switch ($type) {
	case 'appt':
		sendApptMail();
		break;
	case 'contact':
		sendContactMail();
		break;
	
	default:
		returnJSON();
		break;
}

// $to = "riteshkumar26061990@gmail.com,admin@kumardentalclinic.in";
$to = "mailmeonriju@gmail.com";


$headers = "";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
// $headers .= 'Bcc: mailmeonriju@gmail.com,sumitas.designer@gmail.com' . "\r\n";
 	

function sendApptMail(){

	$subject = "Make an appointment";
	$name = $_POST["name"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$timing = $_POST["timing"];

	$message = 'name : '.$name.'<br>';
	$message .= 'address : '.$address.'<br>';
	$message .= 'phone : '.$phone.'<br>';
	$message .= 'timing : '.$timing.'<br>';

}

function sendContactMail(){

	$subject = "Contact Us";
	$name = $_POST["name"];
	$email = $_POST["email"];
	$telephone = $_POST["telephone"];
	$message_txt = $_POST["message"];

	$message = 'name : '.$name.'<br>';
	$message .= 'email : '.$email.'<br>';
	$message .= 'telephone : '.$telephone.'<br>';
	$message .= 'message : '.$message_txt.'<br>';

}

function returnJSON($arr=array('status'=>'fail','message'=>'unknown error')){
	echo json_encode($arr);exit;
}

function sendMail(){
	$status = mail($to,$subject,$message,$headers);//echo $status;exit;
	if ($status) {
		returnJSON($arr=array('status'=>'success','message'=>'mail sent'));
	} else {
		returnJSON();
	}
}