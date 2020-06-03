<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{ $memo->title ?? '' }}">
</div>
<div class="form-group">
    <label for="content">Content</label>
    <textarea id="content" class="form-control" name="content">{{ $memo->content ?? '' }}</textarea>
</div>
<button type="submit" class="btn btn-sm btn-outline-secondary">Submit</button>
