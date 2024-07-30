<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="{{asset ('../assets/img/favicon.png') }}">
<link rel="icon" type="image/png" href="{{asset ('../assets/img/favicon.png') }}">

    @php
    $title = App\Models\Title::latest()->first();
    @endphp
    <title>{{optional($title)->title}}</title>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="{{asset ('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700') }}" />
<!-- Nucleo Icons -->
<link href="{{asset ('../assets/img/favicon.png') }}" rel="stylesheet" />
<link href="{{asset ('../assets/img/favicon.png') }}" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<!-- CSS Files -->
<link id="pagestyle" href="{{asset ('../assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
<!-- Nepcha Analytics (nepcha.com) -->
<!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
<script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>