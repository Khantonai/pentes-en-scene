<!-- resources/views/tickets/pdf.blade.php -->
<html>
<body>

    <h1>Ticket pour {{ $ticket->first_name }} {{ $ticket->last_name }}</h1>
    @if($ticket->price > 0)
        <img src="{{ public_path('storage/img/ticket.png') }}" alt="ticket" style="width:100%">
        <img src="{{ public_path('storage/' . $ticket->qr_code) }}" alt="QR Code" style="position:absolute; right:70px; bottom:650px;width:90px">
        <p style="position:absolute; right:450px;  bottom:677px; ">   {{ $ticket->date_start }} </p>
        <p style="position:absolute; right:455px;  bottom:655px; ">   {{ $ticket->first_name }} </p>
        <p style="position:absolute; right:445px;  bottom:630px; ">   {{ $ticket->last_name }} </p>
    @else
        <img src="{{ public_path('storage/img/ticket_gratuit.png') }}" alt="ticket" style="width:100%">
        <img src="{{ public_path('storage/' . $ticket->qr_code) }}" alt="QR Code" style="position:absolute; right:70px; bottom:650px;width:90px">
        <p style="position:absolute; right:450px;  bottom:677px; ">   {{ $ticket->date_start }} </p>
        <p style="position:absolute; right:455px;  bottom:655px; ">   {{ $ticket->first_name }} </p>
        <p style="position:absolute; right:445px;  bottom:630px; ">   {{ $ticket->last_name }} </p>
    @endif
    <!-- Affichez les autres données du ticket comme vous le souhaitez -->
</body>
</html>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        
    }

    h1 {
        text-align: center;
        margin-top: 50px;
    }

    img {
        display: block;
        margin: 0 auto;
        margin-top: 50px;
    }
</style>