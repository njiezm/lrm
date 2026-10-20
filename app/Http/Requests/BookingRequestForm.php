<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class BookingRequestForm extends PublicFormRequest
{
    public const OTHER = ['groupe' => 'Groupe / événement (devis)', 'autre' => 'Je ne sais pas encore'];

    public static function choices(): array
    {
        return collect(config('site.excursions'))->map(fn ($e) => $e['name'])->all() + self::OTHER;
    }

    public function rules(): array
    {
        return [
            'excursion' => ['required', Rule::in(array_keys(self::choices()))],
            'date' => ['required', 'date', 'after_or_equal:today', 'before:+2 years'],
            'adults' => ['required', 'integer', 'min:1', 'max:200'],
            'children' => ['nullable', 'integer', 'min:0', 'max:100'],
            'children_ages' => ['nullable', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email:rfc', 'max:190'],
            'phone' => ['required', 'string', 'max:30', 'regex:/^[0-9 +().-]{6,}$/'],
            'message' => ['nullable', 'string', 'max:3000'],
            'consent' => ['accepted'],
        ];
    }

    public function attributes(): array
    {
        return [
            'excursion' => 'excursion',
            'date' => 'date souhaitée',
            'adults' => 'nombre d’adultes',
            'children' => 'nombre d’enfants',
            'children_ages' => 'âge des enfants',
            'name' => 'nom et prénom',
            'email' => 'e-mail',
            'phone' => 'téléphone',
            'message' => 'message',
            'consent' => 'consentement',
        ];
    }

    public function messages(): array
    {
        return [
            'date.after_or_equal' => 'La date souhaitée ne peut pas être dans le passé.',
            'phone.regex' => 'Le numéro de téléphone n’est pas valide.',
        ];
    }
}
