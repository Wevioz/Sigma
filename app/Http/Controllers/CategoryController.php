<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::with('user')->get();

        return view('categories.list', compact('categories'));
    }

    public function getFormationsByCategory($categoryId) {
        $category = Category::with('user')->find($categoryId);
        session(['previous-url' => request()->url()]);
        return view('categories.detail', compact('category'));
    }

    public function add(Request $request) {
        if($request->input()) {
            
            $data = $request->validate([
                'title' => ['required'],
                'description' => ['required'],
            ]);

            $category = new Category;
            $category->ownerId = Auth::id();
            $category->title = $request->input('title');
            $category->description = $request->input('description');

            $category->save();

            return redirect('/categories');
        }

        return view('categories/add');
    }

    public function edit(Request $request, $categoryId) {
        $category = Category::with('user')->find($categoryId);

        if($request->input()) {
            
            $data = $request->validate([
                'title' => ['required'],
                'description' => ['required'],
            ]);

            $category->update($request->all());
            return redirect('/categories');
            
        }

        return view('categories/edit', compact('category'));
    }

    public function delete($categoryId) {
        $category = Category::with('user')->find($categoryId);

        $category->delete();

        return redirect('/categories');
    }
}
