<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{


    //find Appointment by ID
    public function findByID(int $id) {
        $appointment= Appointment::where('id',$id)->with(['user','offer'])->first();
        return $appointment;
    }

    //find all Appointments from certain User
    public function allbyUserID(string $userId) {
        $appointments = Appointment::where('user_id',$userId)->with(['offer'])->get();
        return $appointments;
    }

    public function updateAppointment(Request $request, string $id): JsonResponse {
        DB::beginTransaction();
        try {
            $appointment = Appointment::with(['user', 'offer'])
                ->where('id', $id)->first();
            if ($appointment != null) {
                $appointment->update($request->all());
                $appointment->save();
            }
            DB::commit();
            $appointment1= Appointment::with(['user', 'offer'])
                ->where('id', $id)->first();
            // return a vaild http response
            return response()->json($appointment1, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("Termin konnte nicht geupdatet werden." . $e->getMessage(), 420);
        }
    }

    //delete appointment
    public function delete(int $id) : JsonResponse
    {
        $appointment = Appointment::where('id', $id)->first();
        if ($appointment!= null) {
            $appointment->delete();
        }
        else
            throw new \Exception("appointment couldn't be deleted - it does not exist");
        return response()->json('appointment (' . $id . ') successfully deleted', 200);
    }
}
