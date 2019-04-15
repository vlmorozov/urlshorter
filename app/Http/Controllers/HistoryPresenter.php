<?php

namespace App\Http\Controllers;


use App\Models\History;

class HistoryPresenter
{

    public function table($history)
    {
        $result = [];

        foreach ($history as $item) {
            $result[] = [
                'date' => $item->created_at->format('Y-m-d H:i:s'),
                'url_id' => $item->url->id,
                'link' => $item->url->link,
            ];
        }

        return $result;
    }
}
