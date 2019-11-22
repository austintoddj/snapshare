<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <center><p class="text-muted">&copy; <?php echo date("Y", time()); ?> SnapShare | Design by Imagine Studios</p></center>
        </div>
    </div>
    <!-- /.row -->
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="../javascripts/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../javascripts/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="../js/bootstrap-image-gallery.js"></script>

</body>

</html>

<?php if(isset($database)) { $database->close_connection(); } ?>