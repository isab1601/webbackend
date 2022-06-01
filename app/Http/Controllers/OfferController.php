<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;


class OfferController extends Controller
{

    //load all offers
    public function index(){
        //load all offers and relations with eager loading
        $offers = Offer::with(['subject','user','appointments'])->get();
        return $offers;
    }

   //find offer by ID
    public function findByID(int $id) {
        $offer= Offer::where('id',$id)->with(['subject','user','appointments', 'messages'])->first();
        return $offer;
    }

    //find all Offers from certain User
    public function OffersbyUserID(string $userId) {
        $offers = Offer::where('user_id',$userId)->with(['appointments', 'messages'])->get();
        return $offers;
    }

    //checkID
    public function checkID(string $id) {
        $offer = Offer::where('id',$id)->first();
        return $offer != null? response()->json(true,200) :response()->json(false, 200);
    }


    //Delete offer
    public function delete(int $id) : JsonResponse
    {
        $offer = Offer::where('id', $id)->first();
        if ($offer != null) {
            $offer->delete();
        }
        else
            throw new \Exception("offer couldn't be deleted - it does not exist");
        return response()->json('offer (' . $id . ') successfully deleted', 200);
    }


    //create offer
    public function save(Request $request) : JsonResponse {

        DB::beginTransaction();
        try {
            //Create the offer
            $offer = Offer::create($request->all());
            //save dates to offer
           if(isset($request['appointments']) && is_array($request['appointments'])){
                foreach($request['appointments'] as $app){
                    $appointment = Appointment::firstOrNew(['date'=>$app['date'],'from'=>$app['from'],'to'=>$app['to']]);
                    $offer->appointments()->save($appointment);
                }
            }
            DB::commit();


           $newOffer =Offer::where('id', $offer->id)->with(['appointments','user','subject'])->first();
            return response()->json($newOffer,201);

        } catch(\Exception $e){
            DB::rollBack();
            return response()->json("Das Angebot konnte nicht gespeichert werden: ".$e->getMessage(),420);
        }
    }


    //Update offer
    public function update(Request $request, string $id) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $offer = Offer::with(['subject', 'user', 'appointments'])
                ->where('id', $id)->first();
            if ($offer != null) {
               // $request = $this->parseRequest($request);
                $offer->update($request->all());
                //delete all old dates
                $offer->appointments()->delete();
                // save dates
                if (isset($request['appointments']) && is_array($request['appointments'])) {
                    foreach ($request['appointments'] as $app) {
                        $appointment = Appointment::firstOrNew(['date'=>$app['date'],'from'=>$app['from'],'to'=>$app['to']]);
                        $offer->appointments()->save($appointment);
                    }
                }
            }
            DB::commit();
            $offer1= Offer::with(['subject', 'user', 'appointments'])
                ->where('id', $id)->first();
            // return a vaild http response
            return response()->json($offer1, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("Angebot konnte nicht geupdatet werden." . $e->getMessage(), 420);
        }
    }

}
