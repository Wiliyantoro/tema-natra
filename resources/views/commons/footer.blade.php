@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

<div class="container">
    @includeWhen($transparansi, 'theme::partials.apbdesa', $transparansi)
</div>

@if (theme_config('statistik_desa'))
    <div class="container" align="center">
        <h2>Statistik {{ ucwords(setting('sebutan_desa')) }}</h2>
        <hr>
        <div class="col-md-6">
            <a href="{{ site_url('data-wilayah') }}"><img alt="Statistik Wilayah" width="30%" src="{{ theme_asset('images/statistik_wil.png') }}" /></a>
            <a href="{{ site_url('data-statistik/pendidikan-dalam-kk') }}"><img alt="Statistik Pendidikan Dalam Kartu Keluarga" width="30%" src="{{ theme_asset('images/statistik_pend.png') }}" /></a>
            <a href="{{ site_url('data-statistik/pekerjaan') }}"><img alt="Statistik Pekerjaan" width="30%" src="{{ theme_asset('images/statistik_pekerjaan.png') }}" /></a>
            <hr>
        </div>
        <div class="col-md-6">
            <a href="{{ site_url('data-statistik/agama') }}"><img alt="Statistik Agama" width="30%" src="{{ theme_asset('images/statistik_agama.png') }}" /></a>
            <a href="{{ site_url('data-statistik/jenis-kelamin') }}"><img alt="Statistik Jenis Kelamin" width="30%" src="{{ theme_asset('images/statistik_kelamin.png') }}" /></a>
            <a href="{{ site_url('data-statistik/rentang-umur') }}"><img alt="Statistik Umur" width="30%" src="{{ theme_asset('images/statistik_umur.png') }}" /></a>
            <hr>
        </div>
    </div>
@endif

<div class="footer_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="single_footer_top wow fadeInRight">
                    <h2>{{ ucwords(setting('sebutan_desa')) }} {{ ucwords($desa['nama_desa']) }}</h2>
                    <p>{{ $desa['alamat_kantor'] }}<br>{{ ucwords(setting('sebutan_kecamatan') . ' ' . $desa['nama_kecamatan']) }} {{ ucwords(setting('sebutan_kabupaten') . ' ' . $desa['nama_kabupaten']) }} Provinsi {{ $desa['nama_propinsi'] }} Kode Pos {{ $desa['kode_pos'] }}</p>
                    <p>
                        @if (!empty($desa['email_desa']))
                            Email: {{ $desa['email_desa'] }}
                        @endif
                        <br />
                        @if (!empty($desa['telepon']))
                            Telp: {{ $desa['telepon'] }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="single_footer_top wow fadeInDown">
                    <h2>Kategori</h2>
                    <ul class="labels_nav">
                        @foreach ($menu_kiri as $data)
                            <li><a href="{{ site_url('artikel/kategori/' . $data['slug']) }}">{{ $data['kategori'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="single_footer_top wow fadeInRight">
                    @if (setting('tte'))
                        <img src="{{ asset('assets/images/bsre.png?v', false) }}" alt="Bsre" class="img-responsive" style="width: 185px;" />
                    @endif
                    @foreach ($sosmed as $data)
                        @if (!empty($data['link']))
                            <a href="{{ $data['link'] }}" rel="noopener noreferrer" target="_blank">
                                <img src="{{ $data['icon'] }}" alt="{{ $data['nama'] }}" style="width:50px;height:50px;" />
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
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
            <p>Hak cipta situs &copy; {{ date('Y') }} - {{ $desa['nama_desa'] }}</p>
            <p>
                <a href="https://www.trivusi.web.id" style="color: #fff; text-decoration: underline;" target="_blank" rel="noopener">Natra {{ defined('THEME_VERSION') ? THEME_VERSION : 'v2604.0.0' }}</a> -
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
