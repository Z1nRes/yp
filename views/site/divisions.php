<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>divisions</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
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
</body>
</html>