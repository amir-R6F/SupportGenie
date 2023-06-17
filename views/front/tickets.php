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
                            <li class="col-3 d-none d-md-block"><?= $ticket->tkt_number  ?></li>
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