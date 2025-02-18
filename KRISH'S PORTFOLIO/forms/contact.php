<?php
  // Define the receiving email address
  $receiving_email_address = 'krishpareek58@gmail.com';  // Replace with your real email

  // Check if the PHP Email Form library exists
  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
  } else {
    die('Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  // Set up the form to send the email
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = "New Message from your website";

  
  // Add messages from form inputs
  $contact->add_message($_POST['name'], 'From');
  $contact->add_message($_POST['email'], 'Email');
  $contact->add_message($_POST['message'], 'Message', 10);

  // Send the email and output the result
  echo $contact->send();
?>
