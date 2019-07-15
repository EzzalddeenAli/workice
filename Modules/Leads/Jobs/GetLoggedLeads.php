<?php

namespace Modules\Leads\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Modules\Leads\Entities\Lead;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class GetLoggedLeads implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public function __construct() {

//        $this->parcel = $parcel;
        //

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $client = new Client();
        $loggedUsers = [];
        try {

            $headers = ['Content-Type' => 'application/json'];
            $res = $client->request('GET', 'https://thebrokersacademy.com/getLoggedUsers.php?authTokenCRM=ahrnJBuscD0Gi23l8iPO');
            $loggedUsers = json_decode($res->getBody(), 1);

        } catch (ClientException $exception) {
            logger($exception);

        }



        $loggedEmails = [];
        foreach ($loggedUsers as $loggedUser) {
            $loggedEmails[] = $loggedUser['user_email'];
        }


        $leads = Lead::whereIn('email',$loggedEmails)->update(['is_logged' => true]);

    }

    /**
     * The job failed to process.
     *
     * @param  Exception $exception
     * @return void
     */
    public function failed(Error $error = null) {

    }
}