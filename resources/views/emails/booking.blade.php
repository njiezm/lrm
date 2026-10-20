<h2 style="font-family:Arial,sans-serif;color:#0f3f73">Nouvelle demande de réservation</h2>
<table style="font-family:Arial,sans-serif;font-size:14px;border-collapse:collapse" cellpadding="6">
    <tr><td><strong>Excursion</strong></td><td>{{ $booking->excursionName() }}</td></tr>
    <tr><td><strong>Date souhaitée</strong></td><td>{{ $booking->date->translatedFormat('l j F Y') }}</td></tr>
    <tr><td><strong>Adultes</strong></td><td>{{ $booking->adults }}</td></tr>
    <tr><td><strong>Enfants</strong></td><td>{{ $booking->children }} {{ $booking->children_ages ? '('.$booking->children_ages.')' : '' }}</td></tr>
    <tr><td><strong>Nom</strong></td><td>{{ $booking->name }}</td></tr>
    <tr><td><strong>E-mail</strong></td><td>{{ $booking->email }}</td></tr>
    <tr><td><strong>Téléphone</strong></td><td>{{ $booking->phone }}</td></tr>
    @if ($booking->message)
        <tr><td valign="top"><strong>Message</strong></td><td>{!! nl2br(e($booking->message)) !!}</td></tr>
    @endif
</table>
<p style="font-family:Arial,sans-serif;font-size:12px;color:#777">Demande n° {{ $booking->id }} envoyée depuis le site, le {{ $booking->created_at->format('d/m/Y à H:i') }}.</p>
