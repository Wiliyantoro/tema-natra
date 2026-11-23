@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp
@php
    $bg_header = $latar_website ?? '';
@endphp

<div class="container">
    <header style="background-image: url({{ $bg_header }}); background-position: center; background-size: cover; background-repeat: no-repeat; position: relative; color: #fff;">
        <div style="position: absolute; top: 0; left: 0; right: 0; height: 100%; background: rgba(31, 41, 55, .6);">
        </div>

        @include('theme::commons.category_menu')

        <section class="text-center" style="position: relative; z-index: 10; padding: 10px 15px 0;">
            <a href="{{ site_url('/') }}" style="color: #fff; text-decoration: none;">
                <figure>
                    <img src="{{ gambar_desa($desa['logo']) }}" alt="Logo {{ ucfirst(setting('sebutan_desa')) . ' ' . title_case($desa['nama_desa']) }}" style="height: 64px; margin: 0 auto; padding-bottom: 8px;">
                </figure>
                <span style="display: block; font-size: 24px; font-weight: 700;">{{ ucwords(setting('sebutan_desa')) }} {{ $desa['nama_desa'] }}</span>
                <p>{{ ucfirst(setting('sebutan_kecamatan_singkat')) }}
                    {{ title_case($desa['nama_kecamatan']) }},
                    {{ ucfirst(setting('sebutan_kabupaten_singkat')) }}
                    {{ title_case($desa['nama_kabupaten']) }},
                    Provinsi
                    {{ title_case($desa['nama_propinsi']) }}
                </p>
            </a>
            <form method="get" action="{{ site_url() }}" class="form-inline" style="position: relative; z-index: 10; margin: 12px 0 4px;">
                <div class="form-group">
                    <input type="text" name="cari" maxlength="50" class="form-control" value="{{ $cari }}" placeholder="Cari Artikel">
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            @if ($w_gal)
                <div style="display: block; width: 83%; margin: 0 auto; overflow: hidden;" class="hidden-xs">
                    <div class="marquee-track-natra" style="display: flex; gap: 12px; padding-top: 8px;">
                        @for ($i = 0; $i < 2; $i++)
                            @foreach ($w_gal as $album)
                                @if (is_file(LOKASI_GALERI . 'kecil_' . $album['gambar']))
                                    @php $link = route('web.galeri.detail', $album['id']) @endphp
                                    <a href="{{ $link }}" style="display: block; flex-shrink: 0; width: 128px; height: 80px;" title="{{ $album['nama'] }}" @if($i === 1) aria-hidden="true" @endif>
                                        <img src="{{ AmbilGaleri($album['gambar'], 'kecil') }}" alt="{{ $album['nama'] }}" style="width: 128px; height: 80px; object-fit: cover;">
                                    </a>
                                @endif
                            @endforeach
                        @endfor
                    </div>
                </div>
            @endif
        </section>
        @if ($teks_berjalan)
            <div style="display: block; padding: 6px 12px; background: rgba(255, 255, 255, .2); color: #fff; font-size: 12px; margin-top: 24px; margin-bottom: 0; position: relative; z-index: 20; overflow: hidden;">
                <div class="marquee-track-natra" style="display: flex; white-space: nowrap;">
                    @for ($i = 0; $i < 2; $i++)
                        @foreach ($teks_berjalan as $marquee)
                            <span style="padding: 0 12px; border-right: 4px solid rgba(255, 255, 255, .3); flex-shrink: 0;" @if($i === 1) aria-hidden="true" @endif>
                                {{ $marquee['teks'] }}
                                @if (trim($marquee['tautan']) && $marquee['judul_tautan'])
                                    <a href="{{ $marquee['tautan'] }}" style="color: #fff;">{{ $marquee['judul_tautan'] }}</a>
                                @endif
                            </span>
                        @endforeach
                    @endfor
                </div>
            </div>
        @endif
    </header>
    @include('theme::commons.main_menu')
    @include('theme::commons.mobile_menu')
</div>
