<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'username' => 'admin',
                'password' => '$2y$10$8SeC0hAvFQpBjJCtYw5/VuyFi2WCIaZa7Pbt7N401Y8IVieB09T1W',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
