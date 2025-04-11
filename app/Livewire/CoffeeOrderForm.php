<?php

namespace App\Livewire;

use App\Models\Coffee;
use App\Models\CoffeeOrder;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class CoffeeOrderForm extends Component
{
    public $step = 1;
    public $coffee;
    public $orderId = null;

    // Добавляем слушатели событий
    protected $listeners = ['step-updated' => '$refresh'];
    
    // Шаг 1 - Информация о товаре
    public $prodname = '';
    public $prodimage = '';
    
    // Шаг 2 - Данные пользователя
    public $firstname = '';
    public $lastname = '';
    public $email = '';
    
    // Шаг 3 - Информация о доставке
    public $phone = '';
    public $address = '';
    public $city = '';
    public $zip = '';
    public $country = '';
    public $age = '';
    
    // Дополнительные поля
    public $sub2 = '';
    public $reff = '';
    public $temp = '';
    public $fbpix = '';
    public $hit = '';

    protected $rules = [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'zip' => 'required|string|max:20',
        'country' => 'required|string|max:255',
    ];

    public function mount(Coffee $coffee)
    {
        $this->coffee = $coffee;
        $this->prodname = $coffee->name; 
        $path = 'https://coolcoffee.discount/storage/';
        $this->prodimage = $path . $coffee->image;
        
        // Получаем параметр hit из URL, если он есть
        $this->hit = request()->query('hit', '');
    }

    public function nextStep()
    {
        if($this->step === 1){
            // $this->dispatch('fb-event', name: 'coolcoffee_discount_Order_info'); 
            $this->step++;
        }
        elseif ($this->step === 2) {
            $this->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
            ]);
            $this->dispatch('fb-event', name: 'InitiateCheckout');           


            // Создаем заказ
            $order = CoffeeOrder::create([
                'prodname' => $this->prodname,
                'prodimage' => $this->prodimage,
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'sub2' => $this->sub2,
                'reff' => $this->reff,
                'temp' => $this->temp,
                'country' => $this->country,
                'hit' => $this->hit,
                'completed' => false
            ]);
            
            $this->orderId = $order->id;
            $this->step++;

            
        }
        elseif ($this->step === 3) {
            $this->validate([
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'zip' => 'required|string|max:20',
                'country' => 'required|string|max:255',
            ]);

            // Обновляем данные заказа
            CoffeeOrder::where('id', $this->orderId)->update([
                'phone' => $this->phone,
                'address' => $this->address,
                'zip' => $this->zip,
                'country' => $this->country,
            ]);

            $this->dispatch('fb-event', name: 'Lead');
            $this->step++;
        } 
        // Добавляем отправку события при изменении шага
        $this->dispatch('step-updated')->to('coffee-order-form');
    }

    public function prevStep()
    {
        if ($this->step > 1) {
            $this->step--;
            $this->dispatch('step-updated');
        }
    }

    public function submitOrder()
    {
        $this->validate([
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'country' => 'required|string|max:255',
        ]);

        if ($this->orderId) {
            // Обновляем данные заказа
            CoffeeOrder::where('id', $this->orderId)->update([
                'phone' => $this->phone,
                'address' => $this->address,
                'zip' => $this->zip,
                'country' => $this->country,
                'completed' => true
            ]);

            $this->dispatch('fb-event', name: 'Purchase', options: [
                'value' => 2.00,
                'currency' => 'USD'
            ]);
            
            // Получаем данные заказа
            $order = CoffeeOrder::find($this->orderId);
            $fb = 1195257448988986;
            
            // Формируем специальную ссылку
            $redirectUrl = 'https://ad.extra-news.info/fts/3Agwdy0yBSe2-3Ah1tJQV92JZ/?' . http_build_query([
                // 'flux_fts' => 'qttxqciiocxltxxlxateqxttqcioltlaptxlxzab9b21',
                // 'country' => $order->country,
                'phone' => $order->phone,
                'address' => $order->address,
                'city' => $order->country,
                'email' => $order->email,
                'zip' => $order->zip,
                'sub2' => $order->sub2,
                'reff' => $order->reff,
                'temp' => $order->temp,
                'prodname' => $order->prodname,
                'prodimage' => $order->prodimage,
                'fname' => $order->firstname,
                'lname' => $order->lastname,
                'fbpix' => $fb,
                'hit' => $order->hit,
            ]);;

            // dd($redirectUrl);
            return redirect()->away($redirectUrl);
        }

        return redirect()->route('thanks')->with('success', 'Заказ успешно оформлен!');
    }

    public function render()
    {
        return view('livewire.coffee-order-form')
            ->layout('components.layouts.coffee');
    }
}
