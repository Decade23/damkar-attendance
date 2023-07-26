<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use DB;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Messaging\CloudMessage;
use App\Models\Fulfillment\PostFirebase;

class SendFirebaseDatabaseEdit implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $link;
    protected $user_products;
    protected $message;
    protected $type;
    protected $post_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($link, $message, $type, $post_id)
    {
        $this->link          = $link;
        $this->message       = $message;
        $this->type          = $type;
        $this->post_id       = $post_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      try {
        $link          = $this->link;
        $message       = $this->message;
        $type          = $this->type;
        $post_id       = $this->post_id;

        $path = $link;
        $filejson = dirname(__DIR__,2);
        $serviceAccount = ServiceAccount::fromJsonFile($filejson.'/ellen-may-institute-firebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://ellen-may-institute.firebaseio.com/')
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

        $post_firebase = new PostFirebase;
        $post_firebase->post_id     = $post_id;
        $post_firebase->id_firebase = $newPost->getKey();
        $post_firebase->type        = $type;
        $post_firebase->save();
        
      } catch (Exception $e) {
        dd($e);
      }
    }
}
