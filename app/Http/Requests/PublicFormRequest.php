<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Validator;

/**
 * Formulaire public protégé contre les robots :
 *  - champ « website » invisible qui doit rester vide (honeypot) ;
 *  - horodatage chiffré : un humain met plus de 3 secondes à remplir le formulaire.
 */
abstract class PublicFormRequest extends FormRequest
{
    public const MIN_SECONDS = 3;

    public function authorize(): bool
    {
        return true;
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if (filled($this->input('website')) || ! $this->filledInTime()) {
                    $validator->errors()->add('form', 'Votre envoi n’a pas pu être validé. Merci de réessayer.');
                }
            },
        ];
    }

    private function filledInTime(): bool
    {
        try {
            $startedAt = (int) Crypt::decryptString((string) $this->input('_started'));
        } catch (DecryptException) {
            return false;
        }

        return now()->timestamp - $startedAt >= self::MIN_SECONDS;
    }
}
