    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="category">
      <div class="container h-100">
        <div class="blog-banner">
          <div class="text-center">
            <h1>Авторизация</h1>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Авторизация
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ end banner area ================= -->

    <!--================Login Box Area =================-->
    <section class="login_box_area section-margin">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="login_box_img">
              <div class="hover">
                <h4>Впервые на нашем сайте?</h4>
                <p>
                  Воспользуйтесь всеми преимуществами регистрации на нашем сайте!
                </p>
                <a class="button button-account" href="/register">Зарегистрироваться</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="login_form_inner">
              <h3>Войти в личный кабинет</h3>
              <form class="row login_form" onsubmit="sendForm(this); return false;">
                <div class="col-md-12 form-group">
                  <input type="email" class="form-control" name="email" require placeholder="Email адрес" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email адрес'" />
                </div>
                <div class="col-md-12 form-group">
                  <input type="password" class="form-control" name="pass" require placeholder="Введите свой пароль" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите свой пароль'" />
                </div>
                <div class="col-md-12 form-group">
                  <div class="creat_account">
                    <input type="checkbox" id="f-option2" name="selector" />
                    <label for="f-option2">Запомнить меня</label>
                  </div>
                </div>
                <p id="info" style="color: red"></p>
                <div class="col-md-12 form-group">
                  <button type="submit" class="button button-login w-100">
                    Войти
                  </button>
                  <a href="#">Забыли пароль?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Login Box Area =================-->

    <!--================ Modal Window start =================-->

    <div class="modal fade" id="modalLogin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              Авторизация прошла успешно
            </h5>
          </div>
          <div class="modal-body">И вы будете направлены на страницу</div>
          <div class="modal-footer">Личного кабинета через 3 сек.</div>
        </div>
      </div>
    </div>
    <!--================ Modal Window end =================-->

    <script>
      async function sendForm(form) {
        let formData = new FormData(form);

        let response = await fetch("authUser", {
          method: "POST",
          body: formData,
        });
        let res = await response.json();

        if (res.authResult == "authorized") {
          $("#modalLogin").modal("show");
          setTimeout(() => {
            location.href = "pages/users/index.html";
          }, 3000);
        } else if (res.authResult == "access danied") {
          info.innerText = "Неправильный логин или пароль!";
        }
      }
    </script>