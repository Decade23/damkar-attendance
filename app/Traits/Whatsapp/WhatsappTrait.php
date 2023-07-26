<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     WhatsappTrait.php
 * @LastModified 4/11/19 10:56 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Traits\Whatsapp;

use App\Models\WhatsappNumber;
use App\Models\WhatsappTemplate;
use App\Models\WhatsappMessage;
use App\Models\Auth\User;
use App\Models\UserNotMember;
use App\Models\Media;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

trait WhatsappTrait
{
    public function sendMessageWATemplate($number_id, $template_id, $user_id, $message, $param, $agent_id)
    {
        DB::beginTransaction();
        try{
            $sender   = WhatsappNumber::where('id',$number_id)->first();
            $template = WhatsappTemplate::where('id',$template_id)->first();

            foreach ($user_id as $user_id) {
                $user    = User::where('id',$user_id)->first();
                $phone[] = $user->phone;

                if($user->agent_id == null){
                    $user->agent_id = $agent_id;
                    $user->save();
                }

                $messageDB = new WhatsappMessage;
                $messageDB->number_id     = $number_id;
                $messageDB->user_id       = $user_id;
                $messageDB->sender        = $sender->number;
                $messageDB->recipient     = $user->phone;
                $messageDB->type          = 'text';
                $messageDB->message       = $message;
                $messageDB->model         = 'Member';
                $messageDB->status        = 'Template';
                $messageDB->save();
            }

            if($param == null){
                $field = [
                    'token'   => $sender->token,
                    'to'      => $phone
                ];
            }
            else{
                $field = [
                    'token'   => $sender->token,
                    'to'      => $phone,
                    'param'   => $param
                ];
            }

            $link = 'https://waba.damcorp.id/whatsapp/sendHsm/'.$template->title;

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendMessageWA($number_id, $message, $user_id, $agent_id)
    {
        DB::beginTransaction();
        try{
            $sender   = WhatsappNumber::where('id',$number_id)->first();

            foreach ($user_id as $user_id) {
                $user    = User::where('id',$user_id)->first();
                $phone[] = $user->phone;

                if($user->agent_id == null){
                    $user->agent_id = $agent_id;
                    $user->save();
                }

                $messageDB = new WhatsappMessage;
                $messageDB->number_id     = $number_id;
                $messageDB->user_id       = $user_id;
                $messageDB->sender        = $sender->number;
                $messageDB->recipient     = $user->phone;
                $messageDB->type          = 'text';
                $messageDB->message       = $message;
                $messageDB->model         = 'Member';
                $messageDB->status        = 'Replied';
                $messageDB->save();
            }

            $field = [
                'token'   => $sender->token,
                'to'      => $phone,
                'message' => $message
            ];

            $link = 'https://waba.damcorp.id/whatsapp/sendText';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendImageWA($number_id, $user_id, $image, $caption, $agent_id)
    {
        DB::beginTransaction();
        try{
            $sender   = WhatsappNumber::where('id',$number_id)->first();
            $user     = User::where('id',$user_id)->first();

            if($user->agent_id == null){
                $user->agent_id = $agent_id;
                $user->save();
            }

            $messageDB = new WhatsappMessage;
            $messageDB->number_id     = $number_id;
            $messageDB->user_id       = $user_id;
            $messageDB->sender        = $sender->number;
            $messageDB->recipient     = $user->phone;
            $messageDB->type          = 'image';
            $messageDB->message       = $caption;
            $messageDB->model         = 'Member';
            $messageDB->status        = 'Replied';
            $messageDB->save();

            $field = [
                'token'   => $sender->token,
                'to'      => $user->phone,
                'image'   => $image,
                'caption' => $caption
            ];

            $link = 'https://waba.damcorp.id/whatsapp/sendImage';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendDocumentWA($number_id, $user_id, $document, $caption, $agent_id)
    {
        DB::beginTransaction();
        try{
            $sender   = WhatsappNumber::where('id',$number_id)->first();
            $user     = User::where('id',$user_id)->first();

            if($user->agent_id == null){
                $user->agent_id = $agent_id;
                $user->save();
            }

            $messageDB = new WhatsappMessage;
            $messageDB->number_id     = $number_id;
            $messageDB->user_id       = $user_id;
            $messageDB->sender        = $sender->number;
            $messageDB->recipient     = $user->phone;
            $messageDB->type          = 'document';
            $messageDB->message       = $caption;
            $messageDB->model         = 'Member';
            $messageDB->status        = 'Replied';
            $messageDB->save();

            $field = [
                'token'     => $sender->token,
                'to'        => $user->phone,
                'document'  => $document,
                'caption'   => $caption
            ];

            $link = 'https://waba.damcorp.id/whatsapp/sendDocument';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendMessageWATemplateGuest($number_id, $template_id, $user_id, $message, $param, $agent_id)
    {
        DB::beginTransaction();
        try{
            $sender   = WhatsappNumber::where('id',$number_id)->first();
            $template = WhatsappTemplate::where('id',$template_id)->first();

            foreach ($user_id as $user_id) {
                $user    = UserNotMember::where('id',$user_id)->first();
                $phone[] = $user->phone;

                if($user->agent_id == null){
                    $user->agent_id = $agent_id;
                    $user->save();
                }

                $messageDB = new WhatsappMessage;
                $messageDB->number_id     = $number_id;
                $messageDB->user_id       = $user_id;
                $messageDB->sender        = $sender->number;
                $messageDB->recipient     = $user->phone;
                $messageDB->type          = 'text';
                $messageDB->message       = $message;
                $messageDB->model         = 'Not Member';
                // $messageDB->status        = 'Replied';
                $messageDB->save();
            }

            if($param == null){
                $field = [
                    'token'   => $sender->token,
                    'to'      => $phone
                ];
            }
            else{
                $field = [
                    'token'   => $sender->token,
                    'to'      => $phone,
                    'param'   => $param
                ];
            }

            $link = 'https://waba.damcorp.id/whatsapp/sendHsm/'.$template->title;

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendMessageWAGuest($number_id, $message, $user_id, $agent_id)
    {
        DB::beginTransaction();
        try{
            $sender   = WhatsappNumber::where('id',$number_id)->first();

            foreach ($user_id as $user_id) {
                $user    = UserNotMember::where('id',$user_id)->first();
                $phone[] = $user->phone;

                if($user->agent_id == null){
                    $user->agent_id = $agent_id;
                    $user->save();
                }

                $messageDB = new WhatsappMessage;
                $messageDB->number_id     = $number_id;
                $messageDB->user_id       = $user_id;
                $messageDB->sender        = $sender->number;
                $messageDB->recipient     = $user->phone;
                $messageDB->type          = 'text';
                $messageDB->message       = $message;
                $messageDB->model         = 'Not Member';
                $messageDB->status        = 'Replied';
                $messageDB->save();
            }

            $field = [
                'token'   => $sender->token,
                'to'      => $phone,
                'message' => $message
            ];

            $link = 'https://waba.damcorp.id/whatsapp/sendText';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendImageWAGuest($number_id, $user_id, $image, $caption, $agent_id)
    {
        DB::beginTransaction();
        try{
            $sender   = WhatsappNumber::where('id',$number_id)->first();
            $user     = UserNotMember::where('id',$user_id)->first();

            if($user->agent_id == null){
                $user->agent_id = $agent_id;
                $user->save();
            }

            $messageDB = new WhatsappMessage;
            $messageDB->number_id     = $number_id;
            $messageDB->user_id       = $user_id;
            $messageDB->sender        = $sender->number;
            $messageDB->recipient     = $user->phone;
            $messageDB->type          = 'image';
            $messageDB->message       = $caption;
            $messageDB->model         = 'Not Member';
            $messageDB->status        = 'Replied';
            $messageDB->save();

            $field = [
                'token'   => $sender->token,
                'to'      => $user->phone,
                'image'   => $image,
                'caption' => $caption
            ];

            $link = 'https://waba.damcorp.id/whatsapp/sendImage';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendDocumentWAGuest($number_id, $user_id, $document, $caption, $agent_id)
    {
        DB::beginTransaction();
        try{
            $sender   = WhatsappNumber::where('id',$number_id)->first();
            $user     = UserNotMember::where('id',$user_id)->first();

            if($user->agent_id == null){
                $user->agent_id = $agent_id;
                $user->save();
            }

            $messageDB = new WhatsappMessage;
            $messageDB->number_id     = $number_id;
            $messageDB->user_id       = $user_id;
            $messageDB->sender        = $sender->number;
            $messageDB->recipient     = $user->phone;
            $messageDB->type          = 'document';
            $messageDB->message       = $caption;
            $messageDB->model         = 'Not Member';
            $messageDB->status        = 'Replied';
            $messageDB->save();

            $field = [
                'token'     => $sender->token,
                'to'        => $user->phone,
                'document'  => $document,
                'caption'   => $caption
            ];

            $link = 'https://waba.damcorp.id/whatsapp/sendDocument';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function downloadMedia($token, $id)
    {
        DB::beginTransaction();
        try{
            $link = 'https://waba.damcorp.id/whatsapp/downloadMedia?token='.$token.'&id='.$id;

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'GET',
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
                return $err.' \n'.$link;
            }
            else{
                DB::commit();
                return $response;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            return $exception;
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendMessageWAAutoReply($number_id, $message, $user_id)
    {
        DB::beginTransaction();
        try{
            $sender   = WhatsappNumber::where('id',$number_id)->first();

            foreach ($user_id as $user_id) {
                $user    = User::where('id',$user_id)->first();
                $phone[] = $user->phone;

                $messageDB = new WhatsappMessage;
                $messageDB->number_id     = $number_id;
                $messageDB->user_id       = $user_id;
                $messageDB->sender        = $sender->number;
                $messageDB->recipient     = $user->phone;
                $messageDB->type          = 'text';
                $messageDB->message       = $message;
                $messageDB->model         = 'Member';
                $messageDB->status        = 'Auto Reply';
                $messageDB->save();
            }

            $field = [
                'token'   => $sender->token,
                'to'      => $phone,
                'message' => $message
            ];

            $link = 'https://waba.damcorp.id/whatsapp/sendText';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendMessageWAAutoReplyGuest($number_id, $message, $user_id)
    {
        DB::beginTransaction();
        try{
            $sender   = WhatsappNumber::where('id',$number_id)->first();

            foreach ($user_id as $user_id) {
                $user    = UserNotMember::where('id',$user_id)->first();
                $phone[] = $user->phone;

                $messageDB = new WhatsappMessage;
                $messageDB->number_id     = $number_id;
                $messageDB->user_id       = $user_id;
                $messageDB->sender        = $sender->number;
                $messageDB->recipient     = $user->phone;
                $messageDB->type          = 'text';
                $messageDB->message       = $message;
                $messageDB->model         = 'Not Member';
                $messageDB->status        = 'Auto Reply';
                $messageDB->save();
            }

            $field = [
                'token'   => $sender->token,
                'to'      => $phone,
                'message' => $message
            ];

            $link = 'https://waba.damcorp.id/whatsapp/sendText';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendImageWAAutoReply($number_id, $user_id, $media_id, $caption)
    {
        DB::beginTransaction();
        try{
            $sender  = WhatsappNumber::where('id',$number_id)->first();
            $media   = Media::where('id',$media_id)->first();

            foreach ($user_id as $user_id) {
                $user    = User::where('id',$user_id)->first();
                
                $messageDB = new WhatsappMessage;
                $messageDB->number_id     = $number_id;
                $messageDB->user_id       = $user_id;
                $messageDB->sender        = $sender->number;
                $messageDB->recipient     = $user->phone;
                $messageDB->type          = 'image';
                $messageDB->message       = '';
                $messageDB->model         = 'Member';
                $messageDB->status        = 'Auto Reply';
                $messageDB->save();

                $imagesDb = new Media;
                $imagesDb->type      = 'image';
                $imagesDb->model     = 'MessageWA'; 
                $imagesDb->item_id   = $messageDB->id;
                $imagesDb->url       = $media->url;
                $imagesDb->path      = $media->path;
                $imagesDb->save();
            }

            $field = [
                'token'   => $sender->token,
                'to'      => $user->phone,
                'image'   => $media->url,
                'caption' => ''
            ];

            $link = 'https://waba.damcorp.id/whatsapp/sendImage';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
                Log::info($err);
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            Log::info($exception);
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendImageWAAutoReplyGuest($number_id, $user_id, $media_id, $caption)
    {
        DB::beginTransaction();
        try{

            $sender  = WhatsappNumber::where('id',$number_id)->first();
            $media   = Media::where('id',$media_id)->first();

            foreach ($user_id as $user_id) {
                $user    = UserNotMember::where('id',$user_id)->first();

                $messageDB = new WhatsappMessage;
                $messageDB->number_id     = $number_id;
                $messageDB->user_id       = $user_id;
                $messageDB->sender        = $sender->number;
                $messageDB->recipient     = $user->phone;
                $messageDB->type          = 'image';
                $messageDB->message       = '';
                $messageDB->model         = 'Member';
                $messageDB->status        = 'Auto Reply';
                $messageDB->save();

                $imagesDb = new Media;
                $imagesDb->type      = 'image';
                $imagesDb->model     = 'MessageWA'; 
                $imagesDb->item_id   = $messageDB->id;
                $imagesDb->url       = $media->url;
                $imagesDb->path      = $media->path;
                $imagesDb->save();
            }

            $field = [
                'token'   => $sender->token,
                'to'      => $user->phone,
                'image'   => $media->url,
                'caption' => ''
            ];

            $link = 'https://waba.damcorp.id/whatsapp/sendImage';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
                Log::info($err);
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            Log::info($exception);
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendMessageWAFollowupUnpaid($number_id, $message, $user_id)
    {
        DB::beginTransaction();
        try{
            $sender   = WhatsappNumber::where('id',$number_id)->first();

            $user    = User::where('id',$user_id)->first();
            $phone   = $user->phone;

            $messageDB = new WhatsappMessage;
            $messageDB->number_id     = $number_id;
            $messageDB->user_id       = $user_id;
            $messageDB->sender        = $sender->number;
            $messageDB->recipient     = $user->phone;
            $messageDB->type          = 'text';
            $messageDB->message       = $message;
            $messageDB->model         = 'Member';
            $messageDB->status        = 'Followup';
            $messageDB->save();

            $field = [
                'token'   => $sender->token,
                'to'      => $phone,
                'message' => $message
            ];

            $link = 'https://waba.damcorp.id/whatsapp/sendText';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendMessageWATemplatePaidProduct($number_id, $user_id, $message, $param)
    {
        DB::beginTransaction();
        try{
            $sender   = WhatsappNumber::where('id',$number_id)->first();

            foreach ($user_id as $user_id) {
                $user    = User::where('id',$user_id)->first();
                $phone[] = $user->phone;

                $messageDB = new WhatsappMessage;
                $messageDB->number_id     = $number_id;
                $messageDB->user_id       = $user_id;
                $messageDB->sender        = $sender->number;
                $messageDB->recipient     = $user->phone;
                $messageDB->type          = 'text';
                $messageDB->message       = $message;
                $messageDB->model         = 'Member';
                $messageDB->status        = 'Template';
                $messageDB->save();
            }

            if($param == null){
                $field = [
                    'token'   => $sender->token,
                    'to'      => $phone
                ];
            }
            else{
                $field = [
                    'token'   => $sender->token,
                    'to'      => $phone,
                    'param'   => $param
                ];
            }

            $link = 'https://waba.damcorp.id/whatsapp/sendHsm/paid_product';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL             => $link,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_ENCODING        => '',
                CURLOPT_MAXREDIRS       => 10,
                CURLOPT_TIMEOUT         => 60,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_POSTFIELDS      => json_encode($field),
                CURLOPT_HTTPHEADER      => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                DB::rollBack();
                echo 'cURL Error #:' . $err;
            }
            else{
                DB::commit();
                return $messageDB;
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }
}
