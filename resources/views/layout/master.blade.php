<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> -->

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">

    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin-home.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin-header.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin-sidenav.css')}}">
    <link rel="stylesheet" href="{{asset('css/health-data.css')}}">
    <link rel="stylesheet" href="{{asset('css/add-student-health-data.css')}}">
    <link rel="stylesheet" href="{{asset('css/add-personel-health-data.css')}}">
    <link rel="stylesheet" href="{{asset('css/batch-personel-health-data.css')}}">
    <link rel="stylesheet" href="{{asset('css/batch-student-health-data.css')}}">
    <link rel="stylesheet" href="{{asset('css/supplies-inventory.css')}}">
    <link rel="stylesheet" href="{{asset('css/add-medical-supply.css')}}">
    <link rel="stylesheet" href="{{asset('css/edit-medical-record.css')}}">
    <link rel="stylesheet" href="{{asset('css/add-consultation-record.css')}}">
    <link rel="stylesheet" href="{{asset('css/consultation-record.css')}}">
    <link rel="stylesheet" href="{{asset('css/messaging.css')}}">
    
    
</head>
<body>

    @yield('content')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
    
    <script src="{{asset('js/data-tables.js')}}"></script>
    <script src="{{asset('js/login.js')}}"></script>
    <script src="{{asset('js/admin-sidenav.js')}}"></script>
    <script src="{{asset('js/add-health-data.js')}}"></script>
    <script src="{{asset('js/batch-health-data.js')}}"></script>
    <script src="{{asset('js/add-medical-supply.js')}}"></script>
    <script src="{{asset('js/edit-medical-record.js')}}"></script>
    <script src="{{asset('js/medical-supply-table.js')}}"></script>
    <script src="{{asset('js/add-consultation-record.js')}}"></script>
    <script src="{{asset('js/add-remove-field.js')}}"></script>
    

</body>
</html>