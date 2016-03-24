<?php

namespace emutoday\Http\Controllers\Admin;

use emutoday\Story;
use emutoday\StoryImage;

use Illuminate\Http\Request;
use emutoday\Http\Requests;


class StoryController extends Controller
{
    protected $storys;

    public function __construct(Story $storys)
    {
        $this->storys = $storys;
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $storys = $this->storys->with('author')->orderBy('published_at', 'desc')->paginate(10);

        return view('admin.story.index', compact('storys'));
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Story $story)
    {
        return view('admin.story.create', compact('story'));
    }

    public function store(Requests\StoreStoryRequest $request)
    {
        $story = $this->storys->create(
        ['author_id' => auth()->user()->id] + $request->only('title', 'slug', 'subtitle', 'published_at', 'teaser','content', 'story_type')
        );

        if ($story->story_type != 'storybasic'){
            $storyImage = $story->storyImages()->create([
                'image_name'=> 'img' . $story->id . '_small',
                'image_type'=> 'imagesmall',
            ]);
            $storyImage = $story->storyImages()->create([
                'image_name'=> 'img' . $story->id . '_main',
                'image_type'=> 'imagemain',
            ]);
        }
        flash()->success('Story has been created.');
        return redirect(route('admin.story.edit', $story->id));//->with('status', 'Story has been created.');

    }

    public function edit($id)
    {
        $story = $this->storys->findOrFail($id);

        return view('admin.story.edit', compact('story'));

    }
    public function update(Requests\UpdateStoryRequest $request, $id)
    {
        $story = $this->storys->findOrFail($id);
        $story->fill($request->only('title', 'slug', 'subtitle', 'published_at', 'teaser','content','story_type'))->save();
        flash()->success('Story has been updated.');
        return redirect(route('admin.story.edit', $story->id));
        //return redirect(route('admin.story.edit', $story->id))->with('status', 'Story has been updated.');
    }

    public function confirm($id)
    {
        $story = $this->storys->findOrFail($id);

        return view('admin.story.confirm', compact('story'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $story = $this->storys->findOrFail($id);

        return view('admin.story.show', compact('story'));
    }

    public function destroy($id)
    {
        $story = $this->storys->findOrFail($id);
        $story->delete();
        flash()->warning('Story has been deleted.');
        return redirect(route('admin.story.index'));//->with('status', 'Story has been deleted.');
    }

}
