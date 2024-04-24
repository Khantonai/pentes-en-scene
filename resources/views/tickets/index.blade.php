
@foreach ($tickets as $ticket)
        <div>
            <!-- An unexamined life is not worth living. - Socrates -->
        </div>
        <p>Nom : {{ $ticket->first_name }}</p>
        <p>Prénom : {{ $ticket->last_name }}</p>
        <img src="{{ asset('storage/' . $ticket->qr_code) }}" alt="QR Code">
 @endforeach