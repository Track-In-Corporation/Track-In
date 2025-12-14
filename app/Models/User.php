<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture_path',
        'created_at',
        'phone',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Handles multi column search
    private $SEARCH_COLUMNS = ["name", "email"];
    public function scopeSearch($query, $term) {
        $query->where(function($q) use ($term) {
            foreach($this->SEARCH_COLUMNS as $column) {
                $q->orWhere($column, "like", "%$term%");
            };
        });
    }

    public function scopedSearch($query, $search) {
        // return
    }

    public function transactions(){
      return $this->hasMany(Transaction::class, 'user_id', 'id');
    }

    protected function profilePicturePath(): Attribute {
        return Attribute::make(
            get: function ($value) {
                if ($value == null) return;
                if (str_contains($value, 'http')) return $value;
                return asset('storage/' . $value);
            }
        );
    }
}
