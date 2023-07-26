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

class SendFirebaseNotif implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $topic;
    protected $message;
    protected $type;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message, $topic, $type)
    {
        $this->topic         = $topic;
        $this->message       = $message;
        $this->type          = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      try {
        $topic         = $this->topic;
        $message       = $this->message;
        $type          = $this->type;

        $filejson = dirname(__DIR__,2);
        $serviceAccount = ServiceAccount::fromJsonFile($filejson.'/ellen-may-institute-firebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://ellen-may-institute.firebaseio.com/')
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
        
      } catch (Exception $e) {
        dd($e);
      }
    }
}
