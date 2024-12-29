<x-layout>

    <a href="{{ route('dashboard')}}" class="block mb-2 
    text-xs text-blue-500">&larr; Go back to your dashboard</a>

    <div class="card">
    
        <h2 class="font-bold mb-4">Update your post</h2>
        <form action="{{ route('posts.update',$post)}}" method="post">
            @csrf
            @method('PUT')
            {{--post title--}}
            <div class="form-group mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title"  
                    class="input @error('title') error @enderror" 
                    value="{{ $post->title }}">
                @error('title')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{--post body--}}
            <div class="form-group mb-4">
                <label for="title">Post Content</label>

                <textarea name="body" rows="5" class="input @error('body') error @enderror" >
                    {{ $post->body }}
                </textarea>

                @error('body')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{--submit button--}}
            <button class="primary-btn">update</button>
        </form>
</div>
</x-layout>