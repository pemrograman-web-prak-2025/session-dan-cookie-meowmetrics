@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card">
    <h2>Manage Questions</h2>
    <a href="{{ route('admin.questions.create') }}" class="btn btn-primary">Buat</a>
    <table class="table mt-3">
      <thead><tr><th>Date</th><th>Pertanyaan</th><th>Actions</th></tr></thead>
      <tbody>
        @foreach($questions as $q)
        <tr>
          <td>{{ $q->date }}</td>
          <td>{{ $q->question_text }}</td>
          <td>
            <a href="{{ route('admin.questions.edit',$q) }}" class="btn btn-sm">Edit</a>
            <form method="POST" action="{{ route('admin.questions.destroy',$q) }}" style="display:inline;">
              @csrf @method('DELETE')
              <button class="btn btn-sm">Hapus</button>
            </form>
            <a href="{{ route('admin.questions.show',$q) }}" class="btn btn-sm">Lihat Jawaban</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $questions->links() }}
  </div>
</div>
@endsection
