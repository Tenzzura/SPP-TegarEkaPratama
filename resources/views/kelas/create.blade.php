
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('create kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('kelas.store') }}">
                        @csrf
                
                        <!-- Name -->
                        <div>
                            <x-input-label for="nama_kelas" :value="__('Nama Kelas')" />
                            <div class="relative">
                                <x-text-input id="nama_kelas" class="block mt-1 w-full 
                                @error('nama_kelas') border-red-500 @enderror" 
                                type="text" name="nama_kelas" :value="old('nama_kelas')" required autocomplete="nama_kelas" />
                                
                                <!-- Error Icon -->
                                @error('nama_kelas')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </span>
                                @enderror
                            </div>
                            <x-input-error :messages="$errors->get('nama_kelas')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="kompetensi_keahlian" :value="__('Kompetensi')" />
                            <div class="relative">
                                <x-text-input id="kompetensi_keahlian" class="block mt-1 w-full 
                                @error('kompetensi_keahlian') border-red-500 @enderror" 
                                type="text" name="kompetensi_keahlian" :value="old('kompetensi_keahlian')" required autocomplete="kompetensi_keahlian" />
                                
                                <!-- Error Icon -->
                                @error('kompetensi_keahlian')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </span>
                                @enderror
                            </div>
                            <x-input-error :messages="$errors->get('kompetensi_keahlian')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
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

