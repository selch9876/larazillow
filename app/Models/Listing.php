<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['beds', 'bathrooms', 'area', 'city', 'postcode', 'street', 'street_no', 'price'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'by_user_id');
    }
}
