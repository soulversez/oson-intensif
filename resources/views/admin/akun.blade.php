<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Admin - Oson Intensif</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(
                180deg,
                #FFFFFF 0%,
                #FFFFFF 60%,
                #F5F9FE 73%,
                #C5E0FB 88%,
                #7DB5F2 100%
            );
            overflow-x: hidden;
            padding-bottom: 60px;
        }

        .top-banner-container {
            width: 100%;
            height: 240px;
            background: #cbe3ff;
        }

        .top-banner-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .main-wrapper {
            width: 100%;
            max-width: 590px;
            margin: -106px auto 0;
            position: relative;
            z-index: 5;
        }

        .profile-card {
            background: #fff;
            border-radius: 28px;
            box-shadow: 0 10px 25px rgba(5,15,113,.08);
            position: relative;
            padding-top: 90px;
            text-align: center;
        }

        .avatar-container {
            position: absolute;
            top: -82px;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 150px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .avatar-container svg {
            width: 120px;
            height: 120px;
        }

        .detail-btn {
            position: absolute;
            right: 56px;
            top: 20px;
            height: 34px;
            min-width: 80px;
            padding: 0 14px;
            border: 0;
            border-radius: 18px;
            background: #bdd9f8;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .logout-btn {
            position: absolute;
            right: 16px;
            top: 20px;
            width: 34px;
            height: 34px;
            border: 0;
            border-radius: 50%;
            background: #a90000;
            color: #fff;
            cursor: pointer;
        }

        .profile-name {
            font-size: 28px;
            font-weight: 800;
            line-height: 1.2;
            background: linear-gradient(180deg,#9BC6F4 0%,#050F71 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .profile-email {
            font-size: 14px;
            color: #7c8ba1;
            font-weight: 500;
            margin-top: 4px;
            margin-bottom: 22px;
        }

        .profile-badge {
            background: #C5E0FB;
            color: #fff;
            font-size: 20px;
            font-weight: 700;
            padding: 14px 0;
            width: 100%;
            border-radius: 0 0 28px 28px;
        }

        .modal {
            position: fixed;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 18px;
            background: rgba(0,0,0,.35);
            z-index: 9999;
        }

        .modal.show {
            display: flex;
        }

        .detail-card {
            width: 390px;
            max-width: calc(100% - 28px);
            background: #fff;
            border-radius: 20px;
            padding: 28px 26px 22px;
            box-shadow: 0 10px 30px rgba(5,15,113,.15);
        }

        .detail-card h2,
        .detail-card h3 {
            font-weight: 700;
            background: linear-gradient(180deg,#9BC6F4 0%,#050F71 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .detail-card h2 {
            font-size: 21px;
            margin-bottom: 8px;
        }

        .detail-card h3 {
            font-size: 19px;
            margin: 23px 0 8px;
        }

        .field {
            position: relative;
            margin-bottom: 10px;
        }

        .field input,
        .password {
            width: 100%;
            height: 36px;
            border: 0;
            outline: 0;
            border-radius: 20px;
            background: #bcd9f7;
            color: #132b7b;
            font-size: 13px;
        }

        .field input {
            padding: 0 40px 0 17px;
        }

        .field img {
            position: absolute;
            width: 14px;
            height: 14px;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
        }

        .password {
            padding: 0 17px;
            margin-bottom: 10px;
        }

        .password::placeholder {
            color: #fff;
        }

        .actions,
        .logout-actions {
            display: flex;
            gap: 9px;
            margin-top: 18px;
        }

        .actions {
            justify-content: flex-end;
        }

        .logout-actions {
            justify-content: center;
            margin-top: 15px;
        }

        .actions button,
        .logout-actions button {
            height: 36px;
            min-width: 84px;
            border: 0;
            border-radius: 20px;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .red {
            background: #a90000;
        }

        .blue {
            background: linear-gradient(90deg,#050F71 0%,#78B0ED 100%);
        }

        .logout-card {
            width: 430px;
            max-width: calc(100% - 28px);
            background: linear-gradient(180deg,#78B0ED 0%,#fff 100%);
            border-radius: 20px;
            padding: 31px 20px 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(5,15,113,.15);
        }

        .logout-card p {
            color: #fff;
            font-size: 14px;
            font-weight: 500;
        }

        @media(max-width:540px) {
            .top-banner-container {
                height: 220px;
            }

            .main-wrapper {
                width: calc(100% - 20px);
                margin-top: -86px;
            }

            .profile-name {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    {{-- BACKGROUND AKUN --}}
    <div class="top-banner-container">
        <img
            src="{{ asset('images/Base Akun.png') }}"
            alt="Base Akun"
            class="top-banner-img"
        >
    </div>

    {{-- CARD ADMIN --}}
    <div class="main-wrapper">

        <div class="profile-card">

            <div class="avatar-container">
                <svg viewBox="0 0 160 160">
                    <circle cx="80" cy="44" r="28" fill="#8eb9eb"/>
                    <path
                        d="M23 127c12-28 35-43 57-43s45 15 57 43c-11 18-31 28-57 28s-46-10-57-28Z"
                        fill="#8eb9eb"
                    />
                </svg>
            </div>

            <button
                type="button"
                class="detail-btn"
                id="open-detail"
            >
                Lihat Detail
            </button>

            <button
                type="button"
                class="logout-btn"
                id="open-logout"
            >
                <i class="fa-solid fa-right-from-bracket"></i>
            </button>

            <h1 class="profile-name">
                {{ Auth::user()->name }}
            </h1>

            <p class="profile-email">
                {{ Auth::user()->email }}
            </p>

            <div class="profile-badge">
                • Admin •
            </div>

        </div>

    </div>


    {{-- MODAL DETAIL --}}
    <div class="modal" id="detail-modal">

        <div class="detail-card">

            <h2>Informasi</h2>

            <div class="field">

                <input
                    type="text"
                    value="{{ Auth::user()->name }}"
                    readonly
                >

                <img
                    src="{{ asset('images/Icon Gembok.png') }}"
                    alt="Gembok"
                >

            </div>

            <div class="field">

                <input
                    type="email"
                    value="{{ Auth::user()->email }}"
                    readonly
                >

                <img
                    src="{{ asset('images/Icon Gembok.png') }}"
                    alt="Gembok"
                >

            </div>

            <h3>Ubah Kata Sandi</h3>

            <form
                method="POST"
                action="{{ route('admin.account.password.update') }}"
            >

                @csrf

                <input
                    class="password"
                    type="password"
                    name="current_password"
                    placeholder="Masukkan Kata Sandi Saat Ini"
                    required
                >

                <input
                    class="password"
                    type="password"
                    name="password"
                    placeholder="Masukkan Kata Sandi Baru"
                    required
                >

                <input
                    class="password"
                    type="password"
                    name="password_confirmation"
                    placeholder="Konfirmasi Kata Sandi"
                    required
                >

                <div class="actions">

                    <button
                        type="button"
                        class="red"
                        id="detail-cancel"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="blue"
                    >
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>


    {{-- MODAL LOGOUT --}}
    <div class="modal" id="logout-modal">

        <div class="logout-card">

            <p>
                Apakah Anda Yakin Ingin Keluar ?
            </p>

            <div class="logout-actions">

                <button
                    type="button"
                    class="red"
                    id="logout-cancel"
                >
                    Tidak
                </button>

                <form
                    method="POST"
                    action="{{ route('admin.logout') }}"
                    style="margin:0;"
                >

                    @csrf

                    <button
                        type="submit"
                        class="blue"
                    >
                        Ya
                    </button>

                </form>

            </div>

        </div>

    </div>


    <script>

        const detailModal =
            document.getElementById('detail-modal');

        const logoutModal =
            document.getElementById('logout-modal');


        // BUKA DETAIL
        document
            .getElementById('open-detail')
            .addEventListener('click', function () {

                detailModal.classList.add('show');

            });


        // TUTUP DETAIL
        document
            .getElementById('detail-cancel')
            .addEventListener('click', function () {

                detailModal.classList.remove('show');

            });


        // BUKA LOGOUT
        document
            .getElementById('open-logout')
            .addEventListener('click', function () {

                logoutModal.classList.add('show');

            });


        // TUTUP LOGOUT
        document
            .getElementById('logout-cancel')
            .addEventListener('click', function () {

                logoutModal.classList.remove('show');

            });


        // KLIK LUAR MODAL
        window.addEventListener('click', function (event) {

            if (event.target === detailModal) {
                detailModal.classList.remove('show');
            }

            if (event.target === logoutModal) {
                logoutModal.classList.remove('show');
            }

        });

    </script>

</body>
</html>