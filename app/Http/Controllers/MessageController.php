<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewMessage;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $user = auth()->user();
        $message = $request->input('message');
        $file = $request->file('file');
        
        try {
            $fileUrl = $file ? $file->store('photosMsg', 'public') : null;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    
        broadcast(new NewMessage($user, $message, $fileUrl));
    
        return response()->json(['status' => 'Message sent']);
    }
}
