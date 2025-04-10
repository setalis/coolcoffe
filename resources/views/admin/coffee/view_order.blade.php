<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-3xl font-bold mb-2">Детали заказа #{{ $order->id }}</h1>
            <a href="{{ route('admin.coffee.orders') }}" class="text-indigo-600 hover:text-indigo-800">
                ← Вернуться к списку заказов
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Информация о товаре -->
            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold mb-4">Информация о товаре</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="">
                        <img src="{{ $order->prodimage }}" alt="{{ $order->prodname }}" 
                             class="w-auto h-[200px] object-cover rounded-lg">
                    </div>
                    <div class="">
                        <p class="text-gray-600">Название товара:</p>
                        <p class="font-semibold mb-2">{{ $order->prodname }}</p>
                    </div>
                </div>
            </div>

            <!-- Информация о покупателе -->
            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold mb-4">Информация о покупателе</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-600">Имя:</p>
                        <p class="font-semibold mb-2">{{ $order->firstname }}</p>
                        
                        <p class="text-gray-600">Фамилия:</p>
                        <p class="font-semibold mb-2">{{ $order->lastname }}</p>
                        
                        <p class="text-gray-600">Email:</p>
                        <p class="font-semibold mb-2">{{ $order->email }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Телефон:</p>
                        <p class="font-semibold mb-2">{{ $order->phone }}</p>
                        
                        <p class="text-gray-600">Страна:</p>
                        <p class="font-semibold mb-2">{{ $order->country }}</p>
                    </div>
                </div>
            </div>

            <!-- Информация о доставке -->
            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold mb-4">Информация о доставке</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-600">Адрес:</p>
                        <p class="font-semibold mb-2">{{ $order->address }}</p>
                        
                        <p class="text-gray-600">Индекс:</p>
                        <p class="font-semibold mb-2">{{ $order->zip }}</p>
                    </div>
                </div>
            </div>

            <!-- Дополнительная информация -->
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-4">Дополнительная информация</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-600">Статус заказа:</p>
                        <p class="font-semibold mb-2">
                            <span class="px-2 py-1 rounded-full text-sm {{ $order->completed ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $order->completed ? 'Завершен' : 'В обработке' }}
                            </span>
                        </p>
                        
                        <p class="text-gray-600">Дата создания:</p>
                        <p class="font-semibold mb-2">{{ $order->created_at->format('d.m.Y H:i') }}</p>
                        
                        @if($order->sub2)
                            <p class="text-gray-600">Sub2:</p>
                            <p class="font-semibold mb-2">{{ $order->sub2 }}</p>
                        @endif
                        
                        @if($order->reff)
                            <p class="text-gray-600">Reff:</p>
                            <p class="font-semibold mb-2">{{ $order->reff }}</p>
                        @endif
                        
                        @if($order->temp)
                            <p class="text-gray-600">Temp:</p>
                            <p class="font-semibold mb-2">{{ $order->temp }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app> 