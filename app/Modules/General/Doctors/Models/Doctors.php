<?php
namespace App\Modules\General\Doctors\Models;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    protected $table    = "doctors";
    protected $fillable = ['id','name','email','address','city','state','cep','specialty_id'];

}