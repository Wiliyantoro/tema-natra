@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

<style>
    .navbar-menu ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .navbar-menu li {
        position: relative;
    }

    /* Default sembunyi */
    .navbar-menu ul ul {
        display: none;
    }

    /* Hover tampilkan anak */
    .navbar-menu li:hover > ul {
        display: block;
    }

    /* Dropdown level 1 */
    .navbar-menu > ul > li > ul {
        top: 100%;
        left: 0;
    }

    /* Dropdown level 2 & seterusnya */
    .navbar-menu ul ul {
        top: 0;
        left: 100%;
        min-width: 180px;
    }

    /* Pastikan dropdown selalu di atas */
    .navbar-menu ul ul {
        z-index: 9999;
    }

    /* Warna dasar Natra */
    .navbar-menu {
        background-color: #e64946;
        color: #fff;
    }
    .navbar-menu a {
        color: #fff;
    }
    .navbar-menu a:hover,
    .navbar-menu li:hover > a {
        background-color: #c93a37;
        color: #fff;
        text-decoration: none;
    }
    .navbar-menu ul ul {
        background-color: #e64946;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .3);
    }

    .navbar-menu {
        display: none;
    }
    .navbar-menu-actions {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.5rem 1rem;
    }
    @media (min-width: 1024px) {
        .navbar-menu {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    }
</style>

<nav class="navbar-menu" role="navigation">
    <ul>
        <!-- Home -->
        <li style="display: inline-block;">
            <a href="{{ site_url('/') }}" style="display: inline-block; padding: 12px 16px;">
                <i class="fa fa-home"></i>
            </a>
        </li>

        <!-- Menu Dinamis -->
        @if (menu_tema())
            @foreach (menu_tema() as $menu)
                @php $has_dropdown = count($menu['childrens'] ?? []) > 0 @endphp
                <li style="display: inline-block; position: relative;">
                    <a href="{{ $has_dropdown ? '#!' : $menu['link_url'] }}"
                       style="padding: 12px; display: inline-block;">
                        {!! $menu['nama'] !!}
                        @if ($has_dropdown)
                            <i class="fa fa-chevron-down" style="font-size: 12px; margin-left: 4px;"></i>
                        @endif
                    </a>

                    @if ($has_dropdown)
                        <!-- LEVEL 1 dropdown -->
                        <ul style="position: absolute; min-width: 180px; z-index: 50;">
                            @foreach ($menu['childrens'] as $child)
                                @php $child_has_dropdown = count($child['childrens'] ?? []) > 0 @endphp
                                <li style="position: relative;">
                                    <a href="{{ $child_has_dropdown ? '#!' : $child['link_url'] }}"
                                       style="display: flex; align-items: center; justify-content: space-between; padding: 12px 20px;">
                                        <span style="flex: 1;">{!! $child['nama'] !!}</span>
                                        @if ($child_has_dropdown)
                                            <i class="fa fa-chevron-right" style="font-size: 12px; margin-left: 8px; margin-right: 20px;"></i>
                                        @endif
                                    </a>

                                    @if ($child_has_dropdown)
                                        <!-- LEVEL 2 dropdown -->
                                        <ul style="position: absolute; top: 0; left: 100%; min-width: 180px; z-index: 50;">
                                            @foreach ($child['childrens'] as $grandchild)
                                                @php $grandchild_has_dropdown = count($grandchild['childrens'] ?? []) > 0 @endphp
                                                <li style="position: relative;">
                                                    <a href="{{ $grandchild_has_dropdown ? '#!' : $grandchild['link_url'] }}"
                                                       style="display: flex; align-items: center; justify-content: space-between; padding: 12px 20px;">
                                                        <span style="flex: 1;">{!! $grandchild['nama'] !!}</span>
                                                        @if ($grandchild_has_dropdown)
                                                            <i class="fa fa-chevron-right" style="font-size: 12px; margin-left: 8px; margin-right: 20px;"></i>
                                                        @endif
                                                    </a>

                                                    @if ($grandchild_has_dropdown)
                                                        <!-- LEVEL 3 dropdown -->
                                                        <ul style="position: absolute; top: 0; left: 100%; min-width: 180px; z-index: 50;">
                                                            @foreach ($grandchild['childrens'] as $greatgrandchild)
                                                                <li>
                                                                    <a href="{{ $greatgrandchild['link_url'] }}"
                                                                       style="display: block; padding: 12px 20px;">
                                                                        {!! $greatgrandchild['nama'] !!}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        @endif
    </ul>

    {{-- Login/Layanan Mandiri: hanya di sini untuk lebar desktop -- versi mobile
         ada di category_menu.blade.php. --}}
    <div class="navbar-menu-actions">
        @if (setting('layanan_mandiri') == 1)
            <a href="{{ site_url('layanan-mandiri') }}" class="btn btn-primary btn-sm text-center">Layanan
                Mandiri <i class="fa fa-external-link ml-1"></i></a>
        @endif
        <a href="{{ site_url('siteman') }}" class="btn btn-danger btn-sm text-center">Login Admin <i class="fa fa-external-link ml-1"></i></a>
    </div>
</nav>
