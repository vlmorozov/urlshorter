<?php

namespace App\Http\Controllers;

use App\Models\Url;
use function GuzzleHttp\describe_type;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UrlPresenter $urlPresenter)
    {
        //
        $urls = Url::query()
            ->limit(10)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'data' => $urlPresenter->table($urls),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UrlStoreRequest $storeRequest)
    {
        $url = $storeRequest->input('url');
        //
        $urlModel = Url::firstOrCreate([
            'link' => $url
        ]);

        return response()->json([
            'id' => $urlModel->id,
            'link' => $urlModel->short_link
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * +
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
