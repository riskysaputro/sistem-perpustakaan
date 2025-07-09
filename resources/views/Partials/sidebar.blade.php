<aside class="w-64 bg-gray-800 text-white min-h-screen px-4 py-6">
    <nav class="space-y-2">
        <a href="{{ route('dashboard') }}" class="block hover:bg-gray-700 p-2 rounded">Dashboard</a>
        <a href="{{ route('anggota.index') }}" class="block hover:bg-gray-700 p-2 rounded">Kelola Anggota</a>
        <a href="{{ route('buku.index') }}" class="block hover:bg-gray-700 p-2 rounded">Kelola Buku</a>
        <a href="{{ route('kategori.index') }}" class="block hover:bg-gray-700 p-2 rounded">Kelola Kategori</a>
        <a href="{{ route('anggota.index') }}" class="block hover:bg-gray-700 p-2 rounded">Kelola User</a>
        <a href="{{ route('denda.index') }}" class="block hover:bg-gray-700 p-2 rounded">Kelola Denda</a>
        <a href="{{ route('peminjaman.index') }}" class="block hover:bg-gray-700 p-2 rounded">Kelola Transaksi</a>
    </nav>
    <div class="mt-20">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-800 p-1 rounded-md text-center ml-2">
                Logout
                <i class="fa-solid fa-right-from-bracket ml-2"></i>
            </button>
        </form>
    </div>
</aside>
