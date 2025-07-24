<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <title>@yield('title', 'Tableau de bord Enseignant')</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Alpine.js -->
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

  {{-- Styles poussés depuis les vues --}}
  @stack('styles')
</head>
<body class="bg-gray-100 font-sans antialiased">
  @include('Enseignant.partials.nav')

  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    @yield('content')
  </main>

  {{-- Scripts poussés depuis les vues --}}
  @stack('scripts')
</body>
</html>
