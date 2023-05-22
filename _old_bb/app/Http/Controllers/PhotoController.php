<?php

namespace App\Http\Controllers;

use App\Photo;
use App\PhotoTag;
use App\Tag;
use App\Traits\SessionHelperTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Storage;
use Image;

class PhotoController extends Controller
{
    use SessionHelperTrait;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $photos = Photo::all()->sortByDesc('created_at');
        $categories = $photos->pluck('category')->unique();
        // Todo: make this a proper search with one SQL request
        $tags = Tag::find(PhotoTag::select('tag_id')->get());
        $search = $request->get('search');

        if (!is_null($search)) {
            $photos = $photos->filter(function (Photo $photo) use ($search) {
                if ($photo->hasText($search)) {
                    return true;
                }
                return false;
            });
        }

        return view('photos.index')
            ->with('tags', $tags)
            ->with('categories', $categories)
            ->with('search', $search)
            ->with('photos', $photos);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexAdmin()
    {
        $photos = Photo::all()->sortByDesc('created_at');
        $files = Storage::allFiles('public/photos');

        foreach ($files as $publicPath) {
            $alreadyTracked = $photos->where(
                'public_path',
                Photo::addLeadingSlash($publicPath)
            )->count();

            if (0 == $alreadyTracked) {
                $photo = Photo::factory($publicPath);
                $photos->prepend($photo);
            }
        }

        return view('photos.admin')
            ->with('photos', $photos)
            ->with('files', $files);
    }

    /**
     * Simple call to recreate all the thumbnails of all the images
     *
     * @return Response
     */
    public function rebuildThumbnails($size = '400')
    {
        ini_set('max_execution_time', 300);
        $time_pre = microtime(true);

        $thumbDirName = 'photos_thumbs_' . $size;
        Storage::makeDirectory('public/' . $thumbDirName);
        $photos = Storage::allFiles('public/photos');

        $photoCount = count($photos) - 1;
        foreach($photos as $index => $photo) {
            $photoPath = public_path(str_replace('public', 'storage', $photo));
            $thumbPath = str_replace('photos', $thumbDirName, $photoPath);

//            dump($photoPath);
            Log::info('Resizing image: ' . $photoPath);
            $img = Image::make($photoPath)->resize(intval($size), intval($size), function ($constraint) {
                $constraint->aspectRatio();
            });

            $thumbDir  = dirname(str_replace('photos', $thumbDirName, $photo));
            Storage::makeDirectory($thumbDir);
            $img->save($thumbPath, 88);

            $elapsedTime = floor(microtime(true) - $time_pre);
            echo("($index/$photoCount in $elapsedTime"."s)   $thumbPath <br>");
        }
        ini_set('max_execution_time', 30);

        return 'Success';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $photo = Photo::factory(
            $request->get('public_path'),
            $request->get('storage_path')
        );

        $tags = Tag::all();
        $allTagsJson = Tag::getAllJson();
        $existingTagsJson = Tag::getExistingJson(collect([]));

        return view('photos.create')
            ->with('allTags', $tags)
            ->with('allTagsJson', $allTagsJson)
            ->with('existingTagsJson', $existingTagsJson)
            ->with('photo', $photo);
    }

    /**
     * There's a last 'close' which creates an empty entry at the end
     * @param Request $input
     * @return array
     */
    private function helperGetCleanTags($input): array
    {
        $tagNameArray = explode(
            'close',
            $input['tags-text']
        );
        array_pop($tagNameArray);

        return $tagNameArray;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        // Todo: use a custom request
        $input = $request->all();
        $photo = Photo::create($input);

        $photo->updateTagsByName(
            $this->helperGetCleanTags($input)
        );

        $photo->save();
        $this->flashSuccess('Saved successfully');

        return redirect(route('photos.admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Photo $photo
     * @return Response
     */
    public function edit(Photo $photo)
    {
        $tags = Tag::all();
        $allTagsJson = Tag::getAllJson();
        $existingTagsJson = Tag::getExistingJson($photo->tags);

        return view('photos.edit')
            ->with('tags', $tags)
            ->with('allTagsJson', $allTagsJson)
            ->with('existingTagsJson', $existingTagsJson)
            ->with('photo', $photo);
    }

    /**
     * Display the specified resource.
     *
     * @param int $photoId
     * @return Response
     */
    public function showById(int $photoId)
    {
        $photo = Photo::find($photoId);

        if (empty($photo)) {
            $this->flashError('Photo not found!');
            return redirect(route('photos.index'));
        }

        return view('photos.show')
            ->with('photo', $photo);
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return Response
     */
    public function showBySlug(string $slug)
    {
        $photo = Photo::findBySlug($slug);

        if (empty($photo)) {
            $this->flashError('Photo not found!');
            return redirect(route('photos.index'));
        }

        return view('photos.show')
            ->with('photo', $photo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Photo $photo
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, Photo $photo)
    {
        $input = $request->all();
        $photo->update($input);

        $photo->updateTagsByName(
            $this->helperGetCleanTags($input)
        );

        return redirect(route('photos.admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo $photo
     * @return RedirectResponse|Redirector
     * @throws \Exception
     */
    public function destroy(Photo $photo)
    {
        $photo->updateTagsById([]);
        $photo->delete();
        $this->flashSuccess('Deleted successfully');

        return redirect(route('photos.admin'));
    }
}
