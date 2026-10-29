<x-layouts.app title="Data Obat">

    {{-- ================= HEADER ================= --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-slate-800">
            Data Obat
        </h2>

        <a href="{{ route('obat.create') }}"
           class="inline-flex items-center gap-2 px-5 py-2.5
                  bg-primary hover:bg-primary/90
                  text-white text-sm font-semibold
                  rounded-xl transition">

            <i class="fas fa-plus text-xs"></i>
            Tambah Obat
        </a>
    </div>

    {{-- ================= NOTIFIKASI ================= --}}
    @if(session('message'))
        <div role="alert"
             class="mb-6 flex items-center justify-between gap-3
                    rounded-xl border border-green-200
                    bg-green-50 px-5 py-4 text-green-700">

            <div class="flex items-center gap-3">
                <i class="fas fa-circle-check text-lg"></i>

                <span class="text-sm font-medium">
                    {{ session('message') }}
                </span>
            </div>

            <button type="button"
                    onclick="this.closest('[role=alert]').remove()"
                    class="text-green-700 hover:text-green-900">

                <i class="fas fa-xmark"></i>
            </button>
        </div>
    @endif

    {{-- ================= CARD ================= --}}
    <div class="card bg-base-100 shadow-md rounded-2xl border border-slate-200">

        <div class="card-body p-0">

            <div class="overflow-x-auto">

                <table class="table w-full">

                    {{-- ================= TABLE HEAD ================= --}}
                    <thead class="bg-slate-50 text-slate-500 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-4">Nama Obat</th>
                            <th class="px-6 py-4">Kemasan</th>
                            <th class="px-6 py-4">Harga</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>

                    {{-- ================= TABLE BODY ================= --}}
                    <tbody class="text-sm text-slate-700">

                        @forelse($obats as $obat)

                            <tr class="border-t border-slate-100 hover:bg-slate-50 transition">

                                {{-- Nama Obat --}}
                                <td class="px-6 py-4 font-semibold text-slate-800">
                                    {{ $obat->nama_obat }}
                                </td>

                                {{-- Kemasan --}}
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1
                                                 text-xs font-semibold rounded-full
                                                 bg-green-100 text-green-600">

                                        {{ $obat->kemasan ?? '-' }}

                                    </span>
                                </td>

                                {{-- Harga --}}
                                <td class="px-6 py-4 font-semibold text-slate-800">
                                    Rp {{ number_format($obat->harga, 0, ',', '.') }}
                                </td>

                                {{-- Aksi --}}
                                <td class="px-6 py-4 text-right">

                                    <div class="flex justify-end gap-2">

                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('obat.edit', $obat->id) }}"
                                           class="inline-flex items-center gap-1
                                                  px-4 py-2
                                                  bg-amber-500 hover:bg-amber-600
                                                  text-white text-xs font-semibold
                                                  rounded-lg transition">

                                            <i class="fas fa-pen text-xs"></i>
                                            Edit
                                        </a>

                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('obat.destroy', $obat->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus obat ini?')"
                                                    class="inline-flex items-center gap-1
                                                           px-4 py-2
                                                           bg-red-500 hover:bg-red-600
                                                           text-white text-xs font-semibold
                                                           rounded-lg transition">

                                                <i class="fas fa-trash text-xs"></i>
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            {{-- ================= DATA KOSONG ================= --}}
                            <tr>
                                <td colspan="4"
                                    class="text-center py-12 text-slate-400">

                                    <i class="fas fa-inbox text-3xl mb-3 block"></i>

                                    <p class="text-sm font-medium">
                                        Belum ada data obat
                                    </p>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-layouts.app>