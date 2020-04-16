<?php
namespace App\Firebase;



use App\Firebase\Auth\FirebaseUser;

class Student extends FirebaseUser
{


    public function __construct($path = 'students')
    {
        parent::__construct($path);
    }


    /**
     * @param string $email
     * @return bool
     */
    protected function emailExists( string $email ){
        return Student::reference()
            ->orderByChild('email')
            ->equalTo( $email )
            ->getSnapshot()
            ->numChildren() > 0;
    }


    /**
     * @param string $username
     * @return bool
     */
    protected function usernameExists( string $username ){
        return Student::reference()
            ->orderByChild('userName')
            ->equalTo( $username )
            ->getSnapshot()
            ->numChildren() > 0;
    }


    protected function register($attributes){

        $attributes = array_merge([
            'userName' => '',
            'email' => '',
            'firstName' => '',
            'lastName' => '',
            'password' => '',
        ], $attributes);

        $registered = Student::reference()->push($attributes);

        $values = $registered->getValue();

        $this->id = $registered->getKey();
        $this->userName = $values['userName'];
        $this->email = $values['email'];
        $this->firstName = $values['firstName'];
        $this->lastName = $values['lastName'];
        $this->password = $values['password'];

        return $this;

    }


    public function courses($auto_fetch = false){
        $courses = $this->traverse($this->id)
            ->reference('courses')
            ->getValue() ?? [];
        $courses = array_keys($courses);

        if(!$auto_fetch){
            return $courses;
        }

        $course_objects = [];
        foreach ($courses as $course){
            $course_objects[ $course ] = Course::get($course);
        }

        return $course_objects;

    }


}
