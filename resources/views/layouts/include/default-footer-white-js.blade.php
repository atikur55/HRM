   <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
   <script src="{{asset('cork-white')}}/assets/js/libs/jquery-3.1.1.min.js"></script>
   <script src="{{asset('cork-white')}}/bootstrap/js/popper.min.js"></script>
   <script src="{{asset('cork-white')}}/bootstrap/js/bootstrap.min.js"></script>
   <script src="{{asset('cork-white')}}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
   <script src="{{asset('cork-white')}}/assets/js/app.js"></script>
   <script>
       $(document).ready(function() {
           App.init();
       });
   </script>
   <script src="{{asset('cork-white')}}/assets/js/custom.js"></script>
   <!-- END GLOBAL MANDATORY SCRIPTS -->

   <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
   <script src="{{asset('cork-white')}}/plugins/apex/apexcharts.min.js"></script>
   <script src="{{asset('cork-white')}}/assets/js/dashboard/dash_2.js"></script>
   <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->


   <script src="{{asset('cork-white')}}/assets/js/dashboard/dash_1.js"></script> 

   

   <!-- BEGIN Datatable PAGE LEVEL SCRIPTS -->
   <script src="{{asset('cork-white')}}/plugins/table/datatable/datatables.js"></script>
   <script>
       $('#zero-config').DataTable({   
           "oLanguage": {
               "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
               "sInfo": "Showing page _PAGE_ of _PAGES_",
               "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
               "sSearchPlaceholder": "Search...",
              "sLengthMenu": "Results :  _MENU_",
           },
           "stripeClasses": [],
           "lengthMenu": [7, 10, 20, 50],
           "pageLength": 7 
       });
   </script>
   <!-- END Datatable PAGE LEVEL SCRIPTS -->

   <script src="{{asset('cork-white')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
   <script src="{{asset('cork-white')}}/assets/js/apps/contact.js"></script>

       <!-- BEGIN PAGE LEVEL SCRIPTS -->
       <script src="{{asset('cork-white')}}/assets/js/ie11fix/fn.fix-padStart.js"></script>
       {{-- <script src="{{asset('cork-white')}}/assets/js/apps/scrumboard.js"></script> --}}
       <!-- END PAGE LEVEL SCRIPTS -->

   {{-- <script src="{{ asset('/assets/vendor/jquery/jquery-3.4.1.min.js') }}"></script> --}}
   {{-- <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script> --}}
   {{-- <script src="{{ asset('/assets/vendor/semantic-ui/semantic.min.js') }}"></script> --}}
   {{-- <script src="{{ asset('/assets/js/script.js') }}"></script> --}}
   {{-- <script src="{{ asset('/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script> --}}
   {{-- <script src="{{ asset('/assets/vendor/DataTables/datatables.min.js') }}"></script> --}}
{{--  
   @if ($success = Session::get('success'))
   <script>
       $(document).ready(function() {
           $.notify({
               icon: 'ui icon check',
               message: "{{ $success }}"},
               {type: 'success',timer: 400}
           );
       });
   </script>
   @endif
   
   @if ($error = Session::get('error'))
   <script>
       $(document).ready(function() {
           $.notify({
               icon: 'ui icon times',
               message: "{{ $error }}"},
               {type: 'danger',timer: 400});
       });
   </script>
   @endif
       


   @yield('scripts') --}}
