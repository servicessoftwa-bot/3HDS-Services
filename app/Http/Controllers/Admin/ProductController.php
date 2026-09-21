<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Project::latest()->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'client_name' => 'nullable|max:255',
            'featured_image' => 'nullable|image|max:2048',
            'technologies' => 'nullable|string',
            'project_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');
        
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('products', 'public');
        }

        if (isset($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        }

        Project::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Project added to the portfolio.');
    }

    public function edit(Project $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Project $product)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'client_name' => 'nullable|max:255',
            'featured_image' => 'nullable|image|max:2048',
            'technologies' => 'nullable|string',
            'project_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');
        
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('products', 'public');
        }

        if (isset($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Project updated.');
    }

    public function destroy(Project $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Project deleted.');
    }
}
