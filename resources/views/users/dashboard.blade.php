<x-layout>
    <h1 class="title">Welcome {{ auth()->user()->username }} yoy have {{ $posts->total }} posts</h1>

    {{-- Session Messages --}}
    @if (session('success'))
        {{-- pass the prop called msg to the flshMsg component --}}
        <x-flashMsg msg="{{ session('success') }}" bg="bg-yellow-500" />
    @elseif (session('delete'))
        <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
    @endif

    {{-- Create Post Form --}}
    <div class="card mb-4">
        <h2 class="font-bold mb-4"> Create a new post</h2>
        {{-- the form posts by calling the method "store" in the post controller --}}
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" id="" class="input @error('title') ring-red-500 @enderror"
                    value="{{ old('title') }}>
            @error('title')
              <p class="error" >{{ $message }}</p>
            @enderror
        </div>
        {{-- Post Body --}}
        <div class="mb-4">
            <label for="title">Post Title</label>
            <textarea name="body" id rows="5">{{ old('body') }}</textarea>
            @error('body')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        {{-- create button --}}
        <button class="btn">Create Post</button>
    </form>
</div>


{{-- Latest Posts --}}
<h2 class="font-bold mb-">Your Latest Posts</h2>

<div class="grid grid-cols-2 gap-6">
    @foreach ($posts as $post)
        {{-- //here we use the colon to pass the objection,collection as a prop --}}
        <x-postCard :post="$post">
            {{-- Update a post --}}
            <a href="{{ route('posts.edit',$post) }}" class="bg-green-500 text-white px-2 py-1 text-xs rounded-md">update</a>
            {{-- Delete a post--}}
            <form action="{{ route(posts.destroy), $post }}" method="post">
                @csrf
                {{-- the http method to be used for this form --}}
                @method('DELETE')
                <button class="bg-red-500 text-white px-2 py-1 text-xs rounded-md">Delete</button>
            </form>

        </x-postCard>
    @endforeach
</div>
<div>
    {{-- below is the pagination component by laravel --}}
    {{ $posts->links() }}
</div>
</x-layout>
