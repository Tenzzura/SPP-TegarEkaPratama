<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Siswa') }}
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

                    <a href="{{Route('pembayaran.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                        <i class="fa fa-plus mr-2"></i> Tambah pembayaran
                    </a>

                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 mt-4">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Petugas</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">NISN</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal Bayar</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Bulan Bayar</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tahun Bayar</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nominal SPP</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jumlah Bayar</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                            @foreach ($pembayaran as $index => $pembayarans)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ ($pembayaran->currentPage() - 1) * $pembayaran->perPage() + $index + 1 }}</td>
                                        
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $userList->first()?->name ?? 'N/A' }}
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{$pembayarans->siswa->nisn}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{$pembayarans->tgl_bayar}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{$pembayarans->bulan_dibayar}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{$pembayarans->tahun_dibayar}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        @if($pembayarans->isPaidOff())
                                            <span class="text-green-500 font-semibold">
                                                SPP Sudah Lunas <br> hingga {{ $pembayarans->calculateMonthsCovered() }} bulan ke depan
                                            </span>
                                        @else
                                            Rp.{{ number_format($pembayarans->remainingBalance(), 2, ',', '.') }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">Rp.{{$pembayarans->jumlah_bayar}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="flex space-x-2">
                                            <!-- Edit Button -->
                                            <a href="{{route('pembayaran.edit', $pembayarans->id_pembayaran)}}" class="px-5 py-2.5 rounded-lg text-sm tracking-wider font-medium border border-blue-700 outline-none bg-blue-700 hover:bg-transparent text-white hover:text-blue-700 transition-all duration-300">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                            <!-- Delete Button with SweetAlert -->
                                            <button type="button" class="px-5 py-2.5 rounded-lg text-sm tracking-wider font-medium border border-red-700 outline-none bg-red-700 hover:bg-transparent text-white hover:text-red-700 transition-all duration-300" onclick="confirmDelete({{ $pembayarans->id_pembayaran }})">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                            <!-- Hidden form to delete user -->
                                            <form id="delete-form-{{ $pembayarans->id_pembayaran }}" action="{{ route('pembayaran.destroy', $pembayarans->id_pembayaran) }}" method="POST" style="display: none;">
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
                        {{ $pembayaran->links() }}
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
