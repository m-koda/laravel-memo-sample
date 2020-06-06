<?php

namespace App\Http\Controllers;

use App\Memo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMemo;
use App\User;
use App\Tag;

class MemoController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Memo::class, 'memo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find($request->user()->id);
        $memos = $user->memos()->paginate(10);        

        return view('memo.index', ['memos' => $memos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });
        return view('memo.create', ['allTagNames' => $allTagNames]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemo  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemo $request)
    {
        $user_id = $request->user()->id;

        $memo = new Memo();
        $memo->fill($request->all());
        $memo->user_id = $user_id;
        $memo->save();

        $request->tags->each(function($tagName) use ($memo) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $memo->tags()->attach($tag);
        });

        return redirect()->route('memo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function show(Memo $memo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function edit(Memo $memo)
    {
        $tagNames = $memo->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('memo.edit', [
            'memo' => $memo,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemo  $request
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMemo $request, Memo $memo)
    {
        
        $memo->fill($request->all())->save();
        
        $memo->tags()->detach();
        $request->tags->each(function($tagName) use ($memo) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $memo->tags()->attach($tag);
        });

        return redirect()->route('memo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memo $memo)
    {
        $memo->delete();

        return redirect()->route('memo.index');
    }
}
