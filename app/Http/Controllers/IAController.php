<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class IAController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        try {
            $apiKey = env('GEMINI_API_KEY');

            $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}", [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $request->message]
                        ]
                    ]
                ]
            ]);

            if ($response->successful() && isset($response['candidates'][0]['content']['parts'][0]['text'])) {
                return response()->json([
                    'response' => $response['candidates'][0]['content']['parts'][0]['text']
                ]);
            } else {
                Log::error('Erro na resposta da Gemini API:', ['response' => $response->json()]);
                return response()->json([
                    'response' => 'Erro ao processar a resposta da IA.'
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error('Erro na requisição da Gemini API:', ['exception' => $e]);
            return response()->json([
                'response' => 'Erro ao conectar com a API da Google: ' . $e->getMessage()
            ], 500);
        }
    }
}
