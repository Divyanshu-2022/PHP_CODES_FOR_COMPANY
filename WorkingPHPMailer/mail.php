<?php
if($_POST) {
    $name = "";
    $email = "";
    $phone = "";
    $message = "";
    
    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        
    }
    
    if(isset($_POST['phone'])) {
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    }
    
    
    if(isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
    }
    // $recipient = "digitalmarketing@inframantra.com";
//     $recipient = "";From whom we are getting the mail 
    
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type:text/html; charset=utf-8' . "\r\n"
    .'From: ' .$email . "\r\n";
    $email_content = "<html><body>";
    $email_content .= "<tr><td style='background: #eee; padding: 10px;'>Name:</td><td style='background: #fda; padding: 10px;'>$name</td></tr>";
    $email_content .= "<tr><td style='background: #eee; padding: 10px;'>Email:</td><td style='background: #fda; padding: 10px;'>$email</td></tr>";
     $email_content .= "<tr><td style='background: #eee; padding: 10px;'> Phone:</td><td style='background: #fda; padding: 10px;'>$phone</td></tr>";
    $email_content .= "<tr><td style='background: #eee; padding: 10px;'>Message:</td><td style='background: #fda; padding: 10px;'>$message</td></tr>";
    $email_content .= '</body></html>';
    
    echo $email_content;
    
    if(mail($recipient, "Form Submitted Sucessfully. We Will Get Back  to You Soon", $email_content, $headers)) {
        echo '<p>Thank you for Vising Us.</p>';
    } else {
        echo '<p>We are sorry but the Form Submission email did not go through.</p>';
    }
    
} else {
    echo '<p>Something went wrong</p>';
}
?>


















