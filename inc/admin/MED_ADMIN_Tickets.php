<?php
defined("ABSPATH" || exit());


class MED_ADMIN_Tickets
{

    private $wpdb;
    private $Tickets;
    private $ChatRoom;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->Tickets = $wpdb->prefix . 'med_tickets';
        $this->ChatRoom = $wpdb->prefix . 'med_chatroom';
    }


    public function list_tickets()
    {
        return $this->wpdb->get_results("SELECT * FROM $this->Tickets ORDER BY `CREATED_AT` DESC");
    }

    public function change_ticket_state()
    {

    }


}
