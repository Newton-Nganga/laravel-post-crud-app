@props(['post'])

<div class="card">
    {{-- Title --}}
    <h2 class="font-bold text-xl">{{ $post->title }}</h2>

    {{-- Author and Date --}}
    <div class="text-xs font-light mb-4">
        <span>
            {{-- Posted {{ $post->created_at | date('d MMM yyyy') }} by --}}
            {{-- carbon used for dates --}}
            Posted {{ $post->created_at->diffForHumans() }} by
        </span>
        <a href="{{ route("posts.users", $post->user) }}" class="text-blue-500 font-medium">{{ $post->user->username }}</a>
    </div>
    <div class="text-sm">
        {{-- show only the specified words in the body of the post --}}
    <p>{{ Str::words($post->body, 15)}}</p>  
    </div>
</div>