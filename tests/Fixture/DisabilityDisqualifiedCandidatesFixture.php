<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DisabilityDisqualifiedCandidatesFixture
 *
 */
class DisabilityDisqualifiedCandidatesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'disabilities_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'disqualified_candidates_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'disabilities_id' => ['type' => 'index', 'columns' => ['disabilities_id'], 'length' => []],
            'disqualified_candidates_id' => ['type' => 'index', 'columns' => ['disqualified_candidates_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'disability_disqualified_candidates_ibfk_1' => ['type' => 'foreign', 'columns' => ['disabilities_id'], 'references' => ['disabilities', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'disability_disqualified_candidates_ibfk_2' => ['type' => 'foreign', 'columns' => ['disqualified_candidates_id'], 'references' => ['disqualified_candidates', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'disabilities_id' => 1,
                'disqualified_candidates_id' => 1
            ],
        ];
        parent::init();
    }
}
