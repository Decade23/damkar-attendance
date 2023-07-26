<?php

namespace Tests\Unit;

use App\Models\Groups;
use App\Models\Auth\User;
use App\Services\Group\GroupService;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroupTest extends TestCase
{
    use WithFaker;

    private function data()
    {
        $user = User::first();

        $data = [
            'name'    => $this->faker->text(20),
            'user_id' => [$user->id]
        ];

        return $data;
    }

    public function testCreate()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $request       = new Request($this->data());
        $groupServices = new GroupService();
        $group         = $groupServices->store($request);

        $this->assertInstanceOf(Groups::class, $group);

    }

    public function testDatatables()
    {
        $request   = new Request();
        $group = (new GroupService())->datatable($request);

        $this->assertJson($group->getContent());
    }

    public function testEdit()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $group = Groups::first();

        $group = (new GroupService())->update($group->id, (new Request($this->data())));

        $this->assertInstanceOf(Groups::class, $group);
    }

    public function testDestroy()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $group = Groups::first();
        $group = (new GroupService())->destroy($group->id);

        $this->assertTrue($group == 1);
    }

    public function testDestroyBulk()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $group = Groups::first();
        if($group != null){
            $group = (new GroupService())->destroyBulk([$group->id]);

            $this->assertTrue($group == 1);
        }
        $this->assertTrue($group == 0);
    }
}
