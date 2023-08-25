<?php

namespace Modules\Réservation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Réservation\Entities\Message;
use Illuminate\Contracts\Support\Renderable;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('id', 'desc')->paginate(7);
        return view('réservation::manager.messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        $message = new Message($validatedData);
        $message->save();
        return redirect()->back()->with('success', 'successfully');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->back()->with('successDelete', 'Delete');
    }
}
