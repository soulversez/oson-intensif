<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            width: 100%;
            min-height: 100vh;
            background: linear-gradient(
                180deg,
                #8cb8f0 0%,
                #bcdcff 45%,
                #e8f2fe 100%
            );
            overflow-x: hidden;
        }

        /* =====================================================
           DAFTAR KONFIRMASI PEMBAYARAN
           ===================================================== */

        .page-list {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 20px;
        }

        .list-card {
            width: 750px;
            max-width: calc(100vw - 40px);
            height: 430px;
            min-height: 430px;
            max-height: 430px;
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            padding-bottom: 12px;
            display: flex;
            flex-direction: column;
        }

        .list-header {
            padding: 14px 0;
            text-align: center;
            width: 100%;
        }

        .list-title {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(
                180deg,
                #6A96CA 0%,
                #050F71 100%
            );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block;
        }

        .table-wrapper {
            width: 100%;
            height: 350px;
            min-height: 350px;
            max-height: 350px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: none;
            box-shadow: none;
        }

        thead {
            background: linear-gradient(
                90deg,
                #050F71 0%,
                #78B0ED 100%
            );
            border: none;
        }

        tr {
            border: none;
        }

        th {
            color: #ffffff;
            font-weight: 700;
            font-size: 15px;
            padding: 12px 10px;
            border: none !important;
            background: transparent !important;
        }

        td {
            padding: 11px 10px;
            font-size: 14px;
            font-weight: 600;
            color: #050F71;
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 1px solid #BFDEFF;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .col-nama {
            width: 25%;
            text-align: left;
            padding-left: 35px;
        }

        .col-paket {
            width: 29%;
            text-align: left;
        }

        .col-status {
            width: 20%;
            text-align: center;
        }

        .col-info {
            width: 26%;
            text-align: center;
            padding-right: 35px;
        }

        .status-badge {
            display: inline-block;
            width: 87px;
            padding: 4px 0;
            border-radius: 100px;
            color: #ffffff;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
            white-space: nowrap;
        }

        .menunggu {
            background: #78B0ED;
        }

        .diterima {
            background: #55BE6B;
        }

        .ditolak {
            background: #A90000;
        }

        .lihat-detail {
            color: #78B0ED;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }

        /* =====================================================
           DETAIL KONFIRMASI
           ===================================================== */

        .page-detail {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 20px;
        }

        .detail-card {
            width: 750px;
            max-width: calc(100vw - 40px);
            min-height: 430px;
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            padding: 24px 30px;
            display: flex;
            flex-direction: column;
        }

        .detail-header {
            text-align: center;
            width: 100%;
            margin-bottom: 20px;
            position: relative;
        }

        .detail-title {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(
                180deg,
                #6A96CA 0%,
                #050F71 100%
            );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block;
        }

        .detail-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #BFDEFF;
        }

        .detail-body {
            display: flex;
            gap: 20px;
            align-items: flex-start;
            margin-top: 10px;
        }

        /* BUKTI PEMBAYARAN */
        .left-section {
            flex: 0 0 38%;
            display: flex;
            justify-content: center;
        }

        .proof-image {
            width: 100%;
            height: 345px;
            object-fit: contain;
            border-radius: 15px;

            /* STROKE BIRU MUDA TIPIS */
            border: 1px solid #BFDEFF;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.10);
            background: #ffffff;
        }

        /* BAGIAN KANAN */
        .right-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        /* INFORMASI PEMBAYARAN */
        .info-card {
            background: #BFDEFF;
            border-radius: 18px;
            padding: 16px 20px;
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .info-title {
            color: #ffffff;
            font-weight: 700;
            font-size: 16px;
            position: relative;
            padding-bottom: 8px;
        }

        .info-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #ffffff;
        }

        .info-row {
            display: flex;
            color: #ffffff;
            font-weight: 600;
            font-size: 14px;
            line-height: 1.5;
        }

        .info-label {
            width: 75px;
        }

        .info-separator {
            width: 20px;
            text-align: center;
        }

        .info-value {
            flex: 1;
        }

        .detail-status {
            display: inline-block;
            width: 87px;
            padding: 3px 0;
            border-radius: 100px;
            color: #ffffff;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
            background: #78B0ED;
        }

        /* =====================================================
           WAKTU
           HANYA BAGIAN INI YANG DIREVISI
           ===================================================== */

        .time-card {
            background: #BFDEFF;
            border-radius: 18px;
            padding: 14px 20px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        /* GARIS PADA WAKTU DIHILANGKAN */
        .time-card .info-title {
            color: #ffffff;
            font-weight: 700;
            font-size: 16px;
            position: relative;
            padding-bottom: 0;
        }

        .time-card .info-title::after {
            display: none;
        }

        /* TEXT BAWAH DIBUAT LEBIH TIPIS */
        .time-value {
            color: #ffffff;
            font-weight: 500;
            font-size: 14px;
        }

        /* TOMBOL */
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 4px;
        }

        .btn {
            border-radius: 100px;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 14px;
            padding: 8px 24px;
            cursor: pointer;
            text-decoration: none;
            border: none;
            text-align: center;
        }

        .btn-tolak {
            background: #A90000;
            color: #ffffff;
        }

        .btn-terima {
            background: linear-gradient(
                90deg,
                #050F71 0%,
                #78B0ED 100%
            );
            color: #ffffff;
        }

        .detail-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 10px;
            color: #78B0ED;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .detail-back:hover {
            color: #050F71;
        }

        .detail-back::before {
            content: "←";
            font-size: 18px;
            line-height: 1;
        }

        /* =====================================================
           TAMPILAN AWAL = DAFTAR KONFIRMASI
           DETAIL MUNCUL SAAT LIHAT DETAIL DIKLIK
           ===================================================== */

        #detail-page {
            display: flex;
        }

        #detail-page ~ .page-list {
            display: none;
        }

        /* =====================================================
           RESPONSIVE
           ===================================================== */

        @media (max-width: 768px) {

            .page-list,
            .page-detail {
                padding: 20px 10px;
            }

            .list-card {
                width: 95%;
                height: 430px;
                min-height: 430px;
                max-height: 430px;
                border-radius: 18px;
            }

            .detail-card {
                width: 95%;
                padding: 15px;
                border-radius: 18px;
            }

            .detail-body {
                flex-direction: column;
                align-items: center;
            }

            .left-section {
                width: 100%;
                flex: none;
            }

            .proof-image {
                width: 260px;
                height: 345px;
            }

            .right-section {
                width: 100%;
            }

            .list-title,
            .detail-title {
                font-size: 20px;
            }

            th {
                font-size: 13px;
            }

            td {
                font-size: 12px;
            }

            .col-nama {
                padding-left: 15px;
            }

            .col-info {
                padding-right: 15px;
            }

            .status-badge {
                width: 87px;
                font-size: 11px;
                padding: 3px 0;
            }

            .lihat-detail {
                font-size: 12px;
            }
        }
    
        .list-card {
            width: 750px;
            max-width: calc(100vw - 40px);
            height: 430px;
            min-height: 430px;
            max-height: 430px;
        }

        .list-card table {
            table-layout: fixed;
        }

        .table-wrapper::-webkit-scrollbar {
            width: 7px;
        }

        .table-wrapper::-webkit-scrollbar-track {
            background: transparent;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: #BFDEFF;
            border-radius: 10px;
        }

        .table-wrapper {
            scrollbar-width: thin;
            scrollbar-color: #BFDEFF transparent;
        }

        .list-card tbody tr td {
            height: 50px;
        }

        .action-buttons form {
            margin: 0;
            padding: 0;
        }

    </style>
</head>

<body>

    <!-- =====================================================
         DETAIL KONFIRMASI
         ===================================================== -->

    @if(isset($selectedPurchase))
    <section class="page-detail" id="detail-page">

        <div class="detail-card">

            <div class="detail-header">
                <h2 class="detail-title">
                    • Detail Konfirmasi •
                </h2>
            </div>

            <div class="detail-body">

                <div class="left-section">

                    @if($selectedPurchase->payment_proof)
                        <img
                            src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($selectedPurchase->payment_proof) }}"
                            alt="Bukti Pembayaran"
                            class="proof-image"
                            onerror="this.onerror=null;this.src='{{ asset('images/Bukti Pembayaran.png') }}';"
                        >
                    @else
                        <img
                            src="{{ asset('images/Bukti Pembayaran.png') }}"
                            alt="Bukti Pembayaran"
                            class="proof-image"
                            onerror="this.onerror=null;this.src='{{ asset('images/Bukti Pembayaran.jpg') }}';"
                        >
                    @endif

                </div>

                <div class="right-section">

                    <div class="info-card">

                        <div class="info-title">
                            Informasi Pembayaran
                        </div>

                        <div class="info-row">
                            <span class="info-label">Nama</span>
                            <span class="info-separator">:</span>
                            <span class="info-value">
                                {{ $selectedPurchase->user->name ?? '-' }}
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Paket</span>
                            <span class="info-separator">:</span>
                            <span class="info-value">
                                {{ optional(\App\Models\Package::find($selectedPurchase->package))->name ?? ucwords(str_replace('-', ' ', $selectedPurchase->package)) }}
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Harga</span>
                            <span class="info-separator">:</span>
                            <span class="info-value">
                                Rp. {{ number_format($selectedPurchase->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">ID Pesanan</span>
                            <span class="info-separator">:</span>
                            <span class="info-value">
                                {{ $selectedPurchase->transaction_code ?? ('OSTENS' . str_pad($selectedPurchase->id, 3, '0', STR_PAD_LEFT)) }}
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Metode</span>
                            <span class="info-separator">:</span>
                            <span class="info-value">
                                {{ $selectedPurchase->payment_method === 'transfer' ? 'Transfer Bank' : 'Tunai' }}
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Status</span>
                            <span class="info-separator">:</span>
                            <span class="info-value">

                                @if($selectedPurchase->status === 'success')
                                    <span class="detail-status diterima">Diterima</span>
                                @elseif($selectedPurchase->status === 'failed')
                                    <span class="detail-status ditolak">Ditolak</span>
                                @else
                                    <span class="detail-status menunggu">Menunggu</span>
                                @endif

                            </span>
                        </div>

                    </div>

                    <div class="time-card">

                        <div class="info-title">
                            Waktu
                        </div>

                        <div class="time-value">
                            {{ $selectedPurchase->created_at?->format('d F Y | H.i') ?? '-' }}
                        </div>

                    </div>

                    @if($selectedPurchase->status === 'pending')
                    <div class="action-buttons">

                        <form
                            action="{{ route('admin.purchase.reject', ['purchase' => $selectedPurchase->id]) }}"
                            method="POST"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="btn btn-tolak"
                            >
                                Tolak
                            </button>
                        </form>

                        <form
                            action="{{ route('admin.purchase.approve', ['purchase' => $selectedPurchase->id]) }}"
                            method="POST"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="btn btn-terima"
                            >
                                Terima
                            </button>
                        </form>

                    </div>
                    @endif

                </div>

            </div>

            <a href="{{ route('admin.confirmation') }}" class="detail-back">Kembali ke daftar konfirmasi</a>

        </div>

    </section>
    @endif


    <!-- =====================================================
         DAFTAR KONFIRMASI PEMBAYARAN
         ===================================================== -->

    <section class="page-list">

        <div class="list-card">

            <div class="list-header">

                <h2 class="list-title">
                    • Konfirmasi Pembayaran •
                </h2>

            </div>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th class="col-nama">
                                Nama
                            </th>

                            <th class="col-paket">
                                Paket Les
                            </th>

                            <th class="col-status">
                                Status
                            </th>

                            <th class="col-info">
                                Informasi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($purchases as $purchase)

                        <tr>

                            <td class="col-nama">
                                {{ $purchase->user->name ?? '-' }}
                            </td>

                            <td class="col-paket">
                                {{ optional(\App\Models\Package::find($purchase->package))->name ?? ucwords(str_replace('-', ' ', $purchase->package)) }}
                            </td>

                            <td class="col-status">
                                @if($purchase->status === 'success')
                                    <span class="status-badge diterima">
                                        Diterima
                                    </span>
                                @elseif($purchase->status === 'failed')
                                    <span class="status-badge ditolak">
                                        Ditolak
                                    </span>
                                @else
                                    <span class="status-badge menunggu">
                                        Menunggu
                                    </span>
                                @endif
                            </td>

                            <td class="col-info">
                                <a
                                    href="{{ route('admin.confirmation.show', $purchase->id) }}"
                                    class="lihat-detail">
                                    Lihat Detail
                                </a>
                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="4" style="text-align:center; padding:18px;">
                                Belum ada pembayaran.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</body>
</html>