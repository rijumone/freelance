<?php 
//echo 1234;exit;
//mail("mailmeonriju@gmail.com","it work1s","phew!");exit;
$type = $_POST["type"];
//echo $type;exit;

// $to = "riteshkumar26061990@gmail.com,admin@kumardentalclinic.in";
$to = "sumitas.designer@gmail.com";


$headers = "";

$headers .= 'Bcc: mailmeonriju@gmail.com' . "\r\n";
 	

$subject = "";
$message = "";

switch ($type) {
	case 'appt':
		sendApptMail($to);
		break;
	case 'contact':
		sendContactMail($to);
		break;
	
	default:
		returnJSON();
		break;
}


 
function sendApptMail($to){
//echo "inside sendApptMail";exit;
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$headers .= "From: admin@kumardentalclinic.in\r\n";
	$subject .= "Make an appointment";
	$name = $_POST["name"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$timing = $_POST["timing"];

	$message .= 'name : '.$name.'<br>';
	$message .= 'address : '.$address.'<br>';
	$message .= 'phone : '.$phone.'<br>';
	$message .= 'timing : '.$timing.'<br>';

	sendMail($to,$subject,$message,$headers);
}

function sendContactMail($to){

	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$headers .= "From: admin@kumardentalclinic.in\r\n";
	$subject = "Contact Us";
	$name = $_POST["name"];
	$email = $_POST["email"];
	$telephone = $_POST["telephone"];
	$message_txt = $_POST["message"];

	$message = 'name : '.$name.'<br>';
	$message .= 'email : '.$email.'<br>';
	$message .= 'telephone : '.$telephone.'<br>';
	$message .= 'message : '.$message_txt.'<br>';

	sendMail($to,$subject,$message,$headers);

}

function returnJSON($arr=array('status'=>'fail','message'=>'unknown error')){
	echo json_encode($arr);exit;
}

function sendMail($to,$subject,$message,$headers){ //echo "inside sendMail";exit;
	$status = mail($to,$subject,$message,$headers); //echo $status;exit;
	if ($status) {
		returnJSON($arr=array('status'=>'success','message'=>'mail sent'));
	} else {
		returnJSON();
	}
}