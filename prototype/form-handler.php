<?php
  // The global $_POST variable allows you to access the data sent with the POST method by name
  // To access the data sent with the GET method, you can use $_GET
  $name = htmlspecialchars($_POST['user_name']);
  $email = htmlspecialchars($_POST['user_email']);
  $subject = htmlspecialchars($_POST['email_subject']);
  $message = htmlspecialchars($_POST['email_message']);

  echo $user_name $user_email $email_subject $email_message;
?>
