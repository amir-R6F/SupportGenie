jQuery(document).ready(function($){

    $('#newTicket').submit(function(e){
        event.preventDefault()
        let issue = $('#issue');
        let department = $('#department');
        let related_service = $('#related-service');
        let priority = $('#priority');
        let description = $('#description');
        let user = $('#med_c');

        $.ajax({
            type:'post',
            url: MED_data.ajax_url,
            data: {
                action : 'med_new_ticket',
                nonce : MED_data.nonce,
                issue: issue.val(),
                department: department.find(':selected').val(),
                related_service: related_service.find(':selected').val(),
                priority: priority.find(':selected').val(),
                description: description.val(),
                creator_id: user.val()
            },
            success: function (res) {
                console.log(res)
                Swal.fire({
                    icon: 'success',
                    title: 'موفق',
                    text: 'حذف با موفقیت انجام شد.',
                })
                // location.reload()
            },
            error: function (e) {
                Swal.fire({
                    icon: 'error',
                    title: 'ایوای!',
                    text: 'لطفا مجددا امتحان کنید.',
                })
            }
        })
    })


})