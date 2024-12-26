<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Portfolio')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Portfolio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link public-nav" href="{{ route('home') }}">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link public-nav" href="{{ route('about') }}">Hakkımda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link public-nav" href="{{ route('portfolio') }}">Portfolyo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link public-nav" href="{{ route('contact') }}">İletişim</a>
                </li>
            </ul>

            @auth
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Panel</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Çıkış Yap</button>
                        </form>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>

<main class="container py-4" id="content">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

@guest
    <script>
        function loadContent(page) {
            fetch(`/${page}`)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const content = doc.querySelector('#content').innerHTML;
                    document.querySelector('#content').innerHTML = content;
                    history.pushState({}, '', `/${page}`);
                });
        }

        document.querySelectorAll('.nav-link.public-nav').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const page = this.getAttribute('href').replace(/^.*\/\/[^\/]+/, '').replace('/', '');
                loadContent(page);
            });
        });

        window.addEventListener('popstate', function() {
            const page = window.location.pathname.replace('/', '');
            if (page) loadContent(page);
        });
    </script>
@endguest
</body>
</html>
