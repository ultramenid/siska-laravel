{{--
    Login dialog. Opened from anywhere with:  $dispatch('open-login')
    Also opens automatically when a guarded page redirects here with ->with('openLogin', true).
--}}
<div
    x-data="{ open: @js((bool) session('openLogin') || ($openLogin ?? false)) }"
    x-on:open-login.window="open = true"
    x-on:keydown.escape.window="open = false"
    x-cloak
>
    <div x-show="open" class="fixed inset-0 z-[1500] flex items-center justify-center p-4 sm:p-6">

        {{-- Backdrop --}}
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-on:click="open = false"
            class="absolute inset-0 bg-ink/75 backdrop-blur-[2px]"
            aria-hidden="true"
        ></div>

        {{-- Panel --}}
        <div
            x-show="open"
            x-trap.noscroll="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-2 sm:scale-[0.98]"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-2 sm:scale-[0.98]"
            role="dialog"
            aria-modal="true"
            aria-labelledby="login-title"
            class="relative w-full max-w-sm bg-paper border border-ink/15 rounded-sm shadow-2xl overflow-hidden"
        >
            {{-- Ink header --}}
            <div class="bg-ink px-6 pt-5 pb-4">
                {{-- pr-10 keeps the value clear of the close button. --}}
                <p class="annot annot-invert mb-3 pr-10">
                    <span class="annot-label">Akses</span>
                    <span class="annot-rule"></span>
                    <span class="annot-value">Terbatas</span>
                </p>
                <h2 id="login-title" class="font-display text-2xl font-bold text-white tracking-tight">Masuk ke SISKA</h2>
                <p class="mt-1 text-sm text-white/60 leading-snug">
                    Kredensial diberikan oleh Dinas Perkebunan Provinsi Kalimantan Tengah.
                </p>
            </div>

            <div class="px-6 py-6">
                <livewire:login-component />
            </div>

            {{-- Placed last so the username field receives focus first when the dialog opens. --}}
            <button
                type="button"
                x-on:click="open = false"
                class="absolute top-4 right-4 p-1.5 text-white/60 hover:text-white transition-colors"
                aria-label="Tutup"
            >
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
</div>
