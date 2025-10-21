<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function materials()
    {
        return $this->hasMany(Material::class);

    }

public function users()
{
    return $this->belongsToMany(User::class, 'course_user')
                ->withPivot('status')
                ->withTimestamps();
}

    // Hanya student yang sudah aktif mengikuti course
    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user')
                    ->withPivot('status')
                    ->wherePivot('status', 'active')
                    ->withTimestamps();
    }

        // Tambahkan ini supaya field bisa diisi massal
    protected $fillable = [
        'title',
        'description',
        'status',
    ];

}
