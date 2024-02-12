<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    public function userTasks()
    {
        $user = auth()->user();
        $userTasks = Task::where('assigned_to', $user->id)->get();

        return view('user.dashboard', compact('userTasks'));
    }

    public function userInbox()
    {
        $loggedInUserId = auth()->id();

        $users = User::where('id', '!=', $loggedInUserId)
            ->where('roles', 'user')
            ->get();

        $userMessages = [];
        foreach ($users as $user) {
            $messages = $this->getUserMessages($loggedInUserId, $user->id);
            $userMessages[$user->id] = $messages;
        }

        return view('user.inbox', compact('users', 'userMessages'));
    }

    private function getUserMessages($loggedInUserId, $otherUserId)
{
    return DB::table('messages')
        ->select(
            'messages.*',
            'messages.image_path',
            'senders.name as sender_name',
            'receivers.name as receiver_name'
        )
        ->join('users as senders', 'messages.sender_id', '=', 'senders.id')
        ->join('users as receivers', 'messages.receiver_id', '=', 'receivers.id')
        ->where(function ($query) use ($otherUserId, $loggedInUserId) {
            $query->where('sender_id', $loggedInUserId)
                ->where('receiver_id', $otherUserId)
                ->orWhere('sender_id', $otherUserId)
                ->where('receiver_id', $loggedInUserId);
        })
        ->orderBy('created_at', 'asc')
        ->get();
}
    protected $fillable = ['text', 'sender_id', 'receiver_id', 'image_path'];

    

    public function replyStore(Request $request)
{
    $sender = User::find($request->sender_id);

    $newMsg = new Message();
    $newMsg->sender_id = Auth::user()->id;
    $newMsg->receiver_id = $sender->id;

    // Check if an image is uploaded
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $newMsg->image_path = 'images/' . $imageName;

        // Check if text is provided
        $newMsg->text = $request->filled('msg') ? $request->input('msg') : '';
    } else {
        // No image provided, set text directly
        $newMsg->text = $request->filled('msg') ? $request->input('msg') : '';
    }

    $newMsg->save();

    return redirect()->route('user.inbox');
}


    
    

}
