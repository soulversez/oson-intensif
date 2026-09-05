<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Belajar - Oson Intensif</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;800;900&family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100vw;
            height: 100vh;
            background: linear-gradient(180deg, #8cb8f0 0%, #bcdcff 45%, #e8f2fe 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
        }

        /* Container Utama */
        .stage {
            position: relative;
            width: 100%;
            max-width: 950px;
            height: 580px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Tombol Navigasi Lingkaran */
        .btn-circle {
            position: absolute;
            width: 46px;
            height: 46px;
            background-color: #ffffff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            z-index: 10;
            transition: transform 0.15s ease, background-color 0.2s ease;
        }

        .btn-circle:hover {
            transform: scale(1.08);
            background-color: #f8fafc;
        }

        .btn-circle.left {
            top: 25px;
            left: 25px;
        }

        .btn-circle.right-top {
            top: 20px;
            right: 20px;
        }

        .btn-circle.nav-left {
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
        }

        .btn-circle.nav-left:hover {
            transform: translateY(-50%) scale(1.08);
        }

        .btn-circle.nav-right {
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
        }

        .btn-circle.nav-right:hover {
            transform: translateY(-50%) scale(1.08);
        }

        /* Icon Panah & Silang */
        .icon-arrow-left {
            width: 12px;
            height: 12px;
            border-left: 3.5px solid #5b92e5;
            border-bottom: 3.5px solid #5b92e5;
            transform: rotate(45deg);
            margin-left: 4px;
        }

        .icon-arrow-right {
            width: 12px;
            height: 12px;
            border-right: 3.5px solid #5b92e5;
            border-top: 3.5px solid #5b92e5;
            transform: rotate(45deg);
            margin-right: 4px;
        }

        .icon-close {
            position: relative;
            width: 16px;
            height: 16px;
        }

        .icon-close::before, .icon-close::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 3.5px;
            background-color: #5b92e5;
            top: 40%;
            left: 0;
            border-radius: 2px;
        }

        .icon-close::before { transform: rotate(45deg); }
        .icon-close::after { transform: rotate(-45deg); }

        /* ================= PAGE 1: COVER BUKU & MASCOT ================= */
        .page {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Speech Bubble */
        .speech-bubble {
            position: absolute;
            left: 145px;
            top: 110px;
            background: #ffffff;
            border-radius: 28px;
            padding: 12px 22px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            z-index: 6;
            text-align: center;
            line-height: 1.2;
        }

        .speech-bubble::after {
            content: '';
            position: absolute;
            bottom: -9px;
            left: 45px;
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 12px solid transparent;
            border-top: 11px solid #ffffff;
        }

        .speech-bubble .line {
            display: block;
            font-weight: 800;
            font-size: 15px;
            background: linear-gradient(180deg, #050F71 0%, #6A96CA 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Maskot Gajah Setengah Badan (Mirror) */
        .mascot-galeri {
            position: absolute;
            left: 25px;
            bottom: -125px;
            height: 600px;
            width: auto;
            z-index: 4;
            transform: scaleX(-1);
            filter: drop-shadow(0 8px 18px rgba(0, 0, 0, 0.12));
            pointer-events: none;
        }

        /* Cover Buku */
        .book-cover {
            position: relative;
            width: 370px;
            height: 480px;
            background-color: #70111A;
            border-radius: 28px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 75px;
            margin-left: 120px;
            cursor: pointer;
            z-index: 2;
            transition: transform 0.2s ease;
            overflow: hidden;
        }

        .book-cover:hover {
            transform: scale(1.015);
        }

        /* Tulisan Galeri */
        .text-galeri {
            font-family: 'Press Start 2P', cursive, sans-serif;
            color: #ffffff;
            font-size: 24px;
            letter-spacing: 1px;
            margin-top: 40px;
            margin-bottom: 0;
            text-shadow: 2px 2px 0px rgba(0, 0, 0, 0.2);
        }

        /* Logo Oson Intensif */
        .logo-oson {
            width: 250px;
            height: auto;
            object-fit: contain;
            margin-top: -35px;
        }

        /* Garis Putih */
        .cover-stripes {
            position: absolute;
            bottom: 55px;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .stripe-thick {
            width: 100%;
            height: 36px;
            background-color: #ffffff;
        }

        .stripe-thin {
            width: 100%;
            height: 6px;
            background-color: #ffffff;
        }

        /* ================= PAGE BUKU TERBUKA (PAGE 2, 3, 4) ================= */
        .open-book-base {
            position: relative;
            width: 772px;
            height: 504px;
            background-color: #70111A;
            border-radius: 28px;
            padding: 12px;
            box-shadow: 0 14px 35px rgba(0, 0, 0, 0.22);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .paper-container {
            width: 370px;
            height: 480px;
            border-radius: 18px;
            overflow: hidden;
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Tampilan Khusus Cover Dalam (Halaman Kiri Page 2) - Tanpa Garis Putih */
        .inner-cover {
            width: 100%;
            height: 100%;
            background-color: #70111A;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .inner-cover .logo-oson-inner {
            width: 260px;
            height: auto;
            object-fit: contain;
        }

        .paper-image {
            width: 100%;
            height: 100%;
            object-fit: fill;
            display: block;
        }
    </style>
</head>
<body>

    <div class="stage">

        <!-- HALAMAN 1 (COVER BUKU) -->
        <div id="page-1" class="page">
            <div class="btn-circle left" onclick="window.location.href='{{ route('home') }}'" title="Kembali">
                <div class="icon-arrow-left"></div>
            </div>

            <div class="speech-bubble">
                <span class="line">Klik Buku</span>
                <span class="line">untuk Membuka</span>
            </div>

            <img src="{{ asset('images/Maskot Fasilitas.png') }}"
                 alt="Maskot Galeri"
                 class="mascot-galeri"
                 onerror="tryNextFormat(this, ['{{ asset("images/Maskot Fasilitas.jpg") }}', 'Maskot%20Fasilitas.png', '{{ asset("images/Maskot Fasilitas.jpg") }}'])">

            <div class="book-cover" onclick="goToPage(2)">
                <div class="text-galeri">Galeri</div>
                <img src="{{ asset('images/Logo Oson Itensif.png') }}"
                     alt="Logo Oson Intensif"
                     class="logo-oson"
                     onerror="tryNextFormat(this, ['{{ asset("images/Logo Oson Itensif.jpg") }}', 'Logo%20Oson%20Itensif.png', 'Logo%20Oson%20Itensif.jpg'])">

                <div class="cover-stripes">
                    <div class="stripe-thick"></div>
                    <div class="stripe-thin"></div>
                </div>
            </div>
        </div>

        <!-- HALAMAN 2 (COVER MERAH + GALERI BELAJAR 1) -->
        <div id="page-2" class="page" style="display: none;">
            <div class="btn-circle nav-left" onclick="goToPage(1)" title="Kembali ke Cover">
                <div class="icon-arrow-left"></div>
            </div>

            <div class="btn-circle nav-right" onclick="goToPage(3)" title="Halaman Selanjutnya">
                <div class="icon-arrow-right"></div>
            </div>

            <div class="open-book-base">
                <!-- Kertas Kiri: Logo Oson TANPA Garis Putih -->
                <div class="paper-container">
                    <div class="inner-cover">
                        <img src="{{ asset('images/Logo Oson Itensif.png') }}"
                             alt="Logo Oson Intensif"
                             class="logo-oson-inner"
                             onerror="tryNextFormat(this, ['{{ asset("images/Logo Oson Itensif.jpg") }}', 'Logo%20Oson%20Itensif.png', 'Logo%20Oson%20Itensif.jpg'])">
                    </div>
                </div>

                <!-- Kertas Kanan: Galeri Belajar 1 -->
                <div class="paper-container">
                    <img src="{{ asset('images/Galeri Belajar 1.png') }}"
                         alt="Galeri Belajar 1"
                         class="paper-image"
                         onerror="tryNextFormat(this, ['{{ asset("images/Galeri Belajar 1.jpg") }}', '{{ asset("images/Galeri Belajar 1.jpeg") }}', 'Galeri%20Belajar%201.png', 'Galeri%20Belajar%201.jpg'])">
                </div>
            </div>
        </div>

        <!-- HALAMAN 3 (GALERI BELAJAR 2 + GALERI BELAJAR 3) -->
        <div id="page-3" class="page" style="display: none;">
            <div class="btn-circle nav-left" onclick="goToPage(2)" title="Halaman Sebelumnya">
                <div class="icon-arrow-left"></div>
            </div>

            <div class="btn-circle nav-right" onclick="goToPage(4)" title="Halaman Selanjutnya">
                <div class="icon-arrow-right"></div>
            </div>

            <div class="open-book-base">
                <!-- Kertas Kiri: Galeri Belajar 2 -->
                <div class="paper-container">
                    <img src="{{ asset('images/Galeri Belajar 2.png') }}"
                         alt="Galeri Belajar 2"
                         class="paper-image"
                         onerror="tryNextFormat(this, ['{{ asset("images/Galeri Belajar 2.jpg") }}', '{{ asset("images/Galeri Belajar 2.jpeg") }}', 'Galeri%20Belajar%202.png', 'Galeri%20Belajar%202.jpg'])">
                </div>

                <!-- Kertas Kanan: Galeri Belajar 3 -->
                <div class="paper-container">
                    <img src="{{ asset('images/Galeri Belajar 3.png') }}"
                         alt="Galeri Belajar 3"
                         class="paper-image"
                         onerror="tryNextFormat(this, ['{{ asset("images/Galeri Belajar 3.jpg") }}', '{{ asset("images/Galeri Belajar 3.jpeg") }}', 'Galeri%20Belajar%203.png', 'Galeri%20Belajar%203.jpg'])">
                </div>
            </div>
        </div>

        <!-- HALAMAN 4 (GALERI BELAJAR 4 + GALERI BELAJAR 5 + TOMBOL X) -->
        <div id="page-4" class="page" style="display: none;">
            <div class="btn-circle nav-left" onclick="goToPage(3)" title="Halaman Sebelumnya">
                <div class="icon-arrow-left"></div>
            </div>

            <!-- Tombol X Close di Halaman Terakhir -->
            <div class="btn-circle right-top" onclick="goToPage(1)" title="Tutup">
                <div class="icon-close"></div>
            </div>

            <div class="open-book-base">
                <!-- Kertas Kiri: Galeri Belajar 4 -->
                <div class="paper-container">
                    <img src="{{ asset('images/Galeri Belajar 4.png') }}"
                         alt="Galeri Belajar 4"
                         class="paper-image"
                         onerror="tryNextFormat(this, ['{{ asset("images/Galeri Belajar 4.jpg") }}', '{{ asset("images/Galeri Belajar 4.jpeg") }}', 'Galeri%20Belajar%204.png', 'Galeri%20Belajar%204.jpg'])">
                </div>

                <!-- Kertas Kanan: Galeri Belajar 5 -->
                <div class="paper-container">
                    <img src="{{ asset('images/Galeri Belajar 5.png') }}"
                         alt="Galeri Belajar 5"
                         class="paper-image"
                         onerror="tryNextFormat(this, ['{{ asset("images/Galeri Belajar 5.jpg") }}', '{{ asset("images/Galeri Belajar 5.jpeg") }}', 'Galeri%20Belajar%205.png', 'Galeri%20Belajar%205.jpg'])">
                </div>
            </div>
        </div>

    </div>

    <script>
        function goToPage(pageNum) {
            // Sembunyikan semua page
            const pages = document.querySelectorAll('.page');
            pages.forEach(page => {
                page.style.display = 'none';
            });

            // Tampilkan page yang dipilih
            const targetPage = document.getElementById('page-' + pageNum);
            if (targetPage) {
                targetPage.style.display = 'flex';
            }
        }

        function tryNextFormat(imgElement, fallbackArray) {
            if (!imgElement.dataset.attempt) {
                imgElement.dataset.attempt = 0;
            }

            let attempt = parseInt(imgElement.dataset.attempt, 10);

            if (attempt < fallbackArray.length) {
                imgElement.dataset.attempt = attempt + 1;
                imgElement.src = fallbackArray[attempt];
            }
        }
    </script>

</body>
</html>