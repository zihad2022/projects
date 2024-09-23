<?php

namespace App\Filament\Pages\Auth;

class Login extends \Filament\Pages\Auth\Login
{
    public function mount(): void
    {
        parent::mount();

        if (app()->isLocal()) {
            $this->form->fill([
                'email' => 'test@example.com',
                'password' => 'test@example.com',
                'remember' => true,
            ]);
        }
    }
}
