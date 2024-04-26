@extends('layouts.user')

@section('styles')
<style>
    #header {
        position: fixed;
        width: calc(100% - 40px);
    }

    main {
        padding: 0;
    }
</style>
@endsection

@section('content')
<x-guest-layout>
    <h1>Créer un compte</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="flex-row" style="gap: 20px; width:100%;">

            <div style="flex: 0 0 calc(50% - 10px);">
                <x-input-label for="first_name" :value="__('Prénom')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>
    
            <div style="flex: 0 0 calc(50% - 10px);">
                <x-input-label for="last_name" :value="__('Nom')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>
        </div>

        
    <!-- Email Address -->
    <div class="mt-4" style="width:100%;">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <!-- Phone -->
    <div class="mt-4" style="width:100%;">
        <x-input-label for="phone" :value="__('Téléphone')" />
        <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" :value="old('phone')" required />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>

    <div class="flex-row" style="gap: 20px; width:100%;">

        <!-- Password -->
    <div class="mt-4" style="flex: 0 0 calc(50% - 10px);">
        <x-input-label for="password" :value="__('Mot de passe')" />

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4" style="flex: 0 0 calc(50% - 10px);">
        <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                        type="password"
                        name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>
    </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Déjà un compte ?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Créer un compte') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@endsection