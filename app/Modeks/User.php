<?php

namespace App\Modeks;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Modeks\User
 *
 * @property int $id
 * @property string $name
 * @property int $password
 * @property string $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modeks\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modeks\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modeks\User whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modeks\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modeks\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modeks\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Model
{
    //
}
