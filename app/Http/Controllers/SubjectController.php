<?php

namespace App\Http\Controllers;
use App\Models\Subject;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        //load all subjects and relations with eager loading
        $subjects = Subject::with(['offers'])->get();
        return $subjects;
    }

    //find Subject by a given id
    public function findByID(string $subid) {
        $subject = Subject::where('id',$subid)->with(['offers'])->first();
        return $subject != null? response()->json($subject,200) :response()->json(null, 200);
    }

}
