<link href="style/style-forms.css" type="text/css" rel="stylesheet"  />   
<div id="emailresponse" style="margin:50px 0 0 50px; width:400px;">
<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
  $email_to = "ben.horton@cambeogroup.com, hunter@cambeogroup.com, vaughn@cambeogroup.com, lloyd.weffer@cambeogroup.com, trevor@cambeogroup.com";

  $email_subject = "Executive Demonstration Request";
     
     
  function died($error) {
      // your error code can go here
      echo "<h2>An error occurred.</h2>";
      echo $error."<br /><br />";
      echo "<h1>Please navigate your browser back.<br /><br /></h1>";
      die();
  }
   
  // validation expected data exists
  // if (!isset($_POST['interest']) ||
  // !isset($_POST['first_name']) ||
  //     !isset($_POST['last_name']) ||
  //     !isset($_POST['email']) ||
  //     !isset($_POST['telephone']) ||
  // !isset($_POST['interest']) ||
  //     !isset($_POST['comments'])) {
  //     died('<h3>Looks like you made some errors in the form.</h3>');       
  // }
  if (!isset($_POST['name']) ||
      !isset($_POST['company']) ||
      !isset($_POST['email'])) {
      died('<h3>Please fill in all fields.</h3>');       
  }
  
// $interest = $_POST['interest']; // required
//    $first_name = $_POST['first_name']; // required
//    $last_name = $_POST['last_name']; // required
//    $email_from = $_POST['email']; // required
//    $telephone = $_POST['telephone']; // not required
//    $comments = $_POST['comments']; // required
  $name       = $_POST['name'   ]; // required
  $company    = $_POST['company']; // required
  $email_from = $_POST['email'  ]; // required
   
  $error_message = "";
  $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= '<h3>The format of the email address you entered does not appear to be valid.<br /></h3>';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= '<h3>The format of your name does not appear to be valid.<br /></h3>';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Company: ".clean_string($company)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
Your request for a CAMBEO PRO Executive Demo has been successfully submitted!
</div>

<?php
}
die();
?>