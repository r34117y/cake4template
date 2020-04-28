<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SocialProfile Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string|resource $access_token
 * @property string $identifier
 * @property string|null $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $full_name
 * @property string|null $email
 * @property string|null $birth_date
 * @property string|null $gender
 * @property string|null $picture_url
 * @property bool $email_verified
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\User $user
 */
class SocialProfile extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
