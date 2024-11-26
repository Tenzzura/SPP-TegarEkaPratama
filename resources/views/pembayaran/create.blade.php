<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('pembayaran.store') }}">
                        @csrf
                        
                        <!-- NISN Selection -->
                        <div class="mt-4">
                            <x-input-label for="nisn" :value="__('NISN')" />
                            <select id="nisn" name="nisn" class="bg-white dark:bg-gray-800 block mt-1 w-full border rounded-md shadow-sm" required>
                                <option value="" disabled selected>Pilih NISN</option>
                                @foreach ($siswaList as $siswa)
                                    <option value="{{ $siswa->nisn }}">{{ $siswa->nisn }} - {{ $siswa->nama }}</option>
                                @endforeach
                            </select>
                        
                            @error('nisn')
                                <div class="flex items-center mt-2 text-red-500">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 100 20 10 10 0 000-20zm0 18a8 8 0 100-16 8 8 0 000 16zm1-13h-2v6h2V5zm0 8h-2v2h2v-2z"/>
                                    </svg>
                                    <span class="text-sm">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Tanggal Bayar -->
                        <div class="mt-4">
                            <x-input-label for="tgl_bayar" :value="__('Tanggal Bayar')" />
                            <x-text-input id="tgl_bayar" class="block mt-1 w-full @error('tgl_bayar') border-red-500 @enderror" type="number" name="tgl_bayar" :value="old('tgl_bayar')" required />
                            @error('tgl_bayar')
                                <div class="flex items-center mt-2 text-red-500">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 100 20 10 10 0 000-20zm0 18a8 8 0 100-16 8 8 0 000 16zm1-13h-2v6h2V5zm0 8h-2v2h2v-2z"/>
                                    </svg>
                                    <span class="text-sm">{{ $message }}</span>
                                </div>
                            @enderror                        </div>

                        <!-- Bulan Bayar -->
                        <div class="mt-4">
                            <x-input-label for="bulan_dibayar" :value="__('Bulan Bayar')" />
                            <select id="bulan_dibayar" name="bulan_dibayar" class="bg-white dark:bg-gray-800 block mt-1 w-full border rounded-md shadow-sm @error('bulan_dibayar') border-red-500 @enderror" required>
                                <option value="" disabled selected>Pilih Bulan</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                            
                            @error('bulan_dibayar')
                                <div class="flex items-center mt-2 text-red-500">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 100 20 10 10 0 000-20zm0 18a8 8 0 100-16 8 8 0 000 16zm1-13h-2v6h2V5zm0 8h-2v2h2v-2z"/>
                                    </svg>
                                    <span class="text-sm">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>


                        <!-- Tahun Bayar -->
                        <div class="mt-4">
                            <x-input-label for="tahun_dibayar" :value="__('Tahun Bayar')" />
                            <x-text-input id="tahun_dibayar" class="block mt-1 w-full @error('tahun_dibayar') border-red-500 @enderror" type="text" name="tahun_dibayar" :value="old('tahun_dibayar')" required />
                            @error('tahun_dibayar')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Jumlah Bayar -->
                        <div class="mt-4">
                            <x-input-label for="jumlah_bayar" :value="__('Jumlah Bayar')" />
                            <x-text-input id="jumlah_bayar" class="block mt-1 w-full @error('jumlah_bayar') border-red-500 @enderror" type="number" name="jumlah_bayar" :value="old('jumlah_bayar')" required />
                            @error('jumlah_bayar')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <!-- Submit Button -->
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
