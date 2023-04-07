<?php
if ($_SESSION['role'] === 2):
   
   ?>

   <div class="text-center d-flex justify-content-center align-items-center" style="height: 80vh">
      <form method="post" style="min-width: 250px;">
         <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
         <div id="errors" class="text-danger">
               <?= $message ?? ''; ?>
         </div>
         <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

         <select class="form-select" name="id_role">
            <option value="0" selected>Роль</option>
            <?php
            
               foreach ($roles as $role) {
                  echo '<option value="' . $role->id_role . '">' . $role->name . '</option>';
               }

            ?>
         </select>
         <div class="form-floating mt-2">
            <input type="text" class="form-control" id="floatingInput" placeholder="Логин" name="login">
            <label for="floatingInput">Логин</label>
         </div>
         <div class="form-floating mt-2">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Пароль" name="password">
            <label for="floatingPassword">Пароль</label>
         </div>

         <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Войти</button>
      </form>
      
   </div>
<?php 
   else:
      ?>
      <h5>У вас недостаточно прав!</р>
<?php endif; ?>