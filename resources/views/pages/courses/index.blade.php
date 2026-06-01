@extends('layouts.app')

@section('content')
    <style>
        .courses-wrap {
            max-width: 1100px;
            margin: auto;
            padding: 2.5rem 2rem;
        }

        .section-head {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 1.75rem;
        }

        .section-head h2 {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: var(--ink-muted);
            white-space: nowrap;
            margin: 0;
        }

        .section-line {
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 16px;
            background: transparent;
            border: 1px solid transparent;
            border-radius: 14px;
            overflow: hidden;

        }

        .course-card {
            background: var(--paper);
            transition: .25s ease;
            display: flex;
            flex-direction: column;
        }

        .course-card:hover {
            background: var(--paper-warm);
        }

        .course-image {
            height: 180px;
            overflow: hidden;
            background: var(--paper-warm);
        }

        .course-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s ease;
        }

        .course-card:hover img {
            transform: scale(1.05);
        }

        .course-content {
            padding: 18px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .course-label {
            font-size: 11px;
            color: var(--ink-faint);
            letter-spacing: .08em;
            margin-bottom: 8px;
        }

        .course-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: auto;
            line-height: 1.15;
        }

        .course-link {
            margin-top: 20px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: var(--accent);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .08em;
            transition: .2s;
        }

        .course-link:hover {
            gap: 12px;
        }

        @media(max-width:768px) {

            .courses-wrap {
                padding: 2rem 1rem;
            }

            .course-image {
                height: 160px;
            }

            .course-title {
                font-size: 24px;
            }

        }
    </style>

    <section class="courses-wrap">

        <!-- HEADER -->
        <div class="section-head">
            <h2>Courses</h2>
            <div class="section-line"></div>
        </div>

        <!-- GRID -->
        <div class="courses-grid">

            @foreach ($listOfCourses as $course)
                <div class="course-card ">

                    <div class="course-image">
                        @if (!empty($course->image))
                            <img src="{{ $course->image }}" alt="{{ $course->name }}">
                        @else
                            <img src="https://placehold.co/600x400?text={{ urlencode($course->name) }}" alt="{{ $course->name }}">
                        @endif

                    </div>

                    <div class="course-content">

                        <div class="course-label">
                            COURSE
                        </div>

                        <div class="course-title">
                            {{ $course->name }}
                        </div>

                       <a href="{{ route('courses.show', $course->id) }}" class="course-link">
        Learn More →
    </a>

                    </div>

                </div>
            @endforeach

        </div>

    </section>
@endsection
