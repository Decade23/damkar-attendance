<?php

namespace Tests\Unit;

use App\Models\Commission;
use App\Models\Auth\Role;
use App\Services\Commission\CommissionService;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommissionTest extends TestCase
{
    use WithFaker;

    private function data()
    {
        $role = Role::first();
        $type = $this->faker->randomElement(['Percent', 'Rupiah']);

        $data = [
            'role_id'            => $role->id,
            'commission_type'    => $type,
            'commission_numeric' => $this->faker->text(100),
        ];

        return $data;
    }

    public function testCreate()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $request            = new Request($this->data());
        $commissionServices = new CommissionService();
        $commission         = $commissionServices->store($request);

        $this->assertInstanceOf(Commission::class, $commission);

    }

    public function testDatatables()
    {
        $request    = new Request();
        $commission = (new CommissionService())->datatable($request);

        $this->assertJson($commission->getContent());
    }

    public function testEdit()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $commission = Commission::first();

        $commission = (new CommissionService())->update($commission->id, (new Request($this->data())));

        $this->assertInstanceOf(Commission::class, $commission);
    }

    public function testDestroyBulk()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $commission = Commission::first();
        $commission = (new CommissionService())->destroyBulk([$commission->id]);

        $this->assertTrue($commission == 1);
    }

    public function testDestroy()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $commission = Commission::first();
        $commission = (new CommissionService())->destroy($commission->id);

        $this->assertTrue($commission == 1);
    }
}
