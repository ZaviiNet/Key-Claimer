<!DOCTYPE html>
<html>
   <head>
      <title>Example Title</title>
      <style>
    body {
         padding: 20px;
      }
h1 {
         color: navy;
         font-family: sans-serif;
         font-size: 24px;
      }
         /* Style the claim button and Keys */
         #claim-button {
         font-size: 20px;
         padding: 10px 20px;
         background-color: #4CAF50;
         color: white;
         cursor: pointer;
         }
.error {
    color: red;
  }
  .success {
    color: green;
  }
form {
    width: 400px;
    margin: 0 auto;
    font-family: Arial;
  }
  input[type=email], input[type=submit] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
  }
  input[type=submit] {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
  }
p {
    font-family: arial;
}
      </style>
      <script src="https://www.google.com/recaptcha/api.js"></script>
   </head>
   <body>
      <center><h1>Example Title Key Claimer</h1>
      <p>Keys are 1 per User, a valid email address is required</p>

<?php

// Read the steam keys from a CSV file and store them in an array
$tickets = array();
$file = fopen('keys.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $keys[] = $line[0];
}
fclose($file);

// Read the email addresses from a CSV file and store them in an array
$emails = array();
$file = fopen('emails.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $emails[] = $line[0];
}
fclose($file);
echo "<center><p>There are  " . count($emails) . " Keys Claimed</p></center>";

// When the user clicks the "Claim Key" button,
// check that they have entered a valid email address
if (isset($_POST['claim_key'])) {
  $email = $_POST['email'];
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (in_array($email, $emails)) {
      echo "<center><h1></br>You have already claimed a Key with this email address<h1></center>";
    } else {
      $randomIndex = array_rand($keys);
      $key = $keys[$randomIndex];
      echo "<center><p>Here is your Key $key </p></center>";

      // Remove the selected key from the array
      unset($keys[$randomIndex]);

      // Overwrite the keys CSV file with the updated array of keys
      $file = fopen('keys.csv', 'w');
      foreach ($keys as $key) {
        fputcsv($file, array($ticket));
      }
      fclose($file);

      // Append the email address to the email addresses CSV file
      $file = fopen('emails.csv', 'a');
      fputcsv($file, array($email));
      fclose($file);
    }
  } else {
    echo "<center><h1></br>Please enter a valid email address<h1></center>";
  }
}

?>
<div id="form-area">
<form method="post">
  <input type="email" name="email" placeholder="Enter your email">
<div class="g-recaptcha" data-sitekey="SITEKEY_API" data-callback="onSubmit" data-size="invisible">
  <input type="submit" name="claim_ticket" value="Claim Key">

</form>
<script>
      function onSubmit(token) {
        document.getElementById("form-area").submit();
      }
    </script>
</div>
 </body>
   </html>

