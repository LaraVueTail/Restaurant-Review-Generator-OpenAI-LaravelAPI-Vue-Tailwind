<?php
namespace App\Http\Controllers;

use App\Services\OpenAIService;
use Illuminate\Http\Request;

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function generateReview(Request $request)
    {
        $restaurant_name = $request->input('name') ?? 'FoodSpot';
        $restaurant_type = $request->input('type') ?? 'restaurant';
        $restaurant_theme = $request->input('theme') ?? 'chinese';
        $restaurant_main_dishes = $request->input('main_dishes') ?? 'Chow Mein, Chicken Fried Rice';
        $restaurant_highlights = $request->input('highlights') ?? 'Good ambients, take away';
        $prompt ="write a good review in less than 50 words for an ".$restaurant_theme." ".$restaurant_type." named ".$restaurant_name.". Its main highlights are ".$restaurant_highlights.". Their main dishes are ".$restaurant_main_dishes.".";
        $response = $this->openAIService->generateText($prompt);

        // Process the OpenAI API response as needed
        // ...

        return response()->json($response);
        // return response()->json($prompt);
    }
}