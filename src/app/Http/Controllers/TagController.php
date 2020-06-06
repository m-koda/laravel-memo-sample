<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Memo;

class TagController extends Controller
{
    public function show(Request $request, Tag $tag)
    {
        $memos = $tag->memos()->where('user_id', $request->user()->id)->paginate(10);

        return view('memo.index', ['memos' => $memos]);
    }
}
