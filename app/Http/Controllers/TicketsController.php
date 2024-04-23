<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Referral;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tickets.index', ['tickets'=>Ticket::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'phone' => 'required|integer',
        ],[
            dd("faux"),
        ]);

        

        $ticket= new Ticket();
        if ($request->filled('referral_link')) {
            dd("lala");
            $referral = Referral::where('link', $request->referral_link)->first();
        
            if ($referral) {
                // Vérifie si l'utilisateur a déjà été parrainé
                if (auth()->user()->referred_by) {
                    return back()->withErrors(['referral_link' => 'Vous avez déjà utilisé un lien de parrainage.']);
                }
        
                auth()->user()->referred_by = $referral->user_id;
                auth()->user()->save();
        
                // Appliquer la promotion
                $ticket->promo = 15;
                dd("lala");
            }
        }
        $ticket->first_name = $request->first_name;
        $ticket->last_name = $request->last_name;
        $ticket->email = $request->email;
        $ticket->type = $request->type;
        $ticket->date_start = $request->date_start;
        $ticket->date_end = $request->date_end;    
        $ticket->price = $ticket->price * (1 - $ticket->promo / 100);
        $ticket->phone = $request->phone;
        $ticket->save();
        // return 'Ticket created successfully!';
        return redirect()->route('$tickets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $tickets)
    {
        return view('tickets.show', [
            'ticket' => $tickets,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $tickets)
    {
        // return view('tickets.edit', [
        //     'ticket' => $tickets,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        // $ticket->save($request->all());

        // return redirect()->route('tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        // $ticket->delete();
        // return redirect()->route('tickets.index');
    }
}
