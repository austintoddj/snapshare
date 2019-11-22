<?php

require_once('../../includes/initialize.php');

if ($session->is_logged_in()) {
    redirect_to("index.php");
}

if (isset($_POST['submit'])) {

    // Validations
    $required_fields = array("first_name", "last_name", "username", "email", "password");
    validate_presences($required_fields);

    $user_exists = User::find_by_username($_POST['username']);
    if (!$user_exists) {
        if (empty($errors)) {

            // Attempt to create user
            $first_name = trim($_POST['first_name']);
            $last_name  = trim($_POST['last_name']);
            $username   = trim($_POST['username']);
            $email      = trim($_POST['email']);
            $password   = trim($_POST['password']);
            $time       = date('Y-m-d');

            $user             = new User();
            $user->first_name = $first_name;
            $user->last_name  = $last_name;
            $user->username   = $username;
            $user->email      = $email;
            $user->password   = $password;
            $user->created    = $time;
            $user->create();

            $result = $database->affected_rows();
            if ($result) {
                // Success
                $_SESSION['messages'] = "Welcome! Please log in to your new account";
                redirect_to('login.php');
            } else {
                // Failure
                $_SESSION['login_errors'] = "Sorry, we were unable to create your account";
            }
        }
    } else {
        $_SESSION['login_errors'] = "Sorry, that username already exists";
    }
}

?>

<?php include('../layouts/login_header.php'); ?>

    <div class="login-box">
        <div class="login-container">

            <h1>Sign Up</h1>

            <?php echo form_errors($errors); ?>
            <?php echo login_errors(); ?>

            <br/>

            <form action="register.php" method="post" role="form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input name="first_name" type="text" class="form-control" id="first_name"
                                   value="<?php echo !empty($_POST['first_name']) ? $_POST['first_name'] : '' ?>"
                                   placeholder="First Name" autofocus/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input name="last_name" type="text" class="form-control" id="last_name"
                                   value="<?php echo !empty($_POST['last_name']) ? $_POST['last_name'] : '' ?>"
                                   placeholder="Last Name"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" id="username"
                                   value="<?php echo !empty($_POST['username']) ? $_POST['username'] : '' ?>"
                                   placeholder="Username"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input name="email" type="text" class="form-control" id="email"
                                   value="<?php echo !empty($_POST['email']) ? $_POST['email'] : '' ?>"
                                   placeholder="Email"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" id="password" value=""
                                   placeholder="Password"/>

                            <i class="text-muted">For added security, use upper and lower case letters, numbers, and
                                symbols</i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Create Account" class="btn btn-success"/><a
                        href="login.php"><strong>&nbsp;&nbsp;Cancel</strong></a>
                </div>
            </form>
        </div>
    </div>

<?php include('../layouts/login_footer.php');
