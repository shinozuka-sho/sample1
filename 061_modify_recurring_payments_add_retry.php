<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Modify_Recurring_Payments_Add_Retry extends CI_Migration
{
    public function up()
    {
        $fields = [
            'is_retried'  => [
                'type'              => 'SMALLINT',
                'default'           => 0,
                'null'              => FALSE
            ],
            'retried_at'  => [
                'type'              => 'TIMESTAMP',
                'null'              => TRUE
            ],
            'retry_is_successful'  => [
                'type'              => 'SMALLINT',
                'default'           => 0
            ],
        ];

        $this->dbforge->add_column('recurring_payments', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('recurring_payments', 'is_retried');
        $this->dbforge->drop_column('recurring_payments', 'retried_at');
        $this->dbforge->drop_column('recurring_payments', 'retry_is_successful');
    }
}
