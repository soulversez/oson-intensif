<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Kelola Jadwal</title>

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
    background:linear-gradient(
        180deg,
        #8cb8f0 0%,
        #bcdcff 45%,
        #e8f2fe 100%
    );
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
    position:relative;
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
    align-items:stretch;
}

.list{
    width:35%;
    border-radius:16px;
    overflow:hidden;
    background:#bfdeff;
    box-shadow:0 3px 6px rgba(0,0,0,.12);
    display:flex;
    flex-direction:column;
    max-height:365px;
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

.user-input:checked + .user{
    background:#fff;
    color:#bfdeff;
}

.dot{
    width:18px !important;
    height:18px !important;
    min-width:18px !important;
    min-height:18px !important;
    flex:0 0 18px !important;
    display:block !important;
    border-radius:50% !important;
    flex-shrink:0 !important;
    background:#78b0ed !important;
}

.blue-dark{
    background:#050f71 !important;
}

.red{
    background:#a90000 !important;
}

.green{
    background:#24732f !important;
}

.right{
    width:65%;
    display:flex;
    flex-direction:column;
    gap:10px;
}

.schedule-box{
    background:#bfdeff;
    border-radius:16px;
    padding:12px 14px 52px;
    box-shadow:0 3px 6px rgba(0,0,0,.12);
    min-height:272px;
    position:relative;
}

.schedule-title{
    height:38px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    color:#fff;
    font-size:14px;
    font-weight:600;
    background:linear-gradient(
        90deg,
        #050f71 0%,
        #416bc0 100%
    );
    border-radius:12px 12px 0 0;
    padding:0 10px;
    margin:-12px -14px 5px;
}

.month-form{
    margin:0;
    padding:0;
}

.schedule-month{
    height:27px;
    padding:0 6px 0 10px;
    background:#fff;
    color:#78b0ed;
    border-radius:30px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:4px;
    font-size:10px;
    font-weight:600;
    border:0;
    cursor:pointer;
    font-family:'Poppins',sans-serif;
    outline:none;
}

.schedule-month option{
    color:#35569e;
    background:#fff;
}

.schedule-table{
    width:100%;
    border-collapse:collapse;
    table-layout:fixed;
}

.schedule-table th{
    height:31px;
    text-align:left;
    color:#050f71;
    font-size:10px;
    font-weight:700;
    background:#a9d1fa;
    padding:0 7px;
}

.schedule-table th:first-child{
    border-radius:8px 0 0 0;
}

.schedule-table th:last-child{
    border-radius:0 8px 0 0;
}

.schedule-table td{
    height:36px;
    color:#050f71;
    font-size:9px;
    font-weight:500;
    padding:0 7px;
    border-bottom:1px solid rgba(255,255,255,.55);
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}

.schedule-table tr:last-child td{
    border-bottom:0;
}

.col-date{
    width:39%;
}

.col-study{
    width:27%;
}

.col-time{
    width:34%;
}

.action-wrap{
    display:flex;
    align-items:center;
    justify-content:flex-end;
    gap:5px;
}

.action{
    width:19px;
    height:19px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:9px;
    font-weight:700;
    text-decoration:none;
    cursor:pointer;
    border:0;
}

.edit{
    background:#fff;
    color:#78b0ed;
}

.delete{
    background:#fff;
    color:#a90000;
}

.add-area{
    position:absolute;
    left:14px;
    right:14px;
    bottom:12px;
    display:flex;
    justify-content:flex-end;
}

.add-button{
    height:31px;
    padding:0 13px 0 6px;
    border:0;
    border-radius:30px;
    background:linear-gradient(
        90deg,
        #050f71,
        #78b0ed
    );
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:6px;
    font-size:10px;
    font-weight:600;
    cursor:pointer;
}

.add-icon{
    width:19px;
    height:19px;
    border-radius:50%;
    background:#fff;
    color:#050f71;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:15px;
    font-weight:700;
    line-height:1;
}

.modal-toggle{
    display:none;
}

.modal{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.08);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:100;
}

.modal-toggle:checked ~ .modal{
    display:flex;
}

.modal-card{
    width:420px;
    max-width:90%;
    background:#fff;
    border-radius:18px;
    padding:15px 18px 17px;
    box-shadow:0 6px 18px rgba(0,0,0,.20);
}

.modal-header{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding-bottom:9px;
    border-bottom:2px solid #bfdeff;
    margin-bottom:10px;
}

.modal-title{
    color:#35569e;
    font-size:16px;
    font-weight:700;
}

.form-group{
    margin-bottom:8px;
}

.form-label{
    display:block;
    color:#35569e;
    font-size:10px;
    font-weight:600;
    margin-bottom:4px;
}

.form-input,
.form-select{
    width:100%;
    height:34px;
    border:0;
    outline:none;
    border-radius:18px;
    background:#bfdeff;
    color:#fff;
    padding:0 13px;
    font-family:'Poppins',sans-serif;
    font-size:10px;
    font-weight:500;
}

.form-input::placeholder{
    color:#fff;
}

.form-select{
    cursor:pointer;
}

.form-select option{
    color:#35569e;
    background:#fff;
}

.form-row{
    display:flex;
    gap:9px;
}

.form-row .form-group{
    width:50%;
}

.time-row{
    display:flex;
    align-items:center;
    gap:7px;
}

.time-row .form-input{
    width:100%;
}

.time-separator{
    color:#35569e;
    font-size:11px;
    font-weight:700;
}

.modal-buttons{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:9px;
    margin-top:14px;
    width:100%;
}

.modal-button{
    height:32px;
    border:0;
    border-radius:30px;
    padding:0 20px;
    color:#fff;
    font-family:'Poppins',sans-serif;
    font-size:10px;
    font-weight:600;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
}

.modal-cancel{
    background:#a90000;
}

.modal-save{
    background:linear-gradient(
        90deg,
        #050f71,
        #78b0ed
    );
}

.message{
    width:100%;
    margin-bottom:10px;
    padding:8px 12px;
    border-radius:12px;
    font-size:10px;
    font-weight:600;
    text-align:center;
}

.message-success{
    background:#dff5e3;
    color:#24732f;
}

.message-error{
    background:#ffe1e1;
    color:#a90000;
}

.empty-row{
    text-align:center !important;
    color:#fff !important;
    font-size:10px !important;
    height:70px !important;
}

@media(max-width:650px){

    .container{
        width:94%;
        padding:15px;
    }

    .content{
        gap:10px;
    }

    .user{
        padding:0 10px;
        font-size:11px;
    }

    .dot{
        width:15px;
        height:15px;
        min-width:15px;
        min-height:15px;
    }

    .schedule-box{
        padding:10px;
    }

    .schedule-title{
        font-size:12px;
    }

    .schedule-table th{
        font-size:8px;
        padding:0 5px;
    }

    .schedule-table td{
        font-size:7px;
        padding:0 5px;
    }

    .add-button{
        font-size:9px;
    }

    .modal-card{
        width:90%;
    }
}


/* =========================================================
   FINAL REVISION JADWAL — TINGGI DIKUNCI, DATA BANYAK SCROLL
   ========================================================= */

.schedule-box{
    height:272px;
    min-height:272px;
    max-height:272px;
    display:flex;
    flex-direction:column;
    overflow:hidden;
}

.schedule-table{
    width:100%;
    border-collapse:collapse;
    table-layout:fixed;
}

.schedule-table thead{
    flex:0 0 auto;
}

.schedule-table tbody{
    display:block;
    max-height:165px;
    overflow-y:auto;
    overflow-x:hidden;
}

.schedule-table thead,
.schedule-table tbody tr{
    display:table;
    width:100%;
    table-layout:fixed;
}

.add-area{
    margin-top:auto;
    padding-top:8px;
    flex:0 0 auto;
}

/* Scrollbar hanya muncul saat jumlah jadwal banyak */
.schedule-table tbody::-webkit-scrollbar{
    width:5px;
}

.schedule-table tbody::-webkit-scrollbar-track{
    background:transparent;
}

.schedule-table tbody::-webkit-scrollbar-thumb{
    background:#78b0ed;
    border-radius:10px;
}

@media(max-width:650px){
    .schedule-box{
        height:272px;
        min-height:272px;
        max-height:272px;
    }

    .schedule-table tbody{
        max-height:165px;
    }
}

</style>
</head>

<body>

<input
    type="checkbox"
    id="addSchedule"
    class="modal-toggle"
>

@foreach($jadwals as $jadwal)

<input
    type="checkbox"
    id="editSchedule{{ $jadwal->id }}"
    class="modal-toggle"
>

@endforeach

<div class="container">

    <div class="title">
        • Kelola Jadwal •
    </div>

    @if(session('success'))

        <div class="message message-success">
            {{ session('success') }}
        </div>

    @endif

    @if($errors->any())

        <div class="message message-error">

            @foreach($errors->all() as $error)

                <div>{{ $error }}</div>

            @endforeach

        </div>

    @endif

    <div class="content">

        <!-- DAFTAR USER -->

        <div class="list">

            @forelse($users as $index => $user)

                <input
                    type="radio"
                    name="user"
                    id="u{{ $user->id }}"
                    class="user-input"
                    onchange="window.location.href='{{ route('admin.schedule', ['user_id' => $user->id, 'month' => request('month', now()->month)]) }}'"
                    @checked($selectedUser && $selectedUser->id == $user->id)
                >

                <label
                    for="u{{ $user->id }}"
                    class="user"
                >

                    @php
                        /* Warna bulat mengikuti jenjang paket yang dibeli user. */
                        $purchasePackage = strtolower(trim(
                            (string) (\App\Models\Purchase::query()
                                ->where('user_id', $user->id)
                                ->whereIn('status', ['success', 'pending'])
                                ->latest('id')
                                ->value('package') ?? '')
                        ));

                        if (str_contains($purchasePackage, 'tk')) {
                            $dotClass = 'dot green';
                        } elseif (str_contains($purchasePackage, 'sd')) {
                            $dotClass = 'dot red';
                        } elseif (str_contains($purchasePackage, 'smp')) {
                            $dotClass = 'dot blue-dark';
                        } elseif (str_contains($purchasePackage, 'sma')) {
                            $dotClass = 'dot';
                        } else {
                            $dotClass = 'dot';
                        }
                    @endphp

                    <span class="{{ $dotClass }}"></span>

                    {{ $user->name }}

                </label>

            @empty

                <div class="user">
                    Tidak ada user.
                </div>

            @endforelse

        </div>


        <!-- PANEL JADWAL -->

        <div class="right">

            <div class="schedule-box">

                <div class="schedule-title">

                    <span>
                        Jadwal
                        {{ $selectedUser ? $selectedUser->name : '' }}
                    </span>

                    <form
                        method="GET"
                        action="{{ route('admin.schedule') }}"
                        class="month-form"
                    >

                        @if($selectedUser)

                            <input
                                type="hidden"
                                name="user_id"
                                value="{{ $selectedUser->id }}"
                            >

                        @endif

                        <select
                            name="month"
                            class="schedule-month"
                            onchange="this.form.submit()"
                        >

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

                                $selectedMonth = (int) request(
                                    'month',
                                    now()->month
                                );

                            @endphp

                            @foreach($months as $monthNumber => $monthName)

                                <option
                                    value="{{ $monthNumber }}"
                                    @selected($selectedMonth === $monthNumber)
                                >
                                    {{ $monthName }}
                                </option>

                            @endforeach

                        </select>

                    </form>

                </div>


                <table class="schedule-table">

                    <thead>

                        <tr>

                            <th class="col-date">
                                Tanggal
                            </th>

                            <th class="col-study">
                                Belajar
                            </th>

                            <th class="col-time">
                                Waktu
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($jadwals as $jadwal)

                            <tr>

                                <td>

                                    {{ \Carbon\Carbon::parse($jadwal->tanggal)->locale('id')->translatedFormat('D, d M Y') }}

                                </td>

                                <td>

                                    {{ $jadwal->belajar }}

                                </td>

                                <td>

                                    <div class="action-wrap">

                                        <span>
                                            {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H.i') }}
                                            –
                                            {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H.i') }}
                                        </span>

                                        <label
                                            for="editSchedule{{ $jadwal->id }}"
                                            class="action edit"
                                            title="Edit"
                                        >
                                            ✎
                                        </label>

                                        <form
                                            method="POST"
                                            action="{{ route('admin.schedule.destroy', $jadwal->id) }}"
                                            onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')"
                                            style="margin:0;"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action delete"
                                                title="Hapus"
                                            >
                                                ×
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="3"
                                    class="empty-row"
                                >
                                    Belum ada jadwal pada bulan ini.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>


                <div class="add-area">

                    <label
                        for="addSchedule"
                        class="add-button"
                    >

                        <span class="add-icon">
                            +
                        </span>

                        Tambah Jadwal

                    </label>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     POPUP TAMBAH
========================================================= -->

<div class="modal">

    <div class="modal-card">

        <div class="modal-header">

            <div class="modal-title">
                Tambah Jadwal
            </div>

        </div>

        <form
            method="POST"
            action="{{ route('admin.schedule.store') }}"
        >

            @csrf

            <div class="form-group">

                <label class="form-label">
                    User
                </label>

                @if($selectedUser)

                    <input
                        type="hidden"
                        name="user_id"
                        value="{{ $selectedUser->id }}"
                    >

                    <div
                        class="form-input"
                        style="display:flex;align-items:center;"
                    >
                        {{ $selectedUser->name }}
                    </div>

                @else

                    <div
                        class="form-input"
                        style="display:flex;align-items:center;"
                    >
                        Pilih user terlebih dahulu
                    </div>

                @endif

            </div>

            <div class="form-group">

                <label class="form-label">
                    Hari & Tanggal
                </label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-input"
                    required
                >

            </div>

            <div class="form-group">

                <label class="form-label">
                    Belajar
                </label>

                <select
                    name="belajar"
                    class="form-select"
                    required
                >

                    <option value="">
                        Pilih Mata Pelajaran
                    </option>

                    <option value="Calistung">
                        Calistung
                    </option>

                    <option value="Matematika">
                        Matematika
                    </option>

                    <option value="Bahasa Indonesia">
                        Bahasa Indonesia
                    </option>

                    <option value="IPAS">
                        IPAS
                    </option>

                    <option value="Bahasa Inggris">
                        Bahasa Inggris
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label class="form-label">
                    Jam
                </label>

                <div class="time-row">

                    <input
                        type="time"
                        name="jam_mulai"
                        class="form-input"
                        required
                    >

                    <span class="time-separator">
                        –
                    </span>

                    <input
                        type="time"
                        name="jam_selesai"
                        class="form-input"
                        required
                    >

                </div>

            </div>

            <div class="modal-buttons">

                <label
                    for="addSchedule"
                    class="modal-button modal-cancel"
                >
                    Batal
                </label>

                <button
                    type="submit"
                    class="modal-button modal-save"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>


<!-- =========================================================
     POPUP EDIT
========================================================= -->

@foreach($jadwals as $jadwal)

<div class="modal">

    <div class="modal-card">

        <div class="modal-header">

            <div class="modal-title">
                Edit Jadwal
            </div>

        </div>

        <form
            method="POST"
            action="{{ route('admin.schedule.update', $jadwal->id) }}"
        >

            @csrf

            @method('PUT')

            <div class="form-group">

                <label class="form-label">
                    User
                </label>

                <select
                    name="user_id"
                    class="form-select"
                    required
                >

                    @foreach($users as $user)

                        <option
                            value="{{ $user->id }}"
                            @selected($user->id == $jadwal->user_id)
                        >
                            {{ $user->name }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label class="form-label">
                    Hari & Tanggal
                </label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-input"
                    value="{{ $jadwal->tanggal }}"
                    required
                >

            </div>

            <div class="form-group">

                <label class="form-label">
                    Belajar
                </label>

                <select
                    name="belajar"
                    class="form-select"
                    required
                >

                    <option value="Calistung"
                        @selected($jadwal->belajar === 'Calistung')>
                        Calistung
                    </option>

                    <option value="Matematika"
                        @selected($jadwal->belajar === 'Matematika')>
                        Matematika
                    </option>

                    <option value="IPAS"
                        @selected($jadwal->belajar === 'IPAS')>
                        IPAS
                    </option>

                    <option value="Bahasa Indonesia"
                        @selected($jadwal->belajar === 'Bahasa Indonesia')>
                        Bahasa Indonesia
                    </option>

                    <option value="Bahasa Inggris"
                        @selected($jadwal->belajar === 'Bahasa Inggris')>
                        Bahasa Inggris
                    </option>

                    @if(
                        !in_array(
                            $jadwal->belajar,
                            [
                                'Calistung',
                                'Matematika',
                                'Bahasa Indonesia',
                                'IPAS',
                                'Bahasa Inggris'
                            ]
                        )
                    )

                        <option value="{{ $jadwal->belajar }}" selected>
                            {{ $jadwal->belajar }}
                        </option>

                    @endif

                </select>

            </div>

            <div class="form-group">

                <label class="form-label">
                    Jam
                </label>

                <div class="time-row">

                    <input
                        type="time"
                        name="jam_mulai"
                        class="form-input"
                        value="{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}"
                        required
                    >

                    <span class="time-separator">
                        –
                    </span>

                    <input
                        type="time"
                        name="jam_selesai"
                        class="form-input"
                        value="{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}"
                        required
                    >

                </div>

            </div>

            <div class="modal-buttons">

                <label
                    for="editSchedule{{ $jadwal->id }}"
                    class="modal-button modal-cancel"
                >
                    Batal
                </label>

                <button
                    type="submit"
                    class="modal-button modal-save"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

@endforeach

</body>
</html>