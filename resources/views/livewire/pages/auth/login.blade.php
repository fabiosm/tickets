<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="login-form" wire:submit="login">
        <h3 class="login-head"><i class="bi bi-person me-2"></i>SIGN IN</h3>
        <div class="mb-3">
            <x-input-label for="email" class="form-label" :value="__('Email')" />
            <x-text-input
                wire:model="form.email"
                id="email"
                class="form-control"
                type="email"
                name="email"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <x-input-label for="password" class="form-label" :value="__('Password')" />

            <x-text-input
                wire:model="form.password"
                id="password"
                class="form-control"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-2">

            <div class="mb-3 btn-container d-grid">
                <x-primary-button class="btn btn-primary btn-block">
                    <i class="bi bi-box-arrow-in-right me-2 fs-5"></i>
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="#" data-toggle="flip">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
    </form>
    <form class="forget-form" wire:submit="sendPasswordResetLink">
        <h3 class="login-head"><i class="bi bi-person-lock me-2"></i>Forgot Password ?</h3>
        <div class="mb-3">
            <x-input-label class="form-label" for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="form-control" type="email" name="email" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-3 btn-container d-grid">
            <x-primary-button class="btn btn-primary btn-block">
                <i class="bi bi-unlock me-2 fs-5"></i>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
        <div class="mb-3 mt-3">
            <p class="semibold-text mb-0">
                <a href="#" data-toggle="flip">
                    <i class="bi bi-chevron-left me-1"></i> Back to Login
                </a>
            </p>
        </div>
    </form>
</div>
@script
<script>
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
@endscript
