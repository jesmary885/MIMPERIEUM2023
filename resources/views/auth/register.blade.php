<!-- component -->
<x-guest-layout>
    <style>
    .login_img_section {
    background: linear-gradient(rgba(2,2,2,.7),rgba(0,0,0,.7)),url(/img/fondo_2_login.jfif) center center;
    background-repeat: no-repeat;
    background-size: cover  
    }
    </style>

    <div class="h-screen md:flex mt-0 ">

        
        <div class="hidden md:flex w-full lg:w-1/2 login_img_section justify-around items-center">
        </div>

    

       
        <div class="w-full lg:w-1/2 items-center bg-white space-y-8">
           
            <div>
              <div class="flex justify-center">
                <a href="/" class="mt-6">
                        <img src="/img/logo huchu.png" class="block h-20 w-44">
                    </a>
              </div>
            </div>

            <div class="flex justify-center">
                @if (session('info'))
                    <div class="mt-1 font-semibold text-sm text-red-600">
                        {{ session('info') }}
                    </div>
                @endif 
            </div>

            
            
           
            <div class="flex justify-center mt-0">

                <form class="bg-white p-2 w-full" method="POST" action="{{ route('Registro_create') }}">
                @csrf
            
                    <x-jet-input-error for="name" />
                    <div class="flex items-center border-2 mb-6 py-2 px-3 rounded-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class=" h-8 w-8 mt-2 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M2 12.5V13H3V12.5H2ZM7 12.5V13H8V12.5H7ZM3 12.5V11.9999H2V12.5H3ZM7 11.9997V12.5H8V11.9997H7ZM5 10C6.10466 10 7 10.8952 7 11.9997H8C8 10.3427 6.65677 9 5 9V10ZM3 11.9999C3 10.8953 3.8954 10 5 10V9C3.34318 9 2 10.343 2 11.9999H3ZM5 4C3.89543 4 3 4.89543 3 6H4C4 5.44772 4.44772 5 5 5V4ZM7 6C7 4.89543 6.10457 4 5 4V5C5.55228 5 6 5.44772 6 6H7ZM5 8C6.10457 8 7 7.10457 7 6H6C6 6.55228 5.55228 7 5 7V8ZM5 7C4.44772 7 4 6.55228 4 6H3C3 7.10457 3.89543 8 5 8V7ZM1.5 3H13.5V2H1.5V3ZM14 3.5V11.5H15V3.5H14ZM13.5 12H1.5V13H13.5V12ZM1 11.5V3.5H0V11.5H1ZM1.5 12C1.22386 12 1 11.7761 1 11.5H0C0 12.3284 0.671574 13 1.5 13V12ZM14 11.5C14 11.7761 13.7761 12 13.5 12V13C14.3284 13 15 12.3284 15 11.5H14ZM13.5 3C13.7761 3 14 3.22386 14 3.5H15C15 2.67157 14.3284 2 13.5 2V3ZM1.5 2C0.671573 2 0 2.67157 0 3.5H1C1 3.22386 1.22386 3 1.5 3V2ZM9 6H12V5H9V6ZM9 9H12V8H9V9Z" fill="black"/>
                            </svg>
                            <input id="name" class="pl-2 text-gray-600 font-semibold w-full border-transparent focus:border-transparent focus:ring-0" type="text" name="name" placeholder="Nombre y apellido" value="{{ old('name') }}" />
                    </div>
                   
                    <x-jet-input-error for="email" />
                    <x-jet-input-error for="dni" />
                    <div class="flex justify-between w-full">
                        <div class="w-full flex items-center border-2 mb-6 py-2 px-3 rounded-2xl mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                                <input id="email" class="pl-2 w-full text-gray-600 font-semibold border-transparent focus:border-transparent focus:ring-0" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" />
                        </div>


                        <div class="w-full flex items-center border-2 mb-6 py-2 px-3 rounded-2xl mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class=" h-8 w-8 mt-2 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M2 12.5V13H3V12.5H2ZM7 12.5V13H8V12.5H7ZM3 12.5V11.9999H2V12.5H3ZM7 11.9997V12.5H8V11.9997H7ZM5 10C6.10466 10 7 10.8952 7 11.9997H8C8 10.3427 6.65677 9 5 9V10ZM3 11.9999C3 10.8953 3.8954 10 5 10V9C3.34318 9 2 10.343 2 11.9999H3ZM5 4C3.89543 4 3 4.89543 3 6H4C4 5.44772 4.44772 5 5 5V4ZM7 6C7 4.89543 6.10457 4 5 4V5C5.55228 5 6 5.44772 6 6H7ZM5 8C6.10457 8 7 7.10457 7 6H6C6 6.55228 5.55228 7 5 7V8ZM5 7C4.44772 7 4 6.55228 4 6H3C3 7.10457 3.89543 8 5 8V7ZM1.5 3H13.5V2H1.5V3ZM14 3.5V11.5H15V3.5H14ZM13.5 12H1.5V13H13.5V12ZM1 11.5V3.5H0V11.5H1ZM1.5 12C1.22386 12 1 11.7761 1 11.5H0C0 12.3284 0.671574 13 1.5 13V12ZM14 11.5C14 11.7761 13.7761 12 13.5 12V13C14.3284 13 15 12.3284 15 11.5H14ZM13.5 3C13.7761 3 14 3.22386 14 3.5H15C15 2.67157 14.3284 2 13.5 2V3ZM1.5 2C0.671573 2 0 2.67157 0 3.5H1C1 3.22386 1.22386 3 1.5 3V2ZM9 6H12V5H9V6ZM9 9H12V8H9V9Z" fill="black"/>
                            </svg>
                            <input id="dni" class="pl-2 w-full text-gray-600 font-semibold border-transparent focus:border-transparent focus:ring-0" type="number" name="dni" placeholder="DNI" value="{{ old('dni') }}" />
                        </div>
                    </div>

                    <div class="w-full flex items-center border-2 mb-6 py-2 px-3 rounded-2xl mr-2">
                        <select name="pais_id" id="pais_id" class="pl-2 w-full text-gray-600 font-semibold border-transparent focus:border-transparent focus:ring-0">
                            <option value="" selected> Seleccione su pais </option>
                            @foreach ($paises as $pais)
                                <option value="{{$pais->id}}">{{$pais->name}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="pais_id" />
             
                    </div>

                    

                    <x-jet-input-error for="direction" />
                    <div class="flex items-center border-2 mb-6 py-2 px-3 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="h-5 w-5 mr-2 text-gray-400" width="24px" height="24px" fill="none" stroke="currentColor" viewBox="0 0 24 24" version="1.1">
                        <g>
                        </g>
                        <path d="M16.641 5.409l-2.811-3.409h-4.83v-2h-1v2h-7v7h7v8h1v-8h4.838l2.803-3.591zM9 8h-7v-5h11.358l2.001 2.426-2.009 2.574h-4.35z" fill="#000000"/>
                    </svg>
                            <input id="direction" class="pl-2 w-full text-gray-600 font-semibold border-transparent focus:border-transparent focus:ring-0" type="text" name="direction" placeholder="Dirección" value="{{ old('direction') }}" />
                    </div>

                    <x-jet-input-error for="phone" />
                    <x-jet-input-error for="code" />
                    <div class="flex justify-between w-full">
                       
                        <div class="w-full flex items-center border-2 mb-6 py-2 px-3 rounded-2xl mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" width="24px" height="24px" viewBox="0 0 24 24" fill="none">
                                <path d="M19.0264 20.9929C20.0722 21.0873 21.0036 20.2223 20.9994 19.1864V16.4767C21.0104 16.0337 20.8579 15.6021 20.5709 15.264C19.7615 14.3106 16.9855 13.7008 15.8851 13.935C15.0273 14.1176 14.4272 14.9788 13.8405 15.5644C12.6172 14.8702 11.5075 14.005 10.5426 13M8.41019 10.1448C8.9969 9.55929 9.85987 8.96036 10.0428 8.10428C10.2771 7.00777 9.66813 4.24949 8.72131 3.43684C8.38828 3.151 7.96247 2.99577 7.52325 3.00009H4.80811C3.77358 3.00106 2.91287 3.92895 3.00706 4.96919C3.00081 12.9038 8.48251 19.3497 15.9999 20.7226" stroke="#001A72" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <input id="phone" class="pl-2 w-full text-gray-600 font-semibold border-transparent focus:border-transparent focus:ring-0" type="number" name="phone" placeholder="Teléfono" value="{{ old('phone') }}" />
                        </div>
                        <div class="w-full flex items-center border-2 mb-6 py-2 px-3 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                            <path d="M5.21428571,4 C4.54365423,4 4,4.54365423 4,5.21428571 L4,6.78571429 C4,7.45634577 4.54365423,8 5.21428571,8 L6.78571429,8 C7.45634577,8 8,7.45634577 8,6.78571429 L8,5.21428571 C8,4.54365423 7.45634577,4 6.78571429,4 L5.21428571,4 Z M5.21428571,3 L6.78571429,3 C8.00863052,3 9,3.99136948 9,5.21428571 L9,6.78571429 C9,8.00863052 8.00863052,9 6.78571429,9 L5.21428571,9 C3.99136948,9 3,8.00863052 3,6.78571429 L3,5.21428571 C3,3.99136948 3.99136948,3 5.21428571,3 Z M5.21428571,15 L6.78571429,15 C8.00863052,15 9,15.9913695 9,17.2142857 L9,18.7857143 C9,20.0086305 8.00863052,21 6.78571429,21 L5.21428571,21 C3.99136948,21 3,20.0086305 3,18.7857143 L3,17.2142857 C3,15.9913695 3.99136948,15 5.21428571,15 Z M5.21428571,16 C4.54365423,16 4,16.5436542 4,17.2142857 L4,18.7857143 C4,19.4563458 4.54365423,20 5.21428571,20 L6.78571429,20 C7.45634577,20 8,19.4563458 8,18.7857143 L8,17.2142857 C8,16.5436542 7.45634577,16 6.78571429,16 L5.21428571,16 Z M17.2142857,3 L18.7857143,3 C20.0086305,3 21,3.99136948 21,5.21428571 L21,6.78571429 C21,8.00863052 20.0086305,9 18.7857143,9 L17.2142857,9 C15.9913695,9 15,8.00863052 15,6.78571429 L15,5.21428571 C15,3.99136948 15.9913695,3 17.2142857,3 Z M17.2142857,4 C16.5436542,4 16,4.54365423 16,5.21428571 L16,6.78571429 C16,7.45634577 16.5436542,8 17.2142857,8 L18.7857143,8 C19.4563458,8 20,7.45634577 20,6.78571429 L20,5.21428571 C20,4.54365423 19.4563458,4 18.7857143,4 L17.2142857,4 Z M13,20 L13,19.5 C13,19.2238576 13.2238576,19 13.5,19 C13.7761424,19 14,19.2238576 14,19.5 L14,20 L14.5,20 C14.7761424,20 15,20.2238576 15,20.5 C15,20.7761424 14.7761424,21 14.5,21 L12.5,21 C12.2238576,21 12,20.7761424 12,20.5 C12,20.2238576 12.2238576,20 12.5,20 L13,20 Z M13,11 L14,11 L14,10.5 C14,10.2238576 14.2238576,10 14.5,10 C14.7761424,10 15,10.2238576 15,10.5 L15,11.5 C15,11.7761424 14.7761424,12 14.5,12 L11.5,12 C11.2238576,12 11,11.7761424 11,11.5 C11,11.2238576 11.2238576,11 11.5,11 L12,11 L12,10 L11.5,10 C11.2238576,10 11,9.77614237 11,9.5 C11,9.22385763 11.2238576,9 11.5,9 L12.5,9 C12.7761424,9 13,9.22385763 13,9.5 L13,11 L13,11 Z M19,12 L19,12.5 C19,12.7761424 18.7761424,13 18.5,13 C18.2238576,13 18,12.7761424 18,12.5 L18,10.5 C18,10.2238576 18.2238576,10 18.5,10 C18.7761424,10 19,10.2238576 19,10.5 L19,11 L20,11 L20,10.5 C20,10.2238576 20.2238576,10 20.5,10 C20.7761424,10 21,10.2238576 21,10.5 L21,11.5 C21,11.7761424 20.7761424,12 20.5,12 L19,12 Z M13,14 L11.5,14 C11.2238576,14 11,13.7761424 11,13.5 C11,13.2238576 11.2238576,13 11.5,13 L13.5,13 C13.7761424,13 14,13.2238576 14,13.5 L14,15.5 C14,15.7761424 13.7761424,16 13.5,16 L10.5,16 C10.2238576,16 10,15.7761424 10,15.5 C10,15.2238576 10.2238576,15 10.5,15 L13,15 L13,14 L13,14 Z M5.5,5 L6.5,5 C6.77614237,5 7,5.22385763 7,5.5 L7,6.5 C7,6.77614237 6.77614237,7 6.5,7 L5.5,7 C5.22385763,7 5,6.77614237 5,6.5 L5,5.5 C5,5.22385763 5.22385763,5 5.5,5 Z M5.5,17 L6.5,17 C6.77614237,17 7,17.2238576 7,17.5 L7,18.5 C7,18.7761424 6.77614237,19 6.5,19 L5.5,19 C5.22385763,19 5,18.7761424 5,18.5 L5,17.5 C5,17.2238576 5.22385763,17 5.5,17 Z M17.5,5 L18.5,5 C18.7761424,5 19,5.22385763 19,5.5 L19,6.5 C19,6.77614237 18.7761424,7 18.5,7 L17.5,7 C17.2238576,7 17,6.77614237 17,6.5 L17,5.5 C17,5.22385763 17.2238576,5 17.5,5 Z M13,5 L13,4 L11,4 L11,5.5 C11,5.77614237 10.7761424,6 10.5,6 C10.2238576,6 10,5.77614237 10,5.5 L10,3.5 C10,3.22385763 10.2238576,3 10.5,3 L13.5,3 C13.7761424,3 14,3.22385763 14,3.5 L14,5.5 C14,5.77614237 13.7761424,6 13.5,6 L12.5,6 C12.2238576,6 12,5.77614237 12,5.5 C12,5.22385763 12.2238576,5 12.5,5 L13,5 Z M10.5,8 C10.2238576,8 10,7.77614237 10,7.5 C10,7.22385763 10.2238576,7 10.5,7 L13.5,7 C13.7761424,7 14,7.22385763 14,7.5 C14,7.77614237 13.7761424,8 13.5,8 L10.5,8 Z M11,18 L11,20.5 C11,20.7761424 10.7761424,21 10.5,21 C10.2238576,21 10,20.7761424 10,20.5 L10,17.5 C10,17.2238576 10.2238576,17 10.5,17 L13.5,17 C13.7761424,17 14,17.2238576 14,17.5 C14,17.7761424 13.7761424,18 13.5,18 L11,18 Z M9,12 L9.5,12 C9.77614237,12 10,12.2238576 10,12.5 L10,13.5 C10,13.7761424 9.77614237,14 9.5,14 C9.22385763,14 9,13.7761424 9,13.5 L9,13 L8.5,13 C8.22385763,13 8,12.7761424 8,12.5 L8,10.5 C8,10.2238576 8.22385763,10 8.5,10 L9.5,10 C9.77614237,10 10,10.2238576 10,10.5 C10,10.7761424 9.77614237,11 9.5,11 L9,11 L9,12 Z M6,11 L5.5,11 C5.22385763,11 5,10.7761424 5,10.5 C5,10.2238576 5.22385763,10 5.5,10 L6.5,10 C6.77614237,10 7,10.2238576 7,10.5 L7,13.5 C7,13.7761424 6.77614237,14 6.5,14 C6.22385763,14 6,13.7761424 6,13.5 L6,11 Z M16,10.5 C16,10.2238576 16.2238576,10 16.5,10 C16.7761424,10 17,10.2238576 17,10.5 L17,12.5 C17,12.7761424 16.7761424,13 16.5,13 C16.2238576,13 16,12.7761424 16,12.5 L16,10.5 Z M20,14 L20,13.5 C20,13.2238576 20.2238576,13 20.5,13 C20.7761424,13 21,13.2238576 21,13.5 L21,14.5 C21,14.7761424 20.7761424,15 20.5,15 L17.5,15 C17.2238576,15 17,14.7761424 17,14.5 C17,14.2238576 17.2238576,14 17.5,14 L20,14 Z M16,16 L18.5,16 C18.7761424,16 19,16.2238576 19,16.5 C19,16.7761424 18.7761424,17 18.5,17 L15.5,17 C15.2238576,17 15,16.7761424 15,16.5 L15,14.5 C15,14.2238576 15.2238576,14 15.5,14 C15.7761424,14 16,14.2238576 16,14.5 L16,16 Z M20,20 L20,16.5 C20,16.2238576 20.2238576,16 20.5,16 C20.7761424,16 21,16.2238576 21,16.5 L21,20.5 C21,20.7761424 20.7761424,21 20.5,21 L16.5,21 C16.2238576,21 16,20.7761424 16,20.5 C16,20.2238576 16.2238576,20 16.5,20 L20,20 Z M15.5,19 C15.2238576,19 15,18.7761424 15,18.5 C15,18.2238576 15.2238576,18 15.5,18 L18.5,18 C18.7761424,18 19,18.2238576 19,18.5 C19,18.7761424 18.7761424,19 18.5,19 L15.5,19 Z M4,13 L4.5,13 C4.77614237,13 5,13.2238576 5,13.5 C5,13.7761424 4.77614237,14 4.5,14 L3.5,14 C3.22385763,14 3,13.7761424 3,13.5 L3,10.5 C3,10.2238576 3.22385763,10 3.5,10 C3.77614237,10 4,10.2238576 4,10.5 L4,13 Z"/>
                        </svg>
                        @if($code)
                            <input id="code" readonly class="pl-2 w-full text-gray-600 border-transparent focus:border-transparent focus:ring-0" type="text" name="code" placeholder="{{$code}}" value="{{$code}}" />
                        @else
                            <input id="code" class="pl-2 w-full text-gray-600 border-transparent focus:border-transparent focus:ring-0" type="text" name="code" placeholder="Código de su patrocinador" value="{{ old('code') }}" />
                        @endif
    
                        </div>
                    </div>

                    <x-jet-input-error for="password" />
                    <div class="flex justify-between w-full">
                        <div class="w-full flex items-center border-2 mb-6 mr-2 py-2 px-3 rounded-2xl ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fillRule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clipRule="evenodd" />
                            </svg>
                            <input class="pl-2 w-full text-gray-600 border-transparent focus:border-transparent focus:ring-0" type="password" name="password" id="password" placeholder="Contraseña" />
                        </div>

                        <div class="w-full flex items-center border-2 mb-6 py-2 px-3 rounded-2xl ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fillRule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clipRule="evenodd" />
                            </svg>
                            <input class="pl-2 w-full text-gray-600 border-transparent focus:border-transparent focus:ring-0" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar contraseña" />
                        </div>
                            
                    </div>

                

                    <button type="submit" class="block w-full bg-lime-700 mt-5 py-2 rounded-2xl hover:bg-lime-800 hover:-translate-y-1 transition-all duration-500 text-white font-semibold mb-2">Registrar</button>
                    
                </form>

            </div>
        
        </div>
    </div>
</x-guest-layout>