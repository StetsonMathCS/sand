<?php


namespace App\Firebase\Auth;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;

class FirebaseGuard implements Guard
{

    /**
     * @var Request
     */
    protected $request;
    /**
     * @var UserProvider
     */
    protected $provider;
    protected $user;

    public function __construct(UserProvider $provider, Request $request)
    {
        $this->request = $request;
        $this->provider = $provider;
        $this->user = NULL;
    }

    /**
     * @inheritDoc
     */
    public function check()
    {
        return ! is_null($this->user());
    }

    /**
     * @inheritDoc
     */
    public function guest()
    {
        return ! $this->check();
    }

    /**
     * @inheritDoc
     */
    public function user()
    {
        if (! is_null($this->user)) {
            return $this->user;
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public function id()
    {
        if ($user = $this->user()) {
            return $this->user()->getAuthIdentifier();
        }
    }

    /**
     * @inheritDoc
     */
    public function validate(array $credentials = [])
    {

        $user = $this->provider->retrieveByCredentials($credentials);

        if (! is_null($user) && $this->provider->validateCredentials($user, $credentials)) {
            $this->setUser($user);

            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritDoc
     */
    public function setUser(Authenticatable $user)
    {
        $this->user = $user;
        return $this;
    }
}
