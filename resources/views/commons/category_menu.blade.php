@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp
@php
    $alt_slug = PREMIUM ? 'artikel' : 'first';
@endphp

<section class="hidden-md hidden-lg">
    <button type="button" id="natra-cat-menu-toggle" class="btn btn-default" style="margin: 10px 15px;">
        <i class="fa fa-list fa-lg"></i>
    </button>

    <div id="natra-cat-menu-overlay" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, .5); z-index: 1040;"></div>

    <div id="natra-cat-menu-panel" style="display: none; position: fixed; top: 0; left: 0; height: 100%; width: 75%; background: #fff; color: #333; z-index: 1050; overflow-y: auto; box-shadow: 0 0 15px rgba(0, 0, 0, .3);">
        <h5 style="font-size: 18px; padding: 20px 15px 10px;">Menu Kategori</h5>
        <div style="padding: 0 15px 20px;">
            <ul class="list-unstyled" style="font-size: 14px;">
                @foreach ($menu_kiri as $menu)
                    <li>
                        <a href="{{ site_url("{$alt_slug}/kategori/{$menu['slug']}") }}" style="display: block; padding: 8px 0;">
                            {{ $menu['kategori'] }}
                        </a>
                        @if (count($menu['submenu'] ?? []) > 0)
                            <ul class="list-unstyled" style="padding-left: 15px;">
                                @foreach ($menu['submenu'] as $submenu)
                                    <li>
                                        <a href="{{ site_url("{$alt_slug}/kategori/{$submenu['slug']}") }}" style="display: block; padding: 8px 0;">
                                            {{ $submenu['kategori'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>

            <div style="margin-top: 20px;">
                @if (setting('layanan_mandiri') == 1)
                    <a href="{{ site_url('layanan-mandiri') }}" class="btn btn-primary btn-block" style="margin-bottom: 10px;">Layanan
                        Mandiri <i class="fa fa-external-link ml-1"></i></a>
                @endif
                <a href="{{ site_url('siteman') }}" class="btn btn-danger btn-block">Login Admin <i class="fa fa-external-link ml-1"></i></a>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        (function($) {
            var panel = $('#natra-cat-menu-panel');
            var overlay = $('#natra-cat-menu-overlay');
            function buka() {
                panel.show();
                overlay.show();
            }
            function tutup() {
                panel.hide();
                overlay.hide();
            }
            $('#natra-cat-menu-toggle').on('click', function(e) {
                e.preventDefault();
                if (panel.is(':visible')) {
                    tutup();
                } else {
                    buka();
                }
            });
            overlay.on('click', tutup);
        })(jQuery);
    </script>
@endpush
