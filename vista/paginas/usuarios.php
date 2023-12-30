<div class="content-wrapper" style="min-height: 717px">

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
                <div class="col-12">
                    <div class="card card-info card-outline">
                        
                        <div class="card-header">
                            <button type="button" class="btn btn-success crear-perfil" data-toggle="modal" data-target="#modal-crear-perfil">
                                Crear Nuevo Usuario
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
                                        <th>Foto</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Hotel Portobelo</td>
                                        <td>Portobelo</td>
                                        <td>Administrador</td>
                                        <td><button class="btn btn-info btn-sm">Activo</button></td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-warning btn-sm">
                                                    <i class="fas fa-pencil-alt text-white"></i>
                                                </button>

                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt text-white"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
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

</div>