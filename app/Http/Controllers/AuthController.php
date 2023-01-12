<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Registrera användare
    public function register(Request $request){
        $validatedUser = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6'
            ]
        );

        //Inkorrekta värden i registrering
        if($validatedUser->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'error' => $validatedUser->errors()
            ], 401);
        }

        //Korrekta värden i registrering
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        //returnera token på en gång för att slippa logga in vid registrering
        $token = $user->createToken('APITOKEN')->plainTextToken;

        $response = [
            'message' => 'User created successfully',
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    //Logga in användare
    public function login(Request $request) {
        $validatedUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        //Inkorrekta värden i registrering
        if($validatedUser->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'error' => $validatedUser->errors()
            ], 401);
        }

        //felaktig inloggning
        if(!auth()->attempt($request->only('email', 'password'))){
            //om den returnerar false(felaktigt email/lösen)
            return response()->json([
                'message' => 'Felaktig email/lösen'
            ], 401);
        } 
        //om korrekt email/lösen
        $user = User::where('email', $request->email)->first();
        //Skapa unik token för användare
        return response()->json([
            'message' => 'Användare inloggad',
            'token' => $user->createToken('APITOKEN')->plainTextToken
        ], 200);
    }

    //Logga ut användare
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        $response = [
            'message' => 'Användare utloggad'
        ];

        return response($response, 200);
    }
    //Test härifrån

    public function show($id)
    {
        $user = User::find($id);

        /* Kontrollerar om värdet finns */
        if ($user != null ) {
         return $user;
        } else {
         //Felmeddelande och errorkod
         return response()->json([
             'User not found'
         ], 404);
        }
    }


    //Uppdatera lösenord
    public function update(Request $request)
    {   
        $user = Auth::user();
        if($request->isMethod('put')){
            $user->update([
            
            'password' => bcrypt($request->input('password'))

           ]);
            return $user;

        }
    }

}