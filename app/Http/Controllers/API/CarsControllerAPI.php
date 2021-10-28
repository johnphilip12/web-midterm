<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Car;
class CarsControllerAPI extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return response()->json(['cars'=>$cars]);
    }
}
