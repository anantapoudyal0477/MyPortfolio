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
<!-- ================= CREATE MODAL ================= -->
<div id="createModal"
     class="fixed inset-0 hidden items-center justify-center z-50 bg-black/50 backdrop-blur-sm p-4">

    <!-- FIXED SIZE CONTAINER -->
    <div class="bg-white w-full max-w-xl rounded-2xl shadow-2xl overflow-hidden">

        <!-- HEADER -->
        <div class="px-6 py-4 border-b bg-gray-50 flex justify-between items-center">
            <div>
                <h2 class="text-lg font-bold">Create Project</h2>
                <p class="text-xs text-gray-500">Add a new project to your portfolio</p>
            </div>

            <button onclick="closeCreateModal()"
                    class="text-gray-500 hover:text-red-500 text-xl">
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

                        <input name="github_link" placeholder="GitHub link"
                            class="p-3 border rounded-xl">

                        <input name="live_link" placeholder="Live link"
                            class="p-3 border rounded-xl">

                    </div>

                    <!-- TECH -->
                    <input name="technologies_used" placeholder="Technologies used"
                        class="w-full p-3 border rounded-xl">

                    <div class="grid grid-cols-2 gap-3">
                        <input type="text" name="languages_used" placeholder="Languages"
                            class="p-3 border rounded-xl">

                        <input name="database_used" placeholder="Database"
                            class="p-3 border rounded-xl">

                    </div>

                    <select name="hosting_platform" class="w-full p-3 border rounded-xl">
                        <option>local</option>
                        <option>aws</option>
                        <option>github pages</option>
                    </select>

                    <input type="number" name="order" placeholder="Display order"
                        class="w-full p-3 border rounded-xl">

                    <!-- IMAGE UPLOAD -->
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-5 text-center hover:border-indigo-500 transition">

                        <input type="file" name="images[]" multiple accept="image/*"
                               class="hidden" id="imgUpload">

                        <label for="imgUpload" class="cursor-pointer text-gray-600">
                            📁 Click or Drag Images Here
                        </label>

                    </div>

                </div>

                <!-- ACTIONS -->
                <div class="flex justify-end gap-3 mt-6 pt-4 border-t">

                    <button type="button"
                        onclick="closeCreateModal()"
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
<input type="hidden" name="remove_images" id="removeImages{{ $project->id }}">
                @csrf
                @method('PUT')

                <div class="space-y-3">

                    <input type="text"
                           name="title"
                           value="{{ $project->title }}"
                           class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500">

                    <input type="text"
                           name="slug"
                           value="{{ $project->slug }}"
                           class="w-full p-3 border rounded-xl">

                    <input type="text"
                           name="short_description"
                           value="{{ $project->short_description }}"
                           class="w-full p-3 border rounded-xl">

                    <textarea name="description" rows="4"
                              class="w-full p-3 border rounded-xl">{{ $project->description }}</textarea>

                    <!-- STATUS + TYPE -->
                    <div class="grid grid-cols-2 gap-3">

                        <select name="status" class="p-3 border rounded-xl">
                            <option value="completed" @selected($project->status == 'completed')>completed</option>
                            <option value="ongoing" @selected($project->status == 'ongoing')>ongoing</option>
                            <option value="upcoming" @selected($project->status == 'upcoming')>upcoming</option>
                        </select>

                        <select name="type" class="p-3 border rounded-xl">
                            <option value="web" @selected($project->type == 'web')>web</option>
                            <option value="mobile" @selected($project->type == 'mobile')>mobile</option>
                            <option value="desktop" @selected($project->type == 'desktop')>desktop</option>
                            <option value="other" @selected($project->type == 'other')>other</option>
                        </select>

                    </div>

                    <!-- CATEGORY -->
                    <select name="category" class="w-full p-3 border rounded-xl">
                        <option value="personal" @selected($project->category == 'personal')>personal</option>
                        <option value="academic" @selected($project->category == 'academic')>academic</option>
                        <option value="professional" @selected($project->category == 'professional')>professional</option>
                    </select>

                    <!-- LINKS -->
                    <div class="grid grid-cols-2 gap-3">

                        <input name="github_link"
                               value="{{ $project->github_link }}"
                               class="p-3 border rounded-xl">

                        <input name="live_link"
                               value="{{ $project->live_link }}"
                               class="p-3 border rounded-xl">

                    </div>

                    <!-- TECH -->
                    <input name="technologies_used"
       value="{{ is_array($project->technologies_used) ? implode(', ', $project->technologies_used) : $project->technologies_used }}"
       class="w-full p-3 border rounded-xl">
                    <div class="grid grid-cols-2 gap-3">
asd{{ $project->languages_used }}

                        <input name="languages_used"
                               value="{{ $project->languages_used }}"
                               class="p-3 border rounded-xl">

                       <input name="database_used"
       value="{{ is_array($project->database_used) ? implode(', ', $project->database_used) : $project->database_used }}"
       class="w-full p-3 border rounded-xl">

                    </div>

                    <!-- HOSTING -->
                    <select name="hosting_platform" class="w-full p-3 border rounded-xl">
                        <option value="local" @selected($project->hosting_platform == 'local')>local</option>
                        <option value="aws" @selected($project->hosting_platform == 'aws')>aws</option>
                        <option value="github pages" @selected($project->hosting_platform == 'github pages')>github pages</option>
                    </select>

                    <!-- ORDER -->
                    <input type="number"
                           name="order"
                           value="{{ $project->order }}"
                           class="w-full p-3 border rounded-xl">

                </div>
                <!-- EXISTING IMAGES PREVIEW -->
@if(!empty($project->image_url))
<div class="grid grid-cols-3 gap-2 mb-3">

    @foreach($project->image_url as $img)
        <div class="relative group">

            <img src="{{ asset($img) }}"
                 class="rounded-lg h-20 w-full object-cover border">

            <!-- DELETE SINGLE IMAGE -->
            <button type="button"
                onclick="removeImage('{{ $img }}', {{ $project->id }})"
                class="absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100">
                ✕
            </button>

        </div>
    @endforeach

</div>
@endif
<!-- UPLOAD NEW IMAGES -->
<input type="file"
       name="images[]"
       multiple
       class="w-full p-3 border rounded-xl">

                <!-- ACTIONS -->
                <div class="flex justify-end gap-3 mt-6 pt-4 border-t">

                    <button type="button"
                            onclick="closeEditModal({{ $project->id }})"
                            class="px-5 py-2 rounded-xl bg-gray-100 hover:bg-gray-200">
                        Cancel
                    </button>

                    <button class="px-5 py-2 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700">
                        Update Project
                    </button>

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
    <input type="submit" class="px-3 py-1 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition" value="Delete">

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