<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CandidateDisabilitiesFixture
 *
 */
class CandidateDisabilitiesFixture extends TestFixture
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
        'disabilities_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'candidates_id' => ['type' => 'index', 'columns' => ['candidates_id'], 'length' => []],
            'disabilities_id' => ['type' => 'index', 'columns' => ['disabilities_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'candidate_disabilities_ibfk_1' => ['type' => 'foreign', 'columns' => ['candidates_id'], 'references' => ['candidates', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'candidate_disabilities_ibfk_2' => ['type' => 'foreign', 'columns' => ['disabilities_id'], 'references' => ['disabilities', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'disabilities_id' => 1
            ],
        ];
        parent::init();
    }
}
