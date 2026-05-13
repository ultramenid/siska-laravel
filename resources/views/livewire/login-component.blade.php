<div>
    <form wire:submit.prevent="login">
        @csrf

        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Username</label>
            <input
                type="text"
                autofocus
                wire:model.defer="username"
                wire:keydown.enter="login"
                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm text-gray-900 focus:outline-hidden focus:ring-2 focus:border-transparent transition"
                style="--tw-ring-color: #009180;"
                placeholder="Masukkan username"
            >
            @error('username') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
            <input
                type="password"
                wire:model.defer="password"
                wire:keydown.enter="login"
                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm text-gray-900 focus:outline-hidden focus:ring-2 focus:border-transparent transition"
                style="--tw-ring-color: #009180;"
                placeholder="Masukkan password"
            >
            @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        @if (session()->has('message'))
            <div class="mb-4 px-4 py-3 rounded-lg bg-red-50 border border-red-200 text-red-600 text-sm">
                {{ session('message') }}
            </div>
        @endif

        <button
            wire:click="login"
            wire:loading.attr="disabled"
            type="button"
            class="w-full py-2.5 rounded-lg text-white text-sm font-semibold transition-opacity hover:opacity-90 focus:outline-hidden"
            style="background-color: #132822;"
        >
            <span wire:loading.remove>Masuk</span>
            <span wire:loading>Memproses...</span>
        </button>
    </form>
</div>
