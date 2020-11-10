<?php
session_start();
include('../../includes/header.php');
include('../../includes/sidebar.php');
include('../../includes/navbar.php');

$connect = mysqli_connect("localhost", "root", "root", "agpi_db2");
$query = "SELECT * FROM salle ORDER BY nom ASC";
$result = mysqli_query($connect, $query);
?>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <!---Modal création de salle --->

                <div class="modal fade" id="ajoutsalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter un clavier</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="insert.php" enctype="multipart/form-data" method="POST">

                                <div class="modal-body">
                                    <input type="hidden" name="user_id" value="1">
                                    <input type="hidden" name="action" value="create">

                                    <div class="form-group">
                                        <label> Référence </label>
                                        <input type="text" name="ref" class="form-control" placeholder="référence...">
                                    </div>
                                    <div class="form-group">
                                        <label> Type </label>
                                        <input type="text" name="type" class="form-control" placeholder="type...">
                                    </div>
                                    <div class="form-group">
                                        <label> Marque </label>
                                        <input type="text" name="marque" class="form-control" placeholder="marque...">
                                    </div>
                                    <div class="form-group">
                                        <label>Salle</label>
                                        <select name="salle_id" id="salle" class="form-control">
                                            <option value="">Salle</option>
                                            <?php
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                echo '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label> Disponibilité : </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="dispo" value="oui">
                                            <label class="form-check-label" for="inlineRadio1">Oui</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="dispo" value="non">
                                            <label class="form-check-label" for="inlineRadio1">Non</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!---FIn Modal --->
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Claviers
                        <small>

                        </small>
                    </h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal" data-target="#ajoutsalle"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter un clavier</a>
                </div>

                <div class="table-responsive">
                    <table id="sample_data" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Réf</th>
                            <th>Type</th>
                            <th>Marque</th>
                            <th>Salle</th>
                            <th>Disponibilité</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){

            var dataTable = $('#sample_data').DataTable({
                "processing" : true,
                "serverSide" : true,
                "order" : [],
                "ajax" : {
                    url:"http://localhost:8888/Admin/pages/clavier/fetch.php",
                    type:"POST"
                }
            });

            $('#sample_data').on('draw.dt', function(){
                $('#sample_data').Tabledit({
                    url:'http://localhost:8888/Admin/pages/clavier/action.php',
                    dataType:'json',
                    buttons: {
                        edit: {
                            class: 'btn btn-sm btn-success',
                            html: '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\n' +
                                '  <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>\n' +
                                '</svg>&nbsp;',
                            action: 'edit'
                        },
                        delete: {
                            class: 'btn btn-sm btn-danger',
                            html: '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\n' +
                                '  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>\n' +
                                '  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>\n' +
                                '</svg>&nbsp;',
                            action: 'delete'
                        },
                        save: {
                            class: 'btn btn-sm btn-success',
                            html: 'Save'
                        },
                        confirm: {
                            class: 'btn btn-sm btn-danger',
                            html: 'Confirm'
                        }
                    },
                    columns:{
                        identifier : [0, 'id'],
                        editable:[[1, 'ref'], [2, 'type'], [3, 'marque'], [4, 'salle_Id'], [5, 'dispo']]
                    },
                    restoreButton:false,
                    onSuccess:function(data, textStatus, jqXHR)
                    {
                        if(data.action == 'delete')
                        {
                            $('#' + data.id).remove();
                            $('#sample_data').DataTable().ajax.reload();
                        }
                    }
                });
            });

        });
    </script>

<?php
include('../../includes/footer.php');
include('../../includes/scripts.php');