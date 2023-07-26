<?php

namespace Tests\Unit;

use App\Models\Promotion\JobList;
use App\Models\Promotion\Template;
use App\Services\Opportunity\OpportunityService;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OpportunityTest extends TestCase
{
    use WithFaker;

    public function testDatatables()
    {
        $request       = new Request();
        $opportunityResult = (new OpportunityService())->datatable($request);

        $this->assertJson($opportunityResult->getContent());
    }

    public function testSentWA(){

        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $templateData = [
            'type'        =>  "WA",
            'name'        =>  $this->faker->name,
            'template'    =>  $this->faker->text,
            'created_by'  => "root@admin.com",
            'updated_by'  => "root@admin.com"
        ];

        $template = factory(Template::class)->create($templateData);

        $whatsappData = [
            'phone' => [
                '0818293331'
            ],
            'name' => [
                'testing'
            ],
            'template' => $template->id
        ];

        $request = new Request($whatsappData);

        $opportunityResult = (new OpportunityService())->storeWa($request);

        $this->assertInstanceOf(JobList::class, $opportunityResult);
    }
}
