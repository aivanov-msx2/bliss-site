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
            height: 100%;
        }

        table.main-table {
            padding: 10px 10px 15px;
            width: 3.3in;
            height: 4.9in;
            border: 1px solid #ccc;
            float: left;
        }

        .bottle-image {
            width: 0.5in;
            margin-left: 0.15in;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        h3 {
            font-family: 'nexa-heavy';
            font-weight: normal;
            font-size: 15px;
            line-height: 15px;
            margin: 0;
            margin-top: 0;
        }

        h4 {
            font-family: 'nexa';
            font-weight: normal;
            font-size: 14px;
            line-height: 14px;
            margin: 0;
            margin-top: 5px;
        }

        p {
            font-size: 12px;
            line-height: 12px;
            margin: 5px 0 0;
        }

        hr {
            height: 1px;
            border: 1px solid #ccc;
            border-bottom: 0;
            margin: 15px 0;
        }

        p span {
            font-family: 'nexa-heavy';
        }

        .logo {
            width: 0.75in;
        }

        .logo-table {
            width: 100%;
        }

        .logo-td {
            vertical-align: bottom;
            width: 0.75in;
        }

    </style>
</head>
<body>

<table class="main-table" style="position: absolute; left: 0; top: 0;">
    @include('pdf.shelfTalker.content')
</table>

<table class="main-table" style="position: absolute; right: 0; top: 0;">
    @include('pdf.shelfTalker.content')
</table>

</body>
