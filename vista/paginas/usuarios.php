     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Administrador de Usuarios</h1>
                 </div>
             </div>
         </div>
     </section>

     <section class="contend">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-sm-12">
                     <div class="card card-info card-outline">

                         <div class="card-header">

                             <button type="button" class="btn btn-success crear-usuarios" data-toggle="modal" data-target="#modal-crear-usuarios">
                                 crear nuevo usuario
                             </button><br>

                         </div><br>
                         <!-- ./card-header -->

                         <div class="card-body">
                             <table class="table table-bordered table-striped dt-resposive tablaperfil" width="100%">
                                 <thead>
                                     <tr>
                                         <th style="width:10px">Id</th>
                                         <th>Nombre</th>
                                         <th>Usuario</th>                                 
                                         <th>Rol</th>
                                         <th>Foto</th>
                                         <th>Acciones</th>
                                     </tr>
                                 </thead>

                                 <tbody>
                                    <?php
                                        foreach($usuarios as $key => $usr){ 
                                            $item = "id_roles";  
                                            $valor = $usr["rol"];
                                            
                                            $roles = ctrlRoles::ctrMostrarRoles($item, $valor);
                                    ?>
                                    <tr>
                                         <td><?php echo ($key+1) ?></td>
                                         <td><?php echo $usr["nombre"]?></td>
                                         <td><?php echo $usr["usuario"]?></td>
                                         <td><?php echo $roles["nombre_rol"]; ?></td>
                                         <td><img src="<?php echo $usr["foto"]?>" width="70" height="70"></td>
                                         <td>
                                             <div class="btn-group">
                                                 <button class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pencil-square-o text-white"></i>
                                                 </button>

                                                 <button class="btn btn-danger btn-sm">
                                                     <i class="fa fa-trash text-white"></i>
                                                 </button>
                                             </div>
                                         </td>
                                     </tr>
                                    <?php
                                        }
                                    ?> 
                                 </tbody>
                             </table>
                         </div>
                         <!-- /card-body -->

                         <div class="card-footer">

                         </div>
                         <!-- /card-footer -->
                     </div>
                     <!-- /card -->
                 </div>
             </div>
         </div>
     </section>

        <!--=====================================
            Modal Crear usuarios
        ======================================-->
     <div class="modal modal-default fade" id="modal-crear-usuarios">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="alert alert-success alert-dismissible ">Agregar Nuevo Usuario</h4>
                 </div>
                 <form method="post" enctype="multipart/form-data" autocomplete="off">

                     <div class="form-group has-feedback" bis_skin_checked="1">
                         <input type="text" class="form-control" name="nom_usuarios" placeholder="nombre">
                         <span class="glyphicon glyphicon-user form-control-feedback"></span>
                     </div>

                     <div class="form-group has-feedback" bis_skin_checked="1">
                         <input type="text" class="form-control" name="nom_user" placeholder="usuario">
                         <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                     </div>

                     <div class="form-group has-feedback" bis_skin_checked="1">
                         <input type="password" class="form-control" name="pass_user" placeholder="password">
                         <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                     </div>

                     <div class="form-group has-feedback" bis_skin_checked="1">
                         <div class="btn btn-default btn-file" bis_skin_checked="1">
                             <i class="fas fa-paperclip"></i> Adjuntar Imagen de usuarios
                             <input type="file" name="subirImgusuarios">
                         </div>
                         <img class="previsualizarImgusuarios img-fluid py-2" width='200' height='200'>
                         <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                     </div>

                     <div class="form-group has-feedback">
                         <label>rol</label>
                         <select class="form-control" name="rol_user" required>
                            <option value="1">Administrador</option>
                            <option value="2">Vendedor</option>
                         </select>                      
                     </div>             
                     <div class="modal-footer">
                         <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                         <button type="submit" class="btn btn-primary">guardar</button>
                     </div>
                    
                     <?php
                        $guardarusuarios = new ctrlUsuarios();
                        $guardarusuarios->ctrGuardarusuarios();
                    ?>
                 </form>
             </div>
             <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
     </div>