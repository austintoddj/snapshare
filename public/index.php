<?php require_once("../includes/initialize.php"); ?>

<?php include_layout_template('public_header.php'); ?>

<?php
// Find all photos
$photos = Photograph::find_all();
?>

    <!-- Page Content -->
    <div class="container">

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Share your story
                <small>one photo at a time</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <center>
        <div id="links">
            <?php foreach ($photos as $photo): ?>
                <a href="../<?php echo $photo->image_path(); ?>" title="<?php echo $photo->caption; ?>" data-gallery>
                    <img src="../<?php echo $photo->image_path(); ?>" alt="<?php echo $photo->caption; ?>">
                </a>
            <?php endforeach; ?>
        </div>
    </center>

    <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
    <div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        <!-- Controls for the borderless lightbox -->
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body next"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left prev">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary next">
                            Next
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <?php include_layout_template('public_footer.php'); ?>









<!--<style>-->
<!--    p.brb {-->
<!--        color: #c1c1c1;-->
<!--        text-align: center;-->
<!--        font-size:72px;-->
<!--        font-family:Helvetica Neue, Helvetica, Arial, sans-serif;-->
<!--        font-weight:100;-->
<!--        margin-top: 150px;-->
<!--    }-->
<!---->
<!--</style>-->
<!---->
<!--    <p class="brb">Be right back.</p>-->