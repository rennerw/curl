<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('bower_components/fonteawesome-free/css/all.css')}}">
    
    <!-- FullCalendar -->
    <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar-4.2.0/packages/core/main.css')}}">
    <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar-4.2.0/packages/daygrid/main.css')}}">
    <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar-4.2.0/packages/timegrid/main.css')}}">
    <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar-4.2.0/packages/list/main.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>

<style>
    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
    }
    #app-content{
        width: 100%;
        padding: 20px;
        min-height: 90vh;
    }
    #sidebar {
        min-width: 250px;
        max-width: 250px;
        min-height: 100vh;
        transition: all 0.3s;
    }

    #sidebar.active {
        margin-left: -250px;
    }

    #sidebar a[data-toggle="collapse"] {
        position: relative;
    }

    #sidebar .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }

    #sidebar .sidebar-header {
        padding: 20px;
        color: white;
        /*background: #6d7fcc;*/
    }

    #sidebar ul.components {
        padding: 0 0 20px 0;
        /*border-bottom: 1px solid #47748b;*/
    }

    #sidebar ul p {
        color: #fff;
        padding: 10px;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
    }
    #sidebar ul li a:hover {
        color: #7386D5;
        background: #fff;
    }

    #sidebar ul li.active > a, a[aria-expanded="true"] {
        color: #fff;
        background: #6d7fcc;
    }
    #sidebar ul ul a {
        font-size: 0.9em !important;
        padding-left: 30px !important;
        /*background: #6d7fcc;*/
    }

    #breadcrumb{
        margin: 0 auto;
        display: flex;
        flex-direction: row;
    }

    #breadcrumb button{
        flex: 1;
	    margin: 8px 5px 5px 0 !important;
        padding: 0;
        max-height: 45px;    
    }
    #breadcrumb nav{
        flex: 11;
    }
    

    @media (max-width: 768px) {
        #sidebar {
            margin-left: -250px;
        }
        #sidebar.active {
            margin-left: 0;
        }
    }
</style>
@stack('style')
<body>
    <div id="app">
        @auth
            @include('layouts.header.main')   
        @endauth

        <div class="wrapper">
            @if(isset($options["sidebar"]) && $options["sidebar"])
                <nav id="sidebar" class="bg-dark">
                    @include("layouts.sidebar.main")
                </nav>
            @endif
            <div id="app-content">
                    @if(isset($options["breadcrumb"]) && $options["breadcrumb"])
                    <div id="breadcrumb">
                        @if(isset($options["sidebar"]) && $options["sidebar"])
                            <button type="button" id="sidebarCollapse" class="btn btn-info">
                                <i class="fas fa-align-left"></i>
                                <span>Fechar Menu</span>
                            </button>
                        @endif

                        @include("layouts.componentes.breadcrumb")
                    </div>
                    
                    @elseif(isset($options["sidebar"]) && $options["sidebar"])
                        <button type="button" id="sidebarCollapse" class="btn btn-info mb-2">
                            <i class="fas fa-align-left"></i>
                            <span>Fechar Menu</span>
                        </button>
                    @endif
                

                @if(isset($options["messages"]) && $options["messages"])
                    @include("layouts.componentes.messages")
                @endif

                @yield('content')
            </div>
        </div>

        @include("layouts.footer.main")
    </div>
</body>
<script>
    $(document).on("click","#sidebarCollapse", function(){

        if($(this).find("span").text() == "Fechar Menu") $(this).find("span").text("Abrir Menu");
        else $(this).find("span").text("Fechar Menu");

        $('#sidebar').toggleClass('active');
    });

</script>
@include('sweetalert::alert')
<!-- MultiSelect -->
<script src="{{ asset('bower_components/select-excel/js/jquery.multi-select.js')}}"></script>
{{-- MOMENT --}}
<script type="text/javascript" src="{{ asset('/bower_components/moment/moment.js') }}"></script>
<script type="text/javascript" src="{{ asset('/bower_components/moment/locale/pt-br.js') }}"></script>

{{-- Bootstrap - DateTimepicker CSS --}}
<script type="text/javascript" src="{{ asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>


<!-- FullCalendar -->
<script src="{{ asset('/bower_components/fullcalendar-4.2.0/packages/core/main.js')}}"></script>
<script src="{{ asset('/bower_components/fullcalendar-4.2.0/packages/interaction/main.js')}}"></script>
<script src="{{ asset('/bower_components/fullcalendar-4.2.0/packages/daygrid/main.js')}}"></script>
<script src="{{ asset('/bower_components/fullcalendar-4.2.0/packages/timegrid/main.js')}}"></script>
<script src="{{ asset('/bower_components/fullcalendar-4.2.0/packages/list/main.js')}}"></script>
<script src="{{ asset('/bower_components/fullcalendar-4.2.0/packages/core/locales/pt-br.js')}}"></script>

{{-- Bootstrap - DataTable CSS --}}
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>


{{-- Bootstrap - DateTimepicker CSS --}}
<script type="text/javascript" src="{{ asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

{{-- Jquery Mask --}}
<script type="text/javascript" src="{{ asset('/bower_components/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script>

{{-- Select2 --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js"></script>

@include("layouts.componentes.masks")
@stack('script')
</html>
