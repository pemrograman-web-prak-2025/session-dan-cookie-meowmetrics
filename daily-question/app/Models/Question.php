<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Question extends Model {
    protected $fillable = ['question_text','date','created_by'];
    public function answers(){ return $this->hasMany(Answer::class); }
    public function creator(){ return $this->belongsTo(User::class,'created_by'); }
}
