<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Akun - {{ $currentUser->name }}</title>
    
    <!-- Import Google Font Poppins & FontAwesome Icon -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* === RESET & BASE STYLES === */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            width: 100%;
            min-height: 100vh;
            /* Gradasi latar belakang biru penuh dari atas ke bawah */
            background: linear-gradient(180deg, #d9e8f8 0%, #b8d7f9 40%, #9bc6f4 100%);
            background-attachment: fixed;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-bottom: 60px;
        }

        /* === BANNER BACKGROUND ATAS === */
        .top-banner-container {
            width: 100%;
            height: 240px;
            position: relative;
            background-color: #cbe3ff;
        }

        .top-banner-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* === CONTAINER UTAMA KONTEN === */
        .main-wrapper {
            width: 100%;
            max-width: 590px;
            padding: 0;
            margin-top: -106px;
            position: relative;
            z-index: 5;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        /* === GRADIENT TEXT CLASS === */
        .text-gradient {
            background: linear-gradient(180deg, #050F71 0%, #6A96CA 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
            font-weight: 700;
        }

        /* === 1. CARD PROFIL === */
        .profile-card {
            background: #FFFFFF;
            border-radius: 28px;
            box-shadow: 0 10px 25px rgba(5, 15, 113, 0.08);
            position: relative;
            padding-top: 90px;
            text-align: center;
            /* overflow: hidden DIHAPUS agar bagian atas foto profil tidak terpotong */
        }

        /* Avatar Profil & Edit Icon */
        .avatar-container {
            position: absolute;
            top: -82px;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 150px;
            z-index: 10;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 6px solid #FFFFFF;
            box-shadow: none;
            background-color: #FFFFFF;
            display: block;
        }

        .edit-icon-btn {
            position: absolute;
            bottom: 7px;
            right: 7px;
            width: 38px;
            height: 38px;
            background-color: #FFFFFF;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: none;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.2s ease;
            z-index: 11;
        }

        .edit-icon-btn:hover {
            transform: scale(1.08);
            background-color: #f8fafc;
        }

        .edit-icon-btn svg {
            width: 18px;
            height: 18px;
            stroke: #72a4e2;
        }

        #file-input {
            display: none;
        }

        .profile-name {
            font-size: 28px;
            font-weight: 800;
            line-height: 1.2;
            outline: none;
            cursor: text;
            display: inline-block;
            min-width: 1ch;
        }

        .profile-name:focus {
            text-decoration: underline;
            text-decoration-color: #C5E0FB;
            text-underline-offset: 5px;
        }

        .profile-email {
            font-size: 14px;
            color: #7c8ba1;
            font-weight: 500;
            margin-top: 4px;
            margin-bottom: 22px;
        }

        .profile-badge {
            background-color: #C5E0FB;
            color: #FFFFFF;
            font-size: 20px;
            font-weight: 700;
            padding: 14px 0;
            width: 100%;
            text-align: center;
            letter-spacing: 0.5px;
            /* Melengkungkan sudut bawah badge agar sesuai dengan card */
            border-bottom-left-radius: 28px;
            border-bottom-right-radius: 28px;
        }

        /* === 2. JADWAL SECTION === */
        .schedule-container {
            background-color: #C5E0FB;
            border-radius: 28px;
            padding: 22px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            box-shadow: 0 8px 20px rgba(5, 15, 113, 0.05);
        }

        .schedule-card {
            background-color: #FFFFFF;
            border-radius: 20px;
            padding: 23px 16px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .day-title {
            color: #9BC6F4;
            font-size: 20px;
            font-weight: 700;
            line-height: 1.1;
        }

        .date-text {
            color: #A0A0A0;
            font-size: 12px;
            font-weight: 500;
            margin-top: 4px;
            margin-bottom: 12px;
        }

        .divider-line {
            width: 85%;
            height: 1.5px;
            background-color: #F0F0F0;
            margin: 8px 0;
        }

        .subject-title {
            font-size: 18px;
            font-weight: 800;
            padding: 4px 0;
        }

        .time-text {
            color: #A0A0A0;
            font-size: 12px;
            font-weight: 500;
        }

        /* === 3. ABSENSI SECTION === */
        .absensi-container {
            background-color: #C5E0FB;
            border-radius: 28px;
            padding: 22px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(5, 15, 113, 0.05);
        }

        .section-title-white {
            color: #FFFFFF;
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .absensi-card {
            background-color: #FFFFFF;
            border-radius: 20px;
            padding: 24px 18px;
        }

        .month-title {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .absensi-grid {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .week-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .week-badge {
            background-color: #C5E0FB;
            color: #FFFFFF;
            font-size: 11px;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 12px;
            margin-bottom: 12px;
            white-space: nowrap;
        }

        .icon-star, .icon-triangle {
            font-size: 22px;
            margin-bottom: 4px;
        }

        .status-text {
            font-size: 13px;
            font-weight: 700;
            color: #9BC6F4;
        }

        .vertical-divider {
            width: 1px;
            height: 55px;
            background-color: #EBEBEB;
        }

        /* === 4. RIWAYAT TRANSAKSI SECTION === */
        .transaksi-container {
            background-color: #FFFFFF;
            border-radius: 28px;
            padding: 24px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(5, 15, 113, 0.06);
        }

        .section-title-blue {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .transaksi-table-wrapper {
            background-color: #C5E0FB;
            border-radius: 20px;
            padding: 18px 16px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            color: #FFFFFF;
        }

        th {
            font-size: 13px;
            font-weight: 700;
            padding-bottom: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.4);
            text-align: left;
        }

        th:last-child {
            text-align: center;
        }

        td {
            padding: 10px 4px;
            border-bottom: 1px solid rgba(255,255,255,0.3);
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .td-date {
            text-align: left;
            line-height: 1.1;
        }

        .td-date span {
            font-size: 18px;
            font-weight: 800;
            display: block;
        }

        .td-date small {
            font-size: 10px;
            font-weight: 600;
            opacity: 0.9;
        }

        .td-desc strong, .td-method strong {
            display: block;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.2;
        }

        .td-desc span, .td-method span {
            font-size: 10px;
            font-weight: 400;
            opacity: 0.85;
        }

        .td-amount {
            font-size: 13px;
            font-weight: 800;
            white-space: nowrap;
        }

        .td-status {
            text-align: center;
        }

        .status-lunas,
        .status-menunggu,
        .status-ditolak,
        .status-dibatalkan {
            min-width: 88px;
            height: 27px;
            padding: 5px 14px;
            border-radius: 999px;
            color: #FFFFFF;
            font-size: 11px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            white-space: nowrap;
        }

        .status-lunas { background-color: #52c488; }
        .status-menunggu { background-color: #6EA4EA; }
        .status-ditolak { background-color: #A90000; }
        .status-dibatalkan { background-color: #8A8A8A; }


        /* === POPUP EDIT PROFIL — hanya fitur tambahan === */
        .profile-popup-overlay{
            position:fixed;
            inset:0;
            background:rgba(255,255,255,0.08);
            display:none;
            align-items:center;
            justify-content:center;
            padding:20px;
            z-index:99999;
        }
        .profile-popup-overlay.show{display:flex}
        .profile-popup{
            width:min(430px,100%);
            background:#C5E0FB;
            border-radius:24px;
            padding:44px 44px 36px;
            text-align:center;
        }
        .profile-popup-avatar{
            width:150px;
            height:150px;
            min-width:150px;
            min-height:150px;
            margin:0 auto 30px;
            border-radius:50%;
            object-fit:cover;
            border:0;
            background:#FFFFFF;
            box-shadow:none;
            display:block;
        }
        .profile-popup-field-wrap{
            position:relative;
            width:100%;
            margin-bottom:14px;
        }
        .profile-popup-field{
            width:100%;
            height:48px;
            border:0;
            outline:0;
            background:#FFFFFF;
            color:#050F71;
            border-radius:28px;
            padding:0 20px;
            font-family:'Poppins',sans-serif;
            font-size:15px;
            font-weight:500;
        }
        .profile-popup-email{
            padding-right:48px;
        }
        .profile-popup-lock{
            position:absolute;
            right:18px;
            top:50%;
            transform:translateY(-50%);
            width:15px;
            height:auto;
            display:block;
            pointer-events:none;
        }
        .profile-popup-action{
            width:100%;
            height:48px;
            border:0;
            border-radius:28px;
            font-family:'Poppins',sans-serif;
            font-size:15px;
            font-weight:700;
            cursor:pointer;
            color:#FFFFFF;
            margin-bottom:14px;
        }
        .profile-popup-change{
            background:linear-gradient(90deg,#050F71 0%,#78B0ED 100%);
        }
        .profile-popup-delete{
            background:#A90000;
        }
        .profile-popup-bottom{
            display:flex;
            justify-content:flex-end;
            gap:10px;
            margin-top:8px;
        }
        .profile-popup-bottom button{
            height:44px;
            min-width:92px;
            border:0;
            border-radius:24px;
            padding:0 22px;
            font-family:'Poppins',sans-serif;
            font-size:15px;
            font-weight:700;
            cursor:pointer;
            color:#FFFFFF;
        }
        .profile-popup-cancel{background:#A90000}
        .profile-popup-save{background:linear-gradient(90deg,#050F71 0%,#78B0ED 100%)}
        @media(max-width:540px){
            .profile-popup{padding:34px 22px 28px}
            .profile-popup-avatar{width:130px;height:130px}
        }


        /* === REVISI GARIS SAJA: JADWAL & ABSENSI === */
        .schedule-container {
            position: relative;
        }

        /* Garis tengah di antara kartu Jadwal */
        .schedule-container::after {
            content: "";
            position: absolute;
            top: 22px;
            bottom: 22px;
            left: 50%;
            width: 2px;
            transform: translateX(-50%);
            background-color: #B8D7F9;
            pointer-events: none;
        }

        /* Garis pemisah Absensi dibuat biru dengan ketebalan yang sama */
        .vertical-divider {
            width: 2px;
            background-color: #B8D7F9;
        }

        @media (max-width: 540px) {
            .schedule-container::after {
                display: none;
            }
        }


        /* === PENYESUAIAN JADWAL SESUAI DESAIN REFERENSI === */

        /* Base biru tetap sebagai container utama, sejajar dengan Absensi */
        .schedule-container {
            width: 100%;
            max-width: 100%;
            position: relative;
            box-sizing: border-box;
        }

        /* Garis tengah putih */
        .schedule-container::after {
            background-color: #FFFFFF;
            width: 2px;
        }

        /* Jarak kiri-kanan kartu putih dibuat seimbang seperti desain */
        .schedule-container {
            padding-left: 45px;
            padding-right: 45px;
        }

        /* Garis dalam kartu: biru, tipis, dan terpisah dari gradasi teks */
        .schedule-container .divider-line {
            height: 2px;
            background-color: #B8D7F9;
        }

        /* Gradasi teks tetap terpisah dan arahnya muda → tua */
        .schedule-container .day-title,
        .schedule-container .subject-title {
            background: linear-gradient(180deg, #9BC6F4 0%, #050F71 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
        }

        /* Bahasa Indonesia dibuat dua baris seperti desain */
        .schedule-container .schedule-card:nth-child(2) .subject-title {
            max-width: 210px;
            line-height: 1.08;
        }

        /* Garis absensi tetap biru */
        .absensi-container .vertical-divider {
            width: 2px;
            background-color: #B8D7F9;
        }

        /* Garis transaksi */
        .transaksi-container th,
        .transaksi-container td {
            border-bottom-width: 2px;
        }

        /* Bobot font mengikuti desain */
        .profile-popup-change,
        .profile-popup-delete,
        .profile-popup-cancel,
        .profile-popup-save,
        .week-badge {
            font-weight: 600;
        }

        .status-lunas {
            font-weight: 500;
        }


        /* === FINAL PENYESUAIAN SESUAI DESAIN JADWAL === */

        /* Latar belakang halaman akun: putih → biru, tanpa mengubah base section */
        body {
            background: linear-gradient(
                180deg,
                #FFFFFF 0%,
                #F5F9FE 34%,
                #C5E0FB 72%,
                #7DB5F2 100%
            );
        }

        /* Base biru Jadwal tetap selebar base section lain */
        .schedule-container {
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            padding: 22px;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            column-gap: 50px;
            row-gap: 18px;
            position: relative;
        }

        /* Kartu putih dipersempit tanpa menambah tinggi */
        .schedule-card {
            width: 100%;
            min-width: 0;
        }

        /* Garis tengah: putih seperti referensi */
        .schedule-container::after {
            top: 22px;
            bottom: 22px;
            left: 50%;
            width: 2px;
            transform: translateX(-50%);
            background: #FFFFFF;
        }

        /* Garis dalam kartu: biru muda seperti palette desain */
        .schedule-container .divider-line {
            width: 85%;
            height: 2px;
            background: #B8D7F9;
            margin: 8px 0;
        }

        /* Gradasi tiap elemen teks terpisah, arah muda → tua */
        .schedule-container .day-title {
            background: linear-gradient(180deg, #C5E0FB 0%, #9BC6F4 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
        }

        .schedule-container .subject-title {
            background: linear-gradient(180deg, #6A96CA 0%, #050F71 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
        }

        /* Bahasa Indonesia: Bahasa di atas, Indonesia di bawah */
        .schedule-container .schedule-card:nth-child(2) .subject-title {
            max-width: 170px;
            line-height: 1.08;
            white-space: normal;
        }

        /* Garis Absensi tetap biru dan ketebalannya konsisten */
        .absensi-container .vertical-divider {
            width: 2px;
            background: #B8D7F9;
        }

        /* Tidak mengubah tinggi base/section */
        @media (max-width: 540px) {
            .schedule-container {
                grid-template-columns: 1fr;
                column-gap: 0;
            }

            .schedule-container::after {
                display: none;
            }
        }


        /* === REVISI TERAKHIR: HANYA GRADASI & GARIS === */

        /* Semua elemen gradient: BIRU MUDA -> BIRU TUA.
           Setiap elemen memakai gradient-nya sendiri. Palette tetap. */
        .text-gradient {
            background: linear-gradient(180deg, #9BC6F4 0%, #050F71 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
        }

        /* Sakit dibuat sama dengan Hadir agar tidak belang */
        .status-text {
            color: #9BC6F4;
        }

        /* Garis vertikal Absensi: sedikit lebih panjang, tanpa mengubah tinggi base */
        .vertical-divider {
            width: 2px;
            height: 82px;
            background-color: #B8D7F9;
        }

        /* Dua garis di masing-masing kartu Jadwal: biru dan sejajar */
        .schedule-card .divider-line {
            width: 85%;
            height: 2px;
            background-color: #B8D7F9;
            margin: 8px 0;
            flex-shrink: 0;
        }

        /* Ruang subject dibuat sama agar garis bawah Matematika dan Bahasa
           Indonesia berada pada ketinggian yang sama. */
        .schedule-card .subject-title {
            min-height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px 0;
        }

        /* Tombol/badge Minggu tetap palette yang sama, hanya teksnya tidak belang */
        .week-badge {
            color: #FFFFFF;
        }


        /* === REVISI FONT SAJA: SAKIT + GRADASI PER BARIS === */

        /* Sakit dibuat sama persis dengan Hadir */
        .status-text {
            color: #B8D7F9;
            -webkit-text-fill-color: #B8D7F9;
            background: none;
        }

        /* Setiap baris Bahasa Indonesia mempunyai gradasi sendiri,
           tidak menyambung dengan baris lainnya. */
        .subject-title .gradient-line {
            display: block;
            background: linear-gradient(180deg, #9BC6F4 0%, #050F71 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
        }


        /* === REVISI HANYA MATEMATIKA & BAHASA INDONESIA === */
        .schedule-container .schedule-card:nth-child(1) .subject-title,
        .schedule-container .schedule-card:nth-child(2) .subject-title {
            font-size: 20px;
            font-weight: 700;
            line-height: 1.08;
        }

        .schedule-container .schedule-card:nth-child(1) .subject-title .gradient-line,
        .schedule-container .schedule-card:nth-child(2) .subject-title .gradient-line {
            display: block;
            font-size: 20px;
            font-weight: 700;
            line-height: 1.08;
            background: linear-gradient(180deg, #9BC6F4 0%, #050F71 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
        }


        /* === FIX HANYA BAHASA INDONESIA === */
        .schedule-card .bahasa-indonesia-title {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0;
            white-space: normal;
            line-height: 1.08;
        }

        .schedule-card .bahasa-indonesia-title .bahasa-line,
        .schedule-card .bahasa-indonesia-title .indonesia-line {
            display: block;
            width: 100%;
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            line-height: 1.08;
            background: linear-gradient(180deg, #9BC6F4 0%, #050F71 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
        }

        /* Responsif untuk layar yang lebih kecil */
        @media (max-width: 540px) {
            .main-wrapper {
                width: calc(100% - 20px);
            }

            .schedule-container {
                grid-template-columns: 1fr;
            }
            .absensi-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
            }
            .vertical-divider {
                display: none;
            }
        }

        /* =========================================================
           REVISI DETAIL — RIWAYAT TRANSAKSI SAJA
           ========================================================= */

        .transaksi-container {
            background-color: #FFFFFF;
            border-radius: 28px;
            padding: 24px 32px;
            text-align: center;
        }

        /* Judul referensi = biru muda SOLID, bukan gradient */
        .transaksi-container .section-title-blue {
            background: none !important;
            -webkit-background-clip: initial !important;
            background-clip: initial !important;
            -webkit-text-fill-color: #BFDEFF !important;
            color: #BFDEFF !important;
            font-size: 22px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 14px;
        }

        /* Base tabel */
        .transaksi-container .transaksi-table-wrapper {
            background-color: #BFDEFF;
            border-radius: 20px;
            padding: 18px 16px;
            overflow-x: auto;
        }

        .transaksi-container table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            color: #FFFFFF;
        }

        /* Header */
        .transaksi-container th {
            font-size: 13px;
            font-weight: 700;
            line-height: 1.2;
            padding: 0 4px 12px;
            border-bottom: 2px solid #FFFFFF;
            text-align: left;
        }

        .transaksi-container th:last-child {
            text-align: center;
        }

        /* Isi tabel */
        .transaksi-container td {
            padding: 10px 4px;
            border-bottom: 2px solid #FFFFFF;
            vertical-align: middle;
        }

        .transaksi-container tr:last-child td {
            border-bottom: none;
        }

        /* Tanggal */
        .transaksi-container .td-date {
            text-align: left;
            line-height: 1.1;
        }

        .transaksi-container .td-date span {
            font-size: 18px;
            font-weight: 800;
            display: block;
        }

        .transaksi-container .td-date small {
            font-size: 10px;
            font-weight: 500;
            opacity: 0.9;
        }

        /* Paket + metode */
        .transaksi-container .td-desc strong,
        .transaksi-container .td-method strong {
            display: block;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.2;
        }

        .transaksi-container .td-desc span,
        .transaksi-container .td-method span {
            font-size: 10px;
            font-weight: 400;
            opacity: 0.85;
        }

        /* Jumlah */
        .transaksi-container .td-amount {
            font-size: 13px;
            font-weight: 800;
            white-space: nowrap;
        }

        .transaksi-container .td-status {
            text-align: center;
        }

        /* Hijau Lunas = #66C092 sesuai referensi */
        .transaksi-container .status-lunas {
            background-color: #66C092;
            color: #FFFFFF;
            padding: 5px 14px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 500;
            display: inline-block;
        }


        /* =========================================================
           RIWAYAT TRANSAKSI — PENYESUAIAN DETAIL SESUAI REFERENSI
           HANYA BAGIAN INI YANG DIREVISI
           ========================================================= */

        .transaksi-container {
            padding: 24px 32px;
            text-align: center;
        }

        .transaksi-container .section-title-blue {
            background: none !important;
            -webkit-background-clip: initial !important;
            background-clip: initial !important;
            -webkit-text-fill-color: #BFDEFF !important;
            color: #BFDEFF !important;
            font-size: 22px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 14px;
        }

        .transaksi-container .transaksi-table-wrapper {
            background-color: #BFDEFF;
            border-radius: 20px;
            padding: 18px 16px;
            overflow-x: auto;
        }

        .transaksi-container table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            color: #FFFFFF;
        }

        .transaksi-container th {
            font-size: 13px;
            font-weight: 600;
            line-height: 1.2;
            padding: 0 4px 12px;
            border-bottom: 2px solid #FFFFFF;
        }

        .transaksi-container th:last-child {
            text-align: center;
        }

        .transaksi-container td {
            padding: 10px 4px;
            border-bottom: 2px solid #FFFFFF;
            vertical-align: middle;
        }

        .transaksi-container tr:last-child td {
            border-bottom: none;
        }

        /* Tanggal: TENGAH */
        .transaksi-container .td-date {
            text-align: center;
            line-height: 1.08;
        }

        .transaksi-container .td-date span {
            display: block;
            font-size: 18px;
            font-weight: 700;
        }

        .transaksi-container .td-date small {
            display: block;
            font-size: 10px;
            font-weight: 500;
            opacity: 0.9;
        }

        .transaksi-container .td-desc,
        .transaksi-container .td-method {
            line-height: 1.18;
        }

        .transaksi-container .td-desc strong,
        .transaksi-container .td-method strong {
            display: block;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.18;
        }

        .transaksi-container .td-desc span,
        .transaksi-container .td-method span {
            display: block;
            font-size: 10px;
            font-weight: 400;
            opacity: 0.85;
        }

        .transaksi-container .td-amount {
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        .transaksi-container .td-status {
            text-align: center;
        }

        .transaksi-container .status-lunas {
            background-color: #66C092;
            color: #FFFFFF;
            padding: 5px 14px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 500;
            display: inline-block;
        }
        /* === LOGOUT: POPUP DIPERKECIL, DESAIN LAIN TETAP === */
        .logout-icon{
            position:absolute;
            top:28px;
            right:18px;
            width:38px;
            height:38px;
            padding:0;
            border:0;
            background:transparent;
            cursor:pointer;
            z-index:9999;
        }

        .logout-icon img{
            width:100%;
            height:100%;
            display:block;
            object-fit:contain;
        }

        .logout-overlay{
            position:fixed;
            inset:0;
            display:none;
            align-items:center;
            justify-content:center;
            background:rgba(0,0,0,0.04);
            z-index:99999;
            padding:20px;
        }

        .logout-overlay.show{
            display:flex;
        }

        .logout-popup{
            width:min(520px, calc(100vw - 32px));
            height:175px;
            box-sizing:border-box;
            border-radius:18px;
            background:linear-gradient(
                180deg,
                #78B0ED 0%,
                #CDE4FB 42%,
                #FFFFFF 100%
            );
            box-shadow:0 7px 16px rgba(0,0,0,.18);
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            padding:18px 22px;
            font-family:'Poppins',sans-serif;
        }

        .logout-popup-text{
            margin:0 0 20px;
            color:#FFFFFF;
            font-family:'Poppins',sans-serif;
            font-size:16px;
            font-weight:400;
            line-height:1.25;
            text-align:center;
        }

        .logout-actions{
            display:flex;
            align-items:center;
            justify-content:center;
            gap:14px;
        }

        .logout-actions button{
            width:95px;
            height:40px;
            border:0;
            border-radius:18px;
            color:#FFFFFF;
            font-family:'Poppins',sans-serif;
            font-size:14px;
            font-weight:600;
            cursor:pointer;
        }

        .logout-no{
            background:#A90000;
        }

        .logout-yes{
            background:linear-gradient(
                90deg,
                #050F71 0%,
                #78B0ED 100%
            );
        }

        @media(max-width:900px){
            .logout-popup{
                width:calc(100vw - 40px);
                height:165px;
            }

            .logout-popup-text{
                font-size:16px;
                margin-bottom:18px;
            }

            .logout-actions{
                gap:10px;
            }

            .logout-actions button{
                width:100px;
                height:38px;
                font-size:14px;
            }
        }

        @media(max-width:540px){
            .logout-icon{
                top:15px;
                right:12px;
                width:32px;
                height:32px;
            }

            .logout-popup{
                width:calc(100vw - 28px);
                height:150px;
                border-radius:18px;
                padding:16px 14px;
            }

            .logout-popup-text{
                font-size:16px;
                margin-bottom:16px;
            }

            .logout-actions{
                gap:10px;
            }

            .logout-actions button{
                width:95px;
                height:36px;
                font-size:14px;
            }
        }


    
        .transaksi-container .status-lunas {
            background-color: #66C092;
            color: #FFFFFF;
            padding: 5px 14px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 500;
            display: inline-block;
        }
</style>
</head>
<body>

@php
    $accountPurchases = \App\Models\Purchase::query()
        ->where('user_id', $currentUser->id)
        ->latest('id')
        ->get();

    $activePurchase = $accountPurchases
        ->first(fn ($purchase) => $purchase->status !== 'cancelled');

    $activePackageRecord = $activePurchase
        ? \App\Models\Package::find((int) $activePurchase->package)
        : null;

    $activePackageLabel = $activePackageRecord?->name
        ?? ($activePurchase ? ucwords(str_replace('-', ' ', $activePurchase->package)) : 'Belum pilih paket');

    /* Jadwal User diambil langsung dari database Jadwal berdasarkan user yang sedang login. */
    $userJadwals = \App\Models\Jadwal::query()
        ->where('user_id', $currentUser->id)
        ->orderBy('tanggal')
        ->orderBy('jam_mulai')
        ->get();

    /* Pertahankan desain 2 kartu yang sudah ada: tampilkan 2 jadwal terdekat. */
    $scheduleCards = $userJadwals
        ->filter(fn ($jadwal) => \Carbon\Carbon::parse($jadwal->tanggal)->gte(now()->startOfDay()))
        ->take(2)
        ->values();

    /* Absensi User diambil langsung dari tabel absensis berdasarkan user yang sedang login. */
    $attendanceMonth = now()->month;
    $attendanceYear = now()->year;

    $userAbsensis = \App\Models\Absensi::query()
        ->where('user_id', $currentUser->id)
        ->whereYear('tanggal', $attendanceYear)
        ->whereMonth('tanggal', $attendanceMonth)
        ->orderBy('tanggal')
        ->get();

    $attendanceByWeek = $userAbsensis->keyBy('minggu_ke');
@endphp

    <!-- BANNER BACKGROUND ATAS (FULL WIDTH) -->
    <div class="top-banner-container">
        <img src="{{ asset('images/Base Akun.jpg') }}" alt="Base Background" class="top-banner-img" id="banner-img" onerror="tryNextFormat(this, ['{{ asset('images/Base Akun.png') }}', '{{ asset('images/Base Akun.jpeg') }}'])">
    </div>

    <!-- WRAPPER KONTEN UTAMA -->
    <div class="main-wrapper">
        
        <!-- 1. HEADER PROFIL -->
        <div class="profile-card">

        <!-- IKON LOGOUT: DESAIN MENGIKUTI TEMPLATE YANG KAMU BUAT -->
        <button class="logout-icon" id="openLogout" type="button" aria-label="Keluar">
            <img src="{{ asset('images/Icon Keluar.png') }}" alt="Keluar">
        </button>

        <!-- POPUP LOGOUT -->
        <div class="logout-overlay" id="logoutOverlay" aria-hidden="true">
            <div class="logout-popup" role="dialog" aria-modal="true" aria-label="Konfirmasi Keluar">
                <p class="logout-popup-text">Apakah Anda Yakin Ingin Keluar ?</p>
                <div class="logout-actions">
                    <button class="logout-no" id="logoutNo" type="button">Tidak</button>
                    <button class="logout-yes" id="logoutYes" type="button">Ya</button>
                </div>
            </div>
        </div>

        <!-- FORM LOGOUT LARAVEL -->
        <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
            <div class="avatar-container">
                <img src="{{ asset('images/Profil Kosong.png') }}" alt="Profile Picture" class="avatar-img" id="profile-pic" onerror="tryNextFormat(this, ['{{ asset('images/Profil Kosong.png') }}'])">
                
                <!-- Tombol Edit Icon Foto Profil -->
                <label class="edit-icon-btn" id="open-profile-popup" title="Ganti Foto Profil">
                    <img src="{{ asset('images/Icon Edit.png') }}" alt="Icon Edit" style="width:28px;height:28px;object-fit:contain;display:block;">
                </label>
                <input type="file" id="file-input" accept="image/*">
            </div>
            
            <div class="profile-info">
                <div class="editable-name-wrap">
                    <h1 class="profile-name text-gradient" id="profile-name">{{ $currentUser->name }}</h1>
                </div>
                <p class="profile-email">{{ $currentUser->email }}</p>
            </div>
            
            <div class="profile-badge">
                • {{ $activePackageLabel }} •
            </div>
        </div>

        <!-- 2. JADWAL SECTION -->
        <div class="schedule-container">
            @for($i = 0; $i < 2; $i++)
                @php
                    $jadwalUser = $scheduleCards->get($i);
                @endphp

                <div class="schedule-card">
                    @if($jadwalUser)
                        <div class="day-title text-gradient">
                            {{ \Carbon\Carbon::parse($jadwalUser->tanggal)->locale('id')->translatedFormat('l') }}
                        </div>

                        <div class="date-text">
                            {{ \Carbon\Carbon::parse($jadwalUser->tanggal)->locale('id')->translatedFormat('d F Y') }}
                        </div>

                        <div class="divider-line"></div>

                        @if($jadwalUser->belajar === 'Bahasa Indonesia')
                            <div class="subject-title bahasa-indonesia-title">
                                <span class="gradient-line bahasa-line">Bahasa</span>
                                <span class="gradient-line indonesia-line">Indonesia</span>
                            </div>
                        @else
                            <div class="subject-title">
                                <span class="gradient-line">{{ $jadwalUser->belajar }}</span>
                            </div>
                        @endif

                        <div class="divider-line"></div>

                        <div class="time-text">
                            {{ \Carbon\Carbon::parse($jadwalUser->jam_mulai)->format('H.i') }}
                            –
                            {{ \Carbon\Carbon::parse($jadwalUser->jam_selesai)->format('H.i') }}
                        </div>
                    @else
                        <div class="day-title text-gradient">Jadwal</div>
                        <div class="date-text">Belum punya jadwal</div>
                        <div class="divider-line"></div>
                        <div class="subject-title">
                            <span class="gradient-line">Belum ada</span>
                        </div>
                        <div class="divider-line"></div>
                        <div class="time-text">---</div>
                    @endif
                </div>
            @endfor
        </div>

        <!-- 3. ABSENSI SECTION -->
        <div class="absensi-container">
            <h3 class="section-title-white">• Absensi •</h3>
            <div class="absensi-card">
                <h4 class="month-title text-gradient">
                    {{ \Carbon\Carbon::create($attendanceYear, $attendanceMonth, 1)->locale('id')->translatedFormat('F Y') }}
                </h4>

                <div class="absensi-grid">
                    @for($week = 1; $week <= 4; $week++)
                        @php
                            $absensiUser = $attendanceByWeek->get($week);
                            $statusAbsensi = $absensiUser ? $absensiUser->status : 'Belum absen';

                            $statusIcon = match ($statusAbsensi) {
                                'Hadir' => '✓',
                                'Sakit' => '+',
                                'Izin' => 'i',
                                'Alpa' => '×',
                                default => '-',
                            };
                        @endphp

                        <div class="week-item">
                            <div class="week-badge">Minggu {{ $week }}</div>

                            @if($week === 3)
                                <div class="icon-triangle text-gradient">{{ $statusIcon }}</div>
                            @else
                                <div class="icon-star text-gradient">{{ $statusIcon }}</div>
                            @endif

                            <div class="status-text">{{ $statusAbsensi }}</div>
                        </div>

                        @if($week < 4)
                            <div class="vertical-divider"></div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>

        <!-- 4. RIWAYAT TRANSAKSI SECTION -->
        <div class="transaksi-container">
            <h3 class="section-title-blue text-gradient">• Riwayat Transaksi •</h3>
            <div class="transaksi-table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Paket</th>
                            <th>Metode</th>
                            <th>Jumlah</th>
                            <th style="text-align: center;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($accountPurchases as $purchase)
                            @php
                                $statusLabel = match ($purchase->status) {
                                    'success' => 'Lunas',
                                    'failed' => 'Ditolak',
                                    'cancelled' => 'Dibatalkan',
                                    default => 'Menunggu',
                                };

                                $statusClass = match ($purchase->status) {
                                    'success' => 'status-lunas',
                                    'failed' => 'status-ditolak',
                                    'cancelled' => 'status-dibatalkan',
                                    default => 'status-menunggu',
                                };

                                $packageRecord = \App\Models\Package::find((int) $purchase->package);
                                $packageLabel = $packageRecord?->name
                                    ?? ucwords(str_replace('-', ' ', $purchase->package));

                                $methodLabel = $purchase->payment_method === 'transfer'
                                    ? 'Transfer Bank'
                                    : 'Tunai';

                                $methodDetail = $purchase->payment_method === 'transfer'
                                    ? 'BCA 6767676767'
                                    : 'Bayar langsung';
                            @endphp

                            <tr>
                                <td class="td-date">
                                    <span>{{ $purchase->created_at->format('d') }}</span>
                                    <small>{{ $purchase->created_at->translatedFormat('M Y') }}</small>
                                </td>

                                <td class="td-desc">
                                    <strong>{{ $packageLabel }}</strong>
                                    <span>Periode {{ $purchase->created_at->translatedFormat('F') }}</span>
                                </td>

                                <td class="td-method">
                                    <strong>{{ $methodLabel }}</strong>
                                    <span>{{ $methodDetail }}</span>
                                </td>

                                <td class="td-amount">
                                    Rp {{ number_format($purchase->price, 0, ',', '.') }}
                                </td>

                                <td class="td-status">
                                    <span class="{{ $statusClass }}">{{ $statusLabel }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center; padding:10px 4px;">
                                    Belum ada transaksi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <!-- POPUP EDIT PROFIL -->
    <div class="profile-popup-overlay" id="profile-popup-overlay" aria-hidden="true">
        <div class="profile-popup" role="dialog" aria-modal="true" aria-label="Edit Profil">
            <img src="{{ asset('images/Profil Kosong.png') }}" alt="Profile Preview" class="profile-popup-avatar" id="popup-profile-pic"
                 onerror="this.onerror=null;this.src='{{ asset('images/Profil Kosong.png') }}';">

            <div class="profile-popup-field-wrap">
                <input type="text" class="profile-popup-field" id="popup-profile-name"
                       value="{{ $currentUser->name }}" aria-label="Username">
            </div>

            <div class="profile-popup-field-wrap">
                <input type="email" class="profile-popup-field profile-popup-email"
                       id="popup-profile-email" value="{{ $currentUser->email }}"
                       aria-label="Email" readonly>
                <img src="{{ asset('images/Icon Gembok.png') }}" alt="" class="profile-popup-lock" aria-hidden="true">
            </div>

            <button type="button" class="profile-popup-action profile-popup-change" id="change-photo-btn">
                Ubah Foto Profil
            </button>

            <button type="button" class="profile-popup-action profile-popup-delete" id="delete-photo-btn">
                Hapus Foto Profil
            </button>

            <div class="profile-popup-bottom">
                <button type="button" class="profile-popup-cancel" id="profile-popup-cancel">Batal</button>
                <button type="button" class="profile-popup-save" id="profile-popup-save">Simpan</button>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT FITUR POPUP PROFIL & FALLBACK IMAGES -->
    <script>
        const profilePopupOverlay = document.getElementById('profile-popup-overlay');
        const openProfilePopup = document.getElementById('open-profile-popup');
        const closeProfilePopup = document.getElementById('profile-popup-cancel');
        const saveProfilePopup = document.getElementById('profile-popup-save');
        const changePhotoBtn = document.getElementById('change-photo-btn');
        const deletePhotoBtn = document.getElementById('delete-photo-btn');
        const fileInput = document.getElementById('file-input');

        const profilePic = document.getElementById('profile-pic');
        const popupProfilePic = document.getElementById('popup-profile-pic');
        const profileName = document.getElementById('profile-name');
        const profileEmail = document.querySelector('.profile-email');
        const popupProfileName = document.getElementById('popup-profile-name');

        let pendingPhoto = null;

        openProfilePopup.addEventListener('click', function(event) {
            event.preventDefault();
            popupProfileName.value = profileName.textContent.trim();
            popupProfilePic.src = profilePic.src;
            pendingPhoto = null;
            profilePopupOverlay.classList.add('show');
            profilePopupOverlay.setAttribute('aria-hidden', 'false');
        });

        function closeProfilePopupWindow() {
            profilePopupOverlay.classList.remove('show');
            profilePopupOverlay.setAttribute('aria-hidden', 'true');
            pendingPhoto = null;
            fileInput.value = '';
        }

        closeProfilePopup.addEventListener('click', closeProfilePopupWindow);

        profilePopupOverlay.addEventListener('click', function(event) {
            if (event.target === profilePopupOverlay) {
                closeProfilePopupWindow();
            }
        });

        changePhotoBtn.addEventListener('click', function() {
            fileInput.click();
        });

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files && event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                pendingPhoto = e.target.result;
                popupProfilePic.src = pendingPhoto;
            };
            reader.readAsDataURL(file);
        });

        deletePhotoBtn.addEventListener('click', function() {
            pendingPhoto = '{{ asset('images/Profil Kosong.png') }}';
            popupProfilePic.src = pendingPhoto;
            popupProfilePic.style.width = '150px';
            popupProfilePic.style.height = '150px';
        });

        saveProfilePopup.addEventListener('click', function() {
            const newName = popupProfileName.value.trim() || '{{ $currentUser->name }}';
            profileName.textContent = newName;

            if (pendingPhoto) {
                profilePic.src = pendingPhoto;
            }

            closeProfilePopupWindow();
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && profilePopupOverlay.classList.contains('show')) {
                closeProfilePopupWindow();
            }
        });

        function tryNextFormat(imgElement, fallbackList) {
            if (!imgElement.dataset.attempt) {
                imgElement.dataset.attempt = 0;
            }

            let index = parseInt(imgElement.dataset.attempt);
            if (index < fallbackList.length) {
                imgElement.dataset.attempt = index + 1;
                imgElement.src = fallbackList[index];
            }
        }
    
        // === LOGOUT ===
        const logoutOverlay = document.getElementById('logoutOverlay');
        const openLogout = document.getElementById('openLogout');
        const logoutNo = document.getElementById('logoutNo');
        const logoutYes = document.getElementById('logoutYes');
        const logoutForm = document.getElementById('logoutForm');

        if (openLogout && logoutOverlay) {
            openLogout.addEventListener('click', function (event) {
                event.preventDefault();
                logoutOverlay.classList.add('show');
                logoutOverlay.setAttribute('aria-hidden', 'false');
            });
        }

        if (logoutNo && logoutOverlay) {
            logoutNo.addEventListener('click', function () {
                logoutOverlay.classList.remove('show');
                logoutOverlay.setAttribute('aria-hidden', 'true');
            });
        }

        if (logoutOverlay) {
            logoutOverlay.addEventListener('click', function (event) {
                if (event.target === logoutOverlay) {
                    logoutOverlay.classList.remove('show');
                    logoutOverlay.setAttribute('aria-hidden', 'true');
                }
            });
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && logoutOverlay && logoutOverlay.classList.contains('show')) {
                logoutOverlay.classList.remove('show');
                logoutOverlay.setAttribute('aria-hidden', 'true');
            }
        });

        if (logoutYes && logoutForm) {
            logoutYes.addEventListener('click', function () {
                logoutForm.submit();
            });
        }

    </script>

</body>
</html>