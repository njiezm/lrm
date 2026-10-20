@extends('layouts.app')

@section('title', 'Réservation & contact')
@section('description', 'Demandez votre réservation pour une excursion à la Baignoire de Joséphine et sur l’îlet Oscar avec le Roi Mongin : date, nombre de personnes, excursion. Réponse rapide par téléphone, e-mail ou WhatsApp.')

@section('content')
    @php
        $c = config('site.contact');
        $choices = \App\Http\Requests\BookingRequestForm::choices();
    @endphp
    @include('partials.page-hero', [
        'title' => 'Réserver votre sortie',
        'crumb' => 'Réservation',
        'eyebrow' => 'Réservation & contact',
        'lead' => 'Indiquez l’excursion, la date et le nombre de personnes : l’équipe vous confirme la disponibilité au plus vite. Vous préférez écrire ? WhatsApp est là pour ça.',
        'image' => 'photos/bapteme-rhum-groupe',
    ])

    <section class="section pt-4" id="formulaire">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="booking-card">
                        <h2 class="h3 mb-1">Demande de réservation</h2>
                        <p class="text-muted mb-4">Sans engagement ni paiement en ligne : votre réservation est confirmée par l’équipe. Les champs marqués * sont obligatoires.</p>

                        <form id="booking-form" method="post" action="{{ route('reservation.store') }}" novalidate @if ($errors->any()) data-has-old="1" @endif>
                            @include('partials.form-guard', ['id' => 'booking'])

                            <fieldset class="mb-4">
                                <legend class="h6 text-uppercase text-ocean fw-bold small mb-3">Votre sortie</legend>
                                <div class="row g-3">
                                    <div class="col-md-7">
                                        <label class="form-label" for="excursion">Excursion *</label>
                                        <select class="form-select @error('excursion') is-invalid @enderror" id="excursion" name="excursion" required>
                                            @foreach ($choices as $value => $label)
                                                <option value="{{ $value }}" @selected(old('excursion', 'la-kreole') === $value)>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @error('excursion')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label" for="date">Date souhaitée *</label>
                                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" min="{{ now()->toDateString() }}" required>
                                        @error('date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <label class="form-label" for="adults">Adultes *</label>
                                        <div class="stepper">
                                            <button type="button" data-step="-1" aria-label="Un adulte de moins">−</button>
                                            <input type="number" class="form-control @error('adults') is-invalid @enderror" id="adults" name="adults" value="{{ old('adults', 2) }}" min="1" max="200" inputmode="numeric" required>
                                            <button type="button" data-step="1" aria-label="Un adulte de plus">+</button>
                                        </div>
                                        @error('adults')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <label class="form-label" for="children">Enfants (– 15 ans)</label>
                                        <div class="stepper">
                                            <button type="button" data-step="-1" aria-label="Un enfant de moins">−</button>
                                            <input type="number" class="form-control @error('children') is-invalid @enderror" id="children" name="children" value="{{ old('children', 0) }}" min="0" max="100" inputmode="numeric">
                                            <button type="button" data-step="1" aria-label="Un enfant de plus">+</button>
                                        </div>
                                        @error('children')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-4" id="children-ages-wrap">
                                        <label class="form-label" for="children_ages">Âge des enfants</label>
                                        <input type="text" class="form-control @error('children_ages') is-invalid @enderror" id="children_ages" name="children_ages" value="{{ old('children_ages') }}" placeholder="ex. 4 et 9 ans" maxlength="100">
                                        @error('children_ages')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="mb-4">
                                <legend class="h6 text-uppercase text-ocean fw-bold small mb-3">Vos coordonnées</legend>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label" for="name">Nom et prénom *</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" autocomplete="name" required maxlength="150">
                                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="email">E-mail *</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="email" required maxlength="190">
                                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="phone">Téléphone / WhatsApp *</label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" autocomplete="tel" required maxlength="30">
                                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="message">Message <span class="text-muted fw-normal">(occasion, option langouste, allergies…)</span></label>
                                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4" maxlength="3000">{{ old('message') }}</textarea>
                                        @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-check mb-4">
                                <input class="form-check-input @error('consent') is-invalid @enderror" type="checkbox" value="1" id="consent" name="consent" @checked(old('consent')) required>
                                <label class="form-check-label small" for="consent">J’accepte que mes informations soient utilisées pour traiter ma demande de réservation, conformément à la <a href="{{ route('privacy') }}">politique de confidentialité</a>. *</label>
                                @error('consent')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="d-flex flex-column flex-sm-row gap-2">
                                <button type="submit" class="btn btn-sun btn-lg"><i class="bi bi-send" aria-hidden="true"></i> Envoyer ma demande</button>
                                <a href="https://wa.me/{{ $c['whatsapp'] }}" class="btn btn-whatsapp btn-lg" data-wa-from-form="booking-form" data-wa-number="{{ $c['whatsapp'] }}" target="_blank" rel="noopener"><i class="bi bi-whatsapp" aria-hidden="true"></i> Envoyer par WhatsApp</a>
                            </div>
                        </form>
                    </div>
                </div>

                <aside class="col-lg-4">
                    <div class="sticky-aside d-grid gap-3">
                        <h2 class="h4 mb-0">Nous joindre directement</h2>
                        <a class="contact-tile" href="https://wa.me/{{ $c['whatsapp'] }}" target="_blank" rel="noopener"><i class="bi bi-whatsapp" aria-hidden="true"></i><span>WhatsApp<small>{{ $c['phone_intl'] }}</small></span></a>
                        <a class="contact-tile" href="tel:{{ $c['phone_link'] }}"><i class="bi bi-telephone" aria-hidden="true"></i><span>{{ $c['phone'] }}<small>{{ $c['hours'] }}</small></span></a>
                        <a class="contact-tile" href="mailto:{{ $c['email'] }}"><i class="bi bi-envelope" aria-hidden="true"></i><span>E-mail<small>{{ $c['email'] }}</small></span></a>
                        <a class="contact-tile" href="{{ route('infos') }}#acces"><i class="bi bi-geo-alt" aria-hidden="true"></i><span>Rendez-vous<small>{{ $c['meeting_point'] }}</small></span></a>
                        <div class="d-flex gap-2">
                            <a class="contact-tile flex-fill" href="{{ $c['facebook'] }}" target="_blank" rel="noopener"><i class="bi bi-facebook" aria-hidden="true"></i><span>Facebook</span></a>
                            <a class="contact-tile flex-fill" href="{{ $c['instagram'] }}" target="_blank" rel="noopener"><i class="bi bi-instagram" aria-hidden="true"></i><span>Instagram</span></a>
                        </div>
                        <p class="small text-muted mb-0">{{ config('site.prices_note') }}</p>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
