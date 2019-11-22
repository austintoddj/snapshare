<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) {
    redirect_to("login.php");
}
?>

<?php include_layout_template('admin_header.php'); ?>
<?php
$user = new User();
$user = User::find_by_id($_SESSION['user_id']);
?>

<?php

if (isset($_POST['submit'])) {

    // Validations
    $required_fields = array(
        "first_name",
        "last_name",
        "email",
        "password"
    );
    validate_presences($required_fields);

    if (empty($errors)) {

        // Attempt to update user information
        $first_name      = trim($_POST['first_name']);
        $last_name       = trim($_POST['last_name']);
        $email           = trim($_POST['email']);
        $password        = trim($_POST['password']);
        $biography       = trim($_POST['biography']);
        $phone           = trim($_POST['phone']);
        $location        = trim($_POST['location']);
        $website         = trim($_POST['website']);
        $facebook        = trim($_POST['facebook']);
        $twitter         = trim($_POST['twitter']);
        $linkedin        = trim($_POST['linkedin']);
        $education       = trim($_POST['education']);
        $degree          = trim($_POST['degree']);
        $industry        = trim($_POST['industry']);
        $employer        = trim($_POST['employer']);
        $job_title       = trim($_POST['job_title']);
        $job_description = trim($_POST['job_description']);
        $marital_status  = trim($_POST['marital_status']);
        $gender          = trim($_POST['gender']);
        $birthday        = trim($_POST['birthday']);
        $photo           = $_FILES['file_upload'];

        $user->first_name      = $first_name;
        $user->last_name       = $last_name;
        $user->email           = $email;
        $user->password        = $password;
        $user->biography       = $biography;
        $user->phone           = $phone;
        $user->location        = $location;
        $user->website         = $website;
        $user->facebook        = $facebook;
        $user->twitter         = $twitter;
        $user->linkedin        = $linkedin;
        $user->education       = $education;
        $user->degree          = $degree;
        $user->industry        = $industry;
        $user->employer        = $employer;
        $user->job_title       = $job_title;
        $user->job_description = $job_description;
        $user->marital_status  = $marital_status;
        $user->gender          = $gender;
        $user->birthday        = $birthday;
        $user->attach_file($photo);

        $user->save();

        $result = $database->affected_rows();
        if ($result) {
            // Success
            $_SESSION['messages'] = "You're changes have been saved";
            redirect_to('edit_profile.php');
        } else {
            // Failure
            $_SESSION['messages'] = "No changes have been made";
        }
    }
}

?>

    <!-- Page Content -->
    <div class="container">

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Profile
                <small><?php echo $user->full_name(); ?></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="profile.php">My Profile</a></li>
        <li class="active">Edit Profile</li>
    </ol>

    <ul class="nav nav-tabs">
        <li role="presentation"><a href="profile.php">View</a></li>
        <li role="presentation" class="active"><a href="">Edit</a>
        </li>
    </ul>

    <br>

<?php echo messages(); ?>
<?php echo form_errors($errors); ?>
<?php echo login_errors(); ?>

    <!-- Begin form -->
    <form action="edit_profile.php" method="POST" role="form" enctype="multipart/form-data">
    <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="../<?php if (!empty($user->filename)) { echo $user->image_path(); } else { echo '../profiles/default-user.png'; } ?>">
                <div class="panel-body">
                    <div class="col-md-12">
                        <label>Profile Picture</label>
                        <input type="file" name="file_upload" id="file_upload">
                    </div>
                </div>

                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Joined <?php $time = strtotime($user->created);
$myFormatForView                                                              = date("F d, Y", $time);
echo $myFormatForView; ?></strong></div>
                        <div class="panel-body">
                        <div class="col-md-12">
                            <label>Website</label>
                            <input name="website" type="text" class="form-control" id="website"
                                       value="<?php echo $user->website; ?>"/>
                           <i class="text-muted">www.example.com</i>
                        </div>
                        </div>
                        <div class="panel-body">
                        <div class="col-md-12">
                        <label>Facebook</label>
                            <input name="facebook" type="text" class="form-control" id="facebook"
                                       value="<?php echo $user->facebook; ?>"/>
                           <i class="text-muted">www.facebook.com/example</i>
                        </div>
                        </div>
                        <div class="panel-body">
                        <div class="col-md-12">
                        <label>Twitter</label>
                            <input name="twitter" type="text" class="form-control" id="twitter"
                                       value="<?php echo $user->twitter; ?>"/>
                           <i class="text-muted">www.twitter.com/example</i>
                        </div>
                        </div>
                        <div class="panel-body">
                        <div class="col-md-12">
                        <label>LinkedIn</label>
                            <input name="linkedin" type="text" class="form-control" id="linkedin"
                                       value="<?php echo $user->linkedin; ?>"/>
                           <i class="text-muted">www.linkedin.com/example</i>
                        </div>
                        </div>
                        <div class="panel-body">
                        <div class="col-md-12">
                        <label>Email</label>
                            <input name="email" type="text" class="form-control" id="email"
                                       value="<?php echo $user->email; ?>"/>
                           <i class="text-muted">example@gmail.com</i>
                        </div>
                        </div>
                        <div class="panel-body">
                        <div class="col-md-12">
                        <label>Phone</label>
                            <input name="phone" type="text" class="form-control" id="phone"
                                       value="<?php echo $user->phone; ?>"/>
                           <i class="text-muted">1-800-123-4567</i>
                        </div>
                        </div>
                        <div class="panel-body">
                        <div class="col-md-12">
                        <label>Location</label>
                            <input name="location" type="text" class="form-control" id="location"
                                       value="<?php echo $user->location; ?>"/>
                           <i class="text-muted">City, State</i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-8">
                <p><span class="lead">About Me</span><br><br>

                    <textarea style="resize:vertical;" class="form-control" rows="5" name="biography"
                          id="bio"><?php echo $user->biography; ?></textarea>
                        <i class="text-muted">About yourself in 700 characters or less.</i>
</p>
                <br>
                <hr>

                <p><span class="lead">Personal Details</span><br><br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Education</label>
                        </div>
                        <div class="col-md-8">
                            <input name="education" type="text" class="form-control" id="education"
                                       value="<?php echo $user->education; ?>"/>
                                      <i class="text-muted">Where did you go to school?</i>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Degree</label>
                        </div>
                        <div class="col-md-8">
                            <input name="degree" type="text" class="form-control" id="degree"
                                       value="<?php echo $user->degree; ?>"/>
                                       <i class="text-muted">What did you study?</i>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Industry</label>
                        </div>
                        <div class="col-md-8">
                            <input name="industry" type="text" class="form-control" id="industry"
                                       value="<?php echo $user->industry; ?>"/>
                                       <i class="text-muted">ie. Medical, technology, social services</i>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Employer</label>
                        </div>
                        <div class="col-md-8">
                            <input name="employer" type="text" class="form-control" id="employer"
                                       value="<?php echo $user->employer; ?>"/>
                                       <i class="text-muted">Who do you currently work for?</i>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Job Title</label>
                        </div>
                        <div class="col-md-8">
                            <input name="job_title" type="text" class="form-control" id="job_title"
                                       value="<?php echo $user->job_title; ?>"/>
                                       <i class="text-muted">What kind of job do you do?</i>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Job Description</label>
                        </div>
                        <div class="col-md-8">
                            <textarea style="resize:vertical;" class="form-control" rows="5" name="job_description"
                                          id="bio"><?php echo $user->job_description; ?></textarea>
                                          <i class="text-muted">Describe your job in 300 characters or less.</i>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Marital Status</label>
                        </div>
                        <div class="col-md-8">
                            <input name="marital status" type="text" class="form-control" id="marital_status"
                                       value="<?php echo $user->marital_status; ?>"/>
                                       <i class="text-muted">ie. Single, married, complicated, looking</i>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Gender</label>
                        </div>
                        <div class="col-md-8">
                            <input name="gender" type="text" class="form-control" id="gender"
                                       value="<?php echo $user->gender; ?>"/>
                                       <i class="text-muted">Male, female</i>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Birthday</label>
                        </div>
                        <div class="col-md-8">
                            <input name="birthday" type="text" class="form-control" id="birthday"
                                       value="<?php echo $user->birthday; ?>"/>
                                       <i class="text-muted">Year-Month-Day</i>
                        </div>
                    </div>
                </p>

                <br>
                <hr>

                <p><span class="lead">Account Settings</span><br><br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>First Name</label>
                        </div>
                        <div class="col-md-8">
                            <input name="first_name" type="text" class="form-control" id="first_name"
                                       value="<?php echo $user->first_name; ?>"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Last Name</label>
                        </div>
                        <div class="col-md-8">
                            <input name="last_name" type="text" class="form-control" id="last_name"
                                       value="<?php echo $user->last_name; ?>"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-md-4">
                                <label>Username</label>
                            </div>
                            <div class="col-md-8">
                                <input disabled name="username" type="text" class="form-control" id="username"
                                           value="<?php echo $user->username; ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Password</label>
                            </div>
                            <div class="col-md-8">
                                <input name="password" type="password" class="form-control" id="password"
                                           value="<?php echo $user->password; ?>"/>
                                           <i class="text-muted">For added security, use upper and lower case letters, numbers, and symbols</i>
                            </div>
                        </div>

                </div>
            </div>
        </div>
        </div>
            <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                    <center><input type="submit" name="submit" value="Save Changes" class="btn btn-success"/>&nbsp;&nbsp;<a
                                    class="btn btn-danger" href="delete_profile.php"
                                    onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</a>&nbsp;&nbsp;<a
                                    href="profile.php"/>Cancel</a></center>
                                </div>
                        </div>
                    </div>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
    <!-- End Page Content -->

    <hr>

<?php include_layout_template('admin_footer.php'); ?>