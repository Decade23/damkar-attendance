<?php

namespace Tests\Unit;

use App\Traits\Users\MemberTrait;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Subdistricts;
use App\Services\Sales\SalesService;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class SalesTest extends TestCase
{
    use WithFaker, MemberTrait;

    private function data()
    {
        $subdistrict = Subdistricts::first();
        $products    = Product::first();
        $data = [
            'member' => [
                'name'    => $this->faker->name,
                'email'   => $this->faker->email,
                'phone'   => $this->faker->phoneNumber,
                'address' => [
                    'address'        => $this->faker->address,
                    'subdistrict_id' => $subdistrict->id,
                    'province'       => $subdistrict->province->name,
                    'postal_code'    => $subdistrict->postal_code
                ],
            ],

            'order_date'     => $this->faker->date(),
            'type'           => $this->faker->randomElement(['wa', 'web']),
            'payment_status' => 'unpaid',

            'products' => [
                [
                    'product_id'          => $products->id,
                    'product_name'        => $products->name,
                    'product_type'        => $products->type,
                    'product_time_period' => $products->time_period,
                    'product_unit_price'  => $products->price,
                    'qty'                 => 1,
                    'product_price'       => $products->price,
                    'slug'                => $products->slug
                ],
            ],

            'agent_id' => 1,
        ];

        return $data;
    }

    public function testCreate()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $request     = new Request($this->data());
        $salesResult = (new SalesService())->store($request);

        $this->assertInstanceOf(Orders::class, $salesResult);
    }

    public function testCreateWithoutAddress()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $data = $this->data();

        $data['member']['address']['address'] = null;
        $request     = new Request($data);
        $salesResult = (new SalesService())->store($request);

        $this->assertInstanceOf(Orders::class, $salesResult);
    }

    public function testCreateOnlyAddressWithoutSubdistrictId()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $data = $this->data();

        $data['member']['address']['subdistrict_id'] = null;
        $request     = new Request($data);
        $salesResult = (new SalesService())->store($request);


        $this->assertInstanceOf(Orders::class, $salesResult);
    }

    public function testCreateOnlySubdistrictIdWithoutAddress()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $data = $this->data();

        $data['member']['address']['address'] = null;
        $request     = new Request($data);
        $salesResult = (new SalesService())->store($request);


        $this->assertInstanceOf(Orders::class, $salesResult);
    }

    public function testDatatables()
    {
        $request       = new Request();
        $salesResult = (new SalesService())->datatable($request);

        $this->assertJson($salesResult->getContent());
    }

    public function testShow()
    {

        $sales = Orders::first();

        $salesResult = (new SalesService())->get($sales->id);

        $this->assertInstanceOf(Orders::class, $salesResult);
    }

    public function testEditUnpaid()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $sales                  = Orders::where('payment_status', 'unpaid')->orderBy('id', 'desc')->first();
        $data                   = $this->data();
        $salesResult            = (new SalesService())->update($sales->id, (new Request($data)));


        $this->assertInstanceOf(Orders::class, $salesResult);
    }

    public function testEditPaid()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $sales                  = Orders::where('payment_status', 'unpaid')->orderBy('id', 'desc')->first();
        $data                   = $this->data();
        $data['payment_status'] = 'paid';
        $salesResult            = (new SalesService())->update($sales->id, (new Request($data)));

        // dd($salesResult);
        $this->assertInstanceOf(Orders::class, $salesResult);
    }

    public function testRoll(){
        $product = Product::with('productSales')->orderBy('id', 'asc')->first();

        $salesId = (new SalesService())->rollSales($product->productSales);
        $this->assertIsInt($salesId);
    }
}
