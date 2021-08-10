<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public function header()
    {
        return $this->belongsTo(Header::class);
    }

    public function Detail()
    {
        return $this->belongsTo(Detail::class);
    }
}
