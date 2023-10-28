<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Memoクラスを読み込む
use App\Models\Memo;

class MemoController extends Controller
{
    public  function index()
    {
        $memos = Memo::all();
        return view('memos.index', ['memos' => $memos]);
    }
    // showページへ移動
    public function show($id)
    {
        $memo = Memo::find($id);
        return view('memos.show', ['memo' => $memo]);
    }
}
