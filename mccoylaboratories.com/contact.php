<?php
//echo "<pre>";print_r($_POST);exit;
if(!$_POST) exit;

$email = $_POST['email'];


//$error[] = preg_match('/\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i', $_POST['email']) ? '' : 'INVALID EMAIL ADDRESS';
if(!eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*" ."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$",$email )){
	$error.="Invalid email address entered";
	$errors=1;
}
if($errors==1) echo $error;
else{
	$type = $_POST['type'];
	if($type=="franchisee"){
		$values = array ('name','email', 'city','state','MISC','subject');
		$required = array('name','email','state','city');
	}else{
		$values = array ('name','email','message','number','state','query');
		$required = array('name','email','message');
	}

	 
	$your_email = "sumitas.designer@gmail.com";
	$email_subject = "New Message: ".$_POST['subject'];
	$email_content = "new message:\n";
	
	foreach($values as $key => $value){
	  if(in_array($value,$required)){
		if ($key != 'subject' && $key != 'company') {
		  if( empty($_POST[$value]) ) { echo 'PLEASE FILL IN REQUIRED FIELDS'; exit; }
		}
	}
		$email_content .= $value.': '.$_POST[$value]."\n";
	 
	}
//	 echo $email_content;exit;
	if(@mail($your_email,$email_subject,$email_content)) {
		echo 'Message sent!'; 
	} else {
		echo 'ERROR!';
	}
}
?>