<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($message = Session::get('success'))
                        <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">{{$message}}</strong>
                        </div>
                    @endif

                    <a href="{{Route('kelas.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                        <i class="fa fa-plus mr-2"></i> Tambah Kelas
                    </a>

                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 mt-4">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Kelas</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kompetensi Keahlian</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                            @foreach ($kelases as $index => $kelas)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ ($kelases->currentPage() - 1) * $kelases->perPage() + $index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{$kelas->nama_kelas}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{$kelas->kompetensi_keahlian}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="flex space-x-2">
                                            <!-- Edit Button -->
                                            <a href="{{route('kelas.edit', $kelas->id)}}" class="px-5 py-2.5 rounded-lg text-sm tracking-wider font-medium border border-blue-700 outline-none bg-blue-700 hover:bg-transparent text-white hover:text-blue-700 transition-all duration-300">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                            <!-- Delete Button with SweetAlert -->
                                            <button type="button" class="px-5 py-2.5 rounded-lg text-sm tracking-wider font-medium border border-red-700 outline-none bg-red-700 hover:bg-transparent text-white hover:text-red-700 transition-all duration-300" onclick="confirmDelete({{ $kelas->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                            <!-- Hidden form to delete user -->
                                            <form id="delete-form-{{ $kelas->id }}" action="{{ route('kelas.destroy', $kelas->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $kelases->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Success alert timeout script
        document.addEventListener("DOMContentLoaded", function () {
            const alert = document.getElementById('success-alert');
            if (alert) {
                setTimeout(() => {
                    alert.style.opacity = '0'; // Fade out
                    setTimeout(() => {
                        alert.style.display = 'none'; // Remove from DOM
                    }, 500); // Wait for fade-out transition
                }, 3000); // Adjust this to set how long the message is visible
            }
        });

        // SweetAlert confirmation for delete
        function confirmDelete(userId) {
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: "Apakah Anda yakin ingin menghapus user ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form to delete the user
                    document.getElementById('delete-form-' + userId).submit();
                }
            });
        }
    </script>
</x-app-layout>
