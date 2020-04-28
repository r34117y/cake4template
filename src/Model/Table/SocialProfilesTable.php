<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Database\Type\SerializeType;
use Cake\Database\Schema\TableSchema;
use Cake\Database\Schema\TableSchemaInterface;
use Cake\Database\Type;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SocialProfiles Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\SocialProfile newEmptyEntity()
 * @method \App\Model\Entity\SocialProfile newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SocialProfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SocialProfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\SocialProfile findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SocialProfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SocialProfile[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SocialProfile|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SocialProfile saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SocialProfile[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SocialProfile[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SocialProfile[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SocialProfile[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SocialProfilesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('social_profiles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
        Type::map('serialize', SerializeType::class);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('provider')
            ->maxLength('provider', 255)
            ->requirePresence('provider', 'create')
            ->notEmptyString('provider');

        $validator
            ->requirePresence('access_token', 'create')
            ->notEmptyString('access_token');

        $validator
            ->scalar('identifier')
            ->maxLength('identifier', 255)
            ->requirePresence('identifier', 'create')
            ->notEmptyString('identifier');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->allowEmptyString('username');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->allowEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('full_name')
            ->maxLength('full_name', 255)
            ->allowEmptyString('full_name');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('birth_date')
            ->maxLength('birth_date', 255)
            ->allowEmptyString('birth_date');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 255)
            ->allowEmptyString('gender');

        $validator
            ->scalar('picture_url')
            ->maxLength('picture_url', 255)
            ->allowEmptyString('picture_url');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
