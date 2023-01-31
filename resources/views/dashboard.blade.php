<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MIMPERIUM</title>

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

        <script src="glider.js"></script>

        <link rel="stylesheet" type="text/css" href="glider.css">



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

        <p class="mt-4 text-center text-gray-500 font-semibold">
Somos un proyecto que busca juntar todas las posibilidades para hacer negocio en un solo lugar. Nuestro objetivo es analizar los mercados o industrias más rentables e incorporar a nuestro proyecto con el fin de posicionar una marca que ocupe todo en un solo lugar.
Contaremos con productos y servicio de alta demanda, que serán promocionados por nuestros consumidores a través del Network Markenting.</p>

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
                <img class="h-full w-full rounded-lg object-cover" src="img/tecnologia.jfif" alt="" />
                <h3 class="mt-4 text-2xl font-bold capitalize  text-gray-600 group-hover:text-white">TECNOLOGÍA</h3>
            </div>


     
        </div>
        <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-1 xl:mt-12 xl:grid-cols-1 xl:gap-12">
         
            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <img class="h-full w-1/2 rounded-lg object-cover" src="img/sdigital.jfif" alt="" />
                <h3 class="mt-4 text-2xl font-bold capitalize  text-gray-600 group-hover:text-white">SERVICIOS DIGITALES</h3>
            </div>
     
        </div>
    </div>
    </section>

<section class="bg-white dark:bg-gray-900">
            <div class="container px-6 py-10 mx-auto" id="equipo">
                <h2 class="text-center text-3xl font-bold capitalize text-lime-800 lg:text-4xl">CORPORATIVO</h2>
                
                <p class="max-w-2xl mx-auto my-6 text-center text-gray-500 dark:text-gray-300 ">
                    Mi objetivo al fundar MIMPERIUM es poder darle la posibilidad a cualquier persona con cualquier nivel de experiencia en los negocios una oportunidad única, legítima y de bajo acceso.
                </p>

                <p class="max-w-2xl mx-auto text-center text-gray-500 dark:text-gray-300">
                    MIMPERIUM EIRL
                </p>
                <p class="max-w-2xl mx-auto text-center text-gray-500 dark:text-gray-300 mt-0">
                    RUC: 20610374281
                </p>
                
                
           
                <div class="flex flex-col items-center">
                    <div class="p-8 flex flex-col items-center w-1/2 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                    <img class="object-cover sm:w-full sm:h-full md:w-80 md:h-80 rounded-full ring-4 ring-gray-300" src="img/Juan.jpeg" alt="">
                        
                        <h3 class="mt-4 sm:text-md md:text-2xl font-semibold text-gray-700 capitalize dark:text-white group-hover:text-white">Juan Huaman</h3>
                        
                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">Fundador</p>
                        
                        <div class="flex mt-3 -mx-2">
                           

                            <a href="https://web.facebook.com/profile.php?id=100068524603945" class="mx-2 text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-300 group-hover:text-white"
                                aria-label="Facebook">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z">
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

         <div class="glider-contain">
            <ul class="glider">
                <li class="bg-white rounded-lg shadow mr-4">
                        <a href="#">
                            <article>
                                <figure>
                                    <img class="h-full w-full object-cover object-center" src="img/moringa.jpeg" alt="">
                                </figure>
                                
                                <div class="py-4 px-6">
                                    <h1 class="mt-2 text-xl font-semibold  text-gray-700 group-hover:text-white">
                                    Moringa
                                            
                                    </h1>
                                    <p class="text-sm  text-gray-700 group-hover:text-white text-justify">Considerada un antibiótico natural, es una planta con múltiples usos y beneficios medicinales. Sus propiedades antiinflamatorias, antimicrobianas, antioxidantes.</p>
                                </div>
                            </article>
                        </a>
                </li>
                <li class="bg-white rounded-lg shadow mr-4">
                        <a href="#">
                            <article>
                                <figure>
                                    <img class="h-full w-full object-cover object-center" src="img/espirulina.jpeg" alt="">
                                </figure>
                                
                                <div class="py-4 px-6">
                                    <h1 class="mt-2 text-xl font-semibold  text-gray-700 group-hover:text-white">
                                    Spirulina
                                            
                                    </h1>
                                    <p class="text-sm  text-gray-700 group-hover:text-white text-justify">Microalga de color azul verdosa que sirve para favorecer la pérdida de peso, proteger al corazón y al cerebro, regular el azúcar en la sangre.</p>
                                </div>
                            </article>
                        </a>
                </li>
                <li class="bg-white rounded-lg shadow mr-4">
                        <a href="#">
                            <article>
                                <figure>
                                    <img class="h-full w-full object-cover object-center" src="img/colageno.jpeg" alt="">
                                </figure>
                                
                                <div class="py-4 px-6">
                                    <h1 class="mt-2 text-xl font-semibold  text-gray-700 group-hover:text-white">
                                    Colágeno
                                            
                                    </h1>
                                    <p class="text-sm  text-gray-700 group-hover:text-white text-justify">Proteína que se encuentra en nuestro organismo y que representa el 30% del total de proteínas del cuerpo humano.</p>
                                </div>
                            </article>
                        </a>
                </li>
                <li class="bg-white rounded-lg shadow mr-4">
                        <a href="#">
                            <article>
                                <figure>
                                    <img class="h-full w-full object-cover object-center" src="img/detergente.jfif" alt="">
                                </figure>
                                
                                <div class="py-4 px-6">
                                    <h1 class="mt-2 text-xl font-semibold  text-gray-700 group-hover:text-white">
                                    Detergente
                                            
                                    </h1>
                                    <p class="text-sm  text-gray-700 group-hover:text-white text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </article>
                        </a>
                </li>
                <li class="bg-white rounded-lg shadow mr-4">
                        <a href="#">
                            <article>
                                <figure>
                                    <img class="h-full w-full object-cover object-center" src="img/lavavajillas.jfif" alt="">
                                </figure>
                                
                                <div class="py-4 px-6">
                                    <h1 class="mt-2 text-xl font-semibold  text-gray-700 group-hover:text-white">
                                    Lavavajillas
                                            
                                    </h1>
                                    <p class="text-sm  text-gray-700 group-hover:text-white text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </article>
                        </a>
                </li>
                <li class="bg-white rounded-lg shadow mr-4">
                        <a href="#">
                            <article>
                                <figure>
                                    <img class="h-full w-full object-cover object-center" src="img/jabon_liquido.jfif" alt="">
                                </figure>
                                
                                <div class="py-4 px-6">
                                    <h1 class="mt-2 text-xl font-semibold  text-gray-700 group-hover:text-white">
                                    Jabón liquido
                                            
                                    </h1>
                                    <p class="text-sm  text-gray-700 group-hover:text-white text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </article>
                        </a>
                </li>
            </ul>
        
            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div> 



        <!-- <div class="mt-8 grid grid-cols-1 gap-8 md:mt-16 md:grid-cols-2 xl:grid-cols-3">
            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <div class="relative">
                    <img class="h-64 w-full rounded-lg object-cover object-center lg:h-80" src="img/moringa.jpeg" alt="" />
                </div>

                  <div class="justify-center flex">
                    <h3 class="mt-2 text-xl font-semibold  text-gray-700 group-hover:text-white ">¿Que es Moringa?</h3>
                </div>
                <hr class="my-6 w-32 text-blue-500" />
                <p class="text-sm  text-gray-700 group-hover:text-white text-justify">La moringa, considerada un antibiótico natural, es una planta con múltiples usos y beneficios medicinales. Sus propiedades antiinflamatorias, antimicrobianas, antioxidantes.</p>

            </div>

            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <div class="relative">
                    <img class="h-64 w-full rounded-lg object-cover object-center lg:h-80" src="img/espirulina.jpeg" alt="" />
                </div>
                <div class="justify-center flex">
                    <h3 class="mt-2 text-xl font-semibold  text-gray-700 group-hover:text-white ">¿Que es Spirulina?</h3>
                </div>
                <hr class="my-6 w-32 text-blue-500" />
                <p class="text-sm  text-gray-700 group-hover:text-white text-justify">La espirulina es una microalga de color azul verdosa que sirve para favorecer la pérdida de peso, proteger al corazón y al cerebro, regular el azúcar en la sangre.</p>

            </div>

            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <div class="relative">
                    <img class="h-64 w-full rounded-lg object-cover object-center lg:h-80" src="img/colageno.jpeg" alt="" />
                </div>
                <div class="justify-center flex">
                    <h3 class="mt-2 text-xl font-semibold  text-gray-700 group-hover:text-white  ">¿Que es Colágeno?</h3>
                </div>
                
                <hr class="my-6 w-32 text-blue-500" />
                <p class="text-sm  text-gray-700 group-hover:text-white text-justify">El colágeno es una proteína que se encuentra en nuestro organismo y que representa el 30% del total de proteínas del cuerpo humano.</p>

            </div>

        </div> -->

            
        </div>
        </div>
    </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
    <div id="informacion" class="container mx-auto px-6 py-10">
        <h2 class="text-center text-3xl font-bold capitalize text-lime-800 lg:text-4xl">COMO GANAR DINERO CON NOSOTROS</h2>

        <video src="/video/videoplayback.mp4" class="w-full p-4 mt-2" controls></video>
  
    </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
    <div id="informacion" class="container mx-auto px-6 py-10">
        <h2 class="text-center text-3xl font-bold capitalize text-lime-800 lg:text-4xl">NUESTROS SOCIOS</h2>

        <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-3 xl:mt-12 xl:grid-cols-3 xl:gap-12">
            
            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <img class="h-full w-full rounded-lg object-cover" src="img/Bio.jfif" alt="" />
  
            </div>

            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <img class="h-full w-full rounded-lg object-cover" src="img/exlim.jfif" alt="" />
               
            </div>

            <div class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group hover:bg-lime-700 rounded-xl">
                <img class="h-full w-full rounded-lg object-cover" src="img/San joaquin.jfif" />
               
            </div>

        </div>
  
    </div>
    </section>
 

    <footer class="bg-white dark:bg-gray-900">
    <section class="h-12 bg-gradient-to-r p-4 from-lime-700 text-center via-lime-800 to-lime-900 dark:from-gray-700 dark:via-gray-800 dark:to-gray-900">
    <h3 class="text-gray-300 text-md font-bold"> COPYRIGHT© 2023 - MIMPERIUM</h3>
        
    </section>

    </footer>
</main>
        
        </div>


        

        <script>
            window.addEventListener('load', function(){
                new Glider(document.querySelector('.glider'), {
                slidesToShow: 2, //cant de registros que se muestran
                slidesToScroll: 1, //los saltos que se dan al darle click a los botones
                draggable: true,
                dots: '.dots',
                arrows: {
                    prev: '.glider-prev',
                    next: '.glider-next'
                },

                responsive:[
                    {
                        breakpoint: 640,
                        settings:{
                            slidesToShow: 1, 
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings:{
                            slidesToShow: 2, 
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings:{
                            slidesToShow: 3, 
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 1280,
                        settings:{
                            slidesToShow: 3, 
                            slidesToScroll: 2,
                        }
                    },
                ]
                });
                
            })

      
        </script>
        
    </body>
</html>