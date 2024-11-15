<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Trip_Location;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class Trip_LocationsController extends Controller
{
    // 全ての旅先を取得
    public function index()
    {
        $trip_locations = Trip_Location::all();
        return view('home.index', compact('trip_locations'));
    }

    // 新しい旅先のフォームを表示
    public function create()
    {
        return view('home.create');
    }

    // 新しい旅先を保存
    public function store(Request $request)
    {
        $request->validate([
            'famousplace' => 'required|string|max:250',
            'country' => 'required',
            'image_url' => 'required|string|max:250',
            'description' => 'required|string|max:500',
        ]);

        Trip_Location::create($request->all());
        return redirect('/trip_locations')->with('success', '新たに1件登録されました');
    }

    // 特定の旅先を表示
    public function show(Trip_Location $trip_location)
    {
        return view('trip_locations.show', compact('trip_location'));
    }

    // 特定の旅先の編集フォームを表示
    public function edit($id)
    {
        $trip_location = Trip_Location::findorFail($id);
        return view('home.edit', compact('trip_location'));
    }

    // 特定の旅先を更新
    public function update(Request $request,$id)
    {
        $request->validate([
            'famousplace' => 'required|string|max:250',
            'country' => 'required',
            'image_url' => 'required|string|max:250',
            'description' => 'required|string|max:500',
        ]);
        
        $trip_location=Trip_Location::find($id);
        $trip_location->update([
            'famousplace' =>$request->famousplace,
            'country' =>$request->country,
            'image_url' =>$request->image_url,
            'descriptions' =>$request->descriptions,
        ]);
        
        return redirect('/trip_locations')->with('success','新たに編集されました');
    }
    // 特定の旅先を削除
    public function destroy($id)
    {
        $trip_location = Trip_Location::findOrfail($id);
        $trip_location->delete();

        return redirect('/trip_locations')->with('success','1件削除されました');
    }
}
