    <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          All Rights Reserved by Mess. Designed and Developed by
          <a href="https://www.wrappixel.com">....</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo SITE_PATH; ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo SITE_PATH; ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo SITE_PATH; ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo SITE_PATH; ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo SITE_PATH; ?>dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo SITE_PATH; ?>dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo SITE_PATH; ?>dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="<?php echo SITE_PATH; ?>dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?php echo SITE_PATH; ?>assets/libs/flot/excanvas.js"></script>
    <script src="<?php echo SITE_PATH; ?>assets/libs/flot/jquery.flot.js"></script>
    <script src="<?php echo SITE_PATH; ?>assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo SITE_PATH; ?>assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?php echo SITE_PATH; ?>assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo SITE_PATH; ?>assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?php echo SITE_PATH; ?>assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo SITE_PATH; ?>dist/js/pages/chart/chart-page-init.js"></script>

    <script src="//cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo SITE_PATH; ?>ckeditor/ckeditor.js"></script>

    <script type="text/javascript">
        $(document).ready( function () {
        $('#dttable').DataTable();
    } );

        $(".redStar").css('color', 'red');

        // function to load image
        function loadImage(event){
            imgsrc=URL.createObjectURL(event.target.files[0]);
            $("#dispBannerImage").attr('src',imgsrc);   
        }

    </script>
    
  </body>
</html>
