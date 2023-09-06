<!-- Footer opened -->
 


<div class="modal fade" id="delete_modal">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-body">

                <h6>Are you sure to delete this information..!</h6>

                <div class="col-md-12 text-right">

                    <a type="button" class="btn btn-success btn-sm" id="delete_link" href="JavaScript:void(0);"> Confirm Delete </a>

                    <button class="btn btn-danger btn-sm" data-dismiss="modal"> Close </button>

                </div>

            </div>

        </div>

    </div>

</div>



<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

<script src="assets/plugins/jquery/jquery.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- <script src="assets/plugins/ionicons/ionicons.js"></script> -->

<script src="assets/plugins/moment/moment.js"></script>

<script src="assets/plugins/rating/jquery.rating-stars.js"></script>

<script src="assets/plugins/rating/jquery.barrating.js"></script>

<!-- <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script> -->

<!-- <script src="assets/plugins/perfect-scrollbar/p-scroll.js"></script> -->

<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<script src="assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- <script src="assets/plugins/sidebar/sidebar.js"></script> -->

<script src="assets/plugins/sidebar/sidebar-custom.js"></script>

<script src="assets/js/eva-icons.min.js"></script>

<!-- <script src="assets/plugins/chart.js/Chart.bundle.min.js"></script> -->

<script src="assets/plugins/raphael/raphael.min.js"></script>

<script src="assets/plugins/jquery.flot/jquery.flot.js"></script>

<script src="assets/plugins/jquery.flot/jquery.flot.pie.js"></script>

<script src="assets/plugins/jquery.flot/jquery.flot.resize.js"></script>

<script src="assets/plugins/jquery.flot/jquery.flot.categories.js"></script>

<script src="assets/js/dashboard.sampledata.js"></script>

<!-- <script src="assets/js/chart.flot.sampledata.js"></script> -->

<!-- <script src="assets/js/apexcharts.js"></script> -->

<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>

<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="assets/js/modal-popup.js"></script>

<script src="assets/js/index.js"></script>

<script src="assets/js/jquery.vmap.sampledata.js"></script>

<script src="assets/js/sticky.js"></script>

<script src="assets/js/bootstrap-toggle.min.js"></script>

<script src="assets/js/custom.js"></script>

<script src="assets/js/lightbox.js"></script>

<script src="assets/plugins/side-menu/sidemenu.js"></script>

<script src="assets/switcher/js/switcher.js"></script>



<script>

    function updateStatus(value, id, col, table) {

        $.ajax({

            type: "POST",

            url: "ajax_pages/accountstatusajax.php",

            data: {

                'id': id,

                'value': value,

                'table': table,

                'col': col

            },

            // dataType: "json",

            success: function (result) {

                if (result == 1) {

                    // alert(result);



                    Command:toastr["success"]("Posted job Approved")

                    toastr.options = {

                        "positionClass": "toast-top-right",

                        "preventDuplicates": false,

                        "onclick": null,

                        "showDuration": "300",

                        "hideDuration": "1000",

                        "timeOut": "2000",

                        "extendedTimeOut": "1000",

                        "showEasing": "swing",

                        "hideEasing": "swing",

                        "showMethod": "slideDown",

                        "hideMethod": "slideUp"

                    }

                    location.reload();

                }

                else {

                    Command:toastr["error"]("Posted job DisApproved")

                    toastr.options = {

                        "positionClass": "toast-top-right",

                        "preventDuplicates": false,

                        "onclick": null,

                        "showDuration": "300",

                        "hideDuration": "1000",

                        "timeOut": "2000",

                        "extendedTimeOut": "1000",

                        "showEasing": "swing",

                        "hideEasing": "swing",

                        "showMethod": "slideDown",

                        "hideMethod": "slideUp"

                    }

                }

            }

        });

    }



    function confirmDelete(url){ 

        jQuery('#delete_modal').modal('show', {backdrop: 'static'});

        jQuery('#delete_link').attr('href', url);

    }

</script>

<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>

<script src="assets/plugins/datatable/js/dataTables.dataTables.min.js"></script>

<script src="assets/plugins/datatable/js/dataTables.responsive.min.js"></script>

<script src="assets/plugins/datatable/js/responsive.dataTables.min.js"></script>

<script src="assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>

<script src="assets/plugins/datatable/js/dataTables.buttons.min.js"></script>

<script src="assets/plugins/datatable/js/buttons.bootstrap4.min.js"></script>

<script src="assets/plugins/datatable/js/jszip.min.js"></script>

<script src="assets/plugins/datatable/js/pdfmake.min.js"></script>

<script src="assets/plugins/datatable/js/vfs_fonts.js"></script>

<script src="assets/plugins/datatable/js/buttons.html5.min.js"></script>

<script src="assets/plugins/datatable/js/buttons.print.min.js"></script>

<script src="assets/plugins/datatable/js/buttons.colVis.min.js"></script>

<script src="assets/plugins/datatable/js/responsive.bootstrap4.min.js"></script>

<script src="assets/js/toggle.js"></script>

<?php

    if(isset($_SESSION['alert'])){

        unset($_SESSION['alert']);

    }

?>