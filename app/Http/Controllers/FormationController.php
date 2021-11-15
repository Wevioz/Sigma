<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    public function getFormations()
    {
        $formations = Formation::with('user')->get();
        session(['previous-url' => request()->url()]);
        return view('formations.list', compact('formations'));
    }

    public function getChaptersByFormation($formationId)
    {
        $formation = Formation::with('user')->find($formationId);
        session(['previous-url' => request()->url()]);

        return view('formations.detail', compact('formation'));
    }

    public function add(Request $request) {
        $categories = Category::with('user')->get();

        if($request->input()) {
            $data = $request->validate([
                'categories' => ['required'],
                'title' => ['required'],
                'description' => ['required'],
                'price' => ['required'],
                'duration' => ['required'],
            ]);

            $categories = Category::whereIn('id', $request->input('categories'))->get();

            $formation = new Formation;
            $formation->ownerId = Auth::id();
            $formation->title = $request->input('title');
            $formation->description = $request->input('description');
            $formation->thumbnail = time().'.'.$request->image->extension();
            $formation->price = $request->input('price');
            $formation->duration = $request->input('duration');
        
            $formation->save();

            $request->image->move(public_path('images'), $formation->thumbnail);

            $formation->categories()->attach($categories);

            return redirect(session('previous-url'));
        }

        return view('formations/add', compact('categories'));
    }

    public function edit(Request $request, $formationId) {
        $categories = Category::with('user')->get();
        $formation = Formation::with('user')->find($formationId);

        if($request->input()) {
            $data = $request->validate([
                'categories' => ['required'],
                'title' => ['required'],
                'description' => ['required'],
                'price' => ['required'],
                'duration' => ['required'],
            ]);

            $categories = Category::whereIn('id', $request->input('categories'))->get();

            $formation->ownerId = Auth::id();
            $formation->title = $request->input('title');
            $formation->description = $request->input('description');
            $formation->thumbnail = time().'.'.$request->image->extension();
            $formation->price = $request->input('price');
            $formation->duration = $request->input('duration');
        
            $formation->save();

            $request->image->move(public_path('images'), $formation->thumbnail);

            $formation->categories()->sync($categories);

            return redirect(session('previous-url'));
        }


        return view('formations/edit', compact('categories', 'formation'));
    }

    public function delete($formationId) {
        $formation = Formation::with('user')->find($formationId);

        $formation->delete();

        return redirect()->back();
    }

}
