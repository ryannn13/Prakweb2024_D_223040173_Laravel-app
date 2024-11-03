<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Ryan Hidayat'], ['title' => 'About Page']);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog Page',
        'posts' => [
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
    ]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        'title' => 'Blog Page',
        'posts' => [
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

    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});
