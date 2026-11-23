@php
    $post = $single_artikel;
    $alt_slug = PREMIUM ? 'artikel' : 'first';
@endphp

<div class="single_page_area">
    <h4 class="catg_titile" style="font-family: Oswald">
        <font color="#FFFFFF">{{ $post['judul'] }}</font>
    </h4>
    <div class="post_commentbox">
        <span class="meta_date">
            <i class="fa fa-user"></i>{{ $post['owner'] }}&nbsp;
            <i class="fa fa-calendar"></i>{{ tgl_indo($post['tgl_upload']) }}&nbsp;
            <i class="fa fa-eye"></i>{{ hit($post['hit']) }} Dibaca&nbsp;
            @if ($post['kategori'])
                <a href="{{ ci_route("{$alt_slug}.kategori.{$post['kat_slug']}") }}"><i class='fa fa-tag'></i>{{ $post['kategori'] }}</a>
            @endif
        </span>
    </div>
    <div class="single_page_content" style="margin-bottom:10px;">
        <div class="sampul">
            @if ($post['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post['gambar']))
                <a data-fancybox="gallery" href="{{ AmbilFotoArtikel($post['gambar'], 'sedang') }}">
                    <img width="270px" style="float:left; margin:0 8px 4px 0;" class="img-fluid img-thumbnail" src="{{ AmbilFotoArtikel($post['gambar'], 'sedang') }}" alt="{{ $post['judul'] }}" />
                </a>
            @endif
        </div>
        <div class="title_text">{!! $post['isi'] !!}</div>
        @for ($i = 1; $i <= 3; $i++)
            @if ($post['gambar' . $i] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post['gambar' . $i]))
                <div class="sampul">
                    <a data-fancybox="gallery" href="{{ AmbilFotoArtikel($post['gambar' . $i], 'sedang') }}">
                        <img width="270px" style="float:left; margin:0 8px 4px 0;" class="img-fluid img-thumbnail" src="{{ AmbilFotoArtikel($post['gambar' . $i], 'sedang') }}" alt="{{ $post['nama'] }}" />
                    </a>
                </div>
            @endif
        @endfor
        @if ($post['dokumen'])
            <p>Unduh Lampiran:<br><a href="{{ ci_route('first.unduh_dokumen_artikel', $post['id']) }}" title="">{{ $post['dokumen'] }}</a></p>
        @endif
    </div>
</div>
