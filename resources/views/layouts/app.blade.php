<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="{{url('icons/favicon.ico')}}">
    <!-- <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,400;1,500;1,800&display=swap"
        rel="stylesheet"
    /> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800&family=Nunito&family=Nunito+Sans&family=Roboto+Flex:opsz,wght@8..144,200&family=Roboto:wght@100&display=swap" rel="stylesheet">
    {!! Html::style('css/custom-admin.css') !!}
    <!-- {!! Html::style('css/style.css') !!} -->
    {!! Html::style('css/navigation.css') !!}
    {!! Html::style('css/bootstrap-multiselect.css') !!}
    {!! Html::style('vendors/mdi/css/materialdesignicons.min.css') !!}
    {!! Html::style('plugins/flatpickr/dist/flatpickr.min.css') !!}
    {!! Html::style('plugins/vanilla-calendar-main/vanilla-calendar.min.css') !!}
    {{--css for loader--}}
    {!! Html::style('/css/css-loader.css') !!}
    {{--    for dispalying confirmation--}}
    {!! Html::style('confirm/jquery-confirm.min.css') !!}
    {{-- zabuto calender --}}
    {!! Html::style('calendar/zabuto_calendar.min.css') !!}
    @yield('style')
</head>
<body>
@if(Auth::user())
    @include('layouts.menubar')
    @include('layouts.sidebar')
@endif
@yield('content')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

<!-- {!! Html::script('js/jquery-3.6.0.slim.min.js') !!} -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
{!! Html::script('vendors/js/vendor.bundle.base.js') !!}
{!! Html::script('js/misc.js') !!}
{!! Html::script('plugins/flatpickr/dist/flatpickr.js') !!}
{!! Html::style('plugins/vanilla-calendar-main/vanilla-calendar.min.js') !!}
{!! Html::script('confirm/jquery-confirm.min.js') !!}

{{-- zabuto calender --}}
{!! Html::script('calendar/zabuto_calendar.js') !!}

<script>
    Laravel = {
        'url': '{{url("")}}'
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".getDate").flatpickr({
        dateFormat: "Y-m-d"
    });
    $(".myDate").flatpickr({
        dateFormat: "Y-m-d",
        defaultDate: "<?php echo date('Y-m-d');?>",
    });


    $(".currentDate").flatpickr({
        maxDate : "<?php echo date('Y-m-d');?>",
        dateFormat: "Y-m-d",
    });
    $(".futureDate1").flatpickr({
        minDate: "<?php echo date('Y-m-d');?>",
        dateFormat: "Y-m-d",
    });
    //starting loader
    function start_loader() {
        $('#loader').addClass('is-active');
    }
    //ending loader
    function end_loader() {
        $('#loader').removeClass('is-active');
    }





    //displaying success message
    function successDisplay(title) {
        $.confirm({
            title: title,
            content: false,
            type: 'red',
            typeAnimated: true,
            buttons: {
                close: function () {
                }
            }
        });
    }
    //displaying error message
    function errorDisplay(title) {
        $.confirm({
            title: title,
            content: false,
            type: 'red',
            typeAnimated: true,
            buttons: {
                close: function () {
                }
            }
        });
    }
    function filterList() {
        debugger;
        var baseurl = window.location.origin+window.location.pathname;
        debugger;
        window.location = baseurl+'?'+$('#search').serialize();
    }
    function filterList2() {
        var baseurl = window.location.origin+window.location.pathname;
        window.location = baseurl+'?'+$('#search2').serialize();
    }
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    function getReset(url) {
        var url1 = Laravel.url+'/'+url;
        location.replace(url1)
    }
    function getResetLink(url,url2,id) {
        var url1 = Laravel.url+'/'+url+'/'+url2+'/'+id;
        location.replace(url1)
    }
</script>
@include('layouts.sidebar_js')

@yield('script')
</body>
</html>
