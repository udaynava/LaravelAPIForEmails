<?php

namespace App\Http\Controllers;

use App\Jobs\MailJob;
use Illuminate\Http\Request;
use Log;

class EmailController extends Controller
{
    public function sendEmail(Request $request) {

        if ($request->isMethod('post')) {

            $emailData = $request->input('emails');

            foreach($emailData as $email) {
                dispatch(new MailJob($email));
            }
        }
        return ["Success req"];
    }
}
