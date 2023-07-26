<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     AttachRoleTrait.php
 * @LastModified 2/13/19 1:57 PM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Traits\Users;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Models\Groups;
use App\Models\GroupDetails;
use App\Models\Product;
// use App\Models\ProductGroup;

trait AttachRoleTrait
{
    /**
     * Attach User To Role
     *
     * @param $userDb
     * @param $roleName
     */
    private function attach($userDb, $roleName)
    {
        $role = Sentinel::findRoleByName($roleName);
        $role->users()->attach($userDb);
    }

    public function attachToGroup($userDb, $groupName = null)
    {
        $groups = new Groups();
        
        if ( request()->is('akun/sucor*') ) { # jika dari page sucor

            $group = $groups->where('name', 'sucor')->first();


        } else if ( request()->is('akun/mandiri*') ) # jika dari page mandiri
        {
            $group = $groups->where('name', 'mandiri')->first();   
        } else { # jika diluar page sucor dan mandiri

            #check jika product memiliki group yang telah disandingkan (attached) 
            $checkProductSyncGroups = $this->productHasGroups($groupName);
            if (is_object($checkProductSyncGroups)) {
                # code... Attach Product yang memiliki group 
                foreach ($checkProductSyncGroups as $group) {
                    # code...
                    $this->syncToGroup($userDb, $groups->find($group->id));
                }

            } else if($checkProductSyncGroups == 'product is undefined') { #jika product tidak memiliki groups /  product tidak terdaftar
                return true;
                                
            } else { #jika bukan product, akan create grup sendiri bila tidak ada grup yg sesuai dengan grup name dan otomatis attach ke grup  
                $group = $groups->firstOrCreate([
                    'name' => camel_case(ucwords($groupName))
                ])->where('name', camel_case(ucwords($groupName)))->first();

                # code... Attach To Group
                $this->syncToGroup($userDb, $group);
            }
            
        }

        #Code ... Sync To Group Here
        // $this->syncToGroup($userDb, $group);
    }

    private function productHasGroups($productName)
    {
        if ( $productDb = Product::where('name', $productName)->with('groups')->first() ) {
            # code...

            if ($productDb->groups->count()) {
                # code...
                return $productDb->groups;
            } else {
                return 'product is undefined';
            }
            
        }
        return false;
    }

    private function syncToGroup($userDb, $group){

        $check = GroupDetails::where('user_id', $userDb->id)->where('group_id', $group->id)->first();

        if (!$check) { #jika belum terdaftar di grup
            # save it...
            $attach = new GroupDetails();
            
            $attach->group_id = $group->id;
            $attach->user_id = $userDb->id;

            $attach->save();        
        }
    }
}