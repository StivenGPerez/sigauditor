<div class="row noticias hidden-xs">
                    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                            <div class="navbar-header">
                               

                                <section id="slidenoticia" class="carousel slide vertical" data-ride="carousel" data-interval="9000">
                                    <!--<ol class="carousel-indicators">
                                        <li data-target="#slidenoticia" data-slide-to="0" class="active"></li>
                                        <li data-target="#slidenoticia" data-slide-to="1"></li>
                                        <li data-target="#slidenoticia" data-slide-to="2"></li>
                                    </ol>-->

                                    <div class="carousel-inner">
                                        <div class="item active">
                                        <a href="#" class="navbar-link navbar-brand">Informacion Informacion Informacion</a></div>
                                        <div class="item">
                                        <a href="#" class="navbar-link navbar-brand">Informacion Informacion Informacion</a></div>
                                        <div class="item">
                                        <a href="#" class="navbar-link navbar-brand">Informacion Informacion Informacion</a></div>
                                        <div class="item">
                                        <a href="#" class="navbar-link navbar-brand">Informacion Informacion Informacion</a></div>
                                    </div>
                                </section>


                            </div>
                       
                          <?php 
                              if($this->session->userdata('nueva_session')){
                                
                                $session_data = $this->session->userdata('nueva_session');
                               
                          ?>
                           



                              
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong><?php  echo ucwords($session_data['usu_nombre'])." ".ucwords($session_data['usu_apellido']);?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login ancho_usuario">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8"> 
                                        <p class="text-left"><strong><?php  echo ucwords($session_data['usu_nombre'])." ".ucwords($session_data['usu_apellido']); ?></strong></p>
                                        <p class="text-left small"><?php  echo $session_data['usu_email'];?></p>
                                        <p class="text-left">
                                            <a href="#" class="btn btn-primary btn-block btn-sm disabled">Actualizar Datos</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="<?php echo base_url(); ?>index.php/con_usuario/logout" class="btn btn-danger btn-block">Cerrar Sesion</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>




                          <?php }else{  ?>

                        <span class="glyphicon glyphicon-user"></span><a href="#" data-toggle="modal" data-target=".session" class="navbar-link"><span class="texto-blanco">Iniciar Sesión</span></a>
                        <span class="barra_separadora">&nbsp;</span>
                        <span class="glyphicon glyphicon-plus"></span><a href="#" data-toggle="modal" data-target=".registro" class="navbar-link"><span class="texto-blanco">Nuevo Usuario</span></a>
                        <?php } ?>
                        </p>
                    </nav>
                </div>