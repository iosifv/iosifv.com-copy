<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagRequest;
use App\Tag;
use App\Traits\SessionHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagController extends Controller
{
    use SessionHelperTrait;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tag::all()->sortByDesc('created_at');

        return view('tags.index')
            ->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function store(Request $request)
    {
        // Todo: use a custom request
        $input = $request->all();
        try {
            $tag = new Tag($input);
            $tag->save();
        } catch (\Exception $e) {
            $this->flashError(sprintf(
                    '[%s:%s] - %s',
                    $e->getFile(),
                    $e->getLine(),
                    $e->getMessage()
                ));
            return redirect(route('tags.index'));
        }

        return redirect(route('tags.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit')
            ->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Tag $tag
     * @return Response
     */
    public function update(Request $request, Tag $tag)
    {
        // Todo: use a custom request
        $input = $request->all();
        $tag->update($input);

        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag $tag
     * @return Response
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect(route('tags.index'));
    }
}
