<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("tutor")->with("tutors", $this->getAll());
    }

    public function getAll() {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/myapp.json');
        $database = $factory->createDatabase();
        $uid = 0;
        $ref = $database->getReference("tutors");
        $keys = $ref->getChildKeys();

        $data = array();

        foreach($keys as $key) {
            $obj = $ref->getChild($key)->getValue();

            $tutor = new Tutor();
            $tutor->setUid($key);
            $tutor->setUserName($obj['userName']);
            $tutor->setFirstName($obj['firstName']);
            $tutor->setLastName($obj['lastName']);
            $tutor->setEmail($obj['email']);
            $tutor->setPassword($obj['password']);
            $tutor->setRating($obj['rating']);

            $location = new Location();
            $loc = $obj['location'];
            $location->setStreetAddress($loc['streetAddress']);
            $location->setCity($loc['city']);
            $location->setState($loc['state']);
            $location->setZipCode($loc['zipCode']);
            $tutor->setLocation($location);


            if($ref->getChild($key)->getSnapshot()->hasChild("courses")) {
                $tutor->setCourses($obj['courses']);
            } else {
                $tutor->setCourses(array());
            }

            array_push($data, $tutor);
        }

        return $data;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $factory = (new Factory)->withServiceAccount(__DIR__ . '/myapp.json');
        $database = $factory->createDatabase();
        $ref = $database->getReference("tutors");

        $key = $ref->push()->getKey();

        $ref->getChild($key)->set([
            "userName" => request('userName'),
            "firstName" => request('firstName'),
            "lastName" => request('lastName'),
            "password" => request('password'),
            "email" => request('email'),
            "rating" => request('rating'),
            "location" => [
                "streetAddress" => request('streetAddress'),
                "city" => request('city'),
                'state' => request('state'),
                'zipCode' => request('zipCode')
            ],
        ]);

        return $this->index();
    }
}
