<?php require_once('../../includes/initialize.php'); ?>
<?php
if (!$session->is_logged_in()) {
    redirect_to("login.php");
    return;
}

$logfile = dirname(SITE_ROOT) . DS . 'logs' . DS . 'log.txt';

if (isset($_GET['clear']) && $_GET['clear'] == 'true') {
    file_put_contents($logfile, '');
    // Add the first log entry
    log_action('Log history cleared', "{$_SESSION['username']}");
}
?>

<?php include_layout_template('admin_header.php'); ?>

<!-- Page Content -->
<div class="container">

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">System
                <small>Manage and Configure</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">System</li>
    </ol>

    <div class="container-fluid">
        <div class="row">
            <center>
                <div class="row placeholders">
                    <div class="col-md-4 col-xs-4 placeholder">
                        <div class="thumbnail">
                            <a href="http://snapshare.dev/phpmyadmin" target="_blank">
                                <img src="../img/database.png" class="img-responsive" style="width:100px;"
                                     data-holder-rendered="true">

                                <div class="caption">
                                    <h4>Database</h4>
                            </a>
                            <span class="text-muted">Mangage your databases</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 placeholder">
                    <div class="thumbnail">
                        <a href="https://snapshare.dev:8000" target="_blank">
                            <img src="../img/server.png" class="img-responsive" style="width:100px;"
                                 data-holder-rendered="true">

                            <div class="caption">
                                <h4>Server</h4>
                        </a>
                        <span class="text-muted">Configure your server</span>
                    </div>
                </div>
        </div>
        <div class="col-md-4 col-xs-4 placeholder">
            <div class="thumbnail">
                <a href="mailto:support@imaginestudioswebdesign.com">
                    <img src="../img/support.png" class="img-responsive" style="width:100px;"
                         data-holder-rendered="true">

                    <div class="caption">
                        <h4>Support</h4>
                </a>
                <span class="text-muted">Stuck? Let us help you</span>
            </div>
        </div>
    </div>
</div>
</center>
</div>
</div>

<br>

<table class="table table-condensed">
    <tr>
        <th>Action</th>
        <th>User</th>
        <th>Time</th>
        <th>Date</th>
    </tr>

    <?php
    if (file_exists($logfile) && is_readable($logfile) && $handle = fopen($logfile, 'r')) {
        // read
        while (!feof($handle)) { ?>

            <?php
            $entry = fgets($handle);
            $log   = unserialize($entry);
            ?>

            <tr>
                <td><?php echo $log['action']; ?></td>
                <td><?php echo $log['user']; ?></td>
                <td><?php echo $log['time']; ?></td>
                <td><?php echo $log['date']; ?></td>
            </tr>
        <?php } ?>
    <?php } ?>

</table>
<a href="logfile.php?clear=true">
    <button type="button" class="btn btn-danger"
            onclick="return confirm('Are you sure? This action will delete the entire log history.')">Clear History
    </button>
</a>

<hr>

<?php include_layout_template('admin_footer.php'); ?>
