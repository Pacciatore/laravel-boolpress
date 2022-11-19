<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validateTag($request);
        $form_data = $request->all();
        $tag = new Tag();
        $tag->fill($form_data);

        $slug = $this->getSlug($tag->name);
        $tag->slug = $slug;

        $tag->save();

        return redirect()->route('admin.tags.show', $tag->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
        $this->validateTag($request);
        $form_data = $request->all();

        if ($tag->name != $form_data['name']) {
            $slug = $this->getSlug($form_data['name']);
            $form_data['slug'] = $slug;
        }

        $tag->update($form_data);

        return redirect()->route('admin.tags.show', $tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        $tag->posts()->detach();
        $tag->delete();

        return redirect()->route('admin.tags.index');
    }

    private function getSlug($name)
    {
        $slug = Str::slug($name);
        $slug_base = $slug;

        $existingTag = Tag::where('slug', $slug)->first();
        $counter = 1;
        while ($existingTag) {
            $slug = $slug_base . '_' . $counter;
            $counter++;
            $existingTag = Tag::where('slug', $slug)->first();
        }

        return $slug;
    }

    private function validateTag(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30'
        ], [
            'required' => 'Il campo è obbligatorio',
            'max' => 'Il nome non può superare i :max caratteri'
        ]);
    }
}
