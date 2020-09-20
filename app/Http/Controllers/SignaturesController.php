<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Signature;
use App\Chapter;

class SignaturesController extends Controller
{
    
    public function signature(Request $request) {

        $currentDate = date('m/d/Y');

        $attributes = $request->validate([
            'from_member' => 'required|max:255',
            'sig_date' => 'required|before_or_equal:' . $currentDate,
            'chapter' => 'required'
        ]);

        $chapter = Chapter::find($request->get('chapter'));

        $signature = new Signature;

        $signature->book_id = $chapter->book_id;
        $signature->chapter_id = $chapter->id;
        $signature->from_member = $attributes['from_member'];
        $signature->sig_date = $attributes['sig_date'];

        $request->user()->signatures()->save($signature);

        return back();
    }

    public function evaluation(Request $request)
    {

        $currentDate = date('m/d/Y');

        $attributes = $request->validate([
            'from_member' => 'required|max:255',
            'eval_date' => 'required|before_or_equal:' . $currentDate,
            'chapter' => 'required'
        ]);

        $chapter = Chapter::find($request->get('chapter'));

        $signature = new Signature;

        $signature->book_id = $chapter->book_id;
        $signature->chapter_id = $chapter->id;
        $signature->from_member = $attributes['from_member'];
        $signature->sig_date = $attributes['eval_date'];
        $signature->evaluation = 1;

        $request->user()->signatures()->save($signature);

        return back();
    }
}
