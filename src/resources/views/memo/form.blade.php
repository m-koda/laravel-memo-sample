@if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endforeach
@endif

<div class="form-group">
    <memo-tags-input
        :initial-tags='@json($tagNames ?? [])'
    >
    </memo-tags-input>
</div>
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $memo->title ?? old('title') }}">
</div>
<div class="form-group">
    <label for="content">Content</label>
    <textarea id="content" class="form-control" name="content">{{ $memo->content ?? old('content') }}</textarea>
</div>
<button type="submit" class="btn btn-sm btn-outline-secondary">Submit</button>
