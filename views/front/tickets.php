<?php
    $tkt = new MED_Tickets();
    $tickets = $tkt->list_tickets(get_current_user_id());
?>

<div class="container-lg">

    <div class="Dashboard-page">
        <div class="Tickets">
            <ul class="Ticket-header">
                <li class="col-10 col-md-3">Issue</li>
                <li class="col-2 d-none d-md-block">State</li>
                <li class="col-1 d-none d-md-block">Department</li>
                <li class="col-3 d-none d-md-block">Ticket Number</li>
                <li class="col-3 d-none d-md-block">Postage Date</li>
            </ul>
            <ul class="Ticket-body">
                <?php foreach ($tickets as $ticket): ?>
                    <div>
                        <a data-bs-toggle="collapse" href="#t<?= $ticket->ID ?>" role="button">
                            <i class="fa fa-angle-right "></i>
                        </a>
                        <ul >
                            <li class="col-md-3 col"><?= $ticket->issue ?></li>
                            <li class="col-2 d-none d-md-block"><?= $ticket->state ?></li>
                            <li class="col-1 d-none d-md-block"><?= $ticket->department ?></li>
                            <li class="col-3 d-none d-md-block"><button class="btn btn-primary rounded-2 px-2 py-0 med-response"
                                                                        data-info='<?= json_encode(["id" => $ticket->ID, "current" => get_current_user_id(), "tktNum" => $ticket->tkt_number]) ?>'>&#9993;</button></li>
                            <li class="col-3 d-none d-md-block"><?= $ticket->CREATED_AT ?></li>
                            <li class="col-2 d-block d-md-none">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa fa-info"></i>
                                </button>
                            </li>

                        </ul>
                        <div class="description collapse" id="t<?= $ticket->ID ?>">
                            <span>Description :</span>
                            <p><?= $ticket->description ?></p>
                        </div>


                    </div>
                <?php endforeach; ?>


            </ul>


        </div>
    </div>
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
                    <button data-info='ww' type="submit" class="btn btn-primary">send</button>
                </form>
            </div>
        </div>
    </div>
</div>