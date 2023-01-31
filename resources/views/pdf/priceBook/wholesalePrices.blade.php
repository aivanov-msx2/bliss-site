<table>
<tr>
    <td class="borderBottom alignRight secondaryCol bold">1CS/Frontline</td>
    <td class="borderBottom alignRight secondaryCol bold">3CS/Discount</td>
    <td class="borderBottom alignRight secondaryCol bold">5CS/BTG</td>
    <td class="borderBottom alignRight secondaryCol bold">Pack/Size</td>
</tr>
<tr>
    <td class="alignRight secondaryData">
        @if((float)$wine->getWholesalePrice())
            ${!! number_format((float)$wine->getWholesalePrice(), 2, '.', '') !!}
        @endif
    </td>
    <td class="alignRight secondaryData">
        @if((float)$wine->getWholesale3CasePrice())
            ${!! number_format((float)$wine->getWholesale3CasePrice(), 2, '.', '') !!}
        @endif
    </td>
    <td class="alignRight secondaryData">
        @if((float)$wine->getWholesale5CasePrice())
            ${!! number_format((float)$wine->getWholesale5CasePrice(), 2, '.', '') !!}
        @endif
    </td>
    <td class="alignRight secondaryData tableData">{!! $wine->packSize->bottles !!} x {!! $wine->bottleSize->ml !!}ml
    </td>
</tr>
</table>