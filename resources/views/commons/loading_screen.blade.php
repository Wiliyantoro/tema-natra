@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

<div id="natra-loading-screen" style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: #fff; z-index: 9999; display: flex; justify-content: center; align-items: center; transition: opacity .3s ease;">
    <div style="position: relative; display: flex; align-items: center; justify-content: center; width: 120px; height: 120px;">

        <!-- Ring yang berputar dan zoom (INLINE CSS) -->
        <div style="
            width: 100px;
            height: 100px;
            border: 4px solid #e64946;
            border-top: 4px solid transparent;
            border-radius: 50%;
            position: absolute;
            animation: spinZoom 1.5s linear infinite;"></div>

        <!-- Logo -->
        <div style="
            width: 64px;
            height: 64px;
            background: white;
            border-radius: 9999px;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <img src="{{ gambar_desa($desa['logo']) }}"
                alt="Logo {{ ucfirst(setting('sebutan_desa')) . ' ' . ucwords($desa['nama_desa']) }}"
                style="width: 40px; height: 40px; object-fit: contain;">
        </div>
    </div>
</div>

<style>
    @keyframes spinZoom {
        0% {
            transform: rotate(0deg) scale(1);
            opacity: 1;
        }

        50% {
            transform: rotate(180deg) scale(1.2);
            opacity: 0.6;
        }

        100% {
            transform: rotate(360deg) scale(1);
            opacity: 1;
        }
    }
</style>

@push('scripts')
    <script>
        (function() {
            function sembunyikanLoading() {
                var layar = document.getElementById('natra-loading-screen');
                if (!layar) {
                    return;
                }
                layar.style.opacity = '0';
                setTimeout(function() {
                    layar.style.display = 'none';
                }, 300);
            }
            setTimeout(sembunyikanLoading, 1500);
        })();
    </script>
@endpush
