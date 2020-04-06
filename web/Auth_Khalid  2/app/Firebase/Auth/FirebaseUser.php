<?php


namespace App\Firebase\Auth;


use App\Firebase\FirebaseQuery;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Arr;

class FirebaseUser extends FirebaseQuery implements Authenticatable
{

    public $id;
    public $email;
    public $userName;
    public $password;
    public $firstName;
    public $lastName;

    private $rememberTokenName = 'remember_token';

    /**
     * @inheritDoc
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * @inheritDoc
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * @inheritDoc
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    /**
     * @inheritDoc
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * @inheritDoc
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

    public function fetchUserByCredentials(array $credentials)
    {
        $user = $this->reference()
            ->orderByChild('userName')
            ->equalTo($credentials['username'])
            ->limitToFirst(1)
            ->getValue();

        if(empty($user)){
            $user = $this->reference()
                ->orderByChild('email')
                ->equalTo($credentials['username'])
                ->limitToFirst(1)
                ->getValue();
        }

        if(!empty($user)){
            $this->id = Arr::first(array_keys($user));
            $user = reset($user);
            $this->userName = $user['userName'];
            $this->email = $user['email'];
            $this->password = $user['password'];
        }

        return $this;

    }

    public function fetchUserById(string $id){
        $user = $this->reference($id)
            ->getValue();

        if(empty($user)){
            return null;
        }

        $this->id = $id;
        $this->email = $user['email'];
        $this->userName = $user['userName'];
        $this->password = $user['password'];
        $this->firstName = $user['firstName'];
        $this->lastName = $user['lastName'];

        return $this;
    }

}
