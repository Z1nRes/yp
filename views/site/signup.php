<?php
if ($_SESSION['role'] === 2):
   ?>

   <div class="text-center d-flex justify-content-center align-items-center" style="height: 80vh">
      <form method="post" style="min-width: 250px;">
         <div id="errors" class="text-danger">
               <?= $message ?? ''; ?>
         </div>
         <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

         <select class="form-select" name="role">
            <option selected>Роль</option>
            <option value="1">Админ</option>
            <option value="2">Суперпользователь</option>
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