<?php
/**
 * Created by PhpStorm.
 * User: dante
 * Date: 26/02/19
 * Time: 8:55
 */

namespace Tests\Unit;

use App\Models\Fulfillment\Comment;
use App\Services\Comments\CommentService;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentsTest extends TestCase
{
    use WithFaker;

    private function data()
    {
        $comment = Comment::first();
        $status  = $this->faker->randomElement(['approved', 'pending']);

        $data = [
            'comment_id'  => $comment->id,
            'user_id'     => $comment->user_id,
            'cms_post_id' => $comment->cms_post_id,
            'comment'     => $this->faker->text(100),
            'status'      => $status,
        ];

        return $data;
    }

    public function testCreate()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $request        = new Request($this->data());
        $commentService = new CommentService();
        $commment       = $commentService->store($request);

        $this->assertInstanceOf(Comment::class, $commment);

    }

    public function testDatatables()
    {
        $request  = new Request();
        $commment = (new CommentService())->datatable($request);

        $this->assertJson($commment->getContent());
    }

    public function testEdit()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $commment = Comment::first();

        $commment = (new CommentService())->update($commment->id, (new Request($this->data())));

        $this->assertInstanceOf(Comment::class, $commment);
    }
}