<?php

namespace App\Http\Controllers;


use App\Http\Requests\Work\RatingRequest;
use App\Http\Requests\Work\StoreRequest;
use App\Http\Requests\Work\UpdateRequest;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Rating;

class WorkController extends Controller
{

    public function my_work()
    {
        $works = Work::select(['id', 'title', 'image','body','rating', 'user_id'])->
                 where('user_id',Auth::id())->
                 orderBy('rating', 'desc')->
                 with('user')->paginate(9);

        return view('works.mylist', compact('works'));
    }

    public function list()
    {
        $works = Work::select(['id', 'title', 'image','body', 'rating','user_id'])->
                        with('user')->
                        orderBy('rating', 'desc')->
                        paginate(9);



        return view('works.list', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        return view('works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param
     * @return
     */
    public function store(StoreRequest $request)
    {

        $data = $request->only(['title', 'body']);
        $file = $request->file('image');
        $data['image'] = $file->store("images", 'public');
        $data['user_id'] = Auth::id();
        Work::create($data);
        return redirect()->route('work.my');

    }


    public function show(Work $work)
    {



        return view('works.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        return view('works.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Work $work)

    {
        $data = $request->only(['title', 'body']);
        $file = $request->file('image');
        if (isset($file)) {
            $data['image'] = $file->store("images", 'public');
        }
        $data['user_id'] = Auth::id();
        $work->update($data);
        return redirect()->route('work.my');
        //
    }
    public function about ()
    {
        return view('works.about');
    }

    /**
     *
     *
     * @param
     */
    public function destroy(Work $work)

    {

        $work->delete();


        return redirect()->route('work.my');
    }

    public function rating(RatingRequest $request, Work $work)
    {
        $rating = Rating::where('work_id', $work->id)->
                            where('user_id', Auth::id())->
                            first();

        if ($rating === null) {
            $rating = $request->only(['rating']);
            $rating['work_id'] = $work->id;
            $rating['user_id'] = Auth::id();
            Rating::create($rating);
        }else {
            $data = $request->only(['rating']);
            $rating->update($data);
        }

        $data['rating']  = Rating::select('rating')->
                          where('work_id', $work->id)->
                          avg('rating');

        $works=Work::find($work->id);
        $works->update($data);
        return redirect()->route('work.list');







    }
}
