<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- SEO --}}
    <title>{{ $metaTitle ?? 'Ananta Poudyal | Laravel Developer' }}</title>

    <meta name="description"
        content="{{ $metaDescription ?? 'Portfolio of Ananta Poudyal, Laravel Developer and MCA student from Kathmandu, Nepal.' }}">

    <meta name="author" content="{{ $metaAuthor ?? 'Ananta Poudyal' }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ $favicon ?? asset('assets/viewer/img/favicon-32x32.png') }}">

    {{-- Apple Touch Icon --}}
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ $appleTouchIcon ?? asset('assets/viewer/img/apple-touch-icon.png') }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">

    <meta property="og:title" content="{{ $ogTitle ?? ($metaTitle ?? 'Ananta Poudyal | Laravel Developer') }}">

    <meta property="og:description"
        content="{{ $ogDescription ?? ($metaDescription ?? 'Portfolio of Ananta Poudyal, Laravel Developer and MCA student from Kathmandu, Nepal.') }}">

    <meta property="og:image" content="{{ $ogImage ?? asset('assets/viewer/img/favicon-32x32.png') }}">

    <meta property="og:url" content="{{ route('home') }}">

    <meta property="og:site_name" content="{{ $ogSiteName ?? 'Ananta Poudyal Portfolio' }}">

    {{-- Twitter / X --}}
    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title"
        content="{{ $twitterTitle ?? ($ogTitle ?? ($metaTitle ?? 'Ananta Poudyal | Laravel Developer')) }}">

    <meta name="twitter:description"
        content="{{ $twitterDescription ?? ($ogDescription ?? ($metaDescription ?? 'Portfolio of Ananta Poudyal, Laravel Developer and MCA student from Kathmandu, Nepal.')) }}">

    <meta name="twitter:image" content="{{ $twitterImage ?? ($ogImage ?? asset('assets/viewer/img/og-image.jpg')) }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    {{-- Main CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/viewer/css/style.css') }}">
</head>


<body>

    <!-- =========================
     Navbar
========================= -->

    <nav class="navbar">

        <div class="container nav-container">

            <a href="#home" class="logo">
                &lt;Ananta<span>/&gt;</span>
            </a>


            <div class="nav-menu" id="nav-menu">

                <ul>

                    <li>
                        <a href="#home" class="nav-link active">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#about" class="nav-link">
                            About
                        </a>
                    </li>

                    <li>
                        <a href="#skills" class="nav-link">
                            Skills
                        </a>
                    </li>

                    <li>
                        <a href="#experience" class="nav-link">
                            Experience
                        </a>
                    </li>

                    <li>
                        <a href="#projects" class="nav-link">
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="#academic-projects" class="nav-link">
                            Academic
                        </a>
                    </li>

                    <li>
                        <a href="#contact" class="nav-link">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>


            <div class="navbar-actions">

                <button class="theme-toggle" id="theme-toggle" type="button" aria-label="Switch to light mode"
                    title="Switch to light mode">

                    <i class="fas fa-sun" id="theme-icon"></i>

                </button>


                <button class="nav-toggle" id="nav-toggle" type="button" aria-label="Open navigation">

                    <i class="fas fa-bars"></i>

                </button>

            </div>

        </div>

    </nav>


    <main>


        <!-- =========================
     Hero
========================= -->
<section class="hero" id="home">
    <div class="container">

        <span class="badge">
            <i class="{{ $hero['badge']['icon'] }}"></i>
            {{ $hero['badge']['text'] }}
        </span>

        <h1>
            {{ $hero['greeting'] }}
            <span class="highlight">{{ $hero['name'] }}</span>
        </h1>

        <h2>
            {{ $hero['subtitle'] }}
        </h2>

        <p>
            {{ $hero['description'] }}
        </p>

        <div class="hero-buttons">
            @foreach ($hero['buttons'] as $button)
                <a href="{{ $button['url'] }}" class="btn {{ $button['class'] }}">
                    <i class="{{ $button['icon'] }}"></i>
                    {{ $button['text'] }}
                </a>
            @endforeach
        </div>

        <div class="hero-contact-info">
            @foreach ($hero['contact'] as $item)
                <span>
                    <i class="{{ $item['icon'] }}"></i>
                    {{ $item['text'] }}
                </span>
            @endforeach
        </div>

    </div>
</section>
        <!-- =========================
     About
========================= -->
<section class="section" id="about">
    <div class="container">

        <h2 class="section-title">
            About Me
        </h2>

        <div class="about-grid">

            @foreach ($about as $item)
                <div class="about-card">

                    <div class="card-icon">
                        <i class="{{ $item['icon'] }}"></i>
                    </div>

                    <h3>
                        {{ $item['title'] }}
                    </h3>

                    <p>
                        {{ $item['description'] }}
                    </p>

                </div>
            @endforeach

        </div>

    </div>
</section>
        <!-- =========================
     Skills
========================= -->

        <section class="section" id="skills">

            <div class="container">

                <h2 class="section-title">
                    Technical Skills
                </h2>


                <div class="skills-grid">

                    @foreach ($skills as $skill)
                        <div class="skill-category">

                            <div class="card-icon">
                                <i class="{{ $skill['icon'] }}"></i>
                            </div>

                            <h3>
                                {{ $skill['title'] }}
                            </h3>

                            <div class="skill-tags">
                                @foreach ($skill['skills'] as $item)
                                    <span>{{ $item }}</span>
                                @endforeach
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>

        </section>


        <!-- =========================
     Experience temp
========================= -->

        <section class="section" id="experience">

            <div class="container">

                <h2 class="section-title">
                    Experience
                </h2>


                <div class="timeline">

                    @foreach ($experience as $item)
                        <div class="timeline-item">

                            <div class="timeline-dot"></div>

                            <div class="timeline-date">
                                {{ $item['date'] }}
                            </div>

                            <h3>
                                {{ $item['position'] }}
                            </h3>

                            <h4>
                                {{ $item['company'] }} · {{ $item['location'] }}
                            </h4>

                            <ul>
                                @foreach ($item['responsibilities'] as $responsibility)
                                    <li>
                                        {{ $responsibility }}
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    @endforeach

                </div>
            </div>

        </section>


        <!-- =========================
     Professional Projects
========================= -->

        <section class="section" id="projects">

            <div class="container">

                <h2 class="section-title">
                    Professional Projects
                </h2>


                <div class="swiper project-slider">

                    <div class="swiper-wrapper">

                        @foreach ($projects as $project)
                            <div class="swiper-slide">
                                <div class="project-card">

                                    <span class="project-badge">
                                        {{ $project['badge'] }}
                                    </span>

                                    <h3>
                                        {{ $project['title'] }}
                                    </h3>

                                    <p class="project-desc">
                                        {{ $project['description'] }}
                                    </p>

                                    <div class="project-tech">
                                        @foreach ($project['technologies'] as $technology)
                                            <span>{{ $technology }}</span>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>


                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-prev"></div>

                    <div class="swiper-button-next"></div>

                </div>

            </div>

        </section>

        <!-- =========================
     Academic Projects
========================= -->

        <section class="section" id="academic-projects">

            <div class="container">

                <h2 class="section-title">
                    Academic Projects
                </h2>


                <div class="swiper project-slider academic-project-slider">

                    <div class="swiper-wrapper">

                        @foreach ($academicProjects as $project)
                            <div class="swiper-slide">
                                <div class="project-card">

                                    <span class="project-badge">
                                        {{ $project['badge'] }}
                                    </span>

                                    <h3>
                                        {{ $project['title'] }}
                                    </h3>

                                    <p class="project-desc">
                                        {{ $project['description'] }}
                                    </p>

                                    <div class="project-tech">
                                        @foreach ($project['technologies'] as $technology)
                                            <span>{{ $technology }}</span>
                                        @endforeach
                                    </div>

                                    @if (!empty($project['extra']))
                                        <div class="project-desc">
                                            <strong>{{ $project['extra_label'] }}:</strong>
                                            {{ $project['extra'] }}
                                        </div>
                                    @endif

                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-prev"></div>

                    <div class="swiper-button-next"></div>

                </div>

            </div>

        </section>
        <!-- =========================
     Education
========================= -->

        <section class="section" id="education">

            <div class="container">

                <h2 class="section-title">
                    Education
                </h2>


                <div class="timeline">

                    @foreach ($education as $item)
                        <div class="timeline-item">

                            <div class="timeline-dot"></div>

                            <div class="timeline-date">
                                {{ $item['date'] }}
                            </div>

                            <h3>
                                {{ $item['degree'] }}
                            </h3>

                            <h4>
                                {{ $item['institution'] }} · {{ $item['location'] }}
                            </h4>

                            <ul>
                                @foreach ($item['details'] as $detail)
                                    <li>
                                        {{ $detail }}
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    @endforeach

                </div>
            </div>

        </section>


        <!-- =========================
     Contact
========================= -->
        <div></div>
     <section class="section" id="contact">
    <div class="container">
        <h2 class="section-title">
            Contact Me
        </h2>

        <div class="about-grid">

            <!-- Email -->
            <div class="about-card">
                <div class="card-icon">
                    <i class="fas fa-envelope"></i>
                </div>

                <h3>Email</h3>

                <p>
                    Have a project, opportunity or collaboration in mind? Feel free to get in touch.
                </p>

                <div class="contact-details">
                    <a href="mailto:anantapoudyal0477@gmail.com">
                        anantapoudyal0477@gmail.com
                    </a>
                </div>
            </div>

            
            <!-- Resume / CV -->
            <div class="about-card">
                <div class="card-icon">
                    <i class="fas fa-file-alt"></i>
                </div>

                <h3>Resume / CV</h3>

                <p>
                    Interested in my experience and skills? You can view or download my resume.
                </p>

                <div class="contact-details">
                    <a href="{{ Storage::url('resume/Ananta_Poudyal_Resume.pdf') }}"
                       target="_blank"
                       rel="noopener noreferrer">
                        View Resume <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
    </main>


    <!-- =========================
     Footer
========================= -->

    <footer>

        <div class="container">

            <p>
                &copy; 2026 Ananta Poudyal. Built with Laravel, PHP and lots of coffee.
            </p>

        </div>

    </footer>


    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <!-- Swiper -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <!-- Main JS -->

    <script src="{{ asset('assets/viewer/js/main.js') }}"></script>

</body>

</html>
