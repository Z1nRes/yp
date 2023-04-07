<div class="d-flex no-wrap">


    <div style="max-width: 300px;" class="p-5">
        <form method="post">  
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <div id="errors" class="text-danger">
                    <?= $message ?? ''; ?>
            </div>
            <h1 class="h3 mb-3 fw-normal">Подразделение</h1>

            <div class="form-floating mt-2 mb-2">
                <input type="text" class="form-control" id="floatingInput" placeholder="Название" name="name">
                <label for="floatingInput">Название</label>
            </div>

            <select class="form-select" name="id_view">
                <option value="0" selected>Вид</option>
                <?php
                    foreach ($views as $view) {
                        echo '<option value="' . $view->id_view . '">' . $view->name . '</option>';
                    }
                ?>
            </select>

            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Добавить</button>
        </form>
    </div>
    
    <div class="p-5">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название подразделения</th>
                    <th scope="col">Вид</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($divisions as $division) {
                        echo '<tr>' . 
                            '<th scope="row">' . $division->id_division . '</th>' .
                            '<td>' . $division->name . '</td>' .
                            '<td scope="row">' . $division->divisions_view->name . '</td>';
                    }
                ?>
            </tbody>
        </table>
    </div>
    
</div>
