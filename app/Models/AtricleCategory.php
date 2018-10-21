<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AtricleCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AtricleCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AtricleCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AtricleCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AtricleCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AtricleCategory extends Model
{
    //
    protected $fillable=['name'];
}
