<?php

namespace App\Http\Controllers;

use App\news_post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class News_PostController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return void
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('news.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return void
	 * @throws ValidationException
	 */
	public function store(Request $request)
	{
		// validate the form data
		$this->validate($request, [
			'title' => 'required|max:255'
		]);

		// process the data and submit it
		$news_post = new news_post();
		$news_post->title = $request->title;
		$news_post->description = $request->description;

		// if successful we want to redirect
		if ($news_post->save()) {
			return redirect()->route('news.show', $news_post->id);
		} else {
			return redirect()->route('news.create');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function show($id)
	{
		// use the model to get one record from the database
		$news_post = News_Post::findOrFail($id);

		// show the view and pass the record to the view
		return view('news.show')->with('news_post', $news_post);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param int $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
