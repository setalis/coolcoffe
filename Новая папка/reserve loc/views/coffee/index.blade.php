<x-layouts.coffee>
<div>
    <div class="top-nav">
        <div class="container mx-auto flex justify-between items-center py-4 px-4 md:px-0">
            <div class="logo">
                <a href="/coffee" class="cursor-pointer">
                    <img src="{{ asset('storage/images/coffee/Logo.png') }}" alt="logo">
                </a>
            </div>
            <div class="nav-links hidden md:flex gap-8">
                <a href="#home" class="cursor-pointer">Home</a>
                <a href="#catalog" class="cursor-pointer">Catalog</a>
                <a href="#features" class="cursor-pointer">Features</a>
                <a href="#reviews" class="cursor-pointer">Reviews</a>
                <a href="#contact" class="cursor-pointer">Contact</a>
            </div>
            <div class="mobile-menu-button md:hidden">
                <button id="menu-toggle" class="text-orange-900 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- Сайдбар для мобильного меню -->
        <div id="mobile-sidebar" class="fixed top-0 right-0 w-64 h-full bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50">
            <div class="p-6">
                <div class="flex justify-between items-center mb-8">
                    <img src="{{ asset('storage/images/coffee/Logo.png') }}" alt="logo" class="w-[100px] h-auto object-cover">
                    <button id="close-sidebar" class="text-orange-900 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col space-y-6">
                    <a href="#home" class="text-orange-900 font-medium hover:text-orange-600 transition-colors cursor-pointer">Home</a>
                    <a href="#catalog" class="text-orange-900 font-medium hover:text-orange-600 transition-colors cursor-pointer">Catalog</a>
                    <a href="#features" class="text-orange-900 font-medium hover:text-orange-600 transition-colors cursor-pointer">Features</a>
                    <a href="#reviews" class="text-orange-900 font-medium hover:text-orange-600 transition-colors cursor-pointer">Reviews</a>
                    <a href="#contact" class="text-orange-900 font-medium hover:text-orange-600 transition-colors cursor-pointer">Contact</a>
                </div>
            </div>
        </div>
        <!-- Оверлей для затемнения фона при открытом сайдбаре -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black opacity-0 pointer-events-none transition-opacity duration-300 ease-in-out z-40 cursor-pointer"></div>
    </div>

    <div id="catalog">
        <div class="container mx-auto flex flex-col items-center justify-center overflow-hidden px-4 md:px-4 pt-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-orange-900 text-center">Pick Your Coffee for a Test Purchase</h2>
            <h3 class="text-md font-normal mb-10 md:mb-6 text-center">You only pay for delivery—coffee is on us. It's your chance to try premium quality without extra expenses!</h3>
        </div>
        <div class="container mx-auto px-4 md:px-4">
                @if($coffees->count() > 0)
                    @foreach($coffees->chunk(3) as $coffeeChunk)
                        <div class="w-full md:w-6xl flex flex-col md:flex-row md:gap-6 items-center justify-center mb-2 md:mb-6 mx-auto">
                            @foreach($coffeeChunk as $coffee)
                                <div class="w-full md:w-1/3 flex flex-col items-center justify-center text-center p-4 relative rounded-2xl overflow-hidden">
                                    <div class="relative z-10 flex flex-col items-center w-full border border-gray-300 rounded-2xl bg-amber-50 pb-4">
                                        <div class="w-full h-full flex items-center justify-center bg-white py-8 px-0 mb-8 rounded-t-2xl border-b border-gray-300  ">
                                            <img src="{{ asset('storage/' . $coffee->image) }}" alt="{{ $coffee->name }}" class="max-w-full max-h-full object-contain h-[200px]">
                                        </div>
                                        <h3 class="text-lg font-bold  text-orange-900 px-2 min-h-[65px]">{{ $coffee->name }}</h3>
                                        <div class="flex items-center justify-around gap-8 mb-6">
                                            <p class="text-gray-500 line-through">${{ $coffee->price }}</p>
                                            <p class="text-2xl font-bold text-red-500">${{ $coffee->delivery_price }}</p>
                                        </div>
                                        <div class="flex items-center justify-center gap-8 mb-4 relative">
                                            <a href="{{ route('coffee.order', $coffee->id) }}"
                                            class="order-btn bg-orange-600 px-8 py-4 rounded-full cursor-pointer flex items-center justify-center gap-2 uppercase font-bold text-white"
                                            >                                            
                                            order now
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                            </svg>
                                            </a>
                                            <p class="text-gray-500 text-sm">{{ $coffee->weight }}</p>
                                        </div>
                                    </div>
                                </div>  
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <div class="w-full text-center py-8">
                        <p class="text-gray-500">No coffee products available at the moment. Please check back later.</p>
                    </div>
                @endif
        </div>
    </div>

    <div id="home" class="hero w-full h-[780px] md:h-auto mx-auto bg-cover bg-center relative overflow-hidden">        
        <!-- Левое изображение -->
        <div class="absolute top-0 md:-left-[100px] left-0 h-full pointer-events-none">
            <img src="{{ asset('storage/images/coffee/left-image.png') }}" alt="" class="h-2/5 md:h-4/5 w-auto md:opacity-5 opacity-4 rotate-180">
        </div>
            
        <!-- Правое изображение -->
        <div class="absolute md:-bottom-[35px] -bottom-[400px] md:-right-[20px] right-0 h-full pointer-events-none">
            <img src="{{ asset('storage/images/coffee/right-image.png') }}" alt="" class="h-3/5 md:h-full w-full opacity-5 -rotate-60">
        </div>
            
        <!-- Содержимое блока -->
        <div class="container mx-auto px-4 md:px-4">
            <div class="flex flex-col md:flex-row justify-between items-center py-8 pt-16 md:pb-4 relative z-10">
                <div class="hero-content w-full md:w-3/5 text-center md:text-left mb-8 md:mb-0">
                    <h1 class="text-3xl md:text-5xl font-black text-orange-900 mb-4 md:mb-8">Try Your Dream Coffee for Free</h1>
                    <h2 class="text-2xl md:text-4xl font-bold text-[#f9d09d] mb-8 md:mb-16">Pay Only for Delivery!</h2>
                    <p class="text-gray-500 mb-8 md:mb-16">Want to savor the aroma of freshly brewed coffee without spending a dime on the product itself? We've made it possible! Order a test purchase now—pick your perfect coffee, and all you pay is the delivery fee. No risks, just pure enjoyment!</p>
                    <a href="#catalog" class="coffee-scroll"><button class="coffee-btn border border-orange-800/50 text-orange-800 px-6 md:px-8 py-3 md:py-4 rounded-full mb-4 cursor-pointer">Choose Your Coffee and Try It</button></a>
                </div>
                <div class="hero-image w-4/5 md:w-2/5">
                    <img src="{{ asset('storage/images/coffee/hero-img.png') }}" alt="hero">
                </div>
            </div>
        </div>
    </div>

    <!-- Features -->
    <div id="features" class="features bg-[#FBF3F3] py-10 md:py-20 relative overflow-hidden">
        <!-- Левое изображение -->
        <div class="absolute top-1/2 -translate-y-1/2 -left-[20px] pointer-events-none hidden md:block">
            <img src="{{ asset('storage/images/coffee/features-left.png') }}" alt="" class="max-h-[500px] max-w-[500px] w-auto opacity-5 -rotate-90">
        </div>
        
        <!-- Правое изображение -->
        <div class="absolute top-1/2 -translate-y-1/2 -right-[20px] pointer-events-none hidden md:block">
            <img src="{{ asset('storage/images/coffee/features-right.png') }}" alt="" class="max-h-[300px] max-w-[300px] w-auto opacity-5">
        </div>

        <div class="container mx-auto px-4 md:px-4">
            <div class="w-full flex flex-col md:flex-row gap-8 md:gap-16 items-center justify-center">
                <div class="w-full md:w-1/3 flex flex-col items-center justify-center relative mb-8 md:mb-0">
                    <img src="{{ asset('storage/images/coffee/features-img.jpg') }}" alt="features" class="w-4/5 h-4/5 object-cover rounded-full">
                    <div class="absolute -bottom-[10px] md:-left-[30px] left-0">
                        <img src="{{ asset('storage/images/coffee/features-img-2.png') }}" alt="features" class="w-2/5 h-2/5 object-cover rounded-full">
                    </div>
                </div>
                <div class="w-full md:w-2/3 flex flex-col items-center">
                    <h2 class="w-full text-3xl md:text-4xl font-bold mb-8 md:mb-16 text-orange-900 text-center md:text-left">Why Choose This Way?</h2>
                    <div class="w-full flex flex-col md:flex-row gap-8 md:gap-16 items-center justify-center">
                        <div class="w-full md:w-1/2 flex flex-col items-center text-center md:text-left">
                            <h3 class="w-full text-xl md:text-2xl font-bold text-[#f9d09d] mb-2 md:mb-4">No Cost for the Product</h3>
                            <p class="w-full text-gray-500 mb-8 md:mb-16">You only pay for delivery—coffee is on us. It's your chance to try premium quality without extra expenses!</p>
                        </div>
                        <div class="w-full md:w-1/2 flex flex-col items-center justify-center text-center md:text-left">
                            <h3 class="w-full text-xl md:text-2xl font-bold text-[#f9d09d] mb-2 md:mb-4">Freedom to Choose</h3>
                            <p class="w-full text-gray-500 mb-8 md:mb-16">6 coffee options—from bold espresso to smooth latte. Find your perfect match with zero commitment.</p>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row gap-8 md:gap-16 items-center justify-center">
                        <div class="w-full md:w-1/2 flex flex-col items-center text-center md:text-left">
                            <h3 class="w-full text-xl md:text-2xl font-bold text-[#f9d09d] mb-2 md:mb-4">Premium Quality</h3>
                            <p class="w-full text-gray-500 mb-8 md:mb-16">Experience the finest coffee beans, carefully selected and expertly roasted for your perfect cup.</p>
                        </div>
                        <div class="w-full md:w-1/2 flex flex-col items-center justify-center text-center md:text-left">
                            <h3 class="w-full text-xl md:text-2xl font-bold text-[#f9d09d] mb-2 md:mb-4">Fast Delivery</h3>
                            <p class="w-full text-gray-500 mb-8 md:mb-16">Get your coffee delivered quickly and safely, right to your doorstep.</p>
                        </div>
                    </div>
                    <h3 class="w-full text-xl md:text-2xl font-bold text-orange-900 mb-4 text-center md:text-left">Your coffee is waiting - take the first step to a new flavor!</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews -->
    <div id="reviews" class="reviews py-10 md:py-20 bg-cover bg-center relative overflow-hidden" style="background-image: url('{{ asset('storage/images/coffee/reviews-bg.jpg') }}');">
        <!-- Оверлей -->
        <div class="absolute inset-0 bg-black opacity-75"></div>
        
        <div class="container mx-auto px-4 md:px-4">
            <div class="flex flex-col items-center justify-center relative z-10">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white text-center">Our Customer Review</h2>
                
                <!-- Слайдер отзывов -->
                <div class="slider-container w-full max-w-4xl mx-auto relative mt-10">
                    <!-- Слайды -->
                    <div class="slides">
                        <!-- Слайд 1 -->
                        <div class="slide fade text-center">
                            <div class="mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#FFEDD7" class="bi bi-quote mx-auto" viewBox="0 0 16 16">
                                    <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg mb-8 text-white">"I ordered the Latte 'Silky Bliss'—fell in love from the first sip! And it's free, just paid for delivery. Can't wait to try more!"</h3>
                            <img src="{{ asset('storage/images/coffee/faces-reviews-1.jpg') }}" alt="reviews" class="w-[100px] h-[100px] object-cover rounded-full mx-auto saturate-50">
                            <h3 class="text-md mt-4 text-white">- Kate, 25</h3>
                        </div>

                        <!-- Слайд 2 -->
                        <div class="slide fade text-center">
                            <div class="mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#FFEDD7" class="bi bi-quote mx-auto" viewBox="0 0 16 16">
                                    <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992a4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992a4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg mb-8 text-white">"Americano Roast has become my morning ritual. The quality is exceptional, and I only paid delivery. It's a no-brainer deal!"</h3>
                            <img src="{{ asset('storage/images/coffee/faces-reviews-2.jpg') }}" alt="reviews" class="w-[100px] h-[100px] object-cover rounded-full mx-auto saturate-50">
                            <h3 class="text-md mt-4 text-white">- Mark, 32</h3>
                        </div>

                        <!-- Слайд 3 -->
                        <div class="slide fade text-center">
                            <div class="mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#FFEDD7" class="bi bi-quote mx-auto" viewBox="0 0 16 16">
                                    <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992a4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992a4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg mb-8 text-white">"The Gold Blend exceeds all expectations. I was skeptical about free coffee, but this is truly premium quality. Highly recommend!"</h3>
                            <img src="{{ asset('storage/images/coffee/faces-reviews-3.jpg') }}" alt="reviews" class="w-[100px] h-[100px] object-cover rounded-full mx-auto saturate-50">
                            <h3 class="text-md mt-4 text-white">- Sarah, 29</h3>
                        </div>
                    </div>

                    <!-- Навигация для слайдера (точки) -->
                    <div class="dots-container text-center mt-8">
                        <span class="dot cursor-pointer w-3 h-3 bg-gray-400 inline-block mx-1 rounded-full hover:bg-white" onclick="currentSlide(1)"></span>
                        <span class="dot cursor-pointer w-3 h-3 bg-gray-400 inline-block mx-1 rounded-full hover:bg-white" onclick="currentSlide(2)"></span>
                        <span class="dot cursor-pointer w-3 h-3 bg-gray-400 inline-block mx-1 rounded-full hover:bg-white" onclick="currentSlide(3)"></span>
                    </div>

                    <!-- Стрелки для слайдера -->
                    <a class="prev absolute top-1/2 -translate-y-1/2 left-0 md:-left-[80px] cursor-pointer text-white text-3xl font-bold p-4" onclick="changeSlide(-1)">❮</a>
                    <a class="next absolute top-1/2 -translate-y-1/2 right-0 md:-right-[80px] cursor-pointer text-white text-3xl font-bold p-4" onclick="changeSlide(1)">❯</a>
                </div>
            </div>
        </div>
    </div>

    <div class="cta w-full h-auto md:h-[600px] mx-auto bg-cover bg-center relative overflow-hidden py-10 md:py-0 flex items-center justify-center">
        <!-- Левое изображение -->
        <div class="absolute top-0 -left-[100px] h-full pointer-events-none hidden md:block">
            <img src="{{ asset('storage/images/coffee/left-image.png') }}" alt="" class="h-4/5 w-auto opacity-5 rotate-180">
        </div>
        
        <!-- Правое изображение -->
        <div class="absolute bottom-0 -right-[20px] h-full pointer-events-none hidden md:block">
            <img src="{{ asset('storage/images/coffee/features-left.png') }}" alt="" class="h-full w-full opacity-5 -rotate-190">
        </div>
        
        <!-- Содержимое блока -->
        <div class="container mx-auto px-4 md:px-4">
            <div class="flex flex-col md:flex-row justify-between items-center py-8 relative z-10 gap-8 md:gap-16">
                <div class="hero-content w-full md:w-3/5 text-center md:text-left">
                    <h1 class="text-3xl md:text-5xl font-black text-orange-900 mb-8 md:mb-16">Ready for Your Perfect Coffee?</h1>
                    <p class="text-gray-500 mb-8 md:mb-16">Don't miss out on trying premium coffee for free—just cover the delivery and enjoy the taste as early as tomorrow! Pick your flavor and see for yourself—it's easier than you think.</p>
                    <a href="#catalog" class="coffee-scroll"><button class="coffee-btn border border-orange-800/50 text-orange-800 px-6 md:px-8 py-3 md:py-4 rounded-full mb-4 cursor-pointer">Order Coffee Now</button></a>
                </div>
                <div class="hero-image w-4/5 md:w-2/5">
                    <img src="{{ asset('storage/images/coffee/cta-img.png') }}" alt="hero">
                </div>
            </div>
        </div>
    </div>

    <div class="footer w-full h-auto mx-auto bg-cover bg-center relative overflow-hidden py-10 md:py-4 items-center justify-center bg-[#fbf3f3]">
        <div class="container mx-auto px-4 md:px-4">
            <img src="{{ asset('storage/images/coffee/logo.png') }}" alt="footer" class="w-[100px] h-auto object-cover mx-auto cursor-pointer">
        </div>
    </div>

     <!-- Стили и скрипт для слайдера -->
     <style>
        .slides {
            display: flex;
            overflow: hidden;
            position: relative;
        }
        .slide {
            width: 100%;
            flex-shrink: 0;
            display: none;
        }
        .slide.active {
            display: block;
        }
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }
        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }
        .dot.active {
            background-color: white;
        }
        
        /* Мобильная оптимизация */
        @media (max-width: 768px) {
            .slide h3 {
                font-size: 16px;
                line-height: 1.4;
            }
            .prev, .next {
                font-size: 24px;
            }
        }
     </style>

     <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Инициализация слайдера
            let slideIndex = 1;
            showSlides(slideIndex);

            // Глобальные функции для управления слайдером
            window.changeSlide = function(n) {
                showSlides(slideIndex += n);
            };

            window.currentSlide = function(n) {
                showSlides(slideIndex = n);
            };

            function showSlides(n) {
                let i;
                let slides = document.getElementsByClassName("slide");
                let dots = document.getElementsByClassName("dot");
                
                if (n > slides.length) {slideIndex = 1}
                if (n < 1) {slideIndex = slides.length}
                
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                
                slides[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " active";
            }

            // Автоматическое переключение слайдов
            setInterval(function() {
                window.changeSlide(1);
            }, 5000); // Меняет слайд каждые 5 секунд
        });
     </script>

     <!-- Скрипт для плавной прокрутки и мобильного меню -->
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Находим все ссылки в навигации и кнопки для скролла
            const links = document.querySelectorAll('.nav-links a, #mobile-sidebar a, .coffee-scroll');
            
            // Добавляем обработчик события для каждой ссылки
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Предотвращаем стандартное поведение ссылки
                    e.preventDefault();
                    
                    // Получаем ID целевого элемента из атрибута href
                    const targetId = this.getAttribute('href');
                    
                    // Находим целевой элемент
                    const targetElement = document.querySelector(targetId);
                    
                    // Закрываем мобильное меню если оно открыто
                    document.getElementById('mobile-sidebar').classList.remove('translate-x-0');
                    document.getElementById('mobile-sidebar').classList.add('translate-x-full');
                    document.getElementById('sidebar-overlay').classList.add('opacity-0');
                    document.getElementById('sidebar-overlay').classList.remove('opacity-50');
                    document.getElementById('sidebar-overlay').classList.add('pointer-events-none');
                    
                    if (targetElement) {
                        // Выполняем плавную прокрутку к целевому элементу
                        window.scrollTo({
                            top: targetElement.offsetTop - 80, // Отступ сверху для учета навигационной панели
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Мобильное меню - сайдбар
            const menuToggle = document.getElementById('menu-toggle');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const closeSidebar = document.getElementById('close-sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            
            // Открыть сайдбар
            menuToggle.addEventListener('click', function() {
                mobileSidebar.classList.remove('translate-x-full');
                mobileSidebar.classList.add('translate-x-0');
                sidebarOverlay.classList.remove('opacity-0');
                sidebarOverlay.classList.add('opacity-50');
                sidebarOverlay.classList.remove('pointer-events-none');
            });
            
            // Закрыть сайдбар при клике на крестик
            closeSidebar.addEventListener('click', function() {
                mobileSidebar.classList.remove('translate-x-0');
                mobileSidebar.classList.add('translate-x-full');
                sidebarOverlay.classList.remove('opacity-50');
                sidebarOverlay.classList.add('opacity-0');
                sidebarOverlay.classList.add('pointer-events-none');
            });
            
            // Закрыть сайдбар при клике на оверлей
            sidebarOverlay.addEventListener('click', function() {
                mobileSidebar.classList.remove('translate-x-0');
                mobileSidebar.classList.add('translate-x-full');
                sidebarOverlay.classList.remove('opacity-50');
                sidebarOverlay.classList.add('opacity-0');
                sidebarOverlay.classList.add('pointer-events-none');
            });
        });
     </script>
</div>

</x-layouts.coffee> 