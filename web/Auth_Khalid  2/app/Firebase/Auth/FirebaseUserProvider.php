<?php


namespace App\Firebase\Auth;


use App\Firebase\Student;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Hash;

class FirebaseUserProvider implements UserProvider
{

    private $user;

    public function __construct(FirebaseUser $user)
    {
        $this->user = $user;
    }

    /**
     * @inheritDoc
     */
    public function retrieveById($identifier)
    {
        return (new Student())->fetchUserById($identifier);
    }

    /**
     * @inheritDoc
     */
    public function retrieveByToken($identifier, $token){}

    /**
     * @inheritDoc
     */
    public function updateRememberToken(Authenticatable $user, $token){}

    /**
     * @inheritDoc
     */
    public function retrieveByCredentials(array $credentials)
    {

        if (empty($credentials)) {
            return null;
        }

        $user = $this->user->fetchUserByCredentials(['username' => $credentials['username']]);

        return $user;
    }

    /**
     * @inheritDoc
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $is_hashed = preg_match('/^\$\dy\$[\d]{1,2}\$/i', $user->getAuthPassword()) === 1;

        if( ! $is_hashed ){
            // Looks like it is not hashed.
            $passwordHash = Hash::make( $user->getAuthPassword() );
            Student::reference("{$user->id}/password")->set($passwordHash);
        }else{
            $passwordHash = $user->getAuthPassword();
        }

        return Hash::check($credentials['password'], $passwordHash);
    }
}
