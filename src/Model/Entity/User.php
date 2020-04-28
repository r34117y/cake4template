<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string|null $firstname
 * @property string|null $lastname
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\Role[] $roles
 * @property \App\Model\Entity\SocialProfile[] $social_profiles
 */
class User extends Entity
{
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;

    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    public function hasGoogleProfile() : bool
    {
        return $this->checkIfUserHasSocialProfile('google');
    }

    public function hasFacebookProfile() : bool
    {
        return $this->checkIfUserHasSocialProfile('facebook');
    }

    protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }

    public function getDisplayName() : string
    {
        if ($this->firstname && $this->lastname) {
            return "{$this->firstname} {$this->lastname}";
        }

        return $this->email;
    }

    private function checkIfUserHasSocialProfile(string $provider) : bool
    {
        foreach ($this->social_profiles as $profile) {
            if ($profile->provider === $provider) {
                return true;
            }
        }
        return false;
    }
}
