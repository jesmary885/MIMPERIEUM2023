<!-- component -->
<x-guest-layout>
    <style>
    .login_img_section {
    background: linear-gradient(rgba(2,2,2,.7),rgba(0,0,0,.7)),url(img/fondo_2_login.jfif) center center;
    background-repeat: no-repeat;
    background-size: cover  
    }
    </style>
    <div class="h-screen md:flex">
        <div class="hidden md:flex w-full lg:w-1/2 login_img_section justify-around items-center">
            <div class="bg-black opacity-20 inset-0 z-0"></div>
              <div class="w-full mx-auto px-20 flex-col items-center space-y-6">
                
                  <div class="flex justify-center lg:justify-start mt-6">
                    
                  </div>
              </div>
        </div>

          <div class="flex w-full lg:w-1/2 justify-center items-center bg-white space-y-8">
            <div class="w-full px-8 md:px-12 ">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-lime-600">
                    {{ session('status') }}
                </div>
            @endif

            <form class="bg-white rounded-md shadow-2xl p-5" method="POST" action="{{ route('login') }}">
            @csrf
            <div>
              <div class="flex justify-center">
                <a href="/" class="mt-6 mb-2">
                        <img src="img/logo huchu.png" class="block h-20 w-44 alt="">
                    </a>
              </div>
              <div class="flex justify-center" >
                <h1 class="text-lime-700 font-bold text-3xl mb-6 mt-4">Bienvenido</h1>
              </div>
            </div>
              

            
            <div class="flex items-center border-2 mb-8 py-2 px-3 rounded-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
                <input id="email" class="pl-2 w-full border-transparent focus:border-transparent focus:ring-0" type="email" name="email" placeholder="Email Address" />
            </div>
            <div class="flex items-center border-2 mb-12 py-2 px-3 rounded-2xl ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                  <path fillRule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clipRule="evenodd" />
                </svg>
                <input class="pl-2 w-full border-transparent focus:border-transparent focus:ring-0" type="password" name="password" id="password" placeholder="Contraseña" />
            </div>
              <button type="submit" class="block w-full bg-lime-700 mt-5 py-2 rounded-2xl hover:bg-lime-800 hover:-translate-y-1 transition-all duration-500 text-white font-semibold mb-2">Ingresar</button>
              <div class="flex justify-between mt-4">
              @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Has olvidado tu contraseña?') }}
                    </a>
                @endif
               

                <a href="{{ route('Registro') }}" class="text-sm ml-2 hover:text-lime-700 cursor-pointer hover:-translate-y-1 duration-500 transition-all">Aún no tienes una cuenta?</a>
              </div>
              
            </form>
            </div>
            
          </div>
      </div>
</x-guest-layout>