<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesanan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "pesanan";
    public $timestamps = true;
    protected $fillable = [
        'name',
        'email',
        'paket',
        'kategori',
    ];
}
