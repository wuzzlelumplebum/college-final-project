<table>
    <thead>
        <tr>
            <th align="center" style="font-weight: bold;">No</th>
            <th align="center" style="font-weight: bold;">Tanggal</th>
            <th align="center" style="font-weight: bold;">Nama Penanggung Jawab</th>
            <th align="center" style="font-weight: bold;">Jenis Pengeluaran</th>
            <th align="center" style="font-weight: bold;">Nominal</th>
            <th align="center" style="font-weight: bold;">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @php ($i = 1)
        @foreach ($pengeluarans as $pengeluaran)
        <tr>
            <td> {{$i}} </td>
            <td> {{$pengeluaran->tanggal}} </td>
            <td> {{$pengeluaran->nama_pj}} </td>
            <td> {{config('custom.kat_pengeluaran.'.$pengeluaran->jenis_pengeluaran)}} </td>
            <td> Rp @angka($pengeluaran->nominal) </td>
            <td> {!! $pengeluaran->keterangan !!} </td>
        </tr>
        @php ($i++)
        @endforeach
    </tbody>
</table>