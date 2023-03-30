<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }

        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }

        .panel-body {
            height: 350px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'pusherKey' => config('broadcasting.connections.pusher.key'),
            'pusherCluster' => config('broadcasting.connections.pusher.options.cluster')
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!-- {{ config('app.name', 'Laravel') }} -->
                        <img src="{{ asset('logo.png')}}" alt = "{{ config('app.name', 'Laravel') }}" />
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::check())
                            <li><a href="{{ url('home') }}" id="home">Home</a></li>
                            <li><a href="{{ url('chat') }}" id="chat">Join Chat</a></li>
                            @if(Auth::user()->type == 1)
                            <li><a href="{{ url('users') }}" id="users">Manage Accounts</a></li>
                            @endif
                            <li><a href="{{ url('modules') }}" id="module">Modules</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        @if(Auth::check())
        <div class="footer" style="height: 60px; margin-bottom: 0px;padding:5px">
            <div class="row" style="text-align: center;margin: 0;">
                <img src="{{asset('logo.png')}}" alt="{{ config('app.name', 'Laravel') }}" style="width: 50px;margin-right: 10px;">
                <span>Designed By XXX © 2022. All Rights Reserved</span>
            </div>
        </div>
        @endif
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script type="text/javascript">
        function viewmore(element) {
            var data = $(element).parent().attr('data-old')+'  <a onclick="viewless(this)" class="view_less">View Less</a>';
            console.log(data);
            $(element).parent().html(data);
        }
        function viewless(element) {
            var data = $(element).parent().attr('data-new')+'  <a onclick="viewmore(this)" class="view_less">View More</a>';
            $(element).parent().html(data);
        }
    </script>
</body>
</html>
