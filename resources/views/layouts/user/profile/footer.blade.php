      <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2023 realoneinvest by 
            <a href="">Appsron</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    
     
 
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('dist/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <!--<script src="{{asset('assets/node_modules/raphael/raphael-min.js')}}"></script>-->
    <!--<script src="{{asset('assets/node_modules/morrisjs/morris.min.js')}}"></script>-->
    <!--<script src="{{asset('dist/js/pages/morris-data.js')}}"></script>-->
    
    <script src="{{asset('assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Popup message jquery -->
    <script src="{{asset('assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
   
    <!-- Chart JS -->
     <!-- Flot Charts JavaScript -->
     <!--<script src="{{asset('assets/node_modules/flot/excanvas.js')}}"></script>-->
     <!--<script src="{{asset('assets/node_modules/flot/jquery.flot.js')}}"></script>-->
     <!--<script src="{{asset('assets/node_modules/flot/jquery.flot.pie.js')}}"></script>-->
     <!--<script src="{{asset('assets/node_modules/flot/jquery.flot.time.js')}}"></script>-->
     <!--<script src="{{asset('assets/node_modules/flot/jquery.flot.stack.js')}}"></script>-->
     <!--<script src="{{asset('assets/node_modules/flot/jquery.flot.crosshair.js')}}"></script>-->
     <!--<script src="{{asset('assets/node_modules/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>-->
     <!--<script src="{{asset('dist/js/pages/flot-data.js')}}"></script>-->
    <script src="{{asset('dist/js/dashboard1.js')}}"></script>
        <script src="{{asset('assets/node_modules/dropzone-master/dist/dropzone.js')}}"></script>
    <!--Data Tables -->
    <script src="{{asset('assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    
    
     <script src="{{asset('assets/node_modules/switchery/dist/switchery.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/node_modules/dff/dff.js')}}" type="text/javascript"></script>
  <script type="text/javascript" src="{{asset('assets/node_modules/multiselect/js/jquery.multi-select.js')}}"></script>


    <script>
        $(function () {
            $('.myTable').DataTable();
            var table = $('.example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');
        });

    </script>
  <script>
        $(function () {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
            // For multiselect
            $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });
            $('#public-methods').multiSelect();
            $('#select-all').click(function () {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function () {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function () {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function () {
                $('#public-methods').multiSelect('addOption', {
                    value: 42,
                    text: 'test 42',
                    index: 0
                });
                return false;
            });
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                //templateResult: formatRepo, // omitted for brevity, see the source of this page
                //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });
    </script>
  <!-- This Page JS -->
     <script src="{{asset('assets/node_modules/wizard/jquery.steps.min.js')}}"></script>
     <script src="{{asset('assets/node_modules/wizard/jquery.validate.min.js')}}"></script>
     <script src="{{asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
     
     
      <script src="{{asset('assets/node_modules/switchery/dist/switchery.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/node_modules/dff/dff.js')}}" type="text/javascript"></script>
  <script type="text/javascript" src="{{asset('assets/node_modules/multiselect/js/jquery.multi-select.js')}}"></script>

     
     
     <script>
         //Custom design form example
         $(".tab-wizard").steps({
             headerTag: "h6",
             bodyTag: "section",
             transitionEffect: "fade",
             titleTemplate: '<span class="step">#index#</span> #title#',
             labels: {
                 finish: "Submit"
             },
             onFinished: function (event, currentIndex) {
                 Swal.fire("Form Submitted!", "Success  Fully Completed .");
 
             }
         });
 
 
         var form = $(".validation-wizard").show();
 
         $(".validation-wizard").steps({
             headerTag: "h6",
             bodyTag: "section",
             transitionEffect: "fade",
             titleTemplate: '<span class="step">#index#</span> #title#',
             labels: {
                 finish: "Submit"
             },
             onStepChanging: function (event, currentIndex, newIndex) {
                 return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
             },
             onFinishing: function (event, currentIndex) {
                 return form.validate().settings.ignore = ":disabled", form.valid()
             },
             onFinished: function (event, currentIndex) {
                 Swal.fire("Form Submitted!", "Success Fully Viewed ");
             }
         }), $(".validation-wizard").validate({
             ignore: "input[type=hidden]",
             errorClass: "text-danger",
             successClass: "text-success",
             highlight: function (element, errorClass) {
                 $(element).removeClass(errorClass)
             },
             unhighlight: function (element, errorClass) {
                 $(element).removeClass(errorClass)
             },
             errorPlacement: function (error, element) {
                 error.insertAfter(element)
             },
             rules: {
                 email: {
                     email: !0
                 }
             }
         })
     </script>
     
       <script src="{{ asset('toastr/toastr.min.js') }}"></script>
       <!-- This page plugins -->
      <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
    </script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
    @endif


</body>

</html>