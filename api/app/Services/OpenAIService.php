<?php
namespace App\Services;

use \Orhanerday\OpenAi\OpenAi;

class OpenAIService
{
    protected $openAI;

    public function __construct()
    {
        $this->openAI = new OpenAi(config('openai.openai_api_key'), config('openai.openai_api_version'), config('openai.openai_api_url'));
    }

    public function generateText($prompt)
    {
        $parameters = [
            // 'model' => 'text-davinci-002',
            // 'maxTokens' => 100,
            // 'temperature' => 0.7,
            // 'topP' => 1,
            // 'n' => 1,

            'model' => 'text-davinci-002',
            'prompt' => $prompt,
            'temperature' => 0.9,
            'max_tokens' => 100,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
        ];
        $response = json_decode($this->openAI->completion($parameters), true);
        return response()->json($response["choices"][0]["text"]);
    }
}
