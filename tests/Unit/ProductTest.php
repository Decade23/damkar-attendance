<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Services\Product\ProductService;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use WithFaker;

    private function data()
    {
        $type = $this->faker->randomElement(['membership', 'workshop', 'book']);

        $data = [
            'type'        => $type,
            'name'        => $this->faker->name,
            'slug'        => $this->faker->slug(6),
            'short_desc'  => $this->faker->text(100),
            'description' => $this->faker->text(100),
            'price'       => $this->faker->numberBetween(100000, 10000000),
            'visibility'  => 'publish',
        ];

        if ($type == 'membership') {
            $data['time_period'] = $this->faker->numberBetween(1, 22);
        } else {
            if ($type == 'workshop') {
                $data['start_at'] = $this->faker->date('Y-m-d');
                $data['end_at'] = $this->faker->date('Y-m-d');
            }
        }

        return $data;
    }

    public function testCreate()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $request       = new Request($this->data());
        $productResult = (new ProductService())->store($request);

        $this->assertInstanceOf(Product::class, $productResult);
    }

    public function testDatatables()
    {
        $request       = new Request();
        $productResult = (new ProductService())->datatable($request);

        $this->assertJson($productResult->getContent());
    }

    public function testShow()
    {

        $product = Product::first();

        $productResult = (new ProductService())->get($product->id);

        $this->assertInstanceOf(Product::class, $productResult);
    }

    public function testEdit()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $product       = Product::first();
        $productResult = (new ProductService())->update($product->id, (new Request($this->data())));
        $this->assertInstanceOf(Product::class, $productResult);
    }

    public function testDestroy()
    {
        $product       = Product::first();
        $productResult = (new ProductService())->destroy([$product->id]);

        $this->assertTrue($productResult == 1);
    }

    public function testSelect2()
    {
        $productResult = (new ProductService())->select2(new Request());

        $this->assertIsObject($productResult);
    }

    public function testPaginate(){
        $products = (new ProductService())->getPaginate();

        $this->assertInstanceOf(LengthAwarePaginator::class, $products);
    }
}
