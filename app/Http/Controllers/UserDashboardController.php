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
        $userTasks = Task::where('assigned_to', auth()->id())->get();

        return view('user.dashboard', compact('userTasks'));
    }

    public function userInbox()
    {
        $loggedInUserId = auth()->id();
        $users = $this->getOtherUsers($loggedInUserId);
        $userMessages = $this->getUserMessagesForUsers($loggedInUserId, $users);

        return view('user.inbox', compact('users', 'userMessages'));
    }

    private function getOtherUsers($loggedInUserId)
    {
        return User::where('id', '!=', $loggedInUserId)
            ->where('roles', 'user')
            ->get();
    }

    private function getUserMessagesForUsers($loggedInUserId, $users)
    {
        $userMessages = collect();

        foreach ($users as $user) {
            $messages = $this->getUserMessages($loggedInUserId, $user->id);
            $userMessages->put($user->id, $messages);
        }

        return $userMessages;
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

    public function replyStore(Request $request)
    {
        $this->validateReplyRequest($request);

        $sender = User::find($request->sender_id);

        $newMsg = Message::create([
            'text' => $request->input('msg', ''),
            'sender_id' => Auth::user()->id,
            'receiver_id' => $sender->id,
        ]);

        $this->uploadAndSaveImage($request, $newMsg);

        return redirect()->route('user.inbox');
    }

    private function validateReplyRequest(Request $request)
    {
        $this->validate($request, [
            'msg' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);
    }

    private function uploadAndSaveImage(Request $request, Message $newMsg)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $newMsg->image_path = 'images/' . $imageName;
            $newMsg->save();
        }
    }
}
