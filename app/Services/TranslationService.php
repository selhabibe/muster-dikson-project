<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use DeepL\Translator;

class TranslationService
{

    const PROD = false;
    const DEV = true;
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = env('TRANSLATION_API_URL');
        $this->apiKey = env('TRANSLATION_API_KEY');
    }

    public function translate($text, $sourceLang = null, $targetLang = 'fr' )
    {

        if (static::PROD){
            $authKey = $this->apiKey;
            $translator = new Translator($authKey);;
            $result = $translator->translateText($text, $sourceLang, $targetLang);
            return $result->text ?? '';
        }
        return $text;
    }
}
