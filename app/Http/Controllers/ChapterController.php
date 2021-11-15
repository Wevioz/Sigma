<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Redirect;

class ChapterController extends Controller
{
    public function getChapterById($chapterId) {
        $chapter = Chapter::with('user')->find($chapterId);
        $previous = url()->previous();
        return view('chapters.detail', compact('chapter', 'previous'));
    }

    public function add(Request $request) {
        $formations = Formation::with('user')->get();

        if($request->input()) {
            $data = $request->validate([
                'formations' => ['required'],
                'title' => ['required'],
                'content' => ['required'],
            ]);

            $formations = Formation::whereIn('id', $request->input('formations'))->get();

            $chapter = new Chapter;
            $chapter->ownerId = Auth::id();
            $chapter->title = $request->input('title');
            $chapter->content = $request->input('content');
        
            $chapter->save();

            $chapter->formations()->attach($formations);

            return redirect(session('previous-url'));
        }

        return view('chapters/add', compact('formations'));
    }

    public function edit(Request $request, $chapterId) {
        $formations = Formation::with('user')->get();
        $chapter = Chapter::with('user')->find($chapterId);

        if($request->input()) {
            $data = $request->validate([
                'formations' => ['required'],
                'title' => ['required'],
                'content' => ['required'],
            ]);

            $formations = Formation::whereIn('id', $request->input('formations'))->get();

            $chapter->title = $request->input('title');
            $chapter->content = $request->input('content');
        
            $chapter->save();

            $chapter->formations()->sync($formations);

            return redirect(session('previous-url'));
        }

        return view('chapters/edit', compact('formations', 'chapter'));
    }

    public function delete($chapterId) {
        $chapter = Chapter::with('user')->find($chapterId);

        $chapter->delete();

        return redirect()->back();
    }
}


