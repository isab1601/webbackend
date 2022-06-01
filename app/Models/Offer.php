<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description','subject_id', 'user_id'
    ];

    /**
     * hat ein Fach
     */
    public function subject() : BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
    /**
     * Hat genau einen User
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Angebot hat mehrere Termine
     */
    public function appointments() : HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function messages() : HasMany
    {
        return $this->hasMany(Message::class);
    }

}
