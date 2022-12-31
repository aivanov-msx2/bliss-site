<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @font-face {
            font-family: 'nexa';
            src: url('{{storage_path()}}/fonts/nexa.ttf') format('truetype')
        }

        @font-face {
            font-family: 'nexa-heavy';
            src: url('{{storage_path()}}/fonts/nexa-heavy.ttf') format('truetype')
        }

        @font-face {
            font-family: 'nexa-bold';
            src: url('{{storage_path()}}/fonts/nexa-bold.otf') format('truetype')
        }

        @font-face {
            font-family: 'nexa-italic';
            src: url('{{storage_path()}}/fonts/nexa-regular-italic.otf') format('truetype')
        }

        .page-break {
            page-break-after: always;
        }

        .avoid-break {
            page-break-inside: avoid;
        }

        body {
            font-family: 'nexa';
            position: relative;
        }

        .footer {
            position: absolute;
            bottom: -10px;
            width: 100%;
        }

        .logo-table {
            border-bottom: 4px solid #b3313e;
            width: 100%;
            margin-bottom: 60px;
        }

        #logo {
            z-index: 1;
            width: 260px;
            height: 172px;
            display: block;
            margin-top: 10px;
        }

        .intro {
            position: absolute;
            top: 220px;
            padding: 0 30px;
        }

        .intro p {
            font-size: 0.9rem;
            margin-bottom: 1.3rem;
        }

        .contact {
            position: absolute;
            bottom: 40px;
            width: 100%;
            border: 1px solid #ccc;
            padding: 0 10px 10px;
        }

        .contact p {
            text-align: center;
            font-size: 0.8rem;
            margin: 0 0 0;
        }

        .contact p.header {
            margin-top: 5px;
            text-transform: uppercase;
            font-size: 0.7rem;
        }

        h2 {
            font-family: 'nexa-heavy';
            font-weight: normal;
            text-transform: uppercase;
        }

        .copyright {
            text-align: center;
            font-size: 0.7rem;
            color: #666;
        }

        .heavy {
            font-family: 'nexa-heavy';
        }

        .bold {
            font-family: 'nexa-bold';
        }

        .italic {
            font-family: 'nexa-italic';
        }

        table.content {
            width: 100%;
            border-top: 4px solid #b3313e;
            padding-top: 20px;
        }

        table.content td.image {
            width: 170px;
            padding-top: 0;
        }

        table.content td {
            vertical-align: top;
        }

        table.wines-table {
            width: 100%;
            margin-top: 10px;
        }

        table.wines-table.wines-count-1 {
            width: 30%;
        }

        table.wines-table.wines-count-2 {
            width: 60%;
        }

        table.wines-table td {
            vertical-align: top;
        }

        .winemaker-image {
            margin-right: 0;
            margin-bottom: 5px;
            margin-top: 0;
            padding-top: 0;
            border: 15px solid #eee;
            width: 120px;
        }

        p.wine-country {
            font-size: 1rem;
            margin: 0;
            color: #333;
        }

        p.wine-header {
            font-size: 1.3rem;
            margin: 0;
        }

        p.data-item {
            font-size: 0.8rem;
            line-height: 0.7rem;
        }

        p.data-item.first-item {
            margin-top: 0;
        }

        p.data-item span.header {
            color: #b3313e;
            font-size: 0.7rem;
            line-height: 0.6rem;
            text-transform: uppercase;
            display: block;
        }

        p.data-item.data-item--wine {
            font-size: 0.55rem;
            line-height: 0.45rem;
            margin: 0 0 0.4rem;
            padding-right: 0.2rem;
        }

        p.data-item.data-item--wine.data-item--wine--first {
            margin-top: 0;
            margin-bottom: 3px;
            text-align: left;
            font-size: 0.7rem;
        }

        p.data-item.data-item--wine span.header {
            font-size: 0.5rem;
            line-height: 0.4rem;
        }

        p.data-item.data-item--wine span.inline-header {
            display: inline;
            color: #b3313e;
        }

        .wine-image {
            margin-right: 20px;
            margin-bottom: 5px;
            margin-top: 0;
            padding-top: 0;
            border: 10px solid #eee;
            width: auto;
            max-height: 160px;
            max-width: 80px
        }

        .secondaryData {
            font-size: 0.55rem;
            vertical-align: top;
            line-height: 0.55rem;
        }

        table tr td.secondaryCol {
            padding-top: 0;
            width: 80px;
            font-size: 0.55rem;
            line-height: 0.5rem;
        }

        table tr td.secondaryCol.availability {
            width: 90px;
        }

        table tr td.secondaryCol.fob {
            width: 70px;
        }

        table tr td.alignRight {
            text-align: right;
        }

        .footnote {
            font-size: 0.55rem;
            line-height: 0.5rem;
        }

    </style>
</head>
<body>

<div class="footer">
    <p class="copyright">Copyright &copy; Bliss Wine Imports</p>
</div>

<table class="logo-table">
    <tr>
        <td align="center">
            <img id="logo" src="{!! public_path() !!}/assets/img/logo-for-print.jpg" alt="">
        </td>
    </tr>
</table>

<div class="intro">
    @include('pdf/inc/blissIntro')
</div>

<div class="contact">
    @include('pdf/inc/contactInfo')
</div>

@foreach($countries as $country)
    @if($country->public)
        @foreach($country->regions as $region)
            @foreach($region->wineries as $index => $winery)

            <?php
            $priceBookWines = ($bookType === "distributor") 
                ? $winery->publicWinesDistributorPricebook() : $winery->publicWinesWholesalePricebook();
            $winesCount = count($priceBookWines);
            ?>
                @if($winesCount)
                    
                    <div class="page-break"></div>

                    <table style="width: 100%;">
                        <tr>
                            <td align="left">
                                @if(isset($winery->region->country->name))<p class="wine-country"> {!! $winery->region->country->name !!}</p>@endif
                                <p class="wine-header bold"> {!! $winery->name !!}</p>
                            </td>
                        </tr>
                    </table>
                
                    <table class="content">
                        <tr>
                            <td class="image">
                                <?php 
                                $img = "assets/img/_managed_content/" . $winery->winemaker_image_file;
                                ?>
                                <img src="{!! $img !!}" alt="" class="winemaker-image">
                            </td>
                            <td style="padding-right:10px">
                                @if(isset($region->name))<p class="data-item first-item"><span class="header">Region</span>{!! $region->name !!}</p>@endif
                                @if(isset($winery->winemaker_full_name))<p class="data-item"><span class="header">Winemaker</span>{!! $winery->winemaker_full_name !!}</p>@endif
                                @if(isset($winery->vineyard_size))<p class="data-item"><span class="header">Vineyard Size</span>{!! $winery->vineyard_size !!}</p>@endif
                                @if(isset($winery->total_winery_production))<p class="data-item"><span class="header">Total Winery Production</span>{!! $winery->total_winery_production !!}</p>@endif
                            </td>
                            <td>
                                @if(isset($winery->farming))<p class="data-item first-item"><span class="header">Farming</span>{!! $winery->farming !!}</p>@endif
                                @if(isset($winery->something_random))<p class="data-item"><span class="header">Something Random</span>{!! $winery->something_random !!}</p>  @endif
                            </td>
                        </tr>
                    </table>
                    
                    @if(isset($winery->winemaker_long_description))<p class="data-item">{!! $winery->winemaker_long_description !!}</p>@endif
                    @if(isset($winery->winemaker_philosophy))<p class="data-item"><span class="header">Philosophy</span>{!! $winery->winemaker_philosophy !!}</p>@endif
                    
                    
                    <table class="wines-table" style="padding-top:20px;">
                    @foreach($priceBookWines as $wine)
                    <?php
                    $wineImg = 'assets/img/_managed_content/' . $wine->image_file;
                    ?>
                    <tr>
                        <td align="center">
                            @if($wine->image_file && file_exists($wineImg))
                            <img src="{!! $wineImg !!}" alt="" class="wine-image">
                            @endif
                        </td>    
                        <td style="width: 100%; padding-bottom: 30px;">
                            <p class="data-item data-item--wine data-item--wine--first heavy">@if(isset($wine->vintage)){!! $wine->vintage !!}. @endif @if(isset($wine->name))"{!! $wine->name !!}"@endif</p>
                            <p class="data-item data-item--wine"><span class="inline-header">Grapes:</span> {!! $wine->getGrapesString() !!}</p>
                            <p class="data-item data-item--wine"><span class="inline-header">Profile:</span> @if(isset($wine->text_profile)){!! $wine->text_profile !!} @elseif(isset($wine->text_profile)) {!! $wine->text_profile !!} @endif</p>
                            @if(isset($wine->alc))<p class="data-item data-item--wine"><span class="inline-header">Alc: </span>{!! $wine->alc !!}%</p>@endif
                            @if(isset($wine->ta))<p class="data-item data-item--wine"><span class="inline-header">TA: </span>{!! $wine->ta !!}/L</p>@endif
                            @if(isset($wine->rs))<p class="data-item data-item--wine"><span class="inline-header">RS: </span>{!! $wine->rs !!}/L</p>@endif
                            @if(isset($wine->sulfur))<p class="data-item data-item--wine"><span class="inline-header">Sulfur: </span>{!! $wine->sulfur !!}</p>@endif
                            @if(isset($wine->soil))<p class="data-item data-item--wine"><span class="inline-header">Soil: </span>{!! $wine->soil !!}</p>@endif
                            @if(isset($wine->altitude))<p class="data-item data-item--wine"><span class="inline-header">Altitude: </span>{!! $wine->altitude !!}</p>@endif
                            @if(isset($wine->production_size))<p class="data-item data-item--wine"><span class="inline-header">Cases: </span>{!! $wine->production_size !!}</p>@endif
                        </td>
                        <td>
                            @if($bookType === "distributor")
                            @include('pdf/priceBook/distPrices')
                            @endif
                            @if($bookType === "wholesale")
                            @include('pdf/priceBook/wholesalePrices')
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    
                    @if($bookType === "distributor")
                    <tr>
                        <td colspan="3">
                            <p class="footnote">* If we arrange transportation on your behalf, we will do so winery door to your warehouse door for a cost of $30 per case of 12. This fee includes temperature controlled shipping from start to finish as well as all taxes, tariffs, duties, and administrative fees. While we always have a delivery goal of 90-105 days from the time a purchase order is received, from time to time circumstances out of our control may arise to delay a shipment. Please advise us of any time restrictions or deadlines when submitting the purchase order.</p>
                            @if($country['name'] === "France")
                                <p class="footnote">** French wines only: tariffs are included in the Transport Arranged price, but NOT in the ex-cellar price.</p>
                            @endif
                        </td>
                    </tr>
                    @endif
                    </table>
                @endif
                
            @endforeach
        @endforeach 
    @endif
@endforeach



</body>


