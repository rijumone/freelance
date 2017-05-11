function sendMail(data){ //console.log(data);
	$.ajax({
		method: "POST",
		url: "server_scripts/sendMail.php",
		dataType: 'json',
		data: data,
		success: function(reply){
			console.log(reply);
			$('form')[0].reset();
			alert("Request sent!")
		},
		error: function(err){
			// console.log(err);
		},

	})
}
