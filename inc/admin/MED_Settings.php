<?php
if (class_exists('CSF')) {

    $prefix = 'MED_TKT_SETTINGS';

    CSF::createOptions($prefix, array(
        'menu_title' => 'تنظیمات مد ایلتس تیکت',
        'menu_slug' => 'med-tkt-settings',
        'framework_title' => 'تنظیمات مد ایلتس تیکت',
        'menu_hidden' => true
    ));

    CSF::createSection($prefix, array(
        'title' => 'تنظیمات',
        'fields' => array(
            array(
                'id' => 'med-department-list',
                'type' => 'repeater',
                'title' => 'لیست دپارتمان ها',
                'fields' => array(
                    array(
                        'id' => 'name',
                        'type' => 'text',
                        'title' => 'نام پارتمان'
                    ),
                ),
            ),
            array(
                'id' => 'med-related-service-list',
                'type' => 'repeater',
                'title' => 'لیست سرویس ها',
                'fields' => array(
                    array(
                        'id' => 'name',
                        'type' => 'text',
                        'title' => 'نام سرویس'
                    ),
                ),
            ),
            array(
                'id' => 'med-priority-list',
                'type' => 'repeater',
                'title' => 'لیست اولویت ها',
                'fields' => array(
                    array(
                        'id' => 'name',
                        'type' => 'text',
                        'title' => 'نام اولویت'
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($prefix, array(
        'title' => 'زبان برنامه',
        'fields' => array(
            array(
                'id' => 'med-custom-language-state',
                'type' => 'switcher',
                'title' => 'زبان منتخب',
                'label' => 'آیا فعال باشد؟'
            ),
            array(
                'id'        => 'med-custom-language',
                'type'      => 'fieldset',
                'title'     => 'language',
                'dependency' => array('med-custom-language-state', '==', 'true'),
                'fields'    => array(
                    array(
                        'id'    => 'Issue',
                        'type'  => 'text',
                        'title' => 'Issue',
                        'default' => 'موضوع'
                    ),
                    array(
                        'id'    => 'State',
                        'type'  => 'text',
                        'title' => 'State',
                        'default' => 'وضعیت'
                    ),
                    array(
                        'id'    => 'Department',
                        'type'  => 'text',
                        'title' => 'Department',
                        'default' => 'دپارتمان'
                    ),
                    array(
                        'id'    => 'Priority',
                        'type'  => 'text',
                        'title' => 'Priority',
                        'default' => 'اولویت'
                    ),
                    array(
                        'id'    => 'Related-Service',
                        'type'  => 'text',
                        'title' => 'Related service',
                        'default' => 'سرویس های مرتبط'
                    ),
                    array(
                        'id'    => 'Ticket-Number',
                        'type'  => 'text',
                        'title' => 'Ticket number',
                        'default' => 'شماره تیکت'
                    ),
                    array(
                        'id'    => 'Postage-Date',
                        'type'  => 'text',
                        'title' => 'Postage date',
                        'default' => 'تاریخ ارسال'
                    ),
                    array(
                        'id'    => 'Description',
                        'type'  => 'text',
                        'title' => 'Description',
                        'default' => 'توضیحات'
                    ),
                    array(
                        'id'    => 'Send-btn',
                        'type'  => 'text',
                        'title' => 'Send button',
                        'default' => 'ارسال'
                    ),
                    array(
                        'id'    => 'Read',
                        'type'  => 'text',
                        'title' => 'Read Status',
                        'default' => 'خوانده شده'
                    ),
                    array(
                        'id'    => 'UnRead',
                        'type'  => 'text',
                        'title' => 'Unread Status',
                        'default' => 'خوانده نشده'
                    ),
                    array(
                        'id'    => 'Actions',
                        'type'  => 'text',
                        'title' => 'Actions',
                        'default' => 'عملیات ها'
                    ),
                ),
            ),

        )
    ));
}