@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

<div id="natra-back-to-top" style="position: fixed; bottom: 20px; right: 20px; z-index: 1030; display: none;">
    <a href="#" class="btn btn-danger" style="width: 40px; height: 40px; padding: 0; border-radius: 50%; line-height: 40px; text-align: center; box-shadow: 0 4px 12px rgba(0, 0, 0, .3);" aria-label="tombol kembali ke atas">
        <i class="fa fa-chevron-up" aria-label="ikon kembali ke atas"></i>
    </a>
</div>

@push('scripts')
    <script>
        (function($) {
            var tombol = $('#natra-back-to-top');
            $(window).on('scroll', function() {
                if ($(window).scrollTop() > 800) {
                    tombol.fadeIn(200);
                } else {
                    tombol.fadeOut(200);
                }
            });
            tombol.find('a').on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: 0 }, 500);
            });
        })(jQuery);
    </script>
@endpush
