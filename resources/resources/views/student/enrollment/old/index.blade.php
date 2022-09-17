<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('title')
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800&family=Nunito&family=Nunito+Sans&family=Roboto+Flex:opsz,wght@8..144,200&family=Roboto:wght@100&display=swap" rel="stylesheet">
    {!! Html::style('css/custom-admin.css') !!}
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/bootstrap-multiselect.css') !!}
    {!! Html::style('vendors/mdi/css/materialdesignicons.min.css') !!}
    {!! Html::style('plugins/flatpickr/dist/flatpickr.min.css') !!}
    {{--css for loader--}}
    {!! Html::style('/css/css-loader.css') !!}
    {!! Html::style('css/student-enrollment.css') !!}
</head>
<body>
    @yield('content')
    {!! Html::script('js/jquery-3.6.0.slim.min.js') !!}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    {!! Html::script('vendors/js/vendor.bundle.base.js') !!}
    {!! Html::script('js/misc.js') !!}
    {!! Html::script('plugins/flatpickr/dist/flatpickr.js') !!}
{{--    @include('student.enrollment.script')--}}
    @yield('script')
</body>
</html>
