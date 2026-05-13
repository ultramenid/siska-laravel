<div>
    <div class="overflow-x-auto rounded-xl border border-gray-200">
        <table class="w-full text-sm">
            <thead>
                <tr style="background-color: #132822;">
                    <th wire:click='sortingField("tahun")' class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider cursor-pointer whitespace-nowrap">
                        <div class="flex items-center gap-1">
                            Tahun
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                            </svg>
                        </div>
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider whitespace-nowrap">TBM</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider whitespace-nowrap">TM</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider whitespace-nowrap">TR</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider whitespace-nowrap">Total Luas</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider whitespace-nowrap">Produksi</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider whitespace-nowrap">Produktifitas</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider whitespace-nowrap">Petani</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider whitespace-nowrap">Produk</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider whitespace-nowrap">Pengusahaan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($sawit as $index => $item)
                <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-teal-50 transition-colors duration-100">
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $item->tahun }}</td>
                    <td class="px-4 py-3 text-gray-600 whitespace-nowrap">{{ number_format($item->tbm, 2) }}</td>
                    <td class="px-4 py-3 text-gray-600 whitespace-nowrap">{{ number_format($item->tm, 2) }}</td>
                    <td class="px-4 py-3 text-gray-600 whitespace-nowrap">{{ number_format($item->tr, 2) }}</td>
                    <td class="px-4 py-3 text-gray-600 whitespace-nowrap">{{ number_format($item->totalluas, 2) }}</td>
                    <td class="px-4 py-3 text-gray-600 whitespace-nowrap">{{ number_format($item->produksi, 2) }}</td>
                    <td class="px-4 py-3 text-gray-600 whitespace-nowrap">{{ number_format($item->produktifitas, 2) }}</td>
                    <td class="px-4 py-3 text-gray-600 whitespace-nowrap">{{ $item->petani }}</td>
                    <td class="px-4 py-3 text-gray-600 whitespace-nowrap">{{ $item->produk }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                            style="{{ str_contains($item->pengusahaan, 'Rakyat') ? 'background-color: #e6f4f2; color: #009180;' : 'background-color: #f0f4ff; color: #3b5bdb;' }}">
                            {{ $item->pengusahaan }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="px-4 py-12 text-center text-gray-400 text-sm">Tidak ada data ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($sawit)
    <div class="mt-4">
        {{ $sawit->links('livewire.pagination') }}
    </div>
    @endif
</div>
