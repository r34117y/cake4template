<?php


class InitSeeder extends \Migrations\AbstractSeed
{
    public function run()
    {
        $this->execute('DELETE FROM users_roles');
        $this->execute('DELETE FROM users');
        $this->execute('DELETE FROM roles');

        $hasher = new \Cake\Auth\DefaultPasswordHasher();

        $users = [
            [
                'id' => 1,
                'email' => 'user@x-one.pl',
                'firstname' => 'Jan',
                'lastname' => 'Userowski',
                'password' => $hasher->hash('alamakota'),
            ],
            [
                'id' => 2,
                'email' => 'admin@x-one.pl',
                'firstname' => 'Maciej',
                'lastname' => 'Adminowski',
                'password' => $hasher->hash('alamakota'),
            ],
        ];

        $this->insert('users', $users);

        $roles = [
            ['id' => 1, 'name' => 'Użytkownik'],
            ['id' => 2, 'name' => 'Administrator'],
        ];

        $this->insert('roles', $roles);

        $ur = [
            ['user_id' => 1, 'role_id' => 1],
            ['user_id' => 2, 'role_id' => 2],
        ];

        $this->insert('users_roles', $ur);
    }
}
