<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $metaDesc ?? config('project.instanceSlogan') }}">
    <meta name="author" content="{{ config('project.appName') }}">

    <title>{{ config('project.instanceName') ?? env('APP_NAME') }} - {{ $title ?? config('project.instanceSlogan') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ themeImageUrl('favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ themeImageUrl('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ themeImageUrl('favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ themeImageUrl('favicons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ themeImageUrl('favicons/safari-pinned-tab.svg') }}" color="#224abe">
    <link rel="shortcut icon" href="{{ themeImageUrl('favicons/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#224abe">
    <meta name="msapplication-config" content="{{ themeImageUrl('favicons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- Custom fonts for this template-->
    <link href="{{ themeVendorCssUrl('fontawesome-free/css/all.min') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ themeCssUrl('sb-admin-2') }}" rel="stylesheet">
    <link href="{{ themeCssUrl('custom') }}" rel="stylesheet">

    @stack('css')

</head>

<body id="page-top" class="{{ $bodyClass ?? '' }}">

@yield('chassis')

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script>
    baseUrl = "{{ url('/') }}/";
</script>

<!-- Bootstrap core JavaScript-->
<script src="{{ themeVendorJsUrl('jquery/jquery.min') }}"></script>
<script src="{{ themeVendorJsUrl('bootstrap/js/bootstrap.bundle.min') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ themeVendorJsUrl('jquery-easing/jquery.easing.min') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ themeJsUrl('sb-admin-2.min') }}"></script>
<script src="{{ themeJsUrl('custom') }}"></script>

@stack('js')

</body>

</html>
