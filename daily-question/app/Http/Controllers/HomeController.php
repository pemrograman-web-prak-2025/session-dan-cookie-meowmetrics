<?php
namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;
class HomeController extends Controller {
    public function index(){
        $today = now()->toDateString();
        $question = Question::where('date',$today)->first();
        $myAnswer = null;
        if(auth()->check() && $question){
            $myAnswer = Answer::where('user_id',auth()->id())->where('question_id',$question->id)->first();
        }
        return view('home',compact('question','myAnswer'));
    }
    public function history(){
        $questions = Question::orderBy('date','desc')->paginate(10);
        return view('history',compact('questions'));
    }
}

