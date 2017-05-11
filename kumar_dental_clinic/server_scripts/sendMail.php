<?php

$type = $_POST["type"];

switch ($type) {
	case 'appt':
		sendApptMail();
		break;
	
	default:
		returnJSON();
		break;
}

sendContactMail();

function sendApptMail(){
	$to = "mailmeonriju@gmail.com";
	// $from = $_POST["from"];
	// $type = $_POST["type"];
	$subject = "Make an appointment";
	$name = $_POST["name"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$timing = $_POST["timing"];

	$message = 'name : '.$name.'<br>';
	$message .= 'address : '.$address.'<br>';
	$message .= 'phone : '.$phone.'<br>';
	$message .= 'timing : '.$timing.'<br>';

 	$status = mail($to,$subject,$message);
	if ($status) {
		returnJSON($arr=array('status'=>'success','message'=>'mail sent'));
	} else {
		returnJSON();
	}
}

function returnJSON($arr=array('status'=>'fail','message'=>'unknown error')){
	echo json_encode($arr);exit;
}