@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<!-- STATS GRID -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    <!-- Contacts -->
    <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Contacts</p>
                <h2 class="text-2xl font-semibold mt-1">{{ count($contacts) }}</h2>
            </div>
            <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                ✉️
            </div>
        </div>
    </div>

    <!-- Courses -->
    <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Courses</p>
                <h2 class="text-2xl font-semibold mt-1">{{ count($courses) }}</h2>
            </div>
            <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                🎓
            </div>
        </div>
    </div>

    <!-- Course Files -->
    <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Course Files</p>
                <h2 class="text-2xl font-semibold mt-1">{{ count($courseFiles) }}</h2>
            </div>
            <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                📂
            </div>
        </div>
    </div>

    <!-- Education -->
    <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Education</p>
                <h2 class="text-2xl font-semibold mt-1">{{ count($education) }}</h2>
            </div>
            <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                🎓
            </div>
        </div>
    </div>

    <!-- Experience -->
    <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Experience</p>
                <h2 class="text-2xl font-semibold mt-1">{{ count($experience) }}</h2>
            </div>
            <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                💼
            </div>
        </div>
    </div>

    <!-- Projects -->
    <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Projects</p>
                <h2 class="text-2xl font-semibold mt-1">{{ count($projects) }}</h2>
            </div>
            <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                📁
            </div>
        </div>
    </div>

</div>

<!-- OPTIONAL WELCOME SECTION -->
<div class="mt-8 bg-white border border-gray-100 rounded-xl p-6">
    <h2 class="text-lg font-semibold">Welcome back 👋</h2>
    <p class="text-sm text-gray-500 mt-1">
        Here’s a quick overview of your system activity.
    </p>
</div>

@endsection