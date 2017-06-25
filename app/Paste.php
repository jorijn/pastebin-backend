<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Paste.
 *
 * @mixin \Eloquent
 *
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $expires_at
 * @property string $content
 * @property int $language_id
 * @property string|null $hash
 * @property string $ip
 *
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
    protected $dates = ['updated_at', 'created_at', 'expires_at'];
    protected $visible = ['content', 'hash', 'language'];
    protected $appends = ['language'];

    /**
     * Saves a new Paste to the database created from given request
     * parameters. Assumes $request has been validated already.
     *
     * @param Request $request
     *
     * @return Paste
     */
    public static function createFromRequest(Request $request): Paste
    {
        $language = Language::where('language', $request->get('language'))->first();
        abort_if(is_null($language) === true, 404, 'Language not found');

        $paste = new static();
        $paste->content = $request->get('content');
        $paste->language_id = $language->id;
        $paste->ip = $request->ip();

        $retention = $request->get('retention');
        if (is_numeric($retention) && $retention > 0) {
            $paste->expires_at = Carbon::now()->addMinutes($retention);
        }

        $paste->save();

        return $paste;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * Shorthand for returning the corresponding language
     * as a string.
     *
     * @return mixed
     */
    public function getLanguageAttribute()
    {
        return $this->attributes['language'] = $this->language()->first()->language;
    }
}
