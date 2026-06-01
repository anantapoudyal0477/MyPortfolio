@extends('layouts.app')

@section('content')

<style>
.files-wrap{
    max-width:1100px;
    margin:auto;
    padding:2.5rem 2rem;
}

/* HEADER */
.section-head{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:1.5rem;
}

.section-head h2{
    font-size:11px;
    font-weight:500;
    letter-spacing:.14em;
    text-transform:uppercase;
    color:var(--ink-muted);
    margin:0;
}

.section-line{
    flex:1;
    height:1px;
    background:var(--border);
}

/* TABLE */
.table-wrap{
    border:1px solid var(--border);
    border-radius:12px;
    overflow:hidden;
    background:var(--paper);
}

table{
    width:100%;
    border-collapse:collapse;
    font-size:13px;
}

thead{
    background:var(--paper-warm);
}

th{
    text-align:left;
    padding:14px 16px;
    font-size:11px;
    letter-spacing:.12em;
    text-transform:uppercase;
    color:var(--ink-muted);
    border-bottom:1px solid var(--border);
}

td{
    padding:14px 16px;
    border-bottom:1px solid var(--border);
    color:var(--ink);
    vertical-align:top;
}

tr:hover{
    background:var(--paper-warm);
}

/* Folder row */
.folder-row td{
    background:var(--paper-warm);
    font-weight:600;
    text-transform:uppercase;
    font-size:11px;
    letter-spacing:.12em;
    color:var(--ink);
}

/* File name */
.file-title{
    font-size:14px;
}

/* Meta */
.file-meta{
    font-size:12px;
    color:var(--ink-muted);
    word-break:break-all;
}

/* Badge */
.level{
    font-size:11px;
    padding:3px 8px;
    border:1px solid var(--border);
    border-radius:999px;
    color:var(--ink-muted);
}

/* Download */
.download-link{
    color:var(--accent);
    text-decoration:none;
    font-size:12px;
    letter-spacing:.06em;
    text-transform:uppercase;
}

.download-link:hover{
    text-decoration:underline;
}

</style>

<section class="files-wrap">

    <!-- HEADER -->
    <div class="section-head">
        <h2>{{ $course->name }} Files</h2>
        <div class="section-line"></div>
    </div>

    @php
        $groupedFiles = $listOfFilesRelatedToCourse->groupBy('folder_name');
    @endphp

    <div class="table-wrap">

        <table>

            <thead>
                <tr>
                    <th>File</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($groupedFiles as $folder => $files)

                    <!-- Folder Row -->
                    <tr class="folder-row">
                        <td colspan="4">
                            📁 {{ $folder ?: 'Root' }}
                        </td>
                    </tr>

                    <!-- Files -->
                    @foreach ($files as $file)
                        <tr>

                            <!-- FILE NAME -->
                            <td>
                                <div class="file-title">
                                    📄 {{ $file->file_name }}
                                </div>
                            </td>

                            <!-- LEVEL -->
                            <td>
                                <span class="level">
                                    {{ $file->level }}
                                </span>
                            </td>

                            <!-- ACTION -->
                            <td>
                                <a href="{{ asset('storage/' . $file->file_path) }}"
                                   download
                                   class="download-link">
                                    Download →
                                </a>
                            </td>

                        </tr>
                    @endforeach

                @endforeach

            </tbody>

        </table>

    </div>

</section>

@endsection