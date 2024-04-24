<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Referral;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tickets = Ticket::all();

        return view('tickets.index', ['tickets' => $tickets]);
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
            'phone' => 'required',
        ],[
            'first_name.required' => 'Le prénom est obligatoire',
            'last_name.required' => 'Le nom est obligatoire',
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'L\'email doit être une adresse email valide',
            'date_start.required' => 'La date de début est obligatoire',
            'date_start.date' => 'La date de début doit être une date',
            'date_end.required' => 'La date de fin est obligatoire',
            'date_end.date' => 'La date de fin doit être une date',
            'phone.required' => 'Le téléphone est obligatoire',
        ]);

        $ticket= new Ticket();
        // $directory = storage_path('app/public/qrcodes');
        // if (!is_dir($directory)) {
        //     mkdir($directory, 0755, true);
        //     dd("lala");
        // }

        $ticket->token = uniqid();
        
        $url = route('tickets.scan', ['token' => $ticket->token]);

        // $qrCode = new QrCode($ticket->token);
        $qrCode = new QrCode($url);

        // Créez une nouvelle instance de PngWriter
        $writer = new PngWriter();

        // Générez le contenu du QR code en tant que chaîne de caractères
        $qrCodeString = $writer->write($qrCode)->getString();

        // Vous pouvez maintenant afficher l'image du QR code où vous en avez besoin
        // Par exemple, vous pouvez l'enregistrer dans un fichier
        $fileName = 'qrcodes/' . $ticket->token . '.png';
        $path = storage_path('app/public/' . $fileName);
        file_put_contents($path, $qrCodeString);
        $ticket->qr_code = $fileName;

        // // Ou vous pouvez l'envoyer directement dans la réponse HTTP
        // echo $qrCodeString;

    
        if ($request->filled('referral_link')) {
            // dd("lala");
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
                // dd("lala");
            }
        }else{
            $ticket->promo = 0;
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
        return redirect()->route('tickets.index');
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
