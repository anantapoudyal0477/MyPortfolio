@extends('layouts.app')

@section('title', $pageTitle)

@section('description', $description)

@section('content')

    {{-- Hero --}}
    <section class="hero" id="home">
        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-7">

                    <div class="hero-label">
                        <span class="dot"></span>
                        Available for opportunities
                    </div>

                    <h1>
                        Hi, I'm Ananta.
                        <br>
                        I build <span>Laravel</span> applications.
                    </h1>

                    <p class="hero-description">
                        Entry-level Laravel Developer focused on building
                        clean, maintainable and practical web applications
                        using Laravel, PHP, MySQL and modern frontend
                        technologies.
                    </p>

                    <div class="hero-buttons">

                        <a
                            href="#projects"
                            class="btn-primary-custom"
                        >
                            View My Work
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>

                        <a
                            href="#contact"
                            class="btn-outline-custom"
                        >
                            Contact Me
                        </a>

                    </div>

                </div>


                <div class="col-lg-5">

                    <div class="code-window">

                        <div class="code-header">

                            <span class="code-dot"></span>
                            <span class="code-dot"></span>
                            <span class="code-dot"></span>

                        </div>

                        <div class="code-content">

                            <div>
                                <span class="code-keyword">class</span>
                                Developer
                            </div>

                            <div class="ps-3">
                                {
                            </div>

                            <div class="ps-4">
                                <span class="code-keyword">public</span>
                                $name =
                                <span class="code-string">
                                    "Ananta"
                                </span>;
                            </div>

                            <div class="ps-4">
                                <span class="code-keyword">public</span>
                                $role =
                                <span class="code-string">
                                    "Laravel Developer"
                                </span>;
                            </div>

                            <div class="ps-4">
                                <span class="code-keyword">public</span>
                                $passion =
                                <span class="code-string">
                                    "Building"
                                </span>;
                            </div>

                            <div class="ps-3">
                                }
                            </div>

                            <br>

                            <div>
                                <span class="code-comment">
                                    // Let's build something great.
                                </span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- About --}}
    <section class="section" id="about">

        <div class="container">

            <div class="section-heading">

                <div class="section-label">
                    01. ABOUT ME
                </div>

                <h2 class="section-title">
                    A developer who loves solving problems.
                </h2>

            </div>

            <div class="row g-5">

                <div class="col-lg-7">

                    <p class="lead">
                        I'm an entry-level developer with a strong interest
                        in backend development and web application development.
                    </p>

                    <p>
                        My main focus is Laravel and PHP. I enjoy working
                        with databases, building CRUD systems, designing
                        RESTful applications and turning ideas into
                        functional web applications.
                    </p>

                    <p>
                        I'm continuously improving my programming skills by
                        working on real-world projects and learning modern
                        development practices.
                    </p>

                </div>

                <div class="col-lg-5">

                    <div class="portfolio-card">

                        <div class="icon-box">
                            <i class="bi bi-code-slash"></i>
                        </div>

                        <h4>My Development Approach</h4>

                        <p>
                            Write simple code, understand the problem,
                            build practical solutions and keep learning.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- Skills --}}
    <section class="section section-light" id="skills">

        <div class="container">

            <div class="section-heading">

                <div class="section-label">
                    02. SKILLS
                </div>

                <h2 class="section-title">
                    Technologies I work with.
                </h2>

            </div>

            <div class="row g-5">

                <div class="col-lg-6">

                    <div class="skill">

                        <div class="skill-header">
                            <span>PHP / Laravel</span>
                            <span>Intermediate</span>
                        </div>

                        <div class="progress">
                            <div
                                class="progress-bar"
                                style="width: 70%"
                            ></div>
                        </div>

                    </div>


                    <div class="skill">

                        <div class="skill-header">
                            <span>MySQL</span>
                            <span>Intermediate</span>
                        </div>

                        <div class="progress">
                            <div
                                class="progress-bar"
                                style="width: 70%"
                            ></div>
                        </div>

                    </div>


                    <div class="skill">

                        <div class="skill-header">
                            <span>JavaScript</span>
                            <span>Intermediate</span>
                        </div>

                        <div class="progress">
                            <div
                                class="progress-bar"
                                style="width: 60%"
                            ></div>
                        </div>

                    </div>

                </div>


                <div class="col-lg-6">

                    <div class="skill">

                        <div class="skill-header">
                            <span>HTML / CSS</span>
                            <span>Intermediate</span>
                        </div>

                        <div class="progress">
                            <div
                                class="progress-bar"
                                style="width: 75%"
                            ></div>
                        </div>

                    </div>


                    <div class="skill">

                        <div class="skill-header">
                            <span>Bootstrap</span>
                            <span>Intermediate</span>
                        </div>

                        <div class="progress">
                            <div
                                class="progress-bar"
                                style="width: 70%"
                            ></div>
                        </div>

                    </div>


                    <div class="skill">

                        <div class="skill-header">
                            <span>Git / GitHub</span>
                            <span>Basic</span>
                        </div>

                        <div class="progress">
                            <div
                                class="progress-bar"
                                style="width: 55%"
                            ></div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- Projects --}}
    <section class="section" id="projects">

        <div class="container">

            <div class="section-heading">

                <div class="section-label">
                    03. PROJECTS
                </div>

                <h2 class="section-title">
                    Things I've built.
                </h2>

                <p class="section-description mt-3">
                    A few projects that demonstrate my experience with
                    backend development, databases and web application
                    development.
                </p>

            </div>


            <div class="row g-4">

                @forelse($listOfProjects as $project)

                    <div class="col-lg-4 col-md-6">

                        <div class="portfolio-card">

                            <div class="icon-box">
                                <i class="bi bi-folder2-open"></i>
                            </div>

                            <h4>
                                {{ $project->title }}
                            </h4>

                            <p class="mb-3">
                                {{ $project->short_description }}
                            </p>

                            <a
                                href="{{ url('/projects/' . $project->slug) }}"
                                class="font-mono"
                            >
                                View Project
                                <i class="bi bi-arrow-up-right"></i>
                            </a>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="portfolio-card text-center">

                            <p>
                                No projects available yet.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>


    {{-- Experience --}}
    <section
        class="section section-light"
        id="experience"
    >

        <div class="container">

            <div class="section-heading">

                <div class="section-label">
                    04. EXPERIENCE
                </div>

                <h2 class="section-title">
                    My journey so far.
                </h2>

            </div>


            <div class="timeline">

                @forelse($experience as $item)

                    <div class="timeline-item">

                        <div class="timeline-date">

                            {{ \Carbon\Carbon::parse($item->start_date)->format('M Y') }}

                            -

                            @if($item->end_date)
                                {{ \Carbon\Carbon::parse($item->end_date)->format('M Y') }}
                            @else
                                Present
                            @endif

                        </div>

                        <h4>
                            {{ $item->position }}
                        </h4>

                        <p class="mb-2">
                            {{ $item->company_name }}
                        </p>

                        <p>
                            {{ $item->description }}
                        </p>

                    </div>

                @empty

                    <p>
                        No experience added yet.
                    </p>

                @endforelse

            </div>

        </div>

    </section>


    {{-- Education --}}
    <section class="section" id="education">

        <div class="container">

            <div class="section-heading">

                <div class="section-label">
                    05. EDUCATION
                </div>

                <h2 class="section-title">
                    My education.
                </h2>

            </div>


            <div class="row g-4">

                @forelse($education as $item)

                    <div class="col-lg-4">

                        <div class="portfolio-card">

                            <div class="icon-box">
                                <i class="bi bi-mortarboard"></i>
                            </div>

                            <h4>
                                {{ $item->degree }}
                            </h4>

                            <p>
                                {{ $item->field_of_study }}
                            </p>

                            <p class="mt-2">
                                <strong>
                                    {{ $item->institution }}
                                </strong>
                            </p>

                            <small class="text-muted">

                                {{ $item->start_year }}

                                -

                                {{ $item->end_year ?? 'Present' }}

                            </small>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <p>
                            No education information available.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </section>


    {{-- Contact --}}
    <section
        class="section section-light"
        id="contact"
    >

        <div class="container">

            <div class="row justify-content-center text-center">

                <div class="col-lg-8">

                    <div class="section-label">
                        06. CONTACT
                    </div>

                    <h2 class="section-title">
                        Let's work together.
                    </h2>

                    <p class="section-description mx-auto mt-3">
                        Have a project, opportunity or just want to talk
                        about development? Feel free to get in touch.
                    </p>

                    <a
                        href="mailto:anantapoudyal24@gmail.com"
                        class="btn-primary-custom d-inline-block mt-3"
                    >
                        <i class="bi bi-envelope me-2"></i>
                        Get In Touch
                    </a>

                </div>

            </div>

        </div>

    </section>

@endsection