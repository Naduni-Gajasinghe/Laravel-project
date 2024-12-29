<x-layout>
    <div class="registration-container">
        <div class="form-wrapper">
            <h1>Register</h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
        
                {{-- Username Field --}}
                <div class="form-group mb-4">
                    <label for="name">Username</label>
                    <input type="text" name="name" id="name" 
                        class="input @error('name') error @enderror" 
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
        
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
        
                {{-- Confirm Password Field --}}
                <div class="form-group mb-4">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                        class="input @error('password_confirmation') error @enderror">
                    @error('password_confirmation')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
        
                {{-- Submit Button --}}
                <button type="submit" class="primary-btn">Register</button>
            </form>
        </div>
        
    </div>
</x-layout>
