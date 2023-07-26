<?php

namespace Tests\Unit;

use App\Models\Complains;
use App\Models\Orders;
use App\Services\Complains\ComplainsService;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ComplainsTest extends TestCase
{
    use WithFaker;

    private function data()
    {
        $orders = Orders::first();
        $status = $this->faker->randomElement(['Processing', 'Finished']);

        $data = [
            'order_id'    => $orders->id,
            'order_code'  => '#'.$orders->id,
            'customer_id' => $orders->customer_id,
            'agent_id'    => $orders->agent_id,
            'problem'     => $this->faker->text(100),
            'solution'    => $this->faker->text(100),
            'status'      => $status,
        ];

        return $data;
    }

    public function testCreate()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $request           = new Request($this->data());
        $complainsServices = new ComplainsService();
        $complains         = $complainsServices->store($request);

        $this->assertInstanceOf(Complains::class, $complains);

    }

    public function testDatatables()
    {
        $request   = new Request();
        $complains = (new ComplainsService())->datatable($request);

        $this->assertJson($complains->getContent());
    }

    public function testEdit()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $complains = Complains::first();

        $complains = (new ComplainsService())->update($complains->id, (new Request($this->data())));

        $this->assertInstanceOf(Complains::class, $complains);
    }

    public function testDestroy()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $complains = Complains::first();
        $complains = (new ComplainsService())->destroy($complains->id);

        $this->assertTrue($complains == 1);
    }

    public function testDestroyBulk()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $complains = Complains::first();
        if($complains != null){
            $complains = (new ComplainsService())->destroyBulk([$complains->id]);

            $this->assertTrue($complains == 1);
        }
        $this->assertTrue($complains == 0);
    }
}
