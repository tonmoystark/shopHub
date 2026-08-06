@extends('layouts.frontend')

@section('content')

<x-account.page
    title="My Profile"
    description="Manage your account information and profile picture."
>

<x-ui.flash />
    <x-ui.card class="p-8">

        <form
            action="{{ route('account.profile.update') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-8"
        >

            @csrf
            @method('PATCH')

            {{-- Avatar --}}
            <div class="flex flex-col items-center">

                @if($user->avatar)

                    <img
                        src="{{ $user->avatarUrl }}"
                        alt="{{ $user->name }}"
                        class="h-28 w-28 rounded-full border-4 border-gray-200 object-cover"
                    >

                @else

                    <div class="flex h-28 w-28 items-center justify-center rounded-full bg-blue-600 text-4xl font-bold text-white">

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>

                @endif

                <div class="mt-6 w-full max-w-sm">

                    <x-ui.input
                        type="file"
                        name="avatar"
                        label="Profile Picture"
                        accept="image/*"
                    />

                </div>

            </div>

            <div class="grid gap-6 md:grid-cols-2">

                <x-ui.input
                    name="name"
                    label="Full Name"
                    :value="auth()->user()->name"
                    required
                />

                <x-ui.input
                    type="email"
                    name="email"
                    label="Email Address"
                    :value="auth()->user()->email"
                    required
                />

            </div>

            <div class="flex justify-end">

                <x-ui.button
                    type="submit"
                >
                    Save Changes
                </x-ui.button>

            </div>

        </form>

    </x-ui.card>

</x-account.page>

@endsection