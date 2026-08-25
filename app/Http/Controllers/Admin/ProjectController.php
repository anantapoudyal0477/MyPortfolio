<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * =========================
     * INDEX
     * =========================
     */
    public function index()
    {
        $projects = Projects::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * =========================
     * STORE
     * =========================
     */
    public function store(Request $request)
{
    // ================= VALIDATION =================
    $validated = $request->validate([
        'title' => 'required|string|max:255',

        'slug' => 'nullable|string|max:255',

        'short_description' => 'nullable|string|max:255',

        'description' => 'required|string',

        'status' => 'required|in:completed,ongoing,upcoming',

        'type' => 'required|in:web,mobile,desktop,other',

        'category' => 'required|in:personal,academic,professional',

        'github_link' => 'nullable|url|max:255',

        'live_link' => 'nullable|url|max:255',

        'technologies_used' => 'nullable|string',

        'database_used' => 'nullable|string',

        'languages_used' => 'nullable|string|max:255',

        'hosting_platform' => 'nullable|in:local,aws,github pages,Production',

        'order' => 'nullable|integer|min:0',

        'images' => 'nullable|array',

        'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);


    // ================= SLUG =================

    $slug = Str::slug($request->title);

    $originalSlug = $slug;
    $counter = 1;

    while (Projects::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $counter++;
    }


    // ================= IMAGE FOLDER =================

    $folderName = $slug;

    $basePath = public_path(
        "/assets/Images/{$folderName}"
    );

    if (!file_exists($basePath)) {
        mkdir($basePath, 0777, true);
    }


    // ================= IMAGE UPLOAD =================

    $imagePaths = [];

    $files = glob(
        $basePath . '/*.{jpg,jpeg,png,webp}',
        GLOB_BRACE
    );

    $index = count($files) + 1;


    if ($request->hasFile('images')) {

        foreach ($request->file('images') as $image) {

            $extension = $image->getClientOriginalExtension();

            $fileName = $index . '.' . $extension;

            $image->move(
                $basePath,
                $fileName
            );

            $imagePaths[] =
                "/assets/Images/{$folderName}/{$fileName}";

            $index++;
        }
    }


    // ================= SAVE PROJECT =================

    Projects::create([

        'title' => $request->title,

        'slug' => $slug,

        'short_description' =>
            $request->short_description ?? '',

        'description' =>
            $request->description,

        'status' =>
            $request->status,

        'type' =>
            $request->type,

        'category' =>
            $request->category,

        'github_link' =>
            $request->github_link,

        'live_link' =>
            $request->live_link,

        'technologies_used' =>
            $this->toArray($request->technologies_used),

        'database_used' =>
            $this->toArray($request->database_used),

        'languages_used' =>
            $request->languages_used,

        'hosting_platform' =>
            $request->hosting_platform,

        'order' =>
            $request->order ?? 0,

        'image_url' =>
            $imagePaths,
    ]);


    // ================= REDIRECT =================

    return redirect()
        ->route('admin.projects.index')
        ->with(
            'success',
            'Project created successfully!'
        );
}

    /**
     * =========================
     * EDIT
     * =========================
     */
    public function edit(string $id)
    {
        return Projects::findOrFail($id);
    }

    /**
     * =========================
     * UPDATE
     * =========================
     */
   public function update(Request $request, string $id)
{
    // ================= FIND PROJECT =================

    $project = Projects::findOrFail($id);


    // ================= VALIDATION =================

    $request->validate([
        'title' => 'required|string|max:255',

        'short_description' => 'nullable|string|max:255',

        'description' => 'required|string',

        'status' => 'required|in:completed,ongoing,upcoming',

        'type' => 'required|in:web,mobile,desktop,other',

        'category' => 'required|in:personal,academic,professional',

        'github_link' => 'nullable|url|max:255',

        'live_link' => 'nullable|url|max:255',

        'technologies_used' => 'nullable|string',

        'database_used' => 'nullable|string',

        'languages_used' => 'nullable|string|max:255',

        'hosting_platform' => 'nullable|in:local,aws,github pages,Production',

        'order' => 'nullable|integer|min:0',

        'remove_images' => 'nullable|string',

        'images' => 'nullable|array',

        'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);


    // ================= IMAGE FOLDER =================

    $folderName = $project->slug;

    $basePath = public_path(
        "/assets/Images/{$folderName}"
    );

    if (!file_exists($basePath)) {
        mkdir($basePath, 0777, true);
    }


    // ================= EXISTING IMAGES =================

    $images = $project->image_url ?? [];

    // Make sure it is always an array
    if (!is_array($images)) {
        $images = [];
    }


    // ================= REMOVE IMAGES =================

    if ($request->filled('remove_images')) {

        $removeImages = json_decode(
            $request->remove_images,
            true
        );

        if (is_array($removeImages)) {

            foreach ($removeImages as $img) {

                // Only process images that actually belong
                // to this project
                if (!in_array($img, $images)) {
                    continue;
                }

                $fullPath = public_path($img);

                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }

                $images = array_values(
                    array_filter(
                        $images,
                        fn ($existingImage) =>
                            $existingImage !== $img
                    )
                );
            }
        }
    }


    // ================= ADD NEW IMAGES =================

    if ($request->hasFile('images')) {

        $files = glob(
            $basePath . '/*.{jpg,jpeg,png,webp}',
            GLOB_BRACE
        );

        $max = 0;

        foreach ($files as $file) {

            $name = pathinfo(
                $file,
                PATHINFO_FILENAME
            );

            if (is_numeric($name)) {
                $max = max(
                    $max,
                    (int) $name
                );
            }
        }

        $index = $max + 1;


        foreach ($request->file('images') as $image) {

            $extension =
                $image->getClientOriginalExtension();

            $fileName =
                $index . '.' . $extension;

            $image->move(
                $basePath,
                $fileName
            );

            $images[] =
                "/assets/Images/{$folderName}/{$fileName}";

            $index++;
        }
    }


    // ================= UPDATE PROJECT =================

    $project->update([

        'title' =>
            $request->title,

        'short_description' =>
            $request->short_description ?? '',

        'description' =>
            $request->description,

        'status' =>
            $request->status,

        'type' =>
            $request->type,

        'category' =>
            $request->category,

        'github_link' =>
            $request->github_link,

        'live_link' =>
            $request->live_link,

        'technologies_used' =>
            $this->toArray(
                $request->technologies_used
            ),

        'database_used' =>
            $this->toArray(
                $request->database_used
            ),

        'languages_used' =>
            $request->languages_used,

        'hosting_platform' =>
            $request->hosting_platform,

        'order' =>
            $request->order ?? 0,

        'image_url' =>
            array_values($images),
    ]);


    // ================= REDIRECT =================

    return redirect()
        ->route('admin.projects.index')
        ->with(
            'success',
            'Project updated successfully!'
        );
}
    /**
     * =========================
     * DELETE
     * =========================
     */
public function destroy(string $id)
{
    // ================= FIND PROJECT =================

    $project = Projects::findOrFail($id);


    // ================= DELETE PROJECT IMAGES =================

    $folder = public_path(
        "/assets/Images/{$project->slug}"
    );

    if (File::exists($folder)) {
        File::deleteDirectory($folder);
    }


    // ================= DELETE DATABASE RECORD =================

    $project->delete();


    // ================= REDIRECT =================

    return redirect()
        ->route('admin.projects.index')
        ->with(
            'success',
            'Project deleted successfully!'
        );
}
    /**
     * =========================
     * HELPER
     * =========================
     */
  private function toArray($value): ?array
{
    if (empty($value)) {
        return null;
    }

    if (is_array($value)) {
        return array_values(
            array_filter(
                array_map('trim', $value)
            )
        );
    }

    return array_values(
        array_filter(
            array_map(
                'trim',
                explode(',', $value)
            )
        )
    );
}
}