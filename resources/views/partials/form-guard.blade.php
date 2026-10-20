{{-- Anti-spam : honeypot invisible + horodatage chiffré (voir PublicFormRequest) --}}
@csrf
<div class="hp-field" aria-hidden="true">
    <label for="website-{{ $id ?? 'f' }}">Ne pas remplir ce champ</label>
    <input type="text" id="website-{{ $id ?? 'f' }}" name="website" tabindex="-1" autocomplete="off">
</div>
<input type="hidden" name="_started" value="{{ Crypt::encryptString((string) now()->timestamp) }}">
@if (session('success'))
    <div class="alert alert-success d-flex gap-3 align-items-start" role="status">
        <i class="bi bi-check-circle-fill fs-4" aria-hidden="true"></i>
        <div>{{ session('success') }}</div>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <strong>Merci de vérifier le formulaire :</strong>
        <ul class="mb-0 mt-2 small">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
