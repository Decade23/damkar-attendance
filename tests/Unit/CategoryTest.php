<?php

namespace Tests\Unit;

use App\Models\Fulfillment\Category;
use App\Models\Product;
use App\Services\Category\CategoryService;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use WithFaker;

    private function data()
    {
        $product = Product::first();
        $data = [
            'category_name' => $this->faker->text(20),
            'product_id'    => $product->id
        ];

        return $data;
    }

    public function testCreate()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $request          = new Request($this->data());
        $categoryServices = new CategoryService();
        $category         = $categoryServices->store($request);

        $this->assertInstanceOf(Category::class, $category);
    }

    public function testDatatables()
    {
        $request   = new Request();
        $category = (new CategoryService())->datatable($request);

        $this->assertJson($category->getContent());
    }

    public function testEdit()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $category = Category::first();

        $category = (new CategoryService())->update($category->id, (new Request($this->data())));

        $this->assertInstanceOf(Category::class, $category);
    }

    public function testDestroy()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $category = Category::first();
        $category = (new CategoryService())->destroy($category->id);

        $this->assertTrue($category == 1);
    }

    public function testDestroyBulk()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $category = Category::first();
        if($category != null){
            $category = (new CategoryService())->destroyBulk([$category->id]);
            $this->assertTrue($category == 1);
        }

        $this->assertTrue($category == 0);
    }
}
