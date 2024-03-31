<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('clientlist', compact('clients'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'caseid' => 'required',
                'name' => 'required',
                'job' => 'required',
                'description' => 'required',
                
            ]);

            $client = Client::create($request->all());

            return redirect(route('clients'), 201)->with(['success' => 'Client created successfully']);
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
        return Client::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);

        try {
            $this->validate($request, [
                'caseid' => 'sometimes|required',
                'name' => 'sometimes|required',
                'job' => 'sometimes|required',
                'description' => 'sometimes|required',
                'lawyer_id' => [
                    'sometimes',
                    Rule::requiredIf(function () use ($request) {
                        return !empty($request->input('name'));
                    }),
                ],
            ]);

            $client->update($request->all());

            return redirect()->route('clients')->with('success', 'Client updated successfully!');
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
            $client = Client::findOrFail($id);
            $client->delete();

            return redirect(route('clients'))->with('success', 'Client deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Client not found'], 404);
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return response()->json(['error' => 'Bad Request: Integrity constraint violation'], 400);
            }
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }


    public function search(Request $request)
    {
  
        $clients = Client::all();
        $search = $request->input('search');
      
        $clients = Client::where('name', 'like', "%$search%")
            ->orWhere('job', 'like', "%$search%")
            ->get();

    
        return view('clientlist',compact('clients'));
    }
}
