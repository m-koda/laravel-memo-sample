@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{ route('memo.update', ['memo' => $memo->id]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('memo.form')
        </form>
        </div>
    </div>
</div>
@endsection
