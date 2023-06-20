<div class="container-lg">

    <div class="Dashboard-page">
        <form id="newTicket" class="p-5 d-flex flex-column gap-3">
            <div class="d-flex gap-2 flex-md-row flex-column">
                <div class="col">
                    <label for="issue" ><?= $lang_state ? $settings["Issue"] : "Issue" ?></label>
                    <input id="issue" type="text">
                </div>
                <div class="col">
                    <label for="department" ><?= $lang_state ? $settings["Department"] : "Department" ?></label>

                    <select id="department" >
                        <?php foreach (MED_settings("med-department-list") as $department): ?>
                            <option value="<?= $department["name"] ?>"><?= $department["name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="d-flex gap-2 flex-md-row flex-column">
                <div class="col">
                    <label for="related-service" ><?= $lang_state ? $settings["Related-Service"] : "Related Service" ?></label>
                    <select id="related-service" >
                        <?php foreach (MED_settings("med-related-service-list") as $service): ?>
                            <option value="<?= $service["name"] ?>"><?= $service["name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <label for="priority" ><?= $lang_state ? $settings["Priority"] : "Priority" ?></label>
                    <select id="priority">
                        <?php foreach (MED_settings("med-priority-list") as $priority): ?>
                            <option value="<?= $priority["name"] ?>"><?= $priority["name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="">
                <input type="hidden" id="med_c" value="<?= get_current_user_id() ?>">
                <label for="description"><?= $lang_state ? $settings["Description"] : "Description" ?></label>
                <textarea id="description" ></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit"><?= $lang_state ? $settings["Send-btn"] : "Send" ?></button>
            </div>

        </form>
    </div>
</div>