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
        $users = $this->getUsersForInbox($loggedInUserId);

        $userMessages = $this->getUserMessagesForUsers($loggedInUserId, $users);

        return view('user.inbox', compact('users', 'userMessages'));
    }

    public function searchChatByNameOrEmail(Request $request)
    {
        $searchQueryInbox = $request->input('searchQueryInbox', '');
        $loggedInUserId = auth()->id();

        $users = User::where('roles', 'user')
            ->where('id', '!=', $loggedInUserId)
            ->where(function ($queryBuilder) use ($searchQueryInbox) {
                $queryBuilder->where('name', 'like', "%$searchQueryInbox%")
                    ->orWhere('email', 'like', "%$searchQueryInbox%");
            })->get();

        $userMessages = $this->getUserMessagesForUsers($loggedInUserId, $users);

        return view('user.inbox', compact('searchQueryInbox', 'users', 'userMessages'));
    }

    private function getUserMessagesForUsers($loggedInUserId, $users)
    {
        $userMessages = [];
        foreach ($users as $user) {
            $messages = $this->getUserMessages($loggedInUserId, $user->id);
            $userMessages[$user->id] = $messages;
        }

        return $userMessages;
    }

    private function getUsersForInbox($loggedInUserId)
    {
        return User::where('id', '!=', $loggedInUserId)
            ->where('roles', 'user')
            ->get();
    }


    private function getUserMessages($loggedInUserId, $otherUserId)
    {
        return DB::table('messages')
            ->select('messages.*', 'messages.image_path', 'senders.name as sender_name', 'receivers.name as receiver_name')
            ->join('users as senders', function ($join) use ($loggedInUserId, $otherUserId) {
                $join->on('messages.sender_id', '=', 'senders.id')
                    ->where(function ($query) use ($otherUserId, $loggedInUserId) {
                        $query->where('sender_id', $loggedInUserId)
                            ->where('receiver_id', $otherUserId)
                            ->orWhere('sender_id', $otherUserId)
                            ->where('receiver_id', $loggedInUserId);
                    });
            })
            ->join('users as receivers', 'messages.receiver_id', '=', 'receivers.id')
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function replyStore(Request $request)
    {
        $newMsg = new Message();
        $newMsg->sender_id = Auth::id();
        $newMsg->receiver_id = User::find($request->sender_id)->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $newMsg->image_path = 'images/' . $imageName;
        }

        $newMsg->text = $request->filled('msg') ? $request->input('msg') : '';
        $newMsg->save();

        return redirect()->route('user.inbox');
    }
}
