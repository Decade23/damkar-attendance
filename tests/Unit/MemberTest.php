<?php

namespace Tests\Unit;

use App\Traits\Users\MemberTrait;
use App\Traits\Users\UserProductTrait;
use App\Models\Auth\User;
use App\Models\Subdistricts;
use App\Services\Member\MemberService;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MemberTest extends TestCase
{
    use WithFaker, MemberTrait, UserProductTrait;

    private function data()
    {
        $subdistrict = Subdistricts::first();

        $data = [
            'name'    => $this->faker->name,
            'email'   => $this->faker->email,
            'phone'   => $this->faker->phoneNumber,
            'address' => [
                'address'        => $this->faker->address,
                'subdistrict_id' => $subdistrict->id,
                'province'       => $subdistrict->province->name,
                'postal_code'    => $subdistrict->postal_code,
            ]
        ];

        return $data;
    }

    public function testCreate(){

        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $request       = new Request(['member' => $this->data()]);
        $memberDb = $this->storeMember($request, null);

        $this->storeMemberAddress($memberDb->id, $this->data());

        $this->assertInstanceOf(User::class, $memberDb);
    }

    public function testDatatables()
    {
        $request       = new Request();
        $memberResult = (new MemberService())->datatable($request);

        $this->assertJson($memberResult->getContent());
    }

    public function testShow()
    {

        $member = User::where('type', 'customer')->first();

        $memberResult = (new MemberService())->get($member->id);

        $this->assertInstanceOf(User::class, $memberResult);
    }

    public function testEdit()
    {
        $user = Sentinel::findById(1);
        Sentinel::login($user);

        $member       = User::where('type', 'customer')->first();
        $memberResult = (new MemberService())->update($member->id, (new Request($this->data())));
        $this->assertInstanceOf(User::class, $memberResult);
    }

    public function testDestroy()
    {
        $member       = User::where('type', 'customer')->first();
        $memberResult = (new MemberService())->destroy([$member->id]);

        $this->assertTrue($memberResult == 1);
    }

    public function testSelect2()
    {
        $memberResult = (new MemberService()
        )->select2(new Request());

        $this->assertIsObject($memberResult);
    }

    public function testAddUserExpiredNotNull(){
        $today          = now()->format('Y-m-d');
        $next6Month     = now()->addMonth(6)->format('Y-m-d');
        $addUserExpired = $this->expiredAt($today, 6);

        $this->assertTrue($next6Month == $addUserExpired);
    }

    public function testAddUserExpiredNull(){
        $next6Month     = now()->addMonth(6)->format('Y-m-d');
        $addUserExpired = $this->expiredAt(null, 6);

        $this->assertTrue($next6Month == $addUserExpired);
    }

    public function testAddUserExpired(){
        $expiredDate = "2018-10-12";
        $next6Month = now()->addMonth(6)->format('Y-m-d');
        $addUserExpired = $this->expiredAt($expiredDate, 6);

        $this->assertTrue($next6Month == $addUserExpired);
    }
}
