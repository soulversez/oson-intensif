<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pembayaran Ditolak</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">

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
            background: linear-gradient(180deg, #8cb8f0 0%, #bcdcff 45%, #e8f2fe 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 90%;
            max-width: 720px;
            gap: 22px;
        }

        .card-container {
            background: linear-gradient(180deg, #fff 0%, #f4d4d4 40%, #860101 100%);
            width: 100%;
            height: 385px;
            border-radius: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 28px;
            position: relative;
            overflow: hidden;
        }

        .title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 0;
            text-align: center;
            background: linear-gradient(180deg, #a80d0d 0%, #860101 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.3px;
        }

        .mascot-wrapper {
            width: 100%;
            height: 290px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: -6px;
        }

        .mascot-wrapper img {
            height: 100%;
            width: auto;
            object-fit: contain;
            transform: scale(1.18);
        }

        .btn-action {
            width: 100%;
            padding: 18px 12px;
            border: none;
            outline: none;
            border-radius: 100px;
            background: linear-gradient(90deg, #020150 0%, #133c99 45%, #6da3ea 100%);
            color: #fff;
            font-size: 22px;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .12);
            cursor: pointer;
            transition: transform .1s ease, box-shadow .1s ease;
            display: block;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(0, 0, 0, .18);
        }

        .btn-action:active {
            transform: translateY(0);
        }

        @media (max-width: 650px) {
            .wrapper {
                width: 92%;
                gap: 18px;
            }

            .card-container {
                height: 330px;
                padding-top: 22px;
                border-radius: 26px;
            }

            .title {
                font-size: 26px;
            }

            .mascot-wrapper {
                height: 245px;
                margin-top: -4px;
            }

            .mascot-wrapper img {
                transform: scale(1.02);
            }

            .btn-action {
                padding: 15px 10px;
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

<div class="wrapper">

    <div class="card-container">
        <h1 class="title">Pembayaran Ditolak</h1>

        <div class="mascot-wrapper">
            <img
                src="{{ asset('images/Maskot Gagal.png') }}"
                alt="Maskot Gagal"
                onerror="this.onerror=null; this.src='{{ asset('images/Maskot Gagal.jpg') }}';"
            >
        </div>
    </div>

    <a
        href="{{ route('payment', ['package' => $package]) }}"
        class="btn-action"
    >
        Kembali ke Pembayaran
    </a>

</div>

</body>
</html>
