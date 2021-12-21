<?php

namespace App\Http\Controllers;

use App\Jobs\MailJob;
use Illuminate\Http\Request;
use Log;

class EmailController extends Controller
{
    public function sendEmail(Request $request) {

        if ($request->isMethod('post')) {
            // $userData = $request->input('emails');
            // Log::info("userdate value down");
            // Log::info($userData);
            // echo "<prev>"; print_r($userData); die;

            $emailData = $request->input('emails');
            // Log::info("Incoming input value down");
            // Log::info($emailData);
            // echo "<prev>"; print_r($comingData); die;

            foreach($emailData as $email) {
                // Log::info("Each email value down");
                // Log::info($email);
                // Mail::to($email['email'])->subject($email['subject']);
                dispatch(new MailJob($email));
            }
        }

        // return ["Success req"];
        
        // dispatch(new MailJob());

        // dd('Email has been delivered');
    }
}
