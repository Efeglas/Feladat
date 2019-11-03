<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emails;
use Auth;


class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Emails::all();

        return view('emails.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        if (Emails::where('email', '=', $request->get('email'))->exists()) {
            return redirect()->route('emails.create')->with('exist', 'Ez az e-mail cím már létezik!');
        }

        date_default_timezone_set('Europe/Budapest');

        $email = new Emails([
            'email' => $request->get('email'),
            'lastsent' => date('Y-m-d H:i:s')
        ]);

        $email->save();
        return redirect('/emails')->with('success', 'E-mail cím sikeresen hozzáadva!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emails = Emails::find($id);
        return view('emails.edit', compact('emails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $emails = Emails::find($id);
        $emails->email = $request->get('email');

        if (Emails::where('email', '=', $request->get('email'))->exists()) {
            return redirect()->route('emails.edit', $id)->with('exist', 'Ez az e-mail cím már létezik!');
        }


        $emails->save();

        return redirect('/emails')->with('success', 'E-mail cím sikeresen módosítva!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!isset(Auth::user()->username)) {
            return redirect('/');
        } 
        else
        {
            $email = Emails::find($id);
            $email->delete();
    
            return redirect('/emails')->with('success', 'E-mail cím törölve!');
        }

       
    }
}
