<?php
    $to = "info@ltcclock.com"; // <<<<<< TODO: Replace with your email.    
    $from = "";
    $subject = "New Message Received";
    $body = "";
    $error = "";

    foreach ($_POST as $param_name => $param_val) {
        $body .= ucwords(str_replace("_", " ", $param_name)) . ": " . $param_val . "\n";
    }

    if(isset($_POST['email'])) {
        $from = $_POST['email'];
    } else if(isset($_POST['contact_email'])) {
        $from = $_POST['contact_email'];
    } else if(isset($_POST['contact-email'])) {
        $from = $_POST['contact-email'];
    }

    if($from != "") {
        $success = mail($to, $subject, $body, "From:".$from);
    } else {
        $error = "Email is required";
    }
    
    if ($success && $error == ""){
        echo "success";
    } else {
        if($error == ""){
            echo "Something went wrong :(";
        } else {
            echo $error;
        }
    } 
?>
