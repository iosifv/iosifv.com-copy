<?php

namespace App;

use App\Exceptions\MetaNotFound;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * App\Tag
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Quote[] $quotes
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property mixed|null $meta
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereMeta($value)
 * @property-read int|null $quotes_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag query()
 */
class Tag extends Model
{
    const TYPE_DEFAULT = 0;
    const TYPE_WORD    = 1;
    const TYPE_AUTHOR  = 2;
    const TYPE_BOOK    = 3;
    const TYPE_DATE    = 4;
    const TYPE_GALLERY = 5;

    const TYPES = [
        self::TYPE_DEFAULT => 'default',
        self::TYPE_WORD    => 'word',
        self::TYPE_AUTHOR  => 'author',
        self::TYPE_BOOK    => 'book',
        self::TYPE_DATE    => 'date',
        self::TYPE_GALLERY => 'gallery',
    ];

    const META_PHOTO   = 'photo';
    const META_WIKI    = 'wiki';
    const META_DETAILS = 'details';

    const METAS = [
        self::META_PHOTO,
        self::META_WIKI,
        self::META_DETAILS,
    ];

    protected $fillable = [
        'type',
        'name',
    ];

    /**
     * Tag constructor.
     * @param array $attributes
     * @throws \Exception
     */
    public function __construct(array $attributes = [])
    {
        if (!isset($attributes['type'])) {
            $attributes['type'] = self::TYPE_DEFAULT;
        }

        if (!in_array($attributes['type'], array_keys(self::TYPES))) {
            throw new \Exception('Invalid Tag Type: ' . $attributes['type']);
        }

        if (empty($attributes['meta'])) {
            $attributes['meta'] = '{}';
        }

        json_decode($attributes['meta']);
        $validJson = json_last_error() == JSON_ERROR_NONE;
        if (!$validJson) {
            throw new \InvalidArgumentException('Invalid JSON');
        }

        $this->saveMeta($attributes['meta']);

        parent::__construct($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function quotes()
    {
        return $this->belongsToMany(
            Quote::class,
            'quote_tag',
            'tag_id',
            'quote_id'
        );
    }

    /**
     * @return string
     */
    public function getTypeName():string
    {
        return self::TYPES[$this->type];
    }

    /**
     * Pretty formatted string as input, saved as normal string
     *
     * @param string $meta
     */
    public function saveMeta(string $meta)
    {
        $json = json_encode($meta, JSON_FORCE_OBJECT);
        $this->meta = json_decode($json, true);
    }

    /**
     * @return array
     */
    public function getAllMeta():array
    {
        $meta = $this->getAttribute('meta');
        return json_decode($meta, true);
    }

    /**
     * Returns a json which is printed nicely
     * @return string
     */
    public function getPrettyMeta():string
    {
        // Need to create object because we can't use both JSON_PRETTY_PRINT and JSON_FORCE_OBJECT
        $object = json_decode(
            $this->getAttribute('meta'),
            false
        );
        return json_encode(
            $object,
            JSON_PRETTY_PRINT
        );
    }

    /**
     * @param $key
     * @param bool $failHard
     * @return null
     * @throws MetaNotFound
     */
    public function getMeta($key, $failHard = false)
    {
        $meta = $this->getAllMeta();

        if ($failHard && !isset($meta[$key])) {
            throw new MetaNotFound();
        }

        if (!isset($meta[$key])) {
            return null;
        }

        return $meta[$key];
    }

    /**
     * This returns a formatted json which will be used by the masonry JS
     *
     * @return false|\stdClass|string
     */
    public static function getAllJson():string
    {
        $tags = Tag::all();

        $allTagsJson = new \stdClass();
        $tags->each(function (Tag $tag) use ($allTagsJson) {
            $allTagsJson->{$tag->name} = null;
        });

        $allTagsJson = json_encode($allTagsJson);

        return $allTagsJson;
    }

    /**
     * This returns a formatted json which will be used by the masonry JS
     *
     * @param Collection $tagCollection
     * @return string
     */
    public static function getExistingJson(Collection $tagCollection):string
    {
        return $tagCollection->map(function (Tag $tag) {
            $obj = new \stdClass();
            $obj->tabindex = $tag->id;
            $obj->tag = $tag->name;
            return $obj;
        })->toJson();
    }
}
