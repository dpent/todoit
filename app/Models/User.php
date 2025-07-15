<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|static create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Model|static findOrFail(mixed $id, array $columns = ['*'])
 */

/* The website's user
 * He/She can create todo tasks and review them
 * Needs to be logged in to see them
 */

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    /**
     * @OA\Schema(
     *     schema="User",
     *     type="object",
     *     title="User",
     *     description="User model",
     *     @OA\Property(
     *         property="first_name",
     *         type="string",
     *         format="text",
     *         example="John",
     *         description="The user's first name"
     *     ),
     *     @OA\Property(
     *          property="last_name",
     *          type="string",
     *          format="text",
     *          example="Doe",
     *          description="The user's last name"
     *      ),
     *     @OA\Property(
     *          property="username",
     *          type="string",
     *          format="text",
     *          example="JDoe4342",
     *          description="The username chosen when the account was created"
     *      ),
     *     @OA\Property(
     *           property="email",
     *           type="string",
     *           format="email",
     *           example="JDoe@example.com",
     *           description="The email given when the account was created"
     *       ),
     *      @OA\Property(
     *            property="password",
     *            type="string",
     *            format="text",
     *            example="Secret123",
     *            description="Password chosen when the account was created. The database hashes the value before saving it"
     *        )
     * )
     */

    protected $fillable = [ //All these are needed for creation
        'first_name', //Only email and password are needed for login
        'last_name',
        'username',
        'email',
        'password',
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
    protected function casts(): array //These need to be cast before being saved on the db
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Todo relation
    public function todos(): HasMany{
        return $this->hasMany(TodoJob::class,'todos_users');
    }
}


