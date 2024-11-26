
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('create siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('siswa.store') }}">
                        @csrf
                
                        <!-- Name -->
                        <div>
                            <x-input-label for="nisn" :value="__('NISN')" />
                            <div class="relative">
                                <x-text-input id="nisn" class="block mt-1 w-full 
                                @error('nisn') border-red-500 @enderror" 
                                type="number" name="nisn" :value="old('nisn')" required autofocus autocomplete="nisn" />
                                <span class="text-xs text-gray-500">Isi dengan 10 angka</span>
                                
                                <!-- Error Icon -->
                                @error('nisn')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </span>
                                @enderror
                            </div>
                            <x-input-error :messages="$errors->get('nisn')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="nis" :value="__('NIS')" />
                            <div class="relative">
                                <x-text-input id="nis" class="block mt-1 w-full 
                                @error('nis') border-red-500 @enderror" 
                                type="number" name="nis" :value="old('nis')" required autofocus autocomplete="nis" />
                                
                                <!-- Error Icon -->
                                @error('nis')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </span>
                                @enderror
                            </div>
                            <x-input-error :messages="$errors->get('nis')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                        </div>

                        <!-- Nama Lengkap -->
                        <div class="mt-4">
                            <x-input-label for="nama" :value="__('Nama')" />
                            <div class="relative">
                                <x-text-input id="nama" class="block mt-1 w-full 
                                @error('nama') border-red-500 @enderror" 
                                type="text" name="nama" :value="old('nama')" required autocomplete="nama" />
                                
                                <!-- Error Icon -->
                                @error('nama')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </span>
                                @enderror
                            </div>
                            <x-input-error :messages="$errors->get('nama')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="id_kelas" :value="__('Kelas')" />
                        
                            <select id="id_kelas" name="id_kelas" class="bg-white dark:bg-gray-800 block mt-1 w-full border rounded-md shadow-sm" required>
                                <option value="" disabled selected>Pilih kelas</option>
                                @foreach ($kelasList as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        
                            @error('id_kelas')
                                <div class="flex items-center mt-2 text-red-500">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 100 20 10 10 0 000-20zm0 18a8 8 0 100-16 8 8 0 000 16zm1-13h-2v6h2V5zm0 8h-2v2h2v-2z"/>
                                    </svg>
                                    <span class="text-sm">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- alamat -->
                        <div class="mt-4">
                            <x-input-label for="alamat" :value="__('Alamat')" />
                            <div class="relative">
                                <x-text-input id="alamat" class="block mt-1 w-full 
                                @error('alamat') border-red-500 @enderror" 
                                type="text" name="alamat" :value="old('alamat')" required autocomplete="tel" />
                                
                                <!-- Error Icon -->
                                @error('alamat')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </span>
                                @enderror
                            </div>
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="no_telp" :value="__('No Telp')" />
                            <div class="relative">
                                <x-text-input id="no_telp" class="block mt-1 w-full 
                                @error('no_telp') border-red-500 @enderror" 
                                type="number" name="no_telp" :value="old('no_telp',)" required autocomplete="username" />
                                
                                <!-- Error Icon -->
                                @error('no_telp')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </span>
                                @enderror
                            </div>
                            <x-input-error :messages="$errors->get('no_telp')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="id_spp" :value="__('Spp')" />
                        
                            <select id="id_spp" name="id_spp" class="bg-white dark:bg-gray-800 block mt-1 w-full border rounded-md shadow-sm" required>
                                <option value="" disabled selected>Pilih spp</option>
                                @foreach ($sppList as $spp)
                                    <option value="{{ $spp->id }}">{{ $spp->tahun }} -> {{ $spp->nominal }}</option>
                                @endforeach
                            </select>
                        
                            @error('id_spp')
                                <div class="flex items-center mt-2 text-red-500">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 100 20 10 10 0 000-20zm0 18a8 8 0 100-16 8 8 0 000 16zm1-13h-2v6h2V5zm0 8h-2v2h2v-2z"/>
                                    </svg>
                                    <span class="text-sm">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                
                        <div class="flex items-center justify-end mt-4">
                            
                
                            <x-primary-button class="ms-4">
                                {{ __('Create siswa') }}
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

