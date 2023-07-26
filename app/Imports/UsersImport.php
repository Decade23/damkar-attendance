<?php

namespace App\Imports;

use App\Traits\Users\MemberTrait;
use App\Traits\Users\UserProductTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{

    use MemberTrait, UserProductTrait;

    /**
     * @param Collection $rows
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row){

            try {
                Validator::make(
                    $row->toArray(),
                    [
                        'name'    => 'required',
                        'phone'   => 'required|unique:users',
                        'email'   => 'required|unique:users'
                    ]
                )->validate();

                if ($row->filter()->isNotEmpty()) {

                    $data = [
                        'name'    => $row['name'],
                        'email'   => $row['email'],
                        'phone'   => $row['phone'],
                        'address' => [
                            'address' => $row['address'],
                            'subdistrict_id' => null,
                            'province'       => null,
                            'postal_code'    => null,
                        ],
                    ];

                    $request = new Request(['member' => $data]);

                    #Save Member Data To User Table
                    $userDb = $this->storeMember($request);

                    #Save Member Address To User Address Table
                    $this->storeMemberAddress($userDb->id, $request->member);

                }
            } catch (\Exception $exception) {

                // dd($exception->getMessage());
                // Will Add The Error Result
            }
        }
    }
}
