<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\StatefulGuard;

class RegisterController extends Controller
{
    use PasswordValidationRules;

    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

 
    public function index($code=''){
        return view('auth.register',compact('code'));
    }

    public function create(Request $request)
    {
    $refer = User::where('code',$request['code'])->first();

    if($refer){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'dni' => ['required'],
            'direction' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ]);

            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'direction' => $request['direction'],
                'phone' => $request['phone'],
                'password' => Hash::make($request['password']),
                'status' => 'activo',
                'points' => 0,
                'points_residual' => 0,
                'dni' => $request['dni'],
                'rango_id' => 1,
                'acum_points' => 0,
                'points_global' => 0,
            ])->assignRole('cliente');

            $digitos = strlen($user->id);

                     if($digitos == 1) $code = '00000000000'.($user->id - 1);
                elseif ($digitos == 2) $code = '0000000000'.($user->id - 1);
                elseif ($digitos == 3) $code = '000000000'.($user->id - 1);
                elseif ($digitos == 4) $code = '00000000'.($user->id - 1);
                elseif ($digitos == 5) $code = '0000000'.($user->id - 1);
                elseif ($digitos == 6) $code = '000000'.($user->id - 1);
                elseif ($digitos == 7) $code = '0000'.($user->id - 1);
                elseif ($digitos == 8) $code = '000'.($user->id - 1);
                elseif ($digitos == 9) $code = '00'.($user->id - 1);
                elseif ($digitos == 10) $code ='0'.($user->id - 1);
                else $code = $user->id;
        
                $user->update([
                    'code' => $code,
                ]);
    
            $user->partners()->create([
                'refer_id' => $refer->id,
                'status' => 'activo',
                'rango_id' => 1
            ]);

           $this->guard->login($user);
           return redirect(route("home"));
        }
        else{
            return back()->with('info', 'El código introducido no se encuentra en nuestros registros')->withInput();
        }
    }
}
