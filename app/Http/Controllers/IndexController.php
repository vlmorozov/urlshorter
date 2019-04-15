<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    //

    public function index($code)
    {
        if (!empty($code)) {
            try {
                $id = (int)base64_decode($code);
                $url = Url::query()->whereId($id)->firstOrFail();

                (new History(['url_id' => $url->id]))->save();

                return Redirect::away($url->link);
            } catch (\Exception $e) {
            }
        }
        return redirect::to('/');

    }

    public function history()
    {
        $history = History::query()
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return response()->json([
            'data' => $history
        ]);
    }
}
