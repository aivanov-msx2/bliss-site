<!DOCTYPE HTML>
<html>
<head>
    <style>
        @font-face {
            font-family: 'nexa';
            src: url('{{storage_path()}}/fonts/nexa.ttf')  format('truetype')
        }
        @font-face {
            font-family: 'nexa-heavy';
            src: url('{{storage_path()}}/fonts/nexa-heavy.ttf')  format('truetype')
        }
        body {
            font-family: 'nexa';
        }
        a {
            text-decoration: none;
            color: inherit;
        }

        #logo {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 1;
            width: 80px;
            margin-left: -2px;
            margin-top: -2px;
        }

        h3 {
            font-family: 'nexa-heavy';
            font-weight: normal;
            font-size: 22px;
            line-height: 1.5rem;
            margin-bottom: 15px;
            margin-top: 20px;
            padding-top: 10px;
        }

        h4 {
            font-weight: normal;
            font-size: 19px;
            line-height: 0.5rem;
            margin-top: 0;
            padding-top: 10px;
        }

        h6 {
            font-size: 0.8rem;
        }

        p {
            line-height: 0.78rem;
        }

        .vintage {
            font-family: 'nexa';
        }

        .prefix {
            color: #b3313e;
        }
        .header {
            color: #b3313e;
        }
        .prefix::after {
            content: ": ";
        }
        .data-item {
            font-size: 0.8rem;
        }

        .copyrightLeft {
            position: absolute;
            left: 0;
            bottom: 0;
            font-size: 0.7rem;
            margin-bottom: -5px;
        }
        .copyrightRight {
            position: absolute;
            right: 0;
            bottom: 0;
            font-size: 0.7rem;
            margin-bottom: -5px;
        }
    </style>
</head>
<body>

    <div style="max-height: 260px;overflow:hidden;">
        <img id="logo" src="{!! public_path() !!}/assets/img/logo-for-print.jpg" alt="">
        
        @if($wineryImg && file_exists($wineryImg))
        <img style="width:100%;" class="" src="{!! $wineryImg !!}" alt=""/>
        @endif
    </div>
    <table style="width: 100%; position: absolute; top: 260px; left: 0;">
        <tr>
            <td valign="top">
                <div style="width: 200px; margin-left: 20px;">
                    @if($wineImg && file_exists($wineImg))
                    <img src="{!! $wineImg !!}" style="width: 180px; margin-top: -60px; border: 10px solid #fff;" alt=""/>
                    @endif

                    @if($wine->alc)<p class="data-item"><span class="header">Alc:</span> {!! $wine->alc !!}%</p>@endif
                    @if($wine->ph)<p class="data-item"><span class="header">PH:</span> {!! $wine->ph !!}</p>@endif
                    @if($wine->ta)<p class="data-item"><span class="header">TA:</span> {!! $wine->ta !!}</p>@endif
                    @if($wine->rs)<p class="data-item"><span class="header">RS:</span> {!! $wine->rs !!}</p>@endif
                    @if($wine->sulfur)<p class="data-item"><span class="header">Sulfur:</span> {!! $wine->sulfur !!}</p>@endif
                    @if($wine->soil)<p class="data-item"><span class="header">Soil:</span> {!! $wine->soil !!}</p>@endif
                    @if($wine->altitude)<p class="data-item"><span class="header">Altitude:</span> {!! $wine->altitude !!}</p>@endif
                    @if($wine->vineyard_age_years)<p class="data-item"><span class="header">Vineyard Age:</span> {!! $wine->vineyard_age_years !!}</p>@endif
                    @if($wine->production_size)<p class="data-item"><span class="header">Production Size:</span> {!! $wine->production_size !!}</p>@endif
                    @if($wine->text_pairing)<p class="data-item"><span class="header">Pairing:</span> {!! $wine->text_pairing !!}</p>@endif
                    @if($wine->text_pairing_2)<p class="data-item"><span class="header">Complimentary Cuisines:</span> {!! $wine->text_pairing_2 !!}</p>@endif

                </div>
            </td>
            <td valign="top">
                <div style="width: 455px; margin-left: 15px; max-height:745px; height: 745px; overflow:hidden;">
                    <h3>{!! $wine->name !!} <span class="vintage">{!! $wine->vintage !!}</span></h3>
                    <h4>{!! $wine->winery->name !!}</h4>
                    <p class="data-item"><span class="prefix">Winemaker</span> {!! $wine->winery->winemaker_full_name !!}  <span class="prefix" style="padding-left: 10px;">Region</span> {!! $wine->winery->region->name !!}, {!! $wine->winery->region->country->name !!}</p>
                    <p class="data-item"><span class="prefix">Grapes</span>
                        @foreach($wine->grapes as $index => $value)
                            {!! $value->name !!} ({!! (int)$value->pivot->percentage !!}%)@if( $index < (count($wine->grapes)-1) ), @endif
                        @endforeach
                    </p>
                    @if($wine->text_profile)<p class="data-item"><span class="prefix">Profile</span> {!! $wine->text_profile !!}</p>@endif
                    @if($wine->text_grape_growing)<p class="data-item"><span class="prefix">Grape Growing</span> {!! $wine->text_grape_growing !!}</p>@endif
                    @if($wine->text_winemaking)<p class="data-item"><span class="prefix">Winemaking</span> {!! $wine->text_winemaking !!}</p>@endif
                    @if($wine->text_more_about_the_wine)<p class="data-item"><span class="prefix">More About the Wine</span> {!! $wine->text_more_about_the_wine !!}</p>@endif
                </div>
            </td>
        </tr>
    </table>

<p class="copyrightLeft">Bliss Wine Imports</p>
<p class="copyrightRight">www.blisswineimports.com</p>



</body>
