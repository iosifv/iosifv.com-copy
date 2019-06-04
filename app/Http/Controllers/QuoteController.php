<?php

namespace App\Http\Controllers;

use App\Quote;
use App\QuoteTag;
use App\Tag;
use App\Traits\SessionHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuoteController extends Controller
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
        $quotes = Quote::all();
        // Todo: make this a proper search with one SQL request
        $tags = Tag::find(QuoteTag::select('tag_id')->get());
        $search = $request->get('search');

        if (!is_null($search)) {
            $quotes = $quotes->filter(function (Quote $quote) use ($search) {
                if ($quote->hasText($search)) {
                    return true;
                }
                return false;
            });
        }

        return view('quotes.index')
            ->with('tags', $tags)
            ->with('search', $search)
            ->with('quotes', $quotes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexAdmin()
    {
        $quotes = Quote::all();

        return view('quotes.admin')
            ->with('quotes', $quotes);
    }

    /**
     * Display the specified resource.
     *
     * @param int $quoteId
     * @return Response
     */
    public function showById(int $quoteId)
    {
        $quote = Quote::find($quoteId);

        if (empty($quote)) {
            $this->flashError('Quote not found!');
            return redirect(route('quotes.index'));
        }

        return view('quotes.show')
            ->with('quote', $quote);
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return Response
     */
    public function showBySlug(string $slug)
    {
        $quote = Quote::findBySlug($slug);

        if (empty($quote)) {
            $this->flashError('Quote not found!');
            return redirect(route('quotes.index'));
        }

        return view('quotes.show')
            ->with('quote', $quote);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tags = Tag::all();
        $allTagsJson = Tag::getAllJson();
        $existingTagsJson = Tag::getExistingJson(collect([]));

        return view('quotes.create')
            ->with('tags', $tags)
            ->with('allTagsJson', $allTagsJson)
            ->with('existingTagsJson', $existingTagsJson);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Todo: use a custom request
        $input = $request->all();
        $quote = Quote::create($input);
        $quote->updateTagsById($input['tags'] ?? []);
        $quote->save();
        $this->flashSuccess('Saved successfully');

        return redirect(route('quotes.admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return Response
     */
    public function edit(Quote $quote)
    {
        $tags = Tag::all();
        $allTagsJson = Tag::getAllJson();
        $existingTagsJson = Tag::getExistingJson($quote->tags);

        return view('quotes.edit')
            ->with('tags', $tags)
            ->with('existingTagsJson', $existingTagsJson)
            ->with('allTagsJson', $allTagsJson)
            ->with('quote', $quote);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Quote $quote
     * @return Response
     */
    public function update(Request $request, Quote $quote)
    {
        // Todo: use a custom request
        $input = $request->all();
        $quote->update($input);

        $tagNameArray = explode(
            'close',
            $input['tags-text']
        );
        // There's a last 'close' which creates an empty entry at the end
        array_pop($tagNameArray);
        $quote->updateTagsByName($tagNameArray ?? []);

        return redirect(route('quotes.admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote $quote
     * @return Response
     * @throws \Exception
     */
    public function destroy(Quote $quote)
    {
        $quote->updateTagsById([]);
        $quote->delete();
        $this->flashSuccess('Deleted successfully');

        return redirect(route('quotes.admin'));
    }
}
