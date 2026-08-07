@extends('layouts.frontend')

@section('content')

<x-account.page
    title="Change Password"
    description="Update your account password."
>

    <x-ui.flash />

    <x-ui.card class="p-8">

        <form
            action="{{ route('account.password.update') }}"
            method="POST"
            class="space-y-6"
        >

            @csrf
            @method('PATCH')

            <x-ui.input
                type="password"
                name="current_password"
                label="Current Password"
                required
            />

            <x-ui.input
                type="password"
                name="password"
                label="New Password"
                required
            />

            <x-ui.input
                type="password"
                name="password_confirmation"
                label="Confirm Password"
                required
            />

            <div class="flex justify-end">

                <x-ui.button
                    type="submit"
                >
                    Update Password
                </x-ui.button>

            </div>

        </form>

    </x-ui.card>

</x-account.page>

@endsection