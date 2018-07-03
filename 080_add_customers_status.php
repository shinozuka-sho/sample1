<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_customers_status extends CI_Migration
{
    public function up()
    {
        $fields = [
            'status' => [
                'type'              => 'SMALLINT',
                'default'           => 0
            ],
        ];

        $this->dbforge->add_column('customers', $fields);

        $CI =& get_instance();
        $CI->db->query("COMMENT ON COLUMN customers.status IS '0:契約中, 1:休会中, 2:退会済';");

        $CI->db->query("UPDATE customers SET status = 0 ");

    }

    public function down()
    {
        $this->dbforge->drop_column('customers', 'status');
    }
}
