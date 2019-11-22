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

    <!-- Page Content -->
    <div class="container">

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">My Profile
                <small><?php echo $user->full_name(); ?></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">My Profile</li>
    </ol>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="">View</a></li>
        <li role="presentation"><a href="edit_profile.php">Edit</a>
        </li>
    </ul>

    <br/>

    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="../<?php if (!empty($user->filename)) { echo $user->image_path(); } else { echo '../profiles/default-user.png'; } ?>">

                <br/>

                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Joined <?php $time = strtotime($user->created);
                            $myFormatForView                              = date("F d, Y", $time);
                            echo $myFormatForView; ?></strong></div>
                    <ul class="list-group">
                        <li class="list-group-item"><i
                                class="fa fa-globe"></i>&nbsp;&nbsp;&nbsp;<?php echo "<a href='http://$user->website' target='_blank'>Website</a>"; ?>
                        </li>
                        <li class="list-group-item"><i
                                class="fa fa-facebook"></i>&nbsp;&nbsp;&nbsp;<?php echo "<a href='http://www.facebook.com/{$user->facebook}' target='_blank'>Facebook</a>"; ?>
                        </li>
                        <li class="list-group-item"><i
                                class="fa fa-twitter"></i>&nbsp;&nbsp;&nbsp;<?php echo "<a href='http://www.twitter.com/{$user->twitter}' target='_blank'>Twitter</a>"; ?>
                        </li>
                        <li class="list-group-item"><i
                                class="fa fa-linkedin"></i>&nbsp;&nbsp;&nbsp;<?php echo "<a href='http://www.linkedin.com/{$user->linkedin}' target='_blank'>LinkedIn</a>"; ?>
                        </li>
                        <li class="list-group-item"><i
                                class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;<?php echo "<a href='mailto:{$user->email}' target='_blank'>Email</a>"; ?>
                        </li>
                        <li class="list-group-item"><i
                                class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;<?php echo "<a href='tel:{$user->phone}' target='_blank'>Phone</a>"; ?>
                        </li>
                        <li class="list-group-item"><i
                                class="fa fa-location-arrow"></i>&nbsp;&nbsp;&nbsp;<?php echo $user->location; ?>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-sm-6 col-md-8">
            <p><span class="lead">About Me</span><br><br>
                <?php echo $user->biography; ?></p>

            <br>
            <hr>

            <p><span class="lead">Personal Details</span><br><br>

            <div class="row">
                <div class="col-md-4">
                    <label>Education</label>
                </div>
                <div class="col-md-8">
                    <?php echo $user->education; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Degree</label>
                </div>
                <div class="col-md-8">
                    <?php echo $user->degree; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Industry</label>
                </div>
                <div class="col-md-8">
                    <?php echo $user->industry; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Employer</label>
                </div>
                <div class="col-md-8">
                    <?php echo $user->employer; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Job Title</label>
                </div>
                <div class="col-md-8">
                    <?php echo $user->job_title; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Job Description</label>
                </div>
                <div class="col-md-8">
                    <?php echo $user->job_description; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Marital Status</label>
                </div>
                <div class="col-md-8">
                    <?php echo $user->marital_status; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Gender</label>
                </div>
                <div class="col-md-8">
                    <?php echo $user->gender; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Birthday</label>
                </div>
                <div class="col-md-8">
                    <?php $birthday_date = strtotime($user->birthday);
                    $myFormatForView                              = date("F d, Y", $birthday_date);
                    echo $myFormatForView; ?>
                </div>
            </div>
            </p>

        </div>
    </div>

    <hr>

<?php include_layout_template('admin_footer.php'); ?>