<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Auth::user()->family)
                        {{__('Your family:')}}
                        <b>{{Auth::user()->family->name}}</b>
                    @else
                        {{ __('Please create or find you family') }}

                        <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')"/>

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                            <form method="POST" action="{{ route('family.store') }}">
                            @csrf
                            {{ method_field('POST') }}
                            <!-- Name -->
                                <div>
                                    <x-label for="name" :value="__('Name')"/>
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"  required autofocus/>
                                </div>
                                <br>
                                <!-- Email -->
                                <div>
                                    <x-label for="description" :value="__('Description')"/>
                                    <x-input id="description" class="block mt-1 w-full" type="text" name="description" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <x-button class="ml-3">
                                        {{ __('Create new family') }}
                                    </x-button>
                                </div>
                            </form>

                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
