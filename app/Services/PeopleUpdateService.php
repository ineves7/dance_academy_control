<?php

namespace App\Services;

use App\Models\People;
use App\Models\Address;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PeopleUpdateService
{
    public function __construct(
        protected PeopleService $peopleService,
    ) {
        //
    }

    public function update(array $request, $people_id)
    {
        try {
            DB::beginTransaction();

            $people = People::create([
                'name' => $request['name'],
                'last_name' => $request['last_name'],
                'level_people' => $request['level_people'],
                'genre_id' =>$request['genre_id'],
                'active' =>$request['active'],
                'phone' =>$request['phone'],
                'birthdate' =>$request['birthdate'],
                'email' =>$request['email'],
            ]);
            $address = Address::create([
                'people_id' => $request['people_id'],
                'city' => $request['city'],
                'district' => $request['district'],
                'street' => $request['street'],
                'number' =>$request['number'],
            ]);


            DB::commit();
        } catch (Exception $exception) {
            //Bugsnag::notifyException($exception);
            DB::rollBack();
            throw new Exception($exception);
        }
    }
}
