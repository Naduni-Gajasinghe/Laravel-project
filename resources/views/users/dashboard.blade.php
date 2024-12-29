<x-layout>
    <h1 class="title"><Hr></Hr>Welcome {{auth()->user()->name}},
    you have {{ $posts->total() }} posts</h1>

   
    
    {{--create post form--}}
    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new post</h2>

        

        {{--session messages--}}
    @if (session('success'))
        <x-flashMsg msg="{{ session('success') }}"/>
    @elseif (session('delete'))
        <x-flashMsg msg="{{ session('delete')}}"
        bg="bg-red-500"/>
    @endif
        

        <form action="{{ route('posts.store')}}" method="post">
            @csrf

            {{--post title--}}
            <div class="form-group mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title"  
                    class="input @error('title') error @enderror" 
                    value="{{ old('title') }}">
                @error('title')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{--post body--}}
            <div class="form-group mb-4">
                <label for="title">Post Content</label>

                <textarea name="body" rows="5" class="input @error('body') error @enderror" >
                    {{ old('body') }}
                </textarea>

                @error('body')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{--submit button--}}
            <button class="primary-btn">create</button>
        </form>
    </div>

    {{--user posts--}}
    <h2 class="font-bold mb-4">Your Latest Posts</h2>

    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post )
            <x-postCard :post="$post">

                {{--update posts--}}

                <a href="{{ route('posts.edit', $post) }}" class="bg-green-500 text-white px-2
                    py-1 text-xs rounded-md">Update</a>

                {{--delete posts--}}
                <form action="{{ route('posts.destroy', $post) }}
                " method="post">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-2
                    py-1 text-xs rounded-md">Delete</button>
                </form>
            </x-postCard>
        @endforeach
        </div>

        <div>
            {{ $posts->links() }}
        </div>

        

</x-layout>
