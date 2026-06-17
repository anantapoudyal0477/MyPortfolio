<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Ananta' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <style>
        :root {
            --ink: #1a1714;
            --ink-muted: #6b6460;
            --ink-faint: #c8c0ba;
            --paper: #faf8f5;
            --paper-warm: #f2ede6;
            --accent: #c9773a;
            --border: rgba(26, 23, 20, 0.10);
        }

        *, *::before, *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        /* ── Progress ── */
        #progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 2px;
            width: 0%;
            background: var(--accent);
            z-index: 9999;
        }

        /* ── NAV ── */
        nav {
            position: sticky;
            top: 0;
            z-index: 100;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            background: rgba(250, 248, 245, 0.92);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border);
        }

        .nav-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 600;
            text-decoration: none;
            color: var(--ink);
        }

        .nav-brand::after {
            content: '.';
            color: var(--accent);
        }

        /* NAV LINKS (DESKTOP) */
        .nav-links {
            display: flex;
            align-items: center;
            height: 56px;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            padding: 0 16px;
            font-size: 11px;
            letter-spacing: 0.10em;
            text-transform: uppercase;
            color: var(--ink-muted);
            text-decoration: none;
            border-left: 1px solid var(--border);
            transition: .2s;
        }

        .nav-links a:hover {
            color: var(--ink);
            background: var(--paper-warm);
        }

        .nav-links a.active {
            color: var(--accent);
        }

        /* ── HAMBURGER ── */
        .nav-toggle {
            display: none;
            flex-direction: column;
            gap: 4px;
            cursor: pointer;
        }

        .nav-toggle span {
            width: 22px;
            height: 2px;
            background: var(--ink);
            transition: 0.3s;
        }

        /* ── MOBILE MENU ── */
        @media (max-width: 768px) {

            nav {
                padding: 0 1.25rem;
            }

            .nav-toggle {
                display: flex;
            }

            .nav-links {
                position: absolute;
                top: 56px;
                left: 0;
                right: 0;
                background: var(--paper);
                flex-direction: column;
                align-items: stretch;
                height: auto;
                border-bottom: 1px solid var(--border);

                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
            }

            .nav-links.open {
                max-height: 300px;
            }

            .nav-links a {
                border-left: none;
                border-top: 1px solid var(--border);
                padding: 14px 18px;
                font-size: 12px;
            }
        }

        /* ── MAIN ── */
        #app {
            min-height: calc(100vh - 56px - 56px);
        }

        /* ── FOOTER ── */
        footer {
            border-top: 1px solid var(--border);
            padding: 1.25rem 2rem;
        }

        .footer-inner {
            max-width: 1100px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-copy {
            font-size: 11px;
            color: var(--ink-faint);
        }

        .footer-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-links a {
            font-size: 11px;
            color: var(--ink-faint);
            text-decoration: none;
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        @media (max-width: 768px) {
            .footer-links {
                display: none;
            }

            footer {
                padding: 1rem 1.25rem;
            }
        }
    </style>
</head>

<body>

<div id="progress"></div>

<nav>

    <a href="{{ route('index') }}" class="nav-brand">Ananta</a>

    <!-- HAMBURGER -->
    <div class="nav-toggle" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="nav-links" id="navLinks">
        <a href="{{ route('index') }}" class="ajax-link @if(Route::is('index')) active @endif">Home</a>
        <a href="{{ route('projects.index') }}" class="ajax-link @if(Route::is('projects.*')) active @endif">Projects</a>
        <a href="{{ route('contact.index') }}" class="ajax-link @if(Route::is('contact.*')) active @endif">Contact</a>
        {{-- <a href="{{ route('courses.index') }}" class="ajax-link @if(Route::is('courses.*')) active @endif">Courses</a> --}}
    </div>

</nav>

<div id="app">
    @yield('content')
</div>

<footer>
    <div class="footer-inner">
        <span class="footer-copy">© {{ date('Y') }} Ananta</span>

        <div class="footer-links">
            <a href="{{ route('index') }}">Home</a>
            <a href="{{ route('projects.index') }}">Projects</a>
            <a href="{{ route('contact.index') }}">Contact</a>
            {{-- <a href="{{ route('courses.index') }}">Courses</a> --}}
        </div>

        <div></div>
    </div>
</footer>

<script>
    function toggleMenu() {
        document.getElementById('navLinks').classList.toggle('open');
    }
</script>

</body>
</html>