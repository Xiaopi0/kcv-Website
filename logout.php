<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="511222597540-3i7bc2vmmnmv62jp040n7fnsffh1a4j0.apps.googleusercontent.com">
    <meta charset="utf-8">
    <title>Logout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
    var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          console.log('User signed out.');
        });
    </script>
  </head>
  <body>
    <p>
        <a href="login/loginpupil.php" class="btn btn-warning">Login as pupil</a>
        <a href="login/loginteacher.php" class="btn btn-warning">login as teacher</a>
        <a href="login/loginparent.php" class="btn btn-warning">login as parent</a>
    </p>
  </body>
</html>
