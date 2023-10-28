<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contoh PDF dengan Dompdf</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
        }
        .logo {
            max-width: 100px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Logo_BAZNAS_RI-Hijau-01.png/220px-Logo_BAZNAS_RI-Hijau-01.png" alt="Logo">
        <h1>Laporan Data Kurban</h1>
    </div>

    <table>
      
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Paket Kurban</th>
            <th>Status</th>
            <th>Jumlah Bayar</th>
        </tr>
            
        @php
            $total = 0;
        @endphp
        @foreach ($datas as $data )
            @if ($data->user)
                <tr>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->user->email }}</td>>
                    <td>BKR-{{ $data->id }}</td>
                    <td>Lunas</td>
                    <td>{{ number_format($data->jumlah_bayar, 0, '.', '.') }}</td>
                </tr>
                @php
                    $total += $data->jumlah_bayar;
                @endphp
            @endif
        @endforeach
        <!-- Tambahkan baris lainnya sesuai data yang Anda miliki -->
        <tr>
            <td colspan="3"></td>
            <td>Total:</td>
            <td>{{ number_format($total, 0, '.', '.') }}</td> <!-- Ganti dengan total yang sesuai -->
        </tr>
        <!-- Tambahkan baris lainnya sesuai data yang Anda miliki -->
    </table>
</body>
</html>
