@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card">
    <h2>History Pertanyaan</h2>
    @foreach($questions as $q)
      <div class="mb-3">
        <small class="text-muted">{{ $q->date }}</small>
        <h4>{{ $q->question_text }}</h4>
        <a href="{{ route('home') }}?q={{ $q->id }}">Lihat jawaban</a>
      </div>
    @endforeach
    {{ $questions->links() }}
  </div>
</div>
@endsection
