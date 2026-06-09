@extends('layouts.app')

@section('content')
<style>
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 1px;
        background: var(--border);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
    }

    .project-card {
        background: var(--paper);
        cursor: pointer;
        transition: .25s ease;
    }

    .project-card:hover {
        background: var(--paper-warm);
    }

    .project-image {
        width: 100%;
        height: 180px;
        overflow: hidden;
        background: var(--paper-warm);
    }

    .project-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .4s ease;
    }

    .project-card:hover img {
        transform: scale(1.04);
    }

    .project-content {
        padding: 16px;
    }

    .project-number {
        font-size: 11px;
        color: var(--ink-faint);
        margin-bottom: 6px;
        letter-spacing: .08em;
    }

    .project-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .project-description {
        color: var(--ink-muted);
        font-size: 13px;
        line-height: 1.7;
    }

    dialog {
        width: min(900px, 95%);
        border: none;
        border-radius: 16px;
        padding: 0;
        background: var(--paper);

        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    dialog[open] {
        display: block;
    }

    dialog::backdrop {
        background: rgba(0, 0, 0, .65);
        backdrop-filter: blur(4px);
    }

    .modal-content {
        padding: 30px;
    }

    .modal-close {
        position: absolute;
        right: 20px;
        top: 20px;
        border: none;
        background: none;
        cursor: pointer;
        font-size: 22px;
        color: var(--ink-muted);
    }

    .pagination {
        display: flex;
        gap: 6px;
        padding: 0;
        list-style: none;
        justify-content: center;
    }

    .pagination li a,
    .pagination li span {
        padding: 6px 10px;
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--ink-muted);
        text-decoration: none;
        display: inline-block;
    }

    .pagination li.active span {
        background: var(--paper-warm);
        color: var(--ink);
    }
</style>

<section style="padding:2.5rem 2rem;max-width:1100px;margin:auto;">

    <!-- HEADER -->
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:1.75rem;">
        <h2 style="font-size:11px;font-weight:500;letter-spacing:.14em;text-transform:uppercase;color:var(--ink-muted);white-space:nowrap;">
            Projects
        </h2>
        <div style="flex:1;height:1px;background:var(--border);"></div>
    </div>

    <!-- GRID -->
    <div class="projects-grid">

        @foreach ($projects as $project)
            <div class="project-card"
                onclick="document.getElementById('project{{ $project->id }}').showModal()">

                <div class="project-image">
                    @if (!empty($project->image_url[0]))
                        <img src="{{ $project->image_url[0] }}">
                    @endif
                </div>

                <div class="project-content">

                    <div class="project-number">
                        {{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}
                    </div>

                    <div class="project-title">
                        {{ $project->title }}
                    </div>

                    <div class="project-description">
                        {{ $project->short_description }}
                    </div>

                </div>
            </div>

            <!-- MODAL -->
            <dialog id="project{{ $project->id }}">

                <button class="modal-close"
                    onclick="document.getElementById('project{{ $project->id }}').close()">
                    ✕
                </button>

                <div class="modal-content" style="margin-top:25px;">

                    <!-- SLIDER -->
                    <div style="position:relative;overflow:hidden;border-radius:22px;background:var(--paper-warm);">

                        <div class="modal-slider-{{ $project->id }}"
                            style="display:flex;transition:transform .4s ease;">
                            @foreach ($project->image_url as $img)
                               <img src="{{ $img }}"
     style="
        width:100%;
        flex-shrink:0;
        max-height:400px;
        object-fit:contain;
        background:var(--paper-warm);
     ">
                            @endforeach
                        </div>

                        <button onclick="moveModalSlide({{ $project->id }}, -1)"
                            style="position:absolute;left:10px;top:50%;transform:translateY(-50%);background:rgba(0,0,0,.5);color:white;border:none;padding:8px 12px;cursor:pointer;">
                            ‹
                        </button>

                        <button onclick="moveModalSlide({{ $project->id }}, 1)"
                            style="position:absolute;right:10px;top:50%;transform:translateY(-50%);background:rgba(0,0,0,.5);color:white;border:none;padding:8px 12px;cursor:pointer;">
                            ›
                        </button>

                    </div>

                    <!-- TITLE -->
                    <h2 style="font-family:'Cormorant Garamond',serif;font-size:44px;font-weight:300;margin:20px 0 10px;">
                        {{ $project->title }}
                    </h2>

                    <!-- DETAILS -->
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;font-size:13px;color:var(--ink-muted);">

                        <div><b>Status:</b> {{ $project->status }}</div>
                        <div><b>Type:</b> {{ $project->type }}</div>
                        <div><b>Category:</b> {{ $project->category }}</div>
                        <div><b>Slug:</b> {{ $project->slug }}</div>

                        <div style="grid-column:span 2;">
                            <b>Technologies Used:</b><br>
                            {{ implode(', ', $project->technologies_used ?? []) }}
                        </div>

                        <div style="grid-column:span 2;">
                            <b>Database Used:</b><br>
                            {{ implode(', ', $project->database_used ?? []) }}
                        </div>

                        <div style="grid-column:span 2;">
                            <b>Hosting Platform:</b><br>
                            {{ implode(', ', $project->hosting_platform ?? []) }}
                        </div>

                        <div style="grid-column:span 2;">
                            <b>GitHub:</b>
                            @if ($project->github_link)
                                <a href="{{ $project->github_link }}" target="_blank" style="color:var(--accent);">
                                    {{ $project->github_link }}
                                </a>
                            @else
                                N/A
                            @endif
                        </div>

                        <div style="grid-column:span 2;">
                            <b>Live Link:</b>
                            @if ($project->live_link)
                                <a href="{{ $project->live_link }}" target="_blank" style="color:var(--accent);">
                                    {{ $project->live_link }}
                                </a>
                            @else
                                N/A
                            @endif
                        </div>

                    </div>

                    <p style="margin-top:18px;color:var(--ink-muted);line-height:1.8;font-size:14px;">
                        {{ $project->description }}
                    </p>

                </div>

            </dialog>
        @endforeach

    </div>

    <!-- PAGINATION (FIXED) -->
    <div style="margin-top:2.5rem;display:flex;justify-content:center;">
        {{ $projects->links('pagination::simple-default') }}
    </div>

</section>

<script>
    const modalSliders = {};

    document.querySelectorAll('[class^="modal-slider-"]').forEach(slider => {
        const id = slider.className.split('modal-slider-')[1];
        modalSliders[id] = { index: 0, el: slider };
    });

    function moveModalSlide(id, dir) {
        const slider = modalSliders[id];
        const count = slider.el.children.length;

        slider.index += dir;

        if (slider.index < 0) slider.index = count - 1;
        if (slider.index >= count) slider.index = 0;

        slider.el.style.transform = `translateX(-${slider.index * 100}%)`;
    }
</script>

@endsection