<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{
    public function token(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
//        dd($request->email, $request->password, $request->device_name);
        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            return response()->json(['success' => false, 'error' => 'User does not exist!']);
        } elseif (!Hash::check($request->password, $user->password)) {
            return response()->json(['success' => false, 'error' => 'Password is incorrect!']);
        } elseif ($user->client_id == null) {
            $device = Device::where('device_identifier', $request->device_name)->get();

            if ($device->count() == 0) {
                $new_device = new Device;
                $new_device->device_identifier = $request->device_name;
                $new_device->last_data_sync = now()->subYears(7);
                $new_device->last_inspection_sync = now()->subYears(7);
                $new_device->save();
            } elseif (!Hash::check($request->password, $user->password)) {
                return response()->json(['success' => false, 'error' => 'Password is incorrect!']);
            }

            if ($user->tokens->count() > 0) {
                $user->tokens()->delete();
            }

            $user_token = $user->createToken($request->device_name)->plainTextToken;
            return response()->json(['success' => true, "user" => $user->name, "token" => $user_token]);
        } else {
            return response()->json(['success' => false, 'error' => 'You are not an EPS Admin or Engineer!!!']);
        }
    }
}
