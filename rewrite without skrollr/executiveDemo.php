<link href="style/main2.css" rel="stylesheet" type="text/css" />
<link href="style/style-forms.css" type="text/css" rel="stylesheet"  />
<link href="http://fonts.googleapis.com/css?family=Lato:100,400,900,100italic,400italic" rel="stylesheet" type="text/css">
    <a href="http://www.cambeogroup.com"><div id="logo" 
        data-0="background-position[sqrt]: 0px 0px; opacity[sqrt]: 1; z-index:500; display: inline;" 
        data-200="opacity:0; z-index:-500; display: none; background-position: 0px -100px;"></div></a>
<div id="emailresponse">
<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
  //$email_to = "ben.horton@cambeogroup.com";
   $email_to = "ben.horton@cambeogroup.com, hunter@cambeogroup.com, vaughn@cambeogroup.com, lloyd.weffer@cambeogroup.com, trevor@cambeogroup.com";

  $email_subject = "Executive Demonstration Request";
     
     
  function died($error) {
      // your error code can go here
      echo "<h2>An error occurred:</h2>";
      echo $error;
      echo "<h1>Please navigate your browser back.</h1>";
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
  if (!isset($_POST['name'], $_POST['company'], $_POST['email'])) {
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
    $comp_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($comp_exp,$company)) {
    $error_message .= '<h3>The format of your company name does not appear to be valid.<br /></h3>';
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
<p>Your request for a</p><p>CAMBEO PRO Executive Demo</p><p>has been successfully submitted!</p>

</div>
  
<?php
}
die();
?>