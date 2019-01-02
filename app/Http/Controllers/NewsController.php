<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\News;
use App\Transformers\NewsTransformer;
use Illuminate\Http\Request;
use Spatie\Fractal\Fractal;


class NewsController extends Controller
{
    /**
     * NewsController constructor.
     */
    public function __construct()
    {
        return $this->middleware('auth:api');
    }

    /**
     * Handel the request for return news
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $news = News::all();
        $transformedNews = Fractal::create($news, new NewsTransformer);
        return response()->json($transformedNews);
    }

    /**
     * Handel the request for add news
     *
     * @param NewsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(NewsRequest $request)
    {
        News::create($request->all());

        return response()->json(['message' => 'News added successfully !!'], 200);

    }

    /**
     * Handel the request for update news
     *
     * @param News $news
     * @param NewsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(News $news, NewsRequest $request)
    {
        $news->update($request->all());

        return response()->json(['message' => 'News updated successfully !!'], 200);

    }

    /**
     * Handel the request for return news
     *
     * @param News $news
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(News $news)
    {
        $news->delete();
        return response()->json(['message' => 'News deleted successfully !!'], 200);

    }
}
