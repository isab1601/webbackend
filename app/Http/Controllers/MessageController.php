<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Message;
use App\Models\Offer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function allbyOfferID(string $offerId) {
        $messages = Message::where('offer_id',$offerId)->with(['user'])->get();
        return $messages;
    }


    //create message
    public function save(Request $request) : JsonResponse {

        DB::beginTransaction();
        try {
            //create message
            $message = Message::create($request->all());
            DB::commit();

            $newMessage =Message::where('id', $message->id)->with(['user','offer'])->first();
            return response()->json($newMessage,201);

        } catch(\Exception $e){
            DB::rollBack();
            return response()->json("Die Nachricht konnte nicht gespeichert werden: ".$e->getMessage(),420);
        }
    }

    //delete message
    public function delete(int $id) : JsonResponse
    {
        $message = Message::where('id', $id)->first();
        if ($message!= null) {
            $message->delete();
        }
        else
            throw new \Exception("message couldn't be deleted - it does not exist");
        return response()->json('message (' . $id . ') successfully deleted', 200);
    }
}
