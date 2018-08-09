<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DisqualifiedCandidateSubjectsFixture
 *
 */
class DisqualifiedCandidateSubjectsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'subjects_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'disqualified_candidates_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'disqualified_candidates_id' => ['type' => 'index', 'columns' => ['disqualified_candidates_id'], 'length' => []],
            'subjects_id' => ['type' => 'index', 'columns' => ['subjects_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'disqualified_candidate_subjects_ibfk_1' => ['type' => 'foreign', 'columns' => ['disqualified_candidates_id'], 'references' => ['disqualified_candidates', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'disqualified_candidate_subjects_ibfk_2' => ['type' => 'foreign', 'columns' => ['subjects_id'], 'references' => ['subjects', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
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
                'subjects_id' => 1,
                'disqualified_candidates_id' => 1
            ],
        ];
        parent::init();
    }
}
