<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Coffee;
use Livewire\WithFileUploads;

class CoffeeForm extends Component
{
    use WithFileUploads;
    
    public ?Coffee $coffee = null;
    public $name = '';
    public $weight = '100g';
    public $price = '';    
    public $image = '';
    public $description = '';
    public $delivery_price = '';
    public $tempImage; 
    public $existingImage = '';
    public $active = true;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'delivery_price' => 'required|numeric|min:0',
        'weight' => 'required|string|max:50',
        'tempImage' => 'nullable|image|max:1024',
    ];

    public function mount(?Coffee $coffee)
    {
        if ($coffee) {
            $this->coffee = $coffee;
            $this->name = $coffee->name;
            $this->weight = $coffee->weight;
            $this->price = $coffee->price;
            $this->description = $coffee->description;
            $this->delivery_price = $coffee->delivery_price;
            $this->active = $coffee->active;
            $this->existingImage = $coffee->image;
        } else {
            $this->coffee = new Coffee();
        }
    }
    
    public function save()
    {
        try {
            $this->validate();
            
            \Log::info('Начало сохранения кофе', [
                'name' => $this->name,
                'weight' => $this->weight,
                'price' => $this->price,
                'delivery_price' => $this->delivery_price,
                'active' => $this->active
            ]);

            if ($this->tempImage) {
                // Удаляем старое изображение, если оно есть
                if ($this->existingImage) {
                    \Storage::disk('public')->delete($this->existingImage);
                }
                $this->image = $this->tempImage->store('coffees', 'public');
                \Log::info('Изображение сохранено', ['path' => $this->image]);
            }
            
            $this->coffee->name = $this->name;
            $this->coffee->weight = $this->weight;
            $this->coffee->price = $this->price;
            $this->coffee->description = $this->description;
            $this->coffee->delivery_price = $this->delivery_price;
            $this->coffee->active = $this->active;
            
            if ($this->image) {
                $this->coffee->image = $this->image;
            }
            
            $this->coffee->save();
            
            \Log::info('Кофе успешно сохранен', ['id' => $this->coffee->id]);

            return redirect()->route('admin.coffee.index')
                ->with('success', $this->coffee->wasRecentlyCreated ? 'Кофе успешно создан' : 'Кофе успешно обновлен');
        } catch (\Exception $e) {
            \Log::error('Ошибка при сохранении кофе', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            session()->flash('error', 'Произошла ошибка при сохранении: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.coffee-form');
    }
}
