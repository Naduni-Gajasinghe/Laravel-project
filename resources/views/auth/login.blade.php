<x-layout>
    <div class="registration-container">
        <div class="form-wrapper">
            <h1>Login</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
        
                
        
                {{-- Email Field --}}
                <div class="form-group mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" 
                        class="input @error('email') error @enderror" 
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
        
                {{-- Password Field --}}
                <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" 
                        class="input @error('password') error @enderror">
                    @error('password')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{--remember checkbox--}}
                <div class="">
                    <input type="checkbox" name="remember"
                    id="remebmer">
                    <label for="remember">Remember me</label>
                </div>

                @error('failed')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
        
                
        
                {{-- Submit Button --}}
                <button type="submit" class="primary-btn">Login</button>
            </form>
        </div>
        
    </div>
</x-layout>
