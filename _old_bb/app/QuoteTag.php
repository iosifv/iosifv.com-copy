<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\QuoteTags
 *
 * @property int $id
 * @property int $quote_id
 * @property int $tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Quote $quote
 * @property-read \App\Tag $tag
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteTag whereQuoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteTag whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteTag query()
 */
class QuoteTag extends Model
{
    protected $table = 'quote_tag';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quote_id',
        'tag_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}
