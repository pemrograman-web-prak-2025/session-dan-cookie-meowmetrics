@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <h2>Detail Pertanyaan</h2>
    <p><strong>Tanggal:</strong> {{ $question->date }}</p>
    <p><strong>Pertanyaan:</strong> {{ $question->question_text }}</p>

    <hr>
    <h3>Jawaban Pengguna</h3>

    @if($question->answers->count() > 0)
      <table class="table">
        <thead>
          <tr>
            <th>Nama User</th>
            <th>Jawaban</th>
            <th>Dikirim</th>
          </tr>
        </thead>
        <tbody>
          @foreach($question->answers as $a)
          <tr>
            <td>{{ $a->user->name }}</td>
            <td>{{ $a->answer_text }}</td>
            <td>{{ $a->created_at->format('d M Y H:i') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p class="text-muted">Belum ada jawaban untuk pertanyaan ini.</p>
    @endif

    <a href="{{ route('admin.questions.index') }}" class="btn btn-secondary mt-3">Kembali</a>
  </div>
</div>
@endsection
