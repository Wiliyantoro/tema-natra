@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

<div class="container">
    @includeWhen($transparansi, 'theme::partials.apbdesa', $transparansi)
</div>

@php
    $social_media = [
        'facebook' => [
            'color' => '#2563eb',
            'icon' => 'fa-facebook',
        ],
        'twitter' => [
            'color' => '#38bdf8',
            'icon' => 'fa-twitter',
        ],
        'instagram' => [
            'color' => '#ec4899',
            'icon' => 'fa-instagram',
        ],
        'telegram' => [
            'color' => '#3b82f6',
            'icon' => 'fa-telegram',
        ],
        'whatsapp' => [
            'color' => '#22c55e',
            'icon' => 'fa-whatsapp',
        ],
        'youtube' => [
            'color' => '#ef4444',
            'icon' => 'fa-youtube',
        ],
    ];
@endphp

@foreach ($sosmed as $social)
    @if ($social['link'])
        @php
            $social_media[strtolower($social['nama'])]['link'] = $social['link'];
        @endphp
    @endif
@endforeach

@include('theme::commons.back_to_top')

<footer class="container" style="padding-top: 20px;">
    <div style="background-color: #52525b; color: #fff; padding: 20px; border-radius: 12px 12px 0 0; font-size: 14px;" class="clearfix">
        <span class="pull-left text-center" style="text-align: center;">
            <p>Hak cipta situs &copy; {{ date('Y') }} - {{ $nama_desa }}</p>
            <p>
                <a href="https://www.trivusi.web.id" style="color: #fff; text-decoration: underline;" target="_blank" rel="noopener">Natra {{ $themeVersion }}</a> -
                <a href="https://opensid.my.id" style="color: #fff; text-decoration: underline;" target="_blank" rel="noopener">OpenSID {{ ambilVersi() }}</a>
                @if (file_exists('mitra'))
                    - Hosting didukung
                    <a href="https://my.idcloudhost.com/aff.php?aff=3172" rel="noopener noreferrer" target="_blank">
                        <img src="{{ base_url('/assets/images/Logo-IDcloudhost.png') }}" style="height: 16px; display: inline-block;" alt="Logo-IDCloudHost" title="Logo-IDCloudHost">
                    </a>
                @endif
            </p>
        </span>
        @if (setting('tte'))
            <div class="pull-left" style="margin-left: 15px;">
                <img src="{{ asset('assets/images/bsre.png?v', false) }}" alt="Bsre" class="img-responsive" style="width: 185px;" />
            </div>
        @endif

        <ul class="list-inline pull-right" style="margin: 0;">
            @foreach ($social_media as $sm)
                @if ($link = $sm['link'])
                    <li style="display: inline-block; padding: 0 2px;">
                        <a href="{{ $link }}" style="display: inline-flex; align-items: center; justify-content: center; background-color: {{ $sm['color'] }}; color: #fff; width: 32px; height: 32px; border-radius: 50%;" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-lg {{ $sm['icon'] }}"></i>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</footer>
