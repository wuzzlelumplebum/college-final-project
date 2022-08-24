<table>
    <thead>
        <tr>
            <th align="center" style="font-weight: bold;">No</th>
            <th align="center" style="font-weight: bold;">Nama</th>
            <th align="center" style="font-weight: bold;">No. Receipt</th>
            <th align="center" style="font-weight: bold;">Nominal</th>
            <th align="center" style="font-weight: bold;">Tanggal Bayar</th>
            <th align="center" style="font-weight: bold;">Keterangan</th>
            <th align="center" style="font-weight: bold;">ID Tagihan - Invoice</th>
        </tr>
    </thead>
    <tbody>
        @php ($i = 1)
        @foreach ($payments as $payment)
        <tr>
            <td> {{$i}} </td>
            <td> {{$payment->nama}} </td>
            <td> {{$payment->receipt_no}} </td>
            <td> Rp @angka($payment->nominal) </td>
            <td> {{$payment->tanggal}} </td>
            <td> {!! $payment->keterangan !!} </td>
            <td> {{$payment->tagihan_id}} - {{@$payment->tagihan->invoice }} </td>
        </tr>
        @php ($i++)
        @endforeach
    </tbody>
</table>