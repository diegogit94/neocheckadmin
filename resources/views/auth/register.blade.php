@extends('layouts.sidebar')

@section('page', 'Register')

@section('content')

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" name="register_form">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="country_id" value="{{ __('Country') }}" />
                <select id="country_id" name="country_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="select" name="country" required>
                    <option value="" selected>Choose Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                  </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="time_zone_id" value="{{ __('Time Zone') }}" />
                <select id="time_zone_id" name="time_zone_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="select" name="time_zone" required>
                    <option value="" selected>Choose Time Zone</option>
                    @foreach ($timeZones as $timeZone)
                        <option value="{{ $timeZone->id }}">{{ $timeZone->name }}</option>
                    @endforeach
                  </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="role_name" value="{{ __('Roles') }}" />
                @foreach ($roles as $role)
                    <input type="checkbox" name="role_name" value="{{ $role->name }}">
                    <label for="role_name">{{ $role->name }}</label>
                    <br>
                @endforeach
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
            <div>
                <a type="button" class="bg-red-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer" href="{{ route('users.index') }}">
                    {{ __('Cancel') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

@endsection

<script>
    
    type = "text/javascript" > checkBoxLimit()

            function checkBoxLimit() {
                var checkBoxGroup = document.forms['register_form']['role_name'];
                var limit = 1;
                for (var i = 0; i < checkBoxGroup.length; i++) {
                    checkBoxGroup[i].onclick = function() {
                        var checkedcount = 0;
                        for (var i = 0; i < checkBoxGroup.length; i++) {
                            checkedcount += (checkBoxGroup[i].checked) ? 1 : 0;
                        }
                        if (checkedcount > limit) {
                            console.log("Por favor, seleccionar solo " + limit + " checkbox.");
                            alert("Por favor, seleccionar solo " + limit + " checkbox.");
                            this.checked = false;
                        }
                    }
                }
            }

</script>