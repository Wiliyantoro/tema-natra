<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    @include('theme::commons.meta')
    <!-- </head> -->
</head>

<body onLoad="renderDate()">
    @include('theme::commons.loading_screen')
    <div class="container" style="background-color: #f6f6f6;">
        <header id="header">
            @include('theme::commons.header')
        </header>
        <div>
            @yield('layout')
        </div>
    </div>
    <footer id="footer">
        @include('theme::commons.footer')
    </footer>
    @include('theme::commons.meta_footer')
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
    <script type="text/javascript">
        function formatRupiah(angka, prefix = 'Rp ') {
            if (angka === null || angka === undefined) return (prefix ?? 'Rp ') + '0,00';
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '') + ',00';
        }
    </script>
    @stack('scripts')
</body>

</html>
