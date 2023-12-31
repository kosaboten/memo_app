<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemoRequest;
// Memoクラスを読み込む
use App\Models\Memo;

class MemoController extends Controller
{
    public  function index()
    {
        $memos = Memo::all();
        return view('memos.index', ['memos' => $memos]);
    }

    public function create()
    {
        return view('memos.create');
    }

    public function store(MemoRequest $request)
    {
        // インスタンスの作成
        $memo = new Memo;

        // 値の用意
        $memo->title = $request->title;
        $memo->body = $request->body;

        // インスタンスに値を設定して保存
        $memo->save();

        // 登録したらindexに戻る
        return redirect(route('memos.index'));
    }

    // showページへ移動
    public function show($id)
    {
        $memo = Memo::find($id);
        return view('memos.show', ['memo' => $memo]);
    }

    public function edit($id)
    {
        $memo = Memo::find($id);
        return view('memos.edit', ['memo' => $memo]);
    }

    //  Requestクラス型の$requestでフォームの値を受け取る, パラメータの$idを受け取る
    public function update(MemoRequest $request, $id)
    {
        $memo = Memo::find($id);

        $memo->title = $request->title;
        $memo->body = $request->body;

        $memo->save();
        return redirect(route('memos.index'));
    }

    public function destroy($id)
    {
        $memo = Memo::find($id);
        $memo -> delete();

        return(redirect(route('memos.index')));
    }
}
