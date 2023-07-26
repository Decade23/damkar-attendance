<?php
/**
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename MedsosTrait.php
 * @LastModified 31/07/2020, 00:51
 */

namespace App\Traits\Medsos;


use App\Models\PalembangKito\AdvertisementSocialMedia;
use App\Models\PalembangKito\SubCategoryDetailSocialMedia;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

trait MedsosTrait
{
    public function storeAdsMedsos($request)
    {
        $store = New AdvertisementSocialMedia();
        $store->insert($this->dataInsert($request));
    }

    public function storeAdsMedsosV2($request)
    {
        $userDb = Sentinel::getUser()->email;

        $store = New AdvertisementSocialMedia();

        if (isset($request->facebook)) {
            $store->insert([[
                'advertisement_id'  => $request->advertisement_id,
                'link'              => $request->facebook,
                'type'              => 'facebook',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]]);
        }

        if (isset($request->instagram)) {
            $store->insert([[
                'advertisement_id'  => $request->advertisement_id,
                'link'              => $request->instagram,
                'type'              => 'instagram',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]]);
        }

        if (isset($request->twitter)) {
            $store->insert([[
                'advertisement_id'  => $request->advertisement_id,
                'link'              => $request->twitter,
                'type'              => 'twitter',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]]);
        }

        if (isset($request->web)) {
            $store->insert([[
                'advertisement_id'  => $request->advertisement_id,
                'link'              => $request->web,
                'type'              => 'web',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]]);
        }

        if (isset($request->whatsapp)) {
            $store->insert([[
                'advertisement_id'  => $request->advertisement_id,
                'link'              => $request->whatsapp,
                'type'              => 'whatsapp',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]]);
        }
    }

    public function updateAdsMedsos($dataDB, $request)
    {
        $userDb = Sentinel::getUser()->email;

        # update facebook
        $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
            ->where('type', 'facebook')->first();
        if ($updateFacebook != null) {
            $updateFacebook->link = $request->facebook;
            $updateFacebook->updated_by = $userDb;
            $updateFacebook->updated_at = now();
            $updateFacebook->save();
        } else {
            $store = New AdvertisementSocialMedia();
            $store->insert(
                [
                    'advertisement_id'  => $dataDB->advertisement_id,
                    'link'              => $request->facebook,
                    'type'              => 'facebook',
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]
            );
        }


        # update twitter
        $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
            ->where('type', 'twitter')->first();
        if ($updateFacebook != null) {
            $updateFacebook->link = $request->twitter;
            $updateFacebook->updated_by = $userDb;
            $updateFacebook->updated_at = now();
            $updateFacebook->save();
        } else {
            $store = New AdvertisementSocialMedia();
            $store->insert(
                [
                    'advertisement_id'  => $dataDB->advertisement_id,
                    'link'              => $request->twitter,
                    'type'              => 'twitter',
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]
            );
        }

        # update instagram
        $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
            ->where('type', 'instagram')->first();
        if ($updateFacebook != null) {
            $updateFacebook->link = $request->instagram;
            $updateFacebook->updated_by = $userDb;
            $updateFacebook->updated_at = now();
            $updateFacebook->save();
        } else {
            $store = New AdvertisementSocialMedia();
            $store->insert(
                [
                    'advertisement_id'  => $dataDB->advertisement_id,
                    'link'              => $request->instagram,
                    'type'              => 'instagram',
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]
            );
        }

        # update web
        $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
            ->where('type', 'web')->first();
        if ($updateFacebook != null) {
            $updateFacebook->link = $request->web;
            $updateFacebook->updated_by = $userDb;
            $updateFacebook->updated_at = now();
            $updateFacebook->save();
        } else {
            $store = New AdvertisementSocialMedia();
            $store->insert(
                [
                    'advertisement_id'  => $dataDB->advertisement_id,
                    'link'              => $request->web,
                    'type'              => 'web',
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]
            );
        }

        # update whatsapp
        $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
            ->where('type', 'whatsapp')->first();
        if ($updateFacebook != null) {
            $updateFacebook->link = $request->whatsapp;
            $updateFacebook->updated_by = $userDb;
            $updateFacebook->updated_at = now();
            $updateFacebook->save();
        } else {
            $store = New AdvertisementSocialMedia();
            $store->insert(
                [
                    'advertisement_id'  => $dataDB->advertisement_id,
                    'link'              => $request->whatsapp,
                    'type'              => 'whatsapp',
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]
            );
        }
    }

    public function updateAdsMedsosV2($dataDB, $request)
    {
        $userDb = Sentinel::getUser()->email;

        $store = New AdvertisementSocialMedia();


        #facebook
            $type = 'facebook';
            $req = $request->facebook;
            if (isset($req)) {
                # update facebook
                $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
                    ->where('type', $type)->first();
                if ($updateFacebook == null) {
                    $store->insert([[
                        'advertisement_id'  => $dataDB->advertisement_id,
                        'link'              => $req,
                        'type'              => $type,
                        'is_active'         => 1,
                        'created_by'        => $userDb,
                        'updated_by'        => $userDb,
                        'created_at'        => now(),
                        'updated_at'        => now(),
                    ]]);
                } else {
                    $updateFacebook->link = $req;
                    $updateFacebook->updated_by = $userDb;
                    $updateFacebook->updated_at = now();
                    $updateFacebook->save();
                }

            } else {
                # update facebook
                $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
                    ->where('type', $type)->first();
                if ($updateFacebook != null) {
    //                $updateFacebook->link = $request->facebook;
    //                $updateFacebook->updated_by = $userDb;
    //                $updateFacebook->updated_at = now();
    //                $updateFacebook->save();
                    $updateFacebook->delete();
                }
            }
        #end facebook

        #instagram
        $type = 'instagram';
        $req = $request->instagram;
        if (isset($req)) {
            # update facebook
            $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
                ->where('type', $type)->first();
            if ($updateFacebook == null) {
                $store->insert([[
                    'advertisement_id'  => $dataDB->advertisement_id,
                    'link'              => $req,
                    'type'              => $type,
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]]);
            } else {
                $updateFacebook->link = $req;
                $updateFacebook->updated_by = $userDb;
                $updateFacebook->updated_at = now();
                $updateFacebook->save();
            }

        } else {
            # update facebook
            $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
                ->where('type', $type)->first();
            if ($updateFacebook != null) {
                //                $updateFacebook->link = $request->facebook;
                //                $updateFacebook->updated_by = $userDb;
                //                $updateFacebook->updated_at = now();
                //                $updateFacebook->save();
                $updateFacebook->delete();
            }
        }
        #end instagram

        #twitter
        $type = 'twitter';
        $req = $request->twitter;
        if (isset($req)) {
            # update twitter
            $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
                ->where('type', $type)->first();
            if ($updateFacebook == null) {
                $store->insert([[
                    'advertisement_id'  => $dataDB->advertisement_id,
                    'link'              => $req,
                    'type'              => $type,
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]]);
            } else {
                $updateFacebook->link = $req;
                $updateFacebook->updated_by = $userDb;
                $updateFacebook->updated_at = now();
                $updateFacebook->save();
            }

        } else {
            # update twitter
            $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
                ->where('type', $type)->first();
            if ($updateFacebook != null) {
                //                $updateFacebook->link = $request->facebook;
                //                $updateFacebook->updated_by = $userDb;
                //                $updateFacebook->updated_at = now();
                //                $updateFacebook->save();
                $updateFacebook->delete();
            }
        }
        #end twitter

        #web
        $type = 'web';
        $req = $request->web;
        if (isset($req)) {
            # update web
            $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
                ->where('type', $type)->first();
            if ($updateFacebook == null) {
                $store->insert([[
                    'advertisement_id'  => $dataDB->advertisement_id,
                    'link'              => $req,
                    'type'              => $type,
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]]);
            } else {
                $updateFacebook->link = $req;
                $updateFacebook->updated_by = $userDb;
                $updateFacebook->updated_at = now();
                $updateFacebook->save();
            }

        } else {
            # update web
            $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
                ->where('type', $type)->first();
            if ($updateFacebook != null) {
                //                $updateFacebook->link = $request->facebook;
                //                $updateFacebook->updated_by = $userDb;
                //                $updateFacebook->updated_at = now();
                //                $updateFacebook->save();
                $updateFacebook->delete();
            }
        }
        #end web

        #whatsapp
        $type = 'whatsapp';
        $req = $request->whatsapp;
        if (isset($req)) {
            # update whatsapp
            $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
                ->where('type', $type)->first();
            if ($updateFacebook == null) {
                $store->insert([[
                    'advertisement_id'  => $dataDB->advertisement_id,
                    'link'              => $req,
                    'type'              => $type,
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]]);
            } else {
                $updateFacebook->link = $req;
                $updateFacebook->updated_by = $userDb;
                $updateFacebook->updated_at = now();
                $updateFacebook->save();
            }

        } else {
            # update whatsapp
            $updateFacebook = AdvertisementSocialMedia::where('advertisement_id', $dataDB->advertisement_id)
                ->where('type', $type)->first();
            if ($updateFacebook != null) {
                //                $updateFacebook->link = $request->facebook;
                //                $updateFacebook->updated_by = $userDb;
                //                $updateFacebook->updated_at = now();
                //                $updateFacebook->save();
                $updateFacebook->delete();
            }
        }
        #end whatsapp
    }

    public function storeCategorySubDetailMedsos($request)
    {
        $store = New SubCategoryDetailSocialMedia();
        $store->insert($this->dataInsertCatSub($request));
    }

    public function storeCategorySubDetailMedsosV2($request)
    {
        $userDb = Sentinel::getUser()->email;

        $store = New SubCategoryDetailSocialMedia();

        if (isset($request->facebook)) {
            $store->insert([[
                'category_sub_detail_id'  => $request->category_sub_detail_id,
                'link'              => $request->facebook,
                'type'              => 'facebook',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]]);
        }

        if (isset($request->instagram)) {
            $store->insert([[
                'category_sub_detail_id'  => $request->category_sub_detail_id,
                'link'              => $request->instagram,
                'type'              => 'instagram',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]]);
        }

        if (isset($request->twitter)) {
            $store->insert([[
                'category_sub_detail_id'  => $request->category_sub_detail_id,
                'link'              => $request->twitter,
                'type'              => 'twitter',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]]);
        }

        if (isset($request->web)) {
            $store->insert([[
                'category_sub_detail_id'  => $request->category_sub_detail_id,
                'link'              => $request->web,
                'type'              => 'web',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]]);
        }

        if (isset($request->whatsapp)) {
            $store->insert([[
                'category_sub_detail_id'  => $request->category_sub_detail_id,
                'link'              => $request->whatsapp,
                'type'              => 'whatsapp',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]]);
        }
    }

    public function updateCategorySubDetailMedsos($dataDB, $request)
    {
        $userDb = Sentinel::getUser()->email;

        # update facebook
        $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
            ->where('type', 'facebook')->first();

        if ($updateFacebook != null)
        {
            $updateFacebook->link = $request->facebook;
            $updateFacebook->updated_by = $userDb;
            $updateFacebook->updated_at = now();
            $updateFacebook->save();
        } else {
            $store = New SubCategoryDetailSocialMedia();
            $store->insert(
                [
                    'category_sub_detail_id'  => $dataDB->category_sub_detail_id,
                    'link'              => $request->facebook,
                    'type'              => 'facebook',
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]
            );
        }


        # update twitter
        $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
            ->where('type', 'twitter')->first();
        if ($updateFacebook != null)
        {
            $updateFacebook->link = $request->twitter;
            $updateFacebook->updated_by = $userDb;
            $updateFacebook->updated_at = now();
            $updateFacebook->save();
        } else {
            $store = New SubCategoryDetailSocialMedia();
            $store->insert(
                [
                    'category_sub_detail_id'  => $dataDB->category_sub_detail_id,
                    'link'              => $request->twitter,
                    'type'              => 'twitter',
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]
            );
        }

        # update instagram
        $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
            ->where('type', 'instagram')->first();
        if ($updateFacebook != null)
        {
            $updateFacebook->link = $request->instagram;
            $updateFacebook->updated_by = $userDb;
            $updateFacebook->updated_at = now();
            $updateFacebook->save();
        } else {
            $store = New SubCategoryDetailSocialMedia();
            $store->insert(
                [
                    'category_sub_detail_id'  => $dataDB->category_sub_detail_id,
                    'link'              => $request->instagram,
                    'type'              => 'instagram',
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]
            );
        }

        # update web
        $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
            ->where('type', 'web')->first();
        if ($updateFacebook != null)
        {
            $updateFacebook->link = $request->web;
            $updateFacebook->updated_by = $userDb;
            $updateFacebook->updated_at = now();
            $updateFacebook->save();
        } else {
            $store = New SubCategoryDetailSocialMedia();
            $store->insert(
                [
                    'category_sub_detail_id'  => $dataDB->category_sub_detail_id,
                    'link'              => $request->web,
                    'type'              => 'web',
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]
            );
        }

        # update whatsapp
        $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
            ->where('type', 'whatsapp')->first();
        if ($updateFacebook != null)
        {
            $updateFacebook->link = $request->whatsapp;
            $updateFacebook->updated_by = $userDb;
            $updateFacebook->updated_at = now();
            $updateFacebook->save();
        } else {
            $store = New SubCategoryDetailSocialMedia();
            $store->insert(
                [
                    'category_sub_detail_id'  => $dataDB->category_sub_detail_id,
                    'link'              => $request->whatsapp,
                    'type'              => 'whatsapp',
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]
            );
        }
    }

    public function updateCategorySubDetailMedsosV2($dataDB, $request)
    {
        $userDb = Sentinel::getUser()->email;

        $store = New SubCategoryDetailSocialMedia();


        #facebook
        $type = 'facebook';
        $req = $request->facebook;
        if (isset($req)) {
            # update facebook
            $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
                ->where('type', $type)->first();
            if ($updateFacebook == null) {
                $store->insert([[
                    'category_sub_detail_id'  => $dataDB->category_sub_detail_id,
                    'link'              => $req,
                    'type'              => $type,
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]]);
            } else {
                $updateFacebook->link = $req;
                $updateFacebook->updated_by = $userDb;
                $updateFacebook->updated_at = now();
                $updateFacebook->save();
            }

        } else {
            # update facebook
            $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
                ->where('type', $type)->first();
            if ($updateFacebook != null) {
                //                $updateFacebook->link = $request->facebook;
                //                $updateFacebook->updated_by = $userDb;
                //                $updateFacebook->updated_at = now();
                //                $updateFacebook->save();
                $updateFacebook->delete();
            }
        }
        #end facebook

        #instagram
        $type = 'instagram';
        $req = $request->instagram;
        if (isset($req)) {
            # update facebook
            $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
                ->where('type', $type)->first();
            if ($updateFacebook == null) {
                $store->insert([[
                    'category_sub_detail_id'  => $dataDB->category_sub_detail_id,
                    'link'              => $req,
                    'type'              => $type,
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]]);
            } else {
                $updateFacebook->link = $req;
                $updateFacebook->updated_by = $userDb;
                $updateFacebook->updated_at = now();
                $updateFacebook->save();
            }

        } else {
            # update facebook
            $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
                ->where('type', $type)->first();
            if ($updateFacebook != null) {
                //                $updateFacebook->link = $request->facebook;
                //                $updateFacebook->updated_by = $userDb;
                //                $updateFacebook->updated_at = now();
                //                $updateFacebook->save();
                $updateFacebook->delete();
            }
        }
        #end instagram

        #twitter
        $type = 'twitter';
        $req = $request->twitter;
        if (isset($req)) {
            # update twitter
            $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
                ->where('type', $type)->first();
            if ($updateFacebook == null) {
                $store->insert([[
                    'category_sub_detail_id'  => $dataDB->category_sub_detail_id,
                    'link'              => $req,
                    'type'              => $type,
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]]);
            } else {
                $updateFacebook->link = $req;
                $updateFacebook->updated_by = $userDb;
                $updateFacebook->updated_at = now();
                $updateFacebook->save();
            }

        } else {
            # update twitter
            $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
                ->where('type', $type)->first();
            if ($updateFacebook != null) {
                //                $updateFacebook->link = $request->facebook;
                //                $updateFacebook->updated_by = $userDb;
                //                $updateFacebook->updated_at = now();
                //                $updateFacebook->save();
                $updateFacebook->delete();
            }
        }
        #end twitter

        #web
        $type = 'web';
        $req = $request->web;
        if (isset($req)) {
            # update web
            $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
                ->where('type', $type)->first();
            if ($updateFacebook == null) {
                $store->insert([[
                    'category_sub_detail_id'  => $dataDB->category_sub_detail_id,
                    'link'              => $req,
                    'type'              => $type,
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]]);
            } else {
                $updateFacebook->link = $req;
                $updateFacebook->updated_by = $userDb;
                $updateFacebook->updated_at = now();
                $updateFacebook->save();
            }

        } else {
            # update web
            $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
                ->where('type', $type)->first();
            if ($updateFacebook != null) {
                //                $updateFacebook->link = $request->facebook;
                //                $updateFacebook->updated_by = $userDb;
                //                $updateFacebook->updated_at = now();
                //                $updateFacebook->save();
                $updateFacebook->delete();
            }
        }
        #end web

        #whatsapp
        $type = 'whatsapp';
        $req = $request->whatsapp;
        if (isset($req)) {
            # update whatsapp
            $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
                ->where('type', $type)->first();
            if ($updateFacebook == null) {
                $store->insert([[
                    'category_sub_detail_id'  => $dataDB->category_sub_detail_id,
                    'link'              => $req,
                    'type'              => $type,
                    'is_active'         => 1,
                    'created_by'        => $userDb,
                    'updated_by'        => $userDb,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]]);
            } else {
                $updateFacebook->link = $req;
                $updateFacebook->updated_by = $userDb;
                $updateFacebook->updated_at = now();
                $updateFacebook->save();
            }

        } else {
            # update whatsapp
            $updateFacebook = SubCategoryDetailSocialMedia::where('category_sub_detail_id', $dataDB->category_sub_detail_id)
                ->where('type', $type)->first();
            if ($updateFacebook != null) {
                //                $updateFacebook->link = $request->facebook;
                //                $updateFacebook->updated_by = $userDb;
                //                $updateFacebook->updated_at = now();
                //                $updateFacebook->save();
                $updateFacebook->delete();
            }
        }
        #end whatsapp
    }

    private function dataInsert($request)
    {
        $userDb = Sentinel::getUser()->email;

        return [
            [
                'advertisement_id'  => $request->advertisement_id,
                'link'              => $request->facebook,
                'type'              => 'facebook',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'advertisement_id'  => $request->advertisement_id,
                'link'              => $request->instagram,
                'type'              => 'instagram',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'advertisement_id'  => $request->advertisement_id,
                'link'              => $request->twitter,
                'type'              => 'twitter',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'advertisement_id'  => $request->advertisement_id,
                'link'              => $request->web,
                'type'              => 'web',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'advertisement_id'  => $request->advertisement_id,
                'link'              => $request->whatsapp,
                'type'              => 'whatsapp',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ];
    }

    private function dataInsertCatSub($request)
    {
        $userDb = Sentinel::getUser()->email;

        return [
            [
                'category_sub_detail_id'  => $request->category_sub_detail_id,
                'link'              => $request->facebook,
                'type'              => 'facebook',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'category_sub_detail_id'  => $request->category_sub_detail_id,
                'link'              => $request->instagram,
                'type'              => 'instagram',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'category_sub_detail_id'  => $request->category_sub_detail_id,
                'link'              => $request->twitter,
                'type'              => 'twitter',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'category_sub_detail_id'  => $request->category_sub_detail_id,
                'link'              => $request->web,
                'type'              => 'web',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'category_sub_detail_id'  => $request->category_sub_detail_id,
                'link'              => $request->whatsapp,
                'type'              => 'whatsapp',
                'is_active'         => 1,
                'created_by'        => $userDb,
                'updated_by'        => $userDb,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ];
    }
}
