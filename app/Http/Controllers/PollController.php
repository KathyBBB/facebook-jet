<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Http\Resources\ContentResource;
use App\Http\Resources\UsersAnswersResource;
use App\Http\Resources\AnswerResource;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Illuminate\Support\Traits\Dumpable;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    use Dumpable;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Polls/Index', [
            'contents' => ContentResource::collection(Content::where('type', '=', 'poll')->orderByDesc('id')->get()),
            'useranswers' => UsersAnswersResource::collection(DB::table('useranswer')->join('users', 'useranswer.user_id', '=', 'users.id')->join('answers', 'useranswer.answer_id', '=', 'answers.id')->select('answers.id', 'answers.answer', 'users.name')->get()),
            //'useranswercount' => UsersAnswersResource::collection(DB::table('useranswer')->join('users', 'useranswer.user_id', '=', 'users.id')->join('answers', 'useranswer.answer_id', '=', 'answers.id')->select(DB::raw('count(*) as user_count, answers.id'))->groupBy('answers.id')->get()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'newAnswers' => 'required|array|min:4',
            'issue' => 'required|integer|exists:issues,id',
        ]);

        // dd($request->all());

        $query = Content::insertGetId([
            'title' => $validated['title'],
            'type' => 'poll',
            'issue_id' => $validated['issue'],
            'user_id' => auth()->id(),
        ]);

        $ind = 0;
        foreach ($validated['newAnswers'] as $answer) {
            $ind = $ind + 1;
            Answer::create([
                'content_id' => $query,
                'answer' => $answer['answer'],
                'orderId' => $answer['order_id'],
            ]);
        }

        return redirect(route('polls.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
