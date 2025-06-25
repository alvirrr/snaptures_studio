@extends('admin.layout')

@section('title', 'Data Member')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Data Member</h1>

        {{-- Search --}}
        <form action="{{ route('admin.members') }}" method="GET" class="flex items-center gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/email..."
                class="px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm" />
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm">Cari</button>
        </form>
    </div>

    @if (request('search'))
        <p class="mb-4 text-sm text-gray-600">Hasil pencarian untuk: <strong>{{ request('search') }}</strong></p>
    @endif

    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded-lg transition">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-600 text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4 text-left">ID</th>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Email</th>
                    <th class="px-6 py-4 text-left">Alamat</th>
                    <th class="px-6 py-4 text-left">WhatsApp</th>
                    <th class="px-6 py-4 text-left">Point</th>
                    <th class="px-6 py-4 text-left">Foto</th>
                    <th class="px-6 py-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse ($members as $member)
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $member->id }}</td>
                        <td class="px-6 py-4">{{ $member->name }}</td>
                        <td class="px-6 py-4">{{ $member->email }}</td>
                        <td class="px-6 py-4">{{ $member->alamat }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">
                                {{ $member->wa }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $member->poin }}</td>
                        <td class="px-6 py-4">
                            <img src="{{ asset($member->foto) }}" alt="Foto"
                                class="w-10 h-10 rounded-full object-cover border border-gray-300" />
                        </td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('admin.members.edit', $member->id) }}"
                                class="inline-block text-blue-600 hover:underline text-sm">Edit</a>
                            <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus member ini?')" type="submit"
                                    class="text-red-600 hover:underline text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-400">Tidak ada data member.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $members->withQueryString()->links() }}
    </div>
@endsection
