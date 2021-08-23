<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
    {
        $conversations = auth()->user()->conversations()->latest()->get();

        // $conversations = Conversation::join('messages', 'conversations.id', '=', 'messages.conversation_id')
        //     ->orderBy('messages.created_at', 'DESC')
        //     ->get();

        Carbon::setLocale('fr');
        return view('conversations.index', compact('conversations'));
    }

    public function show(Conversation $conversation)
    {
        return view('conversations.show', compact('conversation'));
    }
}
