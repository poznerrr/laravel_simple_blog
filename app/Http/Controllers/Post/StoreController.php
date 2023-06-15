<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        // Добавление в pivot через модель
        /* foreach ($tags as $tag) {
            PostTag::firstOrCreate([
                'tag_id' => $tag,
                'post_id' => $post->id
            ]);
        }
        */

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

}
