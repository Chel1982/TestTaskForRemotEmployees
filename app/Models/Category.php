<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lot;

class Category extends Model
{
    use HasFactory;

    /**
     * The lots that belong to the category.
     */
    public function lots()
    {
        return $this->belongsToMany(Lot::class);
    }
}
