
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta17
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('pageTitle')</title>
    <!-- CSS files -->
    <base href="/">
    <link href="./back/dist/css/tabler.min.css?1674944402" rel="stylesheet"/>
    <link href="./back/dist/css/tabler-flags.min.css?1674944402" rel="stylesheet"/>
    <link href="./back/dist/css/tabler-payments.min.css?1674944402" rel="stylesheet"/>
    <link href="./back/dist/css/tabler-vendors.min.css?1674944402" rel="stylesheet"/>
    @stack('stylesheets')
    @livewireStyles
    <link href="./back/dist/css/demo.min.css?1674944402" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body >
    <script src="./dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page">
      <!-- Navbar -->
      @include('front.pages.header')
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            @yield('content')
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2023
                    <a href="." class="link-secondary">Tabler</a>.
                    All rights reserved.
                  </li>
                  <li class="list-inline-item">
                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                      v1.0.0-beta17
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
      </div>
    </div>
    <!-- Libs JS -->
    <script src="./back/dist/libs/apexcharts/dist/apexcharts.min.js?1674944402" defer></script>
    <script src="./back/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1674944402" defer></script>
    <script src="./back/dist/libs/jsvectormap/dist/maps/world.js?1674944402" defer></script>
    <script src="./back/dist/libs/jsvectormap/dist/maps/world-merc.js?1674944402" defer></script>
    <!-- Tabler Core -->
    <script src="./back/dist/js/tabler.min.js?1674944402" defer></script>
    @stack('scripts')
    @livewireScripts
    <script src="./back/dist/js/demo.min.js?1674944402" defer></script>
  </body>
</html>