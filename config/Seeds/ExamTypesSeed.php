<?php
use Migrations\AbstractSeed;

/**
 * ExamTypes seed.
 */
class ExamTypesSeed extends AbstractSeed
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
                'code' => '1',
                'name' => 'Certificate of Secondary Education Examination',
                'short_name' => 'CSEE',
            ],
            [
                'id' => '2',
                'code' => '2',
                'name' => 'Advanced Certificate of Secondary Education Examination ',
                'short_name' => 'ACSEE',
            ],
            [
                'id' => '3',
                'code' => '6',
                'name' => 'Qualifying Test',
                'short_name' => 'QT',
            ],
            [
                'id' => '4',
                'code' => '10',
                'name' => ' GRADE  A TEACHER\'S CERTIFICATE EXAMINATION',
                'short_name' => 'GATCE',
            ],
            [
                'id' => '5',
                'code' => '12',
                'name' => 'GRADE A TEACHER\'S SPECIAL COURSE CERTIFICATE EXAMINATION',
                'short_name' => 'GATSCCE',
            ],
            [
                'id' => '6',
                'code' => '14',
                'name' => 'DIPLOMA IN SECONDARY EDUCATION EXAMINATION',
                'short_name' => 'DSEE',
            ],
            [
                'id' => '7',
                'code' => '17',
                'name' => 'DIPLOMA IN TECHNICAL EDUCATION EXAMINATION',
                'short_name' => 'DTE',
            ],
            [
                'id' => '8',
                'code' => '18',
                'name' => 'MUKA',
                'short_name' => 'MUKA',
            ],
            [
                'id' => '9',
                'code' => '19',
                'name' => 'FTNA',
                'short_name' => 'FTNA',
            ],
            [
                'id' => '10',
                'code' => '99',
                'name' => 'Non-Examination Collection',
                'short_name' => 'Non-EC',
            ],
        ];

        $table = $this->table('exam_types');
        $table->insert($data)->save();
    }
}
