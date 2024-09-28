<x-layout>
    <h1 class="title">Register new account</h1>

    <div class="mx-auto max-w-screen card">
        <form action="{{ route('register') }}" method="post">
            @csrf {{-- a directive incharge of security --}}

            {{-- username --}}
            <div class="mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" id=""
                    class="input  @error('username') ring-red-500 @enderror" value="{{ old('username') }}">

                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" id="" class="input @error('email') ring-red-500 @enderror"
                    value="{{ old('email') }}>
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
        </div>

        {{-- password --}}
        <div class="mb-4">
            <label for="password">Password</label>
            <input type="text" name="password" id=""
                class="input @error('password') ring-red-500 @enderror">
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- confirm password --}}
        <div class="mb-4">
            <label for="password_confirmation">Confirm Password</label>
            <input type="text" name="password_confirmation" id=""
                class="input @error('password') ring-red-500 @enderror">
        </div>

        {{-- submit button --}}
        <button class="btn">Register</button>
    </form>
</div>
</x-layout>
