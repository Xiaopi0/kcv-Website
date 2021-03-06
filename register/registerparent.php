<?php
// Include config file
require_once "../cfg/config.php";

// Define variables and initialize with empty values
$username = $email = $password = $confirm_password = $approval_code = "";
$username_err = $email_err = $password_err = $confirm_password_err = $approval_code_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["email"]))){
      $email_err = "Please provide an email";
    } else{
      $sql = "SELECT id FROM parents WHERE email = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        $param_email = trim($_POST["email"]);

        if(mysqli_stmt_execute($stmt)){

          mysqli_stmt_store_result($stmt);

          if(mysqli_stmt_num_rows($stmt) == 1){
            $email_err = "Email already in use.";
          } else {
            $email = trim($_POST["email"]);
          }
        } else {
          echo "Oops! Something went wrong. Please try again later.";
        }
      }
    }

    $XCode = "Phdoz3nY!dqlN9L%i3BUXJPTqSGgtKV6MbrSGL@ZSa8p^QzDIv";

    if(empty(trim($_POST["approvalcode"]))){
      $approval_code_err = "Please enter an approvalcode";
    } else{
      $approvalcode = trim($_POST["approvalcode"]);
      //$mysql_approval_code_result = mysql_query('SELECT XCode FROM approvalcodes WHERE Type = "pupil"', $link);
      if($approvalcode === $XCode){
        $approval_code = trim($_POST["approvalcode"]);
      }else {
        $approval_code_err = "Wrong code";
      }
    }

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM parents WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($approval_code_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO parents (username, password, email) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_email);

            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../login/loginparent.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-gruop <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
              <label>Email</label>
              <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
              <span class="help-block"><?php echo $email_err ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($approval_code_err)) ? 'has-error' : ''; ?>">
                <label>Approval Code</label>
                <input type="text" name="approvalcode" class="form-control" value="<?php echo $approval_code; ?>">
                <span class="help-block"><?php echo $approval_code_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="../login/loginpupil.php">Login here(as pupil)</a>.</p>
            <p>Already have an account? <a href="../login/loginteacher.php">Login here(as as teacher)</a>.</p>
            <p>Already have an account? <a href="../login/loginparent.php">Login here(as parent)</a>.</p>
        </form>
    </div>
</body>
</html>
