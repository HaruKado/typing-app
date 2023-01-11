<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drill;
use App\Http\Requests\DrillsRequest;

class DrillsController extends Controller
{
    public function index() {
        $drills = Drill::all();
        return view('drills.index', ['drills' => $drills]);
    }

    public function show($id)
    {
        if(!ctype_digit($id)){
        return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
    }

    $drill = Drill::find($id);

    return view('drills.show', ['drill' => $drill]);
}

    public function create()
    {
        return view('drills.new');
    }

    public function store(DrillsRequest $request)
    {
        $drill = new Drill;
        $drill->fill($request->all())->save();
        return redirect()->action('DrillsController@index')->with('flash_message', ' 登録が完了しました。');
    }

    public function edit($id)
    {
        if (!ctype_digit($id)) {
            return redirect()->action('DrillsController@create')->with('flash_message', ('無効なパラメータです。'));
        }
        $drill = Drill::find($id);
        return view('drills.edit', ['drill' => $drill]);
    }

    public function update(DrillsRequest $request, $id)
    {
        if(!ctype_digit($id)){
            return redirect()->action('DrillsController@new')->with('flash_message', __('Invalid operation was performed.'));
        }
    
        $drill = Drill::find($id);
        $drill->fill($request->all())->save();
    
        return redirect('/drills')->with('flash_message', __('Registered.'));
    }
}
