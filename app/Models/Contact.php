<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country_code_id',
        'email',
        'phone',
        'ipAdress'
    ];
    public function country_code(){
        return $this->belongsTo(CountryCode::class);
    }
}
