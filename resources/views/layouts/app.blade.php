<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Portfolio') | Ananta Poudyal
    </title>

    <meta
        name="description"
        content="@yield('description', 'Laravel Developer Portfolio')"
    >

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet"
    >

    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --dark: #0f172a;
            --dark-soft: #1e293b;
            --text: #334155;
            --muted: #64748b;
            --light: #f8fafc;
            --border: #e2e8f0;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background: var(--white);
            line-height: 1.7;
        }

        a {
            text-decoration: none;
        }

        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            padding: 18px 0;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.7);
        }

        .navbar-brand {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--dark);
        }

        .navbar-brand span {
            color: var(--primary);
        }

        .nav-link {
            color: var(--text) !important;
            font-weight: 500;
            margin: 0 8px;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }

        .navbar .btn-contact {
            background: var(--dark);
            color: white;
            padding: 9px 18px;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.3s;
        }

        .navbar .btn-contact:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 90vh;
            display: flex;
            align-items: center;
            background:
                radial-gradient(
                    circle at 85% 20%,
                    rgba(99, 102, 241, 0.12),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 10% 80%,
                    rgba(14, 165, 233, 0.08),
                    transparent 30%
                ),
                var(--white);
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 13px;
            border-radius: 50px;
            background: #eef2ff;
            color: var(--primary-dark);
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .hero-label .dot {
            width: 8px;
            height: 8px;
            background: #22c55e;
            border-radius: 50%;
        }

        .hero h1 {
            font-size: clamp(2.8rem, 6vw, 5rem);
            line-height: 1.05;
            font-weight: 800;
            color: var(--dark);
            letter-spacing: -2px;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero-description {
            max-width: 620px;
            font-size: 1.1rem;
            color: var(--muted);
            margin: 25px 0 30px;
        }

        .hero-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-primary-custom {
            background: var(--primary);
            border: none;
            color: white;
            padding: 12px 23px;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }

        .btn-outline-custom {
            border: 1px solid var(--border);
            color: var(--dark);
            padding: 12px 23px;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-outline-custom:hover {
            border-color: var(--dark);
            background: var(--dark);
            color: white;
        }

        /* Code Window */

        .code-window {
            background: #0f172a;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(15, 23, 42, 0.2);
        }

        .code-header {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 13px 16px;
            background: #1e293b;
        }

        .code-dot {
            width: 11px;
            height: 11px;
            border-radius: 50%;
            background: #64748b;
        }

        .code-content {
            padding: 25px;
            color: #cbd5e1;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            line-height: 2;
        }

        .code-keyword {
            color: #c084fc;
        }

        .code-function {
            color: #60a5fa;
        }

        .code-string {
            color: #86efac;
        }

        .code-comment {
            color: #64748b;
        }

        /* =========================
           SECTIONS
        ========================= */

        .section {
            padding: 100px 0;
        }

        .section-light {
            background: var(--light);
        }

        .section-heading {
            margin-bottom: 55px;
        }

        .section-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.8rem;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: var(--dark);
            letter-spacing: -1px;
        }

        .section-description {
            max-width: 650px;
            color: var(--muted);
        }

        /* =========================
           CARDS
        ========================= */

        .portfolio-card {
            height: 100%;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            padding: 25px;
            transition: 0.3s;
        }

        .portfolio-card:hover {
            transform: translateY(-6px);
            border-color: rgba(99, 102, 241, 0.4);
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.08);
        }

        .icon-box {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #eef2ff;
            color: var(--primary);
            font-size: 1.3rem;
            margin-bottom: 18px;
        }

        .portfolio-card h4 {
            font-weight: 700;
            color: var(--dark);
        }

        .portfolio-card p {
            color: var(--muted);
            margin-bottom: 0;
        }

        /* =========================
           TIMELINE
        ========================= */

        .timeline {
            position: relative;
            border-left: 2px solid var(--border);
            padding-left: 30px;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 40px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            width: 12px;
            height: 12px;
            background: var(--primary);
            border: 3px solid white;
            border-radius: 50%;
            left: -37px;
            top: 6px;
            box-shadow: 0 0 0 2px var(--primary);
        }

        .timeline-date {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.8rem;
            color: var(--primary);
            font-weight: 600;
        }

        .timeline h4 {
            color: var(--dark);
            font-weight: 700;
            margin: 5px 0;
        }

        .timeline p {
            color: var(--muted);
        }

        /* =========================
           SKILLS
        ========================= */

        .skill {
            margin-bottom: 22px;
        }

        .skill-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .skill-header span:last-child {
            color: var(--muted);
            font-size: 0.85rem;
        }

        .progress {
            height: 7px;
            background: #e2e8f0;
            border-radius: 50px;
        }

        .progress-bar {
            background: var(--primary);
            border-radius: 50px;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background: var(--dark);
            color: #cbd5e1;
            padding: 70px 0 25px;
        }

        footer h5 {
            color: white;
            font-weight: 700;
        }

        footer p {
            color: #94a3b8;
        }

        .social-links {
            display: flex;
            gap: 10px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #334155;
            border-radius: 8px;
            color: #cbd5e1;
            transition: 0.3s;
        }

        .social-links a:hover {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid #1e293b;
            margin-top: 50px;
            padding-top: 20px;
            color: #64748b;
            font-size: 0.9rem;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 991px) {

            .navbar-collapse {
                padding-top: 20px;
            }

            .hero {
                padding: 100px 0;
            }

            .code-window {
                margin-top: 50px;
            }
        }

        @media (max-width: 576px) {

            .section {
                padding: 70px 0;
            }

            .hero h1 {
                letter-spacing: -1px;
            }

            .hero-description {
                font-size: 1rem;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- =========================
         NAVBAR
    ========================== -->

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                Ananta<span>.</span>
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#about">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#skills">
                            Skills
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#projects">
                            Projects
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#experience">
                            Experience
                        </a>
                    </li>

                </ul>

                <a
                    href="{{ url('/') }}#contact"
                    class="btn-contact"
                >
                    Let's Talk
                </a>

            </div>
        </div>
    </nav>


    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main>
        @yield('content')
    </main>


    <!-- =========================
         FOOTER
    ========================== -->

    <footer>

        <div class="container">

            <div class="row g-5">

                <div class="col-lg-5">

                    <h5 class="mb-3">
                        Ananta<span class="text-primary">.</span>
                    </h5>

                    <p>
                        Entry-level Laravel Developer passionate about
                        building clean, scalable and user-friendly web
                        applications.
                    </p>

                    <div class="social-links mt-4">

                        <a href="#" aria-label="GitHub">
                            <i class="bi bi-github"></i>
                        </a>

                        <a href="#" aria-label="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>

                        <a href="#" aria-label="Email">
                            <i class="bi bi-envelope"></i>
                        </a>

                    </div>

                </div>


                <div class="col-lg-2 col-md-4">

                    <h5 class="mb-3">
                        Navigation
                    </h5>

                    <p class="mb-2">
                        <a
                            href="{{ url('/') }}"
                            class="text-secondary"
                        >
                            Home
                        </a>
                    </p>

                    <p class="mb-2">
                        <a
                            href="{{ url('/') }}#about"
                            class="text-secondary"
                        >
                            About
                        </a>
                    </p>

                    <p class="mb-2">
                        <a
                            href="{{ url('/') }}#projects"
                            class="text-secondary"
                        >
                            Projects
                        </a>
                    </p>

                    <p class="mb-2">
                        <a
                            href="{{ url('/') }}#contact"
                            class="text-secondary"
                        >
                            Contact
                        </a>
                    </p>

                </div>


                <div class="col-lg-5 col-md-8">

                    <h5 class="mb-3">
                        Let's Build Something
                    </h5>

                    <p>
                        I'm always interested in learning new technologies,
                        working on interesting projects and growing as a
                        developer.
                    </p>

                    <a
                        href="mailto:anantapoudyal24@gmail.com"
                        class="btn btn-primary-custom mt-2"
                    >
                        <i class="bi bi-envelope me-2"></i>
                        Contact Me
                    </a>

                </div>

            </div>


            <div class="footer-bottom text-center">

                <p class="mb-0">
                    &copy; {{ date('Y') }} Ananta Poudyal.
                    Built with Laravel & ❤️
                </p>

            </div>

        </div>

    </footer>


    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    @stack('scripts')

</body>
</html>