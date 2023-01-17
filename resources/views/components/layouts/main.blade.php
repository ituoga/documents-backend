<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>BACK</title>

    {{-- @livewireStyles() --}}
    {{--
    <link rel="stylesheet" href="/images/vendors/simplebar/css/simplebar.css"> --}}
    {{--
    <link rel="stylesheet" href="/images/css/vendors/simplebar.css"> --}}

    {{--

    <link href="/images/css/style.css" rel="stylesheet"> --}}
    <link href="{{ asset('css/app.css?1') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/app.js?2') }}"></script>
    <style>
        .required:after {
            content: '*';
            color: red;
            padding-left: 5px;
        }
    </style>

    {{--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css"> --}}
    {{--
    <link href="/images/css/examples.css" rel="stylesheet"> --}}

    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-118965717-1');
    </script>
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            {{-- <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="/images/assets/brand/coreui.svg#full"></use>
            </svg> --}}
            <h4>BACK</h4>
            <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="/images/assets/brand/coreui.svg#signet"></use>
            </svg>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            {{-- <li class="nav-item"><a class="nav-link" href="index.html">
                    <svg class="nav-icon">
                        <use xlink:href="/images/vendors/@coreui/icons/svg/free.svg#cil-speedometer">
                        </use>
                    </svg> Dashboard</a>
            </li> --}}
            @if (auth()->id())
            <li class="nav-item"><a class="nav-link" href="{{route('files.index')}}">
                    <svg class="nav-icon">
                        <use xlink:href="/images/vendors/@coreui/icons/svg/free.svg#cil-speedometer">
                        </use>
                    </svg>{{__('my_files')}}</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{route('shared_files.index')}}">
                    <svg class="nav-icon">
                        <use xlink:href="/images/vendors/@coreui/icons/svg/free.svg#cil-speedometer">
                        </use>
                    </svg>{{__('shared_files')}}</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{route('users.index')}}">
                    <svg class="nav-icon">
                        <use xlink:href="/images/vendors/@coreui/icons/svg/free.svg#cil-speedometer">
                        </use>
                    </svg>{{__('users')}}</a>
            </li>

            @endif

        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button"
                    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">

                    <i class="fa-solid fa-bars"></i>

                </button><a class="header-brand d-md-none" href="#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="/images/assets/brand/coreui.svg#full"></use>
                    </svg></a>

                <ul class="header-nav ms-auto">

                    <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                            role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md"><img class="avatar-img" src="{{auth()->user()->gravatar}}"
                                    alt=""></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">{{auth()->user()?->name}} {{__('information')}}</div>
                            </div>
                            {{-- <a class="dropdown-item" href="{{route('profile.index')}}">
                                <svg class="icon me-2">
                                    <use xlink:href="/images/vendors/@coreui/icons/svg/free.svg#cil-settings">
                                    </use>
                                </svg> Profilis</a> --}}
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <svg class="icon me-2">
                                    <use xlink:href="/images/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                                    </use>
                                </svg>{{__('logout')}}</a>
                        </div>
                    </li>
                </ul>
            </div>
            {{-- <div class="header-divider"></div>
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0 ms-2">
                        <li class="breadcrumb-item">
                            <a href="{{ route('contracts.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Theme</a>
                        </li>
                        <li class="breadcrumb-item active"><span>Colors</span></li>
                    </ol>
                </nav>
            </div> --}}
        </header>
        <div class="container-fluid">
            {{-- {{ Breadcrumbs::render() }} --}}
        </div>
        <div class="body flex-grow-1 px-3">
            @include('components.layouts.flash-message')
            {{ $slot }}
        </div>
        <footer class="footer">
            <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2021
                creativeLabs.</div>
            <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/bootstrap/ui-components/">CoreUI UI
                    Components</a></div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/plugins/autoloader/prism-autoloader.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/plugins/unescaped-markup/prism-unescaped-markup.min.js">
    </script>
    <script
        src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/plugins/normalize-whitespace/prism-normalize-whitespace.js">
    </script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    {{-- @livewireScripts() --}}
</body>

</html>
