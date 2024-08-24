<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // Define the relationship to the User
    public function users()
    {
        return $this->hasMany(User::class, 'fk_designation');
    }
}
