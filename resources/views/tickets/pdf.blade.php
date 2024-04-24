<!-- resources/views/tickets/pdf.blade.php -->
<html>
<body>
    <h1>Ticket pour {{ $ticket->first_name }} {{ $ticket->last_name }}</h1>
    <img src="{{ public_path('storage/' . $ticket->qr_code) }}" alt="QR Code">
    <!-- Affichez les autres données du ticket comme vous le souhaitez -->
</body>
</html>