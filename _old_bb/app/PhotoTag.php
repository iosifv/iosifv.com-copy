<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * App\PhotoTag
 *
 * @property int $id
 * @property int $photo_id
 * @property int $tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Photo $photo
 * @property-read \App\Tag $tag
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhotoTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhotoTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhotoTag wherePhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhotoTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhotoTag whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhotoTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhotoTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhotoTag query()
 */
class PhotoTag extends Model
{
    protected $table = 'photo_tag';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo_id',
        'tag_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
