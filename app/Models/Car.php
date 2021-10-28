<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Car
 * @package App\Models
 * @version October 28, 2021, 6:12 pm UTC
 *
 * @property string $model
 * @property string $brand
 * @property string $yr_release
 * @property string $number_of_units
 */
class Car extends Model
{

    use HasFactory;

    public $table = 'cars_api';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'model',
        'brand',
        'yr_release',
        'number_of_units'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'model' => 'string',
        'brand' => 'string',
        'yr_release' => 'string',
        'number_of_units' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'model' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'yr_release' => 'required|string|max:255',
        'number_of_units' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
