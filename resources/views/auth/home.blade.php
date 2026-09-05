<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Oson Intensif</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
        /* RESET & BASE STYLES */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            width: 100%;
            min-height: 100vh;
            background: linear-gradient(180deg, #93baed 0%, #cce0f9 45%, #f2f7fe 100%);
            overflow-x: hidden;
            overflow-y: auto;
        }

        .canvas-container {
            width: 100%;
            max-width: 1100px;
            padding: 24px 40px 40px;
            position: relative;
            margin: 0 auto;
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-bottom: -30px;
            transform: translateY(8px);
        }

        .navbar-logo {
            height: 150px;
            width: auto;
            object-fit: contain;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 36px;
            list-style: none;
        }

        .nav-menu a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            transition: opacity 0.2s;
        }

        .nav-menu a:hover { opacity: 0.85; }

        .profile-icon {
            width: 43px;
            height: 43px;
            margin-right: 18%;
            align-self: center;
            flex: 0 0 43px;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .profile-icon svg {
            width: 28px;
            height: 28px;
            fill: #78B0ED;
        }

        /* MAIN CONTENT */
        .main-content { position: relative; width: 100%; }

        .hero-section {
            width: 60%;
            z-index: 2;
            position: relative;
        }

        .hero-title {
            font-size: 44px;
            font-weight: 700;
            line-height: 1.15;
            letter-spacing: -0.5px;
            margin-bottom: 14px;
        }

        .hero-title span {
            display: inline-block;
            background: linear-gradient(180deg, #629ce6 0%, #050F71 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-description {
            color: #050F71;
            font-size: 15px;
            font-weight: 500;
            line-height: 1.45;
            max-width: 480px;
            margin-bottom: 24px;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            height: 46px;
            padding: 0 36px;
            border-radius: 100px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: transform 0.1s ease;
        }

        .btn:active { transform: scale(0.98); }
        .btn-daftar { background: linear-gradient(90deg, #050f71 0%, #78B0ED 100%); color: #fff; }
        .btn-masuk { background-color: #78B0ED; color: #fff; }

        /* MASKOT */
        .mascot-container {
            position: absolute;
            right: 150px;
            top: 15px;
            width: 390px;
            z-index: 3;
            pointer-events: none;
        }

        .mascot-img {
            width: 100%;
            height: auto;
            object-fit: contain;
            display: block;
        }

        /* TESTIMONI */
        .testimony-container {
            position: relative;
            width: 82%;
            border-radius: 24px;
            overflow: hidden;
            margin-top: -5px;
            z-index: 1;
        }

        .testimony-bg {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 24px;
        }

        .testimony-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            padding: 12px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            transform: translateY(-4px);
        }

        .testimony-title {
            color: #fff;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .testimony-content-img {
            width: 64%;
            height: auto;
            object-fit: contain;
            align-self: flex-start;
            margin: -2px 0 0 0;
        }

        /* CHAT BUTTON & WINDOW */
        .chat-btn {
            position: absolute;
            right: 18%;
            bottom: -20px;
            width: 68px;
            height: auto;
            background: transparent;
            border: none;
            display: block;
            cursor: pointer;
            z-index: 1003;
            transition: transform .18s ease;
        }

        .chat-btn:hover { transform: scale(1.03); }
        .chat-btn img { width: 100%; height: auto; display: block; }

        .chat-window {
            position: absolute;
            right: 18%;
            bottom: 82px;
            width: 430px;
            height: 395px;
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            display: none;
            flex-direction: column;
            z-index: 1002;
        }

        .chat-window.open { display: flex; }

        .chat-header {
            height: 84px;
            flex: 0 0 84px;
            padding: 17px 30px;
            background: linear-gradient(135deg, #071477 0%, #78B0ED 100%);
            color: #fff;
        }

        .chat-header-title {
            font-size: 18px;
            line-height: 27px;
            font-weight: 700;
        }

        .status-toggle {
            appearance: none;
            border: 0;
            background: transparent;
            color: #fff;
            cursor: default;
            pointer-events: none;
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 15px;
            line-height: 18px;
            font-weight: 500;
            height: 18px;
        }

        .status-toggle:focus-visible {
            outline: 2px solid rgba(255,255,255,.75);
            outline-offset: 3px;
            border-radius: 5px;
        }

        .online-dot {
            flex: 0 0 9px;
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #6BE36B;
            display: inline-block;
        }

        .online-dot.offline { background: #D9D9D9; }

        .chat-messages {
            flex: 1;
            padding: 30px 30px 12px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .chat-message {
            max-width: 72%;
            padding: 10px 19px;
            font-size: 15px;
            line-height: 1.55;
            font-weight: 500;
            word-wrap: break-word;
            color: #fff;
        }

        .chat-message.admin {
            align-self: flex-start;
            background: #050F71;
            border-radius: 25px 25px 25px 0;
        }

        .chat-message.user {
            align-self: flex-end;
            background: #78B0ED;
            border-radius: 25px 25px 0 25px;
        }

        .chat-input-area {
            padding: 8px 24px 20px;
            background: #fff;
        }

        .chat-input-form {
            width: 100%;
            height: 50px;
            border-radius: 28px;
            background: linear-gradient(90deg, #050F71 0%, #78B0ED 100%);
            display: flex;
            align-items: center;
            padding: 0 10px 0 20px;
        }

        .chat-input {
            flex: 1;
            min-width: 0;
            border: 0;
            outline: 0;
            background: transparent;
            color: #fff;
            font-size: 15px;
            font-weight: 500;
        }

        .chat-input::placeholder { color: #fff; opacity: 1; }

        .chat-send {
            width: 42px;
            height: 42px;
            border: 0;
            border-radius: 50%;
            background: transparent;
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .chat-send:hover { background: rgba(255,255,255,.12); }
        .chat-send svg { width: 31px; height: 31px; display: block; }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .canvas-container {
                transform: scale(0.9);
                transform-origin: top center;
            }
        }

        @media (max-width: 868px) {
            .canvas-container {
                transform: scale(0.75);
                transform-origin: top center;
            }
        }

        @media (max-width: 900px) {
            .chat-window {
                right: 5%;
                width: min(545px, 90vw);
            }
        }
    

/* ===================== PILIH PAKET LES ===================== */

  /* -----------------------------------------------------------------
     STYLE KHUSUS SECTION: PILIH PAKET LES
     ----------------------------------------------------------------- */
  .package-section {
    width: 100%;
    margin-top: 40px;
    padding-bottom: 60px;
    position: relative;
    box-sizing: border-box;
  }

  /* Header Section */
  .package-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
  }

  /* Judul Gradasi (#050F71 -> #78B0ED) */
  .package-title {
    font-family: 'Poppins', sans-serif;
    font-size: 36px;
    font-weight: 800;
    background: linear-gradient(90deg, #050F71 0%, #78B0ED 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    line-height: 1.2;
    margin: 0;
  }

  /* Icon Filter Sliders */
  .filter-trigger-btn {
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.2s ease, opacity 0.2s ease;
  }

  .filter-trigger-btn:hover {
    opacity: 0.8;
    transform: scale(1.05);
  }

  .filter-trigger-btn svg {
    width: 28px;
    height: 28px;
    fill: #050F71;
  }

  /* Tab Container (Privat / Kelompok) */
  .tab-container {
    display: flex;
    gap: 12px;
    margin-bottom: 28px;
  }

  .tab-pill {
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    font-weight: 600;
    padding: 8px 32px;
    border-radius: 50px;
    border: none;
    cursor: pointer;
    color: #FFFFFF;
    transition: all 0.2s ease;
    box-shadow: none;
  }

  /* Tab Privat (Aktif: Gradasi) */
  .tab-pill.active {
    background: linear-gradient(90deg, #050F71 0%, #78B0ED 100%);
  }

  /* Tab Kelompok (Tidak Aktif: Solid) */
  .tab-pill.inactive {
    background-color: #78B0ED;
  }

  .tab-pill:hover {
    opacity: 0.95;
  }

  /* Grid Layout 4 Card */
  .cards-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    width: 100%;
  }

  /* Card Item */
  .pkg-card {
    background: #FFFFFF;
    border-radius: 24px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    box-shadow: 0 10px 25px rgba(5, 15, 113, 0.05);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    border: 1px solid rgba(120, 176, 237, 0.15);
  }

  .pkg-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 14px 30px rgba(5, 15, 113, 0.08);
  }

  /* Banner Top Image */
  .card-banner-wrapper {
    width: 100%;
    height: 125px;
    overflow: hidden;
    background-color: #F0F5FD;
  }

  .card-banner-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  /* Card Content Body */
  .card-body {
    padding: 18px;
    display: flex;
    flex-direction: column;
    flex: 1;
  }

  .card-header-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2px;
  }

  .card-title {
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    font-weight: 700;
    color: #000000;
    margin: 0;
  }

  /* Status Offline Badge */
  .badge-offline {
    font-family: 'Poppins', sans-serif;
    color: #FFFFFF;
    font-size: 11px;
    font-weight: 500;
    padding: 2px 12px;
    border-radius: 50px;
    display: inline-block;
  }

  /* Warna Badge Spesifik */
  .badge-tk { background-color: #216B2A; }
  .badge-sd { background-color: #B00000; }
  .badge-smp { background-color: #050F71; }
  .badge-sma { background-color: #78B0ED; }

  .card-subtitle {
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    color: #888888;
    margin-bottom: 16px;
    font-weight: 400;
  }

  /* Fasilitas List */
  .card-facilities {
    list-style: none;
    padding: 0;
    margin: 0 0 20px 0;
    flex: 1;
  }

  .card-facilities li {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    color: #555555;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 500;
  }

  /* Icon Check Gray Circular */
  .check-icon-circle {
    width: 18px;
    height: 18px;
    background-color: #7A7A7A;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
  }

  .check-icon-circle svg {
    width: 11px;
    height: 11px;
    fill: #FFFFFF;
  }

  /* Divider Line */
  .card-divider {
    height: 1px;
    background-color: #EAEAEA;
    margin-bottom: 14px;
    border: none;
  }

  .card-price {
    font-family: 'Poppins', sans-serif;
    font-size: 13.5px;
    font-weight: 600;
    color: #666666;
    margin-bottom: 14px;
  }

  /* Tombol Action Pilih Paket */
  .btn-pilih-paket {
    width: 100%;
    height: 40px;
    border-radius: 50px;
    border: none;
    color: #FFFFFF;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 14px;
    cursor: pointer;
    transition: opacity 0.2s ease, transform 0.1s ease;
  }

  .btn-pilih-paket:hover {
    opacity: 0.92;
  }

  .btn-pilih-paket:active {
    transform: scale(0.98);
  }

  /* Warna Tombol Spesifik */
  .btn-tk { background-color: #216B2A; }
  .btn-sd { background-color: #B00000; }
  .btn-smp { background-color: #050F71; }
  .btn-sma { background-color: #78B0ED; }

  /* -----------------------------------------------------------------
     STYLE MODAL: FILTER & DETAIL PAKET
     ----------------------------------------------------------------- */
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(5, 15, 113, 0.4);
    backdrop-filter: blur(3px);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    padding: 20px;
    box-sizing: border-box;
  }

  .modal-overlay.active {
    display: flex;
  }

  .modal-card {
    background: #FFFFFF;
    border-radius: 24px;
    padding: 28px;
    width: 100%;
    max-width: 440px;
    box-shadow: 0 20px 40px rgba(5, 15, 113, 0.15);
    position: relative;
    animation: modalFadeIn 0.25s ease-out;
  }

  @keyframes modalFadeIn {
    from { opacity: 0; transform: translateY(12px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  .modal-title {
    font-family: 'Poppins', sans-serif;
    font-size: 20px;
    font-weight: 700;
    color: #050F71;
    margin: 0;
  }

  .modal-close-btn {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: #050F71;
    font-weight: 700;
    line-height: 1;
  }

  .filter-group {
    margin-bottom: 16px;
  }

  .filter-group label {
    display: block;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #050F71;
    margin-bottom: 8px;
  }

  .filter-options {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
  }

  .filter-chip {
    padding: 6px 14px;
    border-radius: 50px;
    border: 1px solid #78B0ED;
    background: #FFFFFF;
    color: #050F71;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .filter-chip.selected {
    background: #050F71;
    color: #FFFFFF;
    border-color: #050F71;
  }

  .filter-range-input {
    width: 100%;
    accent-color: #050F71;
  }

  .modal-actions {
    display: flex;
    gap: 12px;
    margin-top: 24px;
  }

  .btn-modal {
    flex: 1;
    height: 42px;
    border-radius: 50px;
    border: none;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 14px;
    cursor: pointer;
  }

  .btn-modal-reset {
    background: #EAEAEA;
    color: #555555;
  }

  .btn-modal-apply {
    background: linear-gradient(90deg, #050F71 0%, #78B0ED 100%);
    color: #FFFFFF;
  }

  /* Detail Item List dalam Modal Detail */
  .detail-info-list {
    list-style: none;
    padding: 0;
    margin: 0 0 20px 0;
  }

  .detail-info-list li {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    color: #333333;
    padding: 8px 0;
    border-bottom: 1px dashed #EAEAEA;
    display: flex;
    justify-content: space-between;
  }

  .detail-info-list li span.label {
    color: #78B0ED;
    font-weight: 600;
  }

  .detail-info-list li span.value {
    color: #050F71;
    font-weight: 600;
    text-align: right;
  }

  /* -----------------------------------------------------------------
     MEDIA QUERIES (RESPONSIVE)
     ----------------------------------------------------------------- */
  @media (max-width: 992px) {
    .cards-grid {
      grid-template-columns: repeat(2, 1fr);
      gap: 16px;
    }
  }

  @media (max-width: 576px) {
    .cards-grid {
      grid-template-columns: 1fr;
      gap: 16px;
    }
    
    .package-title {
      font-size: 28px;
    }

    .tab-pill {
      padding: 8px 24px;
      font-size: 14px;
    }
  }


/* ===================== SCROLL / INTEGRATION ===================== */
html {
    scroll-behavior: smooth;
    overflow-y: auto;
}
body {
    overflow-x: hidden;
    overflow-y: auto;
    min-height: 100vh;
}
.canvas-container {
    height: auto;
    min-height: 100vh;
}
.package-section {
    margin-top: 42px !important;
    padding-bottom: 80px !important;
    width: 100% !important;
}
.package-section .cards-grid {
    width: 100%;
}


/* ===== FINAL SCROLL FIX ===== */
html, body {
    width: 100%;
    min-height: 100%;
    height: auto !important;
    overflow-x: hidden !important;
    overflow-y: auto !important;
}

body {
    display: block !important;
    align-items: initial !important;
    justify-content: initial !important;
}

.canvas-container {
    width: min(1100px, 100%);
    min-height: 0 !important;
    height: auto !important;
    margin: 0 auto !important;
    padding-bottom: 80px !important;
    overflow: visible !important;
}

.main-content {
    width: 100%;
    height: auto !important;
    min-height: 0 !important;
    overflow: visible !important;
}

.package-section {
    display: block !important;
    position: relative !important;
    width: 100% !important;
    height: auto !important;
    min-height: 0 !important;
    margin: 42px 0 0 !important;
    padding: 0 0 100px !important;
    clear: both !important;
    overflow: visible !important;
    z-index: 10 !important;
}

.package-section .package-header,
.package-section .tab-container,
.package-section .cards-grid {
    position: relative;
    z-index: 11;
}

.cards-grid {
    min-height: 200px;
}


/* ===== PACKAGE VISUAL CORRECTION ===== */
.package-section {
    width: min(1008px, calc(100% - 32px)) !important;
    margin-left: auto !important;
    margin-right: auto !important;
    margin-top: 34px !important;
    padding-bottom: 56px !important;
}

.package-header {
    margin-bottom: 12px !important;
}

.package-title {
    font-size: 36px !important;
    line-height: 1.12 !important;
}

.filter-trigger-btn {
    padding: 0 !important;
}

.filter-trigger-btn svg {
    width: 28px !important;
    height: 28px !important;
}

.tab-container {
    gap: 12px !important;
    margin-bottom: 20px !important;
}

.tab-pill {
    font-size: 15px !important;
    padding: 7px 28px !important;
    min-width: 132px;
    height: 44px;
}

.cards-grid {
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    gap: 20px !important;
    align-items: stretch !important;
}

.pkg-card {
    height: 360px !important;
    min-height: 360px !important;
    border-radius: 24px !important;
    box-shadow: none !important;
    border: 1px solid #d8e2ee !important;
}

.card-banner-wrapper {
    height: 123px !important;
    min-height: 123px !important;
}

.card-body {
    padding: 14px 16px 16px !important;
    min-height: 0 !important;
    flex: 1 1 auto !important;
}

.card-title {
    font-size: 18px !important;
    line-height: 1.15 !important;
}

.card-subtitle {
    font-size: 12px !important;
    margin-bottom: 13px !important;
    line-height: 1.15 !important;
}

.card-facilities {
    margin-bottom: 10px !important;
    flex: 0 0 auto !important;
}

.card-facilities li {
    font-size: 13px !important;
    margin-bottom: 8px !important;
    gap: 8px !important;
}

.check-icon-circle {
    width: 18px !important;
    height: 18px !important;
}

.card-divider {
    margin-top: auto !important;
    margin-bottom: 10px !important;
}

.card-price {
    font-size: 13px !important;
    margin-bottom: 10px !important;
}

.btn-pilih-paket {
    height: 38px !important;
    min-height: 38px !important;
    font-size: 14px !important;
}

/* Keep four cards in the reference layout on desktop. */
@media (max-width: 1100px) and (min-width: 769px) {
    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
        gap: 14px !important;
    }
    .pkg-card {
        height: 340px !important;
        min-height: 340px !important;
    }
    .card-banner-wrapper {
        height: 110px !important;
        min-height: 110px !important;
    }
}

/* On genuinely narrow phones, switch cleanly instead of scaling the whole page. */
@media (max-width: 768px) {
    .package-section {
        width: calc(100% - 28px) !important;
    }
    .cards-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
        gap: 12px !important;
    }
    .pkg-card {
        height: 330px !important;
        min-height: 330px !important;
    }
    .card-banner-wrapper {
        height: 105px !important;
        min-height: 105px !important;
    }
}

@media (max-width: 520px) {
    .cards-grid {
        grid-template-columns: 1fr !important;
    }
}


/* =========================================================
   PAKET LES — FINAL VISUAL MATCH
   ========================================================= */
.package-section {
    width: 82% !important;
    margin: 24px 0 55px 0 !important;
    padding: 0 !important;
    background: transparent !important;
    position: relative !important;
    box-sizing: border-box !important;
}

.package-header {
    width: 100% !important;
    margin: 0 0 8px 0 !important;
    min-height: 32px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
}

.package-title {
    margin: 0 !important;
    font-size: 30px !important;
    line-height: 1.05 !important;
    font-weight: 700 !important;
}

.filter-trigger-btn {
    width: 24px !important;
    height: 24px !important;
    padding: 0 !important;
    margin: 0 !important;
}

.filter-trigger-btn svg {
    width: 20px !important;
    height: 20px !important;
}

.tab-container {
    margin: 0 0 14px 0 !important;
    gap: 8px !important;
}

.tab-pill {
    height: 32px !important;
    min-height: 32px !important;
    min-width: 88px !important;
    padding: 0 18px !important;
    border-radius: 18px !important;
    font-size: 11px !important;
    font-weight: 500 !important;
}

.cards-grid {
    width: 100% !important;
    display: grid !important;
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    gap: 12px !important;
    align-items: stretch !important;
}

.pkg-card {
    width: 100% !important;
    height: 360px !important;
    min-height: 360px !important;
    border-radius: 20px !important;
    overflow: hidden !important;
    border: 1px solid #d8e2ee !important;
    box-shadow: 0 1px 3px rgba(5,15,113,.08) !important;
    transform: none !important;
}

.pkg-card:hover {
    transform: none !important;
    box-shadow: 0 1px 3px rgba(5,15,113,.08) !important;
}

.card-banner-wrapper {
    width: 100% !important;
    height: 123px !important;
    min-height: 123px !important;
}

.card-banner-img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
}

.card-body {
    padding: 12px 14px 14px !important;
    height: 237px !important;
    min-height: 237px !important;
    display: flex !important;
    flex-direction: column !important;
    box-sizing: border-box !important;
}

.card-header-row {
    margin-bottom: 2px !important;
}

.card-title {
    font-size: 17px !important;
    line-height: 1.1 !important;
    font-weight: 700 !important;
}

.badge-offline {
    font-size: 9px !important;
    padding: 3px 8px !important;
    line-height: 1 !important;
}

.card-subtitle {
    font-size: 10px !important;
    line-height: 1.2 !important;
    margin-bottom: 12px !important;
}

.card-facilities {
    margin: 0 0 0 0 !important;
    flex: 1 1 auto !important;
}

.card-facilities li {
    font-size: 10.5px !important;
    line-height: 1.2 !important;
    margin-bottom: 7px !important;
    gap: 7px !important;
}

.check-icon-circle {
    width: 15px !important;
    height: 15px !important;
}

.check-icon-circle svg {
    width: 9px !important;
    height: 9px !important;
}

.card-divider {
    margin: 8px 0 8px 0 !important;
}

.card-price {
    font-size: 10.5px !important;
    line-height: 1.2 !important;
    margin-bottom: 9px !important;
}

.btn-pilih-paket {
    width: 100% !important;
    height: 36px !important;
    min-height: 36px !important;
    border-radius: 18px !important;
    font-size: 12px !important;
    font-weight: 600 !important;
}

/* Keep the 4-column reference layout on the desktop/tablet viewport used
   in the supplied screenshot. */
@media (max-width: 992px) and (min-width: 577px) {
    .package-section {
        width: 82% !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
    }

    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
        gap: 9px !important;
    }

    .pkg-card {
        height: 300px !important;
        min-height: 300px !important;
    }

    .card-banner-wrapper {
        height: 100px !important;
        min-height: 100px !important;
    }

    .card-body {
        height: 200px !important;
        min-height: 200px !important;
        padding: 9px 10px 10px !important;
    }

    .card-title { font-size: 13px !important; }
    .card-subtitle, .card-facilities li, .card-price { font-size: 8px !important; }
    .badge-offline { font-size: 7px !important; }
    .btn-pilih-paket { height: 28px !important; min-height: 28px !important; font-size: 9px !important; }
}

@media (max-width: 576px) {
    .package-section {
        width: 82% !important;
    }

    .cards-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
        gap: 10px !important;
    }

    .package-title {
        font-size: 24px !important;
    }
}


/* FINAL: sedikit lebih pendek, tetap proporsional */
.pkg-card{height:370px!important;min-height:370px!important;}
.card-banner-wrapper{height:127px!important;min-height:127px!important;flex:0 0 127px!important;}
.card-body{height:243px!important;min-height:243px!important;padding:13px 15px 13px!important;}
.btn-pilih-paket{height:37px!important;min-height:37px!important;flex:0 0 37px!important;}

/* =========================================================
   FINAL PACKAGE MATCH — FOLLOWING REFERENCE IMAGE 2
   ========================================================= */

/* Filter intentionally removed for this version */
.filter-trigger-btn {
    display: none !important;
}

/* Section width and position stay centered and compact */
.package-section {
    width: 82% !important;
    margin: 24px auto 42px !important;
    padding: 0 !important;
}

/* Title gradient: LIGHT AT TOP -> DARK AT BOTTOM */
.package-title {
    font-size: 36px !important;
    font-weight: 700 !important;
    line-height: 1.1 !important;
    background: linear-gradient(
        180deg,
        #78B0ED 0%,
        #050F71 100%
    ) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    background-clip: text !important;
}

/* Tabs: larger like the reference */
.tab-container {
    gap: 10px !important;
    margin: 0 0 16px !important;
}

.tab-pill {
    height: 39px !important;
    min-height: 39px !important;
    min-width: 108px !important;
    padding: 0 24px !important;
    border-radius: 22px !important;
    font-size: 15px !important;
    font-weight: 500 !important;
}

/* Cards: shorter, but not cramped */
.cards-grid {
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    gap: 14px !important;
    align-items: stretch !important;
}

.pkg-card {
    height: 315px !important;
    min-height: 315px !important;
    border-radius: 20px !important;
    overflow: hidden !important;
    box-shadow: 0 1px 3px rgba(5,15,113,.07) !important;
}

.card-banner-wrapper {
    height: 106px !important;
    min-height: 106px !important;
    flex: 0 0 106px !important;
}

.card-body {
    height: 209px !important;
    min-height: 209px !important;
    padding: 11px 13px 12px !important;
    box-sizing: border-box !important;
}

.card-title {
    font-size: 16px !important;
    line-height: 1.1 !important;
    font-weight: 700 !important;
}

.badge-offline {
    font-size: 8px !important;
    padding: 3px 7px !important;
}

.card-subtitle {
    font-size: 9px !important;
    line-height: 1.15 !important;
    margin-bottom: 10px !important;
}

.card-facilities {
    flex: 1 1 auto !important;
}

.card-facilities li {
    font-size: 9.5px !important;
    line-height: 1.15 !important;
    margin-bottom: 6px !important;
    gap: 7px !important;
}

.check-icon-circle {
    width: 14px !important;
    height: 14px !important;
}

.check-icon-circle svg {
    width: 8px !important;
    height: 8px !important;
}

.card-divider {
    margin: 7px 0 7px !important;
}

.card-price {
    font-size: 10.5px !important;
    margin-bottom: 7px !important;
}

.btn-pilih-paket {
    height: 33px !important;
    min-height: 33px !important;
    flex: 0 0 33px !important;
    border-radius: 18px !important;
    font-size: 11.5px !important;
}

/* Keep the same compact proportion on the viewport used by the reference. */
@media (max-width: 992px) and (min-width: 577px) {
    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
        gap: 10px !important;
    }

    .pkg-card {
        height: 300px !important;
        min-height: 300px !important;
    }

    .card-banner-wrapper {
        height: 101px !important;
        min-height: 101px !important;
    }

    .card-body {
        height: 199px !important;
        min-height: 199px !important;
        padding: 10px 11px !important;
    }

    .card-title { font-size: 14px !important; }
    .card-subtitle,
    .card-facilities li,
    .card-price { font-size: 8px !important; }
    .badge-offline { font-size: 6.5px !important; }
    .btn-pilih-paket {
        height: 29px !important;
        min-height: 29px !important;
        flex-basis: 29px !important;
        font-size: 8px !important;
    }
}


/* ===== FINAL ALIGNMENT: PACKAGE EXACTLY UNDER TESTIMONY ===== */
.package-section {
    width: 82% !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
    margin-top: 24px !important;
    padding: 0 !important;
    box-sizing: border-box !important;
}

.package-header,
.tab-container,
.cards-grid {
    width: 100% !important;
}

/* Keep same left edge as testimony */
.package-header,
.tab-container,
.cards-grid {
    margin-left: 0 !important;
}

/* Preserve four equal cards and their proportions */
.cards-grid {
    display: grid !important;
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    gap: 14px !important;
}

/* Keep the package section visually compact like reference 2 */
.pkg-card {
    height: 315px !important;
    min-height: 315px !important;
}

.card-banner-wrapper {
    height: 106px !important;
    min-height: 106px !important;
}

.card-body {
    height: 209px !important;
    min-height: 209px !important;
}

/* Tablet rule should also stay left-aligned with testimony */
@media (max-width: 992px) and (min-width: 577px) {
    .package-section {
        width: 82% !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
    }

    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
        gap: 10px !important;
    }
}


/* =========================================================
   KELOMPOK — MATCH REFERENCE IMAGE
   ========================================================= */

/* Filter remains hidden. */
.filter-trigger-btn { display: none !important; }

/* Keep 4 equal cards in one row and same left edge as testimony. */
.package-section {
    width: 82% !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
}

.cards-grid {
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    gap: 14px !important;
}

/* Group reference proportions */
.pkg-card {
    height: 315px !important;
    min-height: 315px !important;
    border-radius: 20px !important;
}

.card-banner-wrapper {
    height: 106px !important;
    min-height: 106px !important;
    flex: 0 0 106px !important;
}

.card-body {
    height: 209px !important;
    min-height: 209px !important;
    padding: 13px 14px 12px !important;
}

/* Header */
.package-title {
    font-size: 36px !important;
    line-height: 1.1 !important;
    background: linear-gradient(180deg, #78B0ED 0%, #050F71 100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    background-clip: text !important;
}

.tab-container {
    gap: 10px !important;
    margin-bottom: 14px !important;
}

.tab-pill {
    height: 39px !important;
    min-height: 39px !important;
    min-width: 108px !important;
    padding: 0 24px !important;
    font-size: 15px !important;
    font-weight: 500 !important;
    border-radius: 22px !important;
}

/* Card text */
.card-title {
    font-size: 17px !important;
    line-height: 1.1 !important;
    font-weight: 700 !important;
}

.badge-offline {
    font-size: 8px !important;
    padding: 3px 8px !important;
}

.card-subtitle {
    font-size: 10px !important;
    margin-bottom: 13px !important;
}

.card-facilities {
    flex: 1 1 auto !important;
    margin-bottom: 0 !important;
}

.card-facilities li {
    font-size: 10.5px !important;
    margin-bottom: 7px !important;
    gap: 7px !important;
}

.check-icon-circle {
    width: 15px !important;
    height: 15px !important;
}

.check-icon-circle svg {
    width: 9px !important;
    height: 9px !important;
}

.card-divider {
    margin: 7px 0 !important;
}

.card-price {
    font-size: 12px !important;
    margin-bottom: 8px !important;
}

.btn-pilih-paket {
    height: 36px !important;
    min-height: 36px !important;
    flex: 0 0 36px !important;
    border-radius: 18px !important;
    font-size: 12px !important;
}


/* ===== FINAL KELOMPOK VISUAL MATCH ===== */
.package-title {
    font-size: 36px !important;
    font-weight: 700 !important;
    line-height: 1.1 !important;
    background: linear-gradient(180deg, #78B0ED 0%, #050F71 100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    background-clip: text !important;
}

/* Same tab typography and size */
.tab-pill {
    min-width: 108px !important;
    height: 39px !important;
    min-height: 39px !important;
    padding: 0 24px !important;
    font-size: 15px !important;
    line-height: 1 !important;
    font-weight: 500 !important;
}

/* Four equal cards; keep titles on one line */
.cards-grid {
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    gap: 14px !important;
    align-items: stretch !important;
}

.pkg-card {
    height: 315px !important;
    min-height: 315px !important;
    border-radius: 20px !important;
}

.card-banner-wrapper {
    height: 106px !important;
    min-height: 106px !important;
    flex-basis: 106px !important;
}

.card-body {
    height: 209px !important;
    min-height: 209px !important;
    padding: 12px 14px 12px !important;
}

.card-header-row {
    width: 100% !important;
    min-height: 22px !important;
    align-items: center !important;
}

.card-title {
    font-size: 16px !important;
    line-height: 1 !important;
    font-weight: 700 !important;
    white-space: nowrap !important;
    overflow: visible !important;
}

.badge-offline {
    font-size: 8px !important;
    font-weight: 500 !important;
    padding: 3px 8px !important;
    line-height: 1 !important;
    flex: 0 0 auto !important;
}

.card-subtitle {
    font-size: 10px !important;
    line-height: 1.15 !important;
    margin-bottom: 11px !important;
    white-space: nowrap !important;
}

.card-facilities {
    flex: 1 1 auto !important;
}

.card-facilities li {
    font-size: 10px !important;
    line-height: 1.15 !important;
    font-weight: 500 !important;
    margin-bottom: 7px !important;
    gap: 7px !important;
}

.card-price {
    font-size: 12px !important;
    line-height: 1 !important;
    font-weight: 500 !important;
    margin-bottom: 8px !important;
    white-space: nowrap !important;
}

.btn-pilih-paket {
    height: 36px !important;
    min-height: 36px !important;
    flex-basis: 36px !important;
    border-radius: 18px !important;
    font-size: 12px !important;
    font-weight: 600 !important;
}

/* Never wrap SMA/K title; keep every title same baseline */
.pkg-card:nth-child(4) .card-title {
    font-size: 16px !important;
    white-space: nowrap !important;
}


/* ===== FINAL GROUP CARD ALIGNMENT ===== */

/* Divider line: visible and consistent */
.card-divider {
    display: block !important;
    width: 100% !important;
    height: 1px !important;
    border: 0 !important;
    background: #D7D7D7 !important;
    opacity: 1 !important;
    margin: 9px 0 9px !important;
    flex: 0 0 1px !important;
}

/* Keep all card bodies as a flex column so lower elements align */
.card-body {
    display: flex !important;
    flex-direction: column !important;
    align-items: stretch !important;
}

/* Facilities sit in the same vertical start line in all cards */
.card-facilities {
    margin: 0 !important;
    padding: 0 !important;
    flex: 1 1 auto !important;
}

.card-facilities li {
    display: flex !important;
    align-items: center !important;
    min-height: 18px !important;
    margin-bottom: 7px !important;
}

/* Fix top alignment: TK and SMA/K have the same facility block start */
.card-subtitle {
    margin-bottom: 13px !important;
}

.card-facilities .check-icon-circle {
    flex: 0 0 15px !important;
    width: 15px !important;
    height: 15px !important;
}

/* Keep price + button at the same baseline across all four cards */
.card-price {
    margin-top: auto !important;
    margin-bottom: 8px !important;
}

.btn-pilih-paket {
    margin-top: 0 !important;
}

/* Prevent SMA/K subtitle and title from shifting the facility block */
.card-title,
.card-subtitle {
    white-space: nowrap !important;
    overflow: visible !important;
}

.card-title {
    line-height: 1 !important;
}

/* Keep equal visual baseline for all four cards */
.pkg-card {
    display: flex !important;
    flex-direction: column !important;
}


/* =========================================================
   KELOMPOK — FINAL MATCH TO REFERENCE IMAGE 2
   ========================================================= */

/* Content block: narrower and aligned like the reference. */
.package-section {
    width: 78% !important;
    margin-left: 0 !important;
    margin-right: auto !important;
    margin-top: 18px !important;
    padding-bottom: 36px !important;
}

/* Title */
.package-title {
    font-size: 36px !important;
    line-height: 1.05 !important;
    font-weight: 700 !important;
    margin: 0 0 8px 0 !important;
    background: linear-gradient(180deg, #78B0ED 0%, #050F71 100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    background-clip: text !important;
}

/* Target reference shows the filter mark at the upper-right.
   Keep it visual-only; no filter interaction. */
.filter-trigger-btn {
    display: flex !important;
    width: 25px !important;
    height: 25px !important;
    padding: 0 !important;
    cursor: default !important;
}
.filter-trigger-btn svg {
    width: 23px !important;
    height: 23px !important;
}

/* Tabs */
.tab-container {
    gap: 10px !important;
    margin-bottom: 15px !important;
}
.tab-pill {
    height: 37px !important;
    min-height: 37px !important;
    min-width: 104px !important;
    padding: 0 22px !important;
    border-radius: 20px !important;
    font-size: 15px !important;
    font-weight: 500 !important;
}

/* Four equal cards, tighter than current version. */
.cards-grid {
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    gap: 14px !important;
    align-items: stretch !important;
}

.pkg-card {
    height: 272px !important;
    min-height: 272px !important;
    border-radius: 18px !important;
    overflow: hidden !important;
    display: flex !important;
    flex-direction: column !important;
    box-shadow: 0 1px 3px rgba(5,15,113,.07) !important;
}

.card-banner-wrapper {
    height: 92px !important;
    min-height: 92px !important;
    flex: 0 0 92px !important;
}

.card-body {
    height: 180px !important;
    min-height: 180px !important;
    padding: 10px 12px 10px !important;
    box-sizing: border-box !important;
    display: flex !important;
    flex-direction: column !important;
}

/* Consistent title + badge baseline */
.card-header-row {
    min-height: 20px !important;
    margin-bottom: 1px !important;
    align-items: center !important;
}
.card-title {
    font-size: 16px !important;
    line-height: 1 !important;
    font-weight: 700 !important;
    white-space: nowrap !important;
}
.badge-offline {
    font-size: 7px !important;
    padding: 3px 7px !important;
    line-height: 1 !important;
    white-space: nowrap !important;
}

/* Subtitle and check-list aligned at identical vertical starts. */
.card-subtitle {
    font-size: 9px !important;
    line-height: 1.1 !important;
    margin: 0 0 8px !important;
    white-space: nowrap !important;
}
.card-facilities {
    margin: 0 !important;
    padding: 0 !important;
    flex: 1 1 auto !important;
}
.card-facilities li {
    font-size: 9px !important;
    line-height: 1.1 !important;
    font-weight: 500 !important;
    margin-bottom: 5px !important;
    gap: 6px !important;
    min-height: 15px !important;
    align-items: center !important;
}
.check-icon-circle {
    width: 13px !important;
    height: 13px !important;
    min-width: 13px !important;
}
.check-icon-circle svg {
    width: 8px !important;
    height: 8px !important;
}

/* Divider: visible and consistently positioned. */
.card-divider {
    width: 100% !important;
    height: 1px !important;
    margin: 6px 0 6px !important;
    background: #D6D6D6 !important;
    opacity: 1 !important;
    flex: 0 0 1px !important;
}

/* Price/button baseline */
.card-price {
    font-size: 10px !important;
    line-height: 1 !important;
    margin: 0 0 6px !important;
    white-space: nowrap !important;
}
.btn-pilih-paket {
    height: 31px !important;
    min-height: 31px !important;
    flex: 0 0 31px !important;
    border-radius: 17px !important;
    font-size: 10.5px !important;
    font-weight: 600 !important;
    margin: 0 !important;
}

/* Do not wrap SMA/K or alter its bold size. */
.pkg-card:nth-child(4) .card-title {
    font-size: 16px !important;
    white-space: nowrap !important;
}

/* Reference viewport: preserve four columns. */
@media (max-width: 992px) and (min-width: 577px) {
    .package-section {
        width: 78% !important;
    }
    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
        gap: 10px !important;
    }
    .pkg-card {
        height: 255px !important;
        min-height: 255px !important;
    }
    .card-banner-wrapper {
        height: 86px !important;
        min-height: 86px !important;
    }
    .card-body {
        height: 169px !important;
        min-height: 169px !important;
        padding: 9px 10px !important;
    }
    .card-title { font-size: 13px !important; }
    .card-subtitle, .card-facilities li { font-size: 7.5px !important; }
    .card-price { font-size: 8.5px !important; }
    .btn-pilih-paket {
        height: 28px !important;
        min-height: 28px !important;
        flex-basis: 28px !important;
        font-size: 8px !important;
    }
}


/* ===== FINAL OFFLINE BADGE SYMMETRY ===== */
.card-header-row {
    width: 100% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    gap: 8px !important;
}

.card-title {
    flex: 1 1 auto !important;
    min-width: 0 !important;
    white-space: nowrap !important;
    overflow: visible !important;
    line-height: 1 !important;
}

.badge-offline {
    flex: 0 0 auto !important;
    width: 51px !important;
    height: 20px !important;
    min-width: 51px !important;
    padding: 0 !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    border-radius: 12px !important;
    font-size: 7px !important;
    line-height: 1 !important;
    white-space: nowrap !important;
    box-sizing: border-box !important;
}

/* SMA/K badge stays exactly on the same right-side baseline as the others. */
.pkg-card:nth-child(4) .badge-offline {
    width: 51px !important;
    min-width: 51px !important;
}

/* Slightly tighter title only when needed so the badge never overlaps. */
.pkg-card:nth-child(4) .card-title {
    font-size: 16px !important;
    flex: 1 1 auto !important;
    min-width: 0 !important;
}


/* FINAL MASTER REFERENCE LOCK
   No filter. Do not alter package card/white-base dimensions. */
.filter-trigger-btn { display: none !important; }

.pkg-card,
.card-banner-wrapper,
.card-body {
    box-sizing: border-box !important;
}

/* Keep SMA/K on one line without changing card size. */
.pkg-card:nth-child(4) .card-title {
    white-space: nowrap !important;
    overflow: visible !important;
}


/* Daftar + Masuk match Privat/Kelompok tab weight */
.btn-daftar,
.btn-masuk {
    font-weight: 500 !important;
}


/* Package buttons intentionally have no selection action yet. */
.btn-pilih-paket { cursor: default !important; }


/* ===== FINAL ALIGNMENT ONLY: PACKAGE = TESTIMONY WIDTH ===== */
.package-section {
    width: 82% !important;
    max-width: none !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
    box-sizing: border-box !important;
}

/* Keep the package contents aligned to the exact same left/right edges. */
.package-section .package-header,
.package-section .tab-container,
.package-section .cards-grid {
    width: 100% !important;
    box-sizing: border-box !important;
}

/* Do NOT alter card height/shape/white base dimensions. */
.package-section .pkg-card,
.package-section .card-banner-wrapper,
.package-section .card-body {
    box-sizing: border-box !important;
}


/* ===== TYPOGRAPHY ONLY: PACKAGE TITLES ===== */
.package-section .card-title {
    font-size: 17px !important;
}

.package-section .pkg-card:nth-child(4) .card-title {
    font-size: 14px !important;
}


/* ===== FINAL TITLE SIZE FIX ONLY ===== */
.package-section .pkg-card .card-header-row{
    display:flex !important;
    align-items:center !important;
    justify-content:space-between !important;
    gap:4px !important;
    width:100% !important;
    overflow:visible !important;
}

.package-section .pkg-card .card-title{
    flex:1 1 auto !important;
    min-width:0 !important;
    white-space:nowrap !important;
    overflow:visible !important;
    line-height:1 !important;
    font-size:13px !important;
    letter-spacing:-0.15px !important;
}

.package-section .pkg-card:nth-child(4) .card-title{
    font-size:11px !important;
    letter-spacing:-0.2px !important;
}

.package-section .pkg-card .badge-offline{
    flex:0 0 40px !important;
    width:40px !important;
    min-width:40px !important;
    height:17px !important;
    padding:0 !important;
    display:inline-flex !important;
    align-items:center !important;
    justify-content:center !important;
    font-size:7px !important;
    line-height:1 !important;
}


/* ===== FINAL: FONT DIPERBESAR SEDIKIT, TETAP TIDAK TUMPANG TINDIH ===== */
.package-section .pkg-card .card-title{
    font-size: 16px !important;
    line-height: 1 !important;
    white-space: nowrap !important;
    overflow: visible !important;
    letter-spacing: -0.1px !important;
}

.package-section .pkg-card:nth-child(4) .card-title{
    font-size: 14px !important;
    letter-spacing: -0.15px !important;
}

.package-section .pkg-card .badge-offline{
    flex: 0 0 42px !important;
    width: 42px !important;
    min-width: 42px !important;
    height: 18px !important;
    font-size: 7px !important;
}


/* ===== ONLY: CENTER THE FACILITY/DESCRIPTION BLOCK ===== */
.package-section .card-facilities {
    display: flex !important;
    flex-direction: column !important;
    justify-content: center !important;
    flex: 1 1 auto !important;
    margin-top: 0 !important;
    margin-bottom: 0 !important;
}

/* Keep each facility row's own alignment unchanged. */
.package-section .card-facilities li {
    flex: 0 0 auto !important;
}


/* ===== FINAL MICRO-ADJUSTMENT ===== */

/* Sedikit tambahan space sebelum harga, tanpa mengubah tinggi/base card */
.package-section .card-divider {
    margin-bottom: 10px !important;
}

.package-section .card-price {
    margin-top: 1px !important;
    margin-bottom: 11px !important;
}

/* Offline sedikit lebih besar, ukuran badge/base tetap */
.package-section .badge-offline {
    font-size: 8px !important;
    font-weight: 500 !important;
}




/* =========================================================
   FINAL REQUEST — OFFLINE 22px + SHORTER PACKAGE IMAGE/CARD
   ========================================================= */

/* OFFLINE text exactly 22px */
.package-section .badge-offline {
    width: 86px !important;
    min-width: 86px !important;
    height: 30px !important;
    padding: 0 !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-sizing: border-box !important;
    border-radius: 16px !important;
    font-size: 22px !important;
    font-weight: 500 !important;
    line-height: 1 !important;
    white-space: nowrap !important;
}

/* Pendekkan seluruh card paket */
.package-section .pkg-card {
    height: 310px !important;
    min-height: 310px !important;
}

/* Gambar/banner paket ikut dipendekkan */
.package-section .card-banner-wrapper {
    height: 108px !important;
    min-height: 108px !important;
    flex: 0 0 108px !important;
}

/* White base ikut dipendekkan, tetapi tombol tetap terlihat */
.package-section .card-body {
    height: 202px !important;
    min-height: 202px !important;
    padding: 10px 12px 9px !important;
}

/* Tetap jaga tombol sejajar dan utuh */
.package-section .btn-pilih-paket {
    height: 34px !important;
    min-height: 34px !important;
    flex: 0 0 34px !important;
}

/* Subtitle & harga tetap mengikuti ukuran yang sudah disetujui */
.package-section .card-subtitle,
.package-section .card-price {
    font-size: 11px !important;
    font-weight: 400 !important;
    line-height: 1.15 !important;
}

</style>

<style>
/* FINAL REQUEST: facility description font */
.package-section .card-facilities li {
    font-size: 11px !important;
    font-weight: 400 !important;
    line-height: 1.15 !important;
}
.package-section .card-price {
    font-size: 11px !important;
}
</style>





















<style id="FINAL-MICRO-FIX">
.package-section .pkg-card .card-header-row .badge-offline{
    width: 58px !important;
    min-width: 58px !important;
    height: 21px !important;
    padding: 0 6px !important;
    font-size: 11px !important;
    font-weight: 400 !important;
    line-height: 1 !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    border-radius: 12px !important;
    box-sizing: border-box !important;
}
</style>

<style id="FINAL-MICRO-ADJUST">
/* ===== MICRO ADJUSTMENT ONLY ===== */

/* Offline: badge dibuat sedikit lebih kurus, teks tetap 11px */
.package-section .pkg-card .badge-offline {
    height: 21px !important;
    min-height: 21px !important;
    width: 60px !important;
    min-width: 60px !important;
    padding: 0 6px !important;
    font-size: 11px !important;
    font-weight: 400 !important;
    line-height: 1 !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
}

/* Pilih Paket: naik sedikit dan tetap cukup besar */
.package-section .pkg-card .btn-pilih-paket {
    transform: translateY(-2px) !important;
    font-size: 14px !important;
    font-weight: 600 !important;
    line-height: 1 !important;
}
</style>






































<style id="FINAL-OFFLINE-ONLY">
/* ===== ONLY OFFLINE: BESARKAN SEDIKIT, JANGAN LEBARKAN ===== */
.package-section .pkg-card .card-header-row .badge-offline {
    width: 30px !important;
    min-width: 30px !important;
    height: 16px !important;
    min-height: 16px !important;
    padding: 0 1px !important;
    margin: 0 !important;
    border-radius: 999px !important;
    font-size: 10px !important;
    font-weight: 400 !important;
    line-height: 1 !important;
    box-sizing: border-box !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    white-space: nowrap !important;
    overflow: hidden !important;
}
</style>








<style id="FINAL-LAST-PACKAGE-CORNER">
/* ===== LAST REVISION ONLY ===== */

/* Corner card putih + gambar dinaikkan sedikit */
.package-section .pkg-card {
    border-radius: 24px !important;
    overflow: hidden !important;
}

.package-section .card-banner-wrapper {
    border-radius: 24px 24px 0 0 !important;
    overflow: hidden !important;
}

.package-section .card-body {
    border-radius: 0 0 24px 24px !important;
    overflow: hidden !important;
}

/* Garis tetap sedikit lebih pendek, warna tengah jauh lebih tua */
.package-section .pkg-card .card-divider {
    width: 94% !important;
    margin-left: auto !important;
    margin-right: auto !important;
    height: 1.2px !important;
    border: 0 !important;
    background: linear-gradient(
        90deg,
        #B7B7B7 0%,
        #5C5C5C 50%,
        #B7B7B7 100%
    ) !important;
    opacity: 1 !important;
}
</style>





<style id="LULUSAN-SECTION-STYLE">
.lulusan-section{
    width:82% !important;
    margin:14px 0 0 0 !important;
    padding:0 !important;
    position:relative !important;
    box-sizing:border-box !important;
}
.lulusan-image{
    display:block !important;
    width:100% !important;
    height:auto !important;
    margin:0 !important;
    padding:0 !important;
    border:0 !important;
    object-fit:contain !important;
}
</style>





<style id="FINAL-TITLE-ONLY">
/* ===== ONLY REQUESTED TITLE REVISION ===== */
.package-section .pkg-card .card-title.title-privat-sma {
    font-size: 16px !important;
}

.package-section .pkg-card .card-title.title-kelompok-sma {
    font-size: 15px !important;
}
</style>


<style id="LULUSAN-SOURCE-FIX">
.lulusan-image{
    image-rendering:auto !important;
    -ms-interpolation-mode:bicubic !important;
}
</style>


<style id="AUTH-STATE-ONLY">
/* AUTHENTICATED STATE ONLY: does not change the guest design. */
.profile-user {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
    color: #FFFFFF;
    font-size: 18px;
    font-weight: 500;
    line-height: 1;
    white-space: nowrap;
    margin-right: 0;
}

.profile-user .profile-icon {
    margin-right: 0 !important;
}

.profile-name {
    color: #FFFFFF;
    white-space: nowrap;
}

.mascot-container.mascot-auth {
    top: -55px !important;
}
</style>
</head>
<body>

    <div class="canvas-container">

        <!-- NAVBAR -->
        <header class="navbar">
            <img src="{{ asset('images/Logo Oson Itensif.png') }}" alt="Logo Oson Itensif" class="navbar-logo">
            
            <nav>
                <ul class="nav-menu">
                    <li><a href="{{ route('informasi') }}">Informasi</a></li>
                    <li><a href="{{ route('fasilitas') }}">Fasilitas</a></li>
                    <li><a href="{{ route('galeri.belajar') }}">Galeri Belajar</a></li>
                    <li><a href="https://www.instagram.com/osonintensif/" target="_blank" rel="noopener noreferrer">Instagram</a></li>
                </ul>
            </nav>

            @guest
            <a href="{{ route('login') }}" class="profile-user profile-guest-link" title="Masuk" style="text-decoration:none;">
                <div class="profile-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
            </a>
            @else
            <a href="{{ route('account') }}" class="profile-user profile-auth-link" title="Akun" style="text-decoration:none;">
                <div class="profile-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <span class="profile-name">{{ Auth::user()->name }}</span>
            </a>
            @endguest
        </header>

        <!-- MAIN CONTENT AREA -->
        <main class="main-content">

            <section class="hero-section">
                <h1 class="hero-title">
                    <span>Selamat datang</span><br>
                    <span>di Oson Intensif</span>
                </h1>
                
                <p class="hero-description">
                    Kami percaya bahwa nilai yang baik berawal dari<br>
                    pemahaman konsep dan latihan yang konsisten
                </p>

                @guest
                <div class="hero-buttons">
                    <a href="{{ route('register') }}" class="btn btn-daftar">Daftar</a>
                    <a href="{{ route('login') }}" class="btn btn-masuk">Masuk</a>
                </div>
                @endguest
            </section>

            <div class="mascot-container{{ Auth::check() ? ' mascot-auth' : '' }}">
                <img src="{{ asset('images/Maskot Home Page.png') }}" alt="Maskot Home Page" class="mascot-img">
            </div>

            <section class="testimony-container">
                <img src="{{ asset('images/Base Testimony.png') }}" alt="Base Testimony" class="testimony-bg" onerror="this.onerror=null; this.src='{{ asset('images/Base Testimony.jpg') }}';">
                
                <div class="testimony-overlay">
                    <h2 class="testimony-title">Testimoni Pelanggan</h2>
                    <img src="{{ asset('images/Testimony new.png') }}" alt="Testimony" class="testimony-content-img" onerror="this.onerror=null; this.src='{{ asset('images/Testimony new.jpg') }}';">
                </div>
            </section>

            


            <a
    class="chat-btn"
    href="https://wa.me/6281912417503?text={{ urlencode('Halo Admin Oson Intensif, saya ingin bertanya.') }}"
    target="_blank"
    rel="noopener noreferrer"
    title="Chat Kami"
    aria-label="Chat dengan Admin Oson Intensif melalui WhatsApp"
>
    <img src="{{ asset('images/Chat Box.png') }}" alt="Chat WhatsApp">
</a>

        </main>

<!-- ===================== LANJUTAN: PILIH PAKET LES ===================== -->
<!-- SECTION: PILIH PAKET LES -->
<section class="package-section">
  <!-- Header: Judul & Icon Filter -->
  <div class="package-header">
    <h2 class="package-title">Pilih Paket les</h2>
    
  </div>

  <!-- Tab Buttons -->
  <div class="tab-container">
    <button class="tab-pill active" id="tabPrivatBtn" onclick="switchMainTab('privat')">Privat</button>
    <button class="tab-pill inactive" id="tabKelompokBtn" onclick="switchMainTab('kelompok')">Kelompok</button>
  </div>

  <!-- Dynamic Card Grid -->
  <div class="cards-grid" id="cardsGridContainer">
    <!-- Diisi otomatis oleh JavaScript -->
  </div>
</section>



</div>

    <!-- ===================== MODAL PILIH PAKET ===================== -->
<!-- MODAL FILTER -->
<div class="modal-overlay" id="filterModal">
  <div class="modal-card">
    <div class="modal-header">
      <h3 class="modal-title">Filter Paket</h3>
      <button class="modal-close-btn" onclick="closeFilterModal()">&times;</button>
    </div>

    <!-- Filter Jenis -->
    <div class="filter-group">
      <label>Jenis Paket</label>
      <div class="filter-options" id="filterJenisOptions">
        <span class="filter-chip selected" onclick="selectChip(this, 'jenis')" data-val="ALL">Semua</span>
        <span class="filter-chip" onclick="selectChip(this, 'jenis')" data-val="privat">Privat</span>
        <span class="filter-chip" onclick="selectChip(this, 'jenis')" data-val="kelompok">Kelompok</span>
      </div>
    </div>

    <!-- Filter Jenjang -->
    <div class="filter-group">
      <label>Jenjang Pendidikan</label>
      <div class="filter-options" id="filterJenjangOptions">
        <span class="filter-chip selected" onclick="selectChip(this, 'jenjang')" data-val="ALL">Semua</span>
        <span class="filter-chip" onclick="selectChip(this, 'jenjang')" data-val="TK">TK</span>
        <span class="filter-chip" onclick="selectChip(this, 'jenjang')" data-val="SD">SD</span>
        <span class="filter-chip" onclick="selectChip(this, 'jenjang')" data-val="SMP">SMP</span>
        <span class="filter-chip" onclick="selectChip(this, 'jenjang')" data-val="SMA/K">SMA/K</span>
      </div>
    </div>

    <!-- Filter Status -->
    <div class="filter-group">
      <label>Metode Belajar</label>
      <div class="filter-options" id="filterStatusOptions">
        <span class="filter-chip selected" onclick="selectChip(this, 'status')" data-val="ALL">Semua</span>
        <span class="filter-chip" onclick="selectChip(this, 'status')" data-val="offline">Offline</span>
        <span class="filter-chip" onclick="selectChip(this, 'status')" data-val="online">Online</span>
      </div>
    </div>

    <!-- Filter Rentang Harga -->
    <div class="filter-group">
      <label>Maksimal Harga: <span id="priceValueText">Rp 400.000</span></label>
      <input type="range" class="filter-range-input" id="priceRangeInput" min="0" max="10000000" step="10000" value="10000000" oninput="updatePriceLabel(this.value)">
    </div>

    <!-- Modal Actions -->
    <div class="modal-actions">
      <button class="btn-modal btn-modal-reset" onclick="resetFilters()">Reset</button>
      <button class="btn-modal btn-modal-apply" onclick="applyFilters()">Gunakan Filter</button>
    </div>
  </div>
</div>

<!-- MODAL DETAIL PAKET -->
<div class="modal-overlay" id="detailModal">
  <div class="modal-card">
    <div class="modal-header">
      <h3 class="modal-title" id="detailPackageTitle">Detail Paket</h3>
      <button class="modal-close-btn" onclick="closeDetailModal()">&times;</button>
    </div>

    <ul class="detail-info-list">
      <li><span class="label">Jenjang</span><span class="value" id="detailJenjang">-</span></li>
      <li><span class="label">Tipe Kelas</span><span class="value" id="detailType">-</span></li>
      <li><span class="label">Metode</span><span class="value" id="detailMetode">-</span></li>
      <li><span class="label">Durasi</span><span class="value" id="detailDurasi">-</span></li>
      <li><span class="label">Mata Pelajaran</span><span class="value" id="detailMapel">-</span></li>
      <li><span class="label">Investasi / Harga</span><span class="value" id="detailHarga">-</span></li>
    </ul>

    <div class="modal-actions">
      <button class="btn-modal btn-modal-reset" onclick="closeDetailModal()">Kembali</button>
      <button class="btn-modal btn-modal-apply" onclick="confirmSelection()">Daftar / Pilih Paket</button>
    </div>
  </div>
</div>

<!-- JAVASCRIPT INTERAKTIF -->



<script>
  // 1. Data Paket Les dari DATABASE
  // Semua perubahan paket dari Admin langsung dibaca oleh halaman User.
  @php
    $packageJsData = ($packages ?? collect())->map(function ($p) {
        $jenjangKey = match (strtoupper(trim((string) $p->jenjang))) {
            'TK' => 'tk',
            'SD' => 'sd',
            'SMP' => 'smp',
            'SMA/K', 'SMA', 'SMK' => 'sma',
            default => strtolower(trim((string) $p->jenjang)),
        };

        $typeKey = strtolower(trim((string) $p->type));
        $packageKey = $typeKey . '-' . $jenjangKey;

        $facilities = $p->facilities ?? [];
        if (is_string($facilities)) {
            $decoded = json_decode($facilities, true);
            $facilities = is_array($decoded) ? $decoded : [];
        }

        $status = $p->status ?? 'offline';
        $badgeClass = $p->badge_class ?? match (strtoupper(trim((string) $p->jenjang))) {
            'TK' => 'badge-tk',
            'SD' => 'badge-sd',
            'SMP' => 'badge-smp',
            default => 'badge-sma',
        };

        $btnClass = $p->button_class ?? match (strtoupper(trim((string) $p->jenjang))) {
            'TK' => 'btn-tk',
            'SD' => 'btn-sd',
            'SMP' => 'btn-smp',
            default => 'btn-sma',
        };

        return [
            'id' => (string) $p->id,
            'databaseId' => $p->id,
            'type' => $typeKey,
            'title' => $p->name,
            'titleClass' => strtoupper(trim((string) $p->jenjang)) === 'SMA/K'
                ? 'title-' . $typeKey . '-sma'
                : '',
            'jenjang' => $p->jenjang,
            'status' => $status,
            'quotaText' => ($p->jumlah_siswa ?? '-') . ' | Durasi ' . ($p->durasi ?? '-'),
            'facilities' => array_values($facilities),
            'priceText' => 'Rp ' . number_format((int) ($p->harga ?? 0), 0, ',', '.') . ' / Bulan',
            'priceNumeric' => (int) ($p->harga ?? 0),
            'assetImg' => $p->image_key ?? '',
            'badgeClass' => $badgeClass,
            'btnClass' => $btnClass,
            'description' => $p->deskripsi ?? '',
        ];
    })->values();
  @endphp

  const packagesMasterData = @json($packageJsData);

  // State
  let activeTabState = 'privat';
  let filterState = {
    jenis: 'ALL',
    jenjang: 'ALL',
    status: 'ALL',
    maxPrice: 10000000
  };
  let selectedPackageForModal = null;

  // Fallback nama file gambar paket agar gambar tetap terdeteksi
  const packageImageCandidates = {
    'Paket TK': [
      '/images/Paket TK.png',
      '/images/Paket TK.jpg'
    ],
    'Paket SD': [
      '/images/Paket SD.png',
      '/images/Paket SD.jpg'
    ],
    'PAKET_SMP_TERBARU': [
      '/images/PAKET_SMP_TERBARU.png',
      '/images/PAKET SMP TERBARU.png',
      '/images/Paket SMP.png',
      '/images/Paket SMP.jpg',
      '/images/PAKET_SMP_TERBARU.jpg'
    ],
    'Paket SMA': [
      '/images/Paket SMA.png',
      '/images/Paket SMA.jpg'
    ]
  };

  function handlePackageImageError(img) {
    const key = img.dataset.packageImage;
    const candidates = packageImageCandidates[key] || [];
    const current = img.getAttribute('src');
    const currentIndex = candidates.indexOf(current);
    const nextIndex = currentIndex + 1;

    if (nextIndex < candidates.length) {
      img.src = candidates[nextIndex];
    } else {
      img.onerror = null;
    }
  }

  // Render Kartu ke DOM
  function renderPackages() {
    const container = document.getElementById('cardsGridContainer');
    container.innerHTML = '';

    const listToRender = packagesMasterData.filter(item => {
      // Filter berdasarkan Tab Utama jika filter modal jenis = ALL
      if (filterState.jenis === 'ALL') {
        if (item.type !== activeTabState) return false;
      } else {
        if (item.type !== filterState.jenis) return false;
      }

      // Filter Jenjang
      if (filterState.jenjang !== 'ALL' && item.jenjang !== filterState.jenjang) return false;

      // Filter Status
      if (filterState.status !== 'ALL' && item.status !== filterState.status) return false;

      // Filter Harga
      if (item.priceNumeric > filterState.maxPrice) return false;

      return true;
    });

    if (listToRender.length === 0) {
      container.innerHTML = `<div style="grid-column: 1/-1; text-align: center; padding: 40px; font-family: Poppins; color: #050F71; font-weight: 500;">Tidak ada paket les yang sesuai dengan filter.</div>`;
      return;
    }

    listToRender.forEach(pkg => {
      const cardEl = document.createElement('div');
      cardEl.className = 'pkg-card';

      // HTML List Fasilitas dengan ikon centang lingkaran abu-abu
      const facilitiesHtml = pkg.facilities.map(fac => `
        <li>
          <span class="check-icon-circle">
            <svg viewBox="0 0 24 24"><path d="M5 12.5L10 17L19 7.5"/></svg>
          </span>
          ${fac}
        </li>
      `).join('');

      // Render Struktur Card
      cardEl.innerHTML = `
        <div class="card-banner-wrapper">
          <img src="/images/${pkg.assetImg}.png" alt="${pkg.title}" class="card-banner-img" data-package-image="${pkg.assetImg}" onerror="handlePackageImageError(this)">
        </div>
        <div class="card-body">
          <div class="card-header-row">
            <h3 class="card-title ${pkg.titleClass || ""}">${pkg.title}</h3>
            <span class="badge-offline ${pkg.badgeClass}">${pkg.status}</span>
          </div>
          <div class="card-subtitle">${pkg.quotaText}</div>
          <ul class="card-facilities">
            ${facilitiesHtml}
          </ul>
          <hr class="card-divider">
          <div class="card-price">${pkg.priceText}</div>
          <a class="btn-pilih-paket ${pkg.btnClass}" href="/pendaftaran/${pkg.id}">Pilih Paket</a>
        </div>
      `;

      container.appendChild(cardEl);
    });
  }

  // Switch Tab Utama (Privat / Kelompok)
  function switchMainTab(type) {
    activeTabState = type;
    filterState.jenis = 'ALL'; // reset filter modal jenis saat tab diganti langsung

    const privatBtn = document.getElementById('tabPrivatBtn');
    const kelompokBtn = document.getElementById('tabKelompokBtn');

    if (type === 'privat') {
      privatBtn.className = 'tab-pill active';
      kelompokBtn.className = 'tab-pill inactive';
    } else {
      privatBtn.className = 'tab-pill inactive';
      kelompokBtn.className = 'tab-pill active';
    }

    renderPackages();
  }

  // Handle Modal Filter Controls
  function openFilterModal() {
    document.getElementById('filterModal').classList.add('active');
  }

  function closeFilterModal() {
    document.getElementById('filterModal').classList.remove('active');
  }

  function selectChip(element, category) {
    const parentContainer = element.parentElement;
    parentContainer.querySelectorAll('.filter-chip').forEach(chip => chip.classList.remove('selected'));
    element.classList.add('selected');
  }

  function updatePriceLabel(val) {
    const formatted = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(val);
    document.getElementById('priceValueText').innerText = formatted;
  }

  function applyFilters() {
    const selectedJenis = document.querySelector('#filterJenisOptions .selected')?.getAttribute('data-val') || 'ALL';
    const selectedJenjang = document.querySelector('#filterJenjangOptions .selected')?.getAttribute('data-val') || 'ALL';
    const selectedStatus = document.querySelector('#filterStatusOptions .selected')?.getAttribute('data-val') || 'ALL';
    const selectedPrice = parseInt(document.getElementById('priceRangeInput').value, 10);

    filterState = {
      jenis: selectedJenis,
      jenjang: selectedJenjang,
      status: selectedStatus,
      maxPrice: selectedPrice
    };

    renderPackages();
    closeFilterModal();
  }

  function resetFilters() {
    document.querySelectorAll('.filter-options').forEach(group => {
      group.querySelectorAll('.filter-chip').forEach((chip, index) => {
        if (index === 0) chip.classList.add('selected');
        else chip.classList.remove('selected');
      });
    });

    document.getElementById('priceRangeInput').value = 10000000;
    updatePriceLabel(10000000);

    filterState = {
      jenis: 'ALL',
      jenjang: 'ALL',
      status: 'ALL',
      maxPrice: 10000000
    };

    renderPackages();
    closeFilterModal();
  }

  // Handle Modal Detail Paket
  function openDetailModal(packageId) {
    const pkg = packagesMasterData.find(p => p.id === packageId);
    if (!pkg) return;

    selectedPackageForModal = pkg;

    document.getElementById('detailPackageTitle').innerText = pkg.title;
    document.getElementById('detailJenjang').innerText = pkg.jenjang;
    document.getElementById('detailType').innerText = pkg.type.toUpperCase();
    document.getElementById('detailMetode').innerText = pkg.status.toUpperCase();
    document.getElementById('detailDurasi').innerText = pkg.quotaText;
    document.getElementById('detailMapel').innerText = pkg.facilities.join(', ');
    document.getElementById('detailHarga').innerText = pkg.priceText;

    document.getElementById('detailModal').classList.add('active');
  }

  function closeDetailModal() {
    document.getElementById('detailModal').classList.remove('active');
  }

  function confirmSelection() {
    if (selectedPackageForModal) {
      alert(`Anda memilih paket: ${selectedPackageForModal.title}. Lanjutkan ke formulir pendaftaran.`);
      closeDetailModal();
    }
  }

  // Inisialisasi awal saat load
  document.addEventListener('DOMContentLoaded', () => {
    renderPackages();
  });
</script>


<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

*{box-sizing:border-box;margin:0;padding:0;font-family:'Poppins',sans-serif;}


/* ===================== LULUSAN OSON INTENSIF ===================== */
.lulusan-section{
    width:82% !important;
    max-width:832px !important;
    margin:14px auto 0 !important;
    padding:0 !important;
    position:relative !important;
    box-sizing:border-box !important;
}
.lulusan-image{
    display:block !important;
    width:100% !important;
    height:auto !important;
    margin:0 !important;
    padding:0 !important;
    border:0 !important;
    object-fit:contain !important;
    image-rendering:auto !important;
}

/* ===================== LOKASI OSON ITENSIF ===================== */
.lokasi-section{
    position:relative !important;
    width:82% !important;
    max-width:832px !important;
    margin:30px auto 0 !important;
    padding:0 0 48px !important;
    z-index:1;
}
.lokasi-section::before{display:none !important;}

.lokasi-card{
    width:100% !important;
    height:328px !important;
    min-height:328px !important;
    padding:28px 30px !important;
    background:#fff;
    border-radius:24px !important;
    display:flex;
    align-items:center !important;
    gap:38px !important;
    box-shadow:0 3px 5px rgba(5,15,113,.18) !important;
}

.lokasi-map{
    flex:0 0 373px !important;
    width:373px !important;
    height:263px !important;
    border-radius:20px !important;
    overflow:hidden;
    background:#E5E3DF;
    border:1px solid #E2ECF8;
}
.lokasi-map iframe{
    width:100% !important;
    height:100% !important;
    border:0 !important;
    display:block !important;
}

.lokasi-content{
    flex:1 !important;
    min-width:0 !important;
    height:263px !important;
    display:flex !important;
    flex-direction:column !important;
    justify-content:flex-start !important;
    padding-top:12px !important;
}

.lokasi-header{
    display:flex;
    align-items:flex-start;
    gap:0 !important;
    margin:0 0 12px !important;
}

.lokasi-logo-exact{
    width:110px !important;
    height:auto !important;
    margin:0 0 14px !important;
    display:block !important;
    object-fit:contain;
}

.lokasi-address{
    font-size:11.5px !important;
    line-height:1.5 !important;
    color:#12277D !important;
    margin:0 0 27px !important;
    white-space:normal !important;
}

.lokasi-desc{
    font-size:12px !important;
    line-height:1.5 !important;
    color:#12277D !important;
    margin:0 !important;
}

.btn-gmaps{
    width:100% !important;
    height:48px !important;
    min-height:48px !important;
    margin-top:auto !important;
    align-self:stretch !important;
    padding:0 18px !important;
    display:flex;
    align-items:center;
    justify-content:center;
    border:0;
    border-radius:25px !important;
    background:#78B0ED !important;
    color:#fff !important;
    text-decoration:none;
    font-size:14.5px !important;
    font-weight:700 !important;
    line-height:1 !important;
    box-shadow:0 4px 12px rgba(120,176,237,.25) !important;
    transition:background .2s ease,transform .2s ease;
}
.btn-gmaps:hover{
    background:#5E9FE5 !important;
    transform:translateY(-1px);
}

.lokasi-footer{
    width:100% !important;
    margin:28px auto 0 !important;
    text-align:center !important;
    color:#fff !important;
    font-size:13px !important;
    line-height:1.6 !important;
    font-weight:400 !important;
}

@media(max-width:760px){
    .lulusan-section,.lokasi-section{width:90% !important;}
    .lokasi-card{
        height:auto !important;
        min-height:0 !important;
        flex-direction:column !important;
        padding:20px !important;
    }
    .lokasi-map{
        width:100% !important;
        flex-basis:220px !important;
        height:220px !important;
    }
    .lokasi-content{
        height:auto !important;
        padding-top:0 !important;
    }
    .btn-gmaps{
        width:100% !important;
        height:46px !important;
        min-height:46px !important;
        margin-top:14px !important;
        font-size:14px !important;
    }
}

</style>


<div class="feature-lulusan-lokasi">
<!-- LULUSAN OSON INTENSIF -->
<section class="lulusan-section" aria-label="Lulusan Oson Intensif">
    <img
        src="{{ asset('images/./lulusan.png') }}"
        alt="Lulusan Oson Intensif"
        class="lulusan-image"
        loading="eager"
        onerror="this.onerror=function(){this.onerror=null;this.src='{{ asset('images/Lulusan Oson Itensif.png') }}';};this.src='{{ asset('images/Lulusan Oson.png') }}';" >

</section>
<!-- /LULUSAN OSON INTENSIF -->

<!-- =========================================================
     LOKASI OSON ITENSIF — GOOGLE MAPS ASLI
     ========================================================= -->
<section class="lokasi-section" aria-label="Lokasi Oson Itensif">

    <div class="lokasi-card">

        <!-- GOOGLE MAPS ASLI -->
        <div class="lokasi-map">
            <iframe
                title="Peta lokasi Oson Itensif"
                src="https://www.google.com/maps?q=Oson+Itensif,+Sikluwung+Asri+No.+2,+RT.02%2FRW.01,+Tandang,+Tembalang,+Kota+Semarang,+Jawa+Tengah+50274&output=embed"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                allowfullscreen>
            </iframe>
        </div>

        <!-- INFORMASI LOKASI -->
        <div class="lokasi-content">
            <div class="lokasi-header">
                <img
                    class="lokasi-logo-exact"
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAApoAAAD4CAIAAADDzdHQAAC1dklEQVR4nO19d2BdxZX3uYAkW+892bio27hJrrgXihvFgIHQe0ILkE1IIJu6CZBkN/ttQsluNrRkAwk1kARMSQjVFFdwlWXAVXJVl9z03pMtydzz/THtzNz7nl6ThMP84oj77p0758yZmXPOnJk74yAiWFhYWFhYWBzLOK63GbCwsLCwsLBIF9acW1hYWFhYHPOw5tzCwsLCwuKYhzXnFhYWFhYWxzysObewsLCwsDjmcUJvM2BhYWFxDKD54BEAAOCfAg3u37cXmbGw8MKacwsLC4uYaD54+NMdBzbt3N904HDbkc7okaMAAIDDi/JOKgzNGFcwrCjUyyxaWAAAgGO/O7ewsLDwInrk6JJ1tR+sr91Z3+rIUbmOQN+s8cNPvPHCsfl2sG7R27Dm3MLCwsJE9MjRR17YuGnn/uiRo9ySO3oKBAAExwGEYcWhmy4YO37EgJ7n08JCoqfNec2Bz9jFnv2fGY+GDjieXZSeeHxPsmRhYWFBwWz56k2NAOBjy6XKdNSdQN+sb1558sxxBT3Fo4WFiW6fO289gq2H3U9rj35Sd/TTus7Ww1hz4LO9HlvOMOTE4wFgXMkJ44uzhg44/tSRWda0W1hY9CSiR44+8fdNqz5pcJQJdwARERzHAWAX/KYw6Rg93PHE3zcNK8rLP9FG3S16B901OmdW/I1P2j+s7thUdzSW/Y6PISce3z/3uKunBeeOPmFkgf2mzsLCotux+tPGJ/6+qenA4RTePWNa6beumphxliwsEkHmR+etR/CT2qMvrDn85qftrYfddLKqPege7Tzh2eWdr6w9Omno8ZOGHnfuxBOCfZyu37T4AmBXXevOutYUXjxjemnGmbH4p8H7a/c27m9zwEGy+s1x4o18HHAAAAE/qW5pOnDYDtAtegWZNOetR/DNj9v/uvbwp3VH0zTkAHCc4xQEskMnnAAAkSO4YtvRFdvgpTWdl83IskbdAgB21rU+9JdKc4ESAKgIKIDj83P8yIFW4Vr4ounA4Z11YUCgtpxfi0l0RHT0ZoeACOiA07T/8Ptra65eUNaTPFtYMGTGnLMR+R+WRlfu6EzfkDP0zzkhdMIJxx2ndZuGQ/jo4o6X1nTeMCf73In2o/kvNpiO9YyZHHDUPUSHzCg5yIZc9msOC3/sqj2EyObJ1U3ehFir4ZZdb0IOgGiKkcOdPcSrhYWODFjEmgOfPb607S9rj2TKkANAMPuEE/tkGbZcghn1tzYevXFO1qST7Fq5Ly5845+GqvUZZllYxEDk8FE21tZXsuvNBn0/WuPNMXq4I3r4aKCvHWxY9DTSbXNvftL++LK2D6s7MsINQzD7hEF9srOOi7f2LXIEK/d89tNF7mUzsm6ck5VB6unjk+oW7RMWDl/XRD3NH9A3/8Tc7uXsnwsIPOyJmpDRe+FJY2ERE4jI1rHHaykx3EKHL3e3sOgFpG7OW4/g40vbHlvWlsFBOQDknHDcoD7ZfU5IaB175Ai+tKazutG9/ezswv6fCzXdtL/twT9XNu1v0+7ST1eNCV2Ba84Zfc255T3D5D8PEFCz1DJKKrUxsslOZd/tEN0iNnL7ngAqoE6dch/1om8Vpy7t0NyiV5Bis2s9gj97JZz+2nUDxznO4IRtOQNbJRc5gj+8MOdzYtEBgfv2ZszOkYpC/BQvGJrBIiEgX7GkD8h9rDaCqg4rZovYGFGcx0fnAA7f+A0A1KCb+uSuuCOtvQs4YeSgnmfbwgJSOyC19Qh+5/lD3WHLCwLZuSekMhdeueezny46Ut2YSX5SBls1w6d1Uf3jq2nUP2SKg133NtfHIJhUXRQTl/wfSKFyMTOtjPLaytoiFvIH5I4ozmNtBUXgHUib4YF41r1lWB75+rlAn6zhxXm9x77FFxpJm/Pus+WD+mZ7l7InjupG977X2j8XFl3YaQFA8454AMZPi+QgfCbpGCn1avyjCXqba4vPNc6YOSTQ9wRh0AEBwEVARP6XtyB0UWtcAIh41swh+QPsChiL3kFy5lza8ozzkZt1fP/s1G05w+fHokvrLAfqxgiSDyJda2JSBxkgSbeI2m7DnVKPLCzi4ORRg2ZNKOTNxUVwpZNIBuuoxdnYoL1gQO6ZM4cE+n6+VuZafHGQhDnHSPhXi+pX7sj8V5VsKXuatpyhutF95J2OhoO9qbOFxRA2xBWhdlcF2UGqBpQ3e5HlYxVswCRj6MYYXTPh/D924bFFFwj0zbpu4ZgJIwepKRvmebtqFO6J/kCgT9Ztl00YUdKvt9m3+OIiCXMeffqxc1/7adH+qsxywGx5Usvf4qNyz2ePLu6IHOkdrc3Cc7yTu0QdoLoAYdJVYNi1NiYVEN0qnSTpI0lZy0SArhW0RdfIH5B72+UnnzxqEBJ/EMTcGJDpM/avYEDud748dcIouwjOojeRqBFtX7GkfcWS8uaNj1fd9eXmv2WMvOMMyMnKoC1nWLHt6KI1RzObZ+JwAZQKMKd1ZfBdDRrt0qzUoPwhNSynsXaZQAVA1AMLi7gYUdLvnttmfXnh2PwBuYAkgEbWtCLC4AG5Z8066V+/PHXWxCIbZrfoXST0odpnjfVtT//ebawHgNBn0a83PAcAfxp8UZq0+VL2rG7Z1u2lNZ2jCpzTy3vjA1A5cS5v0GfaHQSxw4mNAacCITX+H1edhmGcXwkA7JMidAGsPbdIAIG+WdedP+asU4bu2Hvow411H29vIbtD4YjS/gUDc8+eNbRgYMAacovPAxKydm1PPXa0erv8ySx6cUfjnwZfXJednxphesJKdyByBBetPjpp6PE9fViLGCbGPoIJY/y0NiZJ6OvaHMdhn6ETVwl0qVoJWySNggG5BQNyT51UBACN+/j2UAUD7fJ1i88duo5yt69Y0lG5zrgZ+iz65ea//XzP/xZ3NKVGOJR1fDqfpSWCyj2fLVrTG8chsHVvrktn2uSiahmpU19A2whwSpDf+bH/SIF7AcZPC4uUUDAwl/3rbUYsLHzQhTnHSFiG2b2YHvn453v+d/ThHclSDWafMCg3M0vZ4+PtjUerevy7NQR0+I5S/KccMkqLbhgZu/FoihBTmBD3HxrJLCwsLP7p0IU5P/LWa581NsRJMD3y8a93/tcZhz5KnGQiJ6xkCvXh6F83reoBQhTooss+SqNGmw4dQS7JUj/t5HnS0AWoy9YzJKdJLCwsLP7pEM+mYiR85O3XMBKOn0VxR9PP9/xvgsvdkzphJX30Gbh+8b6nth3c1TPkFFBuKErG3eZ40RN1t0gOMugByh0iUxhaUithCwuLf2rEW4nW5dBcQi6Oe6DktjjJUjhhJR105q6L9H3Z/azlg5rV5f2H9QxR+X1qQumOHUTbOiNtHQBQXXMo0tYRPdwZPdzR2NIGAAWD+FTiiNITA7lZhQNyAaBgUKC7WSKb7/CTVVCeiSFTkPkc094fy2hsiQKpi8Z90Whbp6yIk8sHFw4IQI/UQmbBmlnkcGfjvjb/ZoYQ6Js9Ymi/Y7SAFhbdh3jmvLNyfZdDcwm2OG704Z0/Hfqvvsvd5QkrBf2cUQXHjyxwRhYcF+rjAED4CDYexIZD7optnzUeyoyu7cxd1z7gFTerBQBe2/X+l4bPLwqkuAg/WdB1bcqg6Od9ec9K/XzOnje2RKtrDlXvPbBxWzMAbNzaLB/Rr+8AQBY0lJuV2zd75JB+o4b2P3VSScHAQDC3uz7jUd+pIYLjCKtO+FEfsjmQhpwjbZ3P/P3THTUHAAGcOOdmxrsT7Jv1vZtmpiONxpZo5bbmjduaG/dFKre2AKoz4tjCfnGyuxPMzQr0zZpYnj9qSP8Fpw2LQ/TfH10RPdyp+GR5SlGplirKhQgOnDa55NKzMnOeb6StM9rWUbmtecfeg9V7DzTua2toiWrnlJlsICAEA9mBPlkjh/YfOaT/aZMz3MzeXrnrnQ93KtK8QekHG7NmRs7oC+Rmfz+9+rWwSAcxzXln5brO6m3JZscWxz1QcuvWviOMR4P6Zs8emb1wUvaoguNGFvgP0G+cg5V7Plu05mjl7s+SJU1RcOLhphPfOezsYT/ro81/3/nB1yZclU6eicNY26Z/GQ3GL5QW5vNkzSNtndU1B95Zsat678HqvQfNx47vVqncqoSjHeFoR2NLZGVF7aJ3tgX7Zp9z+rCJ5YMnjc60OyWG51y/ohp+g/7VOfD1ianL+Jm/ffrOhzsjbeaHEujxzCDGnUBu1u1XT0lN14vq2F219wCrDvU1vbQpbJUlv4fhaEck2vF2y863AV5avO2c04edNrlk5JD+3syr9x5saIkC4TxWceQzx4GCgcEUCmKgsSVatffghxvqZLmoQB0g7orqMNwpZs2sYV90RUXtS+9sKxwUWHDa8HPiOi5JMbZhi/Bc0ZRLrIZUODAQbeuw5tyitxDTnHdsWBdrQXt8sMVxD5Tc9n6/U+TNwtAJ3zoj9/xJWQX94q1mD/ZxTi8/YdLQ4yv3fPbIOx2pjdTxuLaW0HOHnM305vZDu8Kd0VBWT4TmUMV1EcARtg/JqE6ko78+H+a8sSW6ckPtWyt2Ne6LRto6VHBBloIbSqXY5CP+qT3RvpFoRyTa+fSrnwZzsyaNzr/07LIMGnVxMIYjoh7aUI4NLZGYpJQFvLKidsWGmnC00y8PB3WKZNSmwjGBQPbtV085dXJJCtQrtza9vWLXyg011JkgfDik7ZBYD0nT0BJ5+tVP3lqx85zThl129mjD3qDcDVcvHnouFLm0tyWOtHWurKh9e+XO6r0HjHI5qPEfkwx5EGnrqNrTUbXnwEuLt1529uj0jbqcMHPUb15wR3Rw0pt5FXw+erDFFxexzfnKJSlnyhbH/a7wOrZz3OxR2V+bF5w1/IQEd3RhRn1kwfH3/729ck9yw3Q8ru3IoD8dPX69cX/rgZ2Rjp4y5y6ii6K3o9ikHQCRWT5HBDVBmqDPwfBcatjKrU0A0nAjADgOuC4AN+r8DrNfyhY4XMWLgjsibIuIEIl2LK+oqdzaNHF0/mWZMupcsGoERxwLQ6Spy7Z678Gn/vZJQ3MUAPzGZYbR4RfGHkKnTSo+dXJJsjYm0tb59oqdixZvaxSjZz9Iiqqt+aZraI4+/eqnlVubb7hoPJU/seYaYoxBM9BKK7c0vfTutsotTdRfJARUiRBjRII4J+a7Dc2RR59fv+idrbdfM+X0Kak4T4oJJUpGiK/LkMs1CFcoe0vqFC0s0oa/OT9avd2NRNLJly2OC30W/WT2jd89JzhrRNLOcmE/5+dX5Nz/944V25PYfb19wMtHA+vxuDbjfn20eV3TpguHd//0uYyxo3HXkTfVMBcQUYwpe1UVVG5pWrR468atzZG2TuFxsPg0cCZFhIGld110jClkreAoSuSIDBxADEfbV6zfW7ml8dKzyy9fYA4TUwAJMAOAgy6Ph6AcQCHqg3bw2oA4iLR1vvTO1uo9B0CUCYw8aK1Jy6OiFIAAs6eV3nDRhGQLy2qkcktT9HCnKKkWAFdhB+kd0mfCvDvCeWQPN2xurNq9/4aLT758gZj5pvacrPAwrKUil4ZJ5w7KO1sbWqIOaTcypEBjQS6CA+CiSZSk9HkXARuaIw/8YVXV2eU3XjIhVU61DxqJoUaHu7TeuRv7DaRFLyOGOa/aitG0zDkAhD6LfqXtvX6zFw4YcWJqOQT7OLefkx1pxwTH6J256zpDy722nGHrwZ0XwvzUOEkcPEyn6QJ2X+vqLC79eVgBF2nrXFFR8/Srn7AJVH01mRp0qvtKcdLxLwKxMQpKDaon4WjH069+Urml6ZvXTh05tH86zAsZCh5IREHFa82RcxICX/TO1uXraxTv3EWIyQ3PXvoQALOnltxw0YRkF2CvWF/71Ksfe1ctyBJIcaMR/JX1JngQUXG1VDAS7Xz6lY8BQFp0NMolyIgohyNrHAWVFExXpK3zkefXrayojUQ7+LwMCWKg4+jFUf6k4RkzrhRvwP02JMN51saq9x64/dqphamtfqc+t5owRxfRAbJNlLZCw8KiN+G/JK0jmTXtseD0+azoX742YMLodDIp7OfcODcrmNN1h2FL2WPZcgBY3/RpfTTFLWmTA4oRj9q6RBhC8Q9dtfmrSNYTrBmItHU+/crHjz6/vqElCmK3G7ndit8GLUDPLSP8g9wpR5TRZwsXIBeVWxq/e9+7i97Zmjr3hGEgZIQ7hd6KiBlZ9sOK9TVvL98ZiXaofEArvE/OovzsTqDvCZedPdp3AVp8uk+9+nHVngNUdIY0QbYeTlT8YqNaveXxobvcyggw3Nbx1CsfL3p7qyiRKpcognBMOSVUyVQdJ4FIW+cjz61bsb42HO1AAFcRJe3F20oMQUtvWb2LZm7qPi5fX/Poc+u9Cxi7BG1DSgIyGIRkVyhBS7RFC4teg//o3G2sSzNfp89ngStG5syanGY+ADBp6PHnTDz+pbgHnro5u9sHvOLm7ImTJtwZZwIyk2CdHHjYlQ5iScBU/+ZFDSV7EFzDVtREopq+Q+81iSLzEa8R9pVrzox4AwneaiFLAAAIt3U89fIngHD5Oan6fCgpGkv2jIG5RjcRQTe0RJ985ZP6ZhajQkQ5uaBo+QiKMBMIZH/zuqmTxiQ3v7Nifc2Tr3xSvecAGRpCjAlmuf4OjLV+iJRJ/+FjJNrx1CsfFw4KMPvk8Ez4oF6ukGdVK94ntZ5ka33kuXUr1teE2zoccIgwaXFUEEDMTKlzjGR6Fz2zPJ4C0leWr98Lj8MPbz0luckO4dV4aLFIBrviXwYSNqw1t+hN+JhzjIQ/a0hlTTtFVvnB7HkXO/1L08yH4fKZ2XE+Scfj2toHvBrflgNAfbQ53NlWlBGGugBfCocA6OoxaIetwxZKCmWUtKfjdZG2zkeeW7t8fW2krUOqI3komeRZLURCcBxwhcpy5LdReoSWrvKTN4FNLhhroR0AF8LR9idf/hgQLj83FYuOHkoZGR9F2jqfenlj1e798WnF5AowmJt9+7VTk12NtWJdzZOvfFy15wCI6Zi4FJH8x5vA19nQEI52vPj2lnBbh3AKfL0d6mkShyFOMTxYsa5mw+bGcLQDpKOgZ+DwruCtTfPC825MD00mq9jcuOjtLTdecnLiDCu/04cWUHEhYcCOzS16Fz7B9k5yFmpqyC4/mHte/nFFp6eZj0RhP2dUvv+x6Hwpe5/Nvk8NrG/6JFMsxQEfHaowIn1GIrIu38WMBDh7CJFo5yN/Wrt8XU0k0k71IbrIF/Dym4jyJw9rilK4KM08yPusLK4sP8mZDJn5hcvfjUQ7nnz54zeXJX2Qj6lpEcSMBvqkoyHbrrDorS3L19d6ciaqG8l9L3WE06eWzJ5aGszNTrw4kWjni29vqdp9gEvbdWmGJhvaHUDtviyvbuxo8UXOGzY3RaIdJJ4tmiPJjUa7xX1MQIqqXE++8nFDSxRJ/iSODjKgTiFJe0GKDJRhJBzS9OFo+4tvblm+ribxuohJOzY4SxYWvQef0bnbkFakPbv8YJ/ZDceVznFO6J9OPgYmnXTcCo+bgce1ZRW/EsnyWcrui9aOhJKlCd691e/4qRNKlVk89crGZetrotEOBLJ0GADMr5jFYJ3BiDRQT8W4L2y4+aIDDpI8Bd1wW/vDf1oXzM2ePS25cI6SM+rRZTDkHyvk7IPl62reWFYdiXbQ+QO6+k/nwOtWwOzpJTddOjHZpewP/2nt9t0HtJZjBr89EXRUFYbi60GULDnC4MnakXad/ZALx7WiAqHhuauPRxPBm8ur65sjzMnzOq0kqs9/OlqBfeAZGQuItXFesxqOdry5fMfkMfnBQGIOFiZePvmGteYWvYwMb5/u9PksZ0bz8QWHjztxLmTWnA893rsFzdE+mw9kLUvQlkOPTZ9jvH+oXSO500PKYNm6vUvX7olEOlSoXI2QwCWDPxddkCM6NV4ixRFvg36TjJwMQwIuW0TER1iKdCTa8eKbmyPRjmSKQkZpoNYscXJS2sR+GY6WF5Fo55Mvb6xvjriIYrmiqBxpeVyUMgHhUkgnYva00psumZjsaurl6/ZWbG4MR9oVpyBGm2KFofqPy6UnC8T+uq4rF2MJnkRKBJKeZiiuwe8+6vfpv8RaayTa+cbS6nCkXSOBHnKyZtiVtO6k0CZXsuDyJ1sVSRepqUuo2NS4bP3eBKsjdmhA50KkTKKmLSy6Df7mPLX94Jw+n+WeXXPC0AgAQN9haXDlg2Bf05Z35q7LKn41cVsOAJEeMefxdYGuRUHd6QHOmLl6aWNDc9RgRXcvTPZAaEffsulWAhGRLXeKUXzNm6GkKzY3/vKxDxMvi/IzCHnQdb/BWXy3KRLtfOjZNdt37ZfJZPENo6MZJlByC/bNOm/OiFEnJfdlZiTa+cRLG/myO01KZMzMLl01NkZEcNmcBfFZPNIQKcVPEF6I63EuyTyLIk7v0/SJYdm6PXwHWc3bU7kRT0srr5QtABQODADo9cbe1ZwX5WuINDIDcF03Em1/c+mOJP1FlZPIHylvQs7gCh8ihcwtLDKFeEewJAVmy7PKDvHfx/fPVM4MhfrQnH2Wdhi7WP7WCyAmTUZ3WTfX97dCEEc69CQeenZNfXNU6FD2HyVYsemb45g7XBlsasyLtxDE4mRXfQ6uDgWR7/JtXkQ+NPOKTxuWrauZk3DIHaU1IIui9a/59S1G9PIaeGNZ1bJ1e4lSdkCrNYNbs/ZCgew7vjJt8piCBJmndOubI7FHeTohbyKf17yllv9VuWmhCzCv6U8tDY/OJ9Ryl6/bG46061zpGaqRuFaOokHBKeMKRp00YNTQE1k5Im0dVbsPVGxqrNqzPyytsoyKkLL6lggRt+/aX7G5ac70hFoX6mXW2EQjpO8AiFUmFha9h4yZ8z4zmrLKDjl9xH4vWf0ylbMXeFxbR/+3u1zK3ptAQAf5nLG8oxk1AFA7wvntwJJ5VGxurNjcGIm06x/LieGYw9fh82Ec2VGNF4hsiEPNPS0X13HaNlqISL5wA0BEYlFJsR2IRDteeGPTlCTmOCVxjR35m+9WonQxOIbdEFi2du8Lb2yJRDpIXsgmppWo9LLSMoQC2d/6yvTZ04YkyrkAC0czulrJqFD9fBBvqyE2XAzV6X3u5hibFxkZo0PuIHldp5wo6psjxCzy/hCzsXPLDHOnD71i4dgpY03HaPa0IVec11G168ALb25eunavxgzSrqX7MeKDknC0Y8PmhoTMuRh+K2Zd8dkGy5k2Ye7IiqiDhUUvITPmPLv8YM4pnc4JZO+2zkPQJyN5m2BL2T/ru6Vbcs8I5IiBf4pGjmvQxnncuGlfgHUn3lhSVd8UBnDAlbuACfXOTB63XQ4CAFu7RMa6KNRi4aBA+bABwdzswsFB9rShJVK150B9UzQcbSc5qyJrps/Y2BPEEBgB+AB978K5IxMuljLp3nG4cFBIap0dhki084lFlfVNYZqHst5aUXjFGo7I5LEFc5K35cCG5k0R35E5vYWegIm3GMFAdiA3u2hwsGgwP+4sHO1oaAlHop3UrMa3zV5nx7ddJhJYrtjUwJbNG96b901ab3NnDPnW9dNlEQwEc7MnjysYNezEgkWVL7wuv2dxQNWV4b2JGnccQFy6Zs+V540pjJE5KR0vIG2qvKvy5uaVknSELSx6Bxkw52wpu3PCYXoTDy51QpPSz1xiw+7PQNjyowHzhJXPFeQsmje2SIY7RMf1yJRbxebGik2NSjuhVKzacM3RR89IdlF1ECaPzV84b+SoYQPKThpg5B9p64hEO154Y/PrS6vD0Q6lX8W76hd6lLougb++vjkh0ygX7smv5I2xOYMrCga6specRzsefHrN9l371QCf/gdJtmCUgZOeO33IzZdNTMGWA0DFpw1cXII98y+j4rogvvYXEwDyawEI5WZPGVcwZ/rQUcNO9FZNQ3OkYlPDG0ur13/aoAWIpOMly+Y/meAdyidktiJtnXyGXt1j9eR4Iw4yzcK5o2LZcolgbvZXL58UiXS8vqSKSQfUeniH+C0Oyr8IABCJdoSjHYWDu2Ze9/tk0MnVuaXOY6ITEBYW3QR/c+4EQwlu8np8QVuf2Q3HFxw2H3QeSJMzA2wPmaOB9b4nrHzuwHWBGnV4TZuhEbtbFbzxQVV9U0RYDW2fLzrc9FpDdh0KZF+5cNxVC8fGMlrB3OxgbvYdN8w4b97IP75YuWzNXuokeC24SYbwsH3X/orNDXOmD+2qTCJXbdzJHBI+/68iI6atVnh9SfXSNXvocJPPMjjSpBIrh0CjLYBQNmzAzZdPKhtmGtFEULGpcfuu/XSoi66a/OfTIMgtL6gJWiVOx8EpYwuvPH/s1LGFsaqmcHBw4bxRc6YPrdjc8OBTa+qa+HEM3JgLCyvzlyfXkEdCMMm00ki0HQCBUgHV4jx5IYDjOJDgQsJgbvbNV0zi32jw13mhiPehJh1YyKk10r5s7d5EKstbVC1n88g+kGW0sOgt+KxsPy4YdAJdeMcMTp/P/G05AB5cikd2pckcRVWjW9O5tv3El9Ox5aP7D8scR/5AAPWpDF3+HG+JtL6stxvQ0Byp+LRBkOYalTBDL3z+BXOzf/z10+PYcoqykwbc/fXTrzp/DOpFhtj5e5l5/YOqLhchU/HqmSAJkfgQoli6Zu/rS6rC0Q5KHVg9Kp5d/XVVg8Hc7JRtOQBs37WvVSOtGAZxkxRWlpz/JxTIumrh2Lu+cfrc6UO7rJpgIHvO9KG/+N4ZnFsjf7HvObuWf3kyF8XGQcjCOYlsT45y/bmYS9JKquWAIIqcOIoGB6eMLVTVDLxmVFMwmHERAMLRdr/M/FgH0QJA5iablngq03jbloVFz8JndH58QXEib/Kl7EP9D17DcCWEK6HPsHSYk4gcwXX71rQPeMXNakknn2BWQm5KulA2EwDEkESMdPRQNnmpOzlaumZPa7Rd0nNRHemmoI845Jg2L5h91zdOnzujy7GyQjCQ/dXLJyPCX/+xSWYoRrraNDcbkUnFKx+t/7Qh3NaRQLxdDc9jrdgih9eZacLRjj++ULFt134650ovfHIjUdhQMOvOG2dMHVeYsGBMVGxqYAu/Hb+AjcGCdwXZVeePu2rhuKSC/GXDBjz803P/69HlRkACQFlE+teh41RxkeAMcSiQjWJhA6soLTeSIb3z+gdVt1w5OcHizJk+ZPuufUDaFZAGrNoYqjV+iBCOdoTiCk14H3qjIWe1yoZCG7Q15ha9C79gezCUyJt9Z9drS9kNHD3o1j9z/InzMrKZzJubG3Yf91L6S9mLAolMmqULbr1cYp1kX1daDQA8y4q7Des/bQizk8EUk2qVM+dE31Nd/rjjhpkpWKxgIPuWKybXN0WWrt6j2UDlMzjCzKt5aKnew5GORNQ6GiWSp3zS6DjxUegMfjja8eCTq+ub5Bdics6VD7gcMOuJvg4AX71i8pwEhsWxUN8U2bZzvxCHQ6wH6GZEzoNoj+bOPOnKJG05QzCQfedNM+uaItt27SPr2JnddYRvpKaiyavJ2a6CQUGWMQp7ipwK+DZ9lunr71dNHVc4ZXxCTW7ujKEJppQI5WYnJDRUzotiWLDPDmN3kE1RiK8x7ejcolfhNzov7PqYkuzyg9kn749pywEAAA8swQNLnMEXp84dAADUh6N/q3mxFXenmQ8AhLJTOvk4SchgHLie07GNESIzI8J+dBM/4WjHtp37jNV5arNVz6DVIcPEeTNOmjo+5qRsfAQD2VedP279p/Vh9hWWA2x7GckBTyc/2NVNGFu11MUoCokEeRZybBUDonCvf7B9yZrdxMtBkKECvliRsKocDp567syTzp83Kj578bF+U72cETDbhMGP59HUCUW3XDk5ZepFg4O3XDn5/z2yLKzPaKCSRayBeBID9FAwWxSQurTKtfNFXVP4Px9edtUF4y44o6zLAgYDidnmJEHqBcBkWPqJppS8IR0Li56E/65wWZOmxXmHL2WPa8sBAI4edPc8BOnNoIc7o7/f9ERN55p0MmGYNnh8KCs3/XwSAQqLYkyxAeg/mRmnT7sBFZ/WS7pkQpDtKYYA/PB1oI/4NZ4/v+tlxnEwdXzhHBalpzkz+JZaRggQlqzeHX/6XOXlymlnzrZPzjKG7CIALFm9+x/vV4UjHfScN0S2sSsK+Shm1LuIADB35km3XpW6NZWQn6h5A9q8/fCDWJBUCq+XlCfsGaaOL5wzcygowaCYdzYWfchLpGkSaa5Fg4PB3Gygs9hqhUQ81DdF/veJVTd8/5XH/1qx/pP6hGa7M4uuONQEQkTU03xaWBD4r2w/obAoVgdittx3+ZsXeHDJZ9u+f/y4x1MOuf9+w++X1FaEOzOwlL0o2BORdqUQ9WFuHCSYLGWEox3hSDuST8406oY5IZg6vihNmwEAF8wvW7pqtxHqjwU6t0p2E4sBY7WTd2mVAXHcSKSt/S+vfbptxz4RQEXzNTWi1MdoDgBA+UkDbr1qcvqSWf9JA7XlqKZmRZCbxk4cMRp0YOr4onQm7BmCgewL5o9a+tHucFsHCkcTxQeFcqApBKJeREDwbUl+mDtjKJMzIs1Hf9mY02BsANQ3RR7/c0UwkB0KZE+dUFg2bMC8mcOCgaxQICfFMicFwS/94J/OlatUSNcHWFj0GvzNedakqb7fqjl9Pss6eX+CtpwBm1/9bBMcX/6rpJfFHT34QdUL/9ibGVsOAMW5g4sC+RnJqgugZhZ8JglNBRE/+pgu1n3SECabncnJUTGdSRnXHpUNH5B+JLNs2IBgbnZrpAPIYVmCrtqDTIQrxadMgOFIx/Zd+4ry48UGmCIli56QRt5BWwDnACCbYvifP67avnO/sNamcgYAMO2VtKgYCuTccvWU9G05ANQ1hVFOu7K5CNUU6L56lDUHEDNSLwBQNmzglAlFS1btUrd8ohoeCwZA48zxMXVCYfC1rLAZZZFfwhFJK0KOXHTmgBOOtIej7XXvhsGBx/9cEQxmTx1fVD6820277JN0roNu0SDnQVT9WHtu0avwN+fHFRQ7gaBhztlS9uzyQ8nSwOZXP+s8eNzInzj95yX6ypFdH2x5/PHdW8OdGesh5ScOz1RWXUDacl0t0wTey+5TBfVNYe/gW5hPH6ry0dRxhenHk0OB7Avmlz321/XUBsSfmpVux9Yd++fOPClm1qgpUd36gXAXQNO3gACw/uN6PRefrHUTxnMIBXP+9eZZU5NcexUL9Y0Rr0zoEjz0GQ4iAGSkXgAgFMguP2nAko92mfbaG5IwW2yi4aSyYQOnji/6YNVu3T/iu+caI1pBSFFgBlRWYDjaEY52/KNx+2sAj/25oig/OG/msGkTCsuGD8iwXUdE9DiDwh1kzKLrOo5DHBJrzC16Gf7m/PjCoqxJ09rffk3eMU9YSRJ4cMlnlZXHDbnTKb7eiTtMxyO7sPnv25orHt+5d9vRfqmR86K8/7Dy7v/onAH597MsKul4dSNo3zup5e/dhHC0Q9GSY2AZRpR/jUKAUxx3ZJw4goFsNkXtOFJjo7bIy5HLhiUcAIx0NWkqVoXTcIew4NpHUcYqcQdAZ8A3c+M9cG69asq8WSdlxJSGox3g+521zpXuqfAqKx+egdgAQ9nwAcHc7HC0XePDjE10Iag4CAWyLzijbN3HdZ41dz7BaX/Hyj9jJxxpD0fat+3Y9xhAUX5o3qyT5s06qTxDdp01USp86WJ6k5Da8gY3LCx6DjE3ec0aWU5VaVb5wXifpSWCowfdnT+H+qec0OTjBn8JTvSM1MOVeGApHljS2rrpsSNnZNCWA0D5icOCPbKsHYCNGsWQK4bK4toB+WZV3YpwpF1YUyN+iyjmzr1Di/LhJ2ZqzXAwkF2cH6ptDKvBFwIikr3VdOrsGzqnix0/yOgNlVsiBrwOCY3I5erMuRIDL1lHmjtB3Rt5TJYDMG/W0AvO7HqtdYKobwqD/mUTpyvmD3wNqIM47eSuPzxJHOXDBwQD2a3aMgUR+5e//VhJfLXHvFknXfOlCb9/fp0ea+BNUB645zlvkME7FcLu0NONoK4x/PzfPn7+bx8X5Ye+dFb51AlF0yakKyUxIQ5kiG6w5AlqWFNu0auIac6zT5933EvPs4PPs8sP9k1kKXsiOLIbj+z+rPlVOKE/nNDPEcei44El7CLsZv0mOqHCHQiQyZ1c55fMDGX1jDlH1HSBuu8ZiDtihGKOwTKI+qawjEb7hA/VZupUWyEABHMzFr0sGhzkq5n1+yh3U0cxaaprdASobwoX5cfeCIELWo7E1TgSQel8dRCLsAgucnsvsgHJCrt2XS1gMXfmsNuumZopWw4A4UgHk4m2e48wkkhDCeQCHSgcHMhwSxGRJAAgH+4zv0c/xFf7xjIJJq750oRwpP35v31CQyYOcD+L+V1yISBoPcTrNsjXudBULTlOfWP498+tCwayp59cfM2XJqTs+giRyGahaKHYIJm4i2oBiB2cW/QiYprz4wuLck6ff/il59lS9uP6dbHjZtI4ehCOHsQj2tfkzJYv7SwKu5m05T0ZaQfgn/HIMQ4x40b4Vttppvu+ciGZI9FH4ggonoTG/8WyssxxhGpgDqDbBeLMmGN06OqDKLFcWguB+mRu5C3LSZ86AIC+BqukIPS1a6eWDx8Yj5XkgWSCFoDv1aenoKw4PE1GUZQfQlT+HolLEMoSrvk0QYQC2bddOw0Bnn/1ExllR8eRThMK54E/FRESpDLRJ4aQBl4AQOaGEI60v//RrrUb66adXPy9W08pKkhoXywdSD1yTRiO7jLyC8cac4teR7wT1bInTW1f+mrOjO1JLWVPBxUwcmlnUdjNymy20/LH91ykHbieBjI7SE+3NOxLdysAFPw4hBN5/pSZklyn87m5Hx8ox6COGDbHiGA4yu+JLx1E3xS6jXaIMYydE2gq2QgKX3BmWcZtueTT862dP8NmBDyTbCD91EqeAKotPBceqBpNJ2/Rv3bttFBu9v89t05IloVBmDFmd1yHTf5QL1PrS8i9UMmS4XfI3BBbo+3vf7gzHG3/3q2nlI8YlJxMWMuioSvRGpQPrJ0/x6SYnEwsLDIL/21kGLImTQ3dMuSEGLuyZxxL2wv/9+CQjNvyUFbuhcPP6KlIuxpS8i1b2K4kLg+sqjvCcvCf3enZczUoORE/gVAn/3hcvK4xk/Uu8+d6GdVf+o9bFoRElCOC5JZeqIKA3NsjZhqQCQSTaPAGCOs+rq9vTOiAwSSF4ssVZViUQDSXbtmqhFAE6V4Y1QHkZqphm1Ag+2vXTfv9Ly+cNqGIhF6QZ8hH6KQnqLpAyRVP4yqJqO6k3eQ/11TWfu+/3vngo13Jy0S0IRcB+P5CghF+h6dxaT1ZWPQa4plzJxg6YfIVGdl0vUssbS/8w+Ex9W7md227cPgZPbNVu4Ls4VS/ABB9jIDANyCTg7RusueMkNQ3yndA15VjIGo05CqxDPKjSLiuokXh5bBr5SjUKWoXWjYkf/CmAWr03Vj54JrK2l89tjKze5OFAlmCGBhlj1MKxAR210kG4WiHh6bvTyJJlOPTVDDt5OL/vufc7992avnwgXoBDZ8G9QtNCNQP1tw2ekeM2GsbWn/2Px8kbdGF3wkiH+nuoO4Ny0cWFr2LeMF2ADjuxHl44jxsfrVbmQgfP+gvR0Zmdik7Qw8PzQHU0MXs53J4QVc+0YBhd2oEqm7QFcQcsYO6iO8qnhyoa8jYeLS2MeyK0zb5Yiu+MI0uBHNkAqmJETEYjLv6TGYIxgWdcwWZnXqRn4auwqWohbId/ke88t7KncFAzn98Z35agiAIBnK4CXLAdeUaRYc0BbaZj+SNc7O1Oq1DBQ1sq24RQQleZpQzHYwJPT1pzqm311Ag+9qLT553yrCtO/c998rGbTv2ER+FngGDQibIT6+PvdacXhPw3FojR3737Nry4QOLE55Hj1VAEnpX6/Qc4bEmmLmFRXegC3MOJ/R3iq7HA0vg6MFu4iDsZv0mPGR9Z3KTWwmiF4bmYqgV+3EPsgJQXBCKGaJVJ0Hx30o/ZXYUiFDHgtUIwL5NUrFTEllloEucAeJ8RszHTq6c9Jabj8qhE9X0qF5z5FPq5lDj6RMreX/lztHDB1x3ycTkyh4XCMhOoBGrE6ljJ2aJHRUwAYDWjI7OaxvDchSLoAou/RwlBrme0/g+I1UUF4SKC0JnnDKsrjH8/oc7t+7Yt3ZjXX1j2FiHySNFaNSiRj/WNfcSEQBga3XLr36/4j++e0aiH6bHKCCqv2im7a4Im4VFQujKnHfzAF0uZe+OzHthaM6ApH+bH85q62e0NN2mCYryQ7UNrZ6BDVsMh7p+VouUWiNH1nxcd1HB6PQZWPtxLVF4DtKPhs1Sy5G7A4DTJxTHyxepciUKln6Ph0DFi4AOOKNHDNpa3Sxu+nx2xIbthikLR4787k9riwvy5p86LGkReFBcEFLhYHD4gZvSHyFGw9HXs7dG2tdsrLtoQQbqBQDqGltr61tlXAPkUkT9G0LeVsAj8EyguCD05UsmAkBdY7iuMbzu47r3Vu4MRzrqGls5DwY1LWTBXUPHId/AsVQO9RoBANZU1r2/clciohMBi+RgR+cWvYuuzTmc0N8Zekc3DdCX5Zy39OBnGV/+xnBN+YU9PzQHoQscx0EfrefrwHevFigfPnBNZa1nYCPihDIyjRpzCFCfiXh7ONq+tbqFaDqNuh9Ugi4i7TEVqEHC8J7wuotPfuB3K8RcuDeZt9rEyDjcfv/vlgcD2dMnxvUzEsPoEQPrGlpV/hijcaiwArJ93bdWt0CGzPnajXWUhNkGXM2YslYtYx8ZBxuvT59YfN3FJ4ejHVt3tGyt3vf+hzvCkQ4W3eEdCsX2gi4guLFOMHJdV3LLmA9H2v/2zpYzThuW2s5xsrE5dOdB8ajLTQYtLLob8ZbCqUT95x035I6M017aXvj4/j7dZMunDR4/v7THto7xgRZyRz4QNu6r0UN3humCAX5IpVp4B2pFD1+bRs/hFFi9sbYu7RXdayvrWiMdfguaukZxnA1kwD83SIDE9InFP//emaFAtnoLEmWstqH1d8+uSV8sACDWgpn8xyqCvP/eyh0ZYWDtxtrahnCcwhoyBiKlbnVBQ8Gc4oLQGacO//pXpj9+38WP33/xz7935pcvmVhcEARQ8hGOl2DMNZgHeoe9taW6JZFFIfwdT4bqKe81YmFgessDLSwygoTMOQAcN/TOxA9QSQR8KXt7pnenAQAWZh8xvye3jqEg/d+RuoQrR2G/NQWtluJ2C0aPHCS2a9W0Gx1hoYxck5tbq1q2VqW78Oq9lTvZGJQUWcTJkTg69B8AIEyfWBwKJjCKklwz70RYGrnI2YcQwPSJRfNPHa7uuyhz4HnqzNDX12yo/cmv3kt/oXteMMcjB1o7GlFakLqG8Ktvb0mTOgC8+tbWuoZWzSAJWqhuatRJo+0hMNN+0YLRP/j66X944JL//dnCL182MRTI8XqfnDv9jiwOAABCa7j9vZU7E6GrRGL+03J1XVd2JmvQLXoXiZpzFnLP1Edr247m/eHwmO5Yys5w4fAz5pXM7KbMu4RSeUrdqA4vDbuRpvv4GTNyUFCORA2+2NjcFf809Qit4SOvvrMlnTVx763cuaaylo9jSIhAWg3gIQqdtIsIWFyQ19WmqsRVIjZQypj/NF0YBIBQMOeHXz99+qRikYvkjQzpWFbkpyM8sjUban7ywHspi4Vh9IiBRfkhWh2+43KP1UJEfPXtzWkucVdVQ2w5Lbe0ZnqrYfWV/D4ymUBxQeiM04b/8Ouz//rbq75y6URVn6S2jTuyOLJodY2tXTdp0lFNY260NdDTWFj0HhI25wDHDb7YGZqBkHvYzfpD29jus+XTBo/vnRVwEqrD+yoFaoUMG9ctKC4IjR4xyBitKmqUrDYaQwBYXVmb4GjGi3Ck/bdPr65raJVKD0AygIiALrgophvEXxlCPfPU4V2MzqVTwBaHyxE2GWoTxYuAwOYUGELBnG9cPyMYyObEUbgVklVXVRfj3HVVmtWVtc8uqkxNMgzFhXnKoRE14olceCwUAiLUNoR/+/TqlD2tusbwb59eXdvQqvsM0rEivoQkqh6JzYhiIxxpZ+vakv2XqOgKQj/8xuz//Y+FIfG9XwwvyHuNW6paPOevm/A43N68wIdogtxbWHQPElgKR3D8kDs/C29MZ5U7P2HlaOa3zGQIZeVeO/qC3gqzM8iuLVfDobmcXX7R7L+KJ+MYPXLgeyuqOXv6xp0G5AlXLqLjQDh85L5HlxUXhGZMKkmKYjjSft9vl2+pama5IqGoqb0Y5Q8F+hQVdvGJMNe5Kk+H/AZE7YM3EInlIWkAMH1iyTeun3Hfo8toLvzS5Tf4kmn5+ZxYlR8OH3n0mdWhYM7F546Jz2csFBeExowcJGciQPo6QNdYie/nqfvlACCsrqx99OnV/3b7nGTphiPt9z2yTFQNoyJOt9NNEiKSnYoBQJwa5N0iWEddQ/jOn71eJ87QIxmKTEjRUK3EhBd/f82YkYl+s3rmaSPeO33nq29uZo2IL8PXF3XKrxokH63hhHwg1A8somAU6Kf5stVZWPQikhidA6Qdcj+h/x/aRnfHruwS351689T88d2UeUIg4TdX22hMi9iJNPKiewN1l5wzprggjwwplI72iSbqjHHtn0xoNxxpv+/R5e8t36GP+PSopA9p9e+ic0eXJLLjhw/ndKBJh1DKzaK4+JwxZ5w2wpSMGJXy6LoKtWjh+9Zw+72PLn1vxY7EJWNg+sQStRudq/iTzAB4CigYaA23v/Lm5rvvX5zUhj9rKmvuuf/dd1fs4BsPu7KGQPGgdu4zm6UUpPi80R+hYDbPiM7joIrM0FYhbiAAvrc8OWGOHjEI6aw+8JkaGYBSDItAQ2v4SAIZo/gfCZqIViuZNhuNtecWvYokzTlb5T7u8dQs+tJon9c7hnafLZ9XMmPa4PG9GWYHUP3ca68ApF6QO7zKHVi7VRcUF+aNHjEQKSeIrqtNlxt2T6oq18XNVc03f+elR55a1WV0NxxpX1NZe+dP//HKm5taw0fAo7VVtrEpIuL0SYmsg+OZmBYbQc8NkMgYdQMVCub82+2zx4wcKBJoWRnT6OJCBb5bw+2PPrUq5R30zjx9eHFhnowzIG8aWikIwGCnNdL+ypub77r/nTWVtV3SCkfaX3lr8yNPrl68vJpYJOUrSB7A9IQMHrihjEOL1Z0uKo/vBeRCHGrw7orqpGYQQsFs/i71t1zieLGfIJ0VaI20d93VaIYov/sgJTJ+ijvWoFv0IpI25wBw3InznKLrk32LLWXvPls+bfD4r024uiiQ3035JwgVE6VdnYy3uHLRtU8PaIFLzh2bF8xR4yNxX0ZTlbth2A0AQGyNtD/zYuUdP/nHM4s21PpZr9qG8JrKmnsfWXbnPa+trqghKluaJmW0yPAJ1CMxxJoxqWTsyATqkRgeJko1nCQmij/SvBYtm5LCvNtvmCUtEPE/ZC0q3kyrhrB5e/Nd972T2jR2SWHemJGDZOayWThA6kmzHsLOgOJtTUXtHfe8dudP/rFmQ623asKR9tqG8NOLNtz7yLL7Hl66ZkONnhs1sLKwmoPll8yUoYFQMOeSc8YYb6FfPqJ9sALhlu3Njzy1OnEBrtlQIxoPzU1aY1Ds0rhHl/kSV1BWPBnqS9OtyoUJ5mxh0W1Ibu5cvNT/+BE//ezInsQn0Stw5B8OD+m+5W+fhylzCWkOjA3hAMVWz4ggTpuUE2/drQlmTC6ZMalk8XI+gy4nZDHGUaRkRlBa9CNrNtSs3lDz9IsbxowcPKaMz3GGI+219eFw9MiWqhayBSnKdx2Sj6nxtMLzTWcvOXdscVcT5+J1mp1Q2S6S7UNE/nIXdr9szpw94itVkx55cpUqPAgfxxF+jroWDDsACI7jrK6ouevexb/40dkJfVmn45Jzx67eUBOOtKOiyE7NEYXylJlsFMf/tkbaFy+rXry8uqQgr6QwVFKUV1yY1xpuj0TaaxtbW8PtW6pb/OeBvZl7f4i35DG/6K1HD0LBnFAgh25Jq+cm91kST5EP+V9+Y1NxQeiGKybHzx8A3l1evbqiVlY7Zch7D4Ef5zdzcmmXOZPoA69p5OID2hp0cnYbGYteRkrmHABO6H/c8J98Fq6EI7u6TBt2s/58ZOS2o31TpNUVQlm5vT9lTiGikWLRGd0KHJSe4CMI/vTd5Tv4qii1Hs0H/stziG6ZObn0rNkjvHaFLdpaXVHTGjnCOEG2y5jiQcsO9Z/sgq0Dq61vra0/9O7yag8vpgMjrrT7KNaX8e1UHVA6HuCs2SNnJKBwRVbSBIojOsTqKsW3XBxleFg6brhi8paq5sXLqh2Hr4PjTAqPSxeT2AhW2KHVG/Y+/WLFN286JTHOFWZMLhk9ctDqihqer9wsXSwQox+FcYOKfAdTdeiMYK+m/lBtwyGsUInpbmVqBSaVuefMGm6dpCRRteDEDdaZs0c89ULFofARyYCx2E7eVK3HcQCwNXzkkSc+Wl1Rc8MVk2dO8W8J4Uj76oqaR55cVVN/qEtOpBfCKCXicrGRNuHN6zDwn0S81ppb9DJSNecATmjSceW/cjfdGn/zV76U3R0I0JYyrfiYVzJzXklvbgBngIYPyV/wqAPt5ubtTZu3N8m7Tqpf9iLCjMmlvjpr5uTSGZOKFy/fobsUvh8R+2gucuVbOu9bMe9T+YhRGQBAXjD7rNkjShIcmlPrIq58Bv/kVhyRhoI5118xeXVFjRxQ6pVIXkdw5OFzwp9pDbc/9deKUKDPDVdOTpB5SfeGKyZv2dbcGm03OOT5g3KolC10ERzhXgk/izsxYrt15t7wODPf0VwcZ6edc4Po+ixV55krf0IykdBn5yWFeZecN/aRJz4S1Uu8D0qF7wjP+OCPWsPt7y6vXl1RM3NyycwppTMnl4ZCvD2Hw+1bqlpWb6h5d1l1a7RdNWTq6Dp+Z9cI0sWFoQQaGPL/aTw7pkviOEj30/eUzsKiJ5G6OQeA4wZfDOWH3E23xEogT1gJu91ny2dcO/rCz48tBwA+acfHvqD1cF3RiKc0GR3ymYN7kkbXGqbx99cpoWDO9VdOWV1RywbohAOfszi1AinO+ADPIa/QMrBDV8X9rhk2infJeWPPmj3Cl3kvUI0WHXKlHVupRu2UyRjymTm59Bc/XnDXL95pjRwBD+uOFI4D8rtrMSx2ELE10v7wEx8WF4bOnjMywSJIujOmlCxeVu19JMysXyDX4ysSVuWAWIiFhoPZAF3miFJIWnlBpRTZktcTsVuXLhz38hubatm+9PJNIUQxuRAjH4TWyBE2gwAAeYEccPTT5FCrEpWbWgyCKiW5mDEpodgPc37UeX0AAEjbGS8RYSNWRM3ComeQylI47f3BFzlFN8R6urSjqFs/SyvvP+xrE67+nEyZS6AYEogVMsy+s1ilWFGjtoPW1wmJtTrIXyd3kC6/ESuKWOauuhNfzzKLpXKTuYtrybTKHFWReFqNM/kW54TcJ+uTFC2NYS4uBEA4c87IS88bl9T0sxKaGMhK2TGq2u6thNs48jlz9git1PoFqztJlUqDjdF/+dASbsASRiiYc8OVU7x7vlJJKuNtNg71k7CKBvP6anntEQCg/Mqe3heJ5ZdfrsZG1+UqKcy7dOE4UT2UHLpk/T7tHgb/8q3WSPsh/qEEkBdFbvKTUDDf1aQEMHNK6dhRCR3LhOR/PFuQrZp8mKGSoaomC4veQLrmHE7of3z5fzuDL/Y+Wdpe+Ie20d1nyz9Xy98oNA2r+jw5tkEpKmI92V+XmncAkAaS2H1qHIlaEUamC1U7Y0rpjVdOMd/1fpKFxvfHfgk8AKpvgbDt+aQMpFvjIiKGgjk3XjFlTFkSJ+CpDF0iDckkQiw+4+QZCuZ866unzJhcGrOEXRGoqTv0o1+8laxFnzm59Js3nRJHsLyYSqAIOg8xSyueQjyh0FaovRWTRGKG69KF48aMGmwQ9XNZfIrmywx9XWMkRgGNm5eeN66kKK9Ltn3KDupCJDKIJuTiWFh0H9I258CXxUGfYfQeP2HFzc1A/n5gy996cWP2+PCqLVQWXAxPXTVo4DNwYozEUlI9wt9V4xsyQmJ/XQBXDp/jIS+Y882vnsIDwjQHENd6BogeBpA+IkNDUCXS2PbmjOzsCj7iCYVy7rpzXqx1T/Egt3hDVXZEMX9MONEkGRclhXl3fPWUEBsrg6am0bAopKJp/qvW7f3Fbz5I9tO1S88fd/ackUBEKpsNkvyJ2fNxrIAOT33sJfrlYGQu8xHVSgprGtEEhHnXnfNCQWMrVnoR34VBIwGtBd8EcTBzSmnibSzBPA1GkqpxC4vMIhPmXCyLk3vLhI8f9JcjI7vvszQAmJo//nO1/E0hQeVClJIyDH6vJpthIjzmBXPuumP+zCldjkFZhvEeiQgpGOagC175AiIHEfNCOXfdMT/Z+WYuah8jJLjS7wOJc3SZ8cwppXd89VSUdaLiDSIrXdoIqFl0hHeWVv2/33yQVGnygjnfuvnU4sKQMJskhCvzRxnTkVxojp3kgZ7tqZJR2QEA4tlzRwJIuZEnYkKBxoEkUzJZIpg5pfSuO+dpLQUk29Jh8fmHsrAkgWJMJjDcFykYPbdQMOfSheMTGZrH4seHN+V7+fjBFhY9jMyYcwA4bvDFxw3/CbDlbweHrO9MdOPlFDCvZMbXJlz9ebTlDH5dHf1UAGoxPVNTsGtX2RQ6GtautTFTgsOmorx77zp35pQhalyriCqKlE+IQY74Jua7JDcyEGQGCgEQQ8Gcu+6Yv2COz5d1CUlaxtn91yJopEHZu65x6fnjzpozUi8XGkYCudkUBoUSQli8ZPtTf12fVHHGlg2+7+7zSorySIai3qVbQT0V2l54QwH5hPogPBnZ2BURQ6GcyxaOKykM8aK5Pl6AeUeWOhnbdfbcUXd9e75i3rsjIKVIJYr6WX96bShPi+bmyu6kvKFQMOfuO89YMCfRVZZgZGtcy1+CSeXvWVj0HjJmzgHguOIbogW3sKXsGczWQCgr93O4/E2D3uepKdbuq9EX1wSx9BtV54aNIlRIYCAxNkuK8h6996IbrpoiGJREAcgd0J+iQQ6kHeOaDcwi0EEYAl9RhYA4piz/vrvPXTB3RCjUJzVB+4zw5AUioAOmrAASE09eMOeeb58xtmwwiAE3NZEorQao8gJQGWJruP3Bx1cuXlqVVJFmTi299+7zhIlFBHANzoWwiROGslCq+oVDRWuHpwAAhLxgn7vvnD9rSinKokn5UTGKC2UeyZg5QeQFcy67YPzd/3oGZR5A5inSUU5RFUFxpYlBtlPxF8yCsp95geybrp6SXDMzsuVeAmnjoPiU9xNtWxYW3YNMmnM4oX/b8J839FvYrcvfvjv15qJAEgumeh5an0cxcvLTBcpAAKDrkkfSLBraCrVXZDKl8pLTJ3nBnDtvPe2OW04LBXOk1QMy0CQUqRUBdZOO3pTfYpp/ZgClgELBnLPnjrr72/POnjsqVVtOh/5EvGq9mHeEpRIngpKivDtuOTUUzOHfbJPsAMzxGyCi6xolP9R65P/9+v1V6/cmVaxZU0vvu2dhaVGe4YtIOrHKRkuIMauBy/+ub89fMHdkKNTH8BF9RKYXn5c9uaqCvGDOTVdPfeaRq1i5CKtq2T16ygsergxu9X8ArlpMym7mBXNuvHrKTVdNTaqZGX2AL9EgxQdEcBX/7D49rM/CoueRUXMOUBTIv238laGs7loBd+HwMz6nU+YCYowmvXc+T8xihjyF1ErKwpE0TBeJo1lEEJWoErqlCDOwUrMkN2oC4Bb91Efvu/iUqaVKdytPQ3zrxdmSd4XNoASFN2Dqe2n+XETE0qLQnbeeev89586aOiRJZk0o86qpWsGksN3UDCVliGZNGXLj1dPod4Bck3vucBLGT4C9dYcefGxlbQKbl2l0p5b+9t6Lz55bRi0XcLPqZ8jMf2aTIexhSVHo7n+dfw6z5UA8sxj/zMKKb/9SwClThzz7yNWXXTDBsMI+ZloRVZYd/EtEXgf6FEsK8+7+1/k3Xz0tWZcRgZJG4R2JbsC7gsm/hUXvIsPmHACm5U+4bcLVGc8W2I4x5Rd8nm05AMiAm1IFQg8AGDqLmEyRUryvLhw9N3KEJcmNkktVzz563yV33nYan7jVfAihtADRdaXHAlS7ycM9+Q9N7UnHpqQo76arp/32/ktvSl7D+gia/6GCVY6GsvPSjiWvdPNCOTdfPfXseaNk3ESTifFTGluRkjlnH63b85//8144oXM5FcaW59//k/PuvO30vFAOzU1aNtMCewIj7NoVY0d2/5Sppff/ZOHlF0yQ8hf8xnBJqBjpzaQKQ1BalHfPv57xuwe4+6gbbeqgSSPpyPbtksZm9iW91KFgzoJ5Zff/VCtpEiAlpj6Eq7YxUP3W9DgsLHoJae0KFwsXDp+/vunTD2qTOBmpS7Ap814/MC0hCAsut5gkR1f4QGwUB0J1qYlFB8AVm4YbZ6LEOvAhRXsOkBfK+fatp11+wfgn/7zu7SXba+paAegWWzKQQApCWWC62AFaAsY/AAwpzlswr/yyCyaMK8/cRImyzpQ3fZM9ed+RFjlpi37T1dM+WrtHHazpAMgNUFHsA4oyaqITBQCAt5dU4c/f+L8HLk2W9LdvPe2cuaP++Od17yzZ3hpuBwBl4Xy2TJWkmScozr4BAMTSorybr51+xQXjTfOGorWy5C7Z8ozvEIjijDdUW5SnMRrNC+UsmFs2a8rQVev3PPH8uo/W75XSIxvkA6fuulzC2t75bMtYygOv9VBen3Fl+ZdfOGHBvFF5abiMKOpaeqmgNW6Q2+XJoxkQSZVbWPQ4usWch7IC351y07aDO+uizRnK8BiYMpeQg0C5J6TSOuqoL3lPUwq6knJQ6jWPnRb3kd7x2Xo7SZQW9bvnO2fedM20zduannh+bU19a03dIZV5XCCQI8cAHICS4n6lRf1mTRuyYF7ZuPJucMU8RkWKEoTiJw/kdqXJyeiUaUMe+Nn5//L9l7iGJ3kwLc5p6dlLaTBRfLR2zxPPr7352ulJkQaAseX5P/nOmZdfMP6dJVWL/vHJoUNH+FFkLmlNIBuQODoF+Aal/UI5eaE+C+aWXf6lCb5VIMMqqjHJnOUxM6z1kb1g0x+G5oVyFswrmzV16Kp1ez5av/edD7bvrTvEt6cV9pFNWnNexF700sGUOyYDQL9Qdl6wz4J5ZefMHzWuPD/d2I+KEGh3jUTqwpEOrx2dW/QausWcA0BRIP87k2/++eqHw50Z2K398/uVuR9mTi1N/BCR+KDHYdHbcbRGSVFe+jqltKhfaVG/BfPKauoPfbRuz+ZtzR+u2xMJHzkUaW9tjbc7Sigvp18wBwBmThs6rjyf/UtnkBQHJUV5vrPvXs8j/UHTrKlD7rzt9FXr9vg+9c1f3pQXH67bO7Y8/5RpQ5OlnhfKOWXa0FOmDb352mnvfFD16bbG1ev2HIq0t7bSvfeFm4EAAKXFeQAwa9rQU6cNmTVtaGlRv1iZnzJtSE1dnlEKGYbwloKhJHaGyRZtwfyyBfPLbr522qatTZu2Nb79QVU4cqQ13M6jEYAqhk29YYSS4n4AEAr2OWXa0FOmDSkt7pcpl7G0uN8p04aAXnwCfhyD8XRIcWZkYmGRGrrxjN5wZ/R/1j/52q7308ynvP+wn8361uf6y7QvBmrqD7WG22vqDtXUH2oNHwGAmvpWpsrygn1Ki/vlBXNKi/sBQAoWyyIp1NQdao2019Qd2rStEQBaw+2t4SMATl4oZ/zo/FCwT14op/scqe6GLJ1saaKAAAClxf1Ki/rlhfrkhXJKi/qVWiNqYQEA3WrOAaA+2vT95fdvO7gr5RxYmP3CYWdkjikLCwsLC4t/NmR+ZTtFUSD/tvFXpfPd2rzSmZ/bjdktLCwsLCw+J+hecw4A0wrGzyuZldq7xbn515Z/zs4yt7CwsLCw+Pyh2815KCvwtQkpbixz28lXHiur2S0sLCwsLHoR3W7OAaAokH9N+YXJvjVt8Phpg8fbobmFhYWFhUWX6AlzDgBfGj4/qaXpoazcC0fMPzY2jbGwsLCwsOht9JA5LwrkX1t+QeLp55XOnDZ4fPfxY2FhYWFh8c+EHjLnADCvdGZxbqKj7fklM+3Q3MLCwsLCIkH0nDkPZQUuGD4/kZTTBo+3m8ZYWFhYWFgkjp4z5wDwpeHzExmg21lzCwsLCwuLpNCj5rwokN/lAL28/zA7a25hYWFhYZEUetScA8C0/PHxv0Gflj8+mG0/TrOwsLCwsEgCPW3Oy08cFsoKxklwDJ2cZmFhYWFh8TlBT5vz+Avipg0eX2y3gbOwsLCwsEgSPW3OIW68vfzEYTbSbmFhYWFhkSx6wZzHibdPy7e7ulpYWFhYWCSNXjDnseLt5f2H2c/NLSwsLCwsUkAvmHOIEW+3a9otLCwsLCxSQ++Y8/ITh03Ln0DvhLJyLxx+ho20W1hYWFhYpIDeMeehrMA15efL0Hpxbv53p95sjza3sLCwsLBIDQ4i9hbt+mhTXbS5Ptpc3v+komC+HZpbWFhYWFikht405xYWFhYWFhYZQe8E2y0sLCwsLCwyCGvOLSwsLCwsjnlYc25hYWFhYXHMw5pzCwsLCwuLYx7WnFtYWFhYWBzzsObcwsLCwsLimIc15xYWFhYWFsc8rDm3sLCwsLA45mHNuYWFhYWFxTEPa84tLCwsLCyOeVhzbmFhYWFhcczDmnMLCwsLC4tjHtacW1hYWFhYHPOw5tzCwsLCwuKYhzXnFhYWFhYWxzysObewsLCwsDjmYc25hYWFhYXFMQ9rzi0sLCwsLI55WHNuYWFhYWFxzMOacwsLCwsLi2Me1pxbWFhYWFgc87Dm3MLCwsLC4piHNecWFhYWFhbHPKw5t7CwsLCwOOZhzbmFhYWFhcUxD2vOLSwsLCwsjnlYc25hYWFhYXHMw5pzCwsLCwuLYx7WnFtYWFhYWBzzsObcwsLCwsLimIc15xYWFhYWFsc8rDm3sLCwsLA45mHNuYWFhYWFxTEPa84tLCwsLCyOeZzQ2wxYWFhYWFj0GqJHju6qD2/asb/54OGmA4cdBwJ9ThjUv++4EQPGDx8Q6HPMWEkHEXubBwsLCwsLi55G9MjRF96tWrOpsfngYQAHAAEcQAQHAAAQAn2z5k0tOf+0k/JP7NvLvCYAa84tLCwsLL5wWLOp8bWVuzft2N9lysH9+/7wK1OGFed1Kz/RI0fbjnTurGvdXR9uOnA4eriz+dDhaNvR5oOHZZrxIwb8+60zY+VwzIQRLCwsLCwsMoLVmxofeeHjtiOdxnDW4WN0AD5UBwBoPtD2s8dW//D6qeNHDMg4J00HDu+qb920Y//qTY1NBw47hK5kQ/DWBaw5t7CwsLD4AmFXffiRFzZGDx8VN6QBZcFqZkAdIGH36OGO+55e96tvz85g1L3pwOHXV+xa/Wlj0wE1/kb+l9p0fo0A6MaLpltzbmFhYWHxBcJf39kWaeukdxw17SztJdKfjgPRw533Pb32v789J30Gmg4c/sfyne+vq40e7oydilpuZKP2+HPj1pxbWFhYWHxRsKuuddWnjcx6O44D3I476g4BvwkOS7SrLrz604aZ4wvTYWD1p40P/bWy7XAnMFooAgHggGSH8wYIyOL/6DhdGHNrzi0sLCwsvjj4+/Kd6CI44IDDLgCUETXXhrOl7nKg7MKqTxtTNufRI0dfW7bjL+9sF7mJWL4roukuAIBiiYf+ERyROK5Ft9vIWFhYWFh8UdC0vw0R0UUXXWTjXxcZAIFfufw+AKibiAi46uOG1OhGjxz9y9vb/vz2NnQRkU+PSxZ49jo1BJYQ2DNEj7eho9dG500H2nzv55+Y28OcWFhYWFh8QdC0X6w7k2Nf45o9ZMbVYz7jznbHw5/f2vrasp1a7ualxoC6Z17ERA+Z86YDbdHDRz+pbmnef7jpwOGdta3sfvRIh1xeGOibFeiTBQCBvicMHtB3eHG/4cV5+QP6Di/u1zNMWlgcQ4geORo93JHCi9ZjtvgiQ46DAQDIZ2mx4DgZ2J3lvTV7/750R/q59dpSOKZuVn3csOqThqb9h9lw3AGHfAmgIdLWEWnj6mlH7SEZ0xhe0m94cd6sCYUTRg06hvbbs7DoVuysPfTgnzfwTawMSB1FlZW4/vHNM4aXJLEhhvUbLP6pQFaso1gxDgCO17I7IvZNEgT6Jm2Dmg60/fmtbSxzl6+tU7w4+l8vpw5JGd/56Bbr2HigjVnxXbWtkcOdIMQC2lQ+W7BnfiNPtRD7u6Pm0I6aQ++u3hvsmzVrQuHMkwtPmZDWwkILi38KYOO+Nj+7TWFoCQRwko0Wrvq4/jfPV2hZ8c9xfYg64KDYKfOxn5ydP8BadIvPF/IH9G3cF+U/HAdluN07YjdWxSGAA4OTd1Iff/lTRRHY2jq2lazjsGC7wzNHIM4FX3FPTGYPj84b97e9tnTnu6v3cJUheEKHc8o9EzpR4fCCie8FHDmbYHAeaet4d/Wed1fvGV7S79rzRs+yRt3iCw45bhB6QHfk2aWakBOmOLlYH1+NIzSc/DrX0RUgSyEyxy53sLKw6BXMHF+4cXsL/4HSbpMGK5q1j7uKMGHkwKTI7aht/ejjekqCehDc93URuImUhIgN1273yOi8cX/b35fseHfNHjEXjvqn+URqUh8AKN8DXaVt+APutuihEAcAdtQc+q8/rB5e0u/ac0efcrI16hZfSJBlruyDWW19jeN4hxupTtmhcMU1/UY6Z7wFPBYWnyucNXPI829u8cSofBosueWwsHygb9ZF80YkRe7vS6pZxxSWz0Fp+4CaRfQG25NFBsx59HDn829ufXf1nkhbp/4Jfvx1egAAiEhe4UpDfluvFVI4BDwBws6ag//1+KoRJf3uvnWmjelZfAGheepa5Es7Wyn9pTxia0kjFzLo73qLCwuLzwUCfbPOmjnk1Q92xE1Fp61BesNnzRySlK2JHu7cuL1ZBJu17kqjaXIyWrf0xsoXgO4ena/aWP/qkh0fVzXL4TQRAfkknhcAPHccL3voGUiI0LtDEvA7O2oP3fIf71w0b8Rtl52cZlksLI4hiG7ikP7hyBUqcoMKkOPqBBbxxiWkfjpy4o9PpRHt5O3lFhafM9x66ckfb99XXXPQa5wYSKdSDXlC2aBrzxuTFKEdNYca97XJTDxzyLLraO6yDFkbnHSJ1M159HDn3z6ofuWDahG1UHE+mcZRjFL4lIeC3PEfDXjvvPpB9Ucb639x5+wCO0y3+MIAXeBfijDIfaO8S2C1OfTkCSEJqzvcBZcTf+Dy+2JzK57QDtctPre469aZ//XYqh01h/SZKHoQC4DcXRXglIlFt112cqBvVlJUFq/aTRaN+YSwUBuI69T59JkTyD2hYECAkR5R0i8OuRTNefRw56+fXf/RxjpyzxsfEAFzrV87+k51jur1Dt1tj67pIQkMcZA7jfuid977/nXnj7l4/sjUCmVhcezB+IQW5ecivGfpA+aUBujkO12RubbzhcOeoOy6irSFxecTBQNyf3nn7Fffr/7TG5tJhNszgHQg0OeEiWWDvvPlqcnacgBo3H8Y5alsvoeh8Q+3xeicmPVgnxNOLht09qyTTplYlCC5VMx5477ofz22qrrmkGCIejemBVfzdjKZMWpQCwLQ7z7xk1w01JGjTyVE2jp+/+LGSFvHl88fm0K5LCyOIaBmymVXcciQmQzVAcgkVQoWHfjUGIBnEk0PBho8WVh8XhHom3Xd+WPOOmXoux/t/nBjfeO+aPRwp1i85QRyswJ9s049uejUScUnlw1KIf/o4c6PtzUjojE25e4vIO2c2h2EQN/s73x52imTEjXkDEmb843bW379zNqm/W3I3HAR5HfIB2bSy3EcQOS/HFEo8kgkViXki+NYcE9O0UmJaNE8Tt3hr4gnz72+GQCsRbf4pwciejaZYlE9sf0zgG5VU7SwsQjFSp4eNQuLnkPBgNzrzh973fljG/dFI4ePth3uZIeY5Q/oG8zNTmFELhFp60Bp/wAA+eeb1P01N3gVy99vu/zkZG05JGvON25v+fXTaxv3twlWUMycaYNu9ckcGV6bo3ItDdA/xgtsVQ9S1SRXt4tbrouOchjgT69Zi27xBYD4Vk0Et7nqQHZelEjiiCi7OGwxBULIXWdFCLibzr/hsZF1i2MbBQMDBRnNkEXaZR8B8HdwZQ+Sn6OPHNJ/wSknpUAxCXPeuC/6P0+vadzX5tAJ70xH1tiIn5cQ/aTgE5lntzWH4dm/bwKEL19gLbrFPyvUZDWA6AB0jybH9JDB000SIuPZ0sLnpAq6d3OKK+gtLP6pEGnrAD47pXZVQtJfxb6oZBLaAUA4e1YqthwSN+fRts7//N1HjS1thLy2XM3gj17ocwbaKzSx/CkVQyKKBwEdfT8dmfmzr23KH5C74NQURWNh8bkGSgtOPlfVvjYXCRx2rnOqm8nQYxlp1xWEVHRA67J2vG7xhUa0rUPb6EmADIHVEjMapk55G5WEzHm0rfNXT6+p2ntA3TK2oPLwZ1wYk3jGPJzXbCelcTxf1qvgwX8/tWZi+eCCgfbrNYt/RjAN4L/4jNxlA2iXhOBTIgQ8jA/SQQfx2Zr2ZZyPBrOw+MIBUex6JpeeONSnRsdx+AwWunKTV8eBwlQNVkLm/O0Pd63cUAd0OYy5WzPovVdtTsWZ1pfSGBtTeFbZaK8b3+R1tVcF6q/gD/5nyaN3nx3MTX1FQ+Lg++wjyOUFcgsP5lIUDAr0ABvpoLGFHxXQuC9KvwMM5GYF+2YHc7MDPSLJHkO0rVOe48dazbFSRnLUUzLvpEaLOt/69Jfxk8FRvbWXwdpz5HBntE07FC6Qmx3sm3Ws1HWCkJ1X4nOrcES9dETbOo3pmYKBAfgcc540iDON9Fs1h+/cINeIy+Qpt8muzXn13oPPvPYpUG40G4q69SRfxyD/sAVRrs/h4bhA4IRg32wAKBgYCOZmBfpmNe1vQ8Sm/W3hts5otAPEsSyqnGrDK8qDPiBQFh954NGBxpbI7/664fs3zUhNQPERbets2BfZuK1lx96D1XsPRQ53RA53RKKdikESgAzmZgVzswsG5k4szx85pP/E8sE942TEh16Eg5HDnZE21sd8UDAoEOybVTAwd+Lo/JGl/UYMObH7ihBt61yxodbTtHRnDzwOHsCk0YOZRoiFxpboysq6xpZo5bZmtgkSKzICFA4KAECgb1bBoNxJ5fkjSvuN7M4ypgv0lweI6J2jpfVemVi5oTZyuNPwzD/e2iyz8ghbA1meiiy3QG626XvrL582uSSz4o20dTbui2zc2lJdc7B678FIW2f0cEekrdPLtgOQPygQ7JtVOCh3Ynn3tufKrc3kFK/YzRhMEZ9z2rA42bLCrtxQ17ivrXrvwUhbBzhOtK0j0tYZzD0h0DcHAAsHBQoGBiaOHjyytN/IISd2R+kSAWW1cmsTOE5jSwTIURyk3Fg4KIiAhQMCE0fnjxjSf1KmVWVjS7RyW5OyZP5t2mdiKZZuibR1rtxQS14EAGfjtmZt4IoO/UFC1sYsNK7cUBvom624FaNExuqlZ5XHkkYXuzlH2jr//dEVG7c1m+VE4Lu+SI0iMhRahEzjiZ+FgwITR+ePHNL/tEnFsfzixpZow762jduaP6yordp7QHoAIiuipdikoBKEvOPTM352++mnTy6JU9KkEGnrrN578MMNtSs21DbuayOKk3ArPrOTNWic9R7MzZpYnn/OacN7xa5H2zqrVBFIcwEfT4RIldYFFAwMjBzSb8GpwyeNzs94ERpbotf/+B9mT/MaKM9Hnd+/aaavEmxsia7cULdiQ+2OmgORtk71ulfNywcIBYMCk0YPvvSssl5Uhb6o3Nr0w/9eoh1TBB4z7hfzeuD7Z0waPdg3zx/86v3Krc1GepJD3LPVjQSG0QKhMfQcfvX9MybGYCYpiC5Zs3xDXZNnkOrh2X+LeebDnTq59PQpxemzRPGrJ9a8vXJnCi++/dhVvvcbW6Ivv7tt+YbappY2eZNqYh9bBDBiyImnTS4+5/RhhXH93QxCqsrlG2ooqxK+0VfQrwO5WZPKBy84bfjpUzKjwyu3Nv3gVx8AAIizVXzF5eXq+zfH1C1f+fE/jLixb56xQGmBn48nbz5z7wWxhitdjM7fXrmzcmuTAyCLLWkD/TqeuBxicE56C0LBoNxLzy4/59RhXSr9gkEBpkCv/9K46r0Hn/37J8sr1N5z9HtaR8QAab8U3omsIZ7gmb99mhFzHmnr3Li16aV3t2/c2sSydiQNQk7dQg934nOicLRzxfraFetrRw498ZzTTrrs7PL02UsEjS3RFRtq3165u5ouhgDvyItcIVtRpR364yA0NEcbWqIr1tcFA1kLTh1+2YKyjKsJ81Nnr6tG78RwTSNtnc/8/ZMVFbVs/2QtQ6A50GMK+X8amqONLdG3V+waMaT/N66eEssQ9gpcJh25xyoC37EBRSMjxxlpFzGAfKmL2LEVRHtVjxFArD1FNrIQk+ei14v5OPEalSftACrUlhYibZ1vr9zJ27Nqw6JSCS1gvyVZ2poBALChua2heedbK3aNHNL/nNOHnXPa8Mw5qfpiIW1sblg08HrWFJVbm19evK1ya2Ok7ahH+QMNo4jBgyJRvedA9Z4DLy/etuC04ZedXVbYnQFtrioXb6/c2iTaJx8cGF6mUOOqE0qG2XUk2rGionZFRe3IIQOuv2hcRoy6tuJEXwrG2eLM8GveYuI0WHmeWIw9H/TMfZ7wW4oZGuiOk5tCPHPe2BJ9efE2IP6/HtsDElI3jYD8HczNvv6i8al1jJFD+v/s9tnVew/++yMrGloiRnlil01JQaap3nPgpcXb0jSZKytqX1q8vXJrI71J61cbKInKIU2T3zcqp3rP/t/uOfDy4m1fv3pKptxPX0TaOl9avO3lxdvkbLHpP4qjfaQh0B7qVUtLEYl2vLx46zsrdyw4bfhlZ5dnSk24iD76TLInOXFpKEQLODGd8uhfKhqao7KvyaIpnYe8U/vaF3aves+B7z/w3qVnj+5uPZgEEGVx0JWHE6ogCpsdk3G0hLJk+aicEfQAHFe+Sj8LqwGASPd04veVwHmeQqEY7Sl5RNo6V1bUPvW3T5r2qeE4uvyCe59CV8stpB2x8RQQDQy8L3AOq/YcqN574KXF2y47q/yyBZnxs31Pj2QXYpmUXDilb3hNyvvM3z55a8XOSFsnOGpGUcmQ+yqiBqkc+IADASEc7Xh58daVFTXfuKa7FM6KitqXFm+r3NJEy08v1CiIFJa6idKS0EhK1Z79P3t4+cihJ95+zeRJo/NT5099fIkeMcv7egsHgLijbTaINZ0Ch/YULXNvMpWRuKJuhlr8HrvHxDPni97Z1tASle3MjxV0QAXsvRGs06eWXH52+cR05A4wckj/3/70nJcWb3361U8Te0OTgsRL72xL2d2OtHU+/eonb6/cGYkxqSxJx7jDxjFqCsJbwfXN0Z89vPyyBeW3XzMlBQ67xIr1tS8t3qpCqf4cK265TtAexQ8dYTja+dI7W99esfOys8tvuHhCBpiOvXSL9EYAcEhD12z5/U98tHJ9Lfev5YiQRNfQzNM7VFJTegDw0jtbVlbU/OoHZ/S+RecqSR5jKMvlSSgUu3ozVpYqR5mheECcAr7VFTrC1wchMReEukYjWwSxc6QyOABOMvFIDaI9N4kmYDprZOGtA4DIN5R02JVuXLTGwHwgBKehOfronyveWrHzh7fMTHOqRfpAmnYX7pd4qoZlKiUp7zN/+6Rq70HieHBzSCrWQXDB2HMAQU1ZioaALjS0RH/28LLLFozOrMKJtHU++uf1b6/Yyaj7TI5zvsi17neIEomhBS8aSIlV7d7/vfveu+HiCekpGULLHB/I/4o1XNL/i5uh6+qtWZTIddkv5aM5xACwekTtPdkkZBtx0HfLdx0xzXljS/StFTtYFi6ZDXdoHQGgo9xhyRNjdfbU0h/cPCsj0apgbtYNF00AhKde/cTRLaFszFqT8bNC9c2Rt1bsvDx5XzvS1vnAHz9avr6WKkuvEjIqSYNsunJDbd+TdABeentr1Z4DP/zqrAxai0hb56PPr3975U6qQ6iCV/pQa1WmkOmRHkbxaYJItOPpVz9ZUVH7H9+anWYpqIEyRphaXVAfVtyMtHX+7OFlG7Y0McYE28xSeXsQzVb5NCBtFCl4fXPk6//+5n//8MyRQ9NS8enD84kaq6BY7nvX6gDUJ+aaEBgxT1ao36fehEpMvQD1QFFJgCsdkbbOl97eumjxVrZ60WQPNdLSD5NMmOXyYV7Lp2rPga/97K0bLp5wYxrGA7Vv9w0h6ZVIhCRTrlhfe/8fPyJjCa2b+hkickOqG9DfdhEcWPT21qrdB35+x5yMKOpIW+dPH1rGfSwRkgGU3p2I1aBfKzXEQh1F8lea1ade/aShJXr7tVOCudmQPDxdx1gEBgDkiELaYH1zA3a8oX8TYino3msq5C3VE1A1qlwN9GYVG8fFesBCOkgL64qGhoAua6DC30ReUywpIpw+teQHX82MLZdgPQpdF4UaYME0FIXlPxE5b8CHBShM6VvLdyZLNNLW+b373l2+rpaVixSWAVwe0tNJI0oGxE1UDIsH0sWWczIIULml6Xv3vdvQ5XKexFC5pfGnDy19a/kOybyqNallBH+kgLyuXcUhqIKpcom3SHNnqZgHXb3nQMqcK7qgBA5ErOraFR4llzKvtQ2bm5ScUT2VDUM1I3EtGoxsNLzKANElj8LRju+mV7rMgEpfVJAre6a4o193maUqZqy/tDr0SiGNRMhNtXS9e6BoS0kh0tZ5/x8+evLVj8PRDtSKpnU2yQ9tpqikofonUF60lKo9AOLTr3x8/+MfRfSv3ZKCX85ocO4pEQCz5X/4iJUXDekhU8z+eUqSslvKp/Tmhi2N373v3XSKxlC95+B373t3w5ZGqoh5gWWDoYLQaoTclmKiPAtxuEQ+by7f8d373kuJc60xiH6BgIiu4laTddfN1awarZt4nskyqkfcjqtX6BNNhjHgb84jbZ1vLt+plQVQ65tSAHpjYfxMGp3/w6+e0h2rtW+4eMLl54ymXDEeQKsfIPKS2hsRsHrPgeXraxInF2nr/OlDS7fvOUCyJQYRiPhJK1TJUCTjLNIWStQdIAu4SdS3RH/64LL0O9iK9TU/eWj5hi1NCKzTS+cHUUlM40T3N6R4vSmpBTSLz7zx+pbIbT99c9Hb21Lmn8vKlR1C9BFKXbMagIDhto6fPri0itUa0Wxmw0ByrXqzvAZOWglCswLhto7v3vdepryuFOUj1SPxcGhvVLqdp1L7QsfIEJUUiDfjaf0Injto8kCVBScp7ZS0VV1oSB2Rts6fPrh0+boaoMXUKxK0sqNGSEqD9E/yFurFRCkN9sqby3d+997UjAcRqZazEh1t0KREuGJ9zX2PfxiOdnhavHat8qStXctTlV2nDgBQtefATx5cnkK5aNXc9/hHVXsOGMpXNT4if8UfEYJscuBl20ymKrdqz4Hv3PteKhx7chb9HBBdIMzTf3E6j64iJbemwjIzRJGlfyOUUnJpY44Ff3O+Yn1NQ3OE6m8wr6m2UC0FEQN9s354S4bH5RS3Xzv19Cmlhjj4XxdjiEwlTmqA/shz6zdsbpQ63ZOzPzm/f7INAiBzAJFmgjzcoe5U7Tlw3+Or0hHUinU19/3ho3C0nYsFuHxc11uDQBiTYhQ90NUGfIaQ+YwOeYQuuq7LyoiIjzy3dtHbW1MrAhcUyEbMr9GHH8X80698vGFLo8vuyPSASF5BV7Ue9tN1Xd6nXVJBQF5kHBAz1Rpp/84vF6fvdaUKxZviijY1Q50DsmbWlUqSmhiUNyPLrLdm2nqAWyVUjBGhc3XkCgkzfhKYDpSItHV+55eLN2xpRKH1kVDUGCO6WS8AJ6quvSkNzmWTQETAqj37v/PLFAeyXn7UT0POBA8/t57HIfxy8JSOVJlfMVmzN+Eiurhhc8NTr3ycQrlY1Tzy3Lrtu/eTgngkT8kRk+zDTFyYEnCxavf+R/60Lrm68Bcj0AtfUSdVvzHL6E0Qr9Q870R48Dfny9fV+PIEPrlT7wYQ8ZvXTe3uVULfvG5qoG9WrHLHx/J1exPsjSvW1by5rFqoDuk6+Yila7heB1BrOoaHKFlN2RBWbmm89w8fhSP8DAAqH/FTekIGY1oCcVfVMvirJPVI8iBE5zz8p3VvLt+RWkEMayX+A4jAbZNgQFIPRzuEPaIFl6VAkrNwFESlaHS53tHYMBI3tEQf+dP61IqWPkjvY78BUUz1u1JE4p9LUsbOkuSMVDj8ggrNBXABtMwRCBUlLpdbGoN5Pfd4iLR1/uQ3S6r2HBD1iGzJDm8MLim7NO60NarZGC8DoPEmX5TFl6ldQBerdh/4yW+WJsKzBulPa1kK58dISXROQ1OEXfPW7xKuKIfUt9ZLKJ1awQPNX1YxAsCTL328fF0SwUuJt5bteHPpDpDF0ZuN0g6Eq3jjIk0IpCJkGdFIAC++tTWpsKvgxO8vUR2grJ3Onn9uchiAWrlUDuQR0LJTGwBmSvQMU2PDx5xH2jqXr9srGpDKnWsz1pFUHWiURg498bzZI5IUatIoHBS48ZKTpQ0UslC63mglRn0k0mQj0c6Hn1uHWsvTXEqgfV78RR+KCCiW5wkm/QYSaNxh1w89uzaFoUAk2vnLxz4KR9o5IQCDFmXPYIB6LbTDGN4M6KUwEtAacdFFxHt//2FV8jPNBkXzJ2j1HitlQvDm4peRb6o3l1WnpgTTBHprFcy/VIbyOok8gf/PX2C0ySoFYbIFCHwuyS+nRKx5JNr58J/WVWxu1KoB+LDSjyVm7/X7FN7BUIzqV1qFba2NgIAVmxqffHlj0pXlCp4lNRn10rniIjQ0PQpPRsmclIsmQ5KA3vXROERrIiLgky9vTFbhRKKdL7y1RcsNUCusoe1A5wfEHa9lIxZNJaDvqoE+PvzsuqQ4VxwCaQ+SB960hEtE1VycKuaVIosDejckjxTjnKSSkjQstKr0Th0LPua8as9+IXbSPRjHpOJF29JkfdOlJycu0HRwxbmjg32zlSwYl2BYHanvtYa8gX4NGQNvLquub4owz4hWNYAg5yrlQcJaXoogmosSpawwxrBosCDaArB2zC6efCk5xRGJdt7zmw8aGPOMAblaj+ZPeKYM0EZrdBgwE+ttliRQNUJeuefXS5J2TXSK7IJ/C00K4imaWdiY/yCBt7Q0Ji32YrLKPTOIwQ/l1tUqhVR37DyNwrqkZlHPWf0Uq4c0XaDeUgrJ9TKcAN5YVv3m0mrKHm9gQumDtBBKVaniuGTeUSbwbbda2cFkXmkUgCde2rh83d7k6opwhRoJrcsbWt6XQ9p5da1CK0tUkMhWUEEmLi1D8e723QfeXJZcIO3NZdX1zREqN05ZJ8qViSsmxWTFsZtgVoFoe6rWVHGAWD4hg/rmSBKqUmuw4p5LJA/8gSvaOkqhxcpSLPHhpXW1jqMkQOsYZClU21KPRE3RRhu/x/iY8zeW7eA0hPRRCR3VIw8KBwZmTy1NVKBp48ZLT5YdjApLtXbV6jU9w1VDXPChgOwUUvTUj1OXAKpn6V62rDCSVEnSRVlnKgfQJPzCm1uSsoJvLquu2NQIUsER0pRjzwWYabqEhwSonuyD+ubIQ88mOcXlZRjZlw1dMRo7gfZuVxN1CabZvmt/Uso9IyDNOkZJhRRAKQX+M2ae+usodBt/S8+ZtB2hn1UC9PImjZZ2sytU7T7w5MsbfSvC6y6AD1mfZEoU6C9DvSymTWXXDyU1HPS0SIMTypIQoDQs/pIkKk0zzySNLzkHPbWj3nWTVjgvvLUFdCqyeejMkD106CNvyyMCMWSiPRJSldJInHOpmqmUSIY8f5T2UyZOrJblT1IQoDep9yP5Z3IQlpv0OwDXlfmIsvvB57tzOVtDuFT8CYYAjI3DEGZPH9JVcTOJKWMLJEtyXzBQewwBiG+pXUS6lbWL2NASjTPB39ASXbZ2r9pXQClEssuPa2wFw58Gc7PLhg0YNaR/MMC/hty++0BDS6Rq9wEUWydofLpAmowCkm8gn3hp4x1fmZ6ITLbvPvDHlzZKBQuET/kVKCkXIcf3AhMJTHY0frhsWUHYadsI6h35w9jYEfHNpdWzp5XOmZZwO2GFIIwJ4auvNlHVODu1j9OWn9EbO4Vj7M4gNldAtuEDyRDlngL6Pk2OlMsTL22cnXi5MgrJIakzfs34F1uoEPnEykrlBmqXE/4IeX2D8Ve8Kba/cIzdgLXsRS8l+cfHH1/aGI5wHU2Eb3xGrWobzASUWwDwZYzeZxvkeps/kGwRAOqbIol3TNHtFSd6WdBgWN9lhJTOk5JUq38b8GzZEKcFOABQ3xTesLkxwca8ffeB+qYwe9dxaBlpngZpfqdocLBwcJCrcYBwtKOhJdrQHNm+e79qwGTLUc/Bm7wDUjP7xKLKO65P6LStOHrAA09r989PVIe+TWqmgAhd8eAx55FoZ8WmhgQyd4RA1O4jk8ektftbshh10okFgwINzRH2U271RerJOJJVpoFla/dced7YWDlXbGqMVd2syMgNPEj5IkIokD15bMEd18/wdRSqdh944qWNy9bu0bOS8DkLR/5+4Y3NCWqNJxZtjETbgZeUb4PA9KfqUtwYG98s6bLyURqgbbgqX6U5u6aqlFkJHvChZ9ZOGVuQ2M4P3FMVFhqkl8K5En8lXeXtOvpboJfIpCNeZ/8nclHuOd9MTKs1Qc4BwO079zc0RwoHBxMoV8agn7dI2480bVIgqMoVTympd4VwSXL2VO7TpJ9/BMLNcl2UOkHtOkWTolhN0pVBX7Z27/K1e1QFqZZJ8gHuefFiUl65h51VODhQdtKAYG52MJDd0ByJRDsaWqLbd+3Xt6BSLVo1Frp3FoBU1Ey6L7y++ebLJibSmJk1F5uCIGg7u5CmzMkZykDrRg6Y23iT1Mqqs5piisp36ydK29Ff/+OiygTN+fJ1e0U7Qzlc0clJC4+CEAYD2Qvnjrhy4TivqmRV84vfrazavV81Vjkqo3Wu62h2s2JzIyQGNcIBn+MHtZScc+WHxk6HDoDrSeWYCU3l6n1E68UQZhyY5ry+JUL9QIMnv3z5f4O52T0/Olk4Z8QfF8n5EtkrJJse8yK4lU6ALyo2NcQSm2yX3uubL5t4RWwXYdRJJ/7Xd+Y9sWjjHxdVMk6EE0dZpWpEk/+GTQ2TxxXG4RkAlq3dK9wFokmJaSJHunn9R23rs1BudjCQHczNCgayAZxItL2hJRqOdgD1PdkOv0oIUuOabVXpQHTqmyIvvLH55ssnxS8Lexld5DuDcm0mC0dTOT43kXQKdAAwlJtTODgwZWxhMJBdOCgADjQ086HA9t37PSqI5s//64A+tNXUPADiC29uTnBkkCmgMr3y/BXtsWaUADSx+KFwcKCgKaDZYIRIW0c4KmOYap8qB6lx02wNQ9GggBSRj7rsWkHCC29uVh6JKgXVebIBopHAAadoUODK88fNmVbq62ZV7dq/bN3eN5ZU17dE5NJ3kFmSfilKxn4SIwlOosNBaXxIp0HvqNsl5lpKRlgbZtkQsWhQsHBwcPK4wlBuVjCQHYl2NDRH65sjFZsbIm0dGvNA+CdqnZ+RKFu3PpLfvnN/pK0jETelvikivjHQxK8cX70o7OKO66cvnDvSN8NgIHtUIPuPv7zgiUWVf1y0kTOp8+nbZNjNRL1q3Rfw223dP/9YzTXYN6dwUABJ9QJAuK0j0tbpmzOSZOh5VDg4GMP3iuWVcZjmvKE5giTcZnIQ+/6ok/rHIdNNGHXSAC3e7aOP/cVfH9ech6MdMmxkAPVrmWbUsAFxbLnEzZdPDEfbX3hjM6hmKaXNj8HyZXrp2r1dmvO/vrFZvo2k8xLtJ9ukMdIGAHAAgoGsspNOnDN96JzpQ9hQRqapb45U7d7/xpLqZWv30kxQz0ZZXf04BZrmjy9WXrlwbNfKgotHcxz9KiVWN+T3g4GshXNHLpw7smzYAN9023ftf2LRxmVr9+iOmumVIHiahOCQXa7/NJGwVuaAon8TOZuevqmE/FuXxJ1fmR4Ws4/SYi5fu/fBp9dIl4oYBSRTMyh+81+OAz/++mlFg4PUWlFDzH6GYjeD7bsOMJHK1qsPSsEBLT7hkBYS7Jt98xWTzp87krZhA6OGDRg1bMCV54198Ok1r5P1NA4qMfFBuy4/zo8L4OBfXt988+WTErB8dD5KaHGk42zRVwFATg7yiIPSyOUn9V84b9TCGOWKRDsqNjc++NSahpaIphZloWQcS5zNo+bLKAMOvLGk6sqF47oqFNSz7UlAcs5fZ4So9OQ5auUnnRjLllPcfPmkcLTjr29sZoLQNKO3c4J47DivL6n+6hWTusxfb0h+VkRN4+kk/BAMZP3mJ+cYN5ev3fubp9aAOhfHURk4+giOB7p5f73r66dRj6Qo4Zifac6379pPeEbu5WoF0XWaaI6jTvLXld2KKWMLUOeKjBSNwy41lbJ95/442UbYh8uq2zkAQGaGtDxZj5wsZoC6xJ03zKjY1Lh9134AY5YRqUOOQOeKsWpXPIYBYPuuAxWf1pNRvUP4B88J2I7X0SscHLjzxhlzpg/1zb9ocLBocHDO9KHbd+2/678/YP6Q73yeXCFAygWCJX7zr69vTqjLmRacqllSHEe3MsqNgTkzhl61cOyUuJ5Q2bABv/jefFGusBQO+ktSgrYoAHC27zoQiXbEsR8Zh9fz1pVN0nN4wUC2l/9gbracF/SqbnPogep+4eBgOrMPf1xUyaqVuKGaA6lRJkUNBrJ//PXT5s7wb8kGgoHsu75x+qiTTnzw6TW0RxMScrSOBiF29ccXK++8oYsBOiII9aG3UipKntQRFUsGuwChQPaVC8detXBcnAYWDGTPmT5kzvQhf31j04NPrQHdJFGeFVdGiUSa7V0pHIb6prDyJI2IrZ6tpHXevK5tOcOdN8x4fUl1JNoufXriPvI/XOkTt7Jq176EclcTpnrOQEQk1ksBAvjNh1J4jW4wN5tJQTCPwjMROROhSX8YAAoHBxM34RTmyvb65gjZOQgA1IeSxHlDlD+F91V20okpkE8TwUB2IDcLlZKR3UD8R3Yjvd/EH503NIdJ6UBkoq5BThYJIkntgnfVwjFiwaNcvqh3YGbZWf4uAsC6rkZ+f1y0gWWInHFRWeSnWr8pqQNfKjlneukT934pli2nKBs24Il7L1w4d6RRBAGZORCKjhQhu7V0zZ6u6IBgFNRrorlRckxEhBNZ7zBn+pC7v356fFtOy/XgT88pHByk1YqEFjCHS/1ThZVFjd+uMg3U+QEiH8qhJ0HyZOLkFudfOohEO5au3u2h2zUPwdzsH3/99ARtucRV54/76hWTSGOmkuyi+BWJRGW0phu/LD73WaG+esXkBJ3FqxaOu+sbp0uVkiAV+ijhHuotlzd/cg0QiSaxbP7myyfqLUqjAii+wlXFxPWbEpg+JzoKlNaVnV1rw7IBJM62TgU9uUl9ggiyCCj5SRmmOWfzo4JzXy3G5GhWXiClY23SBwvWKYUu60Zt1wBEhlK+GKdVBXKzXfmpKt+sVGQI/Jq3A74LKSbUpQUWzhvFfQLKJFKGQVWzqPs4poLpPuVs8f+YZVY8g0jhIgLMmTHk7m/MTnxYGQxk33376efPG8nq3qX9iUDukYSu2FtUNJftu/Yl4v6j8CBVXxLVIp6r7VrFI97jRw09MalCAUDR4OBDPz03mJtF85SFQnUtKkmxx8WdqBLMCLjDRyqXKA9Dhei9NwVaWrYyczTuQNqEBJau2WMWRJaFlMhQQ4B41fljk7XlDF+9YvKcGUOU26t/92oIgUpg6859Cbhx6kUlK2WdgGboLdSVyRfq/Hmj7rxxhsxc033k0itJ9icc6UjI7qJZLnGhFBdVYoBY15SEyzt3+lCdT6CEgCh3cQdaI+2JcO4VidDDsqJ90iTVqIW10M7j8KsKs3slQUOHZ2V7pB3N0+vUpR7qQnoz1IMxRorCQcE69qUEetZJaNaNzsA5CBBuixkXDfTNAtDFKm2s/A/1pBDWfdqwdPWeuTMT7XIP//Q8n7vGtDBqfMcJvyxZs0caGhkbNqXh0lAi8sipA+UnJW32GO6+fXZdU6Ti0waQX44B0IYjSaiYtJwAQXj9g6pv3zQzPglx9q5YTS1tKOjTBZImyxohFMi+86aZKRSqaHDw7ttn/+iB97Q8kU5WiEYgikw/KerZ0bmoTBCDJL39SDeE/4i3hqZrQgBiIZIM3oo86VOgNZ4GmGPEi0ZnLtVfACAT5gDgQNmwAVclMOMbC7dcMXnpKu6Q0bbGWzi7Y6xDAQCAv/5jU/zGrNwbRxVCfVziORmHLkspGzbglismp1Ccq88fV/Fpw9LVe2Qr8a5HJL1IZwCgrjlSHuhiCjUQyMZmqghlwcQdVPXDLNfr71ddff64WAtZDBTlBx/5mZ+qlNDX7zAk1PHNt6TqFBWTEaCn+/kxjOLzyDRhmnPuUPj0SARwUCoPkoDx1luj82AgS0rHFeuujb/sKdHPXVRV2bABFZ/WI5/oAt10g5GtlMN/Pbq8vnny1RckpE2mjE8oApwglq3ZQ4qH1NYhXWHHl2dzhwYBQ31TNHsM93xz9o0/+Fsk2kGUrrriy27QQUDJkItcgOs/re8id6nrQKk3USniGQKQpTyiUToL54+amliM3Yu5M4ZOGVcgFmHxLNHlH6MrF0V96OKA6LaRSI8ex0JdeQfEB3uorSVwHKDmQk2AJ0WFvY5KGXk+dCRrDbCLc9u6RDjasW3nPlY2R8xZKs7Fei7yiFO8+vx4U8tdomzYgLJhJ27buV+IzkHU5+ulEEC2RQcA+YgiDtjIywFwyffTMiuX5Kle4f+95arJKZfolisnL1m1W7o7XIK0RJ4VRxINTZHyroxu4aAAW4eENGdqDX2sF37zZ2/c883Zc2eelEgRMqsqOQeySRu3yUVGLDp1ZkwiHpbSJ+fZFU4FGWiEQfx0ybWeoLdG58HcLMIi+P71RZw8iwYHWNSFlF30ZJ9s+XVrpP1/n1h14/df/cNfK+Ivtcs4tu3YZ/AjOSS1aTIPCOfPL0vZ7AFA0eDgBfNHUiGI/CU5SRFA52Hbzv1dx8RIJrQI8toBR2ZI80+nUABw/vxRoNFizpBoOGKkReKUvDnVJxNITBPKxBKWQDBGr6V8VLJk4IBcUmr2ApMB41GqaGgOsy2WVW6uyN/lOoo/clWaUN/s9FX/HBbTZqJzxSdY/J/UyEKOQh/KMX08oKwRotld0MVoKv2yYQNSmzuQryuTrFkrkys9AUJijXnq+EJ2LAPJDc38AYxmF452/Nv9793w/Vf/8f72nuwyGuinibRmWQVRG4GqxpNq1EQVisylA45EiYCyNXoYOGn47ArHXRO1ktsRITWk+/I4Yl2e43iqsAfBJC+3B1JDZ7a9F4BcsIiIZJl+PJFNHV8olCUHGwx4C6kLBBBg2859W3fu+8trmwrzg3NnDp06vqhs2IBu9XXqmyJycMDK6+usqCEsSTA1bfV31fnjn//7p14qXcIB2LZrf3wGaEGMZeusFL4lLc4PJT7r4YsL5pf950PLCGk5+neMVoH68CMcbU+HbtJQAYw4YveO+5ImEsv99W7UZbyZGuqbIj7ZakYCvfcLUl0PTFGUH9RI0xC5hwnKSX1TpCg/JnXh5/o+0zPWCz51XFHizPti4fxRW59YxfoMHwQmMhuCmEhjLhoc5GaO7vGB6JO/mo/jj7bt2PefDy0LBbPLhg+cN2Po1PFFhfmBUCAn2QKmBuUNg6xeVaHCCdELQm1zojTEi+RCtQNl2jkbCGYDSAqeYLtqdoITUlUofQey4RSz+eG2jnTbXUqobworl0ds+Uf3twDyZaq6G7cplw0bWJgf4OMDNTso8qFfSsgQE2uuYh61NdLeGmnftmMfQEVRfrAoPzhv5kllwwaWDT8x4+2VSUDxKbSRo1sbBLrHLABA2fCBaZo9ACjKD86dOXTJqj1CV3BJOfpfDUKrrP+kvgt/whyrcG0kXGi1YS2lkpGt2YoGB9m4AYG5iQAAMopsxF8Jvz3o1aLorXpAE/V5OASXbFiE2lA7GULKj+L3AADYFiJiV1S6PWpac4HrPqlHpvwd2gaYFyf8cg+KBwfqmyJEFOZcod9PQ3qOoCT3XJLpeaHIm9p2ntt37Y9nzvkeREpEZAqeMyCriTbq9OMN5cMGSF2tzTuavqAmkASrb+7Mk4K52XyXIVFAonxVmyGGiu5rh62R9nUf1637uB4AivODZcMGTBtfVDZ8QNnwAd1o2vUmzewE2WULpO8jJ3RSpIN+3jY3GtqnsELNpKVCPKNzJDZb/jW0l0M+gec3naQ+P8gkqNMr5mWJ5SVb/pI5zi5FdvUF43/9x4+Y26Lql8UnyIbhHMrdUVzJV+qawnVNkXWf1ANA0eBQ+fABF5xZVjw4VDY8M1/qb9u1XxWZNA85k+pR+BzlGWJg6viiJR/tVmZcMiKZMhSpQJdxNuotoXRZSJXLm7QXZGSyrWzYgDrmJ7Hs5Rwnp6b+Ur2XRsdPBULR0CCGA8SdBbqpNZtET55FHuUWOt+bgxqE6F5FsoQk6psiYobDw4v0TT34YNXuD1btTpmoSclLwnEMpmia+sb40+cyWitlRR4BFawWHIjjIiSIqROKJE3fKtF1B8i+m2D93XrV5F//cZUnN5UVmLs/++aMAFDXGK5rDC9ZtRsAivKD5cMHXnBGWXF+sGz4wMR4SQaqJjk7rqao5ISVGZ9Jjoi5w5/myQnFjNSepwPTnBfmB+ETTf/TVT+KI8Uo17H1TWHohjULXYLqXPCRvlL4rr6TZ/x+cs2F4x/783q5t6UDPHRP1Yka8gCtauXCc9dM+KUOQH1TuK4p/MGq3XmB7ML80LyZQ+fPOinNxrp1R4upG4RpVYNJ9KnHNCeYJdjknGz+PqMeox+In3VdaUCihRw9HzV4oi4uuyhOWwMCQNnwgR+s2sUzJoEA8ld1RlLSHrXn+mBOMiAGXUBjJcq/S8HQIujRJxDZotzsiEqHO74plyscaUczfz037ucJR8+JUQVkIyaxrs3gSrQd+ZYvOSZJSQgNUQA4Tmv80HScYDsnSgolJjkBMSM+dzA3K9zWSfIHT5/0WCujgLFxwZnlj/2lIhxpF+8Rl1E/SYbekS3Uj5YDDjftH3y0KxTMYdHN9FUlBWFSFR2N3zR9zCdxSFAy6n0ff0f/mZLnAOA150VyGw2DgKwkUgc0ZVequVsQjrZ76Dp0KIHgUxYEp7iga41//4/O/sY9/yAvmtOTpCbMaKeHqEPUjAOAIhrf8tif15cPH3jBmWXzZ51UlB9KoNAmItGOWEMu5Xd7BhbAXLdMYOqEIuGxAPg0zZidIJH1wGZm6ncschkyqahT0Keg9ErHDJNOHAhA9hHg0WnyTPuLoB/TkhQhVH9B2jtyE7kj4YiWzhcNpgThoyOKrcqlZyy8BUUIJDFihbUEiCwsQXIzUhJDj1ym/l6E8UGm8JQAuwg1sabD/ionBOTrJgMA6HOUR6oIiHg4E5PHFVFGh/CWKPFQIPs7X5318weXqtYhfS1CBuVZiNJ8S+9CHOco4nA0vAqt4fZwpH3bjn2/f359+fCBt10zdfSIAampSgOCJX3sajoe9CDHpGuETwlSHya2m0QepegKm+Y8FMj2D4UgZwXk+Be1Ytc19sICxfrGiMfllfqLqjPT1w707Xpt2rQJRbddM/X3z6/Xc+bZ+RKlB1BSx1RPj0QNAABs3bFv6459jz2/ft4pw752zZRkW2o42q5bajk8VlQckKuZJF3MyCiWIdQ3q5V9riaok6lH1HlTbHThAsrwpP8UOXgq17euUwSq2TVQ9WvOp/oy0HMg83+CvHbIitFOEx1vechoapllRZocpeJ4mlkqCEfaURkHyoi6IwK4NCygRXU9wyI66+BZ7mbEQ72emiiUtuCZDuziyxbVqb4k2ORoB6uh+UqG2jKhDgDgkGtWcBVsQnJqS+KN5cIzy+uaIo89t06+6LNGkkhYzQM6/BrVOnNiRcWVzGrbzpYf/OLtUCD7wrNGX3vR+JSNOgJ3LFhd+IT/QBMFeGsnITL8TbqTi1BpPjyR3pyiJvEE2wcH9WGkuGBN2SXMEBULAOs+qUuNg3QgP05FkL6tUv8y5kj1HfOUivJjHnZOcds1UxHxMWbRiZ50dQnIzJX9YS1GKg86nItRYeFI+98Xb31t8dZrLzo5uZaKgPR4b2DDDcWUI5YDCs+bMe8EM7fSJJCb3cqjbZIwkTnhVMgN0a9JmyUzPEcA0GdMZNSDGF70yjYloNaEHABw5BGNQCpTq84eHJ4Lqob9pBbesEVypJA0Kf6RiGq/XCySioei4cImh9YEP99XgtdOZ/GSpstrdIaN3GL/9Lvl6PnG5VT5P2TU6q2lLnlIEbSNmjkTB8XxpkwMX7tmKiDKwY/vNyk6USIH0mXV91QqC+qjAQC0Rjue+9vHr7277YKzyq+9aHxxSkYdjSv0PGP8KdNilishKq5W3+CNGANVXokoxXgwzfno4QPNcoJWwzI4BHo8pq6hNRzt6OGvzz/4aBdXaNKAyWvh4jHeeUBJ+IzTJhQnSOJr104DgN8/t85w+1FOd5GonJxUQ8cRK+od6VOodsNDHWKxKwn2IeJzr2784KOdv7rrnPIRCU0UMQkIpU52qODFBrkDHKrKcwDdzFYWUlFoo0Z1KivvrKyHxJtLVJnqv0UOmoLw+EcZs+bSV5DTwypSqSkBebPnrDmAply0mSCdCweAzLakOEBXPr7fYi4fG5qWZvLEgrWnfvFKrzaOzwAloLwUT/6+maDeoX149sBBoHlKHS8+rNXyzNSYnLCmHDLtviq8YiNlfO3aaYDw++fXGffNs591cWvl9V1UyVPR4oAD0Bo58vyrGz/4aOf//eLCpC06ShtmskSZkfRSrBQxIjAiisJbIG0AiW5OoxbMbWSKCkKh3CxARBcBeTtgP9Xu5UIv8JGQ+Pz3g492pcpGKghH27ey7VMAJHucMRFFIAVAXoOIiFiUwNy5xNeunfbcg5cVDQ6wnJHmjMDvCCEAyp9COuyXPMlGTCqKLSiA7XnOt+gBQIC6xsi/3PXa39/dmgh7SFamymLyqUyXlB14JSKKsULmoGpBuRa6BKTAlES65kF6aEwZUvmLOyCFJhVmhqy5kiPn1lX2kFAHWXDxsIcgpCw5pIISF7IpqrKkQgi9hMx/fvfTKZ2k6HpydpWYYzADosXH4tbLOWr5S+MbM2e9DXRVWI8AZZ8UvVF1Wp1WpuAthbgptZUhlhTq72vXTfvV3ecU5YdoYYlW8pYRwSt/ldK/+mhWdQ3h6+5YtG1HYqeoKWEYMmE9W7tjiEJp56SoaDZAtR9iW4380+o2nl3hAMqGD0LTXhMJoAuKJ6RV8vfFCZmfTGHtx/V1jWHmdnDWlMRVA9IlxTkuH5bcCsny4YOee/Dy7916anF+UKscEJYLERBdlyh70Ls70B4rlAGgMsIiPbqI6LZGjvz7r5ckJFLSJnR1DkTxkCYsiGZ09SJysbucnEtPRpHFJqe/AGCcs65lMqn2pMnW1CrtLq6o+AwpQSQkBBvgulJ582qT57WI9tdjkBRR/qA6CblMiNbQm0ISlNT5Q4qocUGYkfWSYsFc4ZorFUNoSYquKp1WU6oTaqVWIgPCtMG/yFp2Z+1FImThfwt0MXWFirSRH6k6X3lmAH4l5KWTNKmRlP9Ngdb8U4Y99+BlX7tuGluGJQuhm2pNlhrZGDepsQE9q9ZI+9d+9PfkLLpoPEr4rtZ4VHUoNlIQiFFSrVr9Sq2KmBp8zPn8WSd5yXOF6cbiABBx7ca6cA9+ff7a4q1SLkDY8DIGeq8vHzGwuCDp6ZZQIOe6i09+7qHLv3fbaeUjBhJLjcrigC8D3tapsaffZ5nwRz/79Qdbu2qmvpn4XRt3UhB5TNQ2hGWeKK6o2UUf+XR9UoIuwC7+icwzVCREOi4UzMhyqcJqJe1JeBgDAHRNZgifyJ6mTtDldGW2AGRhvSCXvjSKC0LengVGR5NLmagTKw9Kkdd6LwCiMWRKH15lvQKg64rdXolHTF9BAIBQYkckk3IRBihdY8PUjEAKSHCrMwQo6Yp2nQ7pUCDnX66b9tyDl3/tummjRwxklsPkB1TT1BorcXhEMgBQy7ZAnUKp6r412n7bv/092fEJuqRJI6ArahwFddW9dT6ToEHVvWymogWqwoIakqUBH3M+7eQiMtpDMuYDKkQ02EIEgP/709q02EkY23a0vL9yl7J7RItQ8RErByBsydSEJ869YEb9+QeveP6hy6+7+GTWWCkDXruq5KY/9dpYko/Si9/9z7fi77ZYXBCUFeTNkNYR6qxu3ZlchCoW6hvDniL7FNCLYFejc0OY+k8tS+1pJobn2vjOU62+SE8HpsSkHxOxWAQhsxToiDf9Mo8x+EuJkF/BlNxB+4lKCZKE5FWljWXtEG41ImYRAEhiMOJ9YtJK2hVARIy/dlWjIKfV5LVRJslU6hL0UgcEM6IgKAr7peYNM0C7uCD09S9P//29X3r+oSuuvfjk8hEDOHUSFRBzf77dWheaFJfom6DaAyBia/TIbf/2t8THk9rxt5QKrR0k82i635woFc6n7EOizcqBsSsO4qVtNVX47Nk+euSgYCArHOlA7eNttaQJRRiN/QcdcYn4p5c3XnfxySmMfZNCONr+wP+tpMU2vosQJzlKTinPMP3k1M25xOgRg0Z/bRAAbK1uWfdJ/ZrK2nUf14cj7fRrIOO/ihO2NsLxpFDX6kZdQ+vvnl37g385PRYnRfkhVE3Om6HwajVpAABsrWo545RhiRU3Hmobw54iA4A4DFV9ZWCuJgkF45lzxjf1X2n++hNHPU1zPQ8lr9eE98J4QTj2PQhJTa2eNRb3qGu/tpYoEWFoHP0v6Bfgd50KCvNDtQ2tIhNZDcaKIsaVWnH5pQWjv3T26JSJpokulJ7hZKL+SBQN2Scqfivt0gLvS1xTO9qiN70eaQfOBP1QIGf0yJwfjOSq8v0Pd23d0bJ2Y10k2g5sCRj78lvtVyBWtdO9Z1E9BbFwD+iuAOggYl1j6++eXRNHVeoQRPiWR6SZuXIvAsEPuOjdW6hrArxySVassIC+OxKxv268POPD7wgWgOsuPvl3f1oLLvnQ3FHnHlLVIU25FPF3fv7mXx65MnWOEsD7K3eu2Vgr1/Y7juOyL/yNXkCWVMplhMX5eWecOiyDzIweOWj0yEHXXXxyONpe1xBm7XXdxrrWSDutMBBC0zwPQ0MyGCoR4bmXN379y9NDQf/JuVAgG6jXKM7M4bdkbiRDhkzNnf/tnS2GR+nQjwtQ3tRTOVDe1R5PCTuq6HuZHkw3Of5xI3GOhOk+MHKO9tluTKNB3kqeDG9LKJ3DGO5NrOvkMHrEgLWVtYllqNgIBrKnT8yAp94d6GpgZ9ROhluRqEA5rvCVqpdohtlgqhLYKubqfWs31jHTTrcZUOxpYw+tg0v+tZcAEOFPcVUlBRIietW44qNOQRu95BKFEjspBqadbSz4m/MzTh3+u2fXapRcdWY1kgbgvdxa3fKnVyq/fMmkjPGoY2t1ywO/W0k32NWso+QGye6XCOKLYTzjtGHdxBjzQ2V7ZaZ97ca6tZW1xP/WuEV5mASvYMEzArIP2Fw+xP3dn2IO0IvzQ9yZUV9e8zYqPzIWHiiQc7vhb+9s+cG/nJZI04+DcLR97Ua15YBQGyjdXvlXOKSCGRdGjxiUKBkpEIz5lyVMZ29Rk6YUGhcnUgo69Yx2yqQ4BEcM/OTpF+r0CHB8zUNKrOoGyXuGGz1/JZX8CYrz88jIW7m3xqmA8lNP9lZdY2uadLsVRixBsk0PyIGuvMaUSRuxTCBtBkwDL7jqthYdCuRMn1jMfC9h2mvf/3DnlqoW3/TG0RuoNwYDv3t2zQ++PrsLDmJ7VzEEklLQLyH/PlPhRIBY5nz0yEGjRwzaUt2s3TWc8ti4/7crpp9cwgxbZhGOtv/kv99rjRyRnMSoVMdvaOfkBfpc1CPhOGrat1a3rN1Y997KnWs31npTGlzSX2I2BQBgTWVNLFpnnDZc2G+iK2QOQh8SZ1DRWLux7ozThidbOoo1lXW1Da1K6yoDotxejTT3CBEQutxqF6WPzIrg+ueM2i45GeobKCjSYKSk6ainrCxIAjA9BGk5EYVPyGfHhEtFBjhpODlsBtGI4rP4IZKdSpXk03aoigtCrCCcnmjVZIxJ2pV4+t6KnekS7jZwvvWP9nmb0jcWkWXM5NfnfITA85S7IZHYKwBp446fge8mSNP+9a/MYKry1Xe2bK1qoVyhnD4FRzLsqj2ptIJurU5oSRB6PgcHmq0nuXgrCbGgcLi7YsTjt6YKn6VwDF9aMJoJUv5TLh5fQiDaglTT5N8tP3h1a7W/q5UywpH2f/3ZG1uqWiRpRLFgQXZ8fsdV0S2R0kUsKgh2h5MRH6NHDvrypRP/8MDFf330qjNOG26wTS64hOkjWaKtVfvixMbZIc1K2anaEWLwSIw9/e0zq9MpWjjS/uxLlTw/DvLBhyodKSzw/4cCOdMnlsTPX2QjigOoZy7+qVLLN9IFJwSEhItS7xLGkNDtaXsuBI6KDSCLa1xyUwpNfdiZDCWtbar9DEBSpC1XNYQUwTxUmQ+vZ+XM+VF0ERHfW7EjZaLdCyoorfmIqqMKQDgrGWnJlD5vy4iEALlPFUaPtmQOpir/+uhVf/3tVWeePly2MTkOoM2ZNklZIEBcvaFGngcTH7T9UIVrKmOdSnKIlZGn/Wp6LVXENOdfuXRiMJBtNDpA8QUqZYJsOCP/2xo+8tXvv7Km0mc8mhrqGsPf/vc31lTWmsYQgMtMMcY1rsYtIAB+4/oZmeInBYweOeh/f7bwhd9exbdjI51It0uO/InkYqsRLCE447QR0uXSTSg1PpQKf7qlquXZlypTLtErb29ZW1lLTJ+SPLmgZVT3R49M4NN/wr/88plkopVLlTcjUORIS2NLYmRfQOR3QDgaGSKeMJOaty0HYXKw5ypxCUmmJiGDEChXHlCRA+F4pV8LY0YMkrxKkdMuDsi+LBJpABDh/ZU7U6YYjrSzU7xS+JdI/ij8KLnQAfnnb0hkSxzTlEvigSvasiSh+qvQjuyrLao8etY31cBU5R8fuCQUzOF8usLagqYGZO27ZJF8bdc1wpsvzUGpEFRL7kFKKQV5UAXMbnCFxa6F8EGrlHTgH2xn+Pr1M+5/dDnI+VsBbRNPuS6OzSi6wO46DrSGj3z1e6985bKJ/3b7nPSYhPdW7Lj/d8trG8KKIt3oEfXFZmbQgoeOxo4a3GVg+ds/e13N33R5RCBbrOjAReeMuf2GmQmWZfTIQT/4+uyfPLBYZ5Uuc/cSdQCwtiFmG50xsfjZRRsSnobRVt/d9+iyM08bXlyYlyD/Eu+t2PG7p1eLTsFrJXEGLlowpst0ZvNW04paFdO2KcxLukBOXisR74eeYx9ZB8i0Eu6aQ0LOlDx6LlInhGZFiB9q0he1p5yZ1nB7yh+5fOmcMZsfXeZh3jEq3ZD3K29t/sb1M1JozABw32+Xr9ngO/zAGJFv1RRf/L+r469BkaMug23hGoHICmn7zWRjkk4npaU9VL9A48ofX/3ey7UN4djCAVOtgQMA118+6SuXTUqQ5emTSr5+/Yz7H12m8yVYY0vWDA4QAGBrVcuYuFFY2nc0jUInlaTvAKocSfVvKnFtusrVdtx1XXGwmzhxLmVHKp45v/6ySc++VFnX0MoPsOMQB/Kg0N/GYYVSUgjg4DOLKt9bsfPfbp995ukjUuCvrjF83yPL3lu5Q1pwrsgFS+JwPS46snRJLCtzEABCwZwffKOr9REAxQUhLV6HfKgcc30VAjjw3vIdiZtzALjk3DH3/3ZZONLOJCXWvwOAckvo9uds4/nW2BGkM08fEQrmtIbbAbQXJeiZ1OwP+RADbv7ey0/896VJKcH3Vuy454F3OUUAFJNbkhxINw8ESQCZOC+YM31SF5F29hpt1/onASpzUjClMdOFpn4JD7LLGfdT6O5pg/Y570NDz6a85CYv6H/KInVmPDOYAACvvrV5zKgUXfkZk0r8iHqqg7c9ddLdnT99/cXfX5MsufdW7HjlzU1MYuQApziznurp2FGDul5P2nUM1TDimZw6B+6Q0TxdsnQRwDwtELp0i4PBnNqGGn3al7yrLbUAmWz1htrEzTkAXH/ZpPseWUbyRKJR5MHt9CNMBwASCbbrfUdl5fGKpXpLBVSHIO8oQDLkwkHlbKVV7zGD7Qy/+Y/zOSGxfSnSkIeMSMpgJ90MUhip2oZDd/709Sv+5c/PLqqMtXbRQF1D+L0VO+6+f/Hltz3/7oodsrQOyB2bVdiCcyTpiviRmGADdPGM04bPSMB+8O2o5Df+ogj8J9k+gnz+D1uqm7cmVi6JEJvIYJm7pCQ02qWk2HXs68zThgP/PJO/ouJooOUpa05WX21D683feznBecdwpP29FdX33L+4NXwECC1hT1V7EFJTgT0QUaWLzxlTUtjVuI2rVN7sQM8HKA21D0PXWjNhyNyoJNUwSwXLtAafIeIJckiLTPlBGbyTTkbq8gkFc2jOsi3Jjgb6tUz23oodCc5iejFm5KDigpCXrt6MhTZSDMCWqmZhABLFmsqa+x5ZJpqnnLYDAKOW2Q1FlN2/6JyxCZExK8iQp6gv1VEy15h1huVPVwkTPOKF+O4fmw1BjXMJQJUV7ffw7vLqpJsEac/c8mkMC5speyBinJGPka3OLWWb1jLRzMm5xKphko5CM1S9R6o0ciJB0og3OgeAMSMHXXzumFfe3Mx5AwB9PSRx7rg7Rw8NVDcBN29v3ry9OS+YU1IYmj6pZMyowSUFeQBQUpjHsqptaK1tbK1taN1a3bKlqpnFlg0SrpCSlJf4D7cmxvGPzLzlBXMSHD2XFIotWTgJbdCpoNFHAPjlI0uf/PVliZAAgLqGcE29+KiGNxExmnaJ96kLM34df+WyyS+/uTkeq9od1H4i1NS33vGTf9xw+eSLzx07ZpR/nCocaV9dWfPsosrVNCapREFcZF82ULmeMyYl9H0wPb7aNx+tIhA8d1MHipqR69kBxOHMZnRZEExj8VfKTCrSahKKdBtHbClPhx1Jsjlm5CAuARksQjJokWbP4ftvyBdrGlovv+35H31z7pmzU4nMXX/5pHuZlQVRFqMEqIopmEFAfPrFDa2R9m/eODORgNOaypq7713MZ1uZQHlwCfjktiOGbihanjo/z8kL5Zx5ehdTeCBsh96aRWn4FJJY4C7JZQ4oeCcqXE6SOAhGNE9t3xIHxYUhpZv4XyTKS9+DjGyVcu8jS//r3xYkyDnbPVqNy5HN5opOKcsi1iOwR11P8XATqvoJqjYlgxYodDCodpZstahKl/LVvkuU+izhmcp46MKcA8CPbp+zpqJGbNIEnpKrnmVcmDcdBwBaw0daw0c2b28GSKDJ+GSrzdh7XnfYuiSi7Z1QMOffbp9Tklgk+czTR4YC2cJ/dIixpVqFHyZIsWZDzSNPrfrmjbMSofLuih2ic8uCkOKgQZFfMu8nFsaMGnTm6SPeXV5NNHks+OkLBAB4+sUNL7+5qaQw75LzxpUUhIoL80LBnHCkva6xdfWGmi1VLWs21MjkUiWASVH7dJBaXtYzxowadObskXHKQjiSfppeIiIiR38nY5oQhbKTaphfoPTvfHRzpoZTiXGI9BhyroEQiAYiFyglkyyLoWBOkHUKV27ZpVQ4g5ovQmEdAACgtqH1Wz95raQwr6QwD9X2Wzy54zi33zhz5uRSX7rXXz754SdXRSLtPupGND9tCKEKhi+/uWn1hpoffXPuzMklsSLhtQ3hZxZVvPLm5rAgIV037dxSUqdI9sAEAAfwzNOGJ6hbDNk7ZpvhiiuNsVkc0oiA5NxwygsCcHdQBoJJi4mJS84de/e973Cxq64oLTxqP/l2F4gAL7+5ubgg75s3JaQqn1lUoVwdRx31rPjXjl9OQnokW1A1SjKUe3aQSktywzbeLAlLDgA/Y5mbRFRFId/EpoquzXkomPPgf15w2a3PKx4JZ/HeNLwNv8RIfF/zLcMuISmzyMo8odfRtD+7c+bpwy85L7FoGAAATJ9U8v6KHUJjIdlyQfLsbzIeeWJVbX3rN2+aFb97v7u8+pEnPhJeMipjTjq0PL6dlAbjb4kKAN+8cea7y6o1B0gpT5rQwzvxFFvD7a3h5s3bl5DE2jSP3nF98/XeVK/kBXP+7Ztz4xdEvWu6HJr51tz/zM41KupU54HUUqBIO55XehAIukIyHUI070Bq2iIvkBMOtxsUdUaAtBA9UgNYW99aW3/I1wG7+Nx4KyK/eeOsex9eYniNuuqR2p0ygABObX3rHfe8lhfMnjG59KzZI4oL8wCcvGBOa+TIlqqWrVXN7y6vblWOu7AEDhD3QLpyjtC/Dvku2QkFcy5OTLfIuQAP/5qaQ5FWbPWaofYkqaPQuVpFsEeOi8KoJ0b2jNNHvLe8WmZgaEkAPVpE+sbDT3wUjrRff8XkOKoyHGl/d/mOp16ocIArehGrcwDlYMghi6hkuSCxZUBCczAbzYXhoPQ8kPGv1YJP+LMLEkKBoFjvJpuyA4i09lEKLWV0bc4BYMyowT/61tx7H16CJCqjDU3UbhKqYwjDJFknC7JEKRwHjLN2ZEt3aM40K5lArAYE8oroCfzOzMmlP/5WosaD4Vs3zXp3WTUpGkrGwDFlrbqFA4jw8hub3l1Wfcl5486aM9JYIFPbEK6tP/T0ixveXU4zZ/8hOSJ9oIQcCvYZM2pwfM7HjBrMBuj8XbH3p4Pg2WFVh6ZakFx796hCrxh8JROLxpmzh8cajXlfocKnKlt1AnONObvKgBIUU1s+T/QLw3fpQXuOsnEaLNFrekefyEkGZ54+4ukXKzyZx2ALAExbhJ6/CeGGKyYz1e9LIkaG2s1D4fbFy6oXkx4dh2ck/2cQ6kgqZfoYz0i8MWvz4N5qMkuBaN5JB5ovIXL3lxsKbyIB4medPuLdOIIlutqb2VMvVLz8xqZLzht36cKxJYV5uqps3bK9+ekXN6zeUKPYUowrTaCNfsXPvGDOzMldbmhBZCD7BMtcTUmwlKnXgiF2JQq5+7gsnJOZuk7InAPADVdMrq1vffrFChl9RtS8LwR9lT8iAhnXGlXrqnibssAsofCVhLhFQFHecYnZ4W6aeB1FDg4AQF4w5xc/WpDsJqZjRg0eM2rwlipjRzxE2cRJmJzECrgT0Ro+8vSLFU+/sL6kKA/AYe5nbf0hcBw+QNHcE8m2Z9YTxIp2RHCc4sJgIjG9H98xd/WGmnD4CDgOKiETl091VNSuwSFeL0jSCKAqQCUDaU8BhGS8JIySIuYF+3zzplO6LIUGlHJQrMoJOfmRBemXmYPHUSBdX1woh6IXPlSTpAkzoItCsyHJT/1xjBk1SEwH0Vo2ctOGGqhuSpYwxp14+PG35t71y3c8Kem7LDDuSAnQubC4zcIRnVklFvzJgId/DgiQF+zzrWQasxzkePjXstUHzhlq0sKwiJzlPqlmW+F3RMePn+ulC8f98qGlbI/OWHXpJSfvHwofefqF9U+9sL60MC8UzAmFchxwauoPhSPtrZF2I0O/FSsqK5RpEEfHWPpjQhZPqG/vz9TDWR4ihFtyFhYx6xkJxXSxsp3ix3fMveTcscCX+3GW5Po/aTYQxTF25IZc0SevULQY/lds88SbHnnJvAPqL/Nq5BMX1SLnUCDnof+6MMFpLQO//NECkqMqjn52nmJCv8Nv1tS11tQfWrV+76qKvTUNrTV1hxCUAFSGfF8StdOWyAZoyhuumJII5yWFeT/+1lxZL0LqwP/S+wBqYSurGXIUIKCqGpDOmKxPEKU2+CQkQDUUXtJgMOdHd8xNqkZ0aQtWVaGQs82piycZMqkIpKR8+pG7LVI25MTGHh2ZCw5Bkz8VhVH7qNKngEsXjgsFc0gLl19/aMJRF/JmrFpTrbBr0mfOHqHoqrKRSpF3xKJ0yRiYL5qZ0ASyTSsVZ+QAKuWPk2nMqk94+dcZ0ClmpkkZ+VNmSFvR7iTYVn58x1wwXtHUDbiq4oVz5CFUU9+6eXvz6vU1q9bvra1vbQ23ezIkrcXzT1Wciy7ijVcmpCo9+fv8RF1cKfQfImp54eqF8iZIvdKTMOcA8Mu7zrnkvLE6ec6SS1u/6mCoy0h2Etq/hYx860z1SZ9iu0Q0pAtCXjDnlz9ekHBQ18SYssFnzx4pC8F4k0yCsGo8tSgXvSM4V9aN/Y/yL1o3zRwpFSmrUCBn5pREy3LpwnGXnjdOyQRonqrKVLtRrCqKpJqAFs5s2Sj2BHSN+2yTJpftQMoyOXv2yEsXjkuiGoTuRCEWeYWELu9xrmQ4MxpQFooXgdF30XVl6xayUT4fpnO4YSo8SmZUGyQQ7IEQEfuXrEpiYN95ol4rGl3jAGmZxiXXsmkp+9g17rpzXiiYrbKV+RBlA0BY8fLgERGI5uT/V24iS7MiZTlrTnKNWe9JGv8aFU8RUqgpH+qkF1EJqEe+DSiB2rl04bizZo8wpUpVIs3Ze9p6bOI+qfyqWLuJWFKYd1YCy2yBaDzf/LVrr4ZPWOyGOjUu9a7LL7ra4z0ekjPnICy6JgRT73stAfo9Am8C31eMR4ajYKQBhGAw+xc/PuesOQlVaiz8+M55/EuMGJqS1oThr0jwU4l0aejJjFfM4rC/N141JalB7S/vOmfMqEGxyQF4WjNl0mvRfVSRlAPJytUfiKeAiGfPGXXXnfOSqgJhN/zcWFB0decJUDpJ6UHqPlkE2Zc1yUhegfhnPQjNkZLM6HcQ0zpEmeGOr57Kiuy6OglSI4Bk41XqmLqEMcMpTEBiJYV5zzx4Jc0QRKXoLVZJgDUbEHQ5VwSq8Yi/ikktnfTlVOJZU0vvveucLtk2obcW7le7fg1JMpMpCM7VFhfEJwbw9Cly0SXuunN+XjBHdVJJU+kB9JbRMPmKqHiqd2qU3PLqFnJzXVc0QkDEO25OaPpDuOdam3Fd1eVdtqTL6ErJd25EKgeRFe0OxKETnSURP8ofSZtzALj37nPv+Oqpshsbzq24I7U5gpbAsBbykdewad2eVjyiQVRVeUlR3jMPXnl2erYcAEoK8x75xUVysxcvbwBA7ZdkgBbEdWO5o2bKOPfHjBqcYPiI4pFfXFRcmOfJTbfT4BW7yQkplz971F2IlddZc0bee/c5KZzE6pdlTE+RM5wpexrPicGYjzJEPFEGBX3wdAQ/saXFIwtZMREbhBg3sgK8pGMxlTgzY8oG33XnfFoYb54AnmvweUT5ivV6HN5DwZxf3nVu8o3ZmzMnClR1sEuXNK9MALmuUk6qxgQ1utT6Jka8pCjv4V9exPJGvSkCcZs4D/JwIGXDdWsNWjxJy4GzBZI5+ZOlO3vuqEvPH5+oTGili7MNlMcgO5dHfSaYP+MZpM1yuXRMzaFMmqKYBAkdqZhzAPjWV09hgy0ViiS6X7rHsnbVSjbRpIDXk2wEpAGJ2hT5qebFax1keikNBICz54569Ykvjy3rYgV4ghhbNviub8/XHDRFC1EPL6ufgN5X/DxT+UNKS/5jhXIAIS/Y5967U9AdUFKU9+xDV5YU9tNaIBUjiroj1GXVoaxAF+l9+a5MJrYBNF+XxTl7zqj7UioCZZjkj4afJ51ConlTIeUFPWyItEwAVEeb6O3df//X7gORPOfHJZPHBoeK/1Rx17fn5wVyWP6uXnDaDFQDMzqCUhW0RydK/carp9zx1VNRmCbdsTObrv4PKQOyGbva9AC9UDpHHF7C74eCOc88dGUKK3Jo/p7OIksh6o639LQqSyfPeNDtkiq195HS0olg1pTSu++cLxQGGnJWlS6aKmNJElJ0ZY+nCl61aMqwWXGhUM7d356XuETUnqGiipXk1SOlURBTOSRQVqVQ7aLAYu83jUTa+itFcw4AN1499f0Xby0pymP9C5SmpQ1G3hTnZkphuZR1fqEVjHYuvRKFD6AEHgrm3HXn/PvuOicU7JNyiby47Pzx995zrtHNeVMwlICE6+FcciuLLEQifkgNR/q164aCOffefU7K3klJUd6zD185tmwwp6VHCoB2KNDYkIpEFVkkAwCZkKpPWue0EGfPHXVfSuNyBtEZjPxVD5TtC5D8zASQlA5kzeqcMFYoVxkhnTCLZtOjoiCVAgb/kCqfJUV5995zLqhj5UilmDYhJnvS8ZUiTBx33HLqPczDZsMD1TB99QRRGJp8JIem3VDOtHKS1P2SorxnH74q9dECrQtEqUVoKSQLtF2lDyVq3fkDrYBAii+4Shg3Xj2VV42PnGmTAKILlbRVD/L8Q61SEHzyxLxgzr13n1tS2C9hiXAFR3KTProUlKAlzDB/M2FQDmVZeEmBCgqEJknOwfUidXMOACVFeX978it33HIa+BzFCFQ0pErEHV5g1WhRJZarvancqUvLRcCSnT1n1KO/vPimq6eGQpm05QyXnT/+g0W3lRT1Iz0NVBFUjatCq9+igDKZegrkddFvVLkAQsGce+859+y5o9Jhnln0O249jXCt/ESi+UnHkfXGmUEkrMrBCmh6z6xzxv+dt5x6393npFMpJleScxBLygkPAEqSGYDq1Egzpw2TGBBA15WS6TFohkmpIFRC81qx9Fg8e+6oO249DWjnpvpWM3+G1kWNMdXfk2PnxqunPvvIVSUFIdqMgbZJSQVp8VUych+NBF4RyTtnzx31pzRsuWBJoyg/5JR3AAFdF0CVIiPgJMTcH+jCAc2oqUfJUuFVw+f4DNmSn6CUjio4sXB+dWPUrDxUAxExFMy59+5zFySrKj1UpLlFnaJL5z6SPIuF8GzmTv9rtoxknAaKtMw5AIRCfe685dS/PX39OXNH+dWFwb15B3RhiUc+fdH3urQw755/PeP+e86dNTXFReyJoKQo79lHrlwwZxR4e6SuKUFYSN+Sgl9ZQM+BFb+0MO++e85LuoH6gVXQPd+ez7qZ0rhM7K7mPIKP8MFTQNMLANd8feyowb+97+I7bj0tTQcLXS1bPv/kCpNqloWYlEzAJRNJXABqhoWaLGXZUu2GKYKrQVfIhLtdAKBmwYR+QKk308Sdt5x63z3nhQLZzIdB6eQSSw1E6zIOgbqJirdU+Jk1dcifHr16wZyRtHYAxEQDg9YMOC1XWQFVY4QN8teV40cIhXJuumba/fecW1LULwVuJbRQLVFmqmqEUQNRjkzN3XATRGpGCkeIRbQf4ZSm1o1mTR3y7KNXLZg7SuXAykJ/ulr+fPAmvrkwerauNQGRH94u/5UW5f32vosXzEtOVYrC+xJSFIEIgbfupHq4zFDn2Y+c+pcOEt1GJj7GluU/et/Fm7c3PfjYyreXVIHvJhMxbgIAJv8R/ZDivBuvmX7F+eO6Y0TuRWlRv9/ef/GTf173xJ/XqdNTTKDYFQABHHM/XnO3Bv/X80I5s6YNfeCeczNbrpuumXb2vFEPPvbhon98ovhk+0+bcvfWg8Ew+jwV94YUhzJbL0TjI4j9s3Uz4CimMJZsUyDM6PARlCP3e0CxVaO5L4p6rWegS4JJxpVRaH2fPrI5dSYYvPyC8bOmlv6/X7//zpLtgCDOS2akBEm5ixDXg+KnSxVBipVVUpT32/sveeLP655k/VHVOzHNfPtJoV84OVTNn78AQnoqE7kr1IJ5ZTdfM23W1CGp8anATRlREuJAHyk3vaV3tWd6csSZUZUn6EjFpMqrEiiyqTBQWtTvt/dfIlTlIaRN0SiUtqWjI3ubaTSNOhFv5OX1mTV1yAM/OS81VaOE4N1yydG2ygKhV1IRB82GtD4N9D7bGitVZMacM4wty//t/Zcwo/7h+r2trUcMvhFBHEgujjdg92WC2P1bPiotzrvpmulXXDC+Zww5xU3XTLv8gvEv/uPTJ55fV1t/iHRMb5dERK0stJeYDcNxEDEvlHPKtKGZ0R1+KC3qd/9Pz7v52qm/eWzFO0uqjU4jGxM1lY5q1kj1ocdsIgCUFuUtmF/27bRH5AR0OMl1r3cHK9DjX6hJOn3aRo8WF4QMPXOgh5fCkbLKfZOVwDzNUpdleigt6ve7+y954s/rFr32yaZtTZQlyZrmo1M9jtySpFlVN18z7QrRH2vqD5mPafWh9h96ZAtlQ2lxB0uL8m6+NmN6xhMsENRRsaZte4a+ij9V6i4xT1rOhCfWrDMEoirX0tMj5fwCOMamw6jd0bg3Oc3Ly5k1dejN1047JQ1VqT4F5NSFsxBr9zlXcJ4UFXol2xZoPorDdY08YSZ1ZNKcMzCjvml706p1e9/+YPuq9Xs5i3IrUK4UEQBQbHSKiMKWOLqR5xqptLjfrKlDLv/S+HFl+Xk9bsglQqE+N18z7fILxr+zpGrRa598tG6PPN8QPCMU4v7J+0jS87fyQtmzpg65+dppp0wd2t38jy3L/939l27a3vTOB9vfWVK1aVuT6FvIN9wlDHvGPNoeoqxIeXk5pYX9Lv/ShMsvGJ/xehGtAkhr8NmNEZUwM6eTUJVfVqs0ioI0iKemduwJ6MFzQtoBKjJdaGba9HDzNdNuvmbapu2Nv/n9ytq6Q59uazIiFX4myUH9YNV0IPvjon98sujvumOhcyJ3G3V0V4e4FA4C5uX1GVuWf8WFE86ZNyqzAwYZ6jEY81w7QPpk5oirrZqF9VS9RuvSvswlD2/V0PaAwpuRpBzdozD0JntlSHG/seX5GVCVSo9JesQP1bYdJ6onee9K7UItdqlVEQppy6XBS9uFy7w5ZxhXlj+uLJ919dra1hf/8Ult3aGa+tZDrUc0lunoS9awkMCQ4n55wZwF88tnTS0dV96bVtxAXqjP5RdOuPzCCZu2N360bu+qdXs2b23eq8YHRpNUdscR24w7gKVF/caOzp81deg580eVpjctlyxk7dTUH1r02qer1u7Z29DaGj6imS1WAGIzpRVjzJcU5y2YV37KtNJx5QXdwWReMKe0qJ9miYjmIXfUfUw1JOZFKNSntCjPoKFceA7ZTfndlNfwp4C8UHZpUT/qxwiWdJ41Lp2MrSwgGFdW8H8PXNoaPlJTf+ijdTWbtzXW1LW2ho+EI0d03owaTFN3KeSF+tx8zfSbr5m+aVvjO0u2f7R276btza2tR2ga3RVD7TbAkOJ+xcV558wrO2d+WXd0xpKivCGqOTHCnLSjV5P0dZzMDZbZrD8rOMkWaa1IX0ekhFAoA42ZVs3bS6pWrd2zaXtTays/U8frzfh6nSXFebOmDR1Xnp+p2skLZZdo1cGboh6qUQeTE+8ziToJBXOGFOeRqjRj0uL4Ok3BpVOuTM7QdIma+kM1da219Qf31rXW1B1qjRzhpy4KlBb3ywv2KSnuN6Qor6Q4Ly/Up4ftXMpguqymrnXTtqaaukO19YcAgAXkGfKCffJCOaXF/UqK+g0p7je2fHBpUb/Pj4Mima+tO7S3/mA43N4abg+Hj7ARe16oT14op6SoX2lxvyFFeWNH5/dM1fhEUBNAXjAnfcG2ho+0mgd5JYSebLG9KJ8E0SWH3cQM64+btjZt3ta0t/5QuLXdqFDWE0uL8/JCfU6ZNqS723PvNqfPVTuRqnLV2j2HIu219YcAKYeYF+qbF8opKcorLe43pKjf2NH53aEqe0AmPV/pPWrOLSwsLCwsLLoD6X6oZmFhYWFhYdHrsObcwsLCwsLimIc15xYWFhYWFsc8rDm3sLCwsLA45mHNuYWFhYWFxTEPa84tLCwsLCyOeVhzbmFhYWFhcczDmnMLCwsLC4tjHv8fxghhMDdxPuoAAAAASUVORK5CYII="
                    alt="Lokasi Oson Itensif">
            </div>

            <p class="lokasi-address">
                Sikluwung Asri No. 2, RT.02/RW.01, Tandang, Kec.<br>
                Tembalang, Kota Semarang, Jawa Tengah 50274
            </p>

            <p class="lokasi-desc">
                Lingkungan belajar yang tenang, ramah anak,<br>
                dan mudah diakses dari berbagai wilayah<br>
                Tembalang &amp; Semarang Selatan.
            </p>

            <!-- BUTTON BIRU BUKA LOKASI -->
            <a
                href="https://www.google.com/maps/search/?api=1&query=Oson+Itensif,+Sikluwung+Asri+No.+2,+RT.02%2FRW.01,+Tandang,+Tembalang,+Kota+Semarang,+Jawa+Tengah+50274"
                target="_blank"
                rel="noopener noreferrer"
                class="btn-gmaps">
                Buka Rute di Google Maps
            </a>
        </div>
    </div>

    <p class="lokasi-footer">
        Sejak 19 September 2015, Oson Itensif hadir sebagai teman belajar bagi siswa SD, SMP, dan SMA.<br>
        Mari belajar, bertumbuh, dan meraih prestasi bersama.
    </p>

</section>
</div>


<style id="FINAL-SEMETRIS-REFERENCE">
/* =========================================================
   FINAL — SEMETRIS / RATA TENGAH
   Hanya memperbaiki alignment dan card shadow.
   ========================================================= */

html, body {
    width: 100% !important;
    min-height: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
    overflow-x: hidden !important;
}

body {
    display: block !important;
}

/* Satu garis tengah untuk seluruh halaman */
.canvas-container {
    width: 82% !important;
    max-width: 832px !important;
    margin: 0 auto !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
    box-sizing: border-box !important;
    transform: none !important;
    transform-origin: top center !important;
}

.main-content {
    width: 100% !important;
    margin: 0 auto !important;
    box-sizing: border-box !important;
}

/* Navbar tetap simetris terhadap container */
.navbar {
    width: 100% !important;
    margin-left: auto !important;
    margin-right: auto !important;
    box-sizing: border-box !important;
}

.nav-menu {
    justify-content: center !important;
}

.profile-icon {
    margin-right: 0 !important;
}

/* Hero mengikuti garis kiri container, mascot tetap di sisi kanan */
.hero-section {
    width: 100% !important;
    box-sizing: border-box !important;
}

.mascot-container {
    right: 0 !important;
}

/* Testimoni tepat di tengah */
.testimony-container {
    width: 100% !important;
    margin-left: auto !important;
    margin-right: auto !important;
    box-sizing: border-box !important;
}

/* Paket tepat di tengah dan sejajar dengan testimony */
.package-section {
    width: 100% !important;
    margin-left: auto !important;
    margin-right: auto !important;
    box-sizing: border-box !important;
}

.package-header,
.tab-container,
.cards-grid {
    width: 100% !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
}

.cards-grid {
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    gap: 12px !important;
}

/* BASE PUTIH PAKET: tanpa stroke, hanya shadow */
.pkg-card {
    background: #fff !important;
    border: 0 !important;
    box-shadow: 0 3px 8px rgba(5, 15, 113, .16) !important;
}

.pkg-card:hover {
    border: 0 !important;
    box-shadow: 0 3px 8px rgba(5, 15, 113, .16) !important;
    transform: none !important;
}

/* Lulusan dan lokasi satu garis dengan paket/testimoni */
.feature-lulusan-lokasi {
    width: 82% !important;
    max-width: 832px !important;
    margin: 0 auto !important;
    padding: 0 !important;
    box-sizing: border-box !important;
}

.lulusan-section,
.lokasi-section {
    width: 100% !important;
    max-width: none !important;
    margin-left: auto !important;
    margin-right: auto !important;
    box-sizing: border-box !important;
}

.lulusan-section {
    margin-top: 14px !important;
}

.lokasi-section {
    margin-top: 14px !important;
}

.lokasi-card {
    width: 100% !important;
    box-sizing: border-box !important;
}

.lokasi-footer {
    width: 100% !important;
    text-align: center !important;
    margin-left: auto !important;
    margin-right: auto !important;
}

/* Jangan biarkan media query lama mengubah empat kartu pada ukuran
   tampilan referensi. Tetap empat kolom sampai layar benar-benar sempit. */
@media (max-width: 768px) and (min-width: 521px) {
    .canvas-container {
        width: 82% !important;
        transform: none !important;
    }
    .feature-lulusan-lokasi {
        width: 82% !important;
    }
    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
        gap: 9px !important;
    }
}

@media (max-width: 520px) {
    .canvas-container,
    .feature-lulusan-lokasi {
        width: 90% !important;
    }
    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
        gap: 5px !important;
    }
    .pkg-card {
        min-width: 0 !important;
    }
}
</style>


<style id="FINAL-MATCH-TARGET-DETAIL">
/* =========================================================
   FINAL MATCH — BERDASARKAN GAMBAR TARGET
   HANYA mengatur: lebar, spacing, mascot/chat, gradient,
   dan proporsi kartu paket.
   ========================================================= */

/* ---------- BACKGROUND: BIRU -> PUTIH -> BIRU ---------- */
html, body {
    background: linear-gradient(
        180deg,
        #93BAED 0%,
        #F4F9FF 50%,
        #93BAED 100%
    ) !important;
    background-attachment: fixed !important;
}

/* ---------- CONTAINER: IKUT LEBAR GAMBAR TARGET ---------- */
@media (max-width: 520px) {
    .canvas-container {
        width: 82% !important;
        max-width: 832px !important;
        margin: 0 auto !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
        transform: none !important;
    }

    .feature-lulusan-lokasi {
        width: 82% !important;
        max-width: 832px !important;
        margin-left: auto !important;
        margin-right: auto !important;
    }

    .main-content,
    .hero-section,
    .testimony-container,
    .package-section {
        width: 100% !important;
    }
}

/* ---------- GAJAH: LEBIH KECIL, LEBIH KE KANAN, TURUN SEDIKIT ---------- */
@media (max-width: 520px) {
    .mascot-container {
        right: -7px !important;
        top: 40px !important;
        width: 300px !important;
        z-index: 3 !important;
    }

    .mascot-img {
        width: 100% !important;
        height: auto !important;
    }

    /* CHAT MENEMPEL KE SISI KANAN BASE TESTIMONY */
    .chat-btn {
        right: 1.5% !important;
        bottom: -20px !important;
        width: 68px !important;
    }

    .chat-window {
        right: 1.5% !important;
    }
}

/* ---------- JARAK ANTAR BASE: SEMUA SEDANG DAN SAMA ---------- */

/* Testimoni -> Judul Paket */
@media (max-width: 520px) {
    .package-section {
        width: 100% !important;
        margin-top: 18px !important;
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }

    /* Judul -> tab -> card */
    .package-title {
        margin-bottom: 8px !important;
    }

    .tab-container {
        margin-bottom: 10px !important;
    }

    /* 4 kartu tetap sejajar */
    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
        gap: 7px !important;
    }
}

/* ---------- PAKET: PROPORSI MENGIKUTI TARGET ---------- */
@media (max-width: 520px) {
    .package-section .pkg-card {
        height: 265px !important;
        min-height: 265px !important;
        border-radius: 18px !important;
        border: 0 !important;
        box-shadow: 0 3px 8px rgba(5,15,113,.16) !important;
    }

    .package-section .card-banner-wrapper {
        height: 92px !important;
        min-height: 92px !important;
        flex: 0 0 92px !important;
    }

    .package-section .card-body {
        height: 173px !important;
        min-height: 173px !important;
        padding: 9px 10px 8px !important;
    }

    /* GARIS TETAP 1PX — WARNA GRADASI TETAP */
    .package-section .pkg-card .card-divider {
        width: 94% !important;
        height: 1px !important;
        min-height: 1px !important;
        flex: 0 0 1px !important;
        margin: 6px auto !important;
        border: 0 !important;
        background: linear-gradient(
            90deg,
            #B7B7B7 0%,
            #5C5C5C 50%,
            #B7B7B7 100%
        ) !important;
        opacity: 1 !important;
    }

    /* Jangan mengubah warna banner/gradasi tiap paket */
    .package-section .card-banner-wrapper,
    .package-section .card-banner-wrapper img {
        opacity: 1 !important;
    }
}

/* ---------- JARAK PAKET -> LULUSAN = 18PX ---------- */
@media (max-width: 520px) {
    .feature-lulusan-lokasi {
        padding: 0 !important;
    }
z
    .lulusan-section {
        width: 100% !important;
        margin: 18px auto 0 !important;
    }

    /* ---------- JARAK LULUSAN -> LOKASI = 18PX ---------- */
    .lokasi-section {
        width: 100% !important;
        margin: 18px auto 0 !important;
        padding-bottom: 0 !important;
    }

    .lokasi-card {
        width: 100% !important;
    }
}
</style>


<style id="FOCUS-MASCOT-CHAT-RIGHT">
/* === FOKUS: GAJAH + CHAT SAJA === */
.mascot-container {
    right: -35px !important;
}

.chat-btn {
    right: -5px !important;
}

.chat-window {
    right: -5px !important;
}
</style>


<style id="SPACING-PAKET-LULUSAN-ONLY">
/* HANYA memperkecil jarak Paket -> Lulusan */
@media (max-width: 520px) {
    .package-section {
        padding-bottom: 0 !important;
        margin-bottom: 0 !important;
    }

    .lulusan-section {
        margin-top: 10px !important;
    }
}
</style>


<style id="PAKET-LULUSAN-MEPET-SEKALI">
/* HANYA bagian jarak PAKET -> LULUSAN */
@media (max-width: 520px) {
    .feature-lulusan-lokasi {
        margin-top: -35px !important;
        padding-top: 0 !important;
    }

    .lulusan-section {
        margin-top: 0 !important;
    }
}
</style>


<style id="FINAL-REAL-PACKAGE-LULUSAN-GAP-FIX">
/*
  FIX AKAR JARAK:
  Screenshot referensi berada >520px, jadi override sebelumnya
  yang hanya berada di @media max-width:520px TIDAK PERNAH AKTIF.
  Sekarang aturan ini berlaku pada semua ukuran layar.
*/
.canvas-container {
    padding-bottom: 0 !important;
    margin-bottom: 0 !important;
}

.package-section {
    padding-bottom: 0 !important;
    margin-bottom: 0 !important;
}

.feature-lulusan-lokasi {
    margin-top: 0 !important;
    padding-top: 0 !important;
}

.lulusan-section {
    margin-top: 10px !important;
}
</style>


<style id="FINAL-CORRECT-SPACING-AND-TABS">
/* =========================================================
   FINAL CHECK — HANYA SPACING + LEBAR TAB
   ========================================================= */

/* Testimoni -> Paket: tambah 6px */
.package-section {
    margin-top: 30px !important;
}

/* Paket -> Lulusan: tambah 6px yang benar-benar terlihat */
.feature-lulusan-lokasi {
    margin-top: 0 !important;
    padding-top: 16px !important;
}

/* Lulusan -> Lokasi: tambah 3px */
.lokasi-section {
    margin-top: 13px !important;
}

/* PRIVAT dan KELOMPOK HARUS SAMA-SAMA SELEBAR */
.tab-container {
    display: flex !important;
    gap: 10px !important;
}

.tab-pill {
    width: 74px !important;
    min-width: 74px !important;
    max-width: 74px !important;
    height: auto !important;
    box-sizing: border-box !important;
    padding: 8px 0 !important;
    margin: 0 !important;
    text-align: center !important;
    white-space: nowrap !important;
}
</style>


<style id="VERSI-BARU-PLUS7-PLUS3">
/* VERSI BARU: hanya menambah jarak dan lebar tab */

/* +7px Testimoni -> Paket */
.package-section {
    margin-top: 37px !important;
}

/* +7px Paket -> Lulusan */
.feature-lulusan-lokasi {
    margin-top: 0 !important;
    padding-top: 23px !important;
}

/* +7px Lulusan -> Lokasi */
.lokasi-section {
    margin-top: 20px !important;
}

/* +3px lebar KEDUA tab: Privat dan Kelompok */
.tab-container .tab-pill {
    width: 77px !important;
    min-width: 77px !important;
    max-width: 77px !important;
    box-sizing: border-box !important;
}
</style>


<style id="FINAL-REFERENCE-SPACE-AND-TABS">
/* =========================================================
   FINAL REVISI BERDASARKAN GAMBAR 1-4
   HANYA:
   1) jarak Paket -> Lulusan disamakan dengan referensi
   2) Privat/Kelompok dibuat seperti Daftar/Masuk
   ========================================================= */

/* 1. GAP PAKET -> LULUSAN
   Target visual sekitar 42px dari bawah kartu paket
   ke atas base Lulusan. */
.feature-lulusan-lokasi {
    margin-top: 42px !important;
    padding-top: 0 !important;
}

/* 2. TAB PRIVAT / KELOMPOK
   Dibuat seperti tombol Daftar / Masuk:
   tinggi 46px, radius 100px, font 16px.
   Lebar keduanya sama dan lebih besar dari versi sekarang. */
.tab-container {
    display: flex !important;
    align-items: center !important;
    gap: 16px !important;
    margin-bottom: 16px !important;
}

.tab-container .tab-pill {
    width: 108px !important;
    min-width: 108px !important;
    max-width: 108px !important;
    height: 46px !important;
    min-height: 46px !important;
    padding: 0 !important;
    border-radius: 100px !important;
    font-family: 'Poppins', sans-serif !important;
    font-size: 16px !important;
    font-weight: 700 !important;
    line-height: 1 !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    text-align: center !important;
    box-sizing: border-box !important;
}

.tab-container .tab-pill.active {
    background: linear-gradient(90deg, #050F71 0%, #78B0ED 100%) !important;
}

.tab-container .tab-pill.inactive {
    background: #78B0ED !important;
}
</style>


<style id="FINAL-DETAIL-SPACE-AND-TAB-BASE-ONLY">
/* =========================================================
   REVISI BERDASARKAN PERBANDINGAN GAMBAR
   1) Lulusan -> Lokasi disamakan dengan Paket -> Lulusan
   2) Privat/Kelompok: BASE diubah, FONT TETAP TIDAK BOLD
   ========================================================= */

/* 1. JARAK LULUSAN -> LOKASI = JARAK PAKET -> LULUSAN */
.lokasi-section {
    margin-top: 42px !important;
}

/* 2. HANYA BASE TOMBOL DIUBAH
      FONT DIKEMBALIKAN: 15px, weight 500 */
.tab-container {
    gap: 16px !important;
}

.tab-container .tab-pill {
    width: 108px !important;
    min-width: 108px !important;
    max-width: 108px !important;
    height: 46px !important;
    min-height: 46px !important;
    padding: 0 !important;
    border-radius: 100px !important;
    font-size: 15px !important;
    font-weight: 500 !important;
    line-height: 1 !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-sizing: border-box !important;
}

.tab-container .tab-pill.active {
    background: linear-gradient(90deg, #050F71 0%, #78B0ED 100%) !important;
}

.tab-container .tab-pill.inactive {
    background: #78B0ED !important;
}
</style>


<style id="FINAL-LOCATION-3LEFT-2RIGHT-DIVIDER-VISIBLE">
/* =========================================================
   HANYA 2 REVISI:
   1) Base lokasi: kiri -3px, kanan -2px
   2) Garis divider paket: wajib terlihat, 1px, gradasi tetap
   ========================================================= */

/* BASE LOKASI */
.lokasi-section {
    width: calc(100% - 5px) !important;
    max-width: none !important;
    margin-left: 3px !important;
    margin-right: 2px !important;
    box-sizing: border-box !important;
}

.lokasi-card {
    width: 100% !important;
    max-width: none !important;
    box-sizing: border-box !important;
}

/* GARIS PAKET — JANGAN HILANG */
.package-section .pkg-card .card-divider {
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
    width: 94% !important;
    height: 1px !important;
    min-height: 1px !important;
    flex: 0 0 1px !important;
    margin: 7px auto 8px !important;
    border: 0 !important;
    background: linear-gradient(
        90deg,
        #B7B7B7 0%,
        #5C5C5C 50%,
        #B7B7B7 100%
    ) !important;
}
</style>


<style id="FINAL-LAST-BACKGROUND-CHAT">
/* =========================================================
   LAST REVISION — HANYA:
   1) area putih background diperlebar ke atas
   2) chat window saat dibuka = tengah vertikal, rata kanan
   ========================================================= */

/* 1. BACKGROUND:
   putih dimulai lebih tinggi dan tetap mengalir ke biru di bawah */
html, body {
    background: linear-gradient(
        180deg,
        #93BAED 0%,
        #EAF3FE 30%,
        #FFFFFF 55%,
        #DCEBFA 78%,
        #93BAED 100%
    ) !important;
    background-attachment: fixed !important;
}

/* 2. CHAT WINDOW:
   saat open, posisi berada di tengah vertikal dan rata kanan */
.chat-window.open {
    display: flex !important;
    top: 50% !important;
    right: 2% !important;
    bottom: auto !important;
    transform: translateY(-50%) !important;
}

/* Desktop/default: ukuran asli tetap dipertahankan */
@media (min-width: 901px) {
    .chat-window.open {
        right: 2% !important;
        top: 50% !important;
        bottom: auto !important;
        transform: translateY(-50%) !important;
    }
}

/* Tablet/mobile: tetap tengah vertikal + rata kanan,
   tanpa mengubah ukuran jendela yang sudah ada. */
@media (max-width: 900px) {
    .chat-window.open {
        right: 2% !important;
        top: 50% !important;
        bottom: auto !important;
        transform: translateY(-50%) !important;
    }
}
</style>


<style id="FINAL-BACKGROUND-SCROLL-CHAT-BOUNDARY">
/* =========================================================
   LAST REVISION — HANYA 2 BAGIAN:
   1) background putih diturunkan sedikit
   2) chat window saat dibuka diposisikan di tengah area
      sampai batas bawah base testimony, bukan di tengah viewport
   ========================================================= */

/* 1. BACKGROUND:
   Putih mulai sedikit lebih rendah daripada versi sebelumnya,
   dan background ikut bergerak saat halaman di-scroll. */
html {
    background: #93BAED !important;
}

body {
    background: linear-gradient(
        180deg,
        #93BAED 0%,
        #EAF3FE 34%,
        #FFFFFF 60%,
        #DCEBFA 82%,
        #93BAED 100%
    ) !important;
    background-attachment: scroll !important;
    background-repeat: no-repeat !important;
    background-size: 100% 100% !important;
}

/* 2. CHAT:
   Tetap rata kanan, tetapi pusat vertikalnya sekarang mengikuti
   area dari bagian atas sampai batas bawah base testimony.
   Ukuran chat window TETAP, hanya posisi yang berubah. */
.chat-window.open {
    right: 2% !important;
    top: 385px !important;
    bottom: auto !important;
    transform: translateY(-50%) !important;
}

/* Jangan ubah ukuran/layout komponen lain pada breakpoint. */
@media (max-width: 900px) {
    .chat-window.open {
        right: 2% !important;
        top: 385px !important;
        bottom: auto !important;
        transform: translateY(-50%) !important;
    }
}
</style>


<style id="FINAL-BACKGROUND-SYMMETRIC-CHAT-IN-TESTIMONY">
/* =========================================================
   LAST REVISION — HANYA:
   A. Background: biru atas = biru bawah, biru bawah lebih tinggi
   B. Chat open: rata kanan dan terpusat terhadap BASE TESTIMONY
   C. Tidak mengubah layout komponen lain
   ========================================================= */

/* A. BACKGROUND — warna atas dan bawah sama */
html {
    background: #93BAED !important;
}

body {
    background: linear-gradient(
        180deg,
        #93BAED 0%,
        #93BAED 18%,
        #EAF3FE 34%,
        #FFFFFF 50%,
        #FFFFFF 61%,
        #DCEBFA 70%,
        #93BAED 82%,
        #93BAED 100%
    ) !important;
    background-attachment: scroll !important;
    background-repeat: no-repeat !important;
    background-size: 100% 100% !important;
}

/* B. Chat — posisi dihitung mengikuti base testimony */
.chat-window.open {
    right: var(--chat-right-to-testimony, 18%) !important;
    top: var(--chat-top-in-testimony, 0px) !important;
    bottom: auto !important;
    transform: none !important;
}
</style>

<style id="FINAL-EXACT-GRADIENT-SIZE-CHAT-TESTIMONY">
/* =========================================================
   FINAL:
   1) Pakai warna gradient yang sudah ada; hanya ubah POSISI/UKURAN
      area warnanya agar mengikuti patokan screenshot pertama.
   2) Chat ketika dibuka menempel pada area base testimony:
      kanan = kanan testimony, bawah = dekat batas bawah testimony.
   ========================================================= */

/* BACKGROUND — warna tetap, hanya stop/ukuran area yang diubah */
html {
    background: #93BAED !important;
}

body {
    background: linear-gradient(
        180deg,
        #93BAED 0%,
        #93BAED 8%,
        #DDEBFA 24%,
        #F6FAFE 39%,
        #FFFFFF 48%,
        #FFFFFF 55%,
        #EAF3FE 63%,
        #CCE0F9 73%,
        #93BAED 86%,
        #93BAED 100%
    ) !important;
    background-attachment: scroll !important;
    background-repeat: no-repeat !important;
    background-size: 100% 100% !important;
}

/* CHAT — jangan ubah ukuran/layout, hanya posisi saat open */
.chat-window.open {
    position: absolute !important;
    right: auto !important;
    left: auto !important;
    top: auto !important;
    bottom: auto !important;
    transform: none !important;
}
</style>

<style id="FINAL-GRADIENT-30PCT-CHAT-STABLE">
/* =========================================================
   FINAL:
   A. Biru atas dikurangi 30%
   B. Putih dinaikkan 30%
   C. Biru bawah dinaikkan 30%
   D. Chat stabil saat diklik, tetap mengikuti BASE TESTIMONY
   ========================================================= */

/* A-C. WARNA TETAP, HANYA UKURAN AREA GRADIENT DIUBAH */
html {
    background: #93BAED !important;
}

body {
    background: linear-gradient(
        180deg,
        #93BAED 0%,
        #93BAED 8%,
        #DDEBFA 19%,
        #F6FAFE 28%,
        #FFFFFF 36%,
        #FFFFFF 44%,
        #EAF3FE 51%,
        #CCE0F9 57%,
        #93BAED 64%,
        #93BAED 100%
    ) !important;
    background-attachment: scroll !important;
    background-repeat: no-repeat !important;
    background-size: 100% 100% !important;
}

/* D. CHAT — POSISI DINAMIS, TIDAK MENGUBAH UKURAN / LAYOUT */
.chat-window.open {
    position: fixed !important;
    right: auto !important;
    bottom: auto !important;
    transform: none !important;
    left: auto !important;
    top: auto !important;
}
</style>

<style id="FINAL-SMOOTH-GRADIENT">
html {
    background: #93BAED !important;
}

body {
    background: linear-gradient(
        180deg,
        #93BAED 0%,
        #93BAED 8%,
        #A9C8EF 14%,
        #C8DEF7 20%,
        #DDEBFA 26%,
        #EEF5FC 32%,
        #F6FAFE 36%,
        #FFFFFF 40%,
        #FFFFFF 44%,
        #FFFFFF 48%,
        #F9FCFF 52%,
        #EFF6FC 56%,
        #EAF3FE 60%,
        #DCECFB 64%,
        #CCE0F9 68%,
        #B5D1F2 74%,
        #9DC1EB 80%,
        #93BAED 86%,
        #93BAED 100%
    ) !important;
    background-attachment: scroll !important;
    background-repeat: no-repeat !important;
    background-size: 100% 100% !important;
}
</style>






<style id="FINAL-CHAT-SEND-ICON-LEFT-ONLY">
/* HANYA ICON KIRIM — digeser sedikit ke kiri */
.chat-send svg {
    transform: translateX(-7px) !important;
}
</style>


<style id="FINAL-FLOATING-CHAT-ICON-LEFT-ONLY">
/* HANYA ICON CHAT DI LUAR BASE TESTIMONY — geser sedikit ke kiri */
.chat-btn {
    right: 3px !important;
}
</style>


<style id="FINAL-FLOATING-CHAT-ICON-RIGHT-3PX">
/* HANYA ICON CHAT: geser 3px ke kanan */
.chat-btn {
    right: 0px !important;
}
</style>

<style id="FINAL-ONLY-PACKAGE-DIVIDER-GRADIENT">
/* HANYA mengembalikan garis 1px pada paket — bagian lain tidak disentuh */
.package-section .pkg-card .card-divider {
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
    width: 94% !important;
    height: 1px !important;
    min-height: 1px !important;
    flex: 0 0 1px !important;
    margin: 7px auto 8px !important;
    padding: 0 !important;
    border: 0 !important;
    border-top: 0 !important;
    background-color: transparent !important;
    background-image: linear-gradient(90deg, #B7B7B7 0%, #5C5C5C 50%, #B7B7B7 100%) !important;
    background-repeat: no-repeat !important;
    background-size: 100% 1px !important;
    position: relative !important;
    z-index: 999 !important;
}
</style>

<style id="FINAL-ONLY-CHECK-CIRCLE-FIX">
/* HANYA PERBAIKAN ICON CENTANG — bagian lain tidak disentuh */
.package-section .pkg-card .check-icon-circle {
    width: 13px !important;
    height: 13px !important;
    min-width: 13px !important;
    min-height: 13px !important;
    flex: 0 0 13px !important;
    aspect-ratio: 1 / 1 !important;
    border-radius: 50% !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-sizing: border-box !important;
    overflow: hidden !important;
}

.package-section .pkg-card .check-icon-circle svg {
    width: 9px !important;
    height: 9px !important;
    flex: 0 0 9px !important;
    display: block !important;
}

.package-section .pkg-card .check-icon-circle svg path {
    fill: none !important;
    stroke: #FFFFFF !important;
    stroke-width: 2.35 !important;
    stroke-linecap: round !important;
    stroke-linejoin: round !important;
}

/* Package action remains visually identical after becoming a real link. */
.package-section .btn-pilih-paket {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    text-decoration: none !important;
    box-sizing: border-box !important;
}
</style>

</body>
</html>
