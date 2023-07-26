<?php

namespace Tests\Unit;

use App\Models\ContactUs;
use App\Services\ContactUs\ContactUsService;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactUsTest extends TestCase
{
    use WithFaker;

    private function data()
    {
        $type = $this->faker->randomElement(['WA', 'Phone', 'Office' ,'Email']);

        $data = [
            'type' => $type,
            'text' => $this->faker->text(100),
            'textOffice' => $this->faker->text(100)
        ];

        return $data;
    }

    public function testCreate()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $request            = new Request($this->data());
        $commissionServices = new ContactUsService();
        $contact_us         = $commissionServices->store($request);

        $this->assertInstanceOf(ContactUs::class, $contact_us);

    }

    public function testDatatables()
    {
        $request    = new Request();
        $contact_us = (new ContactUsService())->datatable($request);

        $this->assertJson($contact_us->getContent());
    }

    public function testEdit()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $contact_us = ContactUs::first();

        $contact_us = (new ContactUsService())->update($contact_us->id, (new Request($this->data())));

        $this->assertInstanceOf(ContactUs::class, $contact_us);
    }

    public function testDestroyBulk()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $contact_us = ContactUs::first();
        $contact_us = (new ContactUsService())->destroyBulk([$contact_us->id]);

        $this->assertTrue($contact_us == 1);
    }

    public function testDestroy()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $contact_us = ContactUs::first();
        if($contact_us != null){
            $contact_us = (new ContactUsService())->destroy($contact_us->id);

            $this->assertTrue($contact_us == 1);
        }

        $this->assertTrue($contact_us == 0);
    }
}
