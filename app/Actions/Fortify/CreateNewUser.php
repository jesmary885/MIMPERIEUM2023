<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $refer = User::where('code',$input['code'])->first();

        dd($refer);

        if($refer){
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required'],
                'dni' => ['required'],
                'direction' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            ])->validate();

       // $refer = User::where('code',$input['code'])->first();
                $user = User::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'direction' => $input['direction'],
                    'phone' => $input['phone'],
                    'dni' => $input['dni'],
                    'password' => Hash::make($input['password']),
                    'status' => 'activo'
                ])->assignRole('cliente');

                $digitos = strlen($user->id);

                if($digitos == 1) $code = '0000000'.$user->id;
                elseif ($digitos == 2) $code = '000000'.$user->id;
                elseif ($digitos == 3) $code = '00000'.$user->id;
                elseif ($digitos == 4) $code = '0000'.$user->id;
                elseif ($digitos == 5) $code = '000'.$user->id;
                elseif ($digitos == 6) $code = '00'.$user->id;
                elseif ($digitos == 7) $code = '0'.$user->id;
                elseif ($digitos == 8) $code = $user->id;
        
                $user->update([
                    'code' => $code,
                ]);
        
                $user->partners()->create([
                    'refer_id' => $refer->id
                ]);

                return $user;
            }
            else{
                return back()->with('error', 'El código de su patrocinador no coincide con ninguno de nuestros registros');
            }

    }
}
