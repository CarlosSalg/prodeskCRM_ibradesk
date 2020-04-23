<div class="col-md-4 offset-md-4 mt-md-5 mt-2">
    <section class="content">
        <div class="card card-info">  

            <div class="card-header text-center">
                <h4 class="card-tite"><a href="https://www.ibradesk.com"><b>Prodesk</b>CRM</a></h4>
                
            </div>

            <div class="card-body">

                <div class="login-logo">

                    <img src="views/img/template/logo-lineal-negro.png" alt="logo" class="logo img-fluid" >
                    
                </div>

                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Ingrese sus credenciales por favor</p>

                        <form method="post">

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Email" name="usuario">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password"> 
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-info btn-block">Sign In</button>
                                </div>
                            </div>
                            
                            <?php 
                            $login = new ControladorUsuarios();
                            $login -> ctrLogin();            
                            ?>
                        </form>

                        <p class="mb-1 mt-3">
                            <a href="forgot-password">Olvide mi contraseña</a>
                        </p>

                    </div>
                </div>

            </div>

            <div class="card-footer text-center">
                <p class="text-muted f-12">Propiedad de Ibradesk SA de CV</p>
            </div>

        </div>
    </section>    
 </div> 