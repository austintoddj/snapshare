<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()){
    redirect_to("login.php");
}
?>

<?php if (empty($_GET['id'])) {
    $session->message("No photo image ID was provided.");
    redirect_to('photo_upload.php');
}

$photo = Photograph::find_by_id($_GET['id']);
if ($photo && $photo->destroy()) {
    $_SESSION['messages'] = ("Your photo has been deleted");
    redirect_to('photo_upload.php');
} else {
    $_SESSION['login_errors'] = "The photo could not be deleted. Please try again";
    redirect_to('photo_upload.php');
}

?>

<?php if (isset($database)) { $database->close_connection(); } ?>