<?php

defined("ABSPATH" || exit());

class MED_Menu extends MED_Base_Menu{

    public function __construct()
    {
        $this->page_title = 'افزونه تیکت پشتیبانی مد ایلتس';
        $this->menu_title = 'تیکت پشتیبانی';
        $this->menu_slug = 'med_tkt_plugin';

        $this->has_sub_menu = true;
        $this->sub_items= [
            "settings" => [
                'page_title'=> 'تنظیمات',
                'menu_title'=> 'تنظیمات',
                'menu_slug'=> 'med-tkt-settings',
                'callback' => 'setting'
            ],
            "newTicket" => [
                'page_title'=> 'تیکت جدید',
                'menu_title'=> 'تیکت جدید',
                'menu_slug'=> 'med-new-ticket',
                'callback' => 'add_ticket'
            ],
            "user_tickets" => [
                'page_title'=> 'تیکت های کاربر',
                'menu_title'=> 'تیکت های کاربر',
                'menu_slug'=> 'med-user-tickets',
                'callback' => 'user_tickets'
            ],
            "admin_tickets" => [
                'page_title'=> 'تیکت ها',
                'menu_title'=> 'تیکت ها',
                'menu_slug'=> 'med-tickets-admin',
                'callback' => 'tickets'
            ],
        ];

        parent::__construct();
    }

    public function page()
    {

    }

    public function tickets()
    {
        $tickets = new MED_ADMIN_Tickets();
        $tickets = $tickets->list_tickets();
        include MED_VIEWS . 'admin/tickets.php';
    }

    public function user_tickets()
    {
        include MED_VIEWS . 'front/tickets.php';
    }

    public function add_ticket()
    {
        include MED_VIEWS . 'front/new-ticket.php';
    }
}
