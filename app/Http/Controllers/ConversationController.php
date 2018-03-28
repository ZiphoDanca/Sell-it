<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation;
use Illuminate\Support\Facades\Input;
use App\NewUser;
use App\Sellers_details_tabs;
use App\ChatMessage;

class ConversationController extends Controller
{
    public function createConversation()
    {
        $respond=array();

        $post_id = Input::get('post_id');

        $api_key = Input::get('api_key');

        $user  = NewUser::where('api_key',$api_key)->first();

        $conversation = Conversation::where('Sender_id',$user->id)
            ->where('Post_id',$post_id)->first();


        $post = Sellers_details_tabs::where('id',$post_id)->first();

        $receiver = NewUser::where('id',$post->new_user_id)->first();

        if($conversation==NULL)
        {
            $newConversation = new Conversation();
            $newConversation->Sender_id = $user->id;
            $newConversation->SenderName = $user->name.' '.$user->surname;
            $newConversation->Receiver_id = $receiver->id;
            $newConversation->ReceiverName = $receiver->name.' '.$receiver->surname;
            $newConversation->Post_id = $post->id;
            $newConversation->save();

            $newChatMessage = new ChatMessage();
            $newChatMessage->conversation_id = $newConversation->id;
            $newChatMessage->new_user_id = $receiver->id;
            $newChatMessage->message = "Hi ".$user->name;
            $newChatMessage->user_type = "Receiver";
            $newChatMessage->save();

            $messages = ChatMessage::where('conversation_id',$newConversation->id)
                ->join('new_users', 'new_users.id', '=', 'chat_messages.new_user_id')
                ->select(
                    \DB::raw("
                                            chat_messages.id,
                                            chat_messages.conversation_id,
                                            new_users.name,
                                            new_users.surname,
                                            chat_messages.message,
                                            chat_messages.user_type,
                                            chat_messages.created_at
                                        ")
                )
                ->get();

            return response()->json($messages);

        }
        else
        {
            $messagesExist = ChatMessage::where('conversation_id',$conversation->id)->exists();

            if($messagesExist==NULL)
            {

                $respond['conversation_id']=$conversation->id;

                return response()->json($respond);
            }
            else
            {
                $messages = ChatMessage::where('conversation_id',$conversation->id)
                    ->join('new_users', 'new_users.id', '=', 'chat_messages.new_user_id')
                    ->select(
                        \DB::raw("
                                            chat_messages.id,
                                            chat_messages.conversation_id,
                                            new_users.name,
                                            new_users.surname,
                                            chat_messages.message,
                                            chat_messages.user_type,
                                            chat_messages.created_at
                                        ")
                    )
                    ->get();

                return response()->json($messages);
            }
        }
    }
    public function getMyConversation()
    {
        $api_key = Input::get('api_key');

        $user  = NewUser::where('api_key',$api_key)->first();

        $conversations = Conversation::where('Sender_id',$user->id)
            ->orWhere('Receiver_id',$user->id)
            ->with('messages')
            ->get();

        return response()->json($conversations);
    }
}
