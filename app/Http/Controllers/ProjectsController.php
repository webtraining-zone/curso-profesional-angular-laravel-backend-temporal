<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectTranslation;
use App\User;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Project::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAll(Request $request)
    {
        if ($request->isJson()) {
            return Project::paginate(2);
        } else {
            return response()->json(['error' => 'Not acceptable'], 406, []);
        }
    }

    public function createProject(Request $request)
    {

        if ($request->isJson()) {
            $data = $request->json()->all();

            $userExists = User::where("id", $data['user_id'])->exists();

            if ($userExists === FALSE) {
                return response()->json(['error' => 'Invalid parameters :('], 406);
            }

            $translations = $data['translations'];

            $dataToBeSaved = [
                'user_id' => $data['user_id'],
                'thumbnail' => $data['thumbnail'],
                'image' => $data['image'],
                // 'slug' => 'slug-1', // is automatically set!
            ];

            foreach ($translations as $translation) {
                $dataToBeSaved [$translation["locale"]] = [
                    'title' => $translation["title"],
                    'description' => $translation["description"],
                ];
            }

            $project = Project::create($dataToBeSaved);

            return response()->json($project, 201);
        } else {
            return response()->json(['error' => 'Error not a valid JSON !!!'], 406, []);
        }
    }
}
