<?php

require_once('../../includes/initialize.php');
if ($session->is_logged_in()) {
    redirect_to("index.php");
}

$username = "";

if (isset($_POST['submit'])) {

    // Validations
    $required_fields = array("username", "password");
    validate_presences($required_fields);

    if (empty($errors)) {
        // Attempt Login

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // check to see if the username/password exist
        $found_user = User::authenticate($username, $password);

        if ($found_user) {
            $session->login($found_user);
            log_action('User login', "{$found_user->username}");
            redirect_to("index.php");
        } else {
            $_SESSION['login_errors'] = "Incorrect username or password";
        }
    }
}


?>

<?php include('../layouts/login_header.php'); ?>

    <div class="login-box">
        <div class="login-container">

            <h1>Sign In</h1>

            <?php echo messages(); ?>
            <?php echo form_errors($errors); ?>
            <?php echo login_errors(); ?>

            <br/>

            <form action="login.php" method="POST" role="form">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" maxlength="30" id="username"
                           value="<?php echo $username; ?>" autofocus placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" maxlength="30" id="password" value=""
                           placeholder="Password">

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Sign In">&nbsp;&nbsp;<strong>Or&nbsp;&nbsp;</strong><a
                    href="register.php"><strong>Sign Up</strong></a>
            </form>
            <hr>
            <center><a href="../index.php"><strong>Lost? Back to SnapShare</strong></a></center>
        </div>
    </div>

<?php include('../layouts/login_footer.php');
