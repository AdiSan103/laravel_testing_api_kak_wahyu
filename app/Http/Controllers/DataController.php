<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DataController extends Controller
{
    public function read(Request $request) {

        return response()->json([
            'data' => TodoList::get()
        ], 200);
    }

    public function create(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'date' => 'required',
                'time' => 'required',
            ]);

            // Create the data record using the model
            $data = TodoList::create($validatedData);

            // Return a JSON response indicating success
            return response()->json([
                'message' => 'Data created successfully',
                'data' => $data,
            ], 201); // 201 HTTP status code indicates "Created"
        } catch (ValidationException $e) {
            // Validation failed. Get the validation errors and respond with JSON
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422); // 422 HTTP status code indicates "Unprocessable Entity"
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'date' => 'required',
                'time' => 'required',
            ]);

            // Find the data record by its ID
            $data = TodoList::find($id);

            if (!$data) {
                // If the data record does not exist, return an error response
                return response()->json([
                    'message' => 'Data not found',
                ], 404); // 404 HTTP status code indicates "Not Found"
            }

            // Update the data record using the model
            $data->update($validatedData);

            // Return a JSON response indicating success
            return response()->json([
                'message' => 'Data updated successfully',
                'data' => $data,
            ], 200); // 200 HTTP status code indicates "OK"
        } catch (ValidationException $e) {
            // Validation failed. Get the validation errors and respond with JSON
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422); // 422 HTTP status code indicates "Unprocessable Entity"
        }
    }

    public function delete($id)
    {
        // Find the data record by its ID
        $data = TodoList::find($id);

        if (!$data) {
            // If the data record does not exist, return an error response
            return response()->json([
                'message' => 'Data not found',
            ], 404); // 404 HTTP status code indicates "Not Found"
        }

        // Delete the data record from the database
        $data->delete();

        // Return a JSON response indicating success
        return response()->json([
            'message' => 'Data deleted successfully',
        ], 200); // 200 HTTP status code indicates "OK"
    }

    public function detail($id)
    {
        // Find the data record by its ID
        $data = TodoList::find($id);

        if (!$data) {
            // If the data record does not exist, return an error response
            return response()->json([
                'message' => 'Data not found',
            ], 404); // 404 HTTP status code indicates "Not Found"
        }

        // Return a JSON response with the data record
        return response()->json([
            'data' => $data,
        ], 200); // 200 HTTP status code indicates "OK"
    }
}
