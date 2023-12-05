<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        {{-- <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> --}}
        <h2 class="title">Register</h2>
        <div class="input-div one">
            <div class="i"><i class="fas fa-user"></i>
            </div>
            <div class="div">
                    <h5>Name</h5>
                    <input id="name" type="name" name="name":value="old('name')" class="input">
                   
            </div>
         </div>
         @if ($errors->has('name'))
      <div class="error-message mt-2">
          {{ $errors->first('name') }}
      </div>
      @endif


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


          {{-- <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> --}}

        <!-- Password -->
        <div class="input-div one">
            <div class="i"><i class="fas fa-lock"></i>
            </div>
            <div class="div">
                    <h5>Password</h5>
                    <input id="password" type="password" name="password" class="input">
                   
            </div>
         </div>
         @if ($errors->has('password'))
      <div class="error-message mt-2">
          {{ $errors->first('password') }}
      </div>
      @endif



        {{-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

        <!-- Confirm Password -->
        <div class="input-div one">
            <div class="i"><i class="fas fa-lock"></i>
            </div>
            <div class="div">
                    <h5>Confirm Password</h5>
                    <input id="password_confirmation" type="password_confirmation" name="password_confirmation" class="input">
                   
            </div>
         </div>
         @if ($errors->has('password_confirmation'))
      <div class="error-message mt-2">
          {{ $errors->first('password_confirmation') }}
      </div>
      @endif
        {{-- <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div> --}}

        <a  href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <div class="div">
           

            <x-primary-button class="btn">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
