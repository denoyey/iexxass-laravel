<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Services\Admin\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    protected ProjectService $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $projects = Project::withCount('images')
            ->with('images')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            })
            ->orderBy('order_column')
            ->orderBy('created_at', 'desc')
            ->paginate($request->input('per_page', 10))
            ->withQueryString();

        return view('pages.admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('pages.admin.projects.create');
    }

    public function store(ProjectRequest $request)
    {
        $data = $request->validated();

        $this->projectService->createProject(
            $data,
            $request->file('thumbnail'),
            $request->file('images')
        );

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        $project->load('images');

        return view('pages.admin.projects.edit', compact('project'));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $this->projectService->updateProject(
            $project,
            $data,
            $request->file('thumbnail'),
            $request->file('images')
        );

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $this->projectService->deleteProject($project);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus.');
    }

    public function destroyImage(ProjectImage $image)
    {
        if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }
        $image->delete();

        return back()->with('success', 'Gambar galeri berhasil dihapus.');
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|string',
        ]);

        $ids = json_decode($request->input('ids'), true);

        if (! is_array($ids) || empty($ids)) {
            return redirect()->back()->with('error', 'Tidak ada project yang dipilih.');
        }

        $ids = array_slice(array_unique(array_filter(array_map('intval', $ids))), 0, 100);
        $projects = Project::whereIn('id', $ids)->get();

        foreach ($projects as $project) {
            $this->deleteProjectFiles($project);
            $project->delete();
        }

        return redirect()->route('admin.projects.index')->with('success', count($ids).' Project berhasil dihapus.');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*.id' => 'required|exists:projects,id',
            'order.*.position' => 'required|integer',
        ]);

        foreach ($request->order as $item) {
            Project::where('id', $item['id'])->update(['order_column' => $item['position']]);
        }

        return response()->json(['success' => true]);
    }

    private function deleteProjectFiles(Project $project)
    {
        if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
            Storage::disk('public')->delete($project->thumbnail);
        }

        foreach ($project->images as $image) {
            if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
        }
    }
}
