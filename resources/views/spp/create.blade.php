
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('create spp') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('spp.store') }}">
                        @csrf
                
                        <!-- Name -->
                        <div>
                            <x-input-label for="tahun" :value="__('Tahun')" />
                            <div class="relative">
                                <x-text-input id="tahun" class="block mt-1 w-full 
                                @error('tahun') border-red-500 @enderror" 
                                type="text" name="tahun" :value="old('tahun')" required autocomplete="tahun" 
                                placeholder="tanggal/bulan/tahun" /> <!-- Add your placeholder here -->
                                
                                <!-- Error Icon -->
                                @error('tahun')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </span>
                                @enderror
                            </div>
                            <x-input-error :messages="$errors->get('tahun')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                        </div>
                        

                        <div>
                            <x-input-label for="nominal" :value="__('Nominal')" />
                            <div class="flex rounded-md shadow-sm mt-1">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 font-medium">
                                    Rp
                                </span>
                                <x-text-input id="nominal" class="flex-1 block w-full min-w-0 rounded-none rounded-r-md @error('nominal') border-red-500 @enderror" 
                                    type="number" name="nominal" :value="old('nominal')" required autocomplete="nominal" />
                            </div>
                            <x-input-error :messages="$errors->get('nominal')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            
                
                            <x-primary-button class="ms-4">
                                {{ __('Create user') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</x-app-layout>

