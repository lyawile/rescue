<?php
use Migrations\AbstractSeed;

/**
 * Disabilities seed.
 */
class DisabilitiesSeed extends AbstractSeed
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
                'name' => 'Blind',
                'shortname' => 'BL',
                'details' => NULL,
            ],
            [
                'id' => '2',
                'name' => 'Low Vision',
                'shortname' => 'LV',
                'details' => NULL,
            ],
            [
                'id' => '3',
                'name' => 'Hearing Impairment',
                'shortname' => 'HI',
                'details' => NULL,
            ],
            [
                'id' => '4',
                'name' => 'Intellectual Impairment',
                'shortname' => 'II',
                'details' => NULL,
            ],
        ];

        $table = $this->table('disabilities');
        $table->insert($data)->save();
    }
}
