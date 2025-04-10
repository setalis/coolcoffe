<div>
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-bold mb-8">{{ $coffee->exists ? 'Редактирование кофе' : 'Добавление кофе' }}</h1>

                <form wire:submit.prevent="save">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="col-span-1">
                            <div>
                                <label for="name" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                                    Название <span class="text-red-500">*</span>
                                </label>
                                <input
                                    id="name"
                                    type="text"
                                    wire:model="name"
                                    class="block w-full rounded-md border border-indigo-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white px-4 py-2 cursor-pointer"
                                    placeholder="Введите название кофе"
                                    required
                                >
                                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="col-span-1">
                            <div>
                                <label for="weight" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                                    Вес <span class="text-red-500">*</span>
                                </label>
                                <select
                                    id="weight"
                                    wire:model="weight"
                                    class="mt-1 block w-full rounded-md border border-indigo-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white px-4 py-2 cursor-pointer"
                                    required
                                >
                                    <option value="50g">50g</option>
                                    <option value="100g">100g</option>
                                    <option value="250g">250g</option>
                                    <option value="300g">300g</option>
                                    <option value="400g">400g</option>
                                    <option value="500g">500g</option>
                                    <option value="1kg">1kg</option>
                                    <option value="2kg">2kg</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-span-1">
                            <div>
                                <label for="price" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                                    Цена <span class="text-red-500">*</span>
                                </label>
                                <input
                                    id="price"
                                    type="number"
                                    step="0.01"
                                    wire:model="price"
                                    class="mt-1 block w-full rounded-md border border-indigo-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white px-4 py-2 cursor-pointer"
                                    placeholder="0.00"
                                    required
                                >
                                @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="col-span-1">
                            <div>
                                <label for="delivery_price" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                                    Цена доставки <span class="text-red-500">*</span>
                                </label>
                                <input
                                    id="delivery_price"
                                    type="number"
                                    step="0.01"
                                    wire:model="delivery_price"
                                    class="mt-1 block w-full rounded-md border border-indigo-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white px-4 py-2 cursor-pointer"
                                    placeholder="0.00"
                                    required
                                >
                                @error('delivery_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="col-span-2">
                            <div>
                                <label for="description" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                                    Описание
                                </label>
                                <textarea
                                    id="description"
                                    wire:model="description"
                                    rows="4"
                                    class="mt-1 block w-full rounded-md border border-indigo-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white px-4 py-2 cursor-pointer"
                                    placeholder="Введите описание кофе"
                                ></textarea>
                                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="col-span-2">
                            <div class="flex items-center">
                                <input
                                    id="active"
                                    type="checkbox"
                                    wire:model="active"
                                    class="h-4 w-4 rounded border-neutral-300 text-indigo-600 focus:ring-indigo-500 dark:border-neutral-700 dark:focus:ring-offset-neutral-900 cursor-pointer"
                                >
                                <label for="active" class="ml-2 block text-sm text-neutral-700 dark:text-neutral-300 cursor-pointer">
                                    Активно
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-span-2">
                            <div>
                                <label for="tempImage" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                                    Изображение
                                </label>
                                
                                @if ($existingImage)
                                    <div class="mb-4">
                                        <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-2">Текущее изображение:</p>
                                        <img
                                            src="{{ filter_var($existingImage, FILTER_VALIDATE_URL) ? $existingImage : asset('storage/' . $existingImage) }}"
                                            alt="Текущее изображение"
                                            class="w-32 h-32 object-cover rounded-lg cursor-pointer"
                                        >
                                    </div>
                                @endif
                                
                                <input
                                    id="tempImage"
                                    type="file"
                                    wire:model="tempImage"
                                    accept="image/*"
                                    class="mt-1 block w-full text-sm text-neutral-700 dark:text-neutral-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900/50 dark:file:text-indigo-400 dark:hover:file:bg-indigo-900 cursor-pointer"
                                >
                                @error('tempImage') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                
                                <div wire:loading wire:target="tempImage" class="mt-2 text-sm text-neutral-500 dark:text-neutral-400 cursor-pointer">
                                    Загрузка...
                                </div>
                                
                                @if ($tempImage)
                                    <div class="mt-4">
                                        <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-2">Предпросмотр:</p>
                                        <img
                                            src="{{ $tempImage->temporaryUrl() }}"
                                            alt="Предпросмотр"
                                            class="w-32 h-32 object-cover rounded-lg cursor-pointer"
                                        >
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('admin.coffee.index') }}"
                            class="inline-flex justify-center rounded-md border border-neutral-300 bg-white px-4 py-2 text-sm font-medium text-neutral-700 shadow-sm hover:bg-neutral-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:ring-offset-neutral-900 cursor-pointer">
                            Отмена
                        </a>
                        <button
                            type="submit"
                            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900 cursor-pointer">
                            {{ $coffee->exists ? 'Обновить' : 'Сохранить' }}
                        </button>
                    </div>
                </form>
            </div>
        </div> 
</div>
