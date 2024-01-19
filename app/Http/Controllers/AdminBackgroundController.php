<?php

namespace App\Http\Controllers;

use App\Models\Background;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BackgroundRequest;
use App\Http\Requests\BackgroundUpdateRequest;

class AdminBackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Background::all();
        return view('admin.background.index')->with('title', 'Background')->with('images', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.background.create')->with('title', 'Background Create')->with('action', 'background.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BackgroundRequest $request)
    {
        $img_path = $request->background_file->store('form_carousel', 'public');
        $request->except('background_file');
        Background::create(array_merge($request->all(), ['user' => Auth::user()->id, 'background_file' => "$img_path"]));
        return to_route('background.index')->with('success.message', 'Dados cadastrados com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Background::find($id);
        return view('admin.background.edit')->with('title', 'Background edit')->with('data', $data)->with('action', "background.update");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BackgroundUpdateRequest $request, string $id)
    {
        $data = Background::find($id);
        if ($request->background_file) {
            Storage::disk('public')->delete(Background::find($id)->background_file);
            $img_path = $request->background_file->store('form_carousel', 'public');
        } else {
            $img_path = $data->background_file;
        }
        $request->except('background_file');
        $data->fill(array_merge($request->all(), ['user' => Auth::user()->id, 'background_file' => "$img_path"]));
        $data->update();
        return redirect()->back()->with('success.message', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Storage::disk('public')->delete(Background::find($id)->background_file);
        Background::destroy($id);
        return to_route('background.index')->with('success.message', 'Dados excluídos com sucesso!');
    }
}


