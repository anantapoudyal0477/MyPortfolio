@extends('layouts.app')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=DM+Sans:wght@300;400;500&display=swap');

        :root {
            --ink: #1a1714;
            --ink-muted: #6b6460;
            --ink-faint: #c8c0ba;
            --paper: #faf8f5;
            --paper-warm: #f2ede6;
            --accent: #c9773a;
            --accent-light: #f0e0cf;
            --border: rgba(26, 23, 20, 0.10);
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: var(--paper);
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
        }
    </style>

    <!-- Hero Section -->
    <section style="
      padding: 4rem 2rem 3rem;
      border-bottom: 1px solid var(--border);
      position: relative;
      overflow: hidden;
      max-width: 1100px;
      margin: 0 auto;
    ">
        <!-- Decorative background letter -->
        <span style="
        font-family: 'Cormorant Garamond', serif;
        font-size: 240px;
        font-weight: 300;
        color: var(--paper-warm);
        position: absolute;
        right: 2rem;
        top: -20px;
        line-height: 1;
        pointer-events: none;
        user-select: none;
      ">A</span>

        <span style="
        display: inline-block;
        font-size: 11px;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--accent);
        background: var(--accent-light);
        border: 1px solid var(--accent-light);
        padding: 4px 12px;
        border-radius: 20px;
        margin-bottom: 1rem;
        font-weight: 500;
        position: relative;
      ">Portfolio</span>

        <h1 style="
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(52px, 8vw, 80px);
        font-weight: 300;
        line-height: 1.05;
        letter-spacing: -0.02em;
        color: var(--ink);
        position: relative;
      ">
            Ananta</h1>

        <p style="
        font-size: 15px;
        color: var(--ink-muted);
        margin-top: 0.75rem;
        font-weight: 300;
        position: relative;
      ">
            Welcome to my portfolio — a collection of crafted work.</p>
    </section>

    <!-- Projects Section -->
    <section style="padding: 2.5rem 2rem 3rem; max-width: 1100px; margin: 0 auto;">

        <!-- Section label -->
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 1.75rem;">
            <h2 style="
          font-size: 11px;
          font-weight: 500;
          letter-spacing: 0.14em;
          text-transform: uppercase;
          color: var(--ink-muted);
          white-space: nowrap;
        ">
                Featured Projects</h2>
            <div style="flex: 1; height: 1px; background: var(--border);"></div>
        </div>

        <!-- Grid wrapper with hairline borders between cells -->
        <div style="
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1px;
        background: var(--border);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
      ">

            @foreach ($listOfProjects as $index => $project)
                    <a href="/projects/{{ $project['id'] }}" style="
                  background: var(--paper);
                  display: block;
                  text-decoration: none;
                  color: inherit;
                  transition: background 0.2s ease;
                " onmouseover="this.style.background='var(--paper-warm)'" onmouseout="this.style.background='var(--paper)'">

                        <!-- Image -->

                        <div style="width: 100%; height: 160px; background: var(--paper-warm); overflow: hidden;">
                           
                            @if (!empty($project['image_url'][0]))
                                <img src="{{ $project['image_url'][0] }}" alt="{{ $project['title'] }}"
                                    style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s cubic-bezier(0.25,0.46,0.45,0.94);"
                                    onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
                            @else
                                        <div style="
                                    width: 100%; height: 100%;
                                    display: flex; align-items: center; justify-content: center;
                                    font-family: 'Cormorant Garamond', serif;
                                    font-size: 48px; font-weight: 300;
                                    color: var(--ink-faint);
                                  ">
                                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div style="padding: 14px 18px 18px;">
                            <div style="font-size: 11px; color: var(--ink-faint); letter-spacing: 0.05em; margin-bottom: 6px;">
                                {{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}
                            </div>
                            <h3 style="
                      font-family: 'Cormorant Garamond', serif;
                      font-size: 20px;
                      font-weight: 600;
                      line-height: 1.2;
                      color: var(--ink);
                      margin-bottom: 6px;
                    ">
                                {{ $project['title'] }}
                            </h3>
                            <p style="font-size: 12px; color: var(--ink-muted); line-height: 1.6; font-weight: 300;">
                                {{ $project['short_description'] }}
                            </p>
                            <span style="
                      display: inline-block;
                      margin-top: 12px;
                      font-size: 11px;
                      color: var(--accent);
                      letter-spacing: 0.08em;
                      text-transform: uppercase;
                      font-weight: 500;
                    ">View
                                →</span>
                        </div>

                    </a>
            @endforeach

        </div>
    </section>
<!-- Education Section -->
<section style="padding: 2.5rem 2rem 3rem; max-width: 1100px; margin: 0 auto;">

    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 1.75rem;">
        <h2 style="
          font-size: 11px;
          font-weight: 500;
          letter-spacing: 0.14em;
          text-transform: uppercase;
          color: var(--ink-muted);
          white-space: nowrap;
        ">
            Education
        </h2>
        <div style="flex: 1; height: 1px; background: var(--border);"></div>
    </div>

    <div style="display: grid; gap: 12px;">

        @foreach ($education as $edu)
            <div style="
                padding: 16px 18px;
                border: 1px solid var(--border);
                border-radius: 10px;
                background: var(--paper);
            ">

                <div style="font-size: 11px; color: var(--ink-faint); letter-spacing: 0.08em;">
                    {{ $edu['start_year'] ?? '—' }} - {{ $edu['end_year'] ?? 'Present' }}
                </div>

                <h3 style="
                    font-family: 'Cormorant Garamond', serif;
                    font-size: 20px;
                    font-weight: 600;
                    margin: 6px 0;
                ">
                    {{ $edu['degree'] }}
                </h3>

                <div style="font-size: 13px; color: var(--ink-muted);">
                    {{ $edu['institution'] }} · {{ $edu['affiliation'] }}
                </div>

                <div style="font-size: 12px; margin-top: 6px; color: var(--ink-faint);">
                    {{ $edu['field_of_study'] }}
                </div>

            </div>
        @endforeach

    </div>
</section>
<!-- Experience Section -->
<section style="padding: 2.5rem 2rem 3rem; max-width: 1100px; margin: 0 auto;">

    <!-- Section label -->
    <div style="display:flex; align-items:center; gap:12px; margin-bottom:1.75rem;">
        <h2 style="
            font-size:11px;
            font-weight:500;
            letter-spacing:0.14em;
            text-transform:uppercase;
            color:var(--ink-muted);
            white-space:nowrap;
        ">
            Experience
        </h2>

        <div style="flex:1; height:1px; background:var(--border);"></div>
    </div>


    <div style="
        display:grid;
        gap:1px;
        background:var(--border);
        border:1px solid var(--border);
        border-radius:12px;
        overflow:hidden;
    ">

        @foreach($experience as $item)

            <div style="
                background:var(--paper);
                padding:20px;
                transition:background .2s ease;
            "
            onmouseover="this.style.background='var(--paper-warm)'"
            onmouseout="this.style.background='var(--paper)'">

                <div style="
                    display:flex;
                    justify-content:space-between;
                    align-items:flex-start;
                    gap:20px;
                    margin-bottom:12px;
                    flex-wrap:wrap;
                ">

                    <div>

                        <div style="
                            font-size:11px;
                            color:var(--ink-faint);
                            letter-spacing:.08em;
                            margin-bottom:6px;
                        ">
                            {{ \Carbon\Carbon::parse($item['start_date'])->format('M Y') }}
                            —
                            {{ \Carbon\Carbon::parse($item['end_date'])->format('M Y') }}
                        </div>

                        <h3 style="
                            font-family:'Cormorant Garamond', serif;
                            font-size:24px;
                            font-weight:600;
                            line-height:1.2;
                            margin-bottom:4px;
                            color:var(--ink);
                        ">
                            {{ $item['company_name'] }}
                        </h3>

                        <div style="
                            font-size:13px;
                            color:var(--accent);
                            letter-spacing:.08em;
                            text-transform:uppercase;
                        ">
                            {{ ucfirst($item['position']) }}
                        </div>

                    </div>

                </div>


                <p style="
                    font-size:13px;
                    line-height:1.8;
                    color:var(--ink-muted);
                    font-weight:300;
                    margin:0;
                ">
                    {{ $item['description'] }}
                </p>

            </div>

        @endforeach

    </div>

</section>
@endsection