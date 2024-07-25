<?php

namespace App\Actions\Admin\News;

use App\Models\NewsModel;
use Illuminate\Support\Facades\Log;

final class NewsStoreAction
{
    public function __invoke(array $validate_data)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $news = new NewsModel();
        $news->name = $validate_data['name'];
        $news->body = $validate_data['body'];
        $news->release_date = $validate_data['release_date'];
        $news->save();
    }
}
