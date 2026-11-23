@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

@php
    $social_media = [
        'facebook' => [
            'color' => '#1877f2',
            'icon' => 'fa-facebook',
            'link' => 'https://facebook.com/sharer.php?u=',
        ],
        'twitter' => [
            'color' => '#1da1f2',
            'icon' => 'fa-twitter',
            'link' => 'https://twitter.com/share?url=',
        ],
        'whatsapp' => [
            'color' => '#25d366',
            'icon' => 'fa-whatsapp',
            'link' => 'https://api.whatsapp.com/send?text=',
        ],
        'telegram' => [
            'color' => '#229ed9',
            'icon' => 'fa-telegram',
            'link' => 'https://telegram.me/share/url?url=',
        ],
        'pinterest' => [
            'color' => '#e60023',
            'icon' => 'fa-pinterest',
            'link' => 'https://pinterest.com/pin/create/link/?url=',
        ],
        'messenger' => [
            'color' => '#0084ff',
            'icon' => 'fa-facebook-messenger',
            'link' => 'https://facebook.com/dialog/send?link=',
        ],
    ];
@endphp

<style>
    #natra-sticky-share {
        position: fixed;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 1030;
        opacity: 0;
        visibility: hidden;
        transition: opacity .3s ease, visibility .3s ease;
    }
    #natra-sticky-share.natra-tampil {
        opacity: 1;
        visibility: visible;
    }
    #natra-sticky-share ul {
        background: #fff;
        padding: 12px;
        text-align: center;
        margin: 0;
    }
    #natra-sticky-share li {
        display: inline-block;
    }
    #natra-sticky-share a {
        width: 40px;
        height: 40px;
        font-size: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
    }
    @media (min-width: 1024px) {
        #natra-sticky-share {
            top: 50%;
            bottom: auto;
            right: auto;
            transform: translateY(-50%);
        }
        #natra-sticky-share ul {
            background: transparent;
            padding: 12px 0 12px 0;
            text-align: left;
            border-radius: 0 8px 8px 0;
        }
        #natra-sticky-share li {
            display: block;
        }
    }
</style>

<section id="natra-sticky-share">
    <ul class="list-unstyled">
        @foreach ($social_media as $key => $data)
            <li>
                <a href="{{ $data['link'] . request()->getUri() }}" target="_blank" rel="noreferrer noopener" style="background-color: {{ $data['color'] }};" aria-label="Bagikan ke {{ ucfirst($key) }}"
                    title="Bagikan ke {{ ucfirst($key) }}"
                >
                    <i class="fa {{ $data['icon'] }}"></i>
                </a>
            </li>
        @endforeach
    </ul>
</section>

@push('scripts')
    <script>
        (function($) {
            var wadah = $('#natra-sticky-share');
            function saatScroll() {
                var konten = $('.content');
                var footer = $('footer');
                var tampil = false;
                if (konten.length && footer.length) {
                    var atasKonten = konten.offset().top + 150;
                    var bawahFooter = footer.offset().top + footer.outerHeight();
                    tampil = $(window).scrollTop() > atasKonten && $(window).scrollTop() + 200 < bawahFooter * 3;
                } else {
                    tampil = $(window).scrollTop() > 300;
                }
                wadah.toggleClass('natra-tampil', tampil);
            }
            $(window).on('scroll', saatScroll);
            $(document).ready(saatScroll);
        })(jQuery);
    </script>
@endpush
