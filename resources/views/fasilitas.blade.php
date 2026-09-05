<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas - Oson Intensif</title>

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

        .btn-circle.page2-left {
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
        }

        .btn-circle.page2-left:hover {
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
        #page-1 {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Text Box / Speech Bubble */
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

        /* Maskot Gajah Setengah Badan - Diberi efek Mirror (scaleX(-1)) */
        .mascot-fasilitas {
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

        /* TULISAN FASILITAS - TETAP STYLE ASLI, FULL PUTIH */
        .text-fasilitas {
            font-family: 'Press Start 2P', cursive, sans-serif;
            color: #ffffff;
            font-size: 22px;
            letter-spacing: 1px;
            margin-top: 40px;
            margin-bottom: 0;
            text-shadow: 2px 2px 0px rgba(0, 0, 0, 0.2);
        }

        /* LOGO OSON - DITARIK SANGAT DEKAT KE TULISAN */
        .logo-oson {
            width: 250px;
            height: auto;
            object-fit: contain;
            margin-top: -35px;
        }

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

        /* ================= PAGE 2: BUKU TERBUKA (2 KERTAS) ================= */
        #page-2 {
            display: none;
            position: relative;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

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
        <div id="page-1">
            <div class="btn-circle left" onclick="window.location.href='{{ route('home') }}'" title="Kembali">
                <div class="icon-arrow-left"></div>
            </div>

            <div class="speech-bubble">
                <span class="line">Klik Buku</span>
                <span class="line">untuk Membuka</span>
            </div>

            <img src="{{ asset('images/Maskot Fasilitas.png') }}"
                 alt="Maskot Fasilitas"
                 class="mascot-fasilitas"
                 onerror="tryNextFormat(this, ['{{ asset('images/Maskot Fasilitas.jpg') }}', 'Maskot%20Fasilitas.png', '{{ asset('images/Maskot Fasilitas.jpg') }}'])">

            <div class="book-cover" onclick="openBook()">
                <div class="text-fasilitas">Fasilitas</div>
                <img src="{{ asset('images/Logo Oson Itensif.png') }}"
                     alt="Logo Oson Intensif"
                     class="logo-oson"
                     onerror="tryNextFormat(this, ['Logo Oson Itensif.jpg', 'Logo%20Oson%20Itensif.png', 'Logo%20Oson%20Itensif.jpg'])">

                <div class="cover-stripes">
                    <div class="stripe-thick"></div>
                    <div class="stripe-thin"></div>
                </div>
            </div>
        </div>

        <!-- HALAMAN 2 (BUKU TERBUKA) -->
        <div id="page-2">
            <div class="btn-circle page2-left" onclick="closeBook()" title="Kembali ke Cover">
                <div class="icon-arrow-left"></div>
            </div>

            <div class="btn-circle right-top" onclick="closeBook()" title="Tutup">
                <div class="icon-close"></div>
            </div>

            <div class="open-book-base">
                <div class="paper-container">
                    <img src="{{ asset('images/Kertas Fasilitas 1.png') }}"
                         alt="Kertas Fasilitas 1"
                         class="paper-image"
                         onerror="tryNextFormat(this, ['{{ asset('images/Kertas Fasilitas 1.jpg') }}', '{{ asset('images/Kertas Fasilitas 1.jpeg') }}', 'Kertas%20Fasilitas%201.png', '{{ asset('images/Kertas Fasilitas 1.jpg') }}'])">
                </div>

                <div class="paper-container">
                    <img src="{{ asset('images/Kertas Fasilitas 2.png') }}"
                         alt="Kertas Fasilitas 2"
                         class="paper-image"
                         onerror="tryNextFormat(this, ['{{ asset('images/Kertas Fasilitas 2.jpg') }}', '{{ asset('images/Kertas Fasilitas 2.jpeg') }}', 'Kertas%20Fasilitas%202.png', '{{ asset('images/Kertas Fasilitas 2.jpg') }}'])">
                </div>
            </div>
        </div>

    </div>

    <script>
        function openBook() {
            document.getElementById('page-1').style.display = 'none';
            document.getElementById('page-2').style.display = 'flex';
        }

        function closeBook() {
            document.getElementById('page-2').style.display = 'none';
            document.getElementById('page-1').style.display = 'flex';
        }

        function tryNextFormat(imgElement, fallbackArray) {
            if (!imgElement.dataset.attempt) {
                imgElement.dataset.attempt = 0;
            }

            let attempt = parseInt(imgElement.dataset.attempt);
            if (attempt < fallbackArray.length) {
                imgElement.dataset.attempt = attempt + 1;
                imgElement.src = fallbackArray[attempt];
            }
        }
    </script>

</body>
</html>