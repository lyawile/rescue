<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('bill_item_candidates')
            ->addColumn('candidate_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('bill_item_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'bill_item_id',
                ]
            )
            ->addIndex(
                [
                    'candidate_id',
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
            ->addColumn('collection_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('bill_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'bill_id',
                ]
            )
            ->addIndex(
                [
                    'collection_id',
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
            ->addColumn('candidate_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('disabilitie_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'candidate_id',
                ]
            )
            ->addIndex(
                [
                    'disabilitie_id',
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
            ->addColumn('candidate_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'candidate_id',
                ]
            )
            ->create();

        $this->table('candidate_subjects')
            ->addColumn('candidate_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('subject_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'candidate_id',
                ]
            )
            ->addIndex(
                [
                    'subject_id',
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
            ->addColumn('exam_type_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('centre_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'centre_id',
                ]
            )
            ->addIndex(
                [
                    'exam_type_id',
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
            ->addColumn('district_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'district_id',
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
            ->addColumn('exam_type_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('collection_categorie_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'collection_categorie_id',
                ]
            )
            ->addIndex(
                [
                    'exam_type_id',
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
            ->addColumn('disabilitie_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('disqualified_candidate_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'disabilitie_id',
                ]
            )
            ->addIndex(
                [
                    'disqualified_candidate_id',
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
            ->addColumn('disqualified_candidate_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'disqualified_candidate_id',
                ]
            )
            ->create();

        $this->table('disqualified_candidate_subjects')
            ->addColumn('subject_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('disqualified_candidate_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'disqualified_candidate_id',
                ]
            )
            ->addIndex(
                [
                    'subject_id',
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
            ->addColumn('exam_type_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('centre_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'centre_id',
                ]
            )
            ->addIndex(
                [
                    'exam_type_id',
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
            ->addColumn('region_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'region_id',
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
            ->addColumn('district_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('region_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('group_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('centre_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'centre_id',
                ]
            )
            ->addIndex(
                [
                    'district_id',
                ]
            )
            ->addIndex(
                [
                    'group_id',
                ]
            )
            ->addIndex(
                [
                    'region_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
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
            ->addColumn('payment_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('recoinciliation_id', 'integer', [
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
                    'payment_id',
                ]
            )
            ->addIndex(
                [
                    'recoinciliation_id',
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
            ->addColumn('bill_id', 'integer', [
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
                    'bill_id',
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
            ->addColumn('subject_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('centre_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'centre_id',
                ]
            )
            ->addIndex(
                [
                    'subject_id',
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
            ->addColumn('collection_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'collection_id',
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
            ->addColumn('exam_type_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'exam_type_id',
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
            ->addColumn('group_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'group_id',
                ]
            )
            ->create();

        $this->table('bill_item_candidates')
            ->addForeignKey(
                'bill_item_id',
                'bill_items',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'candidate_id',
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
                'bill_id',
                'bills',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'collection_id',
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
                'candidate_id',
                'candidates',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'disabilitie_id',
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
                'candidate_id',
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
                'candidate_id',
                'candidates',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'subject_id',
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
                'centre_id',
                'centres',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'exam_type_id',
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
                'district_id',
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
                'collection_categorie_id',
                'collection_categories',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'exam_type_id',
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
                'disabilitie_id',
                'disabilities',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'disqualified_candidate_id',
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
                'disqualified_candidate_id',
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
                'disqualified_candidate_id',
                'disqualified_candidates',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'subject_id',
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
                'centre_id',
                'centres',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'exam_type_id',
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
                'region_id',
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
                'centre_id',
                'centres',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'district_id',
                'districts',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'group_id',
                'groups',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'region_id',
                'regions',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'user_id',
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
                'payment_id',
                'payments',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'recoinciliation_id',
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
                'bill_id',
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
                'centre_id',
                'centres',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'subject_id',
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
                'collection_id',
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
                'exam_type_id',
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
                'group_id',
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
                'bill_item_id'
            )
            ->dropForeignKey(
                'candidate_id'
            )->save();

        $this->table('bill_items')
            ->dropForeignKey(
                'bill_id'
            )
            ->dropForeignKey(
                'collection_id'
            )->save();

        $this->table('candidate_disabilities')
            ->dropForeignKey(
                'candidate_id'
            )
            ->dropForeignKey(
                'disabilitie_id'
            )->save();

        $this->table('candidate_qualifications')
            ->dropForeignKey(
                'candidate_id'
            )->save();

        $this->table('candidate_subjects')
            ->dropForeignKey(
                'candidate_id'
            )
            ->dropForeignKey(
                'subject_id'
            )->save();

        $this->table('candidates')
            ->dropForeignKey(
                'centre_id'
            )
            ->dropForeignKey(
                'exam_type_id'
            )->save();

        $this->table('centres')
            ->dropForeignKey(
                'district_id'
            )->save();

        $this->table('collections')
            ->dropForeignKey(
                'collection_categorie_id'
            )
            ->dropForeignKey(
                'exam_type_id'
            )->save();

        $this->table('disability_disqualified_candidates')
            ->dropForeignKey(
                'disabilitie_id'
            )
            ->dropForeignKey(
                'disqualified_candidate_id'
            )->save();

        $this->table('disqualified_candidate_qualifications')
            ->dropForeignKey(
                'disqualified_candidate_id'
            )->save();

        $this->table('disqualified_candidate_subjects')
            ->dropForeignKey(
                'disqualified_candidate_id'
            )
            ->dropForeignKey(
                'subject_id'
            )->save();

        $this->table('disqualified_candidates')
            ->dropForeignKey(
                'centre_id'
            )
            ->dropForeignKey(
                'exam_type_id'
            )->save();

        $this->table('districts')
            ->dropForeignKey(
                'region_id'
            )->save();

        $this->table('group_district_region_school_users')
            ->dropForeignKey(
                'centre_id'
            )
            ->dropForeignKey(
                'district_id'
            )
            ->dropForeignKey(
                'group_id'
            )
            ->dropForeignKey(
                'region_id'
            )
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('payment_reconciliations')
            ->dropForeignKey(
                'payment_id'
            )
            ->dropForeignKey(
                'recoinciliation_id'
            )->save();

        $this->table('payments')
            ->dropForeignKey(
                'bill_id'
            )->save();

        $this->table('practicals')
            ->dropForeignKey(
                'centre_id'
            )
            ->dropForeignKey(
                'subject_id'
            )->save();

        $this->table('services')
            ->dropForeignKey(
                'collection_id'
            )->save();

        $this->table('subjects')
            ->dropForeignKey(
                'exam_type_id'
            )->save();

        $this->table('users')
            ->dropForeignKey(
                'group_id'
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
