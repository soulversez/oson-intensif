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
            top: 30px;
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
            cursor: pointer;
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
            align-self: flex-end;
            background: #050F71;
            border-radius: 25px 25px 25px 0;
        }

        .chat-message.user {
            align-self: flex-start;
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
    margin-top: 42px;
    padding-bottom: 80px;
    width: 100%;
}
.package-section .cards-grid {
    width: 100%;
}


/* ===== FINAL SCROLL FIX ===== */
html, body {
    width: 100%;
    min-height: 100%;
    height: auto;
    overflow-x: hidden;
    overflow-y: auto;
}

body {
    display: block;
    align-items: initial;
    justify-content: initial;
}

.canvas-container {
    width: min(1100px, 100%);
    min-height: 0;
    height: auto;
    margin: 0 auto;
    padding-bottom: 80px;
    overflow: visible;
}

.main-content {
    width: 100%;
    height: auto;
    min-height: 0;
    overflow: visible;
}

.package-section {
    display: block;
    position: relative;
    width: 100%;
    height: auto;
    min-height: 0;
    margin: 42px 0 0;
    padding: 0 0 100px;
    clear: both;
    overflow: visible;
    z-index: 10;
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
    width: min(1008px, calc(100% - 32px));
    margin-left: auto;
    margin-right: auto;
    margin-top: 34px;
    padding-bottom: 56px;
}

.package-header {
    margin-bottom: 12px;
}

.package-title {
    font-size: 36px;
    line-height: 1.12;
}

.filter-trigger-btn {
    padding: 0;
}

.filter-trigger-btn svg {
    width: 28px;
    height: 28px;
}

.tab-container {
    gap: 12px;
    margin-bottom: 20px;
}

.tab-pill {
    font-size: 15px;
    padding: 7px 28px;
    min-width: 132px;
    height: 44px;
}

.cards-grid {
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 20px;
    align-items: stretch;
}

.pkg-card {
    height: 180px;
    min-height: 360px;
    border-radius: 24px;
    box-shadow: none;
    border: 1px solid #d8e2ee;
}

.card-banner-wrapper {
    height: 123px;
    min-height: 123px;
}

.card-body {
    padding: 14px 16px 16px;
    min-height: 0;
    flex: 1 1 auto;
}

.card-title {
    font-size: 18px;
    line-height: 1.15;
}

.card-subtitle {
    font-size: 12px;
    margin-bottom: 13px;
    line-height: 1.15;
}

.card-facilities {
    margin-bottom: 10px;
    flex: 0 0 auto;
}

.card-facilities li {
    font-size: 13px;
    margin-bottom: 8px;
    gap: 8px;
}

.check-icon-circle {
    width: 18px;
    height: 18px;
}

.card-divider {
    margin-top: auto;
    margin-bottom: 10px;
}

.card-price {
    font-size: 13px;
    margin-bottom: 10px;
}

.btn-pilih-paket {
    height: 38px;
    min-height: 38px;
    font-size: 14px;
}

/* Keep four cards in the reference layout on desktop. */
@media (max-width: 1100px) and (min-width: 769px) {
    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 14px;
    }
    .pkg-card {
        height: 340px;
        min-height: 340px;
    }
    .card-banner-wrapper {
        height: 110px;
        min-height: 110px;
    }
}

/* On genuinely narrow phones, switch cleanly instead of scaling the whole page. */
@media (max-width: 768px) {
    .package-section {
        width: calc(100% - 28px);
    }
    .cards-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }
    .pkg-card {
        height: 330px;
        min-height: 330px;
    }
    .card-banner-wrapper {
        height: 105px;
        min-height: 105px;
    }
}

@media (max-width: 520px) {
    .cards-grid {
        grid-template-columns: 1fr;
    }
}


/* =========================================================
   PAKET LES — FINAL VISUAL MATCH
   ========================================================= */
.package-section {
    width: 82%;
    margin: 24px 0 55px 0;
    padding: 0;
    background: transparent;
    position: relative;
    box-sizing: border-box;
}

.package-header {
    width: 100%;
    margin: 0 0 8px 0;
    min-height: 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.package-title {
    margin: 0;
    font-size: 30px;
    line-height: 1.05;
    font-weight: 700;
}

.filter-trigger-btn {
    width: 24px;
    height: 24px;
    padding: 0;
    margin: 0;
}

.filter-trigger-btn svg {
    width: 20px;
    height: 20px;
}

.tab-container {
    margin: 0 0 14px 0;
    gap: 8px;
}

.tab-pill {
    height: 32px;
    min-height: 32px;
    min-width: 88px;
    padding: 0 18px;
    border-radius: 18px;
    font-size: 11px;
    font-weight: 500;
}

.cards-grid {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 12px;
    align-items: stretch;
}

.pkg-card {
    width: 100%;
    height: 360px;
    min-height: 360px;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid #d8e2ee;
    box-shadow: 0 1px 3px rgba(5,15,113,.08);
    transform: none;
}

.pkg-card:hover {
    transform: none;
    box-shadow: 0 1px 3px rgba(5,15,113,.08);
}

.card-banner-wrapper {
    width: 100%;
    height: 123px;
    min-height: 123px;
}

.card-banner-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card-body {
    padding: 12px 14px 14px;
    height: 237px;
    min-height: 237px;
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
}

.card-header-row {
    margin-bottom: 2px;
}

.card-title {
    font-size: 17px;
    line-height: 1.1;
    font-weight: 700;
}

.badge-offline {
    font-size: 9px;
    padding: 3px 8px;
    line-height: 1;
}

.card-subtitle {
    font-size: 10px;
    line-height: 1.2;
    margin-bottom: 12px;
}

.card-facilities {
    margin: 0 0 0 0;
    flex: 1 1 auto;
}

.card-facilities li {
    font-size: 10.5px;
    line-height: 1.2;
    margin-bottom: 7px;
    gap: 7px;
}

.check-icon-circle {
    width: 15px;
    height: 15px;
}

.check-icon-circle svg {
    width: 9px;
    height: 9px;
}

.card-divider {
    margin: 8px 0 8px 0;
}

.card-price {
    font-size: 10.5px;
    line-height: 1.2;
    margin-bottom: 9px;
}

.btn-pilih-paket {
    width: 100%;
    height: 36px;
    min-height: 36px;
    border-radius: 18px;
    font-size: 12px;
    font-weight: 600;
}

/* Keep the 4-column reference layout on the desktop/tablet viewport used
   in the supplied screenshot. */
@media (max-width: 992px) and (min-width: 577px) {
    .package-section {
        width: 82%;
        margin-left: 0;
        margin-right: 0;
    }

    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 9px;
    }

    .pkg-card {
        height: 300px;
        min-height: 300px;
    }

    .card-banner-wrapper {
        height: 100px;
        min-height: 100px;
    }

    .card-body {
        height: 200px;
        min-height: 200px;
        padding: 9px 10px 10px;
    }

    .card-title { font-size: 13px; }
    .card-subtitle, .card-facilities li, .card-price { font-size: 8px; }
    .badge-offline { font-size: 7px; }
    .btn-pilih-paket { height: 28px; min-height: 28px; font-size: 9px; }
}

@media (max-width: 576px) {
    .package-section {
        width: 82%;
    }

    .cards-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
    }

    .package-title {
        font-size: 24px;
    }
}


/* FINAL: sedikit lebih pendek, tetap proporsional */
.pkg-card{height:370px;min-height:370px;}
.card-banner-wrapper{height:127px;min-height:127px;flex:0 0 127px;}
.card-body{height:243px;min-height:243px;padding:13px 15px 13px;}
.btn-pilih-paket{height:37px;min-height:37px;flex:0 0 37px;}

/* =========================================================
   FINAL PACKAGE MATCH — FOLLOWING REFERENCE IMAGE 2
   ========================================================= */

/* Filter intentionally removed for this version */
.filter-trigger-btn {
    display: none;
}

/* Section width and position stay centered and compact */
.package-section {
    width: 82%;
    margin: 24px auto 42px;
    padding: 0;
}

/* Title gradient: LIGHT AT TOP -> DARK AT BOTTOM */
.package-title {
    font-size: 36px;
    font-weight: 700;
    line-height: 1.1;
    background: linear-gradient(
        180deg,
        #78B0ED 0%,
        #050F71 100%
    );
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Tabs: larger like the reference */
.tab-container {
    gap: 10px;
    margin: 0 0 16px;
}

.tab-pill {
    height: 39px;
    min-height: 39px;
    min-width: 108px;
    padding: 0 24px;
    border-radius: 22px;
    font-size: 15px;
    font-weight: 500;
}

/* Cards: shorter, but not cramped */
.cards-grid {
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 14px;
    align-items: stretch;
}

.pkg-card {
    height: 315px;
    min-height: 315px;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(5,15,113,.07);
}

.card-banner-wrapper {
    height: 106px;
    min-height: 106px;
    flex: 0 0 106px;
}

.card-body {
    height: 209px;
    min-height: 209px;
    padding: 11px 13px 12px;
    box-sizing: border-box;
}

.card-title {
    font-size: 16px;
    line-height: 1.1;
    font-weight: 700;
}

.badge-offline {
    font-size: 8px;
    padding: 3px 7px;
}

.card-subtitle {
    font-size: 9px;
    line-height: 1.15;
    margin-bottom: 10px;
}

.card-facilities {
    flex: 1 1 auto;
}

.card-facilities li {
    font-size: 9.5px;
    line-height: 1.15;
    margin-bottom: 6px;
    gap: 7px;
}

.check-icon-circle {
    width: 14px;
    height: 14px;
}

.check-icon-circle svg {
    width: 8px;
    height: 8px;
}

.card-divider {
    margin: 7px 0 7px;
}

.card-price {
    font-size: 10.5px;
    margin-bottom: 7px;
}

.btn-pilih-paket {
    height: 33px;
    min-height: 33px;
    flex: 0 0 33px;
    border-radius: 18px;
    font-size: 11.5px;
}

/* Keep the same compact proportion on the viewport used by the reference. */
@media (max-width: 992px) and (min-width: 577px) {
    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 10px;
    }

    .pkg-card {
        height: 300px;
        min-height: 300px;
    }

    .card-banner-wrapper {
        height: 101px;
        min-height: 101px;
    }

    .card-body {
        height: 199px;
        min-height: 199px;
        padding: 10px 11px;
    }

    .card-title { font-size: 14px; }
    .card-subtitle,
    .card-facilities li,
    .card-price { font-size: 8px; }
    .badge-offline { font-size: 6.5px; }
    .btn-pilih-paket {
        height: 29px;
        min-height: 29px;
        flex-basis: 29px;
        font-size: 8px;
    }
}


/* ===== FINAL ALIGNMENT: PACKAGE EXACTLY UNDER TESTIMONY ===== */
.package-section {
    width: 82%;
    margin-left: 0;
    margin-right: 0;
    margin-top: 24px;
    padding: 0;
    box-sizing: border-box;
}

.package-header,
.tab-container,
.cards-grid {
    width: 100%;
}

/* Keep same left edge as testimony */
.package-header,
.tab-container,
.cards-grid {
    margin-left: 0;
}

/* Preserve four equal cards and their proportions */
.cards-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 14px;
}

/* Keep the package section visually compact like reference 2 */
.pkg-card {
    height: 315px;
    min-height: 315px;
}

.card-banner-wrapper {
    height: 106px;
    min-height: 106px;
}

.card-body {
    height: 209px;
    min-height: 209px;
}

/* Tablet rule should also stay left-aligned with testimony */
@media (max-width: 992px) and (min-width: 577px) {
    .package-section {
        width: 82%;
        margin-left: 0;
        margin-right: 0;
    }

    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 10px;
    }
}


/* =========================================================
   KELOMPOK — MATCH REFERENCE IMAGE
   ========================================================= */

/* Filter remains hidden. */
.filter-trigger-btn { display: none; }

/* Keep 4 equal cards in one row and same left edge as testimony. */
.package-section {
    width: 82%;
    margin-left: 0;
    margin-right: 0;
}

.cards-grid {
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 14px;
}

/* Group reference proportions */
.pkg-card {
    height: 315px;
    min-height: 315px;
    border-radius: 20px;
}

.card-banner-wrapper {
    height: 106px;
    min-height: 106px;
    flex: 0 0 106px;
}

.card-body {
    height: 209px;
    min-height: 209px;
    padding: 13px 14px 12px;
}

/* Header */
.package-title {
    font-size: 36px;
    line-height: 1.1;
    background: linear-gradient(180deg, #78B0ED 0%, #050F71 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.tab-container {
    gap: 10px;
    margin-bottom: 14px;
}

.tab-pill {
    height: 39px;
    min-height: 39px;
    min-width: 108px;
    padding: 0 24px;
    font-size: 15px;
    font-weight: 500;
    border-radius: 22px;
}

/* Card text */
.card-title {
    font-size: 17px;
    line-height: 1.1;
    font-weight: 700;
}

.badge-offline {
    font-size: 8px;
    padding: 3px 8px;
}

.card-subtitle {
    font-size: 10px;
    margin-bottom: 13px;
}

.card-facilities {
    flex: 1 1 auto;
    margin-bottom: 0;
}

.card-facilities li {
    font-size: 10.5px;
    margin-bottom: 7px;
    gap: 7px;
}

.check-icon-circle {
    width: 15px;
    height: 15px;
}

.check-icon-circle svg {
    width: 9px;
    height: 9px;
}

.card-divider {
    margin: 7px 0;
}

.card-price {
    font-size: 12px;
    margin-bottom: 8px;
}

.btn-pilih-paket {
    height: 36px;
    min-height: 36px;
    flex: 0 0 36px;
    border-radius: 18px;
    font-size: 12px;
}


/* ===== FINAL KELOMPOK VISUAL MATCH ===== */
.package-title {
    font-size: 36px;
    font-weight: 700;
    line-height: 1.1;
    background: linear-gradient(180deg, #78B0ED 0%, #050F71 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Same tab typography and size */
.tab-pill {
    min-width: 108px;
    height: 39px;
    min-height: 39px;
    padding: 0 24px;
    font-size: 15px;
    line-height: 1;
    font-weight: 500;
}

/* Four equal cards; keep titles on one line */
.cards-grid {
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 14px;
    align-items: stretch;
}

.pkg-card {
    height: 315px;
    min-height: 315px;
    border-radius: 20px;
}

.card-banner-wrapper {
    height: 106px;
    min-height: 106px;
    flex-basis: 106px;
}

.card-body {
    height: 209px;
    min-height: 209px;
    padding: 12px 14px 12px;
}

.card-header-row {
    width: 100%;
    min-height: 22px;
    align-items: center;
}

.card-title {
    font-size: 16px;
    line-height: 1;
    font-weight: 700;
    white-space: nowrap;
    overflow: visible;
}

.badge-offline {
    font-size: 8px;
    font-weight: 500;
    padding: 3px 8px;
    line-height: 1;
    flex: 0 0 auto;
}

.card-subtitle {
    font-size: 10px;
    line-height: 1.15;
    margin-bottom: 11px;
    white-space: nowrap;
}

.card-facilities {
    flex: 1 1 auto;
}

.card-facilities li {
    font-size: 10px;
    line-height: 1.15;
    font-weight: 500;
    margin-bottom: 7px;
    gap: 7px;
}

.card-price {
    font-size: 12px;
    line-height: 1;
    font-weight: 500;
    margin-bottom: 8px;
    white-space: nowrap;
}

.btn-pilih-paket {
    height: 36px;
    min-height: 36px;
    flex-basis: 36px;
    border-radius: 18px;
    font-size: 12px;
    font-weight: 600;
}

/* Never wrap SMA/K title; keep every title same baseline */
.pkg-card:nth-child(4) .card-title {
    font-size: 16px;
    white-space: nowrap;
}


/* ===== FINAL GROUP CARD ALIGNMENT ===== */

/* Divider line: visible and consistent */
.card-divider {
    display: block;
    width: 100%;
    height: 1px;
    border: 0;
    background: #D7D7D7;
    opacity: 1;
    margin: 9px 0 9px;
    flex: 0 0 1px;
}

/* Keep all card bodies as a flex column so lower elements align */
.card-body {
    display: flex;
    flex-direction: column;
    align-items: stretch;
}

/* Facilities sit in the same vertical start line in all cards */
.card-facilities {
    margin: 0;
    padding: 0;
    flex: 1 1 auto;
}

.card-facilities li {
    display: flex;
    align-items: center;
    min-height: 18px;
    margin-bottom: 7px;
}

/* Fix top alignment: TK and SMA/K have the same facility block start */
.card-subtitle {
    margin-bottom: 13px;
}

.card-facilities .check-icon-circle {
    flex: 0 0 15px;
    width: 15px;
    height: 15px;
}

/* Keep price + button at the same baseline across all four cards */
.card-price {
    margin-top: auto;
    margin-bottom: 8px;
}

.btn-pilih-paket {
    margin-top: 0;
}

/* Prevent SMA/K subtitle and title from shifting the facility block */
.card-title,
.card-subtitle {
    white-space: nowrap;
    overflow: visible;
}

.card-title {
    line-height: 1;
}

/* Keep equal visual baseline for all four cards */
.pkg-card {
    display: flex;
    flex-direction: column;
}


/* =========================================================
   KELOMPOK — FINAL MATCH TO REFERENCE IMAGE 2
   ========================================================= */

/* Content block: narrower and aligned like the reference. */
.package-section {
    width: 78%;
    margin-left: 0;
    margin-right: auto;
    margin-top: 18px;
    padding-bottom: 36px;
}

/* Title */
.package-title {
    font-size: 36px;
    line-height: 1.05;
    font-weight: 700;
    margin: 0 0 8px 0;
    background: linear-gradient(180deg, #78B0ED 0%, #050F71 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Target reference shows the filter mark at the upper-right.
   Keep it visual-only; no filter interaction. */
.filter-trigger-btn {
    display: flex;
    width: 25px;
    height: 25px;
    padding: 0;
    cursor: default;
}
.filter-trigger-btn svg {
    width: 23px;
    height: 23px;
}

/* Tabs */
.tab-container {
    gap: 10px;
    margin-bottom: 15px;
}
.tab-pill {
    height: 37px;
    min-height: 37px;
    min-width: 104px;
    padding: 0 22px;
    border-radius: 20px;
    font-size: 15px;
    font-weight: 500;
}

/* Four equal cards, tighter than current version. */
.cards-grid {
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 14px;
    align-items: stretch;
}

.pkg-card {
    height: 272px;
    min-height: 272px;
    border-radius: 18px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    box-shadow: 0 1px 3px rgba(5,15,113,.07);
}

.card-banner-wrapper {
    height: 92px;
    min-height: 92px;
    flex: 0 0 92px;
}

.card-body {
    height: 180px;
    min-height: 180px;
    padding: 10px 12px 10px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
}

/* Consistent title + badge baseline */
.card-header-row {
    min-height: 20px;
    margin-bottom: 1px;
    align-items: center;
}
.card-title {
    font-size: 16px;
    line-height: 1;
    font-weight: 700;
    white-space: nowrap;
}
.badge-offline {
    font-size: 7px;
    padding: 3px 7px;
    line-height: 1;
    white-space: nowrap;
}

/* Subtitle and check-list aligned at identical vertical starts. */
.card-subtitle {
    font-size: 9px;
    line-height: 1.1;
    margin: 0 0 8px;
    white-space: nowrap;
}
.card-facilities {
    margin: 0;
    padding: 0;
    flex: 1 1 auto;
}
.card-facilities li {
    font-size: 9px;
    line-height: 1.1;
    font-weight: 500;
    margin-bottom: 5px;
    gap: 6px;
    min-height: 15px;
    align-items: center;
}
.check-icon-circle {
    width: 13px;
    height: 13px;
    min-width: 13px;
}
.check-icon-circle svg {
    width: 8px;
    height: 8px;
}

/* Divider: visible and consistently positioned. */
.card-divider {
    width: 100%;
    height: 1px;
    margin: 6px 0 6px;
    background: #D6D6D6;
    opacity: 1;
    flex: 0 0 1px;
}

/* Price/button baseline */
.card-price {
    font-size: 10px;
    line-height: 1;
    margin: 0 0 6px;
    white-space: nowrap;
}
.btn-pilih-paket {
    height: 31px;
    min-height: 31px;
    flex: 0 0 31px;
    border-radius: 17px;
    font-size: 10.5px;
    font-weight: 600;
    margin: 0;
}

/* Do not wrap SMA/K or alter its bold size. */
.pkg-card:nth-child(4) .card-title {
    font-size: 16px;
    white-space: nowrap;
}

/* Reference viewport: preserve four columns. */
@media (max-width: 992px) and (min-width: 577px) {
    .package-section {
        width: 78%;
    }
    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 10px;
    }
    .pkg-card {
        height: 255px;
        min-height: 255px;
    }
    .card-banner-wrapper {
        height: 86px;
        min-height: 86px;
    }
    .card-body {
        height: 169px;
        min-height: 169px;
        padding: 9px 10px;
    }
    .card-title { font-size: 13px; }
    .card-subtitle, .card-facilities li { font-size: 7.5px; }
    .card-price { font-size: 8.5px; }
    .btn-pilih-paket {
        height: 28px;
        min-height: 28px;
        flex-basis: 28px;
        font-size: 8px;
    }
}


/* ===== FINAL OFFLINE BADGE SYMMETRY ===== */
.card-header-row {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
}

.card-title {
    flex: 1 1 auto;
    min-width: 0;
    white-space: nowrap;
    overflow: visible;
    line-height: 1;
}

.badge-offline {
    flex: 0 0 auto;
    width: 51px;
    height: 20px;
    min-width: 51px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-size: 7px;
    line-height: 1;
    white-space: nowrap;
    box-sizing: border-box;
}

/* SMA/K badge stays exactly on the same right-side baseline as the others. */
.pkg-card:nth-child(4) .badge-offline {
    width: 51px;
    min-width: 51px;
}

/* Slightly tighter title only when needed so the badge never overlaps. */
.pkg-card:nth-child(4) .card-title {
    font-size: 16px;
    flex: 1 1 auto;
    min-width: 0;
}


/* FINAL MASTER REFERENCE LOCK
   No filter. Do not alter package card/white-base dimensions. */
.filter-trigger-btn { display: none; }

.pkg-card,
.card-banner-wrapper,
.card-body {
    box-sizing: border-box;
}

/* Keep SMA/K on one line without changing card size. */
.pkg-card:nth-child(4) .card-title {
    white-space: nowrap;
    overflow: visible;
}


/* Daftar + Masuk match Privat/Kelompok tab weight */
.btn-daftar,
.btn-masuk {
    font-weight: 500;
}


/* Package buttons intentionally have no selection action yet. */
.btn-pilih-paket { cursor: default; }


/* ===== FINAL ALIGNMENT ONLY: PACKAGE = TESTIMONY WIDTH ===== */
.package-section {
    width: 82%;
    max-width: none;
    margin-left: 0;
    margin-right: 0;
    box-sizing: border-box;
}

/* Keep the package contents aligned to the exact same left/right edges. */
.package-section .package-header,
.package-section .tab-container,
.package-section .cards-grid {
    width: 100%;
    box-sizing: border-box;
}

/* Do NOT alter card height/shape/white base dimensions. */
.package-section .pkg-card,
.package-section .card-banner-wrapper,
.package-section .card-body {
    box-sizing: border-box;
}


/* ===== TYPOGRAPHY ONLY: PACKAGE TITLES ===== */
.package-section .card-title {
    font-size: 17px;
}

.package-section .pkg-card:nth-child(4) .card-title {
    font-size: 14px;
}


/* ===== FINAL TITLE SIZE FIX ONLY ===== */
.package-section .pkg-card .card-header-row{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:4px;
    width:100%;
    overflow:visible;
}

.package-section .pkg-card .card-title{
    flex:1 1 auto;
    min-width:0;
    white-space:nowrap;
    overflow:visible;
    line-height:1;
    font-size:13px;
    letter-spacing:-0.15px;
}

.package-section .pkg-card:nth-child(4) .card-title{
    font-size:11px;
    letter-spacing:-0.2px;
}

.package-section .pkg-card .badge-offline{
    flex:0 0 40px;
    width:40px;
    min-width:40px;
    height:17px;
    padding:0;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    font-size:7px;
    line-height:1;
}


/* ===== FINAL: FONT DIPERBESAR SEDIKIT, TETAP TIDAK TUMPANG TINDIH ===== */
.package-section .pkg-card .card-title{
    font-size: 16px;
    line-height: 1;
    white-space: nowrap;
    overflow: visible;
    letter-spacing: -0.1px;
}

.package-section .pkg-card:nth-child(4) .card-title{
    font-size: 14px;
    letter-spacing: -0.15px;
}

.package-section .pkg-card .badge-offline{
    flex: 0 0 42px;
    width: 42px;
    min-width: 42px;
    height: 18px;
    font-size: 7px;
}


/* ===== ONLY: CENTER THE FACILITY/DESCRIPTION BLOCK ===== */
.package-section .card-facilities {
    display: flex;
    flex-direction: column;
    justify-content: center;
    flex: 1 1 auto;
    margin-top: 0;
    margin-bottom: 0;
}

/* Keep each facility row's own alignment unchanged. */
.package-section .card-facilities li {
    flex: 0 0 auto;
}


/* ===== FINAL MICRO-ADJUSTMENT ===== */

/* Sedikit tambahan space sebelum harga, tanpa mengubah tinggi/base card */
.package-section .card-divider {
    margin-bottom: 10px;
}

.package-section .card-price {
    margin-top: 1px;
    margin-bottom: 11px;
}

/* Offline sedikit lebih besar, ukuran badge/base tetap */
.package-section .badge-offline {
    font-size: 8px;
    font-weight: 500;
}




/* =========================================================
   FINAL REQUEST — OFFLINE 22px + SHORTER PACKAGE IMAGE/CARD
   ========================================================= */

/* OFFLINE text exactly 22px */
.package-section .badge-offline {
    width: 86px;
    min-width: 86px;
    height: 30px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    border-radius: 16px;
    font-size: 22px;
    font-weight: 500;
    line-height: 1;
    white-space: nowrap;
}

/* Pendekkan seluruh card paket */
.package-section .pkg-card {
    height: 310px;
    min-height: 310px;
}

/* Gambar/banner paket ikut dipendekkan */
.package-section .card-banner-wrapper {
    height: 108px;
    min-height: 108px;
    flex: 0 0 108px;
}

/* White base ikut dipendekkan, tetapi tombol tetap terlihat */
.package-section .card-body {
    height: 202px;
    min-height: 202px;
    padding: 10px 12px 9px;
}

/* Tetap jaga tombol sejajar dan utuh */
.package-section .btn-pilih-paket {
    height: 34px;
    min-height: 34px;
    flex: 0 0 34px;
}

/* Subtitle & harga tetap mengikuti ukuran yang sudah disetujui */
.package-section .card-subtitle,
.package-section .card-price {
    font-size: 11px;
    font-weight: 400;
    line-height: 1.15;
}


/* HANYA: sembunyikan bagian Lulusan & Lokasi */
.feature-lulusan-lokasi {
    display: none;
}
</style>

<style>
/* FINAL REQUEST: facility description font */
.package-section .card-facilities li {
    font-size: 11px;
    font-weight: 400;
    line-height: 1.15;
}
.package-section .card-price {
    font-size: 11px;
}
</style>





















<style id="FINAL-MICRO-FIX">
.package-section .pkg-card .card-header-row .badge-offline{
    width: 58px;
    min-width: 58px;
    height: 21px;
    padding: 0 6px;
    font-size: 11px;
    font-weight: 400;
    line-height: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    box-sizing: border-box;
}
</style>

<style id="FINAL-MICRO-ADJUST">
/* ===== MICRO ADJUSTMENT ONLY ===== */

/* Offline: badge dibuat sedikit lebih kurus, teks tetap 11px */
.package-section .pkg-card .badge-offline {
    height: 21px;
    min-height: 21px;
    width: 60px;
    min-width: 60px;
    padding: 0 6px;
    font-size: 11px;
    font-weight: 400;
    line-height: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

/* Pilih Paket: naik sedikit dan tetap cukup besar */
.package-section .pkg-card .btn-pilih-paket {
    transform: translateY(-2px);
    font-size: 14px;
    font-weight: 600;
    line-height: 1;
}
</style>






































<style id="FINAL-OFFLINE-ONLY">
/* ===== ONLY OFFLINE: BESARKAN SEDIKIT, JANGAN LEBARKAN ===== */
.package-section .pkg-card .card-header-row .badge-offline {
    width: 30px;
    min-width: 30px;
    height: 16px;
    min-height: 16px;
    padding: 0 1px;
    margin: 0;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 400;
    line-height: 1;
    box-sizing: border-box;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    white-space: nowrap;
    overflow: hidden;
}
</style>








<style id="FINAL-LAST-PACKAGE-CORNER">
/* ===== LAST REVISION ONLY ===== */

/* Corner card putih + gambar dinaikkan sedikit */
.package-section .pkg-card {
    border-radius: 24px;
    overflow: hidden;
}

.package-section .card-banner-wrapper {
    border-radius: 24px 24px 0 0;
    overflow: hidden;
}

.package-section .card-body {
    border-radius: 0 0 24px 24px;
    overflow: hidden;
}

/* Garis tetap sedikit lebih pendek, warna tengah jauh lebih tua */
.package-section .pkg-card .card-divider {
    width: 94%;
    margin-left: auto;
    margin-right: auto;
    height: 1.2px;
    border: 0;
    background: linear-gradient(
        90deg,
        #B7B7B7 0%,
        #5C5C5C 50%,
        #B7B7B7 100%
    );
    opacity: 1;
}
</style>





<style id="LULUSAN-SECTION-STYLE">
.lulusan-section{
    width:82%;
    margin:14px 0 0 0;
    padding:0;
    position:relative;
    box-sizing:border-box;
}
.lulusan-image{
    display:block;
    width:100%;
    height:auto;
    margin:0;
    padding:0;
    border:0;
    object-fit:contain;
}
</style>





<style id="FINAL-TITLE-ONLY">
/* ===== ONLY REQUESTED TITLE REVISION ===== */
.package-section .pkg-card .card-title.title-privat-sma {
    font-size: 16px;
}

.package-section .pkg-card .card-title.title-kelompok-sma {
    font-size: 15px;
}
</style>


<style id="LULUSAN-SOURCE-FIX">
.lulusan-image{
    image-rendering:auto;
    -ms-interpolation-mode:bicubic;
}
</style>


<style id="BASE-KONFIRMASI-USER">
.konfirmasi-user-container {
    width: 100%;
    margin-top: 20px;
    padding: 0;
    box-sizing: border-box;
    position: relative;
}

.konfirmasi-user-img {
    display: block;
    width: 100%;
    height: auto;
    margin: 0;
    padding: 0;
    border: 0;
    object-fit: contain;
}

.konfirmasi-user-content {
    position: absolute;
    top: calc(50% + 20px);
    left: 57.3%;
    transform: translateY(-50%);
}

.konfirmasi-user-title {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    font-size: 23px;
    font-weight: 700;
    line-height: 1.2;
    color: #fff;
}

.konfirmasi-user-subtitle {
    margin: 5px 0 0;
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    font-weight: 400;
    line-height: 1.25;
    color: #fff;
}
</style>

<style id="BASE-ABSENSI-JADWAL">
.absensi-jadwal-container {
    width: 100%;
    margin-top: 14px;
    padding: 0;
    box-sizing: border-box;
    position: relative;
}

.absensi-jadwal-grid {
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    column-gap: 14px;
}

.absensi-jadwal-card {
    position: relative;
    box-sizing: border-box;
    min-height: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}

.absensi-jadwal-bg {
    display: block;
    width: 100%;
    height: auto;
    margin: 0;
    padding: 0;
    border: 0;
}

.absensi-jadwal-content {
    position: absolute;
    top: 50%;
    left: 26px;
    transform: translateY(-50%);
}

.absensi-jadwal-title {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    font-size: 23px;
    font-weight: 700;
    line-height: 1.2;
    color: #fff;
}

.absensi-jadwal-subtitle {
    margin: 5px 0 0;
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    font-weight: 400;
    line-height: 1.25;
    color: #fff;
}
</style>


<style id="ADMIN-NO-CHAT-FINAL">
/* Admin: internal chat is intentionally disabled. */
#osonChatToggle,
.chat-btn,
.chat-window,
.oson-chat-toggle {
    display:none !important;
    pointer-events:none !important;
}
</style>
</head>
<body>

    <div class="canvas-container">

        <!-- NAVBAR -->
        <header class="navbar">
            <img src="{{ asset('images/Logo Oson Itensif.png') }}" alt="Logo Oson Itensif" class="navbar-logo">

            <a href="{{ route('admin.account') }}" class="profile-admin" title="Akun Admin" style="text-decoration:none; color:inherit;">
                <span class="profile-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </span>
                <span class="profile-admin-name">Admin Oson</span>
            </a>
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

            </section>

            <div class="mascot-container">
                <img src="{{ asset('images/Maskot Home Page.png') }}" alt="Maskot Home Page" class="mascot-img">
            </div>

            <section class="testimony-container">
                <img src="{{ asset('images/Base Testimony.png') }}" alt="Base Testimony" class="testimony-bg" onerror="this.onerror=null; this.src='{{ asset('images/Base Testimony.jpg') }}';">
                
            </section>

            


            <input id="osonChatToggle" type="checkbox" class="oson-chat-toggle" aria-label="Buka atau tutup chat Admin Oson Intensif"><label class="chat-btn" for="osonChatToggle" title="Chat Kami" aria-label="Buka chat dengan Admin Oson Intensif"><img src="{{ asset('images/Chat Box.png') }}" alt="Chat Box"></label>

        </main>

<!-- ===================== LANJUTAN: PILIH PAKET LES ===================== -->
<!-- SECTION: PILIH PAKET LES -->
<section class="package-section">
  <!-- Header: Judul & Icon Filter -->
  <div class="package-header">
    <h2 class="package-title">Edit Paket les</h2>
    
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

<a href="{{ route('admin.confirmation') }}" class="konfirmasi-user-container" style="display:block; text-decoration:none; color:inherit; cursor:pointer;">
    <img src="{{ asset('images/base konfirmasi user.png') }}" alt="Base Konfirmasi User" class="konfirmasi-user-img">
    <div class="konfirmasi-user-content">
        <h2 class="konfirmasi-user-title konfirmasi-judul-kiri konfirmasi-font-plus">Konfirmasi</h2>
        <p class="konfirmasi-user-subtitle konfirmasi-subtitle-font-plus">Setujui / Tolak Pembayaran</p>
    </div>
</a>

<div class="absensi-jadwal-container">
    <div class="absensi-jadwal-grid">
        <a href="{{ route('admin.attendance') }}" style="display:block; text-decoration:none; color:inherit; cursor:pointer;">
            <div class="absensi-jadwal-card">
                <img src="{{ asset('images/Base Absensi.png') }}" alt="Base Absensi" class="absensi-jadwal-bg">
                <div class="absensi-jadwal-content">
                    <h2 class="absensi-jadwal-title absensi-font-plus">Absensi</h2>
                    <p class="absensi-jadwal-subtitle absensi-subtitle-font-plus">Masukan Daftar Hadir</p>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.schedule') }}" style="display:block; text-decoration:none; color:inherit; cursor:pointer;">
            <div class="absensi-jadwal-card">
                <img src="{{ asset('images/Base Jadwal.png') }}" alt="Base Jadwal" class="absensi-jadwal-bg">
                <div class="absensi-jadwal-content">
                    <h2 class="absensi-jadwal-title jadwal-font-plus">Jadwal</h2>
                    <p class="absensi-jadwal-subtitle jadwal-subtitle-font-plus">Perbarui Jadwal User</p>
                </div>
            </div>
        </a>
    </div>
</div>



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
      <input type="range" class="filter-range-input" id="priceRangeInput" min="200000" max="400000" step="10000" value="400000" oninput="updatePriceLabel(this.value)">
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


    <!-- CHAT WINDOW -->
    <section class="chat-window" id="chatWindow" aria-label="Chat Admin Oson Intensif">
        <div class="chat-header">
            <div class="chat-header-title">Admin Oson Intensif</div>
            <button class="status-toggle" id="statusToggle" type="button" aria-label="Ubah status Admin">
                <span class="online-dot" id="onlineDot"></span>
                <span id="statusText">Online</span>
            </button>
        </div>

        <div class="chat-messages" id="chatMessages">
            <div class="chat-message admin">Haii, ada yg bisa di bantu</div>
        </div>

        <div class="chat-input-area">
            <form class="chat-input-form" id="chatForm">
                <input id="chatInput" class="chat-input" type="text" autocomplete="off" placeholder="Ketik Pesan..." aria-label="Ketik pesan">
                <button class="chat-send" type="submit" aria-label="Kirim pesan">
                    <svg viewBox="0 0 46 46" aria-hidden="true">
                        <path d="M8 5.5L39 23L8 40.5L13 26.2L28.2 23L13 19.8L8 5.5Z" fill="white"/>
                    </svg>
                </button>
            </form>
        </div>
    </section>

<script>
  const assetImageBase = @json(asset('images'));

  // 1. Data Sumber Paket Les (Menggunakan File Asset yang ditentukan)
  @php
    $packageJsData = ($packages ?? collect())->map(function ($p) {
        return [
            'id' => $p->id,
            'type' => $p->type,
            'title' => $p->name,
            'titleClass' => ($p->jenjang === 'SMA/K' ? 'title-' . $p->type . '-sma' : ''),
            'jenjang' => $p->jenjang,
            'status' => $p->status ?? 'offline',
            'quotaText' => $p->jumlah_siswa . ' | Durasi ' . $p->durasi,
            'facilities' => $p->facilities ?? [],
            'priceText' => 'Rp ' . number_format((int) $p->harga, 0, ',', '.') . ' / Bulan',
            'priceNumeric' => (int) $p->harga,
            'assetImg' => $p->image_key,
            'badgeClass' => $p->badge_class,
            'btnClass' => $p->button_class,
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
    maxPrice: 999999999
  };
  let selectedPackageForModal = null;

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
      cardEl.setAttribute('data-package-id', String(pkg.id));
      cardEl.setAttribute('data-package-type', String(pkg.type || ''));

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
          <img src="${pkg.assetImg === 'PAKET_SMP_TERBARU' ? 'data:image/png;base64,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' : assetImageBase + '/' + pkg.assetImg + '.png'}" alt="${pkg.title}" class="card-banner-img">
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
          <button class="btn-pilih-paket ${pkg.btnClass} package-edit-btn" type="button" data-package-id="${pkg.id}">Edit Paket</button>
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

    document.getElementById('priceRangeInput').value = 400000;
    updatePriceLabel(400000);

    filterState = {
      jenis: 'ALL',
      jenjang: 'ALL',
      status: 'ALL',
      maxPrice: 400000
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

    <script>
        const chatWindow = document.getElementById('chatWindow');
        const chatInput = document.getElementById('chatInput');
        const chatMessages = document.getElementById('chatMessages');
document.getElementById('chatForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const text = chatInput.value.trim();
            if (!text) return;

            addBubble(text, 'user');
            chatInput.value = '';

        });

        function addBubble(text, sender) {
            const bubble = document.createElement('div');
            bubble.className = `chat-message ${sender}`;
            bubble.textContent = text;
            chatMessages.appendChild(bubble);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        const statusText = document.getElementById('statusText');
        const onlineDot = document.getElementById('onlineDot');

        document.getElementById('statusToggle').addEventListener('click', function () {
            const isOnline = statusText.textContent.trim() === 'Online';
            statusText.textContent = isOnline ? 'Offline' : 'Online';
            onlineDot.classList.toggle('offline', isOnline);
        });
    </script>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Oson Intensif — Lulusan & Lokasi</title>
<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

*{box-sizing:border-box;margin:0;padding:0;font-family:'Poppins',sans-serif;}


/* ===================== LULUSAN OSON INTENSIF ===================== */
.lulusan-section{
    width:82%;
    max-width:832px;
    margin:14px auto 0;
    padding:0;
    position:relative;
    box-sizing:border-box;
}
.lulusan-image{
    display:block;
    width:100%;
    height:auto;
    margin:0;
    padding:0;
    border:0;
    object-fit:contain;
    image-rendering:auto;
}

/* ===================== LOKASI OSON ITENSIF ===================== */
.lokasi-section{
    position:relative;
    width:82%;
    max-width:832px;
    margin:30px auto 0;
    padding:0 0 48px;
    z-index:1;
}
.lokasi-section::before{display:none;}

.lokasi-card{
    width:100%;
    height:328px;
    min-height:328px;
    padding:28px 30px;
    background:#fff;
    border-radius:24px;
    display:flex;
    align-items:center;
    gap:38px;
    box-shadow:0 3px 5px rgba(5,15,113,.18);
}

.lokasi-map{
    flex:0 0 373px;
    width:373px;
    height:263px;
    border-radius:20px;
    overflow:hidden;
    background:#E5E3DF;
    border:1px solid #E2ECF8;
}
.lokasi-map iframe{
    width:100%;
    height:100%;
    border:0;
    display:block;
}

.lokasi-content{
    flex:1;
    min-width:0;
    height:263px;
    display:flex;
    flex-direction:column;
    justify-content:flex-start;
    padding-top:12px;
}

.lokasi-header{
    display:flex;
    align-items:flex-start;
    gap:0;
    margin:0 0 12px;
}

.lokasi-logo-exact{
    width:110px;
    height:auto;
    margin:0 0 14px;
    display:block;
    object-fit:contain;
}

.lokasi-address{
    font-size:11.5px;
    line-height:1.5;
    color:#12277D;
    margin:0 0 27px;
    white-space:normal;
}

.lokasi-desc{
    font-size:12px;
    line-height:1.5;
    color:#12277D;
    margin:0;
}

.btn-gmaps{
    width:100%;
    height:48px;
    min-height:48px;
    margin-top:auto;
    align-self:stretch;
    padding:0 18px;
    display:flex;
    align-items:center;
    justify-content:center;
    border:0;
    border-radius:25px;
    background:#78B0ED;
    color:#fff;
    text-decoration:none;
    font-size:14.5px;
    font-weight:700;
    line-height:1;
    box-shadow:0 4px 12px rgba(120,176,237,.25);
    transition:background .2s ease,transform .2s ease;
}
.btn-gmaps:hover{
    background:#5E9FE5;
    transform:translateY(-1px);
}

.lokasi-footer{
    width:100%;
    margin:28px auto 0;
    text-align:center;
    color:#fff;
    font-size:13px;
    line-height:1.6;
    font-weight:400;
}

@media(max-width:760px){
    .lulusan-section,.lokasi-section{width:90%;}
    .lokasi-card{
        height:auto;
        min-height:0;
        flex-direction:column;
        padding:20px;
    }
    .lokasi-map{
        width:100%;
        flex-basis:220px;
        height:220px;
    }
    .lokasi-content{
        height:auto;
        padding-top:0;
    }
    .btn-gmaps{
        width:100%;
        height:46px;
        min-height:46px;
        margin-top:14px;
        font-size:14px;
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
                    src="data:image/png;base64,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"
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
    width: 100%;
    min-height: 100%;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}

body {
    display: block;
}

/* Satu garis tengah untuk seluruh halaman */
.canvas-container {
    width: 82%;
    max-width: 832px;
    margin: 0 auto;
    padding-left: 0;
    padding-right: 0;
    box-sizing: border-box;
    transform: none;
    transform-origin: top center;
}

.main-content {
    width: 100%;
    margin: 0 auto;
    box-sizing: border-box;
}

/* Navbar tetap simetris terhadap container */
.navbar {
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    box-sizing: border-box;
}

.nav-menu {
    justify-content: center;
}

.profile-icon {
    margin-right: 0;
}

/* Hero mengikuti garis kiri container, mascot tetap di sisi kanan */
.hero-section {
    width: 100%;
    box-sizing: border-box;
}

.mascot-container {
    right: 0;
}

/* Testimoni tepat di tengah */
.testimony-container {
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    box-sizing: border-box;
}

/* Paket tepat di tengah dan sejajar dengan testimony */
.package-section {
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    box-sizing: border-box;
}

.package-header,
.tab-container,
.cards-grid {
    width: 100%;
    margin-left: 0;
    margin-right: 0;
}

.cards-grid {
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 12px;
}

/* BASE PUTIH PAKET: tanpa stroke, hanya shadow */
.pkg-card {
    background: #fff;
    border: 0;
    box-shadow: 0 3px 8px rgba(5, 15, 113, .16);
}

.pkg-card:hover {
    border: 0;
    box-shadow: 0 3px 8px rgba(5, 15, 113, .16);
    transform: none;
}

/* Lulusan dan lokasi satu garis dengan paket/testimoni */
.feature-lulusan-lokasi {
    width: 82%;
    max-width: 832px;
    margin: 0 auto;
    padding: 0;
    box-sizing: border-box;
}

.lulusan-section,
.lokasi-section {
    width: 100%;
    max-width: none;
    margin-left: auto;
    margin-right: auto;
    box-sizing: border-box;
}

.lulusan-section {
    margin-top: 14px;
}

.lokasi-section {
    margin-top: 14px;
}

.lokasi-card {
    width: 100%;
    box-sizing: border-box;
}

.lokasi-footer {
    width: 100%;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
}

/* Jangan biarkan media query lama mengubah empat kartu pada ukuran
   tampilan referensi. Tetap empat kolom sampai layar benar-benar sempit. */
@media (max-width: 768px) and (min-width: 521px) {
    .canvas-container {
        width: 82%;
        transform: none;
    }
    .feature-lulusan-lokasi {
        width: 82%;
    }
    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 9px;
    }
}

@media (max-width: 520px) {
    .canvas-container,
    .feature-lulusan-lokasi {
        width: 90%;
    }
    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 5px;
    }
    .pkg-card {
        min-width: 0;
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
    );
    background-attachment: fixed;
}

/* ---------- CONTAINER: IKUT LEBAR GAMBAR TARGET ---------- */
@media (max-width: 520px) {
    .canvas-container {
        width: 82%;
        max-width: 832px;
        margin: 0 auto;
        padding-left: 0;
        padding-right: 0;
        transform: none;
    }

    .feature-lulusan-lokasi {
        width: 82%;
        max-width: 832px;
        margin-left: auto;
        margin-right: auto;
    }

    .main-content,
    .hero-section,
    .testimony-container,
    .package-section {
        width: 100%;
    }
}

/* ---------- GAJAH: LEBIH KECIL, LEBIH KE KANAN, TURUN SEDIKIT ---------- */
@media (max-width: 520px) {
    .mascot-container {
        right: -7px;
        top: 40px;
        width: 300px;
        z-index: 3;
    }

    .mascot-img {
        width: 100%;
        height: auto;
    }

    /* CHAT MENEMPEL KE SISI KANAN BASE TESTIMONY */
    .chat-btn {
        right: 1.5%;
        bottom: -20px;
        width: 68px;
    }

    .chat-window {
        right: 1.5%;
    }
}

/* ---------- JARAK ANTAR BASE: SEMUA SEDANG DAN SAMA ---------- */

/* Testimoni -> Judul Paket */
@media (max-width: 520px) {
    .package-section {
        width: 100%;
        margin-top: 18px;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    /* Judul -> tab -> card */
    .package-title {
        margin-bottom: 8px;
    }

    .tab-container {
        margin-bottom: 10px;
    }

    /* 4 kartu tetap sejajar */
    .cards-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 7px;
    }
}

/* ---------- PAKET: PROPORSI MENGIKUTI TARGET ---------- */
@media (max-width: 520px) {
    .package-section .pkg-card {
        height: 265px;
        min-height: 265px;
        border-radius: 18px;
        border: 0;
        box-shadow: 0 3px 8px rgba(5,15,113,.16);
    }

    .package-section .card-banner-wrapper {
        height: 92px;
        min-height: 92px;
        flex: 0 0 92px;
    }

    .package-section .card-body {
        height: 173px;
        min-height: 173px;
        padding: 9px 10px 8px;
    }

    /* GARIS TETAP 1PX — WARNA GRADASI TETAP */
    .package-section .pkg-card .card-divider {
        width: 94%;
        height: 1px;
        min-height: 1px;
        flex: 0 0 1px;
        margin: 6px auto;
        border: 0;
        background: linear-gradient(
            90deg,
            #B7B7B7 0%,
            #5C5C5C 50%,
            #B7B7B7 100%
        );
        opacity: 1;
    }

    /* Jangan mengubah warna banner/gradasi tiap paket */
    .package-section .card-banner-wrapper,
    .package-section .card-banner-wrapper img {
        opacity: 1;
    }
}

/* ---------- JARAK PAKET -> LULUSAN = 18PX ---------- */
@media (max-width: 520px) {
    .feature-lulusan-lokasi {
        padding: 0;
    }
z
    .lulusan-section {
        width: 100%;
        margin: 18px auto 0;
    }

    /* ---------- JARAK LULUSAN -> LOKASI = 18PX ---------- */
    .lokasi-section {
        width: 100%;
        margin: 18px auto 0;
        padding-bottom: 0;
    }

    .lokasi-card {
        width: 100%;
    }
}
</style>


<style id="FINAL-MASCOT-UP">
/* Hanya menaikkan posisi maskot, ukuran tetap. */
.mascot-container {
    top: -60px;
}
</style>

<style id="FOCUS-MASCOT-CHAT-RIGHT">
/* === FOKUS: GAJAH + CHAT SAJA === */
.mascot-container {
    right: -35px;
}

.chat-btn {
    right: -5px;
}

.chat-window {
    right: -5px;
}
</style>


<style id="SPACING-PAKET-LULUSAN-ONLY">
/* HANYA memperkecil jarak Paket -> Lulusan */
@media (max-width: 520px) {
    .package-section {
        padding-bottom: 0;
        margin-bottom: 0;
    }

    .lulusan-section {
        margin-top: 10px;
    }
}
</style>


<style id="PAKET-LULUSAN-MEPET-SEKALI">
/* HANYA bagian jarak PAKET -> LULUSAN */
@media (max-width: 520px) {
    .feature-lulusan-lokasi {
        margin-top: -35px;
        padding-top: 0;
    }

    .lulusan-section {
        margin-top: 0;
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
    padding-bottom: 0;
    margin-bottom: 0;
}

.package-section {
    padding-bottom: 0;
    margin-bottom: 0;
}

.feature-lulusan-lokasi {
    margin-top: 0;
    padding-top: 0;
}

.lulusan-section {
    margin-top: 10px;
}
</style>


<style id="FINAL-CORRECT-SPACING-AND-TABS">
/* =========================================================
   FINAL CHECK — HANYA SPACING + LEBAR TAB
   ========================================================= */

/* Testimoni -> Paket: tambah 6px */
.package-section {
    margin-top: 30px;
}

/* Paket -> Lulusan: tambah 6px yang benar-benar terlihat */
.feature-lulusan-lokasi {
    margin-top: 0;
    padding-top: 16px;
}

/* Lulusan -> Lokasi: tambah 3px */
.lokasi-section {
    margin-top: 13px;
}

/* PRIVAT dan KELOMPOK HARUS SAMA-SAMA SELEBAR */
.tab-container {
    display: flex;
    gap: 10px;
}

.tab-pill {
    width: 74px;
    min-width: 74px;
    max-width: 74px;
    height: auto;
    box-sizing: border-box;
    padding: 8px 0;
    margin: 0;
    text-align: center;
    white-space: nowrap;
}
</style>


<style id="VERSI-BARU-PLUS7-PLUS3">
/* VERSI BARU: hanya menambah jarak dan lebar tab */

/* +7px Testimoni -> Paket */
.package-section {
    margin-top: 37px;
}

/* +7px Paket -> Lulusan */
.feature-lulusan-lokasi {
    margin-top: 0;
    padding-top: 23px;
}

/* +7px Lulusan -> Lokasi */
.lokasi-section {
    margin-top: 20px;
}

/* +3px lebar KEDUA tab: Privat dan Kelompok */
.tab-container .tab-pill {
    width: 77px;
    min-width: 77px;
    max-width: 77px;
    box-sizing: border-box;
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
    margin-top: 42px;
    padding-top: 0;
}

/* 2. TAB PRIVAT / KELOMPOK
   Dibuat seperti tombol Daftar / Masuk:
   tinggi 46px, radius 100px, font 16px.
   Lebar keduanya sama dan lebih besar dari versi sekarang. */
.tab-container {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 16px;
}

.tab-container .tab-pill {
    width: 108px;
    min-width: 108px;
    max-width: 108px;
    height: 46px;
    min-height: 46px;
    padding: 0;
    border-radius: 100px;
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    font-weight: 700;
    line-height: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    box-sizing: border-box;
}

.tab-container .tab-pill.active {
    background: linear-gradient(90deg, #050F71 0%, #78B0ED 100%);
}

.tab-container .tab-pill.inactive {
    background: #78B0ED;
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
    margin-top: 42px;
}

/* 2. HANYA BASE TOMBOL DIUBAH
      FONT DIKEMBALIKAN: 15px, weight 500 */
.tab-container {
    gap: 16px;
}

.tab-container .tab-pill {
    width: 108px;
    min-width: 108px;
    max-width: 108px;
    height: 46px;
    min-height: 46px;
    padding: 0;
    border-radius: 100px;
    font-size: 15px;
    font-weight: 500;
    line-height: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
}

.tab-container .tab-pill.active {
    background: linear-gradient(90deg, #050F71 0%, #78B0ED 100%);
}

.tab-container .tab-pill.inactive {
    background: #78B0ED;
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
    width: calc(100% - 5px);
    max-width: none;
    margin-left: 3px;
    margin-right: 2px;
    box-sizing: border-box;
}

.lokasi-card {
    width: 100%;
    max-width: none;
    box-sizing: border-box;
}

/* GARIS PAKET — JANGAN HILANG */
.package-section .pkg-card .card-divider {
    display: block;
    visibility: visible;
    opacity: 1;
    width: 94%;
    height: 1px;
    min-height: 1px;
    flex: 0 0 1px;
    margin: 7px auto 8px;
    border: 0;
    background: linear-gradient(
        90deg,
        #B7B7B7 0%,
        #5C5C5C 50%,
        #B7B7B7 100%
    );
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
    );
    background-attachment: fixed;
}

/* 2. CHAT WINDOW:
   saat open, posisi berada di tengah vertikal dan rata kanan */
.chat-window.open {
    display: flex;
    top: 50%;
    right: 2%;
    bottom: auto;
    transform: translateY(-50%);
}

/* Desktop/default: ukuran asli tetap dipertahankan */
@media (min-width: 901px) {
    .chat-window.open {
        right: 2%;
        top: 50%;
        bottom: auto;
        transform: translateY(-50%);
    }
}

/* Tablet/mobile: tetap tengah vertikal + rata kanan,
   tanpa mengubah ukuran jendela yang sudah ada. */
@media (max-width: 900px) {
    .chat-window.open {
        right: 2%;
        top: 50%;
        bottom: auto;
        transform: translateY(-50%);
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
    background: #93BAED;
}

body {
    background: linear-gradient(
        180deg,
        #93BAED 0%,
        #EAF3FE 34%,
        #FFFFFF 60%,
        #DCEBFA 82%,
        #93BAED 100%
    );
    background-attachment: scroll;
    background-repeat: no-repeat;
    background-size: 100% 100%;
}

/* 2. CHAT:
   Tetap rata kanan, tetapi pusat vertikalnya sekarang mengikuti
   area dari bagian atas sampai batas bawah base testimony.
   Ukuran chat window TETAP, hanya posisi yang berubah. */
.chat-window.open {
    right: 2%;
    top: 385px;
    bottom: auto;
    transform: translateY(-50%);
}

/* Jangan ubah ukuran/layout komponen lain pada breakpoint. */
@media (max-width: 900px) {
    .chat-window.open {
        right: 2%;
        top: 385px;
        bottom: auto;
        transform: translateY(-50%);
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
    background: #93BAED;
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
    );
    background-attachment: scroll;
    background-repeat: no-repeat;
    background-size: 100% 100%;
}

/* B. Chat — posisi dihitung mengikuti base testimony */
.chat-window.open {
    right: var(--chat-right-to-testimony, 18%);
    top: var(--chat-top-in-testimony, 0px);
    bottom: auto;
    transform: none;
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
    background: #93BAED;
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
    );
    background-attachment: scroll;
    background-repeat: no-repeat;
    background-size: 100% 100%;
}

/* CHAT — jangan ubah ukuran/layout, hanya posisi saat open */
.chat-window.open {
    position: absolute;
    right: auto;
    left: auto;
    top: auto;
    bottom: auto;
    transform: none;
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
    background: #93BAED;
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
    );
    background-attachment: scroll;
    background-repeat: no-repeat;
    background-size: 100% 100%;
}

/* D. CHAT — POSISI DINAMIS, TIDAK MENGUBAH UKURAN / LAYOUT */
.chat-window.open {
    position: fixed;
    right: auto;
    bottom: auto;
    transform: none;
    left: auto;
    top: auto;
}
</style>

<style id="FINAL-SMOOTH-GRADIENT">
html {
    background: #93BAED;
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
    );
    background-attachment: scroll;
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
</style>

<style id="FINAL-CHAT-VISIBILITY-AND-POSITION">
/* KLIK CHAT TETAP PAKAI CHECKBOX YANG SUDAH BERHASIL */
#osonChatToggle {
    position: absolute;
    width: 1px;
    height: 1px;
    opacity: 0;
    pointer-events: none;
}

body:has(#osonChatToggle:checked) .chat-window {
    display: flex;
    position: fixed;
    z-index: 100000;
}

.chat-window.open {
    display: flex;
}
</style>

<script id="FINAL-CHAT-VISIBILITY-POSITION-JS">
(function () {
    function positionChatLikeReference() {
        var toggle = document.getElementById('osonChatToggle');
        var chat = document.getElementById('chatWindow');
        var testimony = document.querySelector('.testimony-container');

        if (!toggle || !chat || !testimony || !toggle.checked) return;

        var t = testimony.getBoundingClientRect();
        var w = chat.offsetWidth;
        var h = chat.offsetHeight;

        /* Posisi mengikuti screenshot target:
           kanan chat sejajar dengan kanan testimony,
           bawah chat 23px di atas bawah testimony. */
        var left = t.right - w;
        var top = t.bottom - h - 23;

        left = Math.max(8, Math.min(left, window.innerWidth - w - 8));
        top = Math.max(8, Math.min(top, window.innerHeight - h - 8));

        chat.style.left = Math.round(left) + 'px';
        chat.style.top = Math.round(top) + 'px';
        chat.style.right = 'auto';
        chat.style.bottom = 'auto';
        chat.style.transform = 'none';
        chat.style.position = 'fixed';
        chat.style.zIndex = '100000';
    }

    function bind() {
        var toggle = document.getElementById('osonChatToggle');
        if (!toggle || toggle.dataset.chatPositionBound === '1') return;

        toggle.dataset.chatPositionBound = '1';

        toggle.addEventListener('change', function () {
            if (toggle.checked) {
                requestAnimationFrame(function () {
                    requestAnimationFrame(positionChatLikeReference);
                });
            }
        });

        window.addEventListener('resize', positionChatLikeReference);
    }

    document.addEventListener('DOMContentLoaded', bind);
    window.addEventListener('load', bind);
})();
</script>


<style id="FINAL-CHAT-SEND-ICON-LEFT-ONLY">
/* HANYA ICON KIRIM — digeser sedikit ke kiri */
.chat-send svg {
    transform: translateX(-7px);
}
</style>


<style id="FINAL-FLOATING-CHAT-ICON-LEFT-ONLY">
/* HANYA ICON CHAT DI LUAR BASE TESTIMONY — geser sedikit ke kiri */
.chat-btn {
    right: 3px;
}
</style>


<style id="FINAL-FLOATING-CHAT-ICON-RIGHT-3PX">
/* HANYA ICON CHAT: geser 3px ke kanan */
.chat-btn {
    right: 0px;
}
</style>


<style>
/* hanya menggeser teks target 20px ke kanan */
</style>
<script>
document.addEventListener('DOMContentLoaded', function(){
  document.querySelectorAll('body *').forEach(function(el){
    if(el.children.length===0){
      var t=el.textContent.trim();
      if(t==='Absensi' || t==='Jadwal' || t==='Masukan Daftar Hadir' || t==='Perbarui Jadwal User'){
        el.style.position='relative';
        el.style.left='20px';
      }
    }
  });
});
</script>

<style>
/* Posisi teks Konfirmasi saja */
</style>

<style>
.konfirmasi-judul-kiri {
  transform: translateX(-10px);
}
.konfirmasi-subtitle-kiri {
  transform: translateX(-10px);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('body *').forEach(function (el) {
    if (el.children.length === 0 && el.textContent.trim() === 'Setujui / Tolak Pembayaran') {
      el.classList.add('konfirmasi-subtitle-kiri');
    }
  });
});
</script>

<style>
/* Hanya ukuran font teks target: +5px. Posisi dan base tetap. */
.konfirmasi-font-plus,
.absensi-font-plus,
.jadwal-font-plus {
  font-size: 28px;
}
.konfirmasi-subtitle-font-plus,
.absensi-subtitle-font-plus,
.jadwal-subtitle-font-plus {
  font-size: 20px;
}
</style>

<style>
/* Tambah 2px lagi pada ukuran teks target saja */
.konfirmasi-font-plus,
.absensi-font-plus,
.jadwal-font-plus {
  font-size: 30px;
}
.konfirmasi-subtitle-font-plus,
.absensi-subtitle-font-plus,
.jadwal-subtitle-font-plus {
  font-size: 22px;
}
</style>

<style>
.konfirmasi-font-plus,
.absensi-font-plus,
.jadwal-font-plus {
  font-size: 28px;
}
.konfirmasi-subtitle-font-plus,
.absensi-subtitle-font-plus,
.jadwal-subtitle-font-plus {
  font-size: 20px;
}
</style>
</body>
</html>
<style id="FINAL-ONLY-PACKAGE-DIVIDER-GRADIENT">
/* HANYA mengembalikan garis 1px pada paket — bagian lain tidak disentuh */
.package-section .pkg-card .card-divider {
    display: block;
    visibility: visible;
    opacity: 1;
    width: 94%;
    height: 1px;
    min-height: 1px;
    flex: 0 0 1px;
    margin: 7px auto 8px;
    padding: 0;
    border: 0;
    border-top: 0;
    background-color: transparent;
    background-image: linear-gradient(90deg, #B7B7B7 0%, #5C5C5C 50%, #B7B7B7 100%);
    background-repeat: no-repeat;
    background-size: 100% 1px;
    position: relative;
    z-index: 999;
}
</style>

<style id="FINAL-ONLY-CHECK-CIRCLE-FIX">
/* HANYA PERBAIKAN ICON CENTANG — bagian lain tidak disentuh */
.package-section .pkg-card .check-icon-circle {
    width: 13px;
    height: 13px;
    min-width: 13px;
    min-height: 13px;
    flex: 0 0 13px;
    aspect-ratio: 1 / 1;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    overflow: hidden;
}

.package-section .pkg-card .check-icon-circle svg {
    width: 9px;
    height: 9px;
    flex: 0 0 9px;
    display: block;
}

.package-section .pkg-card .check-icon-circle svg path {
    fill: none;
    stroke: #FFFFFF;
    stroke-width: 2.35;
    stroke-linecap: round;
    stroke-linejoin: round;
}

/* HANYA: navbar mengikuti referensi ketiga.
   Warna dan ketebalan font tetap menggunakan nilai dasar yang sudah ada. */
.navbar{
    margin-bottom:0;
    transform:translateY(0);
    padding:0 35px;
    min-height:66px;
    align-items:center;
}

.navbar-logo{
    height:150px;
    width:auto;
    object-fit:contain;
}

.nav-menu,
.navbar > nav{
    display:none;
}

.profile-admin{
    display:flex;
    align-items:center;
    gap:8px;
    margin-right:0;
}

.profile-admin .profile-icon{
    width:34px;
    height:34px;
    margin-right:0;
    flex:0 0 34px;
    cursor:default;
}

.profile-admin .profile-icon svg{
    width:21px;
    height:21px;
}

.profile-admin-name{
    color:#FFFFFF;
    font-size:14px;
    font-weight:500;
    line-height:1;
    white-space:nowrap;
}

/* HANYA POSISI LOGO */
.navbar-logo {
    position: relative;
    left: -35px;
    top: 0;
}
</style>


<!-- ===================== MODAL CRUD PAKET DB ===================== -->
<style id="PACKAGE-DB-CRUD-STYLES">
  .package-db-overlay{
    position:fixed;
    inset:0;
    display:none;
    align-items:center;
    justify-content:center;
    padding:22px;
    background:rgba(5,15,113,.58);
    backdrop-filter:blur(5px);
    z-index:100100;
    box-sizing:border-box;
  }
  .package-db-overlay.show{display:flex;}
  .package-db-modal{
    width:min(580px,94vw);
    max-height:min(90vh,760px);
    overflow:auto;
    background:linear-gradient(180deg,#f7fbff 0%,#ffffff 28%);
    border:2px solid #78B0ED;
    border-radius:24px;
    padding:24px;
    box-sizing:border-box;
    box-shadow:0 24px 60px rgba(5,15,113,.22);
    font-family:'Poppins',sans-serif;
  }
  .package-db-head{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:16px;
    margin:-24px -24px 18px;
    padding:17px 24px;
    background:linear-gradient(110deg,#050F71 0%,#78B0ED 100%);
    border-radius:21px 21px 0 0;
  }
  .package-db-title{
    margin:0;
    color:#fff;
    font-size:21px;
    font-weight:700;
  }
  .package-db-close{
    width:34px;
    height:34px;
    padding:0;
    border:0;
    border-radius:50%;
    background:#fff;
    color:#050F71;
    font-size:22px;
    line-height:34px;
    cursor:pointer;
  }
  .package-db-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:14px;
  }
  .package-db-field{
    display:flex;
    flex-direction:column;
    gap:7px;
  }
  .package-db-field.full{grid-column:1 / -1;}
  .package-db-field label{
    color:#050F71;
    font-size:12px;
    font-weight:600;
  }
  .package-db-field input,
  .package-db-field select,
  .package-db-field textarea{
    width:100%;
    box-sizing:border-box;
    border:1px solid #d8e2ee;
    border-radius:14px;
    padding:11px 13px;
    outline:none;
    background:#fff;
    color:#222;
    font-family:'Poppins',sans-serif;
    font-size:13px;
  }
  .package-db-field textarea{
    min-height:90px;
    resize:vertical;
  }
  .package-db-field input:focus,
  .package-db-field select:focus,
  .package-db-field textarea:focus{
    border-color:#78B0ED;
    box-shadow:0 0 0 3px rgba(120,176,237,.15);
  }
  .package-db-preview{
    display:flex;
    align-items:center;
    gap:12px;
    padding:10px 12px;
    border-radius:14px;
    background:#f6f9fd;
    border:1px solid #e3ebf5;
  }
  .package-db-preview img{
    width:92px;
    height:54px;
    object-fit:cover;
    border-radius:10px;
    background:#eef4fb;
    flex:0 0 92px;
  }
  .package-db-preview-text{
    color:#050F71;
    font-size:12px;
    font-weight:600;
  }
  .package-db-actions{
    display:flex;
    gap:10px;
    margin-top:20px;
  }
  .package-db-btn{
    flex:1;
    height:44px;
    border:0;
    border-radius:999px;
    font-family:'Poppins',sans-serif;
    font-size:13px;
    font-weight:700;
    cursor:pointer;
  }
  .package-db-btn.cancel{background:#e9eef5;color:#555;}
  .package-db-btn.save{background:linear-gradient(90deg,#050F71 0%,#78B0ED 100%);color:#fff;}
  .package-db-note{
    margin:2px 0 0;
    color:#8a96a8;
    font-size:10px;
    line-height:1.45;
  }

  .package-db-price-wrap{position:relative;display:flex;align-items:center;}
  .package-db-price-prefix{
    position:absolute;left:13px;top:50%;transform:translateY(-50%);
    color:#050F71;font-size:13px;font-weight:700;pointer-events:none;
  }
  .package-db-price-input{padding-left:34px !important;}
  .package-db-saving{
    margin:0 0 14px;
    padding:10px 12px;
    border-radius:12px;
    background:#eaf4ff;
    border:1px solid #b9d9f7;
    color:#050F71;
    font-size:11px;
    display:none;
  }
  .package-db-saving.show{display:block;}

  @media(max-width:640px){
    .package-db-grid{grid-template-columns:1fr;}
    .package-db-field.full{grid-column:auto;}
  }
</style>

<div class="package-db-overlay" id="packageDbOverlay" aria-hidden="true">
  <div class="package-db-modal" role="dialog" aria-modal="true" aria-labelledby="packageDbTitle">
    <div class="package-db-head">
      <h3 class="package-db-title" id="packageDbTitle">Tambah Paket</h3>
      <button type="button" class="package-db-close" onclick="closePackageDbModal()" aria-label="Tutup">×</button>
    </div>

    <form id="packageDbForm">
      @csrf
      <input type="hidden" id="packageDbId" value="">

      <div class="package-db-grid">
        <div class="package-db-field full">
          <label for="packageDbName">Nama Paket</label>
          <input id="packageDbName" type="text" maxlength="255" required>
        </div>

        <div class="package-db-field">
          <label for="packageDbType">Jenis</label>
          <select id="packageDbType" required>
            <option value="privat">Privat</option>
            <option value="kelompok">Kelompok</option>
          </select>
        </div>

        <div class="package-db-field">
          <label for="packageDbJenjang">Jenjang</label>
          <select id="packageDbJenjang" required>
            <option value="TK">TK</option>
            <option value="SD">SD</option>
            <option value="SMP">SMP</option>
            <option value="SMA/K">SMA/K</option>
          </select>
        </div>

        <div class="package-db-field">
          <label for="packageDbStudents">Jumlah Siswa</label>
          <input id="packageDbStudents" type="text" maxlength="100" placeholder="Contoh: 1 Siswa / 6-9 Siswa" required>
        </div>

        <div class="package-db-field">
          <label for="packageDbDuration">Durasi</label>
          <input id="packageDbDuration" type="text" maxlength="100" placeholder="Contoh: 1 jam" required>
        </div>

        <div class="package-db-field full">
          <label for="packageDbDesc">Deskripsi</label>
          <textarea id="packageDbDesc" required></textarea>
        </div>

        <div class="package-db-field">
          <label for="packageDbPrice">Harga / Bulan</label>
          <div class="package-db-price-wrap">
            <span class="package-db-price-prefix">Rp</span>
            <input id="packageDbPrice" class="package-db-price-input" type="text" inputmode="numeric" autocomplete="off" placeholder="300.000" required>
          </div>
        </div>

        <div class="package-db-field">
          <label>Gambar Otomatis</label>
          <div class="package-db-preview">
            <img id="packageDbPreview" src="" alt="Preview paket">
            <div>
              <div class="package-db-preview-text" id="packageDbPreviewText">Jenjang menentukan gambar & warna kartu</div>
              <p class="package-db-note">TK hijau · SD merah · SMP biru tua · SMA/K biru muda</p>
            </div>
          </div>
        </div>
      </div>

      <div class="package-db-saving" id="packageDbSaving">Menyimpan perubahan ke database...</div>

      <div class="package-db-actions">
        <button type="button" class="package-db-btn cancel" onclick="closePackageDbModal()">Batal</button>
        <button type="submit" class="package-db-btn save" id="packageDbSubmitBtn">Simpan Paket</button>
      </div>
    </form>
  </div>
</div>

<!-- TAMBAHAN: TOMBOL TAMBAH / HAPUS PAKET -->
<style id="ONLY-ADD-PACKAGE-ACTION-BUTTONS">
  .package-section .package-action-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    box-sizing:border-box;
    border:0;
    border-radius:999px;
    padding:0 11px 0 5px;
    margin:0;
    color:#fff;
    font-family:'Poppins',sans-serif;
    line-height:1;
    white-space:nowrap;
    cursor:pointer;
    flex:0 0 auto;
  }

  .package-section .package-action-btn.add{
    background:#78B0ED;
    margin-left:auto;
  }

  .package-section .package-action-btn.delete{
    background:#B00000;
    margin-left:0;
  }

  .package-section .package-action-icon{
    width:28px;
    height:28px;
    min-width:28px;
    min-height:28px;
    flex:0 0 28px;
    border-radius:50%;
    background:#fff;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    box-sizing:border-box;
    transform:translateX(3px);
  }

  .package-section .package-action-icon svg{
    width:17px;
    height:17px;
    display:block;
    overflow:visible;
  }

  .package-section .package-action-btn.add .package-action-icon svg{
    stroke:#78B0ED;
  }

  .package-section .package-action-btn.delete .package-action-icon svg{
    stroke:#B00000;
  }

  .package-section .package-delete-x{
    position:absolute;
    top:7px;
    right:7px;
    width:28px;
    height:28px;
    padding:0;
    border:0;
    border-radius:50%;
    background:#B00000;
    color:#fff;
    font-family:'Poppins',sans-serif;
    font-size:20px;
    line-height:28px;
    text-align:center;
    cursor:pointer;
    z-index:30;
  }

  .package-section .pkg-card{
    position:relative;
  }

  .package-section.package-delete-mode .pkg-card{
    outline:2px solid rgba(176,0,0,.18);
    outline-offset:-2px;
  }
</style>

<script id="ONLY-ADD-PACKAGE-ACTION-BUTTONS-JS">
(function(){
  function getCsrfToken(){
    return document.querySelector('#packageDbForm input[name="_token"]')?.value || '';
  }

  function packageActionButtons(){
    const section=document.querySelector('.package-section');
    if(!section)return;
    const tabs=section.querySelector('.tab-container');
    if(!tabs)return;

    if(!tabs.querySelector('.package-action-btn.add')){
      const add=document.createElement('button');
      add.type='button';
      add.className='package-action-btn add';
      add.innerHTML=`
        <span class="package-action-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round">
            <path d="M12 6v12"></path>
            <path d="M6 12h12"></path>
          </svg>
        </span>
        <span>Tambah Paket</span>
      `;
      add.addEventListener('click',function(){
        window.openPackageDbModal();
      });
      tabs.appendChild(add);
    }

    if(!tabs.querySelector('.package-action-btn.delete')){
      const del=document.createElement('button');
      del.type='button';
      del.className='package-action-btn delete';
      del.innerHTML=`
        <span class="package-action-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round">
            <path d="M7 7l10 10"></path>
            <path d="M17 7L7 17"></path>
          </svg>
        </span>
        <span>Hapus Paket</span>
      `;
      del.addEventListener('click',function(){
        window.togglePackageDeleteMode();
      });
      tabs.appendChild(del);
    }

    syncActionSize();
  }

  function syncActionSize(){
    const section=document.querySelector('.package-section');
    if(!section)return;
    const tab=section.querySelector('.tab-pill');
    const buttons=section.querySelectorAll('.package-action-btn');
    if(!tab||!buttons.length)return;

    const cs=getComputedStyle(tab);
    const h=tab.getBoundingClientRect().height || parseFloat(cs.height) || 32;
    buttons.forEach(btn=>{
      btn.style.height=Math.round(h)+'px';
      btn.style.minHeight=Math.round(h)+'px';
      btn.style.fontSize=cs.fontSize||'15px';
      btn.style.fontWeight=cs.fontWeight||'500';
    });
  }

  function packageJenjangMeta(j){
    if(j==='TK') return {image:'Paket TK', text:'TK → hijau'};
    if(j==='SD') return {image:'Paket SD', text:'SD → merah'};
    if(j==='SMP') return {image:'PAKET_SMP_TERBARU', text:'SMP → biru tua'};
    return {image:'Paket SMA', text:'SMA/K → biru muda'};
  }

  const packageImageCandidates={
    'Paket TK':[assetImageBase+'/Paket TK.png'],
    'Paket SD':[assetImageBase+'/Paket SD.png'],
    'PAKET_SMP_TERBARU':[assetImageBase+'/PAKET_SMP_TERBARU.png'],
    'Paket SMA':[assetImageBase+'/Paket SMA.png']
  };

  function formatRupiahInput(value){
    const digits=String(value??'').replace(/[^\d]/g,'');
    if(!digits)return '';
    return digits.replace(/\B(?=(\d{3})+(?!\d))/g,'.');
  }

  function numericRupiah(value){
    const digits=String(value??'').replace(/[^\d]/g,'');
    return digits ? Number(digits) : 0;
  }

  function updatePackageDbPreview(){
    const j=document.getElementById('packageDbJenjang')?.value || 'SMP';
    const meta=packageJenjangMeta(j);
    const img=document.getElementById('packageDbPreview');
    const txt=document.getElementById('packageDbPreviewText');
    if(img){
      img.src=(packageImageCandidates[meta.image]||[])[0]||'';
      img.onerror=function(){
        this.onerror=null;
        this.src=(packageImageCandidates['Paket SMA']||[])[0]||'';
      };
    }
    if(txt)txt.textContent=meta.text;
  }

  function openPackageDbModal(id){
    const overlay=document.getElementById('packageDbOverlay');
    const form=document.getElementById('packageDbForm');
    if(!overlay||!form)return;

    const editing=id!==undefined && id!==null && String(id)!=='';
    form.reset();
    document.getElementById('packageDbId').value='';
    document.getElementById('packageDbType').value=activeTabState || 'privat';
    document.getElementById('packageDbJenjang').value='SMP';
    document.getElementById('packageDbPrice').value='300.000';
    document.getElementById('packageDbTitle').textContent=editing?'Edit Paket':'Tambah Paket';
    document.getElementById('packageDbSubmitBtn').textContent=editing?'Simpan Perubahan':'Simpan Paket';
    document.getElementById('packageDbSaving')?.classList.remove('show');

    if(editing){
      const idText=String(id);
      const p=packagesMasterData.find(x=>String(x.id)===idText);
      if(!p){
        alert('Paket tidak ditemukan. Silakan refresh halaman Admin lalu coba lagi.');
        return;
      }

      document.getElementById('packageDbId').value=p.id;
      document.getElementById('packageDbName').value=p.title||'';
      document.getElementById('packageDbType').value=p.type||'privat';
      document.getElementById('packageDbJenjang').value=p.jenjang||'SMP';
      document.getElementById('packageDbStudents').value=(p.quotaText||'').split('|')[0].trim();
      document.getElementById('packageDbDuration').value=((p.quotaText||'').split('|')[1]||'').replace(/^Durasi\s*/i,'').trim();
      document.getElementById('packageDbDesc').value=p.description||'';
      document.getElementById('packageDbPrice').value=formatRupiahInput(p.priceNumeric??0);
    }

    updatePackageDbPreview();
    overlay.classList.add('show');
    overlay.setAttribute('aria-hidden','false');
    setTimeout(()=>document.getElementById('packageDbName')?.focus(),50);
  }

  function closePackageDbModal(){
    const overlay=document.getElementById('packageDbOverlay');
    if(!overlay)return;
    overlay.classList.remove('show');
    overlay.setAttribute('aria-hidden','true');
    document.getElementById('packageDbSaving')?.classList.remove('show');
  }

  async function readResponse(response){
    const contentType=response.headers.get('content-type')||'';
    if(contentType.includes('application/json'))return await response.json();
    const raw=await response.text();
    return {message:raw.replace(/<[^>]*>/g,' ').replace(/\s+/g,' ').trim()};
  }

  async function submitPackageDb(e){
    e.preventDefault();

    const id=document.getElementById('packageDbId').value;
    const submitBtn=document.getElementById('packageDbSubmitBtn');
    const saving=document.getElementById('packageDbSaving');
    const csrfToken=getCsrfToken();

    if(!csrfToken){
      alert('Token keamanan tidak ditemukan. Silakan refresh halaman Admin.');
      return;
    }

    const data={
      name:document.getElementById('packageDbName').value.trim(),
      type:document.getElementById('packageDbType').value,
      jenjang:document.getElementById('packageDbJenjang').value,
      jumlah_siswa:document.getElementById('packageDbStudents').value.trim(),
      durasi:document.getElementById('packageDbDuration').value.trim(),
      deskripsi:document.getElementById('packageDbDesc').value.trim(),
      harga:numericRupiah(document.getElementById('packageDbPrice').value)
    };

    if(!data.name||!data.jumlah_siswa||!data.durasi||!data.deskripsi){
      alert('Semua data paket wajib diisi.');
      return;
    }
    if(!Number.isFinite(data.harga)||data.harga<0){
      alert('Harga paket tidak valid.');
      return;
    }

    const url=id
      ? "{{ url('/admin/packages') }}/"+encodeURIComponent(id)
      : "{{ route('admin.packages.store') }}";

    const oldText=submitBtn?.textContent||'Simpan Paket';
    if(submitBtn){submitBtn.disabled=true;submitBtn.textContent='Menyimpan...';}
    saving?.classList.add('show');

    try{
      const payload=new URLSearchParams();
      payload.append('_token',csrfToken);
      if(id)payload.append('_method','PUT');
      Object.entries(data).forEach(([key,value])=>payload.append(key,String(value)));

      const response=await fetch(url,{
        method:'POST',
        credentials:'same-origin',
        headers:{
          'Accept':'application/json',
          'X-Requested-With':'XMLHttpRequest',
          'Content-Type':'application/x-www-form-urlencoded;charset=UTF-8'
        },
        body:payload.toString()
      });

      const result=await readResponse(response);
      if(!response.ok){
        let message=result.message||'Paket gagal disimpan.';
        if(result.errors){
          const first=Object.keys(result.errors)[0];
          if(first&&result.errors[first]?.[0])message=result.errors[first][0];
        }
        throw new Error(message);
      }

      // Server has successfully written the DB record. Reload then shows the DB state.
      window.location.href="{{ url('/admin/home') }}";
    }catch(error){
      saving?.classList.remove('show');
      alert(error.message||'Paket gagal disimpan.');
      if(submitBtn){submitBtn.disabled=false;submitBtn.textContent=oldText;}
    }
  }

  window.openPackageDbModal=openPackageDbModal;
  window.closePackageDbModal=closePackageDbModal;
  window.updatePackageDbPreview=updatePackageDbPreview;

  window.togglePackageDeleteMode=function(){
    const section=document.querySelector('.package-section');
    if(!section)return;

    const active=section.classList.toggle('package-delete-mode');
    section.querySelectorAll('.package-delete-x').forEach(x=>x.remove());
    if(!active)return;

    section.querySelectorAll('.pkg-card').forEach(card=>{
      const x=document.createElement('button');
      x.type='button';
      x.className='package-delete-x';
      x.textContent='×';
      x.title='Hapus paket';
      x.addEventListener('click',async function(e){
        e.preventDefault();
        e.stopPropagation();

        const id=card.getAttribute('data-package-id');
        const p=packagesMasterData.find(item=>String(item.id)===String(id));
        if(!id||!p){alert('Paket tidak ditemukan. Silakan refresh halaman Admin.');return;}

        if(!window.confirm('Apakah Anda yakin ingin menghapus paket "'+p.title+'"?'))return;

        const token=getCsrfToken();
        if(!token){alert('Token keamanan tidak ditemukan. Silakan refresh halaman Admin.');return;}

        x.disabled=true;
        try{
          const response=await fetch("{{ url('/admin/packages') }}/"+encodeURIComponent(id),{
            method:'POST',
            credentials:'same-origin',
            headers:{
              'Accept':'application/json',
              'X-Requested-With':'XMLHttpRequest',
              'Content-Type':'application/x-www-form-urlencoded;charset=UTF-8'
            },
            body:new URLSearchParams({_token:token,_method:'DELETE'}).toString()
          });

          const result=await readResponse(response);
          if(!response.ok)throw new Error(result.message||'Paket gagal dihapus.');

          window.location.href="{{ url('/admin/home') }}";
        }catch(error){
          x.disabled=false;
          alert(error.message||'Paket gagal dihapus.');
        }
      });
      card.appendChild(x);
    });
  };

  // Event delegation means Edit keeps working after renderPackages() recreates cards.
  document.addEventListener('click',function(e){
    const edit=e.target.closest('.package-edit-btn');
    if(edit){
      e.preventDefault();
      e.stopPropagation();
      const id=edit.getAttribute('data-package-id');
      if(id!==null&&id!=='')window.openPackageDbModal(String(id));
    }
  });

  document.addEventListener('DOMContentLoaded',function(){
    const form=document.getElementById('packageDbForm');
    const jenjang=document.getElementById('packageDbJenjang');
    const overlay=document.getElementById('packageDbOverlay');
    const price=document.getElementById('packageDbPrice');

    form?.addEventListener('submit',submitPackageDb);
    jenjang?.addEventListener('change',updatePackageDbPreview);
    price?.addEventListener('input',function(){price.value=formatRupiahInput(price.value);});
    overlay?.addEventListener('click',function(e){
      if(e.target===e.currentTarget)closePackageDbModal();
    });

    packageActionButtons();
    window.addEventListener('resize',syncActionSize);
  });
})();
</script>

<style id="FINAL-PACKAGE-ACTION-ALIGNMENT">
.package-section .tab-container {
    align-items: center;
    flex-wrap: nowrap;
}

.package-section .package-action-btn {
    align-self: center;
    flex: 0 0 auto;
    box-sizing: border-box;
}

.package-section .package-action-btn .package-action-icon {
    flex: 0 0 auto;
}
</style>

<style id="OSON-CHAT-REFERENCE-ONLY">
/* CHAT — hanya penyesuaian ukuran agar mengikuti gambar referensi */
body:has(#osonChatToggle:checked) .chat-window {
    position: fixed;
    left: 53px;
    top: 65px;
    right: auto;
    bottom: auto;
    width: 628px;
    height: 331px;
    max-width: 628px;
    max-height: 331px;
    border-radius: 18px;
    overflow: hidden;
    background: #fff;
    display: flex;
    z-index: 100000;
    box-sizing: border-box;
}

.oson-chat-reference {
    width: 100%;
    height: 100%;
    min-width: 0;
    min-height: 0;
    display: grid;
    grid-template-columns: 43% 57%;
    grid-template-rows: 55px minmax(0, 1fr);
    background: #fff;
    font-family: 'Poppins', sans-serif;
}

.oson-chat-accounts {
    grid-column: 1;
    grid-row: 1 / 3;
    min-width: 0;
    min-height: 0;
    background: #fff;
    overflow-y: auto;
}

.oson-chat-account {
    height: 55px;
    box-sizing: border-box;
    padding: 8px 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    border-bottom: 1px solid #B8D7F9;
    cursor: pointer;
    background: #fff;
}

.oson-chat-account.active {
    background: #B8D7F9;
}

.oson-chat-account img {
    width: 30px;
    height: 30px;
    flex: 0 0 30px;
    border-radius: 50%;
    object-fit: cover;
}

.oson-chat-account-info {
    min-width: 0;
}

.oson-chat-account-name {
    margin: 0 0 1px;
    color: #050F71;
    font-size: 14px;
    line-height: 1.15;
    font-weight: 700;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.oson-chat-account-preview {
    margin: 0;
    color: #050F71;
    font-size: 9px;
    line-height: 1.15;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.oson-chat-head {
    grid-column: 2;
    grid-row: 1;
    padding: 9px 20px;
    box-sizing: border-box;
    color: #fff;
    background: linear-gradient(110deg, #071477 0%, #78B0ED 100%);
}

.oson-chat-head-name {
    margin: 0;
    font-size: 17px;
    line-height: 1.15;
    font-weight: 700;
}

.oson-chat-head-status {
    margin-top: 1px;
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    line-height: 1.15;
    font-weight: 400;
}

.oson-chat-status-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #D9D9D9;
    flex: 0 0 6px;
}

.oson-chat-body {
    grid-column: 2;
    grid-row: 2;
    min-width: 0;
    min-height: 0;
    display: flex;
    flex-direction: column;
    background: #fff;
}

.oson-chat-messages {
    flex: 1;
    min-height: 0;
    overflow-y: auto;
    padding: 20px 20px 6px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    box-sizing: border-box;
}

.oson-chat-bubble {
    max-width: 72%;
    padding: 8px 12px;
    box-sizing: border-box;
    color: #fff;
    font-size: 12px;
    line-height: 1.3;
    font-weight: 400;
    word-break: break-word;
}

.oson-chat-bubble.user {
    align-self: flex-start;
    background: #78B0ED;
    border-radius: 16px 16px 16px 0;
}

.oson-chat-bubble.admin {
    align-self: flex-end;
    background: #050F71;
    border-radius: 16px 16px 0 16px;
}

.oson-chat-composer {
    padding: 5px 20px 20px;
    box-sizing: border-box;
    background: #fff;
}

.oson-chat-form {
    width: 100%;
    height: 36px;
    display: flex;
    align-items: center;
    border-radius: 20px;
    padding: 0 7px 0 12px;
    box-sizing: border-box;
    background: linear-gradient(90deg, #050F71 0%, #78B0ED 100%);
}

.oson-chat-input {
    flex: 1;
    min-width: 0;
    border: 0;
    outline: 0;
    background: transparent;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 400;
}

.oson-chat-input::placeholder {
    color: #fff;
    opacity: 1;
}

.oson-chat-send {
    width: 30px;
    height: 30px;
    flex: 0 0 30px;
    padding: 0;
    border: 0;
    background: transparent;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.oson-chat-send svg {
    width: 27px;
    height: 27px;
    display: block;
    transform: none;
}

.oson-chat-account:focus-visible,
.oson-chat-send:focus-visible,
.oson-chat-input:focus-visible {
    outline: 2px solid #78B0ED;
    outline-offset: -2px;
}

@media (max-width: 900px) {
    body:has(#osonChatToggle:checked) .chat-window {
        left: 53px;
        top: 65px;
        right: auto;
        bottom: auto;
        width: min(628px, calc(100vw - 70px));
        height: min(331px, calc(100vh - 80px));
        max-width: 628px;
        max-height: 331px;
        border-radius: 18px;
    }

    .oson-chat-reference {
        grid-template-columns: 43% 57%;
        grid-template-rows: 55px minmax(0, 1fr);
    }

    .oson-chat-account {
        height: 55px;
        padding: 8px 16px;
        gap: 12px;
    }

    .oson-chat-account img {
        width: 30px;
        height: 30px;
        flex-basis: 30px;
    }

    .oson-chat-account-name { font-size: 14px; }
    .oson-chat-account-preview { font-size: 9px; }
    .oson-chat-head { padding: 9px 20px; }
    .oson-chat-head-name { font-size: 17px; }
    .oson-chat-head-status { font-size: 11px; }
    .oson-chat-messages { padding: 20px 20px 6px; gap: 10px; }
    .oson-chat-bubble { font-size: 12px; padding: 8px 12px; }
    .oson-chat-composer { padding: 5px 20px 20px; }
    .oson-chat-form { height: 36px; padding-left: 12px; }
    .oson-chat-input { font-size: 12px; }
}
</style>

<script id="OSON-CHAT-REFERENCE-JS">
(function () {
    var accounts = [
        { id: 'starryblue', name: 'starryblue', image: 'Profil Chat.png', preview: 'hari ini bisa kak ?' },
        { id: 'soulversez', name: 'Soulversez', image: 'PP Akun.png', preview: 'kalau jadwalnya...' },
        { id: 'junepoo', name: 'Junepoo', image: 'Profil Chat.png', preview: 'oh gitu, oke kak' },
        { id: 'moonlown', name: 'moonlown', image: 'Profil Chat.png', preview: 'caranya gimana ya ?' },
        { id: 'yuanovahelga', name: 'yuanovahelga', image: 'Profil Chat.png', preview: 'selamat siang kak' },
        { id: 'zsaqisyhf', name: 'zsaqisyhf', image: 'Profil Chat.png', preview: 'terimakasih kak' }
    ];

    var defaultMessages = {
        starryblue: [
            { text: 'Kak, hari ini masih bisa daftar les?', sender: 'user' },
            { text: 'Bisa kak, pendaftarannya masih dibuka.', sender: 'admin' },
            { text: 'Baik kak, saya mau daftar yang privat.', sender: 'user' }
        ],
        soulversez: [
            { text: 'Kak, saya mau tanya jadwal les untuk minggu ini.', sender: 'user' },
            { text: 'Bisa kak. Untuk jadwal minggu ini masih tersedia beberapa pilihan.', sender: 'admin' },
            { text: 'Kalau hari Sabtu masih ada jadwalnya kak?', sender: 'user' }
        ],
        junepoo: [
            { text: 'Kak, setelah memilih paket les selanjutnya bagaimana?', sender: 'user' },
            { text: 'Silakan pilih paketnya terlebih dahulu kak, setelah itu lanjut ke pendaftaran.', sender: 'admin' },
            { text: 'Oke kak, saya pilih paketnya dulu.', sender: 'user' }
        ],
        moonlown: [
            { text: 'Kak, saya masih bingung memilih paket les.', sender: 'user' },
            { text: 'Tidak apa-apa kak, saya bantu pilihkan sesuai kebutuhan belajarnya.', sender: 'admin' },
            { text: 'Baik kak, nanti saya jelaskan kebutuhan saya.', sender: 'user' }
        ],
        yuanovahelga: [
            { text: 'Selamat siang kak, saya mau menanyakan jadwal les.', sender: 'user' },
            { text: 'Selamat siang kak. Saya bantu cek jadwal yang tersedia ya.', sender: 'admin' },
            { text: 'Baik kak, saya tunggu informasinya.', sender: 'user' }
        ],
        zsaqisyhf: [
            { text: 'Kak, apakah pembayaran sudah berhasil masuk?', sender: 'user' },
            { text: 'Sudah kak, pembayaran sudah kami terima.', sender: 'admin' },
            { text: 'Baik kak, terima kasih informasinya.', sender: 'user' }
        ]
    };
    var currentAccount = 'soulversez';
    var chats = {};

    function loadChats() {
        try {
            var saved = localStorage.getItem('osonChatAccountsAdminV2');
            chats = saved ? JSON.parse(saved) : {};
        } catch (e) {
            chats = {};
        }
        accounts.forEach(function (account) {
            if (!Array.isArray(chats[account.id])) {
                chats[account.id] = (defaultMessages[account.id] || []).slice();
            }
        });
    }

    function saveChats() {
        try { localStorage.setItem('osonChatAccountsAdminV2', JSON.stringify(chats)); } catch (e) {}
    }

    function imageFallback(img) {
        if (img.dataset.fallback === '1') return;
        img.dataset.fallback = '1';
        if (img.src.indexOf('PP Akun') !== -1) {
            img.src = 'PP Akun.jpg';
        } else {
            img.src = 'Profil Chat.jpg';
        }
    }

    function buildChat() {
        var chat = document.getElementById('chatWindow');
        if (!chat) return;

        chat.innerHTML = '';
        var root = document.createElement('div');
        root.className = 'oson-chat-reference';

        var list = document.createElement('aside');
        list.className = 'oson-chat-accounts';
        list.id = 'osonChatAccounts';

        accounts.forEach(function (account) {
            var item = document.createElement('div');
            item.className = 'oson-chat-account' + (account.id === currentAccount ? ' active' : '');
            item.dataset.account = account.id;
            item.tabIndex = 0;

            var img = document.createElement('img');
            img.src = account.image;
            img.alt = account.name;
            img.onerror = function () { imageFallback(img); };

            var info = document.createElement('div');
            info.className = 'oson-chat-account-info';

            var name = document.createElement('p');
            name.className = 'oson-chat-account-name';
            name.textContent = account.name;

            var preview = document.createElement('p');
            preview.className = 'oson-chat-account-preview';
            preview.dataset.preview = account.id;
            preview.textContent = account.preview;

            info.appendChild(name);
            info.appendChild(preview);
            item.appendChild(img);
            item.appendChild(info);

            item.addEventListener('click', function () { selectAccount(account.id); });
            item.addEventListener('keydown', function (event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    selectAccount(account.id);
                }
            });
            list.appendChild(item);
        });

        var head = document.createElement('header');
        head.className = 'oson-chat-head';
        head.innerHTML = '<h2 class="oson-chat-head-name" id="osonChatHeadName"></h2>' +
            '<div class="oson-chat-head-status"><span class="oson-chat-status-dot"></span><span>Offline</span></div>';

        var body = document.createElement('div');
        body.className = 'oson-chat-body';

        var messages = document.createElement('div');
        messages.className = 'oson-chat-messages';
        messages.id = 'osonChatMessages';

        var composer = document.createElement('div');
        composer.className = 'oson-chat-composer';
        composer.innerHTML = '<form class="oson-chat-form" id="osonChatForm">' +
            '<input class="oson-chat-input" id="osonChatInput" type="text" autocomplete="off" placeholder="Ketik Pesan..." aria-label="Ketik pesan">' +
            '<button class="oson-chat-send" type="submit" aria-label="Kirim pesan">' +
            '<svg viewBox="0 0 46 46" aria-hidden="true"><path d="M8 5.5L39 23L8 40.5L13 26.2L28.2 23L13 19.8L8 5.5Z" fill="white"></path></svg>' +
            '</button></form>';

        body.appendChild(messages);
        body.appendChild(composer);
        root.appendChild(list);
        root.appendChild(head);
        root.appendChild(body);
        chat.appendChild(root);

        document.getElementById('osonChatForm').addEventListener('submit', sendMessage);
        renderAccount();
    }

    function renderAccount() {
        var account = accounts.find(function (item) { return item.id === currentAccount; });
        if (!account) return;

        document.getElementById('osonChatHeadName').textContent = account.name;
        document.querySelectorAll('.oson-chat-account').forEach(function (item) {
            item.classList.toggle('active', item.dataset.account === currentAccount);
        });

        var messages = document.getElementById('osonChatMessages');
        messages.innerHTML = '';
        (chats[currentAccount] || []).forEach(function (message) {
            addBubble(message.text, message.sender, false);
        });
        messages.scrollTop = messages.scrollHeight;
    }

    function selectAccount(id) {
        currentAccount = id;
        renderAccount();
        var input = document.getElementById('osonChatInput');
        if (input) input.focus();
    }

    function addBubble(text, sender, store) {
        var messages = document.getElementById('osonChatMessages');
        if (!messages) return;
        var bubble = document.createElement('div');
        bubble.className = 'oson-chat-bubble ' + sender;
        bubble.textContent = text;
        messages.appendChild(bubble);
        messages.scrollTop = messages.scrollHeight;
        if (store) {
            chats[currentAccount].push({ text: text, sender: sender });
            saveChats();
        }
    }

    function updatePreview() {
        accounts.forEach(function (account) {
            var messages = chats[account.id] || [];
            if (!messages.length) return;
            var last = messages[messages.length - 1];
            var preview = document.querySelector('[data-preview="' + account.id + '"]');
            if (preview) preview.textContent = last.text;
        });
    }

    function sendMessage(event) {
        event.preventDefault();
        var input = document.getElementById('osonChatInput');
        var text = input.value.trim();
        if (!text) return;

        addBubble(text, 'admin', true);
        input.value = '';
        updatePreview();
    }

    function bindToggle() {
        var toggle = document.getElementById('osonChatToggle');
        if (!toggle || toggle.dataset.referenceChatBound === '1') return;
        toggle.dataset.referenceChatBound = '1';
        toggle.addEventListener('change', function () {
            if (toggle.checked) {
                buildChat();
                requestAnimationFrame(function () {
                    var input = document.getElementById('osonChatInput');
                    if (input) input.focus();
                });
            }
        });
    }

    loadChats();
    document.addEventListener('DOMContentLoaded', bindToggle);
    window.addEventListener('load', bindToggle);
})();
</script>

<style>
.chat-window {
    position: fixed;
    width: 180px;
    height: 430px;
    left: auto;
    right: 24px;
    top: auto;
    bottom: 24px;
    max-width: calc(100vw - 48px);
    max-height: calc(100vh - 48px);
    border-radius: 20px;
    overflow: hidden;
}
</style>


