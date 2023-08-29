<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Style sesuaikan dengan kebutuhan Anda -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h1>Laporan Pendapatan</h1></center>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Meja</th>
                <th>Nama Pemesan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total = 0;
            @endphp
            @foreach ($pesanans as $masuk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $masuk->kode_meja }}</td>
                <td>{{ $masuk->nama_pemesan }}</td>
                <td>{{ $masuk->created_at->format('d/m/Y') }}</td>
                <td>{{ $masuk->status }}</td>
                <td>Rp. {{ number_format($masuk->jumlah_harga) }}</td>
            </tr>
            @php
            $total += $masuk->jumlah_harga;
            @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" align="right"><strong>Total :</strong></td>
                <td align="right"><strong>Rp. {{ number_format($total) }}</strong></td>
            </tr>
        </tfoot>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>
