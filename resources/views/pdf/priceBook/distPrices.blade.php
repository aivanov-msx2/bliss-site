<table>
<tr>
    <td class="borderBottom alignRight secondaryCol bold">Excellar*</td>
    <td class="borderBottom alignRight secondaryCol bold fob">Transport<br/>Arranged</td>
    <td class="borderBottom alignRight secondaryCol bold">Pack/Size</td>
</tr>
@if($wine->getExcellarPrice())
<tr>
    <td class="alignRight secondaryData tableData">
        @if(floor((float)($wine->getExcellarPrice() * $wine->packSize->bottles)))
            ${!! number_format(floor((float)($wine->getExcellarPrice() * $wine->packSize->bottles)), 2, '.', '') !!}
        @else
            -
        @endif
    </td>
    <td class="alignRight secondaryData tableData">
        @if($wine->show_fob_in_pb && floor((float)($wine->getTransportArrangedPrice() * $wine->packSize->bottles)))
            ${!! number_format(floor((float)($wine->getTransportArrangedPrice() * $wine->packSize->bottles)), 2, '.', '') !!}
        @else
            -
        @endif
    </td>
    <td class="alignRight secondaryData tableData">
        {!! $wine->packSize->bottles !!} x {!! $wine->bottleSize->ml !!}ml
    </td>
</tr>
@endif
</table>