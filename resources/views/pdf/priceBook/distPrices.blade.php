<table>
<tr>
    <td class="borderBottom alignRight secondaryCol bold fob">Price</td>
    <td class="borderBottom alignRight secondaryCol bold">Pack/Size</td>
</tr>
<tr>
    <td class="alignRight secondaryData tableData">
        @if(floor((float)($wine->getFOBPrice())))
            ${!! number_format(($wine->getFOBPrice()), 2, '.', '') !!}
        @else
            -
        @endif
    </td>
    <td class="alignRight secondaryData tableData">
        {!! $wine->packSize->bottles !!} x {!! $wine->bottleSize->ml !!}ml
    </td>
</tr>
</table>