<?php
namespace App\Http\Controllers;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
class AnswerController extends Controller {
    public function __construct(){ $this->middleware('auth'); }
    public function store(Request $r){
        $r->validate(['answer_text'=>'required','question_id'=>'required|exists:questions,id']);
        $data = ['user_id'=>auth()->id(),'question_id'=>$r->question_id,'answer_text'=>$r->answer_text];
        Answer::updateOrCreate(['user_id'=>auth()->id(),'question_id'=>$r->question_id],$data);
        return back()->with('success','Saved');
    }
    public function edit(Answer $answer){
        $this->authorize('update',$answer);
        return view('answers.edit',compact('answer'));
    }
    public function update(Request $r, Answer $answer){
        $this->authorize('update',$answer);
        $r->validate(['answer_text'=>'required']);
        $answer->update(['answer_text'=>$r->answer_text]);
        return redirect()->route('home')->with('success','Updated');
    }
    public function destroy(Answer $answer){
        $this->authorize('delete',$answer);
        $answer->delete();
        return back()->with('success','Deleted');
    }
}

