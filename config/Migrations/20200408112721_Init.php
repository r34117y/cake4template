<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Init extends AbstractMigration
{
    public function change()
    {
        $this->table('users')
            ->addColumn('email', 'string')
            // jeśli jest możliwy social login, to nie trzeba hasła
            // w przeciwnym wypadku zmienić na NOT NULL
            ->addColumn('password', 'string', ['null' => true])
            ->addColumn('firstname', 'string', ['null' => true])
            ->addColumn('lastname', 'string', ['null' => true])
            ->addColumn('default_locale', 'string', ['default' => 'pl'])
            ->addTimestamps()
            ->create();

        $this->table('roles')
            ->addColumn('name', 'string')
            ->addTimestamps()
            ->create();

        $this->table('users_roles')
            ->addColumn('user_id', 'integer')
            ->addColumn('role_id', 'integer')
            ->addForeignKey('user_id', 'users')
            ->addForeignKey('role_id', 'roles')
            ->create();

        /**
         * Skopiowane z:
         * @link https://github.com/ADmad/cakephp-social-auth/tree/master/config/Migrations
         */
        $table = $this->table('social_profiles');
        $table->addColumn('user_id', 'integer')
            ->addColumn('provider', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('access_token', 'blob')
            ->addColumn('identifier', 'string', ['limit' => 255])
            ->addColumn('username', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('first_name', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('last_name', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('full_name', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('email', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('birth_date', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('gender', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('picture_url', 'string', ['limit' => 255, 'null' => true])
            // Facebook nie posiada tej opcji
            ->addColumn('email_verified', 'boolean', ['null' => true])
            ->addTimestamps()
            ->addIndex(['user_id'])
            ->addForeignKey('user_id', 'users')
            ->create();
    }
}
