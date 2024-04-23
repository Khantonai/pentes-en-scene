
<form action="{{ route('tickets.store') }}" method="POST">
    @csrf
    <label for="first_name">Prénom:</label><br>
    <input type="text" id="first_name" name="first_name"><br>
    <label for="last_name">Nom:</label><br>
    <input type="text" id="last_name" name="last_name"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>
    <label for="type">type</label>
        <select id="type" name="type">
            <option value="Gratuit"> Gratuit</option>
            <option value="Premium"> Premium</option>
        </select>
    <label for="date_start">Date de début:</label><br>
    <input type="date" id="date_start" name="date_start" min="2025-01-01" max="2025-12-31"><br>
    <label for="date_end">Date de fin:</label><br>
    <input type="date" id="date_end" name="date_end"min="2025-01-01" max="2025-12-31"><br>
    <label for="phone">Téléphone:</label><br>
    <input type="tel" id="phone" name="phone"><br>
    <input type="submit" value="Acheter">
</form>