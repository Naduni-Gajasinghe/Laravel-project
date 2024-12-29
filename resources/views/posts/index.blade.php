<x-layout>
    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-600
     leading-tight tracking-wide text-center mb-8">
        Science Spectrum
    </h1>
    
        
    <h1 class="title">Latest Posts</h1>
    
    <div class="grid grid-cols-2 gap-6">
    
        @foreach ($posts as $post )
            <x-postCard :post="$post"/>
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>
</x-layout>
