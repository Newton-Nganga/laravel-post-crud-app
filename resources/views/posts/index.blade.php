<x-layout>

    {{-- Directive that only shows to the logged in users --}}
    {{-- @auth
        <h1 class="text-red-600">Hello, logged in user</h1>
    @endauth --}}

    {{-- Directive that only shows to the guests --}}
    {{-- @guest
        <h1 class="text-red-600">Hello Guest</h1>
    @endguest --}}

    <h1 class="title">Latest posts</h1>

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
