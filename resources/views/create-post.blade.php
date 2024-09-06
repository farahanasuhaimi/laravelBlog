<x-layout>
    <div class="container py-md-5 container--narrow">
        <form action="/create-post" method="POST" style="width: 400px; margin: 0 auto;">
            <div class="form-group">
                @csrf
                <label for="blogpost-title" class="text-muted mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" id="blogpost-title" class="form-control form-control-lg form-control-title" placeholder="" autocomplete="off">
                @error('title')
                    <p class="m-1 small alert shadow-sm alert-danger">{{ $message }}</p>
                @enderror
                
            </div>
            <div class="form-group">
                <label for="blogpost-body" class="text-muted mb-1">Post Content:</label>
                <textarea name="body" id="blogpost-body" class="body-content tall-textarea form-control" type="text" placeholder="">{{ old('body') }}</textarea>
                @error('body')
                    <p class="m-1 small alert shadow-sm alert-danger">{{ $message }}</p>   
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save New Post</button>
        </form>
    </div>
    
</x-layout>