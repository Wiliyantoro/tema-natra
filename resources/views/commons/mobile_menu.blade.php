@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

<style>
    #natra-mobile-menu {
        background-color: #e64946;
        color: #fff;
    }
    #natra-mobile-menu a {
        color: #fff;
    }
    #natra-mobile-menu a:hover {
        background-color: #c93a37;
        color: #fff;
        text-decoration: none;
    }
    #natra-mobile-menu .mm-sub {
        display: none;
        border-top: 1px solid #c93a37;
    }
    #natra-mobile-menu .mm-toggle .fa-chevron-down,
    #natra-mobile-menu .mm-toggle .fa-chevron-right {
        transition: transform .3s ease;
    }
    #natra-mobile-menu .mm-toggle.mm-terbuka .fa-chevron-down,
    #natra-mobile-menu .mm-toggle.mm-terbuka .fa-chevron-right {
        transform: rotate(90deg);
    }
</style>

<nav id="natra-mobile-menu" class="hidden-md hidden-lg" role="navigation">
    <!-- Tombol toggle -->
    <button type="button" id="natra-mobile-menu-toggle" class="btn btn-link btn-block text-center text-uppercase" style="color: #fff; padding: 12px; text-decoration: none;">
        <i class="fa fa-bars" style="margin-right: 4px;"></i>
        Menu
    </button>

    <!-- Menu utama -->
    <ul id="natra-mobile-menu-utama" style="display: none; list-style: none; margin: 0; padding: 0; border-top: 1px solid #c93a37;">
        @php $menu_atas = menu_tema() @endphp
        @if ($menu_atas)
            @foreach ($menu_atas as $menu)
                @php $has_dropdown = count($menu['childrens'] ?? []) > 0 @endphp
                <li style="display: block; position: relative;">
                    @php $menu_link = $has_dropdown ? '#!' : $menu['link_url'] @endphp

                    <!-- LEVEL 1 -->
                    <a href="{{ $menu_link }}"
                        class="{{ $has_dropdown ? 'mm-toggle' : '' }}"
                        style="display: flex; width: 100%; align-items: center; justify-content: space-between; padding: 12px;">
                        <span style="flex: 1;">{!! $menu['nama'] !!}</span>
                        @if ($has_dropdown)
                            <i class="fa fa-chevron-down" style="font-size: 12px; margin-left: 8px;"></i>
                        @endif
                    </a>

                    @if ($has_dropdown)
                        <!-- LEVEL 2 -->
                        <ul class="mm-sub" style="list-style: none; margin: 0; padding: 0;">
                            @foreach ($menu['childrens'] as $childrens)
                                @php $has_dropdown2 = count($childrens['childrens'] ?? []) > 0 @endphp
                                <li>
                                    @php $menu_link2 = $has_dropdown2 ? '#!' : $childrens['link_url'] @endphp

                                    <a href="{{ $menu_link2 }}"
                                        class="{{ $has_dropdown2 ? 'mm-toggle' : '' }}"
                                        style="display: flex; width: 100%; align-items: center; justify-content: space-between; padding: 12px 16px 12px 24px;">
                                        {!! $childrens['nama'] !!}
                                        @if ($has_dropdown2)
                                            <i class="fa fa-chevron-right" style="font-size: 12px; margin-left: auto;"></i>
                                        @endif
                                    </a>

                                    @if ($has_dropdown2)
                                        <!-- LEVEL 3 -->
                                        <ul class="mm-sub" style="list-style: none; margin: 0; padding: 0;">
                                            @foreach ($childrens['childrens'] as $children)
                                                @php $has_dropdown3 = count($children['childrens'] ?? []) > 0 @endphp
                                                @php $menu_link3 = $has_dropdown3 ? '#!' : $children['link_url'] @endphp
                                                <li>
                                                    <a href="{{ $menu_link3 }}"
                                                        class="{{ $has_dropdown3 ? 'mm-toggle' : '' }}"
                                                        style="display: flex; width: 100%; align-items: center; justify-content: space-between; padding: 12px 16px 12px 24px;">
                                                        {!! $children['nama'] !!}
                                                        @if ($has_dropdown3)
                                                            <i class="fa fa-chevron-right" style="font-size: 12px; margin-left: auto;"></i>
                                                        @endif
                                                    </a>

                                                    @if ($has_dropdown3)
                                                        <!-- LEVEL 4 -->
                                                        <ul class="mm-sub" style="list-style: none; margin: 0; padding: 0;">
                                                            @foreach ($children['childrens'] as $ggchild)
                                                                @php $menu_link4 = $ggchild['link_url'] @endphp
                                                                <li>
                                                                    <a href="{{ $menu_link4 }}"
                                                                        style="display: block; padding: 12px 16px 12px 24px;">
                                                                        {!! $ggchild['nama'] !!}
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
</nav>

@push('scripts')
    <script>
        (function($) {
            var nav = $('#natra-mobile-menu');
            var tombol = $('#natra-mobile-menu-toggle');
            var menuUtama = $('#natra-mobile-menu-utama');
            var ikon = tombol.find('i.fa');
            tombol.on('click', function(e) {
                e.preventDefault();
                menuUtama.slideToggle(200);
                if (ikon.hasClass('fa-bars')) {
                    ikon.removeClass('fa-bars').addClass('fa-times');
                } else {
                    ikon.removeClass('fa-times').addClass('fa-bars');
                }
            });
            nav.on('click', '.mm-toggle', function(e) {
                e.preventDefault();
                var tautan = $(this);
                tautan.toggleClass('mm-terbuka');
                tautan.next('.mm-sub').slideToggle(200);
            });
        })(jQuery);
    </script>
@endpush
