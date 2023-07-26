<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     FirebaseTrait.php
 * @LastModified 4/11/19 10:56 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Traits\Firebase;

use DB;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Messaging\CloudMessage;
use App\Models\QaFirebase;
use App\Models\Fulfillment\PostFirebase;

trait FirebaseTrait
{
    public function sendFirebase($path, $message, $type)
    {
        if(config("firebase.firebase_status") == 'production'){
            $firebase_file = config("firebase.firebase_file");
            $firebase_link = config("firebase.firebase_link");
        }
        else{
            $firebase_file = config("firebase.firebase_file_dev");
            $firebase_link = config("firebase.firebase_link_dev");
        }

        DB::beginTransaction();
        try{
            $filejson = dirname(__DIR__,3);
            $serviceAccount = ServiceAccount::fromJsonFile($filejson.'/'.$firebase_file);
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->withDatabaseUri($firebase_link)
                ->create();

            $database = $firebase->getDatabase();
            $newPost = $database->getReference($path)->push([
                'created_at'    => date('Y/m/d H:i:s'),
                'created_by'    => 'Ellen May Institute',
                'current_user'  => false,
                'message'       => $message,
                'type'          => $type
            ]);

            $newPost->getKey();
            $newPost->getUri();
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendFirebaseRecomendation($path, $message, $type, $post_id)
    {
        if(config("firebase.firebase_status") == 'production'){
            $firebase_file = config("firebase.firebase_file");
            $firebase_link = config("firebase.firebase_link");
        }
        else{
            $firebase_file = config("firebase.firebase_file_dev");
            $firebase_link = config("firebase.firebase_link_dev");
        }

        DB::beginTransaction();
        try{
            $filejson = dirname(__DIR__,3);
            $serviceAccount = ServiceAccount::fromJsonFile($filejson.'/'.$firebase_file);
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->withDatabaseUri($firebase_link)
                ->create();

            $database = $firebase->getDatabase();
            $newPost = $database->getReference($path)->push([
                'created_at'    => date('Y/m/d H:i:s'),
                'created_by'    => 'Ellen May Institute',
                'current_user'  => false,
                'message'       => $message,
                'post_id'       => $post_id,
                'type'          => $type
            ]);

            $newPost->getKey();
            $newPost->getUri();

            $post_firebase = new PostFirebase;
            $post_firebase->post_id     = $post_id;
            $post_firebase->id_firebase = $newPost->getKey();
            $post_firebase->type        = $type;
            $post_firebase->save();
            
            DB::commit();
            return $post_firebase;
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendFirebaseRecomendationEdit($path, $message, $type, $post_id)
    {
        if(config("firebase.firebase_status") == 'production'){
            $firebase_file = config("firebase.firebase_file");
            $firebase_link = config("firebase.firebase_link");
        }
        else{
            $firebase_file = config("firebase.firebase_file_dev");
            $firebase_link = config("firebase.firebase_link_dev");
        }

        try{
            $filejson = dirname(__DIR__,3);
            $serviceAccount = ServiceAccount::fromJsonFile($filejson.'/'.$firebase_file);
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->withDatabaseUri($firebase_link)
                ->create();
            
            $database = $firebase->getDatabase();
            $dataFirebase = $database->getReference($path)->getValue();
            $post_data = [
                'created_at'    => $dataFirebase['created_at'],
                'created_by'    => $dataFirebase['created_by'],
                'current_user'  => $dataFirebase['current_user'],
                'message'       => $message,
                'post_id'       => $post_id,
                'type'          => $type
            ];
            $updates  = [
                $path => $post_data
            ];
            $editPost = $database->getReference()->update($updates);
        }
        catch(\Exception $exception){
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendFirebaseRecomendationImageDelete($path, $post_id)
    {
        if(config("firebase.firebase_status") == 'production'){
            $firebase_file = config("firebase.firebase_file");
            $firebase_link = config("firebase.firebase_link");
        }
        else{
            $firebase_file = config("firebase.firebase_file_dev");
            $firebase_link = config("firebase.firebase_link_dev");
        }

        DB::beginTransaction();
        try{
            $filejson = dirname(__DIR__,3);
            $serviceAccount = ServiceAccount::fromJsonFile($filejson.'/'.$firebase_file);
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->withDatabaseUri($firebase_link)
                ->create();
            
            $database = $firebase->getDatabase();
            $post_image_firebase = PostFirebase::where('post_id',$post_id)->where('type','image')->get();
            if($post_image_firebase->isEmpty() == false){
                foreach ($post_image_firebase as $post_image) {
                    $path_post = $path.$post_image->id_firebase;
                    $dataFirebase = $database->getReference($path_post)->remove();
                }
                $delete = PostFirebase::where('post_id',$post_id)->where('type','image')->delete();
            }
            DB::commit();
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendFirebaseRecomendationDeletePost($path, $post_id)
    {
        if(config("firebase.firebase_status") == 'production'){
            $firebase_file = config("firebase.firebase_file");
            $firebase_link = config("firebase.firebase_link");
        }
        else{
            $firebase_file = config("firebase.firebase_file_dev");
            $firebase_link = config("firebase.firebase_link_dev");
        }

        DB::beginTransaction();
        try{
            $filejson = dirname(__DIR__,3);
            $serviceAccount = ServiceAccount::fromJsonFile($filejson.'/'.$firebase_file);
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->withDatabaseUri($firebase_link)
                ->create();
            
            $database = $firebase->getDatabase();
            $post_image_firebase = PostFirebase::where('post_id',$post_id)->get();
            if($post_image_firebase->isEmpty() == false){
                foreach ($post_image_firebase as $post_image) {
                    $path_post = $path.$post_image->id_firebase;
                    $dataFirebase = $database->getReference($path_post)->remove();
                }
                $delete = PostFirebase::where('post_id',$post_id)->delete();
            }
            DB::commit();
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function send_notification($message, $topic, $type){
        if(config("firebase.firebase_status") == 'production'){
            $firebase_file = config("firebase.firebase_file");
            $firebase_link = config("firebase.firebase_link");
        }
        else{
            $firebase_file = config("firebase.firebase_file_dev");
            $firebase_link = config("firebase.firebase_link_dev");
        }
        
        DB::beginTransaction();
        try {
            $filejson = dirname(__DIR__,3);
            $serviceAccount = ServiceAccount::fromJsonFile($filejson.'/'.$firebase_file);
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->withDatabaseUri($firebase_link)
                ->create();
                
            $messaging = $firebase->getMessaging();
            $notification = [
                'title' => 'Ellen May Institute',
                'body'  => $message,
            ];
            $data = [
                'type' => $type
            ];
            $message = CloudMessage::fromArray([
                'topic'        => $topic,
                'notification' => $notification,
                'data'         => $data,
            ]);
            $messaging->send($message);
        }
        catch (Exception $e) {
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
        }
    }

    public function sendFirebaseQa($path, $message, $type, $qa_id, $qa_child_id, $created_by, $sender_type)
    {
        if(config("firebase.firebase_status") == 'production'){
            $firebase_file = config("firebase.firebase_file");
            $firebase_link = config("firebase.firebase_link");
        }
        else{
            $firebase_file = config("firebase.firebase_file_dev");
            $firebase_link = config("firebase.firebase_link_dev");
        }

        DB::beginTransaction();
        try{
            if($sender_type == 'user'){
                $current_user = true;
            }
            else{
                $current_user = false;
            }

            $filejson = dirname(__DIR__,3);
            $serviceAccount = ServiceAccount::fromJsonFile($filejson.'/'.$firebase_file);
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->withDatabaseUri($firebase_link)
                ->create();

            $database = $firebase->getDatabase();
            $newPost = $database->getReference($path)->push([
                'created_at'    => date('Y/m/d H:i:s'),
                'created_by'    => $created_by,
                'current_user'  => $current_user,
                'message'       => $message,
                'qa_id'         => (int)$qa_id,
                'qa_child_id'   => (int)$qa_child_id,
                'type'          => $type
            ]);

            $newPost->getKey();
            $newPost->getUri();

            $qa_firebase = new QaFirebase;
            $qa_firebase->qa_id       = $qa_id;
            $qa_firebase->qa_child_id = $qa_child_id;
            $qa_firebase->id_firebase = $newPost->getKey();
            $qa_firebase->type        = $type;
            $qa_firebase->save();
            
            DB::commit();
            return $qa_firebase;
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }

    public function sendFirebaseQaImage($path, $message, $type, $qa_id, $qa_child_id, $created_by, $sender_type)
    {
        if(config("firebase.firebase_status") == 'production'){
            $firebase_file = config("firebase.firebase_file");
            $firebase_link = config("firebase.firebase_link");
        }
        else{
            $firebase_file = config("firebase.firebase_file_dev");
            $firebase_link = config("firebase.firebase_link_dev");
        }

        DB::beginTransaction();
        try{
            if($sender_type == 'user'){
                $current_user = true;
            }
            else{
                $current_user = false;
            }

            $filejson = dirname(__DIR__,3);
            $serviceAccount = ServiceAccount::fromJsonFile($filejson.'/'.$firebase_file);
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->withDatabaseUri($firebase_link)
                ->create();

            $database = $firebase->getDatabase();
            $newPost = $database->getReference($path)->push([
                'created_at'    => date('Y/m/d H:i:s'),
                'created_by'    => $created_by,
                'current_user'  => $current_user,
                'message'       => $message,
                'qa_id'         => (int)$qa_id,
                'qa_child_id'   => (int)$qa_child_id,
                'type'          => $type,
                'sender_type'   => $sender_type
            ]);

            $newPost->getKey();
            $newPost->getUri();

            $qa_firebase = new QaFirebase;
            $qa_firebase->qa_id       = $qa_id;
            $qa_firebase->qa_child_id = $qa_child_id;
            $qa_firebase->id_firebase = $newPost->getKey();
            $qa_firebase->type        = $type;
            $qa_firebase->save();
            
            DB::commit();
            return $qa_firebase;
        }
        catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
        }
    }
}
