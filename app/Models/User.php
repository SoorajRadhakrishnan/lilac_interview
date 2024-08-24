<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'User';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'fk_department',
        'fk_designation',
        'phone_number',
    ];

    // Define the relationship to the Department
    public function department()
    {
        return $this->belongsTo(Department::class, 'fk_department');
    }

    // Define the relationship to the Designation
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'fk_designation');
    }
}
