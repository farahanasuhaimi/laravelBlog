<x-layout>
    <div class="container py-md-5 container--narrow">
        <form action="/create-post" method="POST" style="width: 400px; margin: 0 auto;">
            <div class="form-group">
                @csrf
                <label for="blogpost-title" class="text-muted mb-1">Title</label>
                <input type="text" name="title" id="blogpost-title" required class="form-control form-control-lg form-control-title" placeholder="" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="blogpost-body" class="text-muted mb-1">Post Content:</label>
                <textarea name="body" id="blogpost-body" required class="body-content tall-textarea form-control" type="text" placeholder=""></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save New Post</button>
        </form>
    </div>
    
</x-layout>