<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Flash;
use Response;

class CarsController extends Controller {
    public $successStatus = 200;

    public function getAllCars(Request $request) {
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $cars = Car::all();

            return response()->json($cars, $this->successStatus);
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }        
    }  
    
    public function getCar(Request $request) {
        $id = $request['cid']; // cid = Car id
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $car = Car::where('id', $id)->first();

            if ($car != null) {
                return response()->json($car, $this->successStatus);
            } else {
                return response()->json(['response' => 'Car not found!'], 404);
            }            
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }  
    }

    public function searchCar(Request $request) {
        $params = $request['p']; // p = params
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $car = Car::where('model', 'LIKE', '%' . $params . '%')
                ->orWhere('brand', 'LIKE', '%' . $params . '%')
                ->get();
            // SELECT * FROM cars WHERE description LIKE '%params%' OR title LIKE '%params%'
            if ($car != null) {
                return response()->json($car, $this->successStatus);
            } else {
                return response()->json(['response' => 'Car not found!'], 404);
            }            
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }  
    }
}
?>
