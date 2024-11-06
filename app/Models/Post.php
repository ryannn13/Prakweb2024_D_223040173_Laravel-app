<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Ryan Hidayat',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia voluptatum aut fugit optio est provident excepturi ea beatae iusto eveniet neque nam sint nesciunt recusandae atque ex eos, minima cum!'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Ryan Hidayat',
                'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque laudantium sed dignissimos, nostrum saepe debitis reiciendis, accusamus placeat eligendi velit autem consectetur suscipit ratione fugiat deserunt sint porro earum? Voluptatibus!'
            ]
        ];
    }

    public static function find($slug)
    {
        // return Arr::first(static::all(), function ($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });0

        $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

        if (!$post) {
            abort(404);
        }

        return $post;
    }
}
