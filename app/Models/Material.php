<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;  
use App\Models\Course; 


class Material extends Model
{
    use HasFactory;

            // Relasi ke Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

public function usersRead()
{
    return $this->belongsToMany(User::class, 'material_user')
                ->withPivot('is_read', 'is_completed')
                ->withTimestamps();
}

        // Tambahkan field yang boleh diisi massal
    protected $fillable = [
        'title',
        'content',
        'course_id', // karena materi terkait kursus
        'youtube_link', // untuk menyimpan link YouTube
    ];
    
public function usersCompleted()
{
    return $this->belongsToMany(User::class, 'material_user')
                ->wherePivot('is_completed', true)
                ->withTimestamps();
}

}
