<?php
session_start();
include('../../includes/header.php');
include('../../includes/sidebar.php');
include('../../includes/navbar.php');
?>

<div class="container-fluid">
    <div class="table-responsive">
        <br />
        <div align="right">
            <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Ajouter</button>
        </div>
        <br /><br />
        <table id="user_data" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th width="10%">Image</th>
                <th width="35%">Pseudo</th>
                <th width="35%">Mot de passe</th>
                <th width="10%">Modifier</th>
                <th width="10%">Supprimer</th>
            </tr>
            </thead>
        </table>

    </div>
</div>

<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-left">Créer un utilisateur</h5>
                    <button type="button" class="close float-right" data-dismiss="modal">X</button>
                </div>
                <div class="modal-body">
                    <label>Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" class="form-control" />
                    <br />
                    <label>Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" />
                    <br />
                    <label>Photo</label>
                    <input type="file" name="user_image" id="user_image" />
                    <span id="user_uploaded_image"></span>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id" />
                    <input type="hidden" name="operation" id="operation" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Enregister" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
        $('#add_button').click(function(){
            $('#user_form')[0].reset();
            $('.modal-title').text("Ajouter un utilisateur");
            $('#action').val("Enregistrer");
            $('#operation').val("Enregistrer");
            $('#user_uploaded_image').html('');
        });

        var dataTable = $('#user_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                url:"fetch.php",
                type:"POST"
            },
            "columnDefs":[
                {
                    "targets":[0, 3, 4],
                    "orderable":false,
                },
            ],

        });

        $(document).on('submit', '#user_form', function(event){
            event.preventDefault();
            var userName = $('#username').val();
            var passWord = $('#password').val();
            var extension = $('#user_image').val().split('.').pop().toLowerCase();
            if(extension != '')
            {
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Invalid Image File");
                    $('#user_image').val('');
                    return false;
                }
            }
            if(userName != '' && passWord != '')
            {
                $.ajax({
                    url:"insert.php",
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        alert(data);
                        $('#user_form')[0].reset();
                        $('#userModal').modal('hide');
                        dataTable.ajax.reload();
                    }
                });
            }
            else
            {
                alert("Both Fields are Required");
            }
        });

        $(document).on('click', '.update', function(){
            var user_id = $(this).attr("id");
            $.ajax({
                url:"fetch_single.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                    $('#userModal').modal('show');
                    $('#username').val(data.username);
                    $('#password').val(data.password);
                    $('.modal-title').text("Mettre à jour");
                    $('#user_id').val(user_id);
                    $('#user_uploaded_image').html(data.user_image);
                    $('#action').val("Valider");
                    $('#operation').val("Valider");
                }
            })
        });

        $(document).on('click', '.delete', function(){
            var user_id = $(this).attr("id");
            if(confirm("Are you sure you want to delete this?"))
            {
                $.ajax({
                    url:"delete.php",
                    method:"POST",
                    data:{user_id:user_id},
                    success:function(data)
                    {
                        alert(data);
                        dataTable.ajax.reload();
                    }
                });
            }
            else
            {
                return false;
            }
        });
    });
</script>

<?php
include('../../includes/scripts.php');
include('../../includes/footer.php');
?>


