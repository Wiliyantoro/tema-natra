@if ($headline)
    @php
        $abstrak_headline = potong_teks($headline['isi'], 250);
        $image = $headline['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $headline['gambar']) ? AmbilFotoArtikel($headline['gambar'], 'sedang') : gambar_desa($desa['logo']);
    @endphp
    <div style="position: relative; overflow: hidden; margin-bottom: 15px;">
        <a href="{{ $headline->url_slug }}">
            <img src="{{ $image }}" alt="{{ $headline['judul'] }}" class="img-responsive" style="width: 100%; height: 350px; object-fit: cover;">
        </a>
        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0, 0, 0, 0.6); padding: 12px 15px;">
            <a href="{{ $headline->url_slug }}" style="color: #fff; font-weight: bold; font-size: 18px; display: block;">{{ $headline['judul'] }}</a>
        </div>
    </div>
@endif
