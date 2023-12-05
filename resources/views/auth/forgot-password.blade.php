<x-guest-layout>
    {{-- <div class="mb-4 text-sm text-white">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div> --}}

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-div one">
            <div class="i"><i class="fas fa-user"></i>
            </div>
            <div class="div">
                    <h5>Email</h5>
                    <input class="input" id="email" type="email" name="email" :value="old('email')">
                   
            </div>
         </div>
         @if ($errors->has('email'))
      <div class="error-message mt-2">
          {{ $errors->first('email') }}
      </div>
      @endif

        {{-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> --}}

        <div class="div">
            <x-primary-button class="btn">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
