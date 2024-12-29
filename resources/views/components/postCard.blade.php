@props(['post', 'full'=>false ])

<div class="card">
    {{--title--}}
    <h2 class="font-bold text-xl">{{ $post->title}}</h2>

    {{--Auther and Date--}}
    <div class="text-xs font-light mb-4">
        <span>Posted {{$post->created_at->diffForHumans
            ()}} by</span>
        <a href="{{ route('posts.user',$post->user) }}" class="text-blue-500 font-medium">{{ $post->user->name}}</a>
    </div>

    {{--body--}}
    @if ($full)
    <div class="text-sm">
        <span>{{ $post->body}}</span>
        
    </div>
    @else
    <div class="text-sm">
        <span>{{ Str::words($post->body,15)}}</span>
        <a href="{{ route('posts.show',$post) }}" class="text-blue-500 ml-2">Read more </a>
    </div> 
    @endif
    
    <div class="flex itrms-center justify-end gap-4 mt-6">
        {{ $slot }}
    </div>
</div>