<?php
namespace App\Firebase;


class Course extends FirebaseQuery
{

    public $id;
    public $title;
    public $creditHours;

    public function __construct($path = 'courses')
    {
        parent::__construct($path);
    }


    protected function get($course_id){

        $cache_timeout = 60;
        $course = cache()->remember("firebase.course.$course_id", $cache_timeout, function () use ($course_id){
            return $this->reference($course_id)->getValue();
        });

        if(empty($course)){
            return null;
        }

        $this->id = $course_id;
        $this->title = $course['title'];
        $this->creditHours = $course['creditHours'];

        return $this;
    }

}
