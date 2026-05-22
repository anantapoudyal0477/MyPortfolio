@extends('layouts.app')

@section('content')

<style>
    :root {
        --ink: #1a1714;
        --ink-muted: #6b6460;
        --paper: #faf8f5;
        --border: rgba(26, 23, 20, 0.10);
        --accent: #c9773a;
    }

    body {
        background: var(--paper);
        font-family: 'DM Sans', sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
    }

    th, td {
        padding: 14px 16px;
        text-align: left;
        font-size: 14px;
    }

    th {
        background: #f6f1ea;
        font-size: 11px;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--ink-muted);
    }

    tr {
        border-bottom: 1px solid var(--border);
    }

    tr:last-child {
        border-bottom: none;
    }

    td {
        color: var(--ink);
    }

    .badge {
        display: inline-block;
        padding: 4px 10px;
        font-size: 11px;
        border-radius: 20px;
        background: #f0e0cf;
        color: var(--accent);
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }
</style>

<section style="max-width: 1000px; margin: 0 auto; padding: 40px 20px;">

    <h1 style="
        font-family: 'Cormorant Garamond', serif;
        font-size: 42px;
        font-weight: 300;
        margin-bottom: 20px;
    ">
        Experience
    </h1>

    <table>

        <thead>
            <tr>
                <th>Role</th>
                <th>Company</th>
                <th>Type</th>
                <th>Duration</th>
                <th>Description</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>Web Developer Intern</td>
                <td>ABC Technologies</td>
                <td><span class="badge">Internship</span></td>
                <td>2025 - 2025</td>
                <td>Worked on Laravel-based web applications and APIs.</td>
            </tr>

            <tr>
                <td>Frontend Developer</td>
                <td>Freelance</td>
                <td><span class="badge">Freelance</span></td>
                <td>2024 - Present</td>
                <td>Built responsive websites using HTML, CSS, JS, and Laravel.</td>
            </tr>

            <tr>
                <td>Software Engineering Intern</td>
                <td>XYZ Solutions</td>
                <td><span class="badge">Internship</span></td>
                <td>2024</td>
                <td>Assisted in backend development and database design.</td>
            </tr>

        </tbody>

    </table>

</section>

@endsection