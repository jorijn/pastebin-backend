<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Paste
 *
 * @mixin \Eloquent
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $expires_at
 * @property string $content
 * @property int $language_id
 * @property string|null $hash
 * @property string $ip
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereUpdatedAt($value)
 */
class Paste extends Model
{
    protected $fillable = [ 'content' ];
    protected $dates = ['updated_at','created_at','expires_at'];
}
