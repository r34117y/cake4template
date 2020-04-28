<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Facebook\GraphNodes\GraphUser;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsToMany $Roles
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Roles', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'role_id',
            'joinTable' => 'users_roles',
        ]);

        $this->hasMany('SocialProfiles');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 255)
            ->allowEmptyString('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 255)
            ->allowEmptyString('lastname');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    public function findUsers(Query $query, array $options): Query
    {
        return $query->matching('Roles', function (Query $q) {
            return $q->where(['Roles.id' => User::ROLE_USER]);
        })->contain(['Roles', 'SocialProfiles']);
    }

    public function findAdmins(Query $query, array $options): Query
    {
        return $query->matching('Roles', function (Query $q) {
            return $q->where(['Roles.id' => User::ROLE_ADMIN]);
        })->contain(['Roles', 'SocialProfiles']);
    }

    public function findGoogle(Query $query, array $options)
    {
        $googleUser = $options['google'] ?? false;
        if (! $googleUser) {
            throw new \Exception('Brak użytkownika Google');
        }
        return $query
            ->find('users')
            ->andWhere(['Users.email' => $googleUser['email']])
            ->matching('SocialProfiles', function (Query $q) use ($googleUser) {
                return $q->where([
                    'provider' => 'google',
                    'identifier' => $googleUser['id']
                ]);
            });
    }

    public function findFacebook(Query $query, array $options)
    {
        $facebookUser = $options['facebook'] ?? false;
        if (! $facebookUser instanceof GraphUser) {
            throw new \Exception('Brak użytkownika Facebook');
        }
        return $query
            ->find('users')
            ->andWhere(['Users.email' => $facebookUser->getEmail()])
            ->matching('SocialProfiles', function (Query $q) use ($facebookUser) {
                return $q->where([
                    'provider' => 'facebook',
                    'identifier' => $facebookUser->getId()
                ]);
            });
    }
}
