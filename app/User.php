<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'display_name', 'title', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function signatures() {
        return $this->hasMany(Signature::class);
    }

    public function signaturesForChapter($chapterID) {
        return $this->signatures->where('chapter_id', $chapterID)->sortBy('evaluation');
    }

    public function completedChapters($bookID) {
        
        return $this->signatures->where('book_id', $bookID)->where('evaluation', 1)->count();
    }

    public function signatureCount($chapterID) {
        return $this->signatures->where('chapter_id', $chapterID)->where('evaluation', 0)->count();
    }

    public function evaluationCount($chapterID) {
        return $this->signatures->where('chapter_id', $chapterID)->where('evaluation', 1)->count();
    }

    public function currentBook() {
        return $this->signatures()->latest()->first()->book_id ?? 1;
    }
}
