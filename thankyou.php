  <!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <head>
        <title>Your Email Title Here</title>

    <!-- Essential meta tags for email rendering -->
    <meta name="description" content="Brief description of your email content">
    <meta name="author" content="Your Company Name or Email Sender">
    
    <!-- Favicon (optional) -->
    <link rel="icon" href="path/to/favicon.ico" type="image/x-icon">

    <!-- Link to external CSS (optional, but recommended for styling) -->
    <style>
        /* Place your internal or inline CSS here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1, h2, h3 {
            color: #333;
        }
        p {
            color: #666;
        }
    </style>
<!-- Preheader text (optional, appears in inbox preview) -->
    <style>
        .preheader {
            display: none; 
            font-size: 1px;
            color: #ffffff;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
        }
    </style>
</head>
<body>
  <?php


//Change your configurations here.
//---------------------------------
$priority="2";// 1-Normal,2-Priority,3-Marketing
$method="POST";
require_once('class.phpmailer.php');
$message = '';
		
		$message .= "Name:".$_POST['name']."\n";
		$message .= "City:".$_POST["city"]."\n";
		$message .= "Contact Number (Mobile):".$_POST['mobile']."\n";
		$message .= "Age:".$_POST['message']."";
		date_default_timezone_set('Asia/Kolkata');
		$date=date("Y-m-d H:i:s");
		
$message = $message .""	;
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

//$mail->IsSMTP(); // telling the class to use SMTP

try {
 
  $mail->Host       = "smtp.gmail.com"; // SMTP server
  $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = "smtp.gmail.com"; // sets the SMTP server
  $mail->Port       = 465; //465,587;     
  $mail->Username   = "info@vrutant.in"; // SMTP account username
  $mail->Password   = " Support!@2022";        // SMTP account password
  $mail->SMTPSecure = "ssl";
  $mail->AddAddress('richhairmessage@gmail.com', 'info');
  
  $mail->SetFrom('info@hairaestheticsclinic.com', 'Enquiry');

  $mail->Subject = 'Enquiry Form_'.$date;
  $mail->AltBody = ' '; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML($message);
  
 
  
 $mail->Send();
  $result = "<span style='font-size:16px'>Thanks for enquiring with us ! <br><br> Our public relations manager will get back to you soon. <br><br></span>";
// mobile send code  
            echo "<script>alert('Message Send Successfully');if(alert){window.location='index.html';}</script>";
         
  	
} catch (phpmailerException $e) {
  $result= $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  $result=$e->getMessage(); //Boring error messages from anything else!
}



?>
</body>
</html>
