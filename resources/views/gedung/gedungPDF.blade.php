@php
$ar_judul = ['No','Nama','Jumlah','Inventaris','Kategori'];
$no = 1;
@endphp
<h3 align="center">Daftar Gedung</h3>
<table border="1" width="100%" cellspacing="0" align="center">
<thead>
<tr bgcolor="skyblue">
@foreach( $ar_judul as $jdl )
<th>{{ $jdl }}</th>
@endforeach
</tr>
</thead>
<tbody>
@foreach($ar_gedung as $g)
<tr>
    <td align="center">{{ $no++ }}</td>
    <td align="center">{{ $g->nama }}</td>
    <td align="center">{{ $g->jumlah }}</td>
    <td align="center">{{ $g->inventaris }}</td>
    <td align="center">{{ $g->kategori }}</td>
</tr>
@endforeach
</tbody>
</table>