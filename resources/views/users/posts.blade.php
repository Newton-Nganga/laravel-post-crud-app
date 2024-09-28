<x-layout>
    {{-- username of the author --}}
    <h1 class="title">{{$user => username  }} 's posts {{ $posts -> $post }}</h1>


    {{-- Authors posts--}}
    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post)
            {{-- //here we use the colon to pass the objection,collection as a prop --}}
            <x-postCard :post="$post" />
        @endforeach
    </div>
    <div>
        {{ $posts->links }}
    </div>
</x-layout>