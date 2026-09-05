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
}


/* ================= USER ================= */

.left-column{
    width:35%;
    display:flex;
    flex-direction:column;
    gap:18px;
    min-width:0;
}

.list{
    width:100%;
    border-radius:16px;
    overflow:hidden;
    background:#bfdeff;
    box-shadow:0 3px 6px rgba(0,0,0,.12);

    display:flex;
    flex-direction:column;
}

/* ================= SEARCH USER ================= */

.search-user{
    position:relative;
    width:100%;
    height:46px;
    flex-shrink:0;
}

.search-user input{
    width:100%;
    height:46px;
    border:0;
    outline:0;
    border-radius:30px;
    padding:0 54px 0 18px;
    background:#bfdeff;
    color:#fff;
    font-family:'Poppins',sans-serif;
    font-size:14px;
    font-weight:600;
    box-shadow:none;
}

.search-user input::placeholder{
    color:#fff;
    opacity:1;
}

.search-user::after{
    content:"";
    position:absolute;
    right:22px;
    top:50%;
    width:12px;
    height:12px;
    border:3px solid #fff;
    border-radius:50%;
    transform:translateY(-58%);
    pointer-events:none;
}

.search-user::before{
    content:"";
    position:absolute;
    right:15px;
    top:calc(50% + 4px);
    width:9px;
    height:3px;
    border-radius:4px;
    background:#fff;
    transform:rotate(45deg);
    transform-origin:left center;
    pointer-events:none;
    z-index:2;
}

.search-user input:focus{
    box-shadow:none;
}

.no-user{
    display:none;
    padding:14px 10px;
    text-align:center;
    color:#fff;
    font-size:10px;
    font-weight:500;
    background:#bfdeff;
    border-radius:16px;
}


/* ================= USER INPUT ================= */

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
    align-items:center;
}

.user-detail .label{
    width:58px;
}

.user-detail .colon{
    width:20px;
    text-align:center;
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


/* ==================================================
   TAMBAHAN SAJA
   POPUP PILIHAN BULAN
   ================================================== */

.month-popup{
    position:absolute;

    top:31px;
    right:0;

    width:calc(100% - 18px);
    min-height:194px;

    padding:12px 18px 15px;

    background:#fff;

    border-radius:22px;

    /* BAYANGAN BASE POPUP */
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

#monthJanuari:checked ~ .month .month-name-default,
#monthFebruari:checked ~ .month .month-name-default,
#monthMaret:checked ~ .month .month-name-default,
#monthApril:checked ~ .month .month-name-default,
#monthMei:checked ~ .month .month-name-default,
#monthJuni:checked ~ .month .month-name-default,
#monthJuli:checked ~ .month .month-name-default,
#monthAgustus:checked ~ .month .month-name-default,
#monthSeptember:checked ~ .month .month-name-default,
#monthOktober:checked ~ .month .month-name-default,
#monthNovember:checked ~ .month .month-name-default,
#monthDesember:checked ~ .month .month-name-default{
    display:none;
}

#monthJanuari:checked ~ .month .month-name-januari,
#monthFebruari:checked ~ .month .month-name-februari,
#monthMaret:checked ~ .month .month-name-maret,
#monthApril:checked ~ .month .month-name-april,
#monthMei:checked ~ .month .month-name-mei,
#monthJuni:checked ~ .month .month-name-juni,
#monthJuli:checked ~ .month .month-name-juli,
#monthAgustus:checked ~ .month .month-name-agustus,
#monthSeptember:checked ~ .month .month-name-september,
#monthOktober:checked ~ .month .month-name-oktober,
#monthNovember:checked ~ .month .month-name-november,
#monthDesember:checked ~ .month .month-name-desember{
    display:inline;
}

#monthJanuari:checked ~ .month-popup .month-option:nth-child(1),
#monthFebruari:checked ~ .month-popup .month-option:nth-child(2),
#monthMaret:checked ~ .month-popup .month-option:nth-child(3),
#monthApril:checked ~ .month-popup .month-option:nth-child(4),
#monthMei:checked ~ .month-popup .month-option:nth-child(5),
#monthJuni:checked ~ .month-popup .month-option:nth-child(6),
#monthJuli:checked ~ .month-popup .month-option:nth-child(7),
#monthAgustus:checked ~ .month-popup .month-option:nth-child(8),
#monthSeptember:checked ~ .month-popup .month-option:nth-child(9),
#monthOktober:checked ~ .month-popup .month-option:nth-child(10),
#monthNovember:checked ~ .month-popup .month-option:nth-child(11),
#monthDesember:checked ~ .month-popup .month-option:nth-child(12){
    background:#78b0ed;
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

.month-option:hover{
    background:#78b0ed;
}

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


/* STATUS INPUT */

.status-input{
    display:none;
}

.status-list{
    display:flex;
    gap:8px;
    width:100%;
}


/* EMPAT KOTAK SAMA BESAR */

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


/* STATUS TERPILIH */

.status-input:checked + .status{
    border-color:#78b0ed;
}


/* ================= ICON STATUS ================= */

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


/* TEKS STATUS */

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


/* ================= RESPONSIVE ================= */

@media(max-width:650px){

    .container{
        width:94%;
        padding:15px;
    }

    .content{
        gap:10px;
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

    .left-column{
        gap:10px;
    }

    .search-user,
    .search-user input{
        height:40px;
    }

    .search-user input{
        padding:0 46px 0 14px;
        font-size:10px;
    }

    .search-user::after{
        right:18px;
        width:10px;
        height:10px;
        border-width:2px;
    }

    .search-user::before{
        right:12px;
        top:calc(50% + 4px);
        width:8px;
        height:2px;
    }

    /* POPUP MOBILE */
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



/* ================= LARAVEL SEARCH USER ================= */
.user.selected{
    background:#fff;
    color:#bfdeff;
}
.user:hover{
    background:rgba(255,255,255,.18);
}
.user.selected:hover{
    background:#fff;
}
.user-item.is-hidden{
    display:none;
}
.user-item{
    display:block;
}
.user-link{
    text-decoration:none;
}

/* tombol sebagai link agar tetap mengikuti desain */
.buttons a,
.buttons button{
    text-decoration:none;
}

.alert-success{
    margin-bottom:10px;
    padding:8px 12px;
    border-radius:10px;
    background:#eaf7ed;
    color:#24732f;
    font-size:11px;
    font-weight:600;
    text-align:center;
}

.alert-error{
    margin-bottom:10px;
    padding:8px 12px;
    border-radius:10px;
    background:#ffeaea;
    color:#a90000;
    font-size:11px;
    font-weight:600;
    text-align:center;
}

.status-form{ margin:0; padding:0; }
.status-form .status-list{ margin:0; }
.status-form .buttons{ margin-top:1px; }

@media(max-width:650px){
    .search-user input{
        font-size:12px;
    }
}
</style>
</head>
<body>

@php
    $monthNames = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
    ];

    $selectedAttendance = $absensis->first();

    $displayDate = $selectedAttendance?->tanggal
        ? \Illuminate\Support\Carbon::parse($selectedAttendance->tanggal)->locale('id')->translatedFormat('l, d F Y')
        : 'Belum ada absensi';

    $currentStatus = $selectedAttendance?->status ?? 'Hadir';
    $formTanggal = $selectedAttendance?->tanggal?->format('Y-m-d')
        ?? ($selectedAttendance?->tanggal ?? now()->format('Y-m-d'));

    $packageName = 'Belum ada paket';
    $packageKey = '';

    if ($purchase) {
        $packageKey = strtolower(trim((string) $purchase->package));

        $packageMap = [
            'privat-tk' => 'Privat TK',
            'privat-sd' => 'Privat SD',
            'privat-smp' => 'Privat SMP',
            'privat-sma' => 'Privat SMA/K',
            'kelompok-tk' => 'Kelompok TK',
            'kelompok-sd' => 'Kelompok SD',
            'kelompok-smp' => 'Kelompok SMP',
            'kelompok-sma' => 'Kelompok SMA/K',
        ];

        $packageName = $packageMap[$packageKey] ?? ucwords(str_replace('-', ' ', $packageKey));
    }

    $dotClass = 'dot';
    if (str_contains($packageKey, 'tk')) {
        $dotClass = 'dot green';
    } elseif (str_contains($packageKey, 'sd')) {
        $dotClass = 'dot red';
    } elseif (str_contains($packageKey, 'smp')) {
        $dotClass = 'dot blue-dark';
    } elseif (str_contains($packageKey, 'sma')) {
        $dotClass = 'dot';
    }

    $currentUrlParams = [
        'user_id' => $selectedUser?->id,
        'month' => $selectedMonth,
        'week' => $selectedWeek,
    ];
@endphp

<div class="container">
    <div class="title">• Absensi •</div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-error">{{ $errors->first() }}</div>
    @endif

    <div class="content">

        <!-- ================= DAFTAR USER ================= -->
        <div class="left-column">

            <!-- ================= SEARCH USER ================= -->
            <div class="search-user">
                <input
                    type="search"
                    id="searchUser"
                    placeholder="Cari User..."
                    autocomplete="off">
            </div>

            <div class="list" id="userList">
                <div class="no-user" id="noUser">User tidak ditemukan</div>

                @forelse($users as $user)
                    @php
                        $userPurchasePackage = strtolower(trim((string) (\App\Models\Purchase::query()
                            ->where('user_id', $user->id)
                            ->whereIn('status', ['success', 'pending'])
                            ->latest('id')
                            ->value('package') ?? '')));

                        if (str_contains($userPurchasePackage, 'tk')) {
                            $userDotClass = 'dot green';
                        } elseif (str_contains($userPurchasePackage, 'sd')) {
                            $userDotClass = 'dot red';
                        } elseif (str_contains($userPurchasePackage, 'smp')) {
                            $userDotClass = 'dot blue-dark';
                        } else {
                            $userDotClass = 'dot';
                        }
                    @endphp

                    <div class="user-item" data-user-name="{{ strtolower($user->name) }}">
                        <a
                            href="{{ route('admin.attendance', ['user_id' => $user->id, 'month' => $selectedMonth, 'week' => $selectedWeek]) }}"
                            class="user user-link {{ $selectedUser && $selectedUser->id === $user->id ? 'selected' : '' }}">
                            <span class="{{ $userDotClass }}"></span>
                            {{ $user->name }}
                        </a>
                    </div>
                @empty
                    <div class="no-user" style="display:block;">Belum ada user.</div>
                @endforelse
            </div>
        </div>

        <!-- ================= BAGIAN KANAN ================= -->
        <div class="right">

            <!-- ================= INFORMASI USER ================= -->
            <div class="box">
                <div class="box-title">Informasi User</div>

                <div class="user-info">

                    <!-- ================= BULAN ================= -->
                    <input type="checkbox" id="monthToggle" class="month-toggle">

                    @foreach($monthNames as $number => $name)
                        <input
                            type="radio"
                            name="month"
                            id="month{{ $number }}"
                            class="month-radio"
                            {{ $selectedMonth === $number ? 'checked' : '' }}>
                    @endforeach

                    <label for="monthToggle" class="month">
                        <span class="month-name month-name-default">{{ $monthNames[$selectedMonth] }}</span>
                        @foreach($monthNames as $number => $name)
                            <span class="month-name month-name-{{ strtolower($name) }}">{{ $name }}</span>
                        @endforeach
                        <span class="month-arrow"></span>
                    </label>

                    <!-- ================= POPUP BULAN ================= -->
                    <div class="month-popup">
                        <div class="month-year">{{ now()->year }}</div>
                        <div class="month-grid">
                            @foreach($monthNames as $number => $name)
                                <label
                                    for="month{{ $number }}"
                                    class="month-option {{ $selectedMonth === $number ? 'selected' : '' }}"
                                    data-month="{{ $number }}">
                                    {{ $name }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- ================= DATA USER ================= -->
                    <div class="user-detail">
                        <div class="row">
                            <span class="label">Nama</span>
                            <span class="colon">:</span>
                            <span>{{ $selectedUser?->name ?? '-' }}</span>
                        </div>

                        <div class="row">
                            <span class="label">Paket</span>
                            <span class="colon">:</span>
                            <span>{{ $packageName }}</span>
                        </div>

                        <div class="row">
                            <span class="label">Hari</span>
                            <span class="colon">:</span>
                            <span>{{ $displayDate }}</span>
                        </div>
                    </div>

                    <!-- ================= MINGGU ================= -->
                    <div class="week-list">
                        @for($week = 1; $week <= 4; $week++)
                            <a
                                href="{{ route('admin.attendance', array_merge($currentUrlParams, ['week' => $week])) }}"
                                class="week"
                                style="text-decoration:none; {{ $selectedWeek === $week ? 'background:#78b0ed;color:#fff;' : '' }}">
                                Minggu {{ ['I','II','III','IV'][$week - 1] }}
                            </a>
                        @endfor
                    </div>

                </div>
            </div>

            <!-- ================= STATUS KEHADIRAN ================= -->
            <form
                method="POST"
                action="{{ route('admin.attendance.store') }}"
                class="status-form">
                @csrf

                <input type="hidden" name="user_id" value="{{ $selectedUser?->id }}">
                <input type="hidden" name="tanggal" value="{{ $formTanggal }}">
                <input type="hidden" name="minggu_ke" value="{{ $selectedWeek }}">

                <div class="box">
                    <div class="box-title">Status Kehadiran</div>

                    <div class="status-list">
                        <input type="radio" name="status" id="hadir" value="Hadir" class="status-input" {{ $currentStatus === 'Hadir' ? 'checked' : '' }}>
                        <label for="hadir" class="status">
                            <span class="status-icon star">★</span>
                            <span class="status-text">Hadir</span>
                        </label>

                        <input type="radio" name="status" id="sakit" value="Sakit" class="status-input" {{ $currentStatus === 'Sakit' ? 'checked' : '' }}>
                        <label for="sakit" class="status">
                            <span class="status-icon triangle">▲</span>
                            <span class="status-text">Sakit</span>
                        </label>

                        <input type="radio" name="status" id="izin" value="Izin" class="status-input" {{ $currentStatus === 'Izin' ? 'checked' : '' }}>
                        <label for="izin" class="status">
                            <span class="status-icon circle">●</span>
                            <span class="status-text">Izin</span>
                        </label>

                        <input type="radio" name="status" id="alpa" value="Alpa" class="status-input" {{ $currentStatus === 'Alpa' ? 'checked' : '' }}>
                        <label for="alpa" class="status">
                            <span class="status-icon square">■</span>
                            <span class="status-text">Alpa</span>
                        </label>
                    </div>
                </div>

                <!-- ================= BUTTON ================= -->
                <div class="buttons">
                    <a
                        href="{{ route('admin.attendance', $currentUrlParams) }}"
                        class="cancel">
                        Batal
                    </a>
                    <button type="submit" class="save">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
(function () {
    const searchInput = document.getElementById('searchUser');
    const userItems = Array.from(document.querySelectorAll('.user-item'));
    const noUser = document.getElementById('noUser');

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const keyword = this.value.trim().toLowerCase();
            let visibleCount = 0;

            userItems.forEach(function (item) {
                const name = item.dataset.userName || '';
                const match = name.includes(keyword);

                item.classList.toggle('is-hidden', !match);
                if (match) visibleCount++;
            });

            if (noUser) {
                noUser.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        });
    }

    document.querySelectorAll('.month-option[data-month]').forEach(function (option) {
        option.addEventListener('click', function () {
            const month = this.dataset.month;
            const params = new URLSearchParams(window.location.search);
            params.set('month', month);

            @if($selectedUser)
                params.set('user_id', '{{ $selectedUser->id }}');
            @endif

            params.set('week', '{{ $selectedWeek }}');
            window.location.href = '{{ route('admin.attendance') }}?' + params.toString();
        });
    });
})();
</script>

</body>
</html>
