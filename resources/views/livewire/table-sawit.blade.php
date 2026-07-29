@php
    // Column register. `num` drives right-alignment + .figure; `unit` is printed
    // once in the header instead of being repeated in every cell.
    $columns = [
        ['key' => 'tahun',         'label' => 'Tahun',         'unit' => null,      'num' => false],
        ['key' => 'tbm',           'label' => 'TBM',           'unit' => 'ha',      'num' => true],
        ['key' => 'tm',            'label' => 'TM',            'unit' => 'ha',      'num' => true],
        ['key' => 'tr',            'label' => 'TR',            'unit' => 'ha',      'num' => true],
        ['key' => 'totalluas',     'label' => 'Total luas',    'unit' => 'ha',      'num' => true],
        ['key' => 'produksi',      'label' => 'Produksi',      'unit' => 'ton',     'num' => true],
        ['key' => 'produktifitas', 'label' => 'Produktifitas', 'unit' => 'ton/ha',  'num' => true],
        ['key' => 'petani',        'label' => 'Petani',        'unit' => 'orang',   'num' => true],
        ['key' => 'produk',        'label' => 'Produk',        'unit' => null,      'num' => false],
        ['key' => 'pengusahaan',   'label' => 'Pengusahaan',   'unit' => null,      'num' => false],
    ];

    $numCell = 'px-3 py-2.5 text-right figure text-[0.8125rem] whitespace-nowrap';
    $txtCell = 'px-3 py-2.5 text-left text-[0.8125rem] whitespace-nowrap';
@endphp

<div>
    {{-- Register --}}
    <div class="border border-rule bg-white overflow-x-auto">
        <table class="w-full border-collapse">
            <caption class="sr-only">
                Data perkebunan kelapa sawit Kalimantan Tengah menurut tahun dan bentuk pengusahaan.
                Setiap judul kolom dapat diklik untuk mengurutkan data.
            </caption>

            <thead>
                <tr>
                    @foreach ($columns as $col)
                        @php $isActive = $dataField === $col['key']; @endphp
                        <th
                            scope="col"
                            aria-sort="{{ $isActive ? ($dataOrder === 'asc' ? 'ascending' : 'descending') : 'none' }}"
                            class="sticky top-0 z-10 bg-ink p-0 border-b border-ink-line align-bottom"
                        >
                            <button
                                type="button"
                                wire:click="sortingField('{{ $col['key'] }}')"
                                class="w-full flex flex-col gap-0.5 px-3 py-2.5 text-white/85 hover:text-white hover:bg-ink-soft transition-colors duration-150 cursor-pointer {{ $col['num'] ? 'items-end text-right' : 'items-start text-left' }}"
                                title="Urutkan menurut {{ $col['label'] }}"
                            >
                                <span class="flex items-center gap-1.5 font-mono text-[0.6875rem] font-medium uppercase tracking-[0.08em] whitespace-nowrap {{ $isActive ? 'text-white' : '' }}">
                                    @if ($col['num'])
                                        <span>{{ $col['label'] }}</span>
                                    @endif

                                    @if ($isActive)
                                        <svg class="h-3 w-3 shrink-0 text-cpo" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="{{ $dataOrder === 'asc' ? 'M5 12l5-5 5 5' : 'M5 8l5 5 5-5' }}"/>
                                        </svg>
                                        <span class="sr-only">
                                            (diurutkan {{ $dataOrder === 'asc' ? 'menaik' : 'menurun' }})
                                        </span>
                                    @else
                                        <svg class="h-3 w-3 shrink-0 text-white/30" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M6 8.5l4-4 4 4M6 11.5l4 4 4-4"/>
                                        </svg>
                                    @endif

                                    @if (! $col['num'])
                                        <span>{{ $col['label'] }}</span>
                                    @endif
                                </span>

                                {{-- Placeholder keeps every header label on the same baseline. --}}
                                <span
                                    class="font-mono text-[0.625rem] tracking-[0.08em] {{ $col['unit'] ? 'text-white/45' : 'text-transparent' }}"
                                    @if (! $col['unit']) aria-hidden="true" @endif
                                >{{ $col['unit'] ?? '·' }}</span>
                            </button>
                        </th>
                    @endforeach
                </tr>
            </thead>

            <tbody
                wire:loading.class="opacity-40"
                class="transition-opacity duration-150"
            >
                @forelse ($sawit as $index => $item)
                    <tr class="border-b border-rule last:border-b-0 {{ $index % 2 === 0 ? 'bg-white' : 'bg-paper-dim' }} hover:bg-teal-wash transition-colors duration-100">
                        <td class="{{ $txtCell }} figure font-medium text-ink">{{ $item->tahun }}</td>
                        <td class="{{ $numCell }} text-ink/75">{{ number_format($item->tbm, 0, ',', '.') }}</td>
                        <td class="{{ $numCell }} text-ink/75">{{ number_format($item->tm, 0, ',', '.') }}</td>
                        <td class="{{ $numCell }} {{ $item->tr > 0 ? 'text-clay' : 'text-ink/35' }}">{{ number_format($item->tr, 0, ',', '.') }}</td>
                        <td class="{{ $numCell }} font-medium text-ink">{{ number_format($item->totalluas, 0, ',', '.') }}</td>
                        <td class="{{ $numCell }} text-ink/75">{{ number_format($item->produksi, 0, ',', '.') }}</td>
                        <td class="{{ $numCell }} text-ink/75">{{ number_format($item->produktifitas, 2, ',', '.') }}</td>
                        <td class="{{ $numCell }} {{ $item->petani > 0 ? 'text-ink/75' : 'text-ink/35' }}">{{ number_format($item->petani, 0, ',', '.') }}</td>
                        <td class="{{ $txtCell }} text-ink/75">{{ $item->produk }}</td>
                        <td class="{{ $txtCell }}">
                            <span class="inline-block rounded-sm px-2 py-0.5 font-mono text-[0.6875rem] tracking-[0.04em] border {{ str_contains($item->pengusahaan, 'Rakyat') ? 'bg-cpo-wash text-cpo border-cpo/25' : 'bg-teal-wash text-teal-deep border-teal/25' }}">
                                {{ $item->pengusahaan }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) }}" class="px-4 py-16 text-center">
                            <p class="font-mono text-xs uppercase tracking-[0.14em] text-muted">Tidak ada baris yang cocok.</p>
                            <p class="mt-2 text-sm text-ink/60">Ubah urutan kolom atau kembali ke halaman pertama.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Legend: the register's own abbreviations, spelled out. --}}
    <dl class="mt-4 flex flex-wrap gap-x-6 gap-y-1.5 font-mono text-[0.6875rem] leading-relaxed text-muted">
        <div class="flex gap-2">
            <dt class="text-ink font-medium">TBM</dt>
            <dd>Tanaman Belum Menghasilkan</dd>
        </div>
        <div class="flex gap-2">
            <dt class="text-ink font-medium">TM</dt>
            <dd>Tanaman Menghasilkan</dd>
        </div>
        <div class="flex gap-2">
            <dt class="text-ink font-medium">TR</dt>
            <dd>Tanaman Rusak</dd>
        </div>
    </dl>

    {{ $sawit->links('livewire.pagination') }}
</div>
