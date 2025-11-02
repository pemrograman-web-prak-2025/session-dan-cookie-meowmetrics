<?php
namespace App\Http\Controllers;
use App\Models\Question;
use Illuminate\Http\Request;
class QuestionController extends Controller {
    public function __construct(){ $this->middleware(['auth','is_admin']); }
    public function index(){ $questions = Question::with('creator')->orderBy('date','desc')->paginate(10); return view('admin.questions.index',compact('questions')); }
    public function create(){ return view('admin.questions.create'); }
    public function store(Request $r){ $r->validate(['question_text'=>'required','date'=>'required|date|unique:questions,date']); Question::create($r->only('question_text','date') + ['created_by'=>auth()->id()]); return redirect()->route('admin.questions.index')->with('success','Created'); }
    public function show(Question $question){ return view('admin.questions.show',compact('question')); }
    public function edit(Question $question){ return view('admin.questions.edit',compact('question')); }
    public function update(Request $r, Question $question){ $r->validate(['question_text'=>'required','date'=>'required|date|unique:questions,date,'.$question->id]); $question->update($r->only('question_text','date')); return redirect()->route('admin.questions.index')->with('success','Updated'); }
    public function destroy(Question $question){ $question->delete(); return back()->with('success','Deleted'); }
}
