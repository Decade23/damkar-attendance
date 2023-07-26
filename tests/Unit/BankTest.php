<?php

namespace Tests\Unit;

use App\Models\Bank;
use App\Services\Bank\BankService;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BankTest extends TestCase
{
    use WithFaker;

    private function data()
    {

        $data = [
            'bank_name'      => $this->faker->userName(),
            'account_name'   => $this->faker->userName(),
            'account_number' => $this->faker->bankAccountNumber(),
        ];

        return $data;
    }

    public function testCreate()
    {

        $request      = new Request($this->data());
        $bankServices = new BankService();
        $bank         = $bankServices->store($request);

        $this->assertInstanceOf(Bank::class, $bank);

    }

    public function testDatatables()
    {
        $request = new Request();
        $banks   = (new BankService())->datatable($request);

        $this->assertJson($banks->getContent());
    }

    public function testEdit()
    {
        $bank = Bank::first();

        $bank = (new BankService())->update($bank->id, (new Request($this->data())));

        $this->assertInstanceOf(Bank::class, $bank);
    }

    public function testDestroy()
    {
        $bank = Bank::first();
        $bank = (new BankService())->destroy($bank->id);

        $this->assertTrue($bank == 1);
    }

    public function testSelect2(){
        $banks = (new BankService())->select2(new Request());

        $this->assertIsObject($banks);
    }
}
