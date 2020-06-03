@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @foreach ($memos as $memo)
          <div class="card mb-3">
            <div class="card-header">{{ $memo->title }}</div>
            <div class="card-body">
              <p class="card-text">{{ $memo->content }}</p>
              <a href="{{ route('memo.edit', ['memo' => $memo->id]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
            </div>
          </div>
          @endforeach
        </div>
    </div>
</div>
@endsection
