@php
    $months = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    $selectedMonthName = $months[$selectedMonth] ?? $months[now()->month];
    $selectedWeek = $selectedWeek ?? 1;

    $currentAbsensi = $absensis->sortByDesc('tanggal')->first();

    $currentStatus = $currentAbsensi->status ?? 'Hadir';
    $currentDate = $currentAbsensi?->tanggal;

    $packageLabel = 'Belum ada paket';

    if ($purchase?->package) {
        $packageLabel = match (strtolower((string) $purchase->package)) {
            'privat-tk' => 'Privat TK',
            'privat-sd' => 'Privat SD',
            'privat-smp' => 'Privat SMP',
            'privat-sma' => 'Privat SMA/K',
            'kelompok-tk' => 'Kelompok TK',
            'kelompok-sd' => 'Kelompok SD',
            'kelompok-smp' => 'Kelompok SMP',
            'kelompok-sma' => 'Kelompok SMA/K',
            default => ucwords(str_replace('-', ' ', (string) $purchase->package)),
        };
    }

    $purchasePackage = strtolower(trim((string) ($purchase?->package ?? '')));

    if (str_contains($purchasePackage, 'tk')) {
        $dotClass = 'dot green';
    } elseif (str_contains($purchasePackage, 'sd')) {
        $dotClass = 'dot red';
    } elseif (str_contains($purchasePackage, 'smp')) {
        $dotClass = 'dot blue-dark';
    } else {
        $dotClass = 'dot';
    }

    $statusIcons = [
        'Hadir' => '★',
        'Sakit' => '▲',
        'Izin' => '●',
        'Alpa' => '■',
    ];
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Absensi</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            box-sizing:border-box;
            margin:0;
            padding:0;
            font-family:'Poppins',sans-serif;
        }

        body{
            min-height:100vh;
            background:linear-gradient(180deg,#8cb8f0 0%,#bcdcff 45%,#e8f2fe 100%);
            display:flex;
            justify-content:center;
            align-items:center;
            padding:20px 0;
        }

        .container{
            width:85%;
            max-width:760px;
            background:#fff;
            border-radius:22px;
            padding:18px 26px 20px;
            box-shadow:0 4px 12px rgba(0,0,0,.12);
        }

        .title{
            text-align:center;
            color:#35569e;
            font-size:22px;
            font-weight:700;
            padding-bottom:9px;
            border-bottom:2px solid #bfdeff;
            margin-bottom:16px;
        }

        .content{
            display:flex;
            gap:18px;
            align-items:flex-start;
        }

        /* ================= USER ================= */

        .left-area{
            width:35%;
            display:flex;
            flex-direction:column;
            gap:8px;
        }

        .search-wrap{
            position:relative;
            width:100%;
            height:55px;
        }

        .search-input{
            width:100%;
            height:45px;
            border:0;
            outline:none;
            background:#bfdeff;
            color:#fff;
            border-radius:999px;
            padding:0 48px 0 18px;
            font-size:14px;
            font-weight:600;
        }

        .search-input::placeholder{
            color:#fff;
            opacity:1;
        }

        .search-icon{
            position:absolute;
            right:17px;
            top:46%;
            transform:translateY(-50%);
            color:#fff;
            font-size:20px;
            line-height:1;
            pointer-events:none;
        }

        .list{
            width:100%;
            border-radius:16px;
            overflow:hidden;
            background:#bfdeff;
            box-shadow:0 3px 6px rgba(0,0,0,.12);
            display:flex;
            flex-direction:column;
            max-height:360px;
            overflow-y:auto;
        }

        .user-input{
            display:none;
        }

        .user{
            height:55px;
            min-height:55px;
            flex-shrink:0;
            display:flex;
            align-items:center;
            gap:13px;
            padding:0 18px;
            color:#fff;
            font-size:14px;
            font-weight:600;
            cursor:pointer;
            border-bottom:1px solid rgba(255,255,255,.35);
        }

        .user:last-of-type{
            border-bottom:0;
        }

        .user-input:checked + .user{
            background:#fff;
            color:#bfdeff;
        }

        .no-user{
            display:none;
            color:#fff;
            font-size:11px;
            font-weight:600;
            text-align:center;
            padding:18px 10px;
        }

        /* TITIK USER */

        .dot{
            width:18px;
            height:18px;
            min-width:18px;
            min-height:18px;
            border-radius:50%;
            flex-shrink:0;
            background:#78b0ed;
        }

        .blue-dark{
            background:#050f71;
        }

        .red{
            background:#a90000;
        }

        .green{
            background:#24732f;
        }

        /* ================= KANAN ================= */

        .right{
            width:65%;
            display:flex;
            flex-direction:column;
            gap:10px;
        }

        /* ================= INFORMASI ================= */

        .right .box:first-child{
            background:#bfdeff;
            border-radius:16px;
            padding:12px 18px 13px;
            box-shadow:0 3px 6px rgba(0,0,0,.12);
            min-height:126px;
        }

        .right .box:first-child .box-title{
            color:#fff;
            font-size:14px;
            font-weight:600;
            border-bottom:2px solid rgba(255,255,255,.85);
            padding-bottom:6px;
            margin-bottom:6px;
            position:relative;
        }

        .user-info{
            position:relative;
        }

        .user-detail{
            color:#fff;
            font-size:12px;
            font-weight:500;
            line-height:1.75;
        }

        .user-detail .row{
            display:flex;
            align-items:flex-start;
        }

        .user-detail .label{
            width:58px;
            flex-shrink:0;
        }

        .user-detail .colon{
            width:20px;
            text-align:center;
            flex-shrink:0;
        }

        /* ================= BULAN ================= */

        .month{
            position:absolute;
            top:-39px;
            right:0;
            height:27px;
            min-width:86px;
            padding:0 5px 0 8px;
            display:flex;
            align-items:center;
            justify-content:flex-end;
            gap:3px;
            background:#fff;
            color:#78b0ed;
            border-radius:30px;
            font-size:10px;
            font-weight:600;
            cursor:pointer;
            border:0;
            z-index:30;
        }

        .month-arrow{
            width:17px;
            height:17px;
            min-width:17px;
            border-radius:50%;
            background:#78b0ed;
            position:relative;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .month-arrow::after{
            content:"";
            width:5px;
            height:5px;
            border-top:2px solid #fff;
            border-right:2px solid #fff;
            transform:rotate(45deg);
            margin-left:-2px;
        }

        #month-select{
            display:none;
        }

        .month-popup{
            position:absolute;
            top:31px;
            right:0;
            width:calc(100% - 18px);
            min-height:194px;
            padding:12px 18px 15px;
            background:#fff;
            border-radius:22px;
            box-shadow:0 5px 10px rgba(0,0,0,.20);
            display:none;
            z-index:25;
        }

        .month-toggle,
        .month-radio{
            display:none;
        }

        .month-toggle:checked ~ .month-popup{
            display:block;
        }

        .month-name{
            display:none;
        }

        .month-name-default{
            display:inline;
        }

        .month-year{
            text-align:center;
            color:#bfdeff;
            font-size:22px;
            font-weight:700;
            margin-bottom:9px;
        }

        .month-grid{
            display:grid;
            grid-template-columns:repeat(4,minmax(0,1fr));
            gap:9px 12px;
        }

        .month-option{
            height:34px;
            border:0;
            border-radius:20px;
            background:#bfdeff;
            color:#fff;
            font-family:'Poppins',sans-serif;
            font-size:12px;
            font-weight:600;
            text-align:center;
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
        }

        .month-option:hover,
        .month-option.selected{
            background:#78b0ed;
        }

        /* ================= MINGGU ================= */

        .week-list{
            display:flex;
            align-items:center;
            gap:7px;
            margin-top:4px;
        }

        .week-input{
            display:none;
        }

        .week{
            height:24px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#fff;
            color:#78b0ed;
            border-radius:20px;
            padding:0 9px;
            font-size:10px;
            font-weight:600;
            cursor:pointer;
            white-space:nowrap;
        }

        .week-input:checked + .week{
            background:#78b0ed;
            color:#fff;
        }

        /* ================= STATUS ================= */

        .right .box:nth-child(2){
            background:#bfdeff;
            border-radius:16px;
            padding:12px 18px 13px;
            box-shadow:0 3px 6px rgba(0,0,0,.12);
        }

        .right .box:nth-child(2) .box-title{
            color:#fff;
            font-size:14px;
            font-weight:600;
            border-bottom:2px solid rgba(255,255,255,.85);
            padding-bottom:6px;
            margin-bottom:9px;
        }

        .status-input{
            display:none;
        }

        .status-list{
            display:flex;
            gap:8px;
            width:100%;
        }

        .status{
            width:calc((100% - 24px) / 4);
            height:56px;
            min-width:0;
            background:#fff;
            border-radius:11px;
            border:2px solid transparent;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            cursor:pointer;
        }

        .status-input:checked + .status{
            border-color:#78b0ed;
        }

        .status-icon{
            width:28px;
            height:28px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:24px;
            line-height:28px;
            background:linear-gradient(
                180deg,
                #78b0ed 0%,
                #050f71 100%
            );
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
            background-clip:text;
        }

        .status-icon.star{
            font-size:24px;
        }

        .status-icon.triangle{
            font-size:21px;
        }

        .status-icon.circle{
            font-size:27px;
        }

        .status-icon.square{
            font-size:24px;
        }

        .status-text{
            color:#78b0ed;
            font-size:11px;
            font-weight:600;
            line-height:14px;
            margin-top:1px;
        }

        /* ================= BUTTON ================= */

        .buttons{
            display:flex;
            justify-content:flex-end;
            gap:10px;
            margin-top:1px;
        }

        button{
            border:0;
            border-radius:30px;
            padding:8px 22px;
            color:#fff;
            font-size:12px;
            font-weight:600;
            cursor:pointer;
        }

        .cancel{
            background:#a90000;
        }

        .save{
            background:linear-gradient(90deg,#050f71,#78b0ed);
        }

        .message{
            margin-bottom:10px;
            padding:8px 14px;
            border-radius:12px;
            background:#dff3e3;
            color:#24732f;
            font-size:11px;
            font-weight:600;
        }

        .errors{
            margin-bottom:10px;
            padding:8px 14px;
            border-radius:12px;
            background:#fde4e4;
            color:#a90000;
            font-size:11px;
            font-weight:600;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:650px){
            body{
                padding:14px 0;
            }

            .container{
                width:94%;
                padding:15px;
            }

            .content{
                gap:10px;
            }

            .left-area{
                width:38%;
            }

            .right{
                width:62%;
            }

            .search-wrap{
                height:55px;
            }

            .search-input{
                height:45px;
                font-size:11px;
                padding-left:11px;
                padding-right:32px;
            }

            .search-icon{
                right:10px;
                top:46%;
                font-size:18px;
            }

            .user{
                height:55px;
                min-height:55px;
                padding:0 10px;
                font-size:11px;
            }

            .dot{
                width:15px;
                height:15px;
                min-width:15px;
                min-height:15px;
            }

            .right .box:first-child{
                padding:11px 13px 13px;
            }

            .right .box:first-child .box-title{
                font-size:14px;
            }

            .user-detail{
                font-size:11px;
            }

            .week-list{
                gap:4px;
            }

            .week{
                font-size:8px;
                padding:0 6px;
            }

            .status-list{
                gap:5px;
            }

            .status{
                width:calc((100% - 15px) / 4);
                height:52px;
            }

            .status-icon{
                width:25px;
                height:25px;
                font-size:22px;
                line-height:25px;
            }

            .status-icon.star{
                font-size:22px;
            }

            .status-icon.triangle{
                font-size:19px;
            }

            .status-icon.circle{
                font-size:25px;
            }

            .status-icon.square{
                font-size:22px;
            }

            .status-text{
                font-size:9px;
            }

            button{
                padding:7px 18px;
            }

            .month-popup{
                width:calc(100% - 8px);
                padding:10px 12px 13px;
            }

            .month-grid{
                gap:7px 8px;
            }

            .month-option{
                height:31px;
                font-size:9px;
            }

            .month-year{
                font-size:18px;
                margin-bottom:7px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="title">
        • Absensi •
    </div>

    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="errors">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="content">

        <!-- ================= DAFTAR USER ================= -->

        <div class="left-area">

            <div class="search-wrap">
                <input
                    type="text"
                    id="userSearch"
                    class="search-input"
                    placeholder="Cari User..."
                    autocomplete="off"
                >
                <span class="search-icon">⌕</span>
            </div>

            <div class="list" id="userList">

                @forelse($users as $user)

                    <input
                        type="radio"
                        name="user"
                        id="u{{ $user->id }}"
                        class="user-input"
                        {{ $selectedUser && $selectedUser->id === $user->id ? 'checked' : '' }}
                    >

                    <label
                        for="u{{ $user->id }}"
                        class="user"
                        data-name="{{ strtolower($user->name) }}"
                        data-user-id="{{ $user->id }}"
                    >
                        @php
                            $userPurchase = \App\Models\Purchase::query()
                                ->where('user_id', $user->id)
                                ->whereIn('status', ['success', 'pending'])
                                ->latest('id')
                                ->first();

                            $userPackage = strtolower(trim((string) ($userPurchase?->package ?? '')));

                            if (str_contains($userPackage, 'tk')) {
                                $userDot = 'dot green';
                            } elseif (str_contains($userPackage, 'sd')) {
                                $userDot = 'dot red';
                            } elseif (str_contains($userPackage, 'smp')) {
                                $userDot = 'dot blue-dark';
                            } else {
                                $userDot = 'dot';
                            }
                        @endphp

                        <span class="{{ $userDot }}"></span>
                        {{ $user->name }}
                    </label>

                @empty

                    <div style="padding:18px;color:#fff;text-align:center;font-size:11px;">
                        Belum ada user.
                    </div>

                @endforelse

                <div class="no-user" id="noUser">
                    User tidak ditemukan
                </div>

            </div>

        </div>

        <!-- ================= BAGIAN KANAN ================= -->

        <div class="right">

            <!-- ================= INFORMASI USER ================= -->

            <div class="box">

                <div class="box-title">
                    Informasi User
                </div>

                <div class="user-info">

                    <input
                        type="checkbox"
                        id="monthToggle"
                        class="month-toggle"
                    >

                    <label for="monthToggle" class="month">

                        <span id="selectedMonthName">
                            {{ $selectedMonthName }}
                        </span>

                        <span class="month-arrow"></span>

                    </label>

                    <!-- ================= POPUP BULAN ================= -->

                    <div class="month-popup">

                        <div class="month-year">
                            {{ now()->year }}
                        </div>

                        <div class="month-grid">

                            @foreach($months as $number => $monthName)
                                <button
                                    type="button"
                                    class="month-option {{ $selectedMonth == $number ? 'selected' : '' }}"
                                    data-month="{{ $number }}"
                                >
                                    {{ $monthName }}
                                </button>
                            @endforeach

                        </div>

                    </div>

                    <!-- ================= DATA USER ================= -->

                    <div class="user-detail">

                        <div class="row">
                            <span class="label">Nama</span>
                            <span class="colon">:</span>
                            <span>
                                {{ $selectedUser?->name ?? '-' }}
                            </span>
                        </div>

                        <div class="row">
                            <span class="label">Paket</span>
                            <span class="colon">:</span>
                            <span>
                                {{ $packageLabel }}
                            </span>
                        </div>

                        <div class="row">
                            <span class="label">Hari</span>
                            <span class="colon">:</span>
                            <span>
                                @if($currentDate)
                                    {{ $currentDate->translatedFormat('l, d F Y') }}
                                @else
                                    Belum ada data absensi
                                @endif
                            </span>
                        </div>

                    </div>

                    <!-- ================= MINGGU ================= -->

                    <div class="week-list">

                        @for($week = 1; $week <= 4; $week++)

                            <input
                                type="radio"
                                name="week"
                                id="w{{ $week }}"
                                class="week-input"
                                {{ $selectedWeek == $week ? 'checked' : '' }}
                            >

                            <label
                                for="w{{ $week }}"
                                class="week"
                                data-week="{{ $week }}"
                            >
                                Minggu {{ ['I','II','III','IV'][$week - 1] }}
                            </label>

                        @endfor

                    </div>

                </div>

            </div>

            <!-- ================= STATUS KEHADIRAN ================= -->

            <div class="box">

                <div class="box-title">
                    Status Kehadiran
                </div>

                <form
                    id="attendanceForm"
                    method="POST"
                    action="{{ route('admin.attendance.store') }}"
                >
                    @csrf

                    <input
                        type="hidden"
                        name="user_id"
                        id="formUserId"
                        value="{{ $selectedUser?->id ?? '' }}"
                    >

                    <input
                        type="hidden"
                        name="minggu_ke"
                        id="formWeek"
                        value="{{ $selectedWeek }}"
                    >

                    <input
                        type="hidden"
                        name="tanggal"
                        id="formTanggal"
                        value="{{ $currentDate?->format('Y-m-d') ?? now()->format('Y-m-d') }}"
                    >

                    <div class="status-list">

                        @foreach(['Hadir','Sakit','Izin','Alpa'] as $status)
                            @php
                                $statusId = strtolower($status);
                            @endphp

                            <input
                                type="radio"
                                name="status"
                                id="{{ $statusId }}"
                                value="{{ $status }}"
                                class="status-input"
                                {{ $currentStatus === $status ? 'checked' : '' }}
                            >

                            <label
                                for="{{ $statusId }}"
                                class="status"
                            >
                                <span class="status-icon
                                    @if($status === 'Hadir') star
                                    @elseif($status === 'Sakit') triangle
                                    @elseif($status === 'Izin') circle
                                    @else square
                                    @endif
                                ">
                                    {{ $statusIcons[$status] }}
                                </span>

                                <span class="status-text">
                                    {{ $status }}
                                </span>
                            </label>
                        @endforeach

                    </div>

                </form>

            </div>

            <!-- ================= BUTTON ================= -->

            <div class="buttons">

                <button
                    type="button"
                    class="cancel"
                    onclick="window.location.reload()"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    form="attendanceForm"
                    class="save"
                >
                    Simpan
                </button>

            </div>

        </div>

    </div>

</div>

<script>
    function changeQuery(params = {}) {
        const url = new URL(window.location.href);

        Object.keys(params).forEach(function(key){
            if (
                params[key] === null ||
                params[key] === undefined ||
                params[key] === ''
            ) {
                url.searchParams.delete(key);
            } else {
                url.searchParams.set(key, params[key]);
            }
        });

        window.location.href = url.toString();
    }

    document.querySelectorAll('.user').forEach(function(label){
        label.addEventListener('click', function(){
            const userId = this.dataset.userId;

            setTimeout(function(){
                changeQuery({
                    user_id: userId
                });
            }, 0);
        });
    });

    document.querySelectorAll('.month-option').forEach(function(button){
        button.addEventListener('click', function(){
            const month = this.dataset.month;

            changeQuery({
                month: month
            });
        });
    });

    document.querySelectorAll('.week').forEach(function(label){
        label.addEventListener('click', function(){
            const week = this.dataset.week;

            setTimeout(function(){
                changeQuery({
                    week: week
                });
            }, 0);
        });
    });

    const searchInput = document.getElementById('userSearch');
    const userList = document.getElementById('userList');
    const noUser = document.getElementById('noUser');

    if(searchInput){
        searchInput.addEventListener('input', function(){
            const keyword = this.value.trim().toLowerCase();
            const labels = userList.querySelectorAll('.user');
            let visibleCount = 0;

            labels.forEach(function(label){
                const name = label.dataset.name || '';

                if(name.includes(keyword)){
                    label.style.display = 'flex';
                    visibleCount++;
                }else{
                    label.style.display = 'none';
                }
            });

            if(noUser){
                noUser.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        });
    }
</script>

</body>
</html>
