
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('create user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <div class="relative">
                                <x-text-input id="name" class="block mt-1 w-full 
                                @error('name') border-red-500 @enderror" 
                                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                
                                <!-- Error Icon -->
                                @error('name')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </span>
                                @enderror
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                        </div>

                        <!-- Nama Lengkap -->
                        <div class="mt-4">
                            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                            <div class="relative">
                                <x-text-input id="nama_lengkap" class="block mt-1 w-full 
                                @error('nama_lengkap') border-red-500 @enderror" 
                                type="text" name="nama_lengkap" :value="old('nama_lengkap')" required autocomplete="nama_lengkap" />
                                
                                <!-- Error Icon -->
                                @error('nama_lengkap')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </span>
                                @enderror
                            </div>
                            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                        </div>

                        <!-- HP -->
                        <div class="mt-4">
                            <x-input-label for="hp" :value="__('HP')" />
                            <div class="relative">
                                <x-text-input id="hp" class="block mt-1 w-full 
                                @error('hp') border-red-500 @enderror" 
                                type="text" name="hp" :value="old('hp')" required autocomplete="tel" />
                                
                                <!-- Error Icon -->
                                @error('hp')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </span>
                                @enderror
                            </div>
                            <x-input-error :messages="$errors->get('hp')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <div class="relative">
                                <x-text-input id="email" class="block mt-1 w-full 
                                @error('email') border-red-500 @enderror" 
                                type="email" name="email" :value="old('email')" required autocomplete="username" />
                                
                                <!-- Error Icon -->
                                @error('email')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </span>
                                @enderror
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <div class="relative">
                                <x-text-input id="password" class="block mt-1 w-full 
                                @error('password') border-red-500 @enderror" 
                                type="password" name="password" required autocomplete="new-password" />
                                
                                <!-- Error Icon -->
                                @error('password')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </span>
                                @enderror
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                        </div>


                        <!-- Lever -->
                        <div class="mt-4">
                            <x-input-label for="role" :value="__('Level')" />
                        
                            <select id="role" name="role" class="bg-white dark:bg-gray-800 block mt-1 w-full border rounded-md shadow-sm" @error('role') is-invalid @enderror" required>
                                <option value="" disabled selected>Select a role</option>
                                @if (Auth::user()->isAdmin())
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                @endif
                                <option value="user">User</option>
                            </select>
                        
                            @error('role')
                                <div class="flex items-center mt-2 text-red-500">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 0a10 10 0 100 20 10 10 0 000-20zm0 18a8 8 0 100-16 8 8 0 000 16zm1-13h-2v6h2V5zm0 8h-2v2h2v-2z"/></svg>
                                    <span class="text-sm">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        
                
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                
                            <x-primary-button class="ms-4">
                                {{ __('Create user') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

