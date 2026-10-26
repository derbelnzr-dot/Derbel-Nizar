<?php

use App\Models\Post;

beforeEach(function () {
    $this->withoutVite();
});

it('shows the posts list', function () {
    Post::create([
        'title' => 'Premier article',
        'slug' => 'premier-article',
        'body' => 'Contenu du premier article de test.',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $this->get(route('posts.index'))
        ->assertOk()
        ->assertSee('Premier article');
});

it('shows a message when there is no post', function () {
    $this->get(route('posts.index'))
        ->assertOk()
        ->assertSee('Aucun article');
});

it('shows a single post', function () {
    $post = Post::create([
        'title' => 'Article complet',
        'slug' => 'article-complet',
        'body' => 'Texte complet de cet article de test.',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $this->get(route('posts.show', $post))
        ->assertOk()
        ->assertSee('Texte complet de cet article de test.');
});

it('returns 404 for an unknown post', function () {
    $this->get('/posts/999')->assertNotFound();
});

it('shows the create form', function () {
    $this->get(route('posts.create'))
        ->assertOk()
        ->assertSee('Nouvel article');
});

it('shows only published latest posts on home', function () {
    Post::create([
        'title' => 'Publié récemment',
        'slug' => 'publie-recemment',
        'body' => 'Article publié.',
        'is_published' => true,
        'published_at' => now(),
    ]);

    Post::create([
        'title' => 'Brouillon',
        'slug' => 'brouillon',
        'body' => 'Article non publié.',
        'is_published' => false,
        'published_at' => null,
    ]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('Publié récemment')
        ->assertDontSee('Brouillon');
});

it('can create a post', function () {
    $this->post(route('posts.store'), [
        'title' => 'Nouveau',
        'slug' => 'nouveau',
        'body' => 'Contenu suffisamment long pour passer la validation',
        'excerpt' => 'Extrait',
        'is_published' => '1',
    ])->assertRedirect();

    $this->assertDatabaseHas('posts', [
        'title' => 'Nouveau',
        'slug' => 'nouveau',
    ]);
});

it('can update a post', function () {
    $post = Post::create([
        'title' => 'Ancien',
        'slug' => 'ancien',
        'body' => 'Corps suffisamment long pour passer la validation',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $this->put(route('posts.update', $post), [
        'title' => 'Modifié',
        'slug' => 'modifie',
        'body' => 'Corps modifié suffisamment long pour passer la validation',
        'excerpt' => null,
        'is_published' => '0',
    ])->assertRedirect();

    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'title' => 'Modifié',
        'slug' => 'modifie',
    ]);
});

it('can delete a post', function () {
    $post = Post::create([
        'title' => 'À supprimer',
        'slug' => 'a-supprimer',
        'body' => 'Corps',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $this->delete(route('posts.destroy', $post))->assertRedirect();

    $this->assertDatabaseMissing('posts', [
        'id' => $post->id,
    ]);
});
