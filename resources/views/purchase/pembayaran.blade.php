<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <!-- Import Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
            justify-content: center;
            width: 85%;
            max-width: 760px;
            gap: 14px;
        }

        .text-gradient {
            background: linear-gradient(180deg, #6A96CA 0%, #050F71 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block;
        }

        .card-top {
            background: #ffffff;
            width: 100%;
            border-radius: 24px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            padding: 18px 28px;
            display: flex;
            flex-direction: column;
        }

        .title-top {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .subtitle-top {
            color: #78828e;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .divider-top {
            width: 100%;
            height: 2.5px;
            background-color: #dbe4f0;
            margin-bottom: 14px;
            border-radius: 2px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-label {
            font-size: 18px;
            font-weight: 700;
        }

        .total-price {
            font-size: 26px;
            font-weight: 700;
        }

        .grid-middle {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            width: 100%;
        }

        .card-sub {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            padding: 16px 20px;
            display: flex;
            flex-direction: column;
        }

        .sub-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .divider-sub {
            width: 100%;
            height: 2.5px;
            background-color: #dbe4f0;
            margin-bottom: 10px;
            border-radius: 2px;
        }
       .bank-details {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
        }

        .label-gray {
            color: #78828e;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 2px;
        }

        .rekening-box {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .rekening-box .material-symbols-outlined {
            font-size: 18px;
            color: #73a9eb;
            cursor: pointer;
            user-select: none;
            transition: transform 0.1s ease;
        }

        .rekening-box .material-symbols-outlined:active {
            transform: scale(0.9);
        }

        .acc-owner {
            color: #78828e;
            font-size: 13px;
            font-weight: 500;
        }

        .price-blue {
            font-size: 17px;
            font-weight: 700;
        }

        .btn-upload {
            background: #6ea4ea;
            color: #ffffff;
            border: none;
            border-radius: 100px;
            padding: 10px 0;
            font-size: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s ease;
            margin-top: auto;
            width: 100%;
        }

        .btn-upload:hover {
            background: #5b92db;
        }

        #file-input {
            display: none;
        }

        .tunai-desc {
            color: #78828e;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 12px;
            line-height: 1.35;
        }

        .tunai-highlight-container {
            text-align: center;
            font-size: 18px;
            font-weight: 700;
            line-height: 1.25;
            margin-bottom: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .tunai-note {
            text-align: center;
            color: #78828e;
            font-size: 14px;
            font-weight: 500;
            margin-top: auto;
        }

        .btn-submit {
            width: 100%;
            padding: 14px 0;
            border-radius: 100px;
            background: linear-gradient(90deg, #020150 0%, #133c99 45%, #6da3ea 100%);
            color: #ffffff;
            font-size: 22px;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            border: none;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
            transition: transform 0.1s ease, box-shadow 0.1s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(0, 0, 0, 0.18);
        }

        .btn-submit:active {
            transform: translateY(0);
        }
    
        /* ===== Tambahan fungsi saja — layout asli tidak diubah ===== */
        .transaction-code {
            position: absolute;
            top: 18px;
            right: 28px;
            font-size: 16px;
            line-height: 1.2;
            font-weight: 700;
            white-space: nowrap;
        }

        .card-top {
            position: relative;
        }

        .payment-choice {
            position: relative;
            cursor: pointer;
        }

        .payment-radio {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
            pointer-events: none;
        }

        /* Stroke gradasi hanya muncul saat dipilih; tidak menambah ukuran card. */
        .payment-choice::after {
            content: "";
            position: absolute;
            inset: 0;
            padding: 2px;
            border-radius: 24px;
            background: linear-gradient(90deg, #050F71 0%, #78B0ED 100%);
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.15s ease;
        }

        .payment-choice.selected::after {
            opacity: 1;
        }

        #upload-label,
        #copy-btn {
            position: relative;
            z-index: 3;
        }
</style>
</head>
<body>

@php
    $paymentPackages = [
        'privat-tk' => ['label' => 'Privat TK', 'price' => 200000],
        'privat-sd' => ['label' => 'Privat SD', 'price' => 290000],
        'privat-smp' => ['label' => 'Privat SMP', 'price' => 330000],
        'privat-sma' => ['label' => 'Privat SMA/K', 'price' => 350000],
        'kelompok-tk' => ['label' => 'Kelompok TK', 'price' => 230000],
        'kelompok-sd' => ['label' => 'Kelompok SD', 'price' => 260000],
        'kelompok-smp' => ['label' => 'Kelompok SMP', 'price' => 310000],
        'kelompok-sma' => ['label' => 'Kelompok SMA/K', 'price' => 330000],
    ];

    $package = request()->route('package') ?? ($package ?? null);

    // Paket dari database menjadi sumber utama.
    // Tetap mendukung slug lama untuk kompatibilitas.
    if (isset($packageRecord)) {
        $packageLabel = (string) $packageRecord->name;
        $price = (int) ($packageRecord->harga ?? 0);
    } else {
        abort_unless(isset($paymentPackages[$package]), 404);

        $packageLabel = $paymentPackages[$package]['label'];
        $price = $paymentPackages[$package]['price'];
    }

    $nextTransactionNumber = ((int) \App\Models\Purchase::max('id')) + 1;
    $transactionCode = 'OSTENS' . str_pad($nextTransactionNumber, 3, '0', STR_PAD_LEFT);
@endphp

<form
    id="payment-form"
    action="{{ route('payment.confirm', ['package' => $package]) }}"
    method="POST"
    enctype="multipart/form-data"
    style="width:100%; margin:0; padding:0; display:flex; justify-content:center;"
>
    @csrf

    <div class="wrapper">
        
        <div class="card-top">
            <h1 class="title-top text-gradient">Detail Pembelian</h1>
            <span class="transaction-code text-gradient">{{ $transactionCode }}</span>
            <p class="subtitle-top">{{ $packageLabel }} | Periode Agustus</p>
            <div class="divider-top"></div>
            <div class="total-row">
                <span class="total-label text-gradient">Total Pembayaran</span>
                <span class="total-price text-gradient">Rp {{ number_format($price, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Grid Tengah -->
        <div class="grid-middle">
            
            <div class="card-sub payment-choice" data-method="transfer" tabindex="0">
                <input type="radio" name="payment_method" value="transfer" id="payment-transfer" class="payment-radio" required>
                <h2 class="sub-title text-gradient">Transfer Bank</h2>
                <div class="divider-sub"></div>
                
                <div class="bank-details">
                    <div class="bank-info-left">
                        <div class="label-gray">Bank BCA</div>
                        <div class="rekening-box text-gradient">
                            <span id="norek">6767676767</span>
                            <span class="material-symbols-outlined" id="copy-btn" title="Salin Nomor Rekening">content_copy</span>
                        </div>
                        <div class="acc-owner">Oson Itensif</div>
                    </div>
                    
                    <div class="bank-info-right">
                        <div class="label-gray">Total yang di bayar</div>
                        <div class="price-blue text-gradient">Rp {{ number_format($price, 0, ',', '.') }}</div>
                    </div>
                </div>

                <input type="file" id="file-input" name="payment_proof" accept="image/jpeg,image/png,image/webp,application/pdf">
                <label for="file-input" class="btn-upload" id="upload-label">
                    <span class="material-symbols-outlined">cloud_upload</span>
                    <span id="upload-text">Upload Bukti Transfer</span>
                </label>
            </div>

            <div class="card-sub payment-choice" data-method="cash" tabindex="0">
                <input type="radio" name="payment_method" value="cash" id="payment-cash" class="payment-radio">
                <h2 class="sub-title text-gradient">Tunai</h2>
                <div class="divider-sub"></div>
                
                <p class="tunai-desc">Bayar langsung secara tunai di tempat les</p>
                
                <div class="tunai-highlight-container">
                    <span class="text-gradient">Pembayaran dilakukan</span>
                    <span class="text-gradient">saat datang ke lokasi</span>
                </div>
                
                <div class="tunai-note">
                    pembayaran mulai tanggal 1 - 5
                </div>
            </div>

        </div>

        <button class="btn-submit" type="submit" id="confirm-payment">
            Konfirmasi
        </button>

    </div>
</form>

    <script>
        const paymentChoices = document.querySelectorAll('.payment-choice');
        const transferRadio = document.getElementById('payment-transfer');
        const cashRadio = document.getElementById('payment-cash');
        const paymentForm = document.getElementById('payment-form');
        const fileInput = document.getElementById('file-input');
        const uploadText = document.getElementById('upload-text');
        const copyButton = document.getElementById('copy-btn');

        function selectPayment(method) {
            transferRadio.checked = method === 'transfer';
            cashRadio.checked = method === 'cash';

            paymentChoices.forEach((card) => {
                card.classList.toggle('selected', card.dataset.method === method);
            });

            if (fileInput) {
                fileInput.required = method === 'transfer';

                if (method === 'cash') {
                    fileInput.value = '';
                    if (uploadText) {
                        uploadText.innerText = 'Upload Bukti Transfer';
                    }
                }
            }
        }

        paymentChoices.forEach((card) => {
            card.addEventListener('click', function (event) {
                if (
                    event.target.closest('#upload-label') ||
                    event.target.closest('#copy-btn')
                ) {
                    return;
                }

                selectPayment(card.dataset.method);
            });

            card.addEventListener('keydown', function (event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    selectPayment(card.dataset.method);
                }
            });
        });

        paymentForm.addEventListener('submit', function (event) {
            const selected = document.querySelector(
                'input[name="payment_method"]:checked'
            );

            if (!selected) {
                event.preventDefault();
                alert('Silakan pilih metode pembayaran terlebih dahulu.');
                return;
            }

            if (
                selected.value === 'transfer' &&
                fileInput.files.length === 0
            ) {
                event.preventDefault();
                alert('Bukti transfer wajib diunggah.');
            }
        });

        // Fitur Copy Nomor Rekening — tetap seperti layout asli.
        if (copyButton) {
            copyButton.addEventListener('click', function () {
                const norek = document.getElementById('norek').innerText;

                navigator.clipboard.writeText(norek).then(() => {
                    alert('Nomor rekening berhasil disalin: ' + norek);
                }).catch(() => {
                    alert('Nomor rekening: ' + norek);
                });
            });
        }

        // Fitur Display Nama File setelah Upload — tetap seperti layout asli.
        if (fileInput) {
            fileInput.addEventListener('change', function (e) {
                const fileName = e.target.files[0]?.name;

                if (fileName && uploadText) {
                    uploadText.innerText =
                        fileName.length > 18
                            ? fileName.substring(0, 15) + '...'
                            : fileName;
                } else if (uploadText) {
                    uploadText.innerText = 'Upload Bukti Transfer';
                }
            });
        }
    </script>

</body>
</html>