<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi</title>
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
        }

        .container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-left: 100px;
        }

        .red-box {
            position: relative;
            width: 390px;
            height: 490px;
            background-color: #70111A;
            border-radius: 28px;
            padding: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .info-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 18px;
        }

        .mascot-image {
            position: absolute;
            left: -140px;
            bottom: -70px;
            height: 470px;
            width: auto;
            z-index: 2;
            filter: drop-shadow(0 8px 15px rgba(0, 0, 0, 0.12));
        }

        .btn-circle {
            position: fixed;
            width: 46px;
            height: 46px;
            top: 35px;
            left: calc(50% - 450px);
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

        .icon-arrow-left {
            width: 12px;
            height: 12px;
            border-left: 3.5px solid #5b92e5;
            border-bottom: 3.5px solid #5b92e5;
            transform: rotate(45deg);
            margin-left: 4px;
        }
    </style>
</head>
<body>

    <div class="btn-circle" onclick="window.location.href='{{ route('home') }}'" title="Kembali">
        <div class="icon-arrow-left"></div>
    </div>

    <div class="container">
        <img
            src="{{ asset('images/Maskot Informasi.png') }}"
            alt="Maskot Informasi"
            class="mascot-image"
            onerror="this.onerror=null; this.src='{{ asset('images/Maskot Informasi.jpg') }}';"
        >

        <div class="red-box">
            <img
                src="{{ asset('images/Informasi.png') }}"
                alt="Informasi"
                class="info-image"
                onerror="this.onerror=null; this.src='{{ asset('images/Informasi.jpg') }}';"
            >
        </div>
    </div>

</body>
</html>
