<div>
    <form wire:submit="login" class="space-y-4">
        <div>
            <label for="login-username" class="field-label">Nama pengguna</label>
            <input
                id="login-username"
                type="text"
                autocomplete="username"
                autofocus
                wire:model="username"
                class="field"
                placeholder="nama.pengguna"
                @error('username') aria-invalid="true" aria-describedby="login-username-error" @enderror
            >
            @error('username')
                <p id="login-username-error" class="mt-1.5 text-xs text-clay">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="login-password" class="field-label">Kata sandi</label>
            <input
                id="login-password"
                type="password"
                autocomplete="current-password"
                wire:model="password"
                class="field"
                placeholder="••••••••"
                @error('password') aria-invalid="true" aria-describedby="login-password-error" @enderror
            >
            @error('password')
                <p id="login-password-error" class="mt-1.5 text-xs text-clay">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn w-full data-loading:opacity-60">
            <span class="not-data-loading:hidden">Memeriksa…</span>
            <span class="data-loading:hidden">Masuk</span>
        </button>
    </form>

    <p class="mt-4 text-xs text-muted leading-relaxed">
        Belum punya akses? Ajukan permohonan kredensial secara resmi kepada pengelola SISKA.
    </p>
</div>
