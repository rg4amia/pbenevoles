@include('backend.panels.header')
@include('backend.panels.header_two')

@include('backend.panels.top-nav')

@yield('css')

<!-- BEGIN: Content-->
z
@yield('content')

<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0">
        <span class="float-md-left d-block d-md-inline-block mt-25">
            COPYRIGHT &copy; {{ date('Y') }}
            <a class="ml-25" href="https://www.agenceemploijeunes.ci/site/" target="_blank">
                Agence Emploi jeunes
            </a>
            <span class="d-none d-sm-inline-block">, Tous droits réservés</span>
        </span>
        <!-- <span class="float-md-right d-none d-md-block">
            Fabriqué à la main et avec Amour
            <i data-feather="heart"></i>
        </span> -->
    </p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button">
    <i data-feather="arrow-up"></i>
</button>
<!-- END: Footer-->

<!-- BEGIN: Vendor JS-->
<script src="{{ asset('backend_assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('backend_assets/vendors/js/ui/jquery.sticky.js') }}"></script>
{{--<script src="{{ asset('backend_assets/vendors/js/charts/apexcharts.min.js') }}"></script>--}}
<script src="{{ asset('backend_assets/vendors/js/extensions/toastr.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('backend_assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('backend_assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
{{--<script src="{{ asset('backend_assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>--}}
<!-- END: Page JS-->
<script src="{{ asset('backend_assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }} "></script>
<script src="{{ asset('backend_assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }} "></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css"></script>
<script src="{{ asset('backend_assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }} "></script>
<script src="{{ asset('backend_assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }} "></script>
<script src="{{ asset('backend_assets/vendors/js/tables/datatable/datatables.buttons.min.js') }} "></script>
<script src="{{ asset('backend_assets/vendors/js/tables/datatable/jszip.min.js') }} "></script>
<script src="{{ asset('backend_assets/vendors/js/tables/datatable/pdfmake.min.js') }} "></script>
<script src="{{ asset('backend_assets/vendors/js/tables/datatable/vfs_fonts.js') }} "></script>
<script src="{{ asset('backend_assets/vendors/js/tables/datatable/buttons.html5.min.js') }} "></script>
<script src="{{ asset('backend_assets/vendors/js/tables/datatable/buttons.print.min.js') }} "></script>
<script src="{{ asset('backend_assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }} "></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
<script src="{{ asset('backend_assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }} "></script>
<script src="{{ asset('backend_assets/js/scripts/tables/table-datatables-basic.js') }} "></script>
<script src="{{ asset('backend_assets/js/scripts/tables/dataTables.colVis.js') }} "></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('backend_assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
@yield('js')
</body>
<!-- END: Body-->
</html>
