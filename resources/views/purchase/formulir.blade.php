<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulir Pendaftaran</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            width: 100vw;
            height: 100vh;

            background: linear-gradient(
                180deg,
                #8cb8f0 0%,
                #bcdcff 45%,
                #e8f2fe 100%
            );

            display: flex;
            justify-content: center;
            align-items: center;

            overflow: hidden;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            width: 85%;
            max-width: 720px;

            gap: 15px;
        }

        .card-container {
            background: #ffffff;

            width: 100%;

            border-radius: 28px;

            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);

            display: flex;
            flex-direction: column;
            align-items: center;

            overflow: hidden;
        }

        .card-body {
            padding: 22px 30px 10px 30px;

            width: 100%;

            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .title {
            font-size: 26px;
            font-weight: 800;

            margin-bottom: 4px;

            text-align: center;

            background: linear-gradient(
                180deg,
                #6A96CA 0%,
                #050F71 100%
            );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;

            letter-spacing: -0.2px;
        }

        .subtitle {
            color: #78828e;

            font-size: 16px;
            font-weight: 600;

            text-align: center;

            margin-bottom: 12px;

            line-height: 1.3;
        }

        .divider {
            width: 95%;
            height: 2.5px;

            background-color: #d8e1ed;

            margin-bottom: 16px;

            border-radius: 2px;
        }

        .qr-wrapper {
            width: 175px;
            height: 175px;

            display: flex;
            justify-content: center;
            align-items: center;

            margin-bottom: 8px;
        }

        .qr-wrapper img {
            width: 100%;
            height: 100%;

            object-fit: contain;
        }

        .link-banner {
            width: 100%;

            background: #6ea4ea;

            color: #ffffff;

            text-align: center;

            padding: 26px 12px;

            font-size: 21px;
            font-weight: 700;

            text-decoration: none;

            display: block;

            border-bottom-left-radius: 28px;
            border-bottom-right-radius: 28px;

            transition: background 0.2s ease;
        }

        .link-banner:hover {
            background: #5b92db;
        }

        .btn-submit {
            width: 100%;

            padding: 18px 0;

            border-radius: 100px;

            background: linear-gradient(
                90deg,
                #020150 0%,
                #133c99 45%,
                #6da3ea 100%
            );

            color: #ffffff;

            font-size: 22px;
            font-weight: 700;

            text-align: center;

            text-decoration: none;

            display: block;

            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);

            transition:
                transform 0.1s ease,
                box-shadow 0.1s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);

            box-shadow: 0 7px 20px rgba(0, 0, 0, 0.18);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

    </style>

</head>

<body>

    <div class="wrapper">

        <div class="card-container">

            <div class="card-body">

                <h1 class="title">
                    Formulir Pendaftaran
                </h1>

                <p class="subtitle">
                    Sebelum ke proses pembayaran isi Formulir Pendaftaran terlebih dahulu
                </p>

                <div class="divider"></div>

                <div class="qr-wrapper">

                    <img
                        src="{{ asset('images/Barcode Pembayaran Oson.png') }}"
                        alt="Barcode Pembayaran Oson"
                        onerror="this.onerror=null; this.src='{{ asset('images/Barcode Pembayaran Oson.jpg') }}';"
                    >

                </div>

            </div>

            <a
                href="https://bit.ly/Oson_intensif"
                target="_blank"
                rel="noopener noreferrer"
                class="link-banner"
            >
                https://bit.ly/Oson_intensif
            </a>

        </div>

        {{-- LANGSUNG KE HALAMAN PEMBAYARAN --}}
        <a
            href="{{ url('/pembayaran/' . $package) }}"
            class="btn-submit"
        >
            Lanjut ke Pembayaran
        </a>

    </div>

</body>

</html>