<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pasien extends Model
{
    use HasFactory;
    protected $table = "pasien";
    protected $primaryKey ="id";
    protected $fillable = ['nama','alamat'];

    public function getAll(){
        return DB::table('pasien')->get();
    }
}
