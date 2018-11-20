<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CentreExamTypesFixture
 *
 */
class CentreExamTypesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'exam_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'centre_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'exam_type_id_idx' => ['type' => 'index', 'columns' => ['exam_type_id'], 'length' => []],
            'centre_id_idx' => ['type' => 'index', 'columns' => ['centre_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'centre_id' => ['type' => 'foreign', 'columns' => ['centre_id'], 'references' => ['centres', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'exam_type_id' => ['type' => 'foreign', 'columns' => ['exam_type_id'], 'references' => ['exam_types', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'exam_type_id' => 1,
                'centre_id' => 1
            ],
        ];
        parent::init();
    }
}
