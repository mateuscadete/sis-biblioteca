<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IAController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        // Aqui você pode integrar com diferentes APIs de IA
        // Exemplo com OpenAI (você precisará configurar sua chave API no .env)
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Você é um assistente útil de uma biblioteca. Responda perguntas sobre livros, autores e assuntos relacionados à biblioteca de forma educada e informativa.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $request->message
                    ]
                ],
                'temperature' => 0.7
            ]);

            $aiResponse = $response->json()['choices'][0]['message']['content'] ?? 'Desculpe, não consegui processar sua pergunta.';

            return response()->json(['response' => $aiResponse]);

        } catch (\Exception $e) {
            return response()->json(['response' => 'Erro ao conectar com o serviço de IA: ' . $e->getMessage()], 500);
        }
    }
}
