<div class="d-flex no-wrap">


    <div style="max-width: 300px;" class="p-5">
        <form method="post">  
            <div id="errors" class="text-danger">
                    <?= $message ?? ''; ?>
            </div>
            <h1 class="h3 mb-3 fw-normal">Подразделение</h1>

            <div class="form-floating mt-2">
                <input type="text" class="form-control" id="floatingInput" placeholder="Название" name="name">
                <label for="floatingInput">Название</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Добавить</button>
        </form>
    </div>

    
    <div class="p-5">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название подразделения</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>