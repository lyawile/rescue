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
                'first_name' => 'Administrator',
                'other_name' => 'eServices',
                'surname' => 'NECTA',
                'username' => 'admin',
                'password' => '$2y$10$W72LT5Ss5Vb91eGrCIM9OuQgb1ZXesKau.P1/ncD/9wLqKBF.rxjS',
                'email' => 'eservices@necta.go.tz',
                'mobile' => '0715897436',
                'group_id' => '1',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
