<?php

namespace App\Http\Controllers;

require base_path() . '/vendor/autoload.php';


use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;


class Auth extends Controller
{


    public function show(Request $request)
    {
        return view('auth')->with('requestData', $request);
    }


    public function validateNIC(Request $request)
    {

        try {
            $result = DB::table('users')
                ->get();
        } catch (QueryException $e) {
            return abort(500, $e->getMessage());
        }

        foreach ($result as $row) {
            if ($row->nic == trim($request->nic)) {
                $phone = "+" . $row->telephone;
                $code = $this->generateCode();
                $rtr = $this->sendSMS($phone, $code);
                $duration = env('ACCESS_DURATION');

                if ($rtr == "queued") {
                    $grant_url = $request->base_grant_url . "?continue_url=" . $request->user_continue_url . "?duration=". $duration;
                    return view('auth2')
                        ->with('phone',$phone)
                        ->with('nic',$row->nic)
                        ->with('previousRequestData', $request)
                        ->with('code', sha1($code))
                        ->with('grant_url', base64_encode($grant_url));
                } else {
                    return "SMS Sever Error!";
                }

            }
        }

        return "User Not Found!";
    }

    private function sendSMS($phone, $code)
    {
        $message = "Your verification code for Internet access: " . $code;
        $account_sid = env('SMS_ACC_ID');
        $auth_token = env('SMS_AUTH_TOKEN');

        try {
            $client = new Client($account_sid, $auth_token);

            $messages = $client->messages->create($phone, array(
                'From' => '+18316090202',
                'Body' => $message
            ));

            return $messages->status;


        } catch (TwilioException $twilioException) {
            return $twilioException->getMessage();
        }

    }


    private function generateCode()
    {
        return random_int(1000, 9999);
    }

    public function path()
    {
        return base_path();
    }


    public function validateCode(Request $request){
        $nic = $request->nic;
        $usercode = sha1(trim($request->usercode));
        $code = $request->code;
        $grant_url = base64_decode($request->grant_url);
        $node_mac = $request->node_mac;
        $client_mac = $request->client_mac;
        $client_ip = $request->client_ip;

        try{
            if($usercode == $code){
                DB::table('grants')
                    ->insert([
                        'nic'=>$nic,
                        'clientmac'=>$client_mac,
                        'nodemac'=>$node_mac,
                        'clientip'=>$client_ip,
                        'granturl'=>$grant_url,
                    ]);

                return view('authpass')->with('grant_url',$grant_url);
            }
            else{
                return redirect('/error');
            }
        }catch (QueryException $exception){

        }
    }

    public function showError(){
        return "Incorrect Code! try connecting again...";
    }

}
