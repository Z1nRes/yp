<div>


    <div class="pt-5 ps-5 pe-5 d-flex justify-content-between" >
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postModal">
                Добавить запись
            </button>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#countPLacesModal">
                Подсчёт количества мест
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#squareModal">
                Подсчёт площади
            </button>
            <div class="d-inline-block">
                <form method='post' class="d-flex flex-direction-row align-items-center">
                    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                    <input name="type_form" type="hidden" value="filter"/>
                    <select class="form-select form-select-sm" style="height: 38px" aria-label=".form-select-sm" name="id_division">
                        <option value="0" selected>Выбор по подразделению</option>
                        <?php
                            foreach ($divisions as $division) {
                                echo '<option value="' . $division->id_division . '">' . $division->name . '</option>';
                            }
                        ?>
                    </select>
                    <button class="btn btn-primary ms-2" type="submit">Фильтр</button>
                </form>
            </div>
        </div>
    </div>

    
    <div class="p-5">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Номер помещения</th>
                    <th scope="col">Вид помещения</th>
                    <th scope="col">Площадь помещения(м^2)</th>
                    <th scope="col">Количество посадочных мест</th>
                    <th scope="col">Подразделение</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    foreach ($rooms as $room) {
                        echo '<tr>' . 
                            '<th scope="row">' . $room->id . '</th>' .
                            '<td>' . $room->number . '</td>' .
                            '<td scope="row">' . $room->rooms_view->name . '</td>' .
                            '<td>' . $room->square . '</td>' .
                            '<td scope="row">' . $room->places . '</td>' .
                            '<td>' . $room->division->name . '</td>' .
                            '</tr>';
                    }
                ?>
                
            </tbody>
        </table>
    </div>
    
</div>

<div class="modal fade show" id="postModal" tabindex="-1" aria-labelledby="postModalTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalTitle">Добавить помещение</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form action="/yp/addRoom"  method="post" style="min-width: 250px;">
                    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                    <div id="errors" class="text-danger">
                            <?= $message ?? ''; ?>
                    </div>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInput" placeholder="Номер" name="number">
                        <label for="floatingInput">Номер</label>
                    </div>
                    <select class="form-select  mt-2" name="id_view">
                        <option value="0" selected>Вид</option>
                        <?php
                            foreach ($roomsView as $view) {
                                echo '<option value="' . $view->id_view . '">' . $view->name . '</option>';
                            }
                        ?>
                    </select>
                    <div class="form-floating mt-2">
                        <input type="number" class="form-control" id="floatingInput" placeholder="Площадь" name="square">
                        <label for="floatingInput">Площадь</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="number" class="form-control" id="floatingPassword" placeholder="Количество мест" name="places">
                        <label for="floatingPassword">Количество мест</label>
                    </div>
                    <select class="form-select mt-2" name="id_division">
                        <option value="0" selected>Подразделение</option>
                        <?php
                            foreach ($divisions as $division) {
                                echo '<option value="' . $division->id_division . '">' . $division->name . '</option>';
                            }
                        ?>
                    </select>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Добавить</button>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="countPLacesModal" tabindex="-1" aria-labelledby="countPLacesModalTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="countPLacesModalTitle">Подсчёт мест</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <h5>Количество - <?php echo $summ; ?></h5>
                </div>
                <form method="post" style="min-width: 250px;">
                    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                    <legend>Подразделения:</legend>
                    <input name="type_form" type="hidden" value="countPlaces"/>

                    <div class="btn-group-vertical" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="id_division" id="btnradio0" autocomplete="off" checked value="0">
                        <label class="btn btn-outline-primary" for="btnradio0">Все</label>

                        <?php
                            foreach ($divisions as $division) {
                                echo '<input type="radio" class="btn-check" name="id_division" id="btnradio'. $division->id_division . '" autocomplete="off" value="' . $division->id_division . '">' .
                                '<label class="btn btn-outline-primary" for="btnradio'. $division->id_division . '">'. $division->name . '</label>';
                            }
                        ?>
                    </div>


                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Подсчет</button>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="squareModal" tabindex="-1" aria-labelledby="squareModalTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="squareModalTitle">Подсчёт площади</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div>
                    <h5>Площадь - <?php echo $square; ?></h5>
                </div>

                <form method="post" style="min-width: 250px;">
                    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                    <legend>Вид помещения:</legend>
                    <input name="type_form" type="hidden" value="square"/>
                    <div class="btn-group-vertical" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="id_view" id="btnradio00" autocomplete="off" checked name="id_view" value="0">
                        <label class="btn btn-outline-primary" for="btnradio00">Все</label>

                        <?php
                            foreach ($roomsView as $view) {
                                echo '<input type="radio" class="btn-check" name="id_view" id="btnradio0'. $view->id_view . '" autocomplete="off" value="' . $view->id_view . '">' .
                                '<label class="btn btn-outline-primary" for="btnradio0'. $view->id_view . '">'. $view->name . '</label>';
                            }
                        ?>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Подсчёт</button>
                </form>

            </div>
        </div>
    </div>
</div>
