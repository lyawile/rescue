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
                'id' => '2',
                'first_name' => 'Administrator',
                'other_name' => 'eService',
                'surname' => 'NECTA',
                'username' => 'admin',
                'password' => '$2y$10$kuflZuGTJqrgiZmIi2hAWeUuWqju.aLwugzLCBIA.eIZO5LGv1MV6',
                'email' => 'eservice@necta.go.tz',
                'mobile' => '0715879614',
                'groups_id' => '1',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
