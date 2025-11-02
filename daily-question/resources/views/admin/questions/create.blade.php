@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <h2>Buat Pertanyaan Baru</h2>

    <form action="{{ route('admin.questions.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="question_text">Teks Pertanyaan</label>
        <textarea name="question_text" id="question_text" rows="4" class="form-control" required>{{ old('question_text') }}</textarea>
        @error('question_text') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <div class="mb-3">
        <label for="date">Tanggal</label>
        <input type="date" name="date" id="date" class="form-control" required value="{{ old('date') }}">
        @error('date') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('admin.questions.index') }}" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
@endsection
