<table>
<tr>
    <td class="borderBottom alignRight secondaryCol bold">Prices</td>

    <td class="borderBottom alignRight secondaryCol bold">Pack/Size</td>
</tr>
<tr>
    <td class="alignRight secondaryData">
        @if((float)$wine->getWholesalePrice())
            <p>
                1CS/Frontline<br/>
                ${!! number_format((float)$wine->getWholesalePrice(), 2, '.', '') !!}
            </p>
        @endif

        @if((float)$wine->getWholesale3CasePrice())
           <p>
                3CS/Discount<br/>
                ${!! number_format((float)$wine->getWholesale3CasePrice(), 2, '.', '') !!}
            </p>
        @endif

        @if((float)$wine->getWholesale5CasePrice())
            <p>
                5CS/BTG<br/>
                ${!! number_format((float)$wine->getWholesale5CasePrice(), 2, '.', '') !!}
            </p>
        @endif
    </td>
    <td class="alignRight secondaryData tableData">{!! $wine->packSize->bottles !!} x {!! $wine->bottleSize->ml !!}ml
    </td>
</tr>
</table>
