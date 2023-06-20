
<div class="wrap">
    <h1>contactUs : member questions</h1>

    <table class="widefat"  >
        <thead>
        <tr>
            <td><?= $lang_state ? $settings["Issue"] : "Issue" ?></td>
            <td><?= $lang_state ? $settings["Department"] : "Department" ?></td>
            <td><?= $lang_state ? $settings["Related-Service"] : "Related Service" ?></td>
            <td><?= $lang_state ? $settings["Priority"] : "Priority" ?></td>
            <td><?= $lang_state ? $settings["Ticket-Number"] : "Ticket Number" ?></td>
            <td><?= $lang_state ? $settings["Postage-Date"] : "Postage Date" ?></td>
            <td><?= $lang_state ? $settings["State"] : "State" ?></td>
            <td><?= $lang_state ? $settings["Actions"] : "Actions" ?></td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($tickets as $ticket):?>
            <tr >
                <td><?= $ticket->issue ?></td>
                <td><?= $ticket->department ?></td>
                <td><?= $ticket->related_service ?></td>
                <td><?= $ticket->priority ?></td>
                <td><?= $ticket->tkt_number ?></td>
                <td><?= $ticket->CREATED_AT ?></td>
                <td>
                    <?php if ($ticket->state): ?>
                        <span class="dashicons dashicons-update-alt cursor-pointer " data-info='<?= json_encode(["id" => $ticket->ID, "state" => $ticket->state]) ?>'></span>
                        <span class="badge bg-success"><?= $lang_state ? $settings["Read"] : "Read" ?></span>
                    <?php else: ?>
                        <span class="dashicons dashicons-update-alt cursor-pointer " data-info='<?= json_encode(["id" => $ticket->ID, "state" => $ticket->state]) ?>'></span>
                        <span class="badge bg-warning"><?= $lang_state ? $settings["UnRead"] : "Unread" ?></span>
                    <?php endif; ?>

                </td>
                <td>
                    <button class="btn btn-primary rounded-2 px-2 py-0 med-response"
                            data-info='<?= json_encode(["id" => $ticket->ID, "current" => get_current_user_id(), "tktNum" => $ticket->tkt_number]) ?>'>&#9993;</button>

                    <button class="btn btn-danger rounded-2 px-2 py-0 " data-info='<?= $ticket->ID ?>'>&#10006;</button>
                </td>
            </tr>
        <?php
        endforeach;
        ?>

        </tbody>
    </table>
</div>


<div class="modal fade " id="AdminChatRoom" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ticket: <span id="ChatRoom-tkt-num"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex">
                <div class="d-flex flex-column gap-2" id="ChatRoom-messages">

                </div>

            </div>
            <div class="modal-footer">
                <form class="input-group mx-5" id="med-send-message-form">
                    <input type="text" id="med-message-form" class="form-control">
                    <button data-info='' type="submit" class="btn btn-primary"><?= $lang_state ? $settings["Send-btn"] : "Send" ?></button>
                </form>
            </div>
        </div>
    </div>
</div>