<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()){
    redirect_to("login.php");
}
?>

<?php
$max_file_size = 1048576;   // expressed in bytes
                            //     10240 =   10 KB
                            //    102400 =  100 KB
                            //  10248576 =    1 MB
                            //  10485760 =   10 MB

    $message = "";
    if (isset($_POST['submit'])) {

        $photo = new Photograph();
        $photo->caption = $_POST['caption'];
        $photo->attach_file($_FILES['file_upload']);
        if ($photo->save()) {
            $message = "Picture was uploaded successfully";
        } else {
            $_SESSION['login_errors'] = "There were some errors. Please try again";
        }
    }

?>

<?php include_layout_template('admin_header.php'); ?>

    <!-- Page Content -->
    <div class="container">

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Photo Manager
                <small>organize your story</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Upload</li>
    </ol>

    <?php echo output_message($message); ?>
    <?php echo form_errors($errors); ?>
    <?php echo login_errors(); ?>
    <?php echo messages(); ?>

    <div class="jumbotron">
        <center>
        <div class="container">
            <p>Max file upload: 1MB</p>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="photo_upload.php" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>">
                            <input type="file" name="file_upload" id="file_upload">
                        </div>
                        <div class="form-group">
                            <input type="text" name="caption" class="form-control" id="caption" placeholder="Caption">
                        </div>
                        <input type="submit" name="submit" class="btn btn-success" value="Save Photo">&nbsp;&nbsp;<a href="index.php">Cancel</a>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        </center>
    </div>

    <?php
    // current page number
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    // records per page
    $per_page = 10;

    // total record count
    $total_count = Photograph::count_all();

    $pagination = new Pagination($page, $per_page, $total_count);

    $sql  = "SELECT * FROM photographs ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()}";
    $photos = Photograph::find_by_sql($sql);

    // Need to add ?page=$page to all links we want to
    // maintain the current page (or store $page in $session)

    ?>

        <table class="table table-hover">
            <tr>
                <th>Photo</th>
                <th>Caption</th>
                <th>Size</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
            <?php foreach($photos as $photo): ?>
            <tr>
                <td><img src="../<?php echo $photo->image_path(); ?>" style="width: 75px;" ></td>
                <td><?php echo $photo->caption; ?></td>
                <td><?php echo $photo->size_as_text(); ?></td>
                <td><?php echo $photo->type; ?></td>
                <td><a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a> | <a href="delete_photo.php?id=<?php echo $photo->id; ?>" onclick="return confirm('Are you sure? This action will delete the photo for good.')">Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </table>

    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination pagination-sm">
                <?php

                if ($pagination->total_pages() > 1) {
                    if ($pagination->has_previous_page()) {
                        echo "<li>";
                        echo "<a href=\"photo_upload.php?page=";
                        echo $pagination->previous_page();
                        echo "\">&laquo;</a> ";
                        echo "</li>";
                    }

                    for ($i = 1; $i <= $pagination->total_pages(); $i++) {
                        if ($i == $page) {
                            echo "<li class=\"active\">";
                        } else {
                            echo "<li>";
                        }
                        echo "<a href=\"photo_upload.php?page={$i}\">{$i}";
                        echo "</a>";
                        echo "</li>";
                    }

                    if ($pagination->has_next_page()) {
                        echo "<li>";
                        echo "<a href=\"photo_upload.php?page=";
                        echo $pagination->next_page();
                        echo "\">&raquo;</a> ";
                        echo "</li>";
                    }
                }

                ?>
            </ul>
        </div>
    </div>
    <!-- /.row -->

<hr>

<?php include_layout_template('admin_footer.php'); ?>