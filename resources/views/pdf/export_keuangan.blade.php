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
        <tr>
            <td>Nama 1</td>
            <td>email1@example.com</td>
            <td>Paket A</td>
            <td>Bayar</td>
            <td>500000</td>
        </tr>
        <tr>
            <td>Nama 2</td>
            <td>email2@example.com</td>
            <td>Paket B</td>
            <td>Bayar</td>
            <td>750000</td>
        </tr>
        <!-- Tambahkan baris lainnya sesuai data yang Anda miliki -->
        <tr>
            <td colspan="3"></td>
            <td>Total:</td>
            <td>1250000</td> <!-- Ganti dengan total yang sesuai -->
        </tr>
        <!-- Tambahkan baris lainnya sesuai data yang Anda miliki -->
    </table>
</body>
</html>
