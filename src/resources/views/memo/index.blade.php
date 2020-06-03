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
              
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-sm btn-outline-secondary ml-2" data-toggle="modal" data-target="#deleteModal">Delete</button>
              
              <!-- Modal -->
              <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="deleteeModalLabel">Delete</h5>
                      <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">Are you sure to delete this?</div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">No</button>
                      <form action="{{ route('memo.destroy', ['memo' => $memo->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          {{ $memos->links() }}
        </div>
    </div>
</div>
@endsection
