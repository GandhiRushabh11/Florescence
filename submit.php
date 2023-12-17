<?php
$msg="";
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['subject'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$subject=$_POST['subject'];
	$country=$_POST['country'];
	$message=$_POST['message'];
	
	// mysqli_query($con,"insert into contact_us(name,email,mobile,comment) values('$name','$email','$mobile','$comment')");
	 $msg="Your message has been sent. Thank you!";
	 $html1="<html>
	 <head>
	 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	 <style>
	 .card {
	   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	   max-width: 300px;
	   margin: auto;
	   text-align: center;
	   font-family: arial;
	   background-color: #D8D8D8;
	 }
	 
	 .title {
	   color: grey;
	   font-size: 18px;
	 }
	 
	 button {
	   border: none;
	   outline: 0;
	   display: inline-block;
	   padding: 8px;
	   color: white;
	   background-color: #000;
	   text-align: center;
	   cursor: pointer;
	   width: 100%;
	   font-size: 18px;
	 }
	 
	 a {
	   text-decoration: none;
	   font-size: 18px;
	   color: black;
	 }
	 
	  a:hover {
	   opacity: 0.7;
	 }
	 </style>
	 </head>
	 <body>
	 
	 
	 
	 <div class='card'>
		 <h2 style='text-align:center'>Florescence</h2>
	   <h3>Thank you for contacting us </h3>
	   <p class='title'>Customer Support Service</p>
	   <p class='title'>Dairy Business Consultant | P. M. Electronics</p>
	   <p>E-mail: <a href='mailto:service@florescence.co.in'>service@florescence.co.in</a></p>
	   <p><button disabled='true'>We will get back to you soon...</button></p>
	 </div>
	 
	 </body>
	 </html>";
	$html="
	<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: ' ';
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
	<body>
	
	<center><h2>Conatct Inquery</h2></center>
	
	<div class='container'>
	  <form>
		<div class='row'>
		  <div class='col-25'>
			<label for='fname'>Name</label>
		  </div>
		  <div class='col-75'>
			<textarea id='subject' style='height:50px' readonly>$name</textarea>
		  </div>
		</div>
		<div class='row'>
		  <div class='col-25'>
			<label for='lname'>Email</label>
		  </div>
		  <div class='col-75'>
			<textarea id='subject'  style='height:50px'readonly>$email</textarea>
		  </div>
		</div>
		<div class='row'>
		  <div class='col-25'>
			<label for='lname'>Conatct No</label>
		  </div>
		  <div class='col-75'>
			<textarea id='subject'  style='height:50px'readonly>$mobile</textarea>
		  </div>
		</div>
		<div class='row'>
		  <div class='col-25'>
			<label for='country'>Country</label>
		  </div>
		  <div class='col-75'>
			<select id='country' name='country'>
			  <option value='australia'readonly>$country</option>
			</select>
		  </div>
		</div>
		<div class='row'>
		  <div class='col-25'>
			<label for='subject'>Message</label>
		  </div>
		  <div class='col-75'>
			<textarea id='subject' readonly style='height:100px'>$message</textarea>
		  </div>
		</div>
	  </form>
	</div>
	
	</body>
	</html>";
	include('smtp/PHPMailerAutoload.php');
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['subject'])&& isset($_POST['country'])&& isset($_POST['message']))
	{
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="YOUR_EMAIL_ID";
	$mail->Password="YOUR_EMAIL_PASS";
	$mail->SetFrom("YOUR_EMAIL_ID");
	$mail->addAddress("YOUR_EMAIL_ID");
	$mail->IsHTML(true);
	$mail->Subject="$subject From Florescence Inquery Form ";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		//echo "Mail send";
	}else{
		//echo "Error occur";
	}
	}
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['subject'])&& isset($_POST['country'])&& isset($_POST['message']))
	{
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="YOUR_EMAIL_ID";
	$mail->Password="YOUR_EMAIL_PASS";
	$mail->SetFrom("YOUR_EMAIL_ID");
	$mail->addAddress($email);
	$mail->IsHTML(true);
	$mail->Subject="Thanks From Florescence Inquery Form ";
	$mail->Body=$html1;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		//echo "Mail send";
	}else{
		//echo "Error occur";
	}
	echo $msg;
	}
}
?>