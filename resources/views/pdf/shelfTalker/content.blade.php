<tr>
    <td valign="top">
        <table width="100%">
            <tr>
                <td>
                    <h3>{!! $wine->name !!} {!! $wine->vintage !!}</h3>
                    <h4>{!! $wine->winery->name !!}</h4>
                    <h4>{!! $wine->winery->region->name !!}, {!! $wine->winery->region->country->name !!}</h4>
                </td>
                @if ($showBottleImage)
                    <td align="right"><img src="{{ $wineImg }}" class="bottle-image"></td>
                @endif
            </tr>
        </table>
        <hr>
        <p><span>Grapes:</span>
            @foreach($wine->grapes as $index => $value)
                {!! $value->name !!} ({!! (int)$value->pivot->percentage !!}%)@if( $index < (count($wine->grapes)-1) ), @endif
            @endforeach
        </p>
        @if(isset($wine->text_profile))<p><span>Profile:</span> {!! $wine->text_profile !!}</p>@endif
        @if(isset($wine->text_pairing))<p><span>Pairing:</span> {!! $wine->text_pairing !!}</p>@endif
        @if(isset($wine->text_grape_growing_short))<p><span>Farming:</span> {!! $wine->text_grape_growing_short !!}</p>@endif

        <table class="logo-table">
            <tr>
                <td>
                    @if(isset($wine->data_alc))<p><span>Alc:</span> {!! $wine->data_alc !!}%</p>@endif
                    @if(isset($wine->data_sulfur))<p><span>Sulfur:</span> {!! $wine->data_sulfur !!}</p>@endif
                    @if(isset($wine->data_vineyard_age))<p><span>Vineyard Age:</span> {!! $wine->data_vineyard_age !!}</p>@endif
                    @if(isset($wine->data_case_production))<p><span>Production Size:</span> {!! $wine->data_case_production !!}</p>@endif
                </td>
                <td class="logo-td">
                    <img class="logo" src="{!! public_path() !!}/assets/img/logo-for-print.jpg" alt="">
                </td>
            </tr>
        </table>

    </td>
</tr>
