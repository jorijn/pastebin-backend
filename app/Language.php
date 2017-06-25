<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Language.
 *
 * @mixin \Eloquent
 *
 * @property int $id
 * @property string $language
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereLanguage($value)
 */
class Language extends Model
{
    protected $fillable = ['language'];
    public $timestamps = false;
}
