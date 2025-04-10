<div class="flex bg-[#FFF8F0] flex-col h-screen items-center justify-center">
    <!-- Progress indicator with labels -->
    <div class="w-full md:w-4xl px-6">
        <div class="flex w-full items-start justify-between relative px-2 overflow-hidden">
                    @php
                        $steps = [
                            1 => 'Order information',
                            2 => 'Account registration',
                            3 => 'Delivery address',
                            4 => 'Confirmation Order'
                        ];
                    @endphp

                    @foreach ($steps as $i => $label)
                        <div class="flex flex-col items-center min-w-[70px] md:min-w-0">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center 
                                {{ $step  === $i ? 'bg-amber-600' : ($step > $i ? 'bg-cyan-500' : 'bg-[#F5E7D4]') }}">
                                <span class="text-white font-bold text-sm">
                                    @if ($i === 1)
                                        <flux:icon.shopping-cart />
                                    @elseif ($i === 2)
                                        <flux:icon.user />
                                    @elseif ($i === 3)
                                        <flux:icon.truck />
                                    @elseif ($i === 4)
                                        <flux:icon.check />
                                    @endif
                                </span>
                            </div>
                            <span class="hidden md:block mt-1 text-xs md:text-sm text-center w-20 text-gray-600">{{ $label }}</span>
                        </div>
                        @if (!$loop->last)
                            <div class="flex-1 h-1 bg-gray-300 mx-1 md:mx-2 relative top-5">
                                <div class="h-1 bg-cyan-500 transition-all duration-300" style="width: {{ $step > $i ? '100%' : '0%' }}"></div>
                            </div>
                        @endif
                    @endforeach
        </div>
    </div>

    <!-- Card Order  -->
    <div class="container flex mx-auto px-4 py-8 md:py-4 items-center justify-center ">               
        
            <!-- Step 1: Инфо -->
            @if ($step === 1)
            <div class="max-w-4xl w-full mx-auto p-6 md:p-6 bg-white  border-4 border-[#A68F72] rounded-xl">   
                <div class = "flex md:flex-row flex-col md:gap-12 gap-4 h-full items-center">
                    <div class="flex md:w-1/3 md:h-full h-[200px] w-full bg-white rounded-xl p-4 md:p-12 border border-[#E6BF8D] ">
                        <img src="{{ asset('storage/' . $coffee->image) }}" alt="Product image" class="w-auto h-full object-cover rounded  mx-auto">   
                    </div>
                    <div class="w-full md:w-2/3 flex flex-col gap-6">
                        <div class="text-[#373737] flex flex-col w-full">
                            <div class="w-auto font-semibold text-xl md:text-3xl text-[#663B10] mb-4">{{ $coffee->name }}</div>
                            <div class="flex md:flex-row flex-wrap gap-x-4 items-end mb-6">
                                <div class="font-normal">Price: </div>
                                <span class="line-through text-[#AAAAAA] align-text-bottom">{{$coffee->price}}$</span>
                                <span class="text-4xl font-bold text-red-500">{{ $coffee->delivery_price }}$ </span>
                                <span class="hidden md:block px-2 text-xs font-semibold text-gray-300">|</span>
                                <div class="font-normal text-sm">Availability: <span class="font-bold">3 left in stock</span></div>
                            </div>
                            
                            <p class = "text-sm leading-none text-[#373737] mb-6">New users can only order one product, if you want to order multiple products, you must provide a product review.</p>
                            <div class="flex flex-row gap-3 mb-2">
                                <div class="bg-[#F5E7D4] flex items-center justify-center p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5"/>
                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                    </svg>
                                </div>
                                <div class="flex items-center text-sm leading-none text-[#373737]"><span>Added to cart successfully!</span></div>
                            </div>
                            <div class="flex flex-row gap-3 mb-2">
                                <div class="bg-[#F5E7D4] flex items-center justify-center p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-box-seam" viewBox="0 0 16 16">
                                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                                    </svg>
                                </div>
                                <div class="flex items-center text-sm leading-none text-[#373737]"><span>Hurry! Only 3 products left in stock</span></div>
                            </div>
                            <div class="flex flex-row gap-3 mb-2">
                                <div class="bg-[#F5E7D4] flex items-center justify-center p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-people" viewBox="0 0 16 16">
                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                    </svg>
                                </div>
                                <div class="flex items-center text-sm leading-none text-[#373737]"><span>11 people are viewing this product right now.</span></div>
                            </div>                            
                        </div>

                         

                        <button wire:click="nextStep" class="md:w-72 cursor-pointer sm:w-auto px-6 py-4 rounded-full bg-red-500 hover:bg-red-600 text-white font-semibold shadow text-base">Next step</button>
                    </div>
                </div>
            </div>   
            @endif
            
            <!-- Step 2: Контактные данные -->
            @if ($step === 2)
                <div class="flex flex-col md:flex-row gap-6 w-4xl h-full items-center">
                    <!-- Left side -->
                    <div class="flex flex-col md:w-2/3 h-full justify-center bg-white rounded-xl p-4 md:p-8 border border-[#E6BF8D] ">
                        <div class = "flex flex-row mb-6 md:hidden ">
                            <div class="border border-[#E6BF8D] rounded-lg py-4 px-4 mr-4">
                                <img src="{{ asset('storage/' . $coffee->image) }}" alt="Product image" class="w-auto h-full object-cover rounded  mx-auto max-h-[100px] max-w-[100px]">  
                            </div> 
                            <div>
                                <div class="font-semibold text-lg text-[#663B10] mb-2">{{ $coffee->name }}</div>
                                <div class="flex flex-row w-full items-end gap-6 mb-1">                            
                                    <div class="font-normal text-sm">Price:</div> 
                                    <span class="line-through text-[#AAAAAA] align-text-bottom">{{$coffee->price}}$</span>
                                    <span class="text-2xl font-bold text-red-500">{{ $coffee->delivery_price }}$ </span>                            
                                </div>
                                <div class="font-normal text-sm mb-3">Availability: <span class="font-bold text-cyan-500">3 left in stock</span></div>
                            </div>
                        </div>  
                                         
                        <h2 class="text-2xl font-bold text-[#663B10] mb-8 border-b-1 border-[#E6BF8D]">Create your account</h2>
                        <p class="text-gray-600 mb-4">To receive the product, register an account</p>
                        <div class="w-full mb-4">
                            <label for="firstname" class="hidden md:block text-sm font-medium text-[#663B10] mb-2">First Name:</label>
                            <input wire:model="firstname" type="text" class="w-full rounded-xl bg-white border {{ $errors->has('firstname') ? 'border-red-500' : 'border-gray-300' }} px-4 py-3 text-base dark:text-gray-700" placeholder="First Name" />
                                @error('firstname') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full mb-4">
                            <label for="lastname" class="hidden md:block text-sm font-medium text-[#663B10] mb-2 ">Last Name:</label>
                            <input wire:model="lastname" type="text" class="w-full rounded-xl bg-white border {{ $errors->has('lastname') ? 'border-red-500' : 'border-gray-300' }} px-4 py-3 text-base dark:text-gray-700" placeholder="Last Name" />
                                @error('lastname') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full mb-8">
                            <label for="email" class="hidden md:block text-sm font-medium text-[#663B10] mb-2">Email:</label>
                            <input wire:model="email" type="email" class="w-full rounded-xl bg-white border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} px-4 py-3 text-base dark:text-gray-700" placeholder="Email" />
                                @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>                            
                        <div class ="flex md:flex-row flex-col gap-4 justify-between items-center">
                                <button wire:click="prevStep" class="w-full sm:w-auto order-last md:order-first px-6 py-4 rounded-full bg-gray-200 hover:bg-gray-300 text-gray-800 text-base font-medium cursor-pointer">Previous step</button>
                                <button wire:click="nextStep" class="w-full sm:w-auto order-first flex-1 md:order-last px-6 py-4 rounded-full bg-red-500 hover:bg-red-600 text-white font-semibold shadow text-base cursor-pointer">Next step</button>                                
                        </div> 
                    </div>

                    <!-- Right side -->
                    <div class="flex-col hidden md:flex md:w-1/3 h-full bg-white rounded-xl p-4 md:p-4 border border-[#E6BF8D] justify-start items-start">
                        <div class="flex flex-col w-full py-4 items-center justify-center  overflow-hidden border-1 border-[#E6BF8D] rounded-xl mb-4">
                            <img src="{{ asset('storage/' . $coffee->image) }}" alt="Product image" class="w-auto h-full object-cover rounded  mx-auto max-h-[100px]">   
                        </div>
                        <div class="font-semibold text-md text-[#663B10] mb-2">{{ $coffee->name }}</div>
                        <div class="flex flex-row w-full items-end gap-3 mb-1">                            
                            <div class="font-normal text-sm">Price:</div> 
                            <span class="line-through text-[#AAAAAA] align-text-bottom">{{$coffee->price}}$</span>
                            <span class="text-2xl font-bold text-red-500">{{ $coffee->delivery_price }}$ </span>                            
                        </div>
                        <div class="font-normal text-sm mb-3">Availability: <span class="font-bold">3 left in stock</span></div>
                        <p class="text-sm text-[#373737] mb-4">New users can only order one product, if you want to order multiple products, you must provide a product review.</p>
                            <div class="flex flex-row items-center gap-3 mb-2">
                                <div class="bg-[#F5E7D4] flex items-center justify-center h-7 w-7 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5"/>
                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                    </svg>
                                </div>
                                <span class="w-5/6 text-sm leading-none text-[#373737]">Added to cart successfully!</span>
                            </div>
                            <div class="flex flex-row items-center gap-3 mb-2">
                                <div class="bg-[#F5E7D4] flex items-center justify-center h-7 w-7 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-box-seam" viewBox="0 0 16 16">
                                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                                    </svg>
                                </div>
                                <span class="w-5/6 text-sm leading-none text-[#373737]">Hurry! Only 3 products left in stock</span>
                            </div>
                            <div class="flex flex-row items-center gap-3 mb-2">
                                <div class="bg-[#F5E7D4] flex items-center justify-center h-7 w-7 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-people" viewBox="0 0 16 16">
                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                    </svg>
                                </div>
                                <span class="w-5/6 text-sm leading-none text-[#373737]">11 people are viewing this product right now.</span>                                
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            @endif

            <!-- Step 3: Адрес доставки -->
            @if ($step === 3)
                <div class="flex flex-col md:flex-row gap-6 w-4xl h-full items-center">
                    <!-- Left side -->

                    <div class="flex flex-col md:w-2/3 h-full justify-center bg-white rounded-xl p-4 md:p-8 border border-[#E6BF8D] ">
                        <div class = "flex flex-row mb-6 md:hidden ">
                            <div class="border border-[#E6BF8D] rounded-lg py-4 px-4 mr-4">
                                <img src="{{ asset('storage/' . $coffee->image) }}" alt="Product image" class="w-auto h-full object-cover rounded  mx-auto max-h-[100px] max-w-[100px]">  
                            </div> 
                            <div>
                                <div class="font-semibold text-lg text-[#663B10] mb-2">{{ $coffee->name }}</div>
                                <div class="flex flex-row w-full items-end gap-6 mb-1">                            
                                    <div class="font-normal text-sm">Price:</div> 
                                    <span class="line-through text-[#AAAAAA] align-text-bottom">{{$coffee->price}}$</span>
                                    <span class="text-2xl font-bold text-red-500">{{ $coffee->delivery_price }}$ </span>                            
                                </div>
                                <div class="font-normal text-sm mb-3">Availability: <span class="font-bold text-cyan-500">3 left in stock</span></div>
                            </div>
                        </div>  

                        <h2 class="text-2xl font-bold text-[#663B10] mb-8 border-b-1 border-[#E6BF8D]">Delivery address</h2>
                        <p class="text-gray-600 mb-4">To receive the goods, you must specify the delivery address</p>
                        <div class="w-full mb-4">
                            <input wire:model="phone" type="tel" class="w-full rounded-xl border {{ $errors->has('phone') ? 'border-red-500' : 'border-gray-300' }} px-4 py-3 text-base" placeholder="Phone" />
                            @error('phone') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full mb-4">
                            <input wire:model="address" type="text" class="w-full rounded-xl border {{ $errors->has('address') ? 'border-red-500' : 'border-gray-300' }} px-4 py-3 text-base" placeholder="Adress" />
                            @error('address') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full mb-4">
                            <input wire:model="zip" type="text" class="w-full rounded-xl border {{ $errors->has('zip') ? 'border-red-500' : 'border-gray-300' }} px-4 py-3 text-base" placeholder="Zip/Post Code" />
                            @error('zip') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="w-full mb-4">
                            <select wire:model="age" class="w-full rounded-xl border {{ $errors->has('age') ? 'border-red-500' : 'border-gray-300' }} px-4 py-3 text-base" require>
                                <option value="">Select your age</option>
                                <option value="<18">Less than 18</option>
                                @for($i = 18; $i <= 99; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            @error('age') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class ="flex md:flex-row flex-col gap-4 justify-between items-center">
                                <button wire:click="prevStep" class="w-full sm:w-auto order-last md:order-first px-6 py-4 rounded-full bg-gray-200 hover:bg-gray-300 text-gray-800 text-base font-medium cursor-pointer">Previous step</button>
                                <button wire:click="nextStep" class="w-full sm:w-auto order-first flex-1 md:order-last px-6 py-4 rounded-full bg-red-500 hover:bg-red-600 text-white font-semibold shadow text-base cursor-pointer">Order a free sample now</button>                                
                        </div> 
                    </div> 
                    
                    <div class="flex-col hidden md:flex md:w-1/3 h-full bg-white rounded-xl p-4 md:p-4 border border-[#E6BF8D] justify-start items-start">
                        <div class="flex flex-col w-full py-4 items-center justify-center  overflow-hidden border-1 border-[#E6BF8D] rounded-xl mb-4">
                            <img src="{{ asset('storage/' . $coffee->image) }}" alt="Product image" class="w-auto h-full object-cover rounded  mx-auto max-h-[100px]">   
                        </div>
                        <div class="font-semibold text-md text-[#663B10] mb-2">{{ $coffee->name }}</div>
                        <div class="flex flex-row w-full items-end gap-3 mb-1">                            
                            <div class="font-normal text-sm">Price:</div> 
                            <span class="line-through text-[#AAAAAA] align-text-bottom">{{$coffee->price}}$</span>
                            <span class="text-2xl font-bold text-red-500">{{ $coffee->delivery_price }}$ </span>                            
                        </div>
                        <div class="font-normal text-sm mb-3">Availability: <span class="font-bold">3 left in stock</span></div>
                        <p class="text-sm text-[#373737] mb-4">New users can only order one product, if you want to order multiple products, you must provide a product review.</p>
                            <div class="flex flex-row items-center gap-3 mb-2">
                                <div class="bg-[#F5E7D4] flex items-center justify-center h-7 w-7 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5"/>
                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                    </svg>
                                </div>
                                <span class="w-5/6 text-sm leading-none text-[#373737]">Added to cart successfully!</span>
                            </div>
                            <div class="flex flex-row items-center gap-3 mb-2">
                                <div class="bg-[#F5E7D4] flex items-center justify-center h-7 w-7 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-box-seam" viewBox="0 0 16 16">
                                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                                    </svg>
                                </div>
                                <span class="w-5/6 text-sm leading-none text-[#373737]">Hurry! Only 3 products left in stock</span>
                            </div>
                            <div class="flex flex-row items-center gap-3 mb-2">
                                <div class="bg-[#F5E7D4] flex items-center justify-center h-7 w-7 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-people" viewBox="0 0 16 16">
                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                    </svg>
                                </div>
                                <span class="w-5/6 text-sm leading-none text-[#373737]">11 people are viewing this product right now.</span>                                
                            </div>
                            
                        </div>
                    </div>
                
                
            @endif

            <!-- Step 4: Подтверждение -->
            @if ($step === 4)
                <div class="flex flex-col md:flex-row gap-6 w-4xl h-full items-center">
                    <div class="flex flex-col md:w-2/3 h-full justify-center bg-white rounded-xl p-4 md:p-8 border border-[#E6BF8D] ">
                    <div class = "flex flex-row mb-6 md:hidden ">
                            <div class="border border-[#E6BF8D] rounded-lg py-4 px-4 mr-4">
                                <img src="{{ asset('storage/' . $coffee->image) }}" alt="Product image" class="w-auto h-full object-cover rounded  mx-auto max-h-[100px] max-w-[100px]">  
                            </div> 
                            <div>
                                <div class="font-semibold text-lg text-[#663B10] mb-2">{{ $coffee->name }}</div>
                                <div class="flex flex-row w-full items-end gap-6 mb-1">                            
                                    <div class="font-normal text-sm">Price:</div> 
                                    <span class="line-through text-[#AAAAAA] align-text-bottom">{{$coffee->price}}$</span>
                                    <span class="text-2xl font-bold text-red-500">{{ $coffee->delivery_price }}$ </span>                            
                                </div>
                                <div class="font-normal text-sm mb-3">Availability: <span class="font-bold text-cyan-500">3 left in stock</span></div>
                            </div>
                        </div>  
                        <h3 class="text-2xl font-bold text-[#663B10] mb-8 border-b-1 border-[#E6BF8D]">Confirmation Order</h3>
                                <div class="flex flex-row items-start gap-3 mb-2">
                                    <div class="bg-[#F5E7D4] flex items-center justify-center p-2 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5"/>
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                        </svg>
                                    </div>
                                    <div class="text-md leading-none text-[#373737]"><span>Your order for the Café Tostado y Molido, Bolsa de 1kg sample has been confirmed! There are still 3 pieces in stock, but they are running out quickly!</span></div>
                                </div>
                                <div class="flex flex-row items-start gap-3 mb-2">
                                    <div class="bg-[#F5E7D4] flex items-center justify-center p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-clock-history" viewBox="0 0 16 16">
                                        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
                                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                                        <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                    </div>
                                    <div class="text-md leading-none text-[#373737]"><span>Due to high demand, we can reserve</span><span class = "font-bold px-2"> {{ $coffee->name}}  </span><span>for you for just 5 minutes! Act quickly to secure your sample.</span></div>
                                </div>
                                
                                <div 
                                    x-data="{
                                        seconds: 300,
                                        formatTime: '05:00',
                                        interval: null,
                                        
                                        startTimer() {
                                            this.interval = setInterval(() => {
                                                if (this.seconds > 0) {
                                                    this.seconds--;
                                                    this.updateDisplay();
                                                } else {
                                                    clearInterval(this.interval);
                                                }
                                            }, 1000);
                                            this.updateDisplay();
                                        },
                                        
                                        updateDisplay() {
                                            const minutes = Math.floor(this.seconds / 60);
                                            const remainingSeconds = this.seconds % 60;
                                            this.formatTime = `${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')}`;
                                        }
                                    }" 
                                    x-init="startTimer()"
                                    class="text-center font-bold text-5xl my-8 text-[#489BCF]"
                                    x-text="formatTime">
                                </div>

                                <div class="flex flex-row items-center gap-3 mb-2">
                                    <div class="bg-[#F5E7D4] flex items-center justify-center p-2 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-truck" viewBox="0 0 16 16">
                                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                                        </svg>
                                    </div>
                                    <div class="text-md leading-none text-[#373737]"><span>Complete your order by paying the 2$ delivery fee now.</span></div>
                                </div>
                                <div class="flex flex-row items-center gap-3 mb-8">
                                    <div class="bg-[#F5E7D4] flex items-center justify-center p-2 rounded-full ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-cup-hot" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M.5 6a.5.5 0 0 0-.488.608l1.652 7.434A2.5 2.5 0 0 0 4.104 16h5.792a2.5 2.5 0 0 0 2.44-1.958l.131-.59a3 3 0 0 0 1.3-5.854l.221-.99A.5.5 0 0 0 13.5 6zM13 12.5a2 2 0 0 1-.316-.025l.867-3.898A2.001 2.001 0 0 1 13 12.5M2.64 13.825 1.123 7h11.754l-1.517 6.825A1.5 1.5 0 0 1 9.896 15H4.104a1.5 1.5 0 0 1-1.464-1.175"/>
                                        <path d="m4.4.8-.003.004-.014.019a4 4 0 0 0-.204.31 2 2 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.6.6 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3 3 0 0 1-.202.388 5 5 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 3.6 4.2l.003-.004.014-.019a4 4 0 0 0 .204-.31 2 2 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.6.6 0 0 0-.09-.252A4 4 0 0 0 3.6 2.8l-.01-.012a5 5 0 0 1-.37-.543A1.53 1.53 0 0 1 3 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a6 6 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 4.4.8m3 0-.003.004-.014.019a4 4 0 0 0-.204.31 2 2 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.6.6 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3 3 0 0 1-.202.388 5 5 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 6.6 4.2l.003-.004.014-.019a4 4 0 0 0 .204-.31 2 2 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.6.6 0 0 0-.09-.252A4 4 0 0 0 6.6 2.8l-.01-.012a5 5 0 0 1-.37-.543A1.53 1.53 0 0 1 6 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a6 6 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 7.4.8m3 0-.003.004-.014.019a4 4 0 0 0-.204.31 2 2 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.6.6 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3 3 0 0 1-.202.388 5 5 0 0 1-.252.382l-.019.025-.005.008-.002.002A.5.5 0 0 1 9.6 4.2l.003-.004.014-.019a4 4 0 0 0 .204-.31 2 2 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.6.6 0 0 0-.09-.252A4 4 0 0 0 9.6 2.8l-.01-.012a5 5 0 0 1-.37-.543A1.53 1.53 0 0 1 9 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a6 6 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 10.4.8"/>
                                        </svg>
                                    </div>
                                    <div class="text-md leading-none text-[#373737]"><span>Want more free samples? Submit your review of the product and get access to even more products!</span></div>
                                </div>
                                <button wire:click="submitOrder" class="w-full md:w-3/5 px-6 py-4 rounded-full bg-red-500 hover:bg-red-600 text-white font-semibold shadow text-base mx-auto cursor-pointer">Confirm and pay 2$ delivery</button>
                        
                    </div>

                    <div class="flex-col hidden md:flex md:w-1/3 h-full bg-white rounded-xl p-4 md:p-4 border border-[#E6BF8D] justify-start items-start">
                        <div class="flex flex-col w-full py-4 items-center justify-center  overflow-hidden border-1 border-[#E6BF8D] rounded-xl mb-4">
                            <img src="{{ asset('storage/' . $coffee->image) }}" alt="Product image" class="w-auto h-full object-cover rounded  mx-auto max-h-[100px]">   
                        </div>
                        <div class="font-semibold text-md text-[#663B10] mb-2">{{ $coffee->name }}</div>
                        <div class="flex flex-row w-full items-end gap-3 mb-1">                            
                            <div class="font-normal text-sm">Price:</div> 
                            <span class="line-through text-[#AAAAAA] align-text-bottom">{{$coffee->price}}$</span>
                            <span class="text-2xl font-bold text-red-500">{{ $coffee->delivery_price }}$ </span>                            
                        </div>
                        <div class="font-normal text-sm mb-3">Availability: <span class="font-bold">3 left in stock</span></div>
                        <p class="text-sm text-[#373737] mb-4">New users can only order one product, if you want to order multiple products, you must provide a product review.</p>
                            <div class="flex flex-row items-center gap-3 mb-2">
                                <div class="bg-[#F5E7D4] flex items-center justify-center h-7 w-7 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5"/>
                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                    </svg>
                                </div>
                                <span class="w-5/6 text-sm leading-none text-[#373737]">Added to cart successfully!</span>
                            </div>
                            <div class="flex flex-row items-center gap-3 mb-2">
                                <div class="bg-[#F5E7D4] flex items-center justify-center h-7 w-7 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-box-seam" viewBox="0 0 16 16">
                                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                                    </svg>
                                </div>
                                <span class="w-5/6 text-sm leading-none text-[#373737]">Hurry! Only 3 products left in stock</span>
                            </div>
                            <div class="flex flex-row items-center gap-3 mb-2">
                                <div class="bg-[#F5E7D4] flex items-center justify-center h-7 w-7 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fb2c36" class="bi bi-people" viewBox="0 0 16 16">
                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                    </svg>
                                </div>
                                <span class="w-5/6 text-sm leading-none text-[#373737]">11 people are viewing this product right now.</span>                                
                            </div>
                            
                        </div>
                    </div> 
                </div>
            @endif

            
    </div>


    <!-- @push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('timer', (initialSeconds) => ({
        seconds: initialSeconds,
        formatTime: '05:00',
        interval: null,

        start() {
            this.interval = setInterval(() => {
                if (this.seconds > 0) {
                    this.seconds--;
                    this.updateDisplay();
                } else {
                    clearInterval(this.interval);
                }
            }, 1000);
            this.updateDisplay();
        },

        updateDisplay() {
            const minutes = Math.floor(this.seconds / 60);
            const remainingSeconds = this.seconds % 60;
            this.formatTime = `${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')}`;
        },

        stop() {
            clearInterval(this.interval);
        }
    }));
});
</script>
@endpush -->
</div>
