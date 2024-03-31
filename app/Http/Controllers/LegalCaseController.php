<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\LegalCase;
use App\Models\Client;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class LegalCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $legalcases = LegalCase::all();
         $clients = Client::all(); 
        return view('legalcases', compact('legalcases','clients'));
    }


    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        try {
            $request->validate([
                'case_id' => 'required',
                'title' => 'required',
                'client' => 'required',
                'category' => 'required',
                'progress' => 'required',
                'description' => 'required',
                
            ]);

            $legalcase = LegalCase::create($request->all());

            return redirect(route('cases'), 201)->with(['success' => 'Case created successfully']);
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
        return LegalCase::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $legalcases = LegalCase::findOrFail($id);

        try {
            $this->validate($request, [
                'case_id' => 'sometimes|required',
                'title' => 'sometimes|required',
                'client' => 'sometimes|required',
                'category' => 'sometimes|required',
                'progres' => 'sometimes|required',
                'description' => 'sometimes|required',
                'lawyer_id' => [
                    'sometimes',
                    Rule::requiredIf(function () use ($request) {
                        return !empty($request->input('name'));
                    }),
                ],
            ]);

            $legalcases->update($request->all());

            return redirect()->route('cases')->with('success', 'Case updated successfully!');
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
            $legalcases = LegalCase::findOrFail($id);
            $legalcases->delete();

            return redirect(route('cases'))->with('success', 'Case deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Case not found'], 404);
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return response()->json(['error' => 'Bad Request: Integrity constraint violation'], 400);
            }
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }



    public function filter($name)
    {

        $clients = Client::all(); 
        
        if($name == "progress")
        {
            $legalcases = LegalCase::orderBy('progress', 'desc')->get();

        }
        else if($name == "business")
        {
            $legalcases = LegalCase::where('category','Business Law')->get();;
        }
        else if($name == "family")
        {
            $legalcases = LegalCase::where('category','Family Law')->get();;
        }
        else if($name == "criminal")
        {
            $legalcases = LegalCase::where('category','Criminal Defense')->get();
        }

        return view('legalcases',compact('legalcases','clients'));
        
    }

    public function search(Request $request)
    {
  
        $clients = Client::all();
        $search = $request->input('search');
      
        $legalcases = LegalCase::where('title', 'like', "%$search%")
            ->orWhere('client', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->get();

        return view('legalcases',compact('legalcases','clients'));
    }

}

