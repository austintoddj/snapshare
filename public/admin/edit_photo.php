<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) {
    redirect_to("login.php");
}
?>

<?php include_layout_template('admin_header.php'); ?>
<?php
$photo = Photograph::find_by_id($_GET['id']);
?>

<?php

if (isset($_POST['submit'])) {

    $id      = $_GET["id"];
    $caption = str_replace("'", "", $_POST['caption']);
//    $caption = $_POST["caption"];

    $query = "UPDATE photographs SET ";
    $query .= "caption = '{$caption}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";

    $result = $photo->update_caption($query);

    if ($result) {
        // Success
        $_SESSION['messages'] = "You're changes have been saved";
        redirect_to("edit_photo.php?id=" . $photo->id);
    } else {
        // Failure
        $_SESSION['messages'] = "No changes have been made";
    }
}

?>

    <!-- Page Content -->
    <div class="container">

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Photo Editor
                <small>tell your story</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="photo_upload.php">Manager</a></li>
        <li class="active">Editor</li>
    </ol>

    <?php echo messages(); ?>
    <?php echo form_errors($errors); ?>
    <?php echo login_errors(); ?>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <center>
                    <p class="lead"><?php echo $photo->caption; ?></p>

                    <form action="edit_photo.php?id=<?php echo $photo->id; ?>" method="POST">
                        <div class="form-group">
                            <img class="thumbnail" src="../<?php echo $photo->image_path(); ?>" style="width: 200px;">
                        </div>
                        <div class="form-group">
                            <label>Caption</label>
                            <input type="text" name="caption" class="form-control" id="caption"
                                   value="<?php echo $photo->caption; ?>">
                        </div>
                        <input type="submit" name="submit" class="btn btn-success" value="Save Changes">&nbsp;&nbsp;<a
                            href="photo_upload.php">Cancel</a>
                    </form>
                </center>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <hr>

<?php include_layout_template('admin_footer.php'); ?>