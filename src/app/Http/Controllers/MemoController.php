<?php

namespace App\Http\Controllers;

use App\Memo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMemo;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->user()->id;

        $memos = Memo::where('user_id', $user_id)->paginate(10);

        return view('memo.index', ['memos' => $memos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memo.create');
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
        $memo->title = $request->title;
        $memo->content = $request->content;
        $memo->user_id = $user_id;
        $memo->save();

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
        return view('memo.edit', ['memo' => $memo]);
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
        $memo->title = $request->title;
        $memo->content = $request->content;
        $memo->save();

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
        Memo::destroy($memo->id);

        return redirect()->route('memo.index');
    }
}
