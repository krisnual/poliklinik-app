<x-layouts.app title="Dashboard Pasien">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">
            Dashboard Pasien
        </h1>

        <p class="text-slate-500 mt-2">
            Selamat datang di Sistem Informasi Poliklinik.
        </p>
    </div>

    {{-- Card --}}
    <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

        <div class="flex items-center gap-4 mb-5">

            <div class="w-14 h-14 bg-indigo-100 rounded-xl
                        flex items-center justify-center">
                <i class="fas fa-user-injured text-indigo-600 text-2xl"></i>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-800">
                    Halo, Selamat Datang Pasien!
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Silakan melakukan pendaftaran pemeriksaan
                    melalui menu yang tersedia.
                </p>
            </div>

        </div>

        <a href="{{ route('pasien.daftar') }}"
           class="inline-flex items-center gap-2 px-5 py-3
                  bg-indigo-600 hover:bg-indigo-700
                  text-white text-sm font-semibold
                  rounded-xl transition">

            <i class="fas fa-clipboard-list"></i>
            Pendaftaran Periksa
        </a>

    </div>

</x-layouts.app>