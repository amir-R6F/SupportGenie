<?php
defined("ABSPATH" || exit());


class MED_Tickets
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

    public function new_message($data, $data_format)
    {
        return $this->wpdb->insert($this->ChatRoom, $data, $data_format);
    }

    public function new_ticket($data, $data_format)
    {
        $this->wpdb->insert($this->Tickets, $data, $data_format);
        return $this->wpdb->insert_id;
    }

    public function get_ticket($id)
    {
        return $this->wpdb->get_row("SELECT * FROM $this->Tickets WHERE `ID` = $id");
    }

    public function list_tickets($id)
    {
        return $this->wpdb->get_results("SELECT * FROM $this->Tickets WHERE `creator_id` = $id ORDER BY `CREATED_AT` DESC");
    }

    public function send_message($data, $data_format)
    {
        return $this->wpdb->insert($this->ChatRoom, $data, $data_format);
    }

    public function get_messages($id)
    {
        return $this->wpdb->get_results("SELECT * FROM $this->ChatRoom WHERE `tkt_id` = $id ORDER BY `CREATED_AT`");
    }

    public function change_ticket_state($condition)
    {

    }
}
