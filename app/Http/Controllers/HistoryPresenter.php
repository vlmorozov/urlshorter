<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 14.04.19
 * Time: 19:29
 */

namespace App\Http\Controllers;


use App\Models\Url;

class UrlPresenter
{

    public function table($urls)
    {
        $result = [];

        foreach ($urls as $url) {
            $result[] = [
                'id' => $url->id,
                'link' => $url->short_link
            ];
        }

        return $result;
    }
}
