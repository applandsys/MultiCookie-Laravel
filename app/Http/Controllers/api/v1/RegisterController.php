<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;

class RegisterController extends BaseController
{
    public function register(Request $request): JsonResponse{
        $validator = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
                ]);

        if($validator->fails()){
            return $this->sendErrors("Validation Error". $validator->errors());
        }

        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $success["token"] = $user->createToken("Myapp")->plainTextToken();
        $success["user_data"] = $user;

        return $this->sendResponse( $success,"Usser Created Successfully");
    }

    public function login(Request $request): JsonResponse
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success["user_data"] = $user;
            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendResponse('Unauthorised', ['error'=>'Unauthorised']);
        }
    }

}
