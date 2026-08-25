@extends('layouts.admin')

@section('title', 'Projects')

@section('content')

    <!-- ================= HEADER ================= -->
    <div class="flex items-center justify-between mb-6">

        <div>
            <h2 class="text-2xl font-bold text-gray-800">Projects</h2>
            <p class="text-sm text-gray-500">Manage your portfolio projects</p>
        </div>

        <button onclick="openCreateModal()"
            class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-5 py-2 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition">
            + New Project
        </button>

    </div>

    <!-- ================= CREATE MODAL ================= -->
    <div id="createModal" class="fixed inset-0 hidden items-center justify-center z-50 bg-black/50 backdrop-blur-sm p-4">

        <!-- FIXED SIZE CONTAINER -->
        <div class="bg-white w-full max-w-xl rounded-2xl shadow-2xl overflow-hidden">

            <!-- HEADER -->
            <div class="px-6 py-4 border-b bg-gray-50 flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-bold">Create Project</h2>
                    <p class="text-xs text-gray-500">Add a new project to your portfolio</p>
                </div>

                <button onclick="closeCreateModal()" class="text-gray-500 hover:text-red-500 text-xl">
                    ✕
                </button>
            </div>

            <!-- BODY (SCROLL SAFE) -->
            <div class="p-6 max-h-[75vh] overflow-y-auto">

                <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- STACKED FORM (NO MORE OVERWIDE GRID) -->
                    <div class="space-y-3">

                        <input name="title" placeholder="Project title"
                            class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none">

                        <input name="slug" placeholder="Slug"
                            class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none">

                        <input name="short_description" placeholder="Short description"
                            class="w-full p-3 border rounded-xl">

                        <textarea name="description" rows="4" placeholder="Full description"
                            class="w-full p-3 border rounded-xl"></textarea>

                        <!-- ROW 1 -->
                        <div class="grid grid-cols-2 gap-3">

                            <select name="status" class="p-3 border rounded-xl">
                                <option>completed</option>
                                <option>ongoing</option>
                                <option>upcoming</option>
                            </select>

                            <select name="type" class="p-3 border rounded-xl">
                                <option>web</option>
                                <option>mobile</option>
                                <option>desktop</option>
                                <option>other</option>
                            </select>

                        </div>

                        <!-- ROW 2 -->
                        <select name="category" class="w-full p-3 border rounded-xl">
                            <option>personal</option>
                            <option>academic</option>
                            <option>professional</option>
                        </select>

                        <!-- LINKS -->
                        <div class="grid grid-cols-2 gap-3">

                            <input name="github_link" placeholder="GitHub link" class="p-3 border rounded-xl">

                            <input name="live_link" placeholder="Live link" class="p-3 border rounded-xl">

                        </div>

                        <!-- TECH -->
                        <input name="technologies_used" placeholder="Technologies used"
                            class="w-full p-3 border rounded-xl">

                        <div class="grid grid-cols-2 gap-3">
                            <input type="text" name="languages_used" placeholder="Languages" class="p-3 border rounded-xl">

                            <input name="database_used" placeholder="Database" class="p-3 border rounded-xl">

                        </div>

                        <select name="hosting_platform" class="w-full p-3 border rounded-xl">
                            <option>local</option>
                            <option>aws</option>
                            <option>github pages</option>
                        </select>

                        <input type="number" name="order" placeholder="Display order" class="w-full p-3 border rounded-xl">

                        <!-- IMAGE UPLOAD -->
                        <div
                            class="border-2 border-dashed border-gray-300 rounded-xl p-5 text-center hover:border-indigo-500 transition">

                            <input type="file" name="images[]" multiple accept="image/*" class="hidden" id="imgUpload">

                            <label for="imgUpload" class="cursor-pointer text-gray-600">
                                📁 Click or Drag Images Here
                            </label>

                        </div>

                    </div>

                    <!-- ACTIONS -->
                    <div class="flex justify-end gap-3 mt-6 pt-4 border-t">

                        <button type="button" onclick="closeCreateModal()"
                            class="px-5 py-2 rounded-xl bg-gray-100 hover:bg-gray-200">
                            Cancel
                        </button>

                        <button class="px-5 py-2 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700 shadow-md">
                            Create Project
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>
    <!-- ================= TABLE ================= -->
    <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

        <div class="overflow-x-auto">

            <table class="min-w-full text-sm">

                <thead class="bg-gray-50 text-gray-500 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">Title</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Type</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @foreach($projects as $project)
                                <!-- ================= EDIT MODAL ================= -->
                                <div id="editModal{{ $project->id }}"
                                    class="fixed inset-0 hidden items-center justify-center z-50 bg-black/50 backdrop-blur-sm p-4">

                                    <div class="bg-white w-full max-w-xl rounded-2xl shadow-2xl overflow-hidden">

                                        <!-- HEADER -->
                                        <div class="px-6 py-4 border-b bg-gray-50 flex justify-between items-center">
                                            <div>
                                                <h2 class="text-lg font-bold">Edit Project</h2>
                                                <p class="text-xs text-gray-500">Update project details</p>
                                            </div>

                                            <button onclick="closeEditModal({{ $project->id }})"
                                                class="text-gray-500 hover:text-red-500 text-xl">
                                                ✕
                                            </button>
                                        </div>

                                        <!-- BODY -->
                                        <div class="p-6 max-h-[75vh] overflow-y-auto">

                                            <form method="POST"
    action="{{ route('admin.projects.update', $project->id) }}"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <input type="hidden"
        name="remove_images"
        id="removeImages{{ $project->id }}">

    <div class="space-y-4">

        {{-- PROJECT TITLE --}}
        <div>
            <label class="block mb-2 font-medium">
                Project Title
            </label>

            <input
                type="text"
                name="title"
                value="{{ old('title', $project->title) }}"
                placeholder="Enter project title"
                class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
        </div>


        {{-- SLUG --}}
        <div>
            <label class="block mb-2 font-medium">
                Slug
            </label>

            <input
                type="text"
                name="slug"
                value="{{ old('slug', $project->slug) }}"
                placeholder="project-name"
                class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >

            <p class="text-sm text-gray-500 mt-1">
                Example: online-food-ordering-system
            </p>
        </div>


        {{-- SHORT DESCRIPTION --}}
        <div>
            <label class="block mb-2 font-medium">
                Short Description
            </label>

            <input
                type="text"
                name="short_description"
                value="{{ old('short_description', $project->short_description) }}"
                placeholder="Brief description of the project"
                class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
        </div>


        {{-- DESCRIPTION --}}
        <div>
            <label class="block mb-2 font-medium">
                Description
            </label>

            <textarea
                name="description"
                rows="5"
                placeholder="Describe the project, features, technologies, and your contribution..."
                class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >{{ old('description', $project->description) }}</textarea>
        </div>


        {{-- STATUS + TYPE --}}
        <div class="grid grid-cols-2 gap-3">

            {{-- STATUS --}}
            <div>
                <label class="block mb-2 font-medium">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                >
                    <option value="completed"
                        @selected(old('status', $project->status) == 'completed')>
                        Completed
                    </option>

                    <option value="ongoing"
                        @selected(old('status', $project->status) == 'ongoing')>
                        Ongoing
                    </option>

                    <option value="upcoming"
                        @selected(old('status', $project->status) == 'upcoming')>
                        Upcoming
                    </option>
                </select>
            </div>


            {{-- TYPE --}}
            <div>
                <label class="block mb-2 font-medium">
                    Project Type
                </label>

                <select
                    name="type"
                    class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                >
                    <option value="web"
                        @selected(old('type', $project->type) == 'web')>
                        Web
                    </option>

                    <option value="mobile"
                        @selected(old('type', $project->type) == 'mobile')>
                        Mobile
                    </option>

                    <option value="desktop"
                        @selected(old('type', $project->type) == 'desktop')>
                        Desktop
                    </option>

                    <option value="other"
                        @selected(old('type', $project->type) == 'other')>
                        Other
                    </option>
                </select>
            </div>

        </div>


        {{-- CATEGORY --}}
        <div>
            <label class="block mb-2 font-medium">
                Category
            </label>

            <select
                name="category"
                class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
                <option value="personal"
                    @selected(old('category', $project->category) == 'personal')>
                    Personal
                </option>

                <option value="academic"
                    @selected(old('category', $project->category) == 'academic')>
                    Academic
                </option>

                <option value="professional"
                    @selected(old('category', $project->category) == 'professional')>
                    Professional
                </option>
            </select>
        </div>


        {{-- LINKS --}}
        <div class="grid grid-cols-2 gap-3">

            {{-- GITHUB --}}
            <div>
                <label class="block mb-2 font-medium">
                    GitHub Link
                </label>

                <input
                    type="url"
                    name="github_link"
                    value="{{ old('github_link', $project->github_link) }}"
                    placeholder="https://github.com/username/project"
                    class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                >
            </div>


            {{-- LIVE WEBSITE --}}
            <div>
                <label class="block mb-2 font-medium">
                    Live Website Link
                </label>

                <input
                    type="url"
                    name="live_link"
                    value="{{ old('live_link', $project->live_link) }}"
                    placeholder="https://example.com"
                    class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                >
            </div>

        </div>


        {{-- TECHNOLOGIES --}}
        <div>
            <label class="block mb-2 font-medium">
                Technologies Used
            </label>

            <input
                type="text"
                name="technologies_used"
                value="{{ old('technologies_used', is_array($project->technologies_used) ? implode(', ', $project->technologies_used) : $project->technologies_used) }}"
                placeholder="Laravel, PHP, Blade, JavaScript, Bootstrap"
                class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >

            <p class="text-sm text-gray-500 mt-1">
                Separate multiple technologies with commas.
            </p>
        </div>


        {{-- LANGUAGES + DATABASE --}}
        <div class="grid grid-cols-2 gap-3">

            {{-- LANGUAGES --}}
            <div>
                <label class="block mb-2 font-medium">
                    Languages Used
                </label>

                <input
                    type="text"
                    name="languages_used"
                    value="{{ old('languages_used', $project->languages_used) }}"
                    placeholder="PHP, JavaScript, C#"
                    class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                >

                <p class="text-sm text-gray-500 mt-1">
                    Example: PHP, JavaScript
                </p>
            </div>


            {{-- DATABASE --}}
            <div>
                <label class="block mb-2 font-medium">
                    Database Used
                </label>

                <input
                    type="text"
                    name="database_used"
                    value="{{ old('database_used', is_array($project->database_used) ? implode(', ', $project->database_used) : $project->database_used) }}"
                    placeholder="MySQL, PostgreSQL"
                    class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                >

                <p class="text-sm text-gray-500 mt-1">
                    Separate multiple databases with commas.
                </p>
            </div>

        </div>


        {{-- HOSTING --}}
        <div>
            <label class="block mb-2 font-medium">
                Hosting Platform
            </label>

            <select
                name="hosting_platform"
                class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
                <option value="local"
                    @selected(old('hosting_platform', $project->hosting_platform) == 'local')>
                    Local
                </option>

                <option value="aws"
                    @selected(old('hosting_platform', $project->hosting_platform) == 'aws')>
                    AWS
                </option>

                <option value="github pages"
                    @selected(old('hosting_platform', $project->hosting_platform) == 'github pages')>
                    GitHub Pages
                </option>

                <option value="Production"
                    @selected(old('hosting_platform', $project->hosting_platform) == 'Production')>
                    Production
                </option>
            </select>
        </div>


        {{-- DISPLAY ORDER --}}
        <div>
            <label class="block mb-2 font-medium">
                Display Order
            </label>

            <input
                type="number"
                name="order"
                value="{{ old('order', $project->order) }}"
                min="0"
                placeholder="1"
                class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >

            <p class="text-sm text-gray-500 mt-1">
                Lower numbers appear first.
            </p>
        </div>


        {{-- EXISTING IMAGES --}}
        @if(!empty($project->image_url))

            <div>
                <label class="block mb-2 font-medium">
                    Existing Images
                </label>

                <div class="grid grid-cols-3 gap-3 mb-3">

                    @foreach($project->image_url as $img)

                        <div class="relative group">

                            <img
                                src="{{ asset($img) }}"
                                alt="{{ $project->title }}"
                                class="rounded-lg h-24 w-full object-cover border"
                            >

                            {{-- DELETE IMAGE --}}
                            <button
                                type="button"
                                onclick="removeImage('{{ $img }}', {{ $project->id }})"
                                class="absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition"
                            >
                                ✕
                            </button>

                        </div>

                    @endforeach

                </div>

            </div>

        @endif


        {{-- UPLOAD NEW IMAGES --}}
        <div>
            <label class="block mb-2 font-medium">
                Upload New Images
            </label>

            <input
                type="file"
                name="images[]"
                multiple
                accept="image/*"
                class="w-full p-3 border rounded-xl"
            >

            <p class="text-sm text-gray-500 mt-1">
                You can select multiple images.
            </p>
        </div>


        {{-- ACTIONS --}}
        <div class="flex justify-end gap-3 mt-6 pt-4 border-t">

            <button
                type="button"
                onclick="closeEditModal({{ $project->id }})"
                class="px-5 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 transition"
            >
                Cancel
            </button>

            <button
                type="submit"
                class="px-5 py-2 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700 transition"
            >
                Update Project
            </button>

        </div>

    </div>

</form>
                                        </div>

                                    </div>
                                </div>

                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-800">
                                            {{ $project->title }}
                                        </div>
                                        <div class="text-xs text-gray-400">
                                            {{ Str::limit($project->description, 60) }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-xs
                                                            {{ $project->status == 'completed' ? 'bg-green-100 text-green-700' :
                        ($project->status == 'ongoing' ? 'bg-blue-100 text-blue-700' :
                            'bg-yellow-100 text-yellow-700') }}">
                                            {{ ucfirst($project->status) }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 bg-gray-100 rounded-lg text-xs">
                                            {{ ucfirst($project->type) }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-right space-x-2">

                                        <button onclick="openEditModal({{ $project->id }})"
                                            class="px-3 py-1 rounded-lg bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition">
                                            Edit
                                        </button>

                                        <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit"
                                                class="px-3 py-1 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition"
                                                value="Delete">

                                        </form>
                                    </td>

                                </tr>

                                <!-- NOTE: edit/delete modals removed intentionally for clean structure -->
                                <!-- You should convert them into a single reusable modal system -->

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <!-- ================= SCRIPT ================= -->
    <script>
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
            document.getElementById('createModal').classList.add('flex');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
            document.getElementById('createModal').classList.remove('flex');
        }
        function openEditModal(id) {
            const modal = document.getElementById('editModal' + id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeEditModal(id) {
            const modal = document.getElementById('editModal' + id);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
        function removeImage(path, id) {

            let input = document.getElementById('removeImages' + id);

            let current = input.value ? JSON.parse(input.value) : [];

            current.push(path);

            input.value = JSON.stringify(current);

            // hide image visually
            event.target.closest('div').remove();
        }
    </script>

@endsection