<div class="container-lg">

    <div class="Dashboard-page">
        <form id="newTicket" class="p-5 d-flex flex-column gap-3">
            <div class="d-flex gap-2 flex-md-row flex-column">
                <div class="col">
                    <label for="issue" >issue</label>
                    <input id="issue" type="text">
                </div>
                <div class="col">
                    <label for="department" >department</label>
                    <select id="department" >
                        <option value="1">sm</option>
                        <option value="2">md</option>
                        <option value="3">lg</option>
                    </select>
                </div>
            </div>
            <div class="d-flex gap-2 flex-md-row flex-column">
                <div class="col">
                    <label for="related-service" >related service</label>
                    <select id="related-service" >
                        <option value="1">sm</option>
                        <option value="2">md</option>
                        <option value="3">lg</option>
                    </select>
                </div>
                <div class="col">
                    <label for="priority" >priority</label>
                    <select id="priority">
                        <option value="1">sm</option>
                        <option value="2">md</option>
                        <option value="3">lg</option>
                    </select>
                </div>
            </div>
            <div class="">
                <input type="hidden" id="med_c" value="<?= get_current_user_id() ?>">
                <label for="description">Description</label>
                <textarea id="description" ></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit">Send</button>
            </div>

        </form>
    </div>
</div>