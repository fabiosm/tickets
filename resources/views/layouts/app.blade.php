<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
        <!-- Twitter meta-->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:site" content="@pratikborsadiya">
        <meta property="twitter:creator" content="@pratikborsadiya">
        <!-- Open Graph Meta-->
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Vali Admin">
        <meta property="og:title" content="Vali - Free Bootstrap 5 admin theme">
        <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
        <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
        <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        @livewireStyles
        @stack('styles')
    </head>
    <body class="app sidebar-mini">
        <!-- TOAST USADO PARA ALERTAS -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="livewire-toast" class="toast align-items-center text-white bg-success border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body" id="livewire-toast-message"></div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>

        <livewire:layout.navigation />
        <main class="app-content">
            <livewire:layout.breadcrumbs />
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </main>
        <!-- Essential javascripts for application to work-->
        <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <!-- Page specific javascripts-->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
        @livewireScripts
        @stack('scripts')
        <script>
            window.addEventListener('showToast', event => {
                console.log(event)
                const message = event.detail[0].message || 'Ação realizada com sucesso!';
                document.getElementById('livewire-toast-message').textContent = message;
                const toastEl = document.getElementById('livewire-toast');
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            });
        </script>
    </body>
</html>
