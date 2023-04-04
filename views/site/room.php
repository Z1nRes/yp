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
                <select class="form-select form-select-sm" style="height: 38px" aria-label=".form-select-sm">
                    <option selected>Выбор по подразделению</option>
                    <option value="1">Корпус-1</option>
                    <option value="2">Корпус-2</option>
                </select>
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
                
                <form method="post" style="min-width: 250px;">
                    <div id="errors" class="text-danger">
                            <?= $message ?? ''; ?>
                    </div>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInput" placeholder="Номер" name="number">
                        <label for="floatingInput">Номер</label>
                    </div>
                    <select class="form-select  mt-2" name="id_view">
                        <option selected>Вид</option>
                        <option value="1">Аудитория</option>
                        <option value="2">Кабинет</option>
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
                        <option selected>Подразделение</option>
                        <option value="1">Корпус-1</option>
                        <option value="2">Корпус-2</option>
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
                    <h5>Количество - 123</h5>
                </div>
                <form method="post" style="min-width: 250px;">
                    <legend>Подразделения:</legend>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btncheck1">Все</label>

                        <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btncheck2">Корпус-1</label>

                        <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btncheck3">Корпус-2</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Войти</button>
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
                    <h5>Площадь - 50 м^2</h5>
                </div>

                <form method="post" style="min-width: 250px;">
                    <legend>Вид помещения:</legend>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" id="btncheck11" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btncheck11">Все</label>

                        <input type="checkbox" class="btn-check" id="btncheck22" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btncheck22">Аудитория</label>

                        <input type="checkbox" class="btn-check" id="btncheck33" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btncheck33">Кабинет</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Войти</button>
                </form>

            </div>
        </div>
    </div>
</div>
