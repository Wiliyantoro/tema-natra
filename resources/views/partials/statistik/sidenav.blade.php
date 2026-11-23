@php
    $daftar_statistik = daftar_statistik();
    $slug_aktif = str_replace('_', '-', $slug_aktif ?? '');
    $s_links = [
        [
            'target' => 'statistikPenduduk',
            'label' => 'Statistik Penduduk',
            'icon' => 'fa-pie-chart',
            'submenu' => $daftar_statistik['penduduk'],
        ],
        [
            'target' => 'statistikKeluarga',
            'label' => 'Statistik Keluarga',
            'icon' => 'fa-bar-chart',
            'submenu' => $daftar_statistik['keluarga'],
        ],
        [
            'target' => 'statistikBantuan',
            'label' => 'Statistik Bantuan',
            'icon' => 'fa-line-chart',
            'submenu' => $daftar_statistik['bantuan'],
        ],
        [
            'target' => 'statistikLainnya',
            'label' => 'Statistik Lainnya',
            'icon' => 'fa-area-chart',
            'submenu' => $daftar_statistik['lainnya'],
        ],
    ];
@endphp

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-bar-chart"></i>&ensp;Data Statistik</h3>
    </div>
    @foreach ($s_links as $statistik)
        @php $is_active = in_array($slug_aktif, array_column($statistik['submenu'], 'slug')) @endphp
        <div class="panel-body" style="padding: 10px 15px 0;">
            <strong><i class="fa {{ $statistik['icon'] }}"></i>&ensp;{{ $statistik['label'] }}</strong>
            <ul class="list-unstyled" style="margin: 5px 0 10px 20px;">
                @foreach ($statistik['submenu'] as $submenu)
                    @php
                        $stat_slug = in_array($statistik['target'], ['statistikBantuan', 'statistikLainnya']) ? str_replace('first/', '', $submenu['url']) : 'statistik/' . $submenu['key'];
                        if ($stat_slug == 'data-dpt') {
                            $stat_slug = 'dpt';
                        }
                    @endphp
                    @if (isset($statistik_aktif[$stat_slug]))
                        <li>
                            <a href="{{ site_url($submenu['url']) }}" class="{{ $submenu['slug'] == $slug_aktif ? 'text-danger' : '' }}">{{ $submenu['label'] }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
