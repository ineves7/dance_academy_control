<?php

namespace App\Http\Controllers;
use App\Http\Requests\PeopleRequest;
use App\Models\People;
use App\Models\Address;
use App\Models\Danceclass;
use App\Models\Genre;
use App\Services\PeopleService;
use App\Services\PeopleCreateService;
use App\Services\PeopleUpdateService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeopleController extends Controller
{

    public function __construct(
        protected PeopleService $projectService,
        protected PeopleCreateService $projectCreateService,
        protected PeopleUpdateService $projectUpdateService,
    ){}


    public function index(): View
    {
        /*if (! Gate::allows('Ver e Listar Canecas')) {
            return abort(401);
        }*/

        try {
            $people = People::all();

            return view('admin.people.index', compact('people'));

        }catch (\Throwable $throwable){
            dd($throwable);
            return redirect()->back()->withInput();
        }

    }

    public function store(
        PeopleRequest $request
    ){

            DB::beginTransaction();

            $this->peopleCreateService->create($request->toArray());

            DB::commit();
            return redirect()->back();
    }

    public function show( $person_id ){


        try {
            $person = People::find($person_id);
            $danceclasses = Danceclass::all();

            return view ('admin.people.show', compact('person', 'danceclasses', 'hours'));
        }catch (\Throwable $throwable){
            dd($throwable);
            return redirect()->back()->withInput();
        }
    }

    public function create ()
    {

        try {

            $genres = Genre::all();
            $peoples = People::all();

            return view('admin.people.create', compact('genres', 'peoples'));

        }catch (\Throwable $throwable){
            dd($throwable);
            return redirect()->back()->withInput();
        }

    }

    public function update (
        Request $request, $people_id
    )
    {

        //dd($request->all());
        try {

            DB::beginTransaction();

            $people = People::find($people_id);

            $people->active = $request->active;

            $people->name = $request->name;

            $people->level_id = $request->level_id;

            $people->genre_id = $request->genre_id;

            $people->birthdate = $request->birthdate;

            $people->phone = $request->phone;

            $people->category_id = $request->category_id;

            $people->start_date = $request->start_date;

                $people->save();


            $address_id = $people->address->id;

            $address = Address::find($address_id);

                $address->city = $request->city;

                $address->district = $request->district;

                $address->street = $request->street;

                $address->number = $request->number;

            $address->save();

            DB::commit();

            return redirect()->back();
        }catch (\Throwable $throwable){
            DB::rollBack();
            dd($throwable);
            //return redirect()->back()->withInput();
        }
    }

    public function destroy (
        $person_id
    )
    {
        try {
            $person = People::find($person_id);

            $person->delete();

            return redirect()->route('pessoas.index');
        }catch (\Throwable $throwable){
            dd($throwable);
            return redirect()->back()->withInput();
        }

    }
}
