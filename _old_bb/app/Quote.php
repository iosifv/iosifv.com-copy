<?php

namespace App;

use App\Interfaces\Searchable;
use App\Interfaces\Taggable;
use App\Traits\StringHelperTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

/**
 * App\Quote
 *
 * @property int $id
 * @property string $text
 * @property int|null $year
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereYear($value)
 * @mixin \Eloquent
 * @property string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereSlug($value)
 * @property string|null $source
 * @property-read int|null $notifications_count
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote query()
 */
class Quote extends Model implements Searchable, Taggable
{
    use Notifiable;
    use StringHelperTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
        'slug',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * @return BelongsToMany
     */
    public function tags():BelongsToMany
    {
        return $this->belongsToMany(
            Tag::class,
            'quote_tag',
            'quote_id',
            'tag_id'
        );
    }

    /**
     * @return BelongsToMany
     */
    public function authors()
    {
        return $this->tags()
            ->whereIn('type', [Tag::TYPE_AUTHOR]);
    }

    /**
     * Filters tags and gets just the first Author Tag
     * @return Tag
     */
    public function author():?Tag
    {
        return $this->tags()
            ->whereIn('type', [Tag::TYPE_AUTHOR])
            ->limit(1)->first();
    }

    /**
     * @param string $slug
     * @return Quote
     */
    public static function findBySlug(string $slug):?Quote
    {
        $quote = Quote::where('slug', '=', $slug);

        return $quote->first();
    }

    /**
     * @param array $tagIds
     */
    public function updateTagsById(array $tagIds):void
    {
        $this->tags()->detach();
        foreach ($tagIds as $tagId) {
            $this->tags()->attach($tagId);
        }
    }

    /**
     * @param array $tagNames
     */
    public function updateTagsByName(array $tagNames):void
    {
        $tagIds = Tag::whereIn('name', $tagNames)
            ->get()
            ->pluck('id')
            ->toArray();
        $this->updateTagsById($tagIds);
    }

    /**
     * @return string
     */
    public function getAuthorName():string
    {
        if (empty($this->author())) {
            return 'No Author';
        }

        return $this->author()->name;
    }

    /**
     * @param string $search
     * @param bool $includeTags
     * @return bool
     */
    public function hasText(string $search, bool $includeTags = true): bool
    {
        if ($this->findInStrings([
            $this->id,
            $this->slug,
            $this->text,
            $this->description,
        ], $search)) {
            return true;
        }

        if ($includeTags) {
            foreach ($this->tags as $tag) {
                if ($this->findInString($tag->name, $search)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Returns true if tag name is found within the model
     *
     * @param $name
     * @return bool
     */
    public function hasTagName(string $name):bool
    {
        foreach ($this->tags as $tag) {
            if ($this->findInString($tag->name, $name)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns all elements which are linked to this tag
     *
     * @param Tag $tag
     * @return Collection
     */
    public static function getWithSimilar(Tag $tag): Collection
    {
        return Quote::all()->filter(function (Quote $quote) use ($tag) {
            if ($quote->hasTagName($tag->name)) {
                return true;
            }
            return false;
        });
    }
}
