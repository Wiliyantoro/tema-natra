@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

@if (cek_koneksi_internet())
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-providers/1.6.0/leaflet-providers.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/1.13.0/mapbox-gl.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl-leaflet/0.0.14/leaflet-mapbox-gl.min.js"></script>
@endif

<script src="{{ theme_asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/leaflet.js') }}"></script>
<script src="{{ asset('js/leaflet-providers.js') }}"></script>
<script src="{{ asset('js/mapbox-gl.js') }}"></script>
<script src="{{ asset('js/leaflet-mapbox-gl.js') }}"></script>
<script src="{{ asset('js/peta.js') }}"></script>
<script src="{{ asset('bootstrap/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ theme_asset('js/wow.min.js') }}"></script>
<script src="{{ theme_asset('js/slick.min.js') }}"></script>
<script src="{{ theme_asset('js/custom.js') }}"></script>

@include('core::admin.layouts.components.token')
<script>
    var BASE_URL = '{{ base_url() }}';
    $.extend($.fn.dataTable.defaults, {
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],
        pageLength: 10,
        language: {
            url: "{{ asset('bootstrap/js/dataTables.indonesian.lang') }}",
        }
    });
</script>

@if (!setting('inspect_element'))
    <script src="{{ asset('js/disabled.min.js') }}"></script>
@endif
