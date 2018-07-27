<?php
use Migrations\AbstractSeed;

/**
 * Regions seed.
 */
class RegionsSeed extends AbstractSeed
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
                'number' => '1',
                'name' => 'ARUSHA',
                'detail' => NULL,
            ],
            [
                'id' => '2',
                'number' => '2',
                'name' => 'DAR ES SALAAM',
                'detail' => NULL,
            ],
            [
                'id' => '3',
                'number' => '3',
                'name' => 'DODOMA',
                'detail' => NULL,
            ],
            [
                'id' => '4',
                'number' => '4',
                'name' => 'IRINGA',
                'detail' => NULL,
            ],
            [
                'id' => '5',
                'number' => '5',
                'name' => 'KAGERA',
                'detail' => NULL,
            ],
            [
                'id' => '6',
                'number' => '6',
                'name' => 'KIGOMA',
                'detail' => NULL,
            ],
            [
                'id' => '7',
                'number' => '7',
                'name' => 'KILIMANJARO',
                'detail' => NULL,
            ],
            [
                'id' => '8',
                'number' => '8',
                'name' => 'LINDI',
                'detail' => NULL,
            ],
            [
                'id' => '9',
                'number' => '9',
                'name' => 'MARA ',
                'detail' => NULL,
            ],
            [
                'id' => '10',
                'number' => '10',
                'name' => 'MBEYA',
                'detail' => NULL,
            ],
            [
                'id' => '11',
                'number' => '11',
                'name' => 'MOROGORO',
                'detail' => NULL,
            ],
            [
                'id' => '12',
                'number' => '12',
                'name' => 'MTWARA',
                'detail' => NULL,
            ],
            [
                'id' => '13',
                'number' => '13',
                'name' => 'MWANZA',
                'detail' => NULL,
            ],
            [
                'id' => '14',
                'number' => '14',
                'name' => 'PWANI',
                'detail' => NULL,
            ],
            [
                'id' => '15',
                'number' => '15',
                'name' => 'RUKWA',
                'detail' => NULL,
            ],
            [
                'id' => '16',
                'number' => '16',
                'name' => 'RUVUMA',
                'detail' => NULL,
            ],
            [
                'id' => '17',
                'number' => '17',
                'name' => 'SHINYANGA',
                'detail' => NULL,
            ],
            [
                'id' => '18',
                'number' => '18',
                'name' => 'SINGIDA',
                'detail' => NULL,
            ],
            [
                'id' => '19',
                'number' => '19',
                'name' => 'TABORA',
                'detail' => NULL,
            ],
            [
                'id' => '20',
                'number' => '20',
                'name' => 'TANGA',
                'detail' => NULL,
            ],
            [
                'id' => '21',
                'number' => '21',
                'name' => 'MANYARA',
                'detail' => NULL,
            ],
            [
                'id' => '22',
                'number' => '22',
                'name' => 'MJINI MAGHARIBI',
                'detail' => NULL,
            ],
            [
                'id' => '23',
                'number' => '23',
                'name' => 'KUSINI PEMBA',
                'detail' => NULL,
            ],
            [
                'id' => '24',
                'number' => '24',
                'name' => 'GEITA',
                'detail' => NULL,
            ],
            [
                'id' => '25',
                'number' => '25',
                'name' => 'KATAVI',
                'detail' => NULL,
            ],
            [
                'id' => '26',
                'number' => '26',
                'name' => 'NJOMBE',
                'detail' => NULL,
            ],
            [
                'id' => '27',
                'number' => '27',
                'name' => 'SIMIYU',
                'detail' => NULL,
            ],
            [
                'id' => '28',
                'number' => '28',
                'name' => 'KASKAZINI UNGUJA',
                'detail' => NULL,
            ],
            [
                'id' => '29',
                'number' => '29',
                'name' => 'KUSINI UNGUJA',
                'detail' => NULL,
            ],
            [
                'id' => '30',
                'number' => '30',
                'name' => 'KASKAZINI PEMBA',
                'detail' => NULL,
            ],
            [
                'id' => '31',
                'number' => '31',
                'name' => 'SONGWE',
                'detail' => NULL,
            ],
        ];

        $table = $this->table('regions');
        $table->insert($data)->save();
    }
}
