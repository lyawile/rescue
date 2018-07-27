<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('bill_item_candidates')
            ->addColumn('candidates_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('bill_items_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'bill_items_id',
                ]
            )
            ->addIndex(
                [
                    'candidates_id',
                ]
            )
            ->create();

        $this->table('bill_items')
            ->addColumn('detail', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('ammount', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addColumn('equivalent_amount', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addColumn('misc_amount', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addColumn('quantity', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addColumn('unit', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('collections_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('bills_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'bills_id',
                ]
            )
            ->addIndex(
                [
                    'collections_id',
                ]
            )
            ->create();

        $this->table('bills')
            ->addColumn('reference', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => true,
            ])
            ->addColumn('amount', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addColumn('equivalent_amount', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addColumn('misc_amount', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addColumn('expire_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('generated_date', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('payer_idx', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('payer_name', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => true,
            ])
            ->addColumn('payer_mobile', 'string', [
                'default' => null,
                'limit' => 182,
                'null' => false,
            ])
            ->addColumn('payer_email', 'string', [
                'default' => null,
                'limit' => 128,
                'null' => true,
            ])
            ->addColumn('has_reminder', 'integer', [
                'default' => '0',
                'limit' => 1,
                'null' => false,
            ])
            ->addColumn('control_number', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => true,
            ])
            ->create();

        $this->table('candidate_disabilities')
            ->addColumn('candidates_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('disabilities_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'candidates_id',
                ]
            )
            ->addIndex(
                [
                    'disabilities_id',
                ]
            )
            ->create();

        $this->table('candidate_qualifications')
            ->addColumn('centre_number', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addColumn('candidate_number', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addColumn('exam_year', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('experience', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('candidates_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'candidates_id',
                ]
            )
            ->create();

        $this->table('candidate_subjects')
            ->addColumn('candidates_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('subjects_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'candidates_id',
                ]
            )
            ->addIndex(
                [
                    'subjects_id',
                ]
            )
            ->create();

        $this->table('candidates')
            ->addColumn('number', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => false,
            ])
            ->addColumn('other_name', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => false,
            ])
            ->addColumn('surname', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('sex', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => true,
            ])
            ->addColumn('PSLE_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('PSLE_year', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('ID_number', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => true,
            ])
            ->addColumn('date_of_birth', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('guardian_phone', 'string', [
                'default' => null,
                'limit' => 32,
                'null' => true,
            ])
            ->addColumn('is_repeater', 'integer', [
                'default' => '0',
                'limit' => 1,
                'null' => false,
            ])
            ->addColumn('exam_types_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('centres_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'centres_id',
                ]
            )
            ->addIndex(
                [
                    'exam_types_id',
                ]
            )
            ->create();

        $this->table('centres')
            ->addColumn('number', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('ownership', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('detail', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('principal_name', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => true,
            ])
            ->addColumn('principal_phone', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => true,
            ])
            ->addColumn('contact_one', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => true,
            ])
            ->addColumn('contact_two', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => true,
            ])
            ->addColumn('district_distance', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addColumn('centre_type', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('districts_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'districts_id',
                ]
            )
            ->create();

        $this->table('collection_categories')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('gsfcode', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('detail', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->create();

        $this->table('collections')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('start_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('end_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('ammount', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addColumn('exam_types_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('collection_categories_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'collection_categories_id',
                ]
            )
            ->addIndex(
                [
                    'exam_types_id',
                ]
            )
            ->create();

        $this->table('disabilities')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('shortname', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('details', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->create();

        $this->table('disability_disqualified_candidates')
            ->addColumn('disabilities_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('disqualified_candidates_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'disabilities_id',
                ]
            )
            ->addIndex(
                [
                    'disqualified_candidates_id',
                ]
            )
            ->create();

        $this->table('disqualified_candidate_qualifications')
            ->addColumn('centre_number', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addColumn('candidate_number', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addColumn('exam_year', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('experience', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('disqualified_candidates_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'disqualified_candidates_id',
                ]
            )
            ->create();

        $this->table('disqualified_candidate_subjects')
            ->addColumn('subjects_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('disqualified_candidates_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'disqualified_candidates_id',
                ]
            )
            ->addIndex(
                [
                    'subjects_id',
                ]
            )
            ->create();

        $this->table('disqualified_candidates')
            ->addColumn('number', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => false,
            ])
            ->addColumn('other_name', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => false,
            ])
            ->addColumn('surname', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('sex', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => true,
            ])
            ->addColumn('PSLE_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('PSLE_year', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('ID_number', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => true,
            ])
            ->addColumn('date_of_birth', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('guardian_phone', 'string', [
                'default' => null,
                'limit' => 32,
                'null' => true,
            ])
            ->addColumn('is_repeater', 'integer', [
                'default' => '0',
                'limit' => 1,
                'null' => false,
            ])
            ->addColumn('exam_types_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('centres_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'centres_id',
                ]
            )
            ->addIndex(
                [
                    'exam_types_id',
                ]
            )
            ->create();

        $this->table('districts')
            ->addColumn('number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 128,
                'null' => false,
            ])
            ->addColumn('detail', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('regions_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'regions_id',
                ]
            )
            ->create();

        $this->table('exam_types')
            ->addColumn('code', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('short_name', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addIndex(
                [
                    'code',
                ],
                ['unique' => true]
            )
            ->create();

        $this->table('group_district_region_school_users')
            ->addColumn('districts_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('regions_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('groups_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('centres_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'centres_id',
                ]
            )
            ->addIndex(
                [
                    'districts_id',
                ]
            )
            ->addIndex(
                [
                    'groups_id',
                ]
            )
            ->addIndex(
                [
                    'regions_id',
                ]
            )
            ->addIndex(
                [
                    'users_id',
                ]
            )
            ->create();

        $this->table('groups')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->create();

        $this->table('payment_reconciliations')
            ->addColumn('payments_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('recoinciliations_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('transaction_idx', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('payment_reconciliationscol', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('bill_idx', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('provide_name', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('provider_code', 'string', [
                'default' => null,
                'limit' => 32,
                'null' => false,
            ])
            ->addColumn('reconciliation_status_code', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addColumn('reconciliation_detail', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('gepg_receipt', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('control_number', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('paid_amount', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addColumn('currency', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addColumn('transaction_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('credited_account', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('payer_mobile', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('payer_name', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('payer_email', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('remarks', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addIndex(
                [
                    'payments_id',
                ]
            )
            ->addIndex(
                [
                    'recoinciliations_id',
                ]
            )
            ->create();

        $this->table('payments')
            ->addColumn('transaction_idx', 'string', [
                'default' => null,
                'limit' => 128,
                'null' => false,
            ])
            ->addColumn('transaction_date', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addColumn('gepg_receipt', 'string', [
                'default' => null,
                'limit' => 128,
                'null' => false,
            ])
            ->addColumn('control_number', 'string', [
                'default' => null,
                'limit' => 128,
                'null' => false,
            ])
            ->addColumn('bill_amount', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addColumn('paid_amount', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 2,
            ])
            ->addColumn('bill_payment_option', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('currency', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('payment_channel', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('payer_mobile', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('payer_email', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('provider_receipt', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('provider_name', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('credited_account', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('bills_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('is_consumed', 'integer', [
                'default' => '0',
                'limit' => 1,
                'null' => false,
            ])
            ->addIndex(
                [
                    'bills_id',
                ]
            )
            ->create();

        $this->table('practicals')
            ->addColumn('practical_type', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('group_A', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('group_B', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('group_C', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('total', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('subjects_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('centres_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'centres_id',
                ]
            )
            ->addIndex(
                [
                    'subjects_id',
                ]
            )
            ->create();

        $this->table('reconciliations')
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('options', 'integer', [
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('status', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('is_acknowleged', 'integer', [
                'default' => '0',
                'limit' => 1,
                'null' => true,
            ])
            ->create();

        $this->table('regions')
            ->addColumn('number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 32,
                'null' => false,
            ])
            ->addColumn('detail', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->create();

        $this->table('services')
            ->addColumn('link', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => true,
            ])
            ->addColumn('message', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('has_redirect', 'integer', [
                'comment' => '0- only displays message, 1 - redirects to link',
                'default' => '0',
                'limit' => 1,
                'null' => false,
            ])
            ->addColumn('collections_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'collections_id',
                ]
            )
            ->create();

        $this->table('subjects')
            ->addColumn('code', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('short_name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('exam_types_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'exam_types_id',
                ]
            )
            ->create();

        $this->table('users')
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('other_name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('surname', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 128,
                'null' => false,
            ])
            ->addColumn('mobile', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('groups_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'groups_id',
                ]
            )
            ->create();

        $this->table('bill_item_candidates')
            ->addForeignKey(
                'bill_items_id',
                'bill_items',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'candidates_id',
                'candidates',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('bill_items')
            ->addForeignKey(
                'bills_id',
                'bills',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'collections_id',
                'collections',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('candidate_disabilities')
            ->addForeignKey(
                'candidates_id',
                'candidates',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'disabilities_id',
                'disabilities',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('candidate_qualifications')
            ->addForeignKey(
                'candidates_id',
                'candidates',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('candidate_subjects')
            ->addForeignKey(
                'candidates_id',
                'candidates',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'subjects_id',
                'subjects',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('candidates')
            ->addForeignKey(
                'centres_id',
                'centres',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'exam_types_id',
                'exam_types',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('centres')
            ->addForeignKey(
                'districts_id',
                'districts',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('collections')
            ->addForeignKey(
                'collection_categories_id',
                'collection_categories',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'exam_types_id',
                'exam_types',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('disability_disqualified_candidates')
            ->addForeignKey(
                'disabilities_id',
                'disabilities',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'disqualified_candidates_id',
                'disqualified_candidates',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('disqualified_candidate_qualifications')
            ->addForeignKey(
                'disqualified_candidates_id',
                'disqualified_candidates',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('disqualified_candidate_subjects')
            ->addForeignKey(
                'disqualified_candidates_id',
                'disqualified_candidates',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'subjects_id',
                'subjects',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('disqualified_candidates')
            ->addForeignKey(
                'centres_id',
                'centres',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'exam_types_id',
                'exam_types',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('districts')
            ->addForeignKey(
                'regions_id',
                'regions',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('group_district_region_school_users')
            ->addForeignKey(
                'centres_id',
                'centres',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'districts_id',
                'districts',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'groups_id',
                'groups',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'regions_id',
                'regions',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'users_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('payment_reconciliations')
            ->addForeignKey(
                'payments_id',
                'payments',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'recoinciliations_id',
                'reconciliations',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('payments')
            ->addForeignKey(
                'bills_id',
                'bills',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('practicals')
            ->addForeignKey(
                'centres_id',
                'centres',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'subjects_id',
                'subjects',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('services')
            ->addForeignKey(
                'collections_id',
                'collections',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('subjects')
            ->addForeignKey(
                'exam_types_id',
                'exam_types',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('users')
            ->addForeignKey(
                'groups_id',
                'groups',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('bill_item_candidates')
            ->dropForeignKey(
                'bill_items_id'
            )
            ->dropForeignKey(
                'candidates_id'
            )->save();

        $this->table('bill_items')
            ->dropForeignKey(
                'bills_id'
            )
            ->dropForeignKey(
                'collections_id'
            )->save();

        $this->table('candidate_disabilities')
            ->dropForeignKey(
                'candidates_id'
            )
            ->dropForeignKey(
                'disabilities_id'
            )->save();

        $this->table('candidate_qualifications')
            ->dropForeignKey(
                'candidates_id'
            )->save();

        $this->table('candidate_subjects')
            ->dropForeignKey(
                'candidates_id'
            )
            ->dropForeignKey(
                'subjects_id'
            )->save();

        $this->table('candidates')
            ->dropForeignKey(
                'centres_id'
            )
            ->dropForeignKey(
                'exam_types_id'
            )->save();

        $this->table('centres')
            ->dropForeignKey(
                'districts_id'
            )->save();

        $this->table('collections')
            ->dropForeignKey(
                'collection_categories_id'
            )
            ->dropForeignKey(
                'exam_types_id'
            )->save();

        $this->table('disability_disqualified_candidates')
            ->dropForeignKey(
                'disabilities_id'
            )
            ->dropForeignKey(
                'disqualified_candidates_id'
            )->save();

        $this->table('disqualified_candidate_qualifications')
            ->dropForeignKey(
                'disqualified_candidates_id'
            )->save();

        $this->table('disqualified_candidate_subjects')
            ->dropForeignKey(
                'disqualified_candidates_id'
            )
            ->dropForeignKey(
                'subjects_id'
            )->save();

        $this->table('disqualified_candidates')
            ->dropForeignKey(
                'centres_id'
            )
            ->dropForeignKey(
                'exam_types_id'
            )->save();

        $this->table('districts')
            ->dropForeignKey(
                'regions_id'
            )->save();

        $this->table('group_district_region_school_users')
            ->dropForeignKey(
                'centres_id'
            )
            ->dropForeignKey(
                'districts_id'
            )
            ->dropForeignKey(
                'groups_id'
            )
            ->dropForeignKey(
                'regions_id'
            )
            ->dropForeignKey(
                'users_id'
            )->save();

        $this->table('payment_reconciliations')
            ->dropForeignKey(
                'payments_id'
            )
            ->dropForeignKey(
                'recoinciliations_id'
            )->save();

        $this->table('payments')
            ->dropForeignKey(
                'bills_id'
            )->save();

        $this->table('practicals')
            ->dropForeignKey(
                'centres_id'
            )
            ->dropForeignKey(
                'subjects_id'
            )->save();

        $this->table('services')
            ->dropForeignKey(
                'collections_id'
            )->save();

        $this->table('subjects')
            ->dropForeignKey(
                'exam_types_id'
            )->save();

        $this->table('users')
            ->dropForeignKey(
                'groups_id'
            )->save();

        $this->table('bill_item_candidates')->drop()->save();
        $this->table('bill_items')->drop()->save();
        $this->table('bills')->drop()->save();
        $this->table('candidate_disabilities')->drop()->save();
        $this->table('candidate_qualifications')->drop()->save();
        $this->table('candidate_subjects')->drop()->save();
        $this->table('candidates')->drop()->save();
        $this->table('centres')->drop()->save();
        $this->table('collection_categories')->drop()->save();
        $this->table('collections')->drop()->save();
        $this->table('disabilities')->drop()->save();
        $this->table('disability_disqualified_candidates')->drop()->save();
        $this->table('disqualified_candidate_qualifications')->drop()->save();
        $this->table('disqualified_candidate_subjects')->drop()->save();
        $this->table('disqualified_candidates')->drop()->save();
        $this->table('districts')->drop()->save();
        $this->table('exam_types')->drop()->save();
        $this->table('group_district_region_school_users')->drop()->save();
        $this->table('groups')->drop()->save();
        $this->table('payment_reconciliations')->drop()->save();
        $this->table('payments')->drop()->save();
        $this->table('practicals')->drop()->save();
        $this->table('reconciliations')->drop()->save();
        $this->table('regions')->drop()->save();
        $this->table('services')->drop()->save();
        $this->table('subjects')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
