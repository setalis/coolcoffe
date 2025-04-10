<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class Appearance extends Component
{
    public $appearance;

    public function mount()
    {
        $this->appearance = Cookie::get('appearance', 'light');
    }

    public function updatedAppearance($value)
    {
        Cookie::queue('appearance', $value, 60 * 24 * 365); // 1 год
        session()->flash('message', 'Настройки внешнего вида успешно сохранены');
        
        // Обновляем тему в Flux
        $this->dispatch('theme-changed', theme: $value);
    }

    public function render()
    {
        return view('livewire.settings.appearance');
    }
}
