<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MIM Perium</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link
      href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"
      rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet"
    />
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" 
        crossorigin="anonymous"/>

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

         <!-- Fonts -->
         <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

         <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- Fontawesome --}}
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

        {{-- Glider --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" />

        {{-- FlexSlider --}}
        <link rel="stylesheet" href="{{ asset('vendor/FlexSlider/flexslider.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        {{-- Glider --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js" integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA==" crossorigin="anonymous"></script>

        {{-- jquery --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        {{-- FlexSlider --}}
        <script src="{{ asset('vendor/FlexSlider/jquery.flexslider-min.js') }}"></script>



    </head>
    <body class="antialiased">
  

        <x-jet-banner />

        <div>
            
        <header>
        <div class="container flex items-center h-16 mb-2 justify-between">


            <a href="/" class="mx-0 md:mx-6">
                <img src="img/MIPERIUM.png" class="block h-12 md:h-14 w-28 md:w-32 alt="">
            </a>

            <div class="hidden lg:block -mx-4 flex-1">
                <div class="flex">
                    <a href="#nosotros" class="block mx-4 mt-2 text-sm font-semibold text-gray-700 capitalize lg:mt-0 dark:text-gray-200 hover:text-lime-600 dark:hover:text-indigo-400">Nosotros</a>
                    <a href="#equipo" class="block mx-4 mt-2 text-sm font-semibold text-gray-700 capitalize lg:mt-0 dark:text-gray-200 hover:text-lime-600 dark:hover:text-indigo-400">Equipo</a>
                    <a href="#productos" class="block mx-4 mt-2 text-sm font-semibold text-gray-700 capitalize lg:mt-0 dark:text-gray-200 hover:text-lime-600 dark:hover:text-indigo-400">Productos</a>                            
                    <a href="#informacion" class="block mx-4 mt-2 text-sm font-semibold text-gray-700 capitalize lg:mt-0 dark:text-gray-200 hover:text-lime-600 dark:hover:text-indigo-400">Información</a>

                </div>
                
            </div>
            

            <div class="block" align="right">
                @auth
                <a href="{{ route('home') }}" class="font-semibold text-sm text-gray-700 mt-5 capitalize lg:mt-0 dark:text-gray-200 hover:text-lime-600 ">Oficina online</a>
                
                @else

                <div class="flex" >

                <a href="{{ route('login') }}" class="font-semibold mr-4 text-sm text-gray-700 mt-5 capitalize lg:mt-0 dark:text-gray-200 hover:text-lime-600 ">Iniciar sesión</a>
                <a href="{{ route('Registro') }}" class="font-semibold text-sm text-gray-700 mt-5 capitalize lg:mt-0 dark:text-gray-200 hover:text-lime-600 ">Registrarse</a>
                </div>

                @endauth
            </div>

        </div>
        </header>

                
        </div>

       

<main>

    <div id="nosotros" class="block md:hidden w-auto h-96 bg-cover bg-center" style="background-image: url(img/fondo.jpg);" >
            <div class="flex items-center justify-center w-full h-full bg-gray-900 bg-opacity-50">
                    
            </div>
    </div>

    <div id="nosotros" class="hidden md:block w-auto h-96 bg-cover bg-center" style="background-image: url(img/fondo.jpg);" >
            <div class="flex items-center justify-center w-full h-full bg-gray-900 bg-opacity-50">
                    
            </div>
    </div>

    <section class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-10">
        <h1 class="text-center text-3xl font-bold capitalize text-lime-800 lg:text-4xl">QUIENES SOMOS</h1>

        <p class="mt-4 text-center text-gray-500 font-semibold">SOMOS UN PROYECTO QUE BUSCA JUNTAR TODAS LAS POSIBILIDADES
                                                                     PARA HACER NEGOCIO EN UN SOLO LUGAR.



                                                                    NUESTRO OBJETIVO ES ANALIZAR LOS MERCADOS O INDUSTRIAS MAS
                                                                    RENTABLES E INCORPORAR A NUESTRO PROYECTO CON EL FIN DE
                                                                    POSICIONAR UNA MARCA QUE OCUPE TODO EN UN SOLO LUGAR.



                                                                    CONTAREMOS CON PRODUCTOS Y SERVICIOS DE ALTA DEMANDA,
                                                                    QUE SERAN PROMOCIONADOS POR NUESTROS CONSUMIDORES A TRAVES DEL NETWORK MARKETING.
                                                                    </p>

        <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-12 xl:grid-cols-2 xl:gap-12">
            
            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <img class="h-full w-full rounded-lg object-cover" src="img/bienestar.jfif" alt="" />
                <h3 class="mt-4 text-2xl font-bold capitalize text-gray-600 group-hover:text-white">BIENESTAR</h3>
            </div>

            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <img class="h-full w-full rounded-lg object-cover" src="img/hogar.jfif" alt="" />
                <h3 class="mt-4 text-2xl font-bold capitalize  text-gray-600 group-hover:text-white">HOGAR</h3>
            </div>

            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <img class="h-full w-full rounded-lg object-cover" src="img/cuidado_personal.jfif" />
                <h3 class="mt-4 text-2xl font-bold capitalize  text-gray-600 group-hover:text-white">CUIDADO PERSONAL</h3>
            </div>

            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <img class="h-full w-full rounded-lg object-cover" src="img/digital.jfif" alt="" />
                <h3 class="mt-4 text-2xl font-bold capitalize  text-gray-600 group-hover:text-white">DIGITAL</h3>
            </div>
     
        </div>
    </div>
    </section>

<section class="bg-white dark:bg-gray-900">
            <div class="container px-6 py-10 mx-auto" id="equipo">
                <h2 class="text-center text-3xl font-bold capitalize text-lime-800 lg:text-4xl">NUESTRO EQUIPO EJECUTIVO</h2>
                
                <p class="max-w-2xl mx-auto my-6 text-center text-gray-500 dark:text-gray-300">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo incidunt ex placeat modi magni quia error alias, adipisci rem similique, at omnis eligendi optio eos harum.
                </p>
                
                
           
                <div class="flex flex-col items-center">
                    <div class="p-8 flex flex-col items-center w-1/2 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                    <img class="object-cover sm:w-full sm:h-full md:w-80 md:h-80 rounded-full ring-4 ring-gray-300" src="img/Juan.jpeg" alt="">
                        
                        <h3 class="mt-4 sm:text-md md:text-2xl font-semibold text-gray-700 capitalize dark:text-white group-hover:text-white">Juan Huaman</h3>
                        
                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">Fundador</p>
                        
                        <div class="flex mt-3 -mx-2">
                            <a href="#" class="mx-2 text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-300 group-hover:text-white" aria-label="Reddit">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z">
                                    </path>
                                </svg>
                            </a>

                            <a href="#" class="mx-2 text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-300 group-hover:text-white"
                                aria-label="Facebook">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z">
                                    </path>
                                </svg>
                            </a>

                            <a href="#" class="mx-2 text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-300 group-hover:text-white" aria-label="Github">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z">
                                    </path>
                                </svg>
                            </a>
                        </div>

                    </div>
                        
                </div>
            </div>
        </section>

 
    <section class="bg-white dark:bg-gray-900">
    <div id="productos" class="container mx-auto px-6 py-10">
        <div class="text-center">
        <h2 class="text-center text-3xl font-bold capitalize text-lime-800 lg:text-4xl">PRODUCTOS</h2>

        <p class="max-w-2xl mx-auto my-6 text-center text-gray-500 dark:text-gray-300">Algunos de nuestros productos de alta calidad</p>
        </div>

        <div class="mt-8 grid grid-cols-1 gap-8 md:mt-16 md:grid-cols-2 xl:grid-cols-3">
            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <div class="relative">
                    <img class="h-64 w-full rounded-lg object-cover object-center lg:h-80" src="img/producto1.jpeg" alt="" />
                </div>

                  <div class="justify-center flex">
                    <h3 class="mt-2 text-xl font-semibold  text-gray-700 group-hover:text-white ">¿Que es Moringa?</h3>
                </div>
                <hr class="my-6 w-32 text-blue-500" />
                <p class="text-sm  text-gray-700 group-hover:text-white text-justify">La moringa, considerada un antibiótico natural, es una planta con múltiples usos y beneficios medicinales. Sus propiedades antiinflamatorias, antimicrobianas, antioxidantes.</p>

            </div>

            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <div class="relative">
                    <img class="h-64 w-full rounded-lg object-cover object-center lg:h-80" src="img/producto3.jpeg" alt="" />
                </div>
                <div class="justify-center flex">
                    <h3 class="mt-2 text-xl font-semibold  text-gray-700 group-hover:text-white ">¿Que es Spirulina?</h3>
                </div>
                <hr class="my-6 w-32 text-blue-500" />
                <p class="text-sm  text-gray-700 group-hover:text-white text-justify">La espirulina es una microalga de color azul verdosa que sirve para favorecer la pérdida de peso, proteger al corazón y al cerebro, regular el azúcar en la sangre.</p>

            </div>

            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <div class="relative">
                    <img class="h-64 w-full rounded-lg object-cover object-center lg:h-80" src="img/producto5.jpeg" alt="" />
                </div>
                <div class="justify-center flex">
                    <h3 class="mt-2 text-xl font-semibold  text-gray-700 group-hover:text-white  ">¿Que es Colágeno?</h3>
                </div>
                
                <hr class="my-6 w-32 text-blue-500" />
                <p class="text-sm  text-gray-700 group-hover:text-white text-justify">El colágeno es una proteína que se encuentra en nuestro organismo y que representa el 30% del total de proteínas del cuerpo humano.</p>

            </div>

        </div>

            
        </div>
        </div>
    </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
    <div id="informacion" class="container mx-auto px-6 py-10">
        <h2 class="text-center text-3xl font-bold capitalize text-lime-800 lg:text-4xl">COMO GANAR DINERO CON NOSOTROS</h2>

        <!-- <div class="w-full">
        <p class=" text-gray-500 mt-6 text-justify">SOMOS UN PROYECTO QUE BUSCA JUNTAR TODAS LAS POSIBILIDADES
                                                                     PARA HACER NEGOCIO EN UN SOLO LUGAR.



                                                                    NUESTRO OBJETIVO ES ANALIZAR LOS MERCADOS O INDUSTRIAS MAS
                                                                    RENTABLES E INCORPORAR A NUESTRO PROYECTO CON EL FIN DE
                                                                    POSICIONAR UNA MARCA QUE OCUPE TODO EN UN SOLO LUGAR.



                                                                    CONTAREMOS CON PRODUCTOS Y SERVICIOS DE ALTA DEMANDA,
                                                                    QUE SERAN PROMOCIONADOS POR NUESTROS CONSUMIDORES A TRAVES DEL NETWORK MARKETING.
                                                                    </p>

        </div> -->

        

        <!-- <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-12 xl:grid-cols-3 xl:gap-12">
        <div>
            <img class="h-90 w-full rounded-lg object-cover" src="img/imagen7.jpg" alt="" />
            <h3 class="mt-4 text-2xl font-semibold capitalize text-gray-800 dark:text-white">Best website collections</h3>
            <p class="mt-2 text-lg uppercase tracking-wider text-lime-700 ">Website</p>
        </div>
        <div>
            <img class="h-90 w-full rounded-lg object-cover" src="img/imagen8.jpg" alt="" />
            <h3 class="mt-4 text-2xl font-semibold capitalize text-gray-800 dark:text-white">Ton’s of mobile mockup</h3>
            <p class="mt-2 text-lg uppercase tracking-wider text-lime-700 ">Mockups</p>
        </div>

        <div>
            <img class="h-90 w-full rounded-lg object-cover" src="img/imagen9.jpg" />
            <h3 class="mt-4 text-2xl font-semibold capitalize text-gray-800 dark:text-white">Block of Ui kit collections</h3>
            <p class="mt-2 text-lg uppercase tracking-wider text-lime-700 ">Ui kit</p>
        </div>

        <div>
            <img class="h-90 w-full rounded-lg object-cover" src="img/imagen10.jpg" alt="" />
            <h3 class="mt-4 text-2xl font-semibold capitalize text-gray-800 dark:text-white">Ton’s of mobile mockup</h3>
            <p class="mt-2 text-lg uppercase tracking-wider text-lime-700 ">Mockups</p>
        </div>
        <div>
            <img class="h-90 w-full rounded-lg object-cover" src="img/imagen11.jpg" alt="" />
            <h3 class="mt-4 text-2xl font-semibold capitalize text-gray-800 dark:text-white">Ton’s of mobile mockup</h3>
            <p class="mt-2 text-lg uppercase tracking-wider text-lime-700 ">Mockups</p>
        </div>
        <div>
            <img class="h-90 w-full rounded-lg object-cover" src="img/imagen12.jpg" alt="" />
            <h3 class="mt-4 text-2xl font-semibold capitalize text-gray-800 dark:text-white">Ton’s of mobile mockup</h3>
            <p class="mt-2 text-lg uppercase tracking-wider text-lime-700 ">Mockups</p>
        </div>
        </div> -->
    </div>
    </section>
 

    <footer class="bg-white dark:bg-gray-900">
    <section class="h-12 bg-gradient-to-r p-4 from-lime-700 text-center via-lime-800 to-lime-900 dark:from-gray-700 dark:via-gray-800 dark:to-gray-900">
    <h3 class="text-gray-300 text-lg"> COPYRIGHT© 2023 - MIMPERIUM</h3>
        
    </section>

    </footer>
</main>
        
        </div>




        @livewireScripts



        @push('script')
        
        <script>

            Livewire.on('glider', function(id){

                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [
                        {
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 2.5,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3.5,
                                slidesToScroll: 3,
                            }
                        },

                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4.5,
                                slidesToScroll: 4,
                            }
                        },

                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 5.5,
                                slidesToScroll: 5,
                            }
                        },
                    ]
                });

            });
                
        </script>

    @endpush
    </body>
</html>