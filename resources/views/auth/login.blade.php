<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img src="img/avatar.svg">
            <h2 class="title">Welcome Back!</h2>
            <!-- Email Address -->
            <div class="input-div one">
                <div class="i"><i class="fas fa-user"></i>
                </div>
                <div class="div">
                        <h5>Email</h5>
                        <input id="email" type="email" name="email":value="old('email')" class="input">
                       
                </div>
             </div>
             @if ($errors->has('email'))
          <div class="error-message mt-2">
              {{ $errors->first('email') }}
          </div>
          @endif


{{-- <div class="div">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                     autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div> --}}

            <!-- Password -->
            <div class="input-div pass">
                <div class="i"> 
                     <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                     <h5>Password</h5>
                     <input id="password" type="password" type="password" name="password" class="input">
             </div>
          </div>
          @if ($errors->has('password'))
          <div class="error-message mt-2">
              {{ $errors->first('password') }}
          </div>
      @endif
      


            
            {{-- <div class="div">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" 
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div> --}}

            <!-- Remember Me -->
            <div style="margin-bottom: 10px; margin-top: 10px">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-gray-600 shadow-sm focus:ring-gray-600" name="remember">
                    <span class="ml-2 text-sm text-gray-600 ">{{ __('Remember me') }}</span>
                </label>
            </div >
           
                @if (Route::has('password.request'))
                    <a  href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <div class="div">
                <x-primary-button class="btn">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>

</x-guest-layout>
