<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Meetings;
use App\Models\Lawyer;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MeetingsController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meetings = Meetings::all();
        $lawyers = Lawyer::all();

        return view('scheduledmeetingsdash', compact('meetings','lawyers'));
    }


    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'location' => 'required',
                'status' => 'required',
                'date' => 'nullable|date',
                'lawyer' => 'required',
                'description' => 'required',
                
            ]);

            $meeting = Meetings::create($request->all());

            return redirect(route('meetings'), 201)->with(['success' => 'Meeting created successfully']);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], 400);
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return response()->json(['error' => 'Bad Request: Integrity constraint violation'], 400);
            }
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Meetings::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
     $meetings = Meetings::findOrFail($id);

        try {
            $this->validate($request, [

                'title' => 'sometimes|required',
                'location' => 'sometimes|required',
                'status' => 'sometimes|required',
                'lawyer' => 'sometimes|required',
                'description' => 'sometimes|required',
               
            ]);

            $meetings->update($request->all());

            return redirect()->route('meetings')->with('success', 'Meeting updated successfully!');
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], 400);
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return response()->json(['error' => 'Bad Request: Integrity constraint violation'], 400);
            }
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $client = Meetings::findOrFail($id);
            $client->delete();

            return redirect(route('meetings'))->with('success', 'Client deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Client not found'], 404);
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return response()->json(['error' => 'Bad Request: Integrity constraint violation'], 400);
            }
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    
    public function filter($name)
    {

        $lawyers = Lawyer::all();
        
        if($name == "pending")
        {
            $meetings = Meetings::where('status', 'Pending')->get();
        }
        else if($name == "cancelled")
        {
            $meetings = Meetings::where('status','Cancelled')->get();
        }
        else if($name == "completed")
        {
            $meetings = Meetings::where('status','Completed')->get();
        }
        return view('scheduledmeetingsdash',compact('meetings','lawyers'));
        
    }
}
