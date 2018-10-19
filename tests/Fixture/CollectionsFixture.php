<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CollectionsFixture
 *
 */
class CollectionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'start_date' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'end_date' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'ammount' => ['type' => 'decimal', 'length' => 12, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
<<<<<<< HEAD
        'exam_types_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'collection_categories_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_collections_exam_types1_idx' => ['type' => 'index', 'columns' => ['exam_types_id'], 'length' => []],
            'fk_collections_collection_categories1_idx' => ['type' => 'index', 'columns' => ['collection_categories_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_collections_collection_categories1' => ['type' => 'foreign', 'columns' => ['collection_categories_id'], 'references' => ['collection_categories', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'fk_collections_exam_types1' => ['type' => 'foreign', 'columns' => ['exam_types_id'], 'references' => ['exam_types', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
=======
        'exam_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'collection_categorie_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'collection_categorie_id' => ['type' => 'index', 'columns' => ['collection_categorie_id'], 'length' => []],
            'exam_type_id' => ['type' => 'index', 'columns' => ['exam_type_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'collections_ibfk_1' => ['type' => 'foreign', 'columns' => ['collection_categorie_id'], 'references' => ['collection_categories', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'collections_ibfk_2' => ['type' => 'foreign', 'columns' => ['exam_type_id'], 'references' => ['exam_types', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
>>>>>>> 46c60288ea9de37159a95c261b2a1153559036ae
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
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
<<<<<<< HEAD
                'start_date' => '2018-07-26 09:43:30',
                'end_date' => '2018-07-26 09:43:30',
                'ammount' => 1.5,
                'exam_types_id' => 1,
                'collection_categories_id' => 1
=======
                'start_date' => '2018-08-02 07:28:03',
                'end_date' => '2018-08-02 07:28:03',
                'ammount' => 1.5,
                'exam_type_id' => 1,
                'collection_categorie_id' => 1
>>>>>>> 46c60288ea9de37159a95c261b2a1153559036ae
            ],
        ];
        parent::init();
    }
}
