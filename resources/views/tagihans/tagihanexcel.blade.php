<table>
    <thead>
        <tr>
            <th align="center" style="font-weight: bold;">No</th>
            <th align="center" style="font-weight: bold;">Nama</th>
            <th align="center" style="font-weight: bold;">Proyek</th>
            <th align="center" style="font-weight: bold;">Uang Muka</th>
            <th align="center" style="font-weight: bold;">Tagihan</th>
            <th align="center" style="font-weight: bold;">Keterangan</th>
            
        </tr>
    </thead>
    <tbody>
        @php ($i = 1)
        @foreach ($tagihans as $tagihan)
        <tr>
            <td> {{$i}} </td>
            <td> {{$tagihan->nama}} </td>
            <td> {{$tagihan->nama_proyek}} </td>
            <td> Rp @angka($tagihan->uang_muka) </td>
            <td> Rp @angka($tagihan->tagihan) </td>
            <td> {!! $tagihan->keterangan !!} </td>
        </tr>
        @php ($i++)
        @endforeach
    </tbody>
</table>