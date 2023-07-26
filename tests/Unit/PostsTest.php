<?php

namespace Tests\Unit;

use App\Models\Fulfillment\Post;
use App\Models\Fulfillment\Category;
use App\Models\Product;
use App\Services\Posts\PostsService;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
    use WithFaker;

    private function data()
    {
        $product = Product::first();
        $category = Category::first();
        $data = [
            'posts_name'    => $this->faker->text(20),
            'product_id'    => null,
            'short_content' => $this->faker->text(20),
            'content'       => $this->faker->text(20),
            'slug'          => $product->slug
        ];

        return $data;
    }

    public function testCreate()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $request       = new Request($this->data());
        $postsServices = new PostsService();
        $posts         = $postsServices->store($request->slug, $request);

        $this->assertInstanceOf(Post::class, $posts);

    }

    public function testDatatables()
    {
        $request   = new Request();
        $posts     = (new PostsService())->datatable($request);

        $this->assertJson($posts->getContent());
    }

    public function testEdit()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $posts = Post::first();

        $posts = (new PostsService())->update($posts->id, (new Request($this->data())));

        $this->assertInstanceOf(Post::class, $posts);
    }

    public function testDestroy()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $posts = Post::first();
        $posts = (new PostsService())->destroy($posts->id);

        $this->assertTrue($posts == 1);
    }

    public function testDestroyBulk()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $posts = Post::first();
        $posts = (new PostsService())->destroyBulk([$posts->id]);

        $this->assertTrue($posts == 1);
    }
}
