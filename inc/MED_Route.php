<?php
defined("ABSPATH" || exit());


class MED_Route
{

    private $TKT;

    public function __construct()
    {
        $this->TKT = new MED_Tickets();

        add_action('wp_ajax_med_new_ticket', [$this, 'new_ticket']);
        add_action('wp_ajax_med_messages', [$this, 'get_room_messages']);
        add_action('wp_ajax_med_send_message', [$this, 'send_message']);

    }

    public function new_ticket()
    {
        $nonce = $_POST['nonce'];

        if (!wp_verify_nonce($nonce)) {
            die("access denied!!");
        }


        $data = [];
        foreach ($_POST as $key => $value) {
            if ($key != "action" && $key != "nonce") {
                $data[$key] = $value;
            }
        }

        $data_format = ['%s', '%s', '%s', '%s', '%s', '%d', '%s', '%d'];

        $new_ticket = $this->TKT->new_ticket($data, $data_format);


        $room = [
            "tkt_id" => $new_ticket,
            "user_id" => $_POST['creator_id'],
            "message" => $_POST['description']
        ];
        $format = ['%d', '%d', '%s'];

        $this->TKT->send_message($room, $format);


        if ($new_ticket) {
            $this->make_response(['__success' => true]);
        }

    }

    public function send_message()
    {
        $nonce = $_POST['nonce'];

        if (!wp_verify_nonce($nonce)) {
            die("access denied!!");
        }


        $data = [];
        foreach ($_POST as $key => $value) {
            if ($key != "action" && $key != "nonce") {
                $data[$key] = $value;
            }
        }

        $data_format = ['%d', '%d', '%s'];

        $new_message = $this->TKT->send_message($data, $data_format);

        if ($new_message) {
            $this->make_response(['__success' => true]);
        }
    }

    public function get_room_messages()
    {
        $nonce = $_POST['nonce'];

        if (!wp_verify_nonce($nonce)) {
            die("access denied!!");
        }

        $messages = $this->TKT->get_messages($_POST['id']);

        if ($messages){
            $this->make_response(["__success" => true, "data" => $messages]);
        }

    }


    public function make_response($res)
    {
        if (is_array($res)) {
            wp_send_json($res);
        } else {
            echo $res;
        }

        wp_die();
    }
}
