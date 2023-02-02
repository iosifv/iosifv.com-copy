<?php

namespace App;

use App\Interfaces\Searchable;
use App\Interfaces\Taggable;
use App\Traits\StringHelperTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Prophecy\Util\StringUtil;

/**
 * App\Photo
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @mixin \Eloquent
 * @property int $id
 * @property string $category
 * @property string $file_name
 * @property string $public_path
 * @property string $storage_path
 * @property string $slug
 * @property string|null $name
 * @property int $height
 * @property int $width
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo wherePublicPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereStoragePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereWidth($value)
 */
class Photo extends Model implements Searchable, Taggable
{
    use StringHelperTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category',
        'file_name',
        'public_path',
        'storage_path',
        'slug',
        'name',
        'height',
        'width',
        'description',
    ];

    /**
     * @return BelongsToMany
     */
    public function tags():BelongsToMany
    {
        return $this->belongsToMany(
            Tag::class,
            'photo_tag',
            'photo_id',
            'tag_id'
        );
    }

    /**
     * @param string $slug
     * @return Photo
     */
    public static function findBySlug(string $slug): ?Photo
    {
        $photo = Photo::where('slug', '=', $slug);

        return $photo->first();
    }

    /**
     * @param array $tags
     */
    public function updateTagsById(array $tags):void
    {
        $this->tags()->detach();
        foreach ($tags as $tagId) {
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

    public static function addLeadingSlash(string $path): string
    {
        if ($path[0] != '/') {
            $path = '/' . $path;
        }
        return $path;
    }

    /**
     * @param string $publicPath
     * @return string
     */
    public static function getStoragePath(string $publicPath): string
    {
        $path = str_replace('public', 'storage', $publicPath);
        return self::addLeadingSlash($path);
    }

    /**
     * @param string $filePath
     * @return string
     */
    public static function getCategoryFromFilePath(string $filePath): string
    {
        $info = pathinfo($filePath);

        /**
         * "public/photos/wallpapers" => "wallpapers"
         * "public/photos" => false (because of the +7)
         */
        $category = substr(
            $info['dirname'],
            strpos($info['dirname'], 'photos') + 7
        );

        if (false == $category) {
            return 'no-category';
        }

        return $category;
    }

    /**
     * @param string $publicPath
     * @param string|null $storagePath
     * @return Photo
     */
    public static function factory(string $publicPath, string $storagePath = null): Photo
    {
        /*
         * "dirname" => "public/photos"
         * "basename" => "CPU Fan.jpeg"
         * "extension" => "jpeg"
         * "filename" => "CPU Fan"
         */
        $pathInfo = pathinfo($storagePath);
        /*
         * 0 => 370
         * 1 => 136
         * 2 => 2
         * 3 => "width="370" height="136""
         * "bits" => 8
         * "channels" => 3
         * "mime" => "image/jpeg"
         */
        $imageSize = getimagesize(storage_path('app/' . $publicPath));

        $photo = new Photo([
            'category' => self::getCategoryFromFilePath($publicPath),
            'file_name' => $pathInfo['basename'],
            'storage_path' => $storagePath ?? self::getStoragePath($publicPath),
            'public_path' => self::addLeadingSlash($publicPath),
            'slug' => str_slug($pathInfo['filename'], '-'),
            'name' => ucwords(str_slug($pathInfo['filename'], ' ')),
            'width' => $imageSize[0],
            'height' => $imageSize[1],
        ]);

        return $photo;
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
        return Photo::all()->filter(function (Photo $photo) use ($tag) {
                if ($photo->hasTagName($tag->name)) {
                    return true;
                }
                return false;
            });
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
            $this->category,
            $this->name,
            $this->description,
        ], $search)) {
            return true;
        }

        if ($includeTags && $this->hasTagName($search)) {
            return true;
        }

        return false;
    }
}
