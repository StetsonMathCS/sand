<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("requests")->with("students", $this->getAllStudents())
            ->with("courses", $this->getAllCourses())
            ->with("tutors", $this->getAllTutors())
            ->with("requests", $this->getAllRequests());
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
        $ref = $database->getReference("requests");

        $key = $ref->push()->getKey();

        $ref->getChild($key)->set([
            "block" => request('block'),
            "course" => request('stdCourse'),
            "slot" => request('slot'),
            "student" => request('stdUserName'),
            "tutor" => request('tutorUserName')
        ]);

        return $this->index();
    }

    public function getAllRequests() {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/myapp.json');
        $database = $factory->createDatabase();
        $uid = 0;
        $ref = $database->getReference("requests");
        $keys = $ref->getChildKeys();

        $data = array();

        foreach($keys as $key) {
            $obj = $ref->getChild($key)->getValue();

            $req = new TutoringRequest();
            $req->setCode($key);
            $req->setCourse($obj['course']);
            $req->setStudentUserName($obj['student']);
            $req->setTutorUserName($obj['tutor']);
            $req->setSlot($obj['slot']);
            $req->setBlock($obj['block']);
            array_push($data, $req);
        }

        return $data;
    }

    public function getAllCourses() {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/myapp.json');
        $database = $factory->createDatabase();
        $uid = 0;
        $ref = $database->getReference("courses");
        $keys = $ref->getChildKeys();

        $data = array();

        foreach($keys as $key) {
            $obj = $ref->getChild($key)->getValue();

            $course = new Course();
            $course->setCode($key);
            $course->setTitle($obj['title']);
            array_push($data, $course);
        }

        return $data;
    }

    public function getAllStudents() {
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

    public function getAllTutors() {
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

}
