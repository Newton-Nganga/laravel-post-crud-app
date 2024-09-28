<x-layout>
    <h1 class="title">Register new account</h1>

    <div class="mx-auto max-w-screen card">
        <form action="{{ route('login') }}" method="post">
            @csrf {{-- a directive incharge of security --}}

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

            <div class="mb-4">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>

            {{-- login failed error message --}}
            @error('failed')
                <p class="error">{{ $message }}</p>
            @enderror
            {{-- submit button --}}
            <button class="btn">Login</button>
    </form>
</div>
</x-layout>
