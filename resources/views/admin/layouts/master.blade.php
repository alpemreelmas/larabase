<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Larabase </title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{asset("adminAEE")}}/assets/vendors/core/core.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    @stack("css")
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset("adminAEE")}}/assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{asset("adminAEE")}}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset("adminAEE")}}/assets/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset("adminAEE")}}/assets/images/favicon.png" />

</head>
<body>
<div class="main-wrapper">

    @include("admin.layouts._sidebar")

    <div class="page-wrapper">

        @include("admin.layouts._navbar")

        <div class="page-content">
            @yield("content")
        </div>

        @include("admin.layouts._footer")

    </div>
</div>

<!-- core:js -->
<script src="{{asset("adminAEE")}}/assets/vendors/core/core.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->

<!-- end plugin js for this page -->
<!-- inject:js -->
<script src="{{asset("adminAEE")}}/assets/vendors/feather-icons/feather.min.js"></script>
<script src="{{asset("adminAEE")}}/assets/js/template.js"></script>
<!-- endinject -->
<!-- custom js for this page -->
<!-- end custom js for this page -->
@stack("js")
</body>
</html>
