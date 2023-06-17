jQuery(document).ready(($) => {
    $('.med-response').click(function () {
        let info = $(this).data('info');
        let messages;
        $('#AdminChatRoom').modal('show');
        $.ajax({
            type: 'post',
            url: MED_data.ajax_url,
            data: {
                action: 'med_messages',
                nonce: MED_data.nonce,
                id: info.id
            },
            success: function (res) {
                messages = res.data;
            },
            complete: function () {
                let html = '';
                if (messages) {
                    messages.forEach((item) => {

                        html += `
                        <div class=" ${info['current'] == item.user_id ? 'tkt-user-message' : 'tkt-admin-message'}">
                            <p class="m-0">${item['message']}</p>
                        </div>
                    `
                    })
                }
                $("#ChatRoom-messages").empty().append(html);
            }
        })

        $('button[type="submit"]').data('info', {id: info.id, user: info.current})
    })

    $('#med-send-message-form').submit(function (e) {
        event.preventDefault()
        let message = $('#med-message-form');
        let info = $('button[type="submit"]').data('info')
        $.ajax({
            type: 'post',
            url: MED_data.ajax_url,
            data: {
                action: 'med_send_message',
                nonce: MED_data.nonce,
                tkt_id: info.id,
                user_id: info.user,
                message: message.val()

            },
            success: function (res) {
                let html = '';
                    html += `
                        <div class="tkt-user-message">
                            <p class="m-0">${message.val()}</p>
                        </div>
                    `

                $("#ChatRoom-messages").append(html);
                message.val('')
            }
        })

    })
})