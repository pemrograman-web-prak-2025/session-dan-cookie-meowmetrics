<?php
namespace App\Policies;
use App\Models\Answer;
use App\Models\User;
class AnswerPolicy {
    public function update(User $user, Answer $answer){ return $user->id === $answer->user_id; }
    public function delete(User $user, Answer $answer){ return $user->id === $answer->user_id; }
}
