@php
$ar_judul = ['No','Nama','Kategori','Jumlah','Harga','Kondisi'];
$no = 1;
@endphp
<h3 align="center">Daftar Inventaris</h3>
<table border="1" width="100%" cellspacing="0" align="center">
<thead>
<tr bgcolor="skyblue">
@foreach( $ar_judul as $jdl )
<th>{{ $jdl }}</th>
@endforeach
</tr>
</thead>
<tbody>
@foreach($ar_inv as $i)
<tr>
    <td align="center">{{ $no++ }}</td>
    <td align="center">{{ $i->nama_barang }}</td>
    <td align="center">{{ $i->kat }}</td>
    <td align="center">{{ $i->jumlah }}</td>
    <td align="center">{{ $i->harga }}</td>
    <td align="center">{{ $i->kondisi }}</td>
</tr>
@endforeach
</tbody>
</table>