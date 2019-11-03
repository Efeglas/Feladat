<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Emails;


class AdminController extends Controller
{
    function login()
    {
        return view('login');
    }

    function logincheck(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|alpha_num',
            'password' => 'required|alpha_num'
        ]);

        if (Auth::attempt(['username' => $request->get('username'), 'password' => $request->get('password')])) {
            return redirect('/emails');
        } else {
            return back()->with('error', 'Felhasználónév vagy a jelszó hibás!');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    function sendMail()
    {   
        if (!isset(Auth::user()->username)) {
            return redirect('/');
        } 
        else
        {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://onlineszamla.nav.gov.hu/api/news/visible/list?lang=hu');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 500);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        $response = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($response, true);

        $emails = Emails::all();

        $emailCounter = 0;

        foreach ($emails as $news) {
            $data = ['content' => ''];

            for ($i = 0; $i < 10; $i++) {
                if (str_replace("T", " ", substr($json[$i]['visibleFrom'], 0, 19)) > $news->lastsent) {
                    $data['content'] .= '<h1>' . $json[$i]['title'] . '</h1></br>';
                    $data['content'] .= $json[$i]['body'] . '</br>';
                } else {
                    break;
                }
            }
            

            if ($data['content'] != '') {
               
                    Mail::send(['html' => 'emails.emailTemplate'], $data, function ($message) use ($news) {
                        $message->to($news->email);
                        $message->subject('Új hírek');
                        date_default_timezone_set('Europe/Budapest');
                        $news->lastsent = date('Y-m-d H:i:s');
                        $news->save();                 
                    });                
              
                $emailCounter++;
            }
        }
        if ($emailCounter > 0) {
            return redirect('/emails')->with('success', 'Hír(ek) sikeresen elküldve!');
        } else {
            return redirect('/emails')->with('success', 'Nincs kiküldendő hír!');
        }
    }
    }

}
