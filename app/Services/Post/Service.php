<?php
declare(strict_types=1);

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store(array $data): void
    {
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
    }

    public function update(Post $post, array $data): void
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        $post->fresh();
    }

}
