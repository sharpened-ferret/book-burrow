<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class BookFetch 
{
    private $url;
    private $params;

    public function __construct($url, $params) {
        $this->url = $url;
        $this->params = $params;
    }

    public function fetch($isbn) {
        $response = Http::get($this->url, [
            'bibkeys' => 'ISBN:'.$isbn,
            'jscmd' => 'data',
            'format' => 'json',
        ]);
        $bookData = $response->json();
        if ($bookData != null) {
            return $bookData['ISBN:'.$isbn];
        } else {
            return null;
        }
    }
}