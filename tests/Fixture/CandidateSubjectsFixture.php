<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CandidateSubjectsFixture
 *
 */
class CandidateSubjectsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'candidates_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'subjects_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'candidates_id' => ['type' => 'index', 'columns' => ['candidates_id'], 'length' => []],
            'subjects_id' => ['type' => 'index', 'columns' => ['subjects_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'candidate_subjects_ibfk_1' => ['type' => 'foreign', 'columns' => ['candidates_id'], 'references' => ['candidates', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'candidate_subjects_ibfk_2' => ['type' => 'foreign', 'columns' => ['subjects_id'], 'references' => ['subjects', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'candidates_id' => 1,
                'subjects_id' => 1
            ],
        ];
        parent::init();
    }
}
