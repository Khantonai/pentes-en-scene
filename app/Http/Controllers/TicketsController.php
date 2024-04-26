<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Referral;
use Endroid\QrCode\QrCode;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\Writer\PngWriter;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Validator;


class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

     public function index()
     {
        // dd(Ticket::where('user   _id', auth()->id())->get());
            $tickets = Ticket::where('user_id', auth()->id())->get();
    
         if (!$tickets) {
             // Gérer le cas où l'utilisateur n'a pas de tickets
             return view('dashboard', ['tickets' => $tickets]);
         }
         if (Auth::check()){
            return view('dashboard', ['tickets' => $tickets]);
         }else{
            return view('tickets.index', ['tickets' => $tickets]);}
     }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    
public function store(Request $request)
{
   
    foreach ($request->first_name as $index => $first_name) {
        $validator = Validator::make($request->all(), [
            "first_name.$index" => 'required',
            "last_name.$index" => 'required',
            "email.$index" => 'required|email',
            "date_start.$index" => 'required|date',
            "date_end.$index" => 'required|date',
            "phone.$index" => 'required',
        ],[
            "first_name.$index.required" => 'Le prénom est obligatoire',
            "last_name.$index.required" => 'Le nom est obligatoire',
            "email.$index.required" => 'L\'email est obligatoire',
            "email.$index.email" => 'L\'email doit être une adresse email valide',
            "date_start.$index.required" => 'La date de début est obligatoire',
            "date_start.$index.date" => 'La date de début doit être une date',
            "date_end.$index.required" => 'La date de fin est obligatoire',
            "date_end.$index.date" => 'La date de fin doit être une date',
            "phone.$index.required" => 'Le téléphone est obligatoire',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    }
    foreach ($request->first_name as $index => $first_name) {

        $ticket= new Ticket();
        $ticket->token = uniqid();
        
        $url = route('tickets.scan', ['token' => $ticket->token]);

        $qrCode = new QrCode($url);

        $writer = new PngWriter();

        $qrCodeString = $writer->write($qrCode)->getString();
        $directory = '/Users/lisapeyron/Documents/source/pentes-en-scene/storage/app/public/qrcodes/';

        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $fileName = 'qrcodes/' . $ticket->token . '.png';
        $path = storage_path('app/public/' . $fileName);
        file_put_contents($path, $qrCodeString);
        $ticket->qr_code = $fileName;

        if ($request->type[$index] == 'Premium') {
            $startDate = \Carbon\Carbon::parse($request->date_start[$index]);
            $endDate = \Carbon\Carbon::parse($request->date_end[$index]);

            $days = $startDate->diffInDays($endDate);

            if ($days <= 3) {
                $ticket->price = 20;
            } elseif ($days <= 7) {
                $ticket->price = 50;
            } else {
                $ticket->price = 100;
            }
        } else {
            $ticket->price = 0; // Gratuit
        }
            $ticket->promo = 0;


        if ($request->filled('referral_link')) {
            $referral = Referral::where('link', $request->referral_link[$index])->first();
        
            if ($referral) {
                if (auth()->user()->referred_by) {
                    return back()->withErrors(['referral_link' => 'Vous avez déjà utilisé un lien de parrainage.']);
                }
        
                auth()->user()->referred_by = $referral->user_id;
                auth()->user()->save();
        
                $ticket->promo = 15;
            }
        }
        $ticket->first_name = $request->first_name[$index];
        $ticket->last_name = $request->last_name[$index];
        $ticket->email = $request->email[$index];
        if(Auth::check()){
            $ticket->user_id = auth()->id();
        }else{
            $ticket->user_id = null;
        }
        $ticket->type = $request->type[$index];
        $ticket->date_start = $request->date_start[$index];
        $ticket->date_end = $request->date_end[$index];
        $ticket->price = $ticket->price * (1 - $ticket->promo / 100);
        $ticket->phone = $request->phone[$index];
        $ticket->save();
    }
    return redirect()->route('tickets.show', ['ticket' => $ticket->id]);
}


    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', [
            'ticket' => $ticket,
        ]);
    }

    public function showPDF($token)
    {
        // dd($token);
        $ticket = Ticket::where('token', $token)->first();
        

        if (!$ticket) {
            // Gérer le cas où aucun ticket ne correspond au token
            abort(404);
        }

        $pdf = PDF::loadView('tickets.pdf', ['ticket' => $ticket]);

        return $pdf->stream('ticket.pdf');
    }

    public function scanQrCode($token){
        $ticket = Ticket::where('token', $token)->first();

    if (!$ticket) {
        // Gérer le cas où aucun ticket ne correspond au token
        abort(404);
    }

    return view('tickets.scan', ['ticket' => $ticket]);
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
