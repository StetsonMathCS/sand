<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class StudentController extends Controller
{
    public function getAll() {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/myapp.json');
        $database = $factory->createDatabase();
        $uid = 0;
        $ref = $database->getReference("students");
        $keys = $ref->getChildKeys();

        $data = array();

        foreach($keys as $key) {
            $obj = $ref->getChild($key)->getValue();

            $std = new Student();
            $std->setUid($key);
            $std->setUserName($obj['userName']);
            $std->setFirstName($obj['firstName']);
            $std->setLastName($obj['lastName']);
            $std->setEmail($obj['email']);
            $std->setPassword($obj['password']);

            if($ref->getChild($key)->getSnapshot()->hasChild("courses")) {
                $std->setCourses($obj['courses']);
            } else {
                $std->setCourses(array());
            }

            array_push($data, $std);
        }

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome')->with("students", $this->getAll());
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
        $uid = 0;
        $ref = $database->getReference("students");

        $key = $ref->push()->getKey();

        $ref->getChild($key)->set([
            "userName" => request('userName'),
            "firstName" => request('firstName'),
            "lastName" => request('lastName'),
            "password" => request('password'),
            "email" => request('email')
        ]);

        return $this->index();
    }
}
