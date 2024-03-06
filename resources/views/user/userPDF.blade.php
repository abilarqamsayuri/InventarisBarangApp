@php
$ar_judul = ['No','Nama','Email','Role'];
$no = 1;
@endphp
<h3 align="center">Daftar User</h3>
<table class="row justify-content-center" border="1" width="100%" cellspacing="0" align="center">
<thead>
<tr bgcolor="skyblue">
@foreach( $ar_judul as $jdl )
<th>{{ $jdl }}</th>
@endforeach
</tr>
</thead>
<tbody>
@foreach($ar_user as $u)
<tr>
    <td align="center">{{ $no++ }}</td>
    <td align="center">{{ $u->name }}</td>
    <td align="center">{{ $u->email }}</td>
    <td align="center">{{ $u->role }}</td>
</tr>
@endforeach
</tbody>
</table>