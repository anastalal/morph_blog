<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')
    </head>
    <body dir="rtl">
<nav class="font-inter mx-auto h-auto w-full max-w-[1600px] lg:relative lg:top-0" x-data="{isOpen: false, menuOne:false}"> <!-- CONTAINER -->
  <div class="flex flex-col px-6 py-6 lg:flex-row lg:items-center lg:justify-between lg:px-10 lg:py-4 xl:px-20"> <!-- SVG LOGO - YOU CAN REPLACE THIS -->
    <a href="/"   class="relative right-[38%] lg:inset-0 w-20 0">
      <img src="{{ asset('assets/images/morph.png') }}" class="  w-20 0" alt="">
    </a> <!-- MENU CONTENT 1 -->

    <!-- Navigation Links -->
    <div class="mt-14 flex flex-col space-y-8 lg:mt-0 lg:flex lg:flex-row lg:space-x-1 lg:space-y-0" x-bind:class="isOpen ? 'show' : 'hidden'">
    </div> <!-- MENU CONTENT 2 -->

    <!-- Authentication Links -->
    <div class="flex flex-col space-y-8 lg:flex lg:flex-row lg:space-x-3 lg:space-y-0" x-bind:class="isOpen ? 'show' : 'hidden'">
      @if (!Auth::check())
        <a href="{{ route('filament.dashboard.auth.register') }}" class="font-inter rounded-lg lg:px-6 lg:py-4 lg:hover:bg-gray-50 lg:hover:text-gray-800">تسجيل </a>
        <a href="{{ route('filament.dashboard.auth.login') }}" class="relative mr-5 inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">تسجيل الدخول </a>
      @else
        <a href="{{ route('filament.dashboard.pages.dashboard') }}" class="relative mr-5 inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">لوحة التحكم</a>
      @endif 
    </div> <!-- BURGER MENU -->

    <!-- Burger Menu Icon -->
    <a href="#" class="absolute right-5 lg:hidden" x-on:click.prevent="isOpen = !isOpen">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3.75 12H20.25" stroke="#160042" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M3.75 6H20.25" stroke="#160042" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M3.75 18H20.25" stroke="#160042" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </a>
  </div>
</nav>

  <div class="container overflow-hidden">
    {{ $slot }}
  </div>
       
        <footer class="bg-gray-50 dark:bg-gray-800 antialiased">
            <div class="p-4 py-6 mx-auto max-w-screen-xl md:p-8 lg:p-10">
               
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
                <div class="text-center">
                    <a href="#" class="flex justify-center items-center mb-5 text-2xl font-semibold text-gray-900 dark:text-white">
                        <img class="mr-2 h-8" src="{{ asset('assets/images/morph.png') }}" alt="">
                        
                            
                    </a>
                    <span dir="ltr" class="block text-sm text-center text-gray-500 dark:text-gray-400">© 2023-2024 <a href="#" class="hover:underline">مدونة مورف</a>. جميع الحقوق محفوضة.
                    </span>
                    <ul class="flex justify-center mt-5 space-x-5">
                        <li>
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                              <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                                  <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                              </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                  <path fill="currentColor" d="M12.186 8.672 18.743.947h-2.927l-5.005 5.9-4.44-5.9H0l7.434 9.876-6.986 8.23h2.927l5.434-6.4 4.82 6.4H20L12.186 8.672Zm-2.267 2.671L8.544 9.515 3.2 2.42h2.2l4.312 5.719 1.375 1.828 5.731 7.613h-2.2l-4.699-6.237Z"/>
                              </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                              </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                              </svg>
                            </a>
                        </li>
                    </ul>
                    <small>
                        Developed by <a href="https://wa.me/+967738233130">Coderans</a>
                    </small>
                    
                </div>
            </div>
          </footer>
          <livewire:scripts />
    </body>
</html>
