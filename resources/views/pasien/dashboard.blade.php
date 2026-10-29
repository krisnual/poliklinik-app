<x-layouts.app title="Dashboard Pasien">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">
            Dashboard Pasien
        </h1>

        <p class="mt-2 text-slate-500">
            Selamat datang di Sistem Informasi Poliklinik.
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6">

        <h2 class="text-xl font-semibold text-slate-800 mb-3">
            Halo, Selamat Datang Pasien!
        </h2>

        <p class="text-slate-600 mb-5">
            Silakan melakukan pendaftaran pemeriksaan
            melalui menu yang tersedia.
        </p>

        <a href="{{ route('pasien.daftar') }}"
           class="inline-block bg-indigo-600 hover:bg-indigo-700
                  text-white px-5 py-3 rounded-xl transition">
            Pendaftaran Periksa
        </a>

    </div>

</x-layouts.app>