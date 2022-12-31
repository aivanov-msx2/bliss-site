<table>
<tr>
    <td class="borderBottom alignRight secondaryCol bold">Price</td>
    <td class="borderBottom alignRight secondaryCol bold">Pack/Size</td>
</tr>
<tr>
    <td class="alignRight secondaryData">
        @if((float)$wine->getWholesalePrice())
            ${!! number_format((float)$wine->getWholesalePrice(), 2, '.', '') !!}
        @endif
    </td>
    <td class="alignRight secondaryData tableData">{!! $wine->packSize->bottles !!} x {!! $wine->bottleSize->ml !!}ml
    </td>
</tr>
</table>