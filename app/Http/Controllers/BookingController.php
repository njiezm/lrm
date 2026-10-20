<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequestForm;
use App\Mail\BookingRequestReceived;
use App\Models\BookingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function store(BookingRequestForm $request): RedirectResponse
    {
        $booking = BookingRequest::create(
            $request->safe()->except('consent') + ['children' => (int) $request->input('children', 0), 'ip' => $request->ip()]
        );

        try {
            Mail::to(config('site.mail_to'))->send(new BookingRequestReceived($booking));
        } catch (\Throwable $e) {
            // La demande reste enregistrée en base même si l'envoi échoue
            Log::error('Envoi du mail de réservation impossible', ['id' => $booking->id, 'error' => $e->getMessage()]);
        }

        return redirect()->to(route('reservation').'#formulaire')
            ->with('success', 'Merci '.$booking->name.' ! Votre demande pour « '.$booking->excursionName().' » le '
                .$booking->date->translatedFormat('j F Y').' est bien envoyée. Margaret et son équipe vous confirment la disponibilité très vite, par téléphone ou par e-mail.');
    }
}
