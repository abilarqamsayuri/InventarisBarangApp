@php
$ar_judul = ['No','Nama'];
$no = 1;
@endphp
<h3 align="center">Daftar Kategori</h3>
<table border="1" width="100%" cellspacing="0" align="center">
<thead>
<tr bgcolor="skyblue">
@foreach( $ar_judul as $jdl )
<th>{{ $jdl }}</th>
@endforeach
</tr>
</thead>
<tbody>
@foreach($ar_kategory as $k)
<tr>
    <td align="center">{{ $no++ }}</td>
    <td align="center">{{ $k->nama }}</td>
@endforeach
</tbody>
</table>