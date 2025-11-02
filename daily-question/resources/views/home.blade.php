@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card">
    <h2>Daily Question</h2>
    @if($question)
      <p class="text-muted">Pertanyaan untuk {{ \Carbon\Carbon::parse($question->date)->translatedFormat('j F Y') }}</p>
      <h3>{{ $question->question_text }}</h3>

      @auth
        <form method="POST" action="{{ route('answers.store') }}">
          @csrf
          <input type="hidden" name="question_id" value="{{ $question->id }}">
          <div>
            <textarea name="answer_text" rows="5" required class="w-full border p-2">{{ old('answer_text', $myAnswer->answer_text ?? '') }}</textarea>
          </div>
          <div class="mt-2">
            <button class="btn btn-primary">Simpan</button>
            @if($myAnswer)
              <a href="{{ route('answers.edit', $myAnswer) }}" class="btn btn-secondary">Edit</a>
            @endif
          </div>
        </form>
      @else
        <p>Silakan <a href="{{ route('login') }}">login</a> atau <a href="{{ route('register') }}">register</a> untuk menjawab.</p>
      @endauth
    @else
      <p class="text-muted">Belum ada pertanyaan untuk hari ini.</p>
      @auth
        @if(auth()->user()->role && auth()->user()->role->name === 'admin')
          <a href="{{ route('admin.questions.create') }}" class="btn btn-primary">Buat Pertanyaan Hari Ini</a>
        @endif
      @endauth
    @endif

    <a href="{{ route('history') }}" class="mt-4 d-block">Lihat history pertanyaan</a>
  </div>
</div>
@endsection
