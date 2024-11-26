  <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
              {{ __('edit spp') }}
          </h2>
      </x-slot>

      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900 dark:text-gray-100">
                      <form method="POST" action="{{ route('spp.update', $spp->id) }}">
                          @csrf
                          @method('PUT')
                          <!-- Name -->
                          <div>
                              <x-input-label for="tahun" :value="__('Tahun')" />
                              <div class="relative">
                                  <x-text-input id="tahun" class="block mt-1 w-full 
                                  @error('tahun') border-red-500 @enderror" 
                                  type="text" name="tahun" :value="old('tahun', $spp->tahun)" required autocomplete="tahun" />
                                
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
                              <div class="relative">
                                  <x-text-input id="nominal" class="block mt-1 w-full 
                                  @error('nominal') border-red-500 @enderror" 
                                  type="text" name="nominal" :value="old('nominal', $spp->nominal)" required autocomplete="nominal" />
                                
                                  <!-- Error Icon -->
                                  @error('nominal')
                                  <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                      <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                      </svg>
                                  </span>
                                  @enderror
                              </div>
                              <x-input-error :messages="$errors->get('nominal')" class="mt-2 text-sm text-red-600 bg-red-100 border border-red-400 rounded-md p-2" />
                          </div>
                        
                
                          <div class="flex items-center justify-end mt-4">
                              
                
                              <x-primary-button class="ms-4">
                                  {{ __('Create spp') }}
                              </x-primary-button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </x-app-layout>
