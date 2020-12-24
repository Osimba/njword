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
            'book' => 'required',
            'chapter' => 'required',
            'date' => 'required|before_or_equal:' . $currentDate,
            'listener' => 'required|max:255',
            'evaluation' => 'boolean'
        ]);

        $chapter = Chapter::find($request->get('chapter'));

        if($attributes['evaluation']) {
            if($request->user()->evaluationCount($chapter->id)) {
                return response()->json([
                    'title' => '<span class="text-danger">Unable to Add</span>', 
                    'message'=> 'Thanks to Father and Mother! You already have an evaluation for this chapter! Let\'s start the next one!'
                ]);
            }
        } else if ($request->user()->signatureCount($chapter->id) >= 2) {
            return response()->json([
                'title' => '<span class="text-danger">Unable to Add</span>', 
                'message'=> 'Thanks to Father and Mother! You already have 2 signatures for this chapter! Let\'s get the evaluation!'
            ]);
        }


        $signature = new Signature;

        $signature->book_id = $attributes['book'];
        $signature->chapter_id = $chapter->id;
        $signature->from_member = $attributes['listener'];
        $signature->sig_date = $attributes['date'];
        $signature->evaluation = $attributes['evaluation'];

        $request->user()->signatures()->save($signature);

        if($attributes['evaluation']) {
            return response()->json([
                'title' => '<span class="text-success">Evaluation Added Successfully</span>', 
                'message'=> 'Animo! Another chapter complete! Keep Going!'
            ]);
        }

        return response()->json([
            'title' => '<span class="text-success">Signature Added Successfully</span>', 
            'message' => 'Animo! You can do it! Father and Mother are with you!'
        ]);
    }

    public function updateSignature(Signature $signature, Request $request) {

        $currentDate = date('m/d/Y');

        $attributes = $request->validate([
            'date' => 'required|before_or_equal:' . $currentDate,
            'listener' => 'required|max:255'
        ]);

        $signature->from_member = $attributes['listener'];
        $signature->sig_date = $attributes['date'];
        $signature->save();

        return response()->json([
            'title' => '<span class="text-success">Signature Updated Successfully</span>', 
            'message' => 'GBY! Thank you! We Love You!'
        ]);
    }

    public function deleteSignature(Signature $signature) {

        $signature->delete();

        return response()->json([
            'title' => '<span class="text-success">Signature Removed Successfully</span>', 
            'message' => 'GBY! Thank you! We Love You!'
        ]);
    }

}
