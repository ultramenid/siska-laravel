@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Navigasi halaman" class="mt-5 flex items-center justify-between gap-4">

        {{-- Mobile: prev / next only --}}
        <div class="flex flex-1 items-center justify-between gap-3 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center border border-rule bg-paper-dim px-3.5 py-2 font-mono text-[0.6875rem] uppercase tracking-[0.1em] text-muted/60 rounded-sm">
                    Sebelumnya
                </span>
            @else
                <button
                    type="button"
                    wire:click="previousPage"
                    wire:loading.attr="disabled"
                    rel="prev"
                    class="inline-flex items-center border border-rule bg-white px-3.5 py-2 font-mono text-[0.6875rem] uppercase tracking-[0.1em] text-ink hover:bg-teal-wash hover:border-teal transition-colors duration-150 rounded-sm cursor-pointer"
                >
                    Sebelumnya
                </button>
            @endif

            <span class="figure text-xs text-muted">
                {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}
            </span>

            @if ($paginator->hasMorePages())
                <button
                    type="button"
                    wire:click="nextPage"
                    wire:loading.attr="disabled"
                    rel="next"
                    class="inline-flex items-center border border-rule bg-white px-3.5 py-2 font-mono text-[0.6875rem] uppercase tracking-[0.1em] text-ink hover:bg-teal-wash hover:border-teal transition-colors duration-150 rounded-sm cursor-pointer"
                >
                    Berikutnya
                </button>
            @else
                <span class="inline-flex items-center border border-rule bg-paper-dim px-3.5 py-2 font-mono text-[0.6875rem] uppercase tracking-[0.1em] text-muted/60 rounded-sm">
                    Berikutnya
                </span>
            @endif
        </div>

        {{-- Desktop: summary + numbered pages --}}
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between gap-6">
            <p class="font-mono text-[0.6875rem] uppercase tracking-[0.1em] text-muted">
                Menampilkan
                <span class="figure font-medium text-ink">{{ $paginator->firstItem() }}</span>
                sampai
                <span class="figure font-medium text-ink">{{ $paginator->lastItem() }}</span>
                dari
                <span class="figure font-medium text-ink">{{ $paginator->total() }}</span>
                hasil
            </p>

            <div class="flex items-center -space-x-px">
                {{-- Previous --}}
                @if ($paginator->onFirstPage())
                    <span
                        aria-disabled="true"
                        aria-label="Halaman sebelumnya"
                        class="inline-flex items-center border border-rule bg-paper-dim px-2.5 py-2 text-muted/50"
                    >
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M12 4l-6 6 6 6"/>
                        </svg>
                    </span>
                @else
                    <button
                        type="button"
                        wire:click="previousPage"
                        wire:loading.attr="disabled"
                        rel="prev"
                        aria-label="Halaman sebelumnya"
                        class="inline-flex items-center border border-rule bg-white px-2.5 py-2 text-ink hover:bg-teal-wash hover:border-teal focus:z-10 transition-colors duration-150 cursor-pointer"
                    >
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M12 4l-6 6 6 6"/>
                        </svg>
                    </button>
                @endif

                {{-- Pages --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="inline-flex items-center border border-rule bg-white px-3 py-2 figure text-xs text-muted">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span
                                    wire:key="paginator-page-{{ $page }}"
                                    aria-current="page"
                                    class="inline-flex items-center border border-ink bg-ink px-3 py-2 figure text-xs font-medium text-white"
                                >{{ $page }}</span>
                            @else
                                <button
                                    type="button"
                                    wire:key="paginator-page-{{ $page }}"
                                    wire:click="gotoPage({{ $page }})"
                                    wire:loading.attr="disabled"
                                    aria-label="Ke halaman {{ $page }}"
                                    class="inline-flex items-center border border-rule bg-white px-3 py-2 figure text-xs text-ink hover:bg-teal-wash hover:border-teal focus:z-10 transition-colors duration-150 cursor-pointer"
                                >{{ $page }}</button>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <button
                        type="button"
                        wire:click="nextPage"
                        wire:loading.attr="disabled"
                        rel="next"
                        aria-label="Halaman berikutnya"
                        class="inline-flex items-center border border-rule bg-white px-2.5 py-2 text-ink hover:bg-teal-wash hover:border-teal focus:z-10 transition-colors duration-150 cursor-pointer"
                    >
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M8 4l6 6-6 6"/>
                        </svg>
                    </button>
                @else
                    <span
                        aria-disabled="true"
                        aria-label="Halaman berikutnya"
                        class="inline-flex items-center border border-rule bg-paper-dim px-2.5 py-2 text-muted/50"
                    >
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M8 4l6 6-6 6"/>
                        </svg>
                    </span>
                @endif
            </div>
        </div>
    </nav>
@endif
