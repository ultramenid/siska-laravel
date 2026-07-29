<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginComponent extends Component
{
    public string $username = '';

    public string $password = '';

    public function login(): void
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required',
        ], [], [
            'username' => 'nama pengguna',
            'password' => 'kata sandi',
        ]);

        $user = DB::table('users')->where('username', $this->username)->first();

        if (! $user || ! Hash::check($this->password, $user->password)) {
            $this->addError('username', 'Nama pengguna atau kata sandi tidak cocok.');

            return;
        }

        // Read the destination before regenerating: regenerating the session id is
        // what stops session fixation, but it must not be able to lose the redirect.
        $intended = session()->pull('url.intended', '/');

        session()->regenerate();
        session(['username' => $user->username]);

        // A full page load, not navigate: true. regenerate() issues a new session
        // cookie, and wire:navigate's client-side fetch can race it — the target page
        // then sees the pre-login session and bounces straight back to the modal.
        $this->redirect($intended);
    }
}
