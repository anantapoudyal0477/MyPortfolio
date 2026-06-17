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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:completed,ongoing,upcoming',
            'type' => 'required|in:web,mobile,desktop,other',
            'category' => 'required|in:personal,academic,professional',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'live_link' => 'nullable|url',
            'github_link' => 'nullable|url',
            'languages_used' => 'nullable|string',
        ]);

        // ================= SLUG =================
        $slug = Str::slug($request->title);

        $original = $slug;
        $counter = 1;
        while (Projects::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $counter++;
        }

        // ================= FOLDER =================
        $folderName = $slug;
        $basePath = public_path("/assets/Images/{$folderName}");

        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }

        // ================= IMAGE UPLOAD =================
        $imagePaths = [];

        $files = glob($basePath . '/*.{jpg,jpeg,png,webp}', GLOB_BRACE);
        $index = count($files) + 1;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                $ext = $image->getClientOriginalExtension();
                $fileName = $index . '.' . $ext;

                $image->move($basePath, $fileName);

                $imagePaths[] = "/assets/Images/{$folderName}/{$fileName}";

                $index++;
            }
        }

        //show everything before save
        // dd([
        //     'title' => $request->title,
        //     'slug' => $slug,
        //     'short_description' => $request->short_description ?? '',
        //     'description' => $request->description,
        //     'status' => $request->status,
        //     'type' => $request->type,
        //     'category' => $request->category,
        //     'github_link' => $request->github_link,
        //     'live_link' => $request->live_link,
        //     'technologies_used' => $this->toArray($request->technologies_used),
        //     'database_used' => $this->toArray($request->database_used),
        //     'languages_used' => $request->languages_used,
        //     'hosting_platform' => $request->hosting_platform,
        //     'order' => $request->order ?? 0,
        //     'image_url' => $imagePaths,
        // ]);

        // ================= SAVE =================
        Projects::create([
            'title' => $request->title,
            'slug' => $slug,
            'short_description' => $request->short_description ?? '',
            'description' => $request->description,

            'status' => $request->status,
            'type' => $request->type,
            'category' => $request->category,

            'github_link' => $request->github_link,
            'live_link' => $request->live_link,

            'technologies_used' => $this->toArray($request->technologies_used),
            'database_used' => $this->toArray($request->database_used),
            'languages_used' => $request->languages_used,

            'hosting_platform' => $request->hosting_platform,
            'order' => $request->order ?? 0,

            'image_url' => $imagePaths,
        ]);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully!');
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
        $project = Projects::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:completed,ongoing,upcoming',
            'type' => 'required|in:web,mobile,desktop,other',
            'category' => 'required|in:personal,academic,professional',
            'images.*' => 'nullable|image|max:2048',
            'live_link' => 'nullable|url',
            'github_link' => 'nullable|url',
            'languages_used' => 'nullable|string',
        ]);

        // ================= FOLDER =================
        $folderName = $project->slug;
        $basePath = public_path("/assets/Images/{$folderName}");

        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }

        $images = $project->image_url ?? [];

        // ================= REMOVE IMAGES =================
        if ($request->remove_images) {

            $removeImages = json_decode($request->remove_images, true);

            foreach ($removeImages as $img) {

                $fullPath = public_path($img);

                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }

                $images = array_values(array_filter($images, fn($i) => $i !== $img));
            }
        }

        // ================= ADD NEW IMAGES =================
        if ($request->hasFile('images')) {

            $files = glob($basePath . '/*.{jpg,jpeg,png,webp}', GLOB_BRACE);

            $max = 0;

            foreach ($files as $file) {
                $name = pathinfo($file, PATHINFO_FILENAME);
                if (is_numeric($name)) {
                    $max = max($max, (int)$name);
                }
            }

            $index = $max + 1;

            foreach ($request->file('images') as $image) {

                $ext = $image->getClientOriginalExtension();
                $fileName = $index . '.' . $ext;

                $image->move($basePath, $fileName);

                $images[] = "/assets/Images/{$folderName}/{$fileName}";

                $index++;
            }
        }
        //dd all attributes before update
        // dd($request->all());

        // ================= UPDATE =================
        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $request->short_description,

            'status' => $request->status,
            'type' => $request->type,
            'category' => $request->category,

            'github_link' => $request->github_link,
            'live_link' => $request->live_link,

            'technologies_used' => $this->toArray($request->technologies_used),
            'database_used' => $this->toArray($request->database_used),
            'languages_used' => $request->languages_used,

            'hosting_platform' => $request->hosting_platform,
            'order' => $request->order ?? 0,

            'image_url' => $images,
        ]);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }

    /**
     * =========================
     * DELETE
     * =========================
     */
    public function destroy(string $id)
    {
        $project = Projects::findOrFail($id);

        // IMPORTANT FIX: NO "projects/" prefix
        $folder = public_path("/assets/Images/" . $project->slug);

        if (File::exists($folder)) {
            File::deleteDirectory($folder);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }

    /**
     * =========================
     * HELPER
     * =========================
     */
    private function toArray($value)
    {
        if (!$value) return [];

        if (is_array($value)) return $value;

        return array_filter(array_map('trim', explode(',', $value)));
    }
}