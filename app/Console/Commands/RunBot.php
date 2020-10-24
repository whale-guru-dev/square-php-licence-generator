<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\BotInfoForUsers;
use App\User;

class RunBot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:bot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Zillow Bot';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $botInfo = BotInfoForUsers::where('run', false)->get();

        foreach($botInfo as $each) {
            $user = User::find($each->user_id);

            if($user['cookies']) {
                $endpoint = "http://142.93.243.241:5350/runpublicbot";

                $botRequest = [
                    "user" => $user['email'],
                    "bot" => "Zillo Bot Merged~D75HsPTUIeOmN0bLp5ulrwB7F1f2",
                    "outputdata" => [
                        "Cookies" => json_decode(json_encode(json_decode($user['cookies'], true))),
                        "No Of Messages" => $each['num_msg'],
                        "Message" => $each['msg'],
                        "Blacklist Words " => $each['blacklist_words'],
                        "2captcha Api Key" => "94ed2c2b11jsksj4455"
                    ]
                ];

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_PORT => "5350",
                    CURLOPT_URL => $endpoint,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 500,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode($botRequest),
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "content-type: application/json",
                        "postman-token: f34b91c9-e024-1b15-1115-33c80e37cabf"
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {

                } else {
                    $each->update([
                       'run' => true
                    ]);
                }
            }
        }
    }
}
