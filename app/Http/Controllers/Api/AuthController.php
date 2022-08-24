<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\Driver;
use App\Models\User;
use App\Service\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function createUser(Request $request)
    {

        try {
            //Validated
            $validateUser = Validator::make($request->all(),
                [
                    'email' => 'required|email|unique:users',
                    'password' => 'required'
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $data = $request->only(['email']);

            $data['password'] = Hash::make($request->password);
            $data['role'] = 'client';

            $user = User::create($data);
            $user->attachRole($request->role);



            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'user'=>$user
            ], 200);

        } catch (Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function infoRegister(Request $request,UploadService $service)
    {

        try {
            //Validated
            $validateUser = Validator::make($request->all(),
                [
                    'id'=>'exists:users,id',
                    'first_name'=>'required',
                    'last_name'=>'required',
                    'phone'=>'required|numeric',
                    'role'=>'sometimes|required|exists:roles,name',
                    'address'=>'required',
                    'gender'=>'required',
                    'image'=>'required|image',
                    'latitude'=>'nullable',
                    'longitude'=>'nullable'
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $user=User::find($request->id);

            if ($request->image) {
                $attachment['name'] = $service->upload($request->image, 'images');
                $user->attachment()->create($attachment);
            }
            $data = $request->except(['image']);

           $user->update($data);



            return response()->json([
                'status' => true,
                'message' => 'User updated Successfully',
                'user'=>$user
            ], 200);

        } catch (Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email or Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'user'=>$user,
            ], 200);

        } catch (Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

}
