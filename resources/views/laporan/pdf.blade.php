<!DOCTYPE html>
<html>

<head>

<title>

Laporan Inventory

</title>

<style>

body{
    font-family:sans-serif;
}

table{

    width:100%;

    border-collapse:collapse;

    margin-top:20px;
}

table, th, td{

    border:1px solid black;
}

th, td{

    padding:10px;
}

h2{

    text-align:center;
}

</style>

</head>

<body>

<h2>

Laporan Inventory Payung Geulis

</h2>

<h3>Data Produk</h3>

<table>

<tr>

<th>No</th>
<th>Produk</th>
<th>Kategori</th>
<th>Stok</th>
<th>Harga</th>

</tr>

@foreach($produk as $p)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $p->nama_produk }}</td>

<td>{{ $p->kategori }}</td>

<td>{{ $p->stok }}</td>

<td>

Rp {{ number_format($p->harga) }}

</td>

</tr>

@endforeach

</table>

<h3>Data Stok Masuk</h3>

<table>

<tr>

<th>No</th>
<th>Produk</th>
<th>Jumlah</th>
<th>Tanggal</th>

</tr>

@foreach($stokMasuk as $s)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $s->produk->nama_produk }}</td>

<td>{{ $s->jumlah }}</td>

<td>{{ $s->tanggal }}</td>

</tr>

@endforeach

</table>

<h3>Data Stok Keluar</h3>

<table>

<tr>

<th>No</th>
<th>Produk</th>
<th>Jumlah</th>
<th>Tanggal</th>

</tr>

@foreach($stokKeluar as $s)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $s->produk->nama_produk }}</td>

<td>{{ $s->jumlah }}</td>

<td>{{ $s->tanggal }}</td>

</tr>

@endforeach

</table>

</body>
</html>