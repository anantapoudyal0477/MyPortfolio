@extends('layouts.app')

@section('content')
<style>

/* ── Reset & base ──────────────────────────────────── */
*, *::before, *::after { box-sizing: border-box; }

/* ── Page shell ───────────────────────────────────── */
.projects-page {
    padding: 3rem 2rem 5rem;
    max-width: 1120px;
    margin: 0 auto;
}

/* ── Page header ──────────────────────────────────── */
.page-eyebrow {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 3.5rem;
}
.page-eyebrow-label {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: var(--ink-muted);
    white-space: nowrap;
}
.page-eyebrow-rule {
    flex: 1;
    height: 1px;
    background: var(--border);
}

/* ── Language section ─────────────────────────────── */
.language-section {
    margin-bottom: 5rem;
    position: relative;
}

/* Ghost number behind the heading */
.language-section-inner {
    position: relative;
}
.language-ghost-num {
    position: absolute;
    right: 0;
    top: -28px;
    font-family: 'Cormorant Garamond', serif;
    font-size: 140px;
    font-weight: 700;
    line-height: 1;
    color: var(--border);
    opacity: .35;
    pointer-events: none;
    user-select: none;
    z-index: 0;
}

/* Section header row */
.language-header {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 2rem;
    position: relative;
    z-index: 1;
}
.language-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 44px;
    font-weight: 600;
    line-height: 1;
    margin: 0;
    color: var(--ink);
    letter-spacing: -.01em;
}
.language-rule {
    flex: 1;
    height: 1px;
    background: var(--border);
}
.language-count {
    font-size: 10px;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--ink-muted);
    white-space: nowrap;
}
.slider-controls {
    display: flex;
    gap: 6px;
}
.slider-btn {
    border: 1px solid var(--border);
    background: transparent;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 15px;
    color: var(--ink-muted);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background .18s, border-color .18s, color .18s;
    line-height: 1;
}
.slider-btn:hover {
    background: var(--paper-warm);
    border-color: var(--ink-muted);
    color: var(--ink);
}

/* ── Slider track ─────────────────────────────────── */
.language-slider {
    display: flex;
    gap: 18px;
    overflow-x: auto;
    scroll-behavior: smooth;
    padding-bottom: 14px;
    scrollbar-width: thin;
    scrollbar-color: var(--border) transparent;
    position: relative;
    z-index: 1;
}
.language-slider::-webkit-scrollbar { height: 5px; }
.language-slider::-webkit-scrollbar-track { background: transparent; }
.language-slider::-webkit-scrollbar-thumb {
    background: var(--border);
    border-radius: 999px;
}

/* ── Project card ─────────────────────────────────── */
.project-card {
    min-width: 320px;
    max-width: 320px;
    flex-shrink: 0;
    background: var(--paper);
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
    cursor: pointer;
    transition: transform .28s cubic-bezier(.22,.68,0,1.2), box-shadow .28s ease, border-color .28s ease;
    opacity: 0;
    transform: translateY(18px);
}
.project-card.visible {
    opacity: 1;
    transform: translateY(0);
}
.project-card:hover {
    transform: translateY(-6px);
    border-color: var(--accent, #9b8cbb);
    box-shadow: 0 12px 40px rgba(0,0,0,.08);
}

/* Card image */
.project-image {
    width: 100%;
    aspect-ratio: 16/9;
    overflow: hidden;
    background: var(--paper-warm, #f5f3ef);
    position: relative;
}
.project-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .4s ease;
}
.project-card:hover .project-image img {
    transform: scale(1.04);
}
/* Placeholder when no image */
.project-image-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.project-image-placeholder svg {
    width: 36px;
    height: 36px;
    opacity: .25;
}

/* Card body */
.project-content {
    padding: 20px 22px 24px;
}
.project-number {
    font-size: 10px;
    letter-spacing: .16em;
    color: var(--ink-muted);
    margin-bottom: 10px;
    font-variant-numeric: tabular-nums;
}
.project-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 22px;
    font-weight: 600;
    color: var(--ink);
    line-height: 1.2;
    margin-bottom: 10px;
}
.project-description {
    font-size: 13px;
    line-height: 1.7;
    color: var(--ink-muted);
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Card footer hint */
.project-card-footer {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding: 0 22px 18px;
}
.card-view-hint {
    font-size: 11px;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: var(--accent, #9b8cbb);
    opacity: 0;
    transition: opacity .2s;
    display: flex;
    align-items: center;
    gap: 5px;
}
.project-card:hover .card-view-hint { opacity: 1; }

/* ── Modal ────────────────────────────────────────── */
dialog {
    width: min(880px, 95vw);
    border: none;
    border-radius: 22px;
    padding: 0;
    background: var(--paper);
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(.96);
    opacity: 0;
    transition: opacity .22s ease, transform .22s ease;
    overflow: hidden;
    max-height: 90vh;
    overflow-y: auto;
}
dialog[open] {
    display: block;
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
}
dialog::backdrop {
    background: rgba(0,0,0,.6);
    backdrop-filter: blur(6px);
}

.modal-close {
    position: absolute;
    right: 18px;
    top: 18px;
    border: 1px solid var(--border);
    background: var(--paper);
    width: 34px;
    height: 34px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 14px;
    color: var(--ink-muted);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    transition: background .18s, color .18s;
}
.modal-close:hover {
    background: var(--paper-warm);
    color: var(--ink);
}

/* Modal image area */
.modal-image-wrap {
    position: relative;
    overflow: hidden;
    background: var(--paper-warm, #f5f3ef);
    max-height: 380px;
}
.modal-slider-track {
    display: flex;
    transition: transform .38s cubic-bezier(.4,0,.2,1);
}
.modal-slider-track img {
    width: 100%;
    flex-shrink: 0;
    max-height: 380px;
    object-fit: contain;
    background: var(--paper-warm, #f5f3ef);
    display: block;
}
.modal-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    border: none;
    background: rgba(0,0,0,.42);
    color: #fff;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background .18s;
}
.modal-nav:hover { background: rgba(0,0,0,.65); }
.modal-nav-prev { left: 14px; }
.modal-nav-next { right: 14px; }

/* Modal body */
.modal-body {
    padding: 28px 32px 36px;
}
.modal-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 48px;
    font-weight: 300;
    line-height: 1.1;
    letter-spacing: -.02em;
    margin: 0 0 6px;
    color: var(--ink);
}
.modal-status-row {
    display: flex;
    gap: 8px;
    align-items: center;
    margin-bottom: 24px;
    flex-wrap: wrap;
}
.modal-badge {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .12em;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 999px;
    border: 1px solid var(--border);
    color: var(--ink-muted);
    background: var(--paper-warm);
}

/* Modal meta grid */
.modal-meta {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1px;
    background: var(--border);
    border: 1px solid var(--border);
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 24px;
}
.modal-meta-cell {
    background: var(--paper);
    padding: 14px 16px;
}
.modal-meta-label {
    font-size: 10px;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--ink-muted);
    margin-bottom: 4px;
}
.modal-meta-value {
    font-size: 14px;
    color: var(--ink);
    line-height: 1.5;
}
.modal-meta-cell.full { grid-column: span 2; }

.modal-link {
    color: var(--accent, #9b8cbb);
    text-decoration: none;
    word-break: break-all;
}
.modal-link:hover { text-decoration: underline; }

/* Modal description */
.modal-description {
    font-size: 14px;
    line-height: 1.85;
    color: var(--ink-muted);
    margin-top: 20px;
    border-top: 1px solid var(--border);
    padding-top: 20px;
}

/* ── Pagination ───────────────────────────────────── */
.pagination {
    display: flex;
    gap: 6px;
    padding: 0;
    list-style: none;
    justify-content: center;
    margin-top: 2rem;
}
.pagination li a,
.pagination li span {
    padding: 7px 12px;
    border: 1px solid var(--border);
    border-radius: 8px;
    color: var(--ink-muted);
    text-decoration: none;
    display: inline-block;
    font-size: 13px;
    transition: background .18s;
}
.pagination li a:hover {
    background: var(--paper-warm);
}
.pagination li.active span {
    background: var(--paper-warm);
    color: var(--ink);
    border-color: var(--ink-muted);
}

</style>

<section class="projects-page">

    {{-- ── Page eyebrow ──────────────────────────── --}}
    <div class="page-eyebrow">
        <span class="page-eyebrow-label">Projects</span>
        <div class="page-eyebrow-rule"></div>
    </div>

    {{-- ── Language sections ─────────────────────── --}}
    @foreach ($groupedProjects as $language => $projects)

        @php $slug = \Illuminate\Support\Str::slug($language); @endphp

        <div class="language-section">
            <div class="language-section-inner">

                {{-- Ghost number --}}
                <div class="language-ghost-num" aria-hidden="true">
                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                </div>

                {{-- Header row --}}
                <div class="language-header">

                    <h3 class="language-title">{{ $language }}</h3>
                    <div class="language-rule"></div>
                    <span class="language-count">{{ $projects->count() }} {{ Str::plural('project', $projects->count()) }}</span>

                    <div class="slider-controls">
                        <button class="slider-btn" onclick="scrollSlider('{{ $slug }}', -1)" aria-label="Scroll left">&#8592;</button>
                        <button class="slider-btn" onclick="scrollSlider('{{ $slug }}', 1)"  aria-label="Scroll right">&#8594;</button>
                    </div>

                </div>

                {{-- Slider --}}
                <div id="slider-{{ $slug }}" class="language-slider">

                    @foreach ($projects as $project)

                        <div class="project-card"
                             role="button"
                             tabindex="0"
                             onclick="document.getElementById('project{{ $project->id }}').showModal()"
                             onkeydown="if(event.key==='Enter')document.getElementById('project{{ $project->id }}').showModal()">
                            <div class="project-image">
                                @if (!empty($project->image_url[0]))
                                    <img src="{{ $project->image_url[0] }}" alt="{{ $project->title }}" loading="lazy">
                                @else
                                    <div class="project-image-placeholder">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
                                            <rect x="3" y="3" width="18" height="18" rx="3"/>
                                            <circle cx="8.5" cy="8.5" r="1.5"/>
                                            <path d="m21 15-5-5L5 21"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <div class="project-content">
                                <div class="project-number">{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</div>
                                <div class="project-title">{{ $project->title }}</div>
                                <div class="project-description">{{ $project->short_description }}</div>
                            </div>

                            <div class="project-card-footer">
                                <span class="card-view-hint">View &nbsp;&#8599;</span>
                            </div>

                        </div>

                        {{-- ── Modal ─────────────────────────────── --}}
                        <dialog id="project{{ $project->id }}"
                                onclick="if(event.target===this)this.close()">

                            <button class="modal-close"
                                    onclick="document.getElementById('project{{ $project->id }}').close()"
                                    aria-label="Close">&#10005;</button>

                            {{-- Image carousel --}}
                            <div class="modal-image-wrap">
                                <div class="modal-slider-track" id="track-{{ $project->id }}">
                                    @foreach ($project->image_url as $img)
                                        <img src="{{ $img }}" alt="{{ $project->title }}">
                                    @endforeach
                                </div>
                                @if (count($project->image_url) > 1)
                                    <button class="modal-nav modal-nav-prev"
                                            onclick="moveModalSlide({{ $project->id }}, -1)">&#8249;</button>
                                    <button class="modal-nav modal-nav-next"
                                            onclick="moveModalSlide({{ $project->id }}, 1)">&#8250;</button>
                                @endif
                            </div>

                            <div class="modal-body">

                                <h2 class="modal-title">{{ $project->title }}</h2>

                                <div class="modal-status-row">
                                    @if ($project->status)
                                        <span class="modal-badge">{{ $project->status }}</span>
                                    @endif
                                    @if ($project->type)
                                        <span class="modal-badge">{{ $project->type }}</span>
                                    @endif
                                    @if ($project->category)
                                        <span class="modal-badge">{{ $project->category }}</span>
                                    @endif
                                </div>

                                {{-- Meta grid --}}
                                <div class="modal-meta">

                                    <div class="modal-meta-cell">
                                        <div class="modal-meta-label">Language</div>
                                        <div class="modal-meta-value">{{ $project->languages_used }}</div>
                                    </div>

                                    <div class="modal-meta-cell">
                                        <div class="modal-meta-label">Hosting</div>
                                        <div class="modal-meta-value">{{ $project->hosting_platform ?? '—' }}</div>
                                    </div>

                                    @if (!empty($project->technologies_used))
                                    <div class="modal-meta-cell full">
                                        <div class="modal-meta-label">Technologies</div>
                                        <div class="modal-meta-value">{{ implode(', ', $project->technologies_used) }}</div>
                                    </div>
                                    @endif

                                    @if (!empty($project->database_used))
                                    <div class="modal-meta-cell full">
                                        <div class="modal-meta-label">Database</div>
                                        <div class="modal-meta-value">{{ implode(', ', $project->database_used) }}</div>
                                    </div>
                                    @endif

                                    @if ($project->github_link)
                                    <div class="modal-meta-cell full">
                                        <div class="modal-meta-label">GitHub</div>
                                        <div class="modal-meta-value">
                                            <a href="{{ $project->github_link }}" target="_blank" rel="noopener" class="modal-link">
                                                {{ $project->github_link }}
                                            </a>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($project->live_link)
                                    <div class="modal-meta-cell full">
                                        <div class="modal-meta-label">Live</div>
                                        <div class="modal-meta-value">
                                            <a href="{{ $project->live_link }}" target="_blank" rel="noopener" class="modal-link">
                                                {{ $project->live_link }}
                                            </a>
                                        </div>
                                    </div>
                                    @endif

                                </div>

                                @if ($project->description)
                                <div class="modal-description">
                                    {{ $project->description }}
                                </div>
                                @endif

                            </div>

                        </dialog>

                    @endforeach

                </div>{{-- /.language-slider --}}

            </div>{{-- /.language-section-inner --}}
        </div>{{-- /.language-section --}}

    @endforeach

</section>

<script>
/* ── Modal slide state ─────────────────────────────── */
const modalState = {};

document.querySelectorAll('[id^="track-"]').forEach(track => {
    const id = track.id.replace('track-', '');
    modalState[id] = { index: 0, el: track };
});

function moveModalSlide(id, dir) {
    const s = modalState[id];
    if (!s) return;
    const count = s.el.children.length;
    s.index = (s.index + dir + count) % count;
    s.el.style.transform = `translateX(-${s.index * 100}%)`;
}

/* Reset slider index when modal opens */
document.querySelectorAll('dialog').forEach(dialog => {
    dialog.addEventListener('close', () => {
        const id = dialog.id.replace('project', '');
        if (modalState[id]) {
            modalState[id].index = 0;
            modalState[id].el.style.transform = 'translateX(0)';
        }
    });
});

/* ── Horizontal scroll buttons ─────────────────────── */
function scrollSlider(id, dir) {
    const el = document.getElementById(`slider-${id}`);
    if (!el) return;
    el.scrollBy({ left: dir * 700, behavior: 'smooth' });
}

/* ── Scroll-in animation ────────────────────────────── */
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
            setTimeout(() => {
                entry.target.classList.add('visible');
            }, i * 60);
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.12 });

document.querySelectorAll('.project-card').forEach(card => observer.observe(card));
</script>

@endsection