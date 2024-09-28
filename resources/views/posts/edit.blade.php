<x-layout>

    {{-- go back to the dashboard --}}
    <a href="{{ route('dashboard') }}" class="block mb-2 text-xs text-blue-500">&larr; Go back to your dashboard</a>

    
   {{-- Update a Post Form --}}
   <div class="card mb-4">
    <h2 class="font-bold mb-4">Update a post</h2>
    {{-- the form posts by calling the method "store" in the post controller --}}
    <form action="{{ route('posts.edit') }}" method="post">
        @csrf
        @method('PUT')
        {{-- Post Title --}}
        <div class="mb-4">
            <label for="title">Post Title</label>
            <input type="text" name="title" id="" class="input @error('title') ring-red-500 @enderror"
           value="{{ $post->title }}>
        @error('title')
          <p class="error" >{{ $message }}</p>
        @enderror
    </div>
    {{-- Post Body --}}
    <div class="mb-4">
        <label for="title">Post Content</label>
        <textarea name="body" id rows="5">{{ $post->body }}</textarea>
        @error('body')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
    {{-- create button --}}
    <button class="btn">Update Post</button>
</form>
</div> 
</x-layout>