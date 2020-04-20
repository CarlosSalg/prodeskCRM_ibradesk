<div class="row p-4" style="background-color: #f4f6f9;">
  <div class="col-md-4 col-sm-12 col-xs-12 " >
    <div class="content-wrapper">

      <div class="login-box">

        <div class="login-logo">
          <a href="https://www.ibradesk.com"><b>Prodesk</b>CRM</a>
        </div>

        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Iniciar una Sesion</p>

            <form method="post">
              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="loginEmail">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="loginPassword"> 
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
              </div>
              <?php 
                $login = new Users();
                $login -> ctrLogin();            
              ?>
            </form>

            <p class="mb-1 mt-3">
              <a href="forgot-password">Olvide mi contraseña</a>
            </p>

          </div>
          
        </div>
      </div>

    </div>
  </div>
</div>