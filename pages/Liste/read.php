<?php
session_start();
include('../../includes/header.php');
include('../../includes/sidebar.php');
include('../../includes/navbar.php');

?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ordinateurs
                <small>

                </small>
            </h1>
        </div>
        <div class="table-responsive">
            <table id="ordinateur_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Ref</th>
                    <th>Type</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Système</th>
                    <th>Processeur</th>
                    <th>RAM</th>
                    <th>Session</th>
                    <th>MdP</th>
                    <th>IP</th>
                    <th>Office 365</th>
                    <th>Logiciel</th>
                    <th>État</th>
                    <th>Salle</th>
                </tr>
                </thead>
            </table>
        </div>
        <hr>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Écrans
                <small>

                </small>
            </h1>
        </div>
        <div class="table-responsive">
            <table id="ecran_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Ref</th>
                    <th>Type</th>
                    <th>Modèle</th>
                    <th>HDMI</th>
                    <th>VGA</th>
                    <th>DVI</th>
                    <th>Port</th>
                    <th>Salle</th>
                </tr>
                </thead>
            </table>
        </div>
        <hr>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Claviers
                <small>

                </small>
            </h1>
        </div>
        <div class="table-responsive">
            <table id="clavier_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Ref</th>
                    <th>Type</th>
                    <th>Marque</th>
                    <th>Salle</th>
                </tr>
                </thead>
            </table>
        </div>
        <hr>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Souris
                <small>

                </small>
            </h1>
        </div>
        <div class="table-responsive">
            <table id="souris_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Ref</th>
                    <th>Type</th>
                    <th>Marque</th>
                    <th>Salle</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <script type="text/javascript" language="javascript" >
        //Ordinateur
        $(document).ready(function(){

            load_data();

            function load_data(is_ordinateur)
            {
                var dataTable = $('#ordinateur_data').DataTable({
                    "processing":true,
                    "serverSide":true,
                    "order":[],
                    "ajax":{
                        url:"http://localhost:8888/Admin/pages/ordinateur/fetch.php",
                        type:"POST",
                        data:{is_ordinateur:is_ordinateur}
                    },
                    "columnDefs":[
                        {
                            "targets":[2],
                            "orderable":false,
                        },
                    ],
                });
            }

            $(document).on('change', '#salle', function(){
                var ordinateur = $(this).val();
                $('#ordinateur_data').DataTable().destroy();
                if(ordinateur != '')
                {
                    load_data(ordinateur);
                }
                else
                {
                    load_data();
                }
            });
        });
        //Fin Ecran
        //Ecran
        $(document).ready(function(){

            load_data();

            function load_data(is_ecran)
            {
                var dataTable = $('#ecran_data').DataTable({
                    "processing":true,
                    "serverSide":true,
                    "order":[],
                    "ajax":{
                        url:"http://localhost:8888/Admin/pages/ecran/fetch.php",
                        type:"POST",
                        data:{is_ecran:is_ecran}
                    },
                    "columnDefs":[
                        {
                            "targets":[2],
                            "orderable":false,
                        },
                    ],
                });
            }

            $(document).on('change', '#salle', function(){
                var ecran = $(this).val();
                $('#ecran_data').DataTable().destroy();
                if(ecran != '')
                {
                    load_data(ecran);
                }
                else
                {
                    load_data();
                }
            });
        });
        //Fin Ecran
        //Clavier
        $(document).ready(function(){

            load_data();

            function load_data(is_clavier)
            {
                var dataTable = $('#clavier_data').DataTable({
                    "processing":true,
                    "serverSide":true,
                    "order":[],
                    "ajax":{
                        url:"http://localhost:8888/Admin/pages/clavier/fetch.php",
                        type:"POST",
                        data:{is_clavier:is_clavier}
                    },
                    "columnDefs":[
                        {
                            "targets":[2],
                            "orderable":false,
                        },
                    ],
                });
            }

            $(document).on('change', '#salle', function(){
                var clavier = $(this).val();
                $('#clavier_data').DataTable().destroy();
                if(clavier != '')
                {
                    load_data(clavier);
                }
                else
                {
                    load_data();
                }
            });
        });
        //Fin Clavier
        //Souris
        $(document).ready(function(){

            load_data();

            function load_data(is_souris)
            {
                var dataTable = $('#souris_data').DataTable({
                    "processing":true,
                    "serverSide":true,
                    "order":[],
                    "ajax":{
                        url:"http://localhost:8888/Admin/pages/souris/fetch.php",
                        type:"POST",
                        data:{is_clavier:is_souris}
                    },
                    "columnDefs":[
                        {
                            "targets":[2],
                            "orderable":false,
                        },
                    ],
                });
            }

            $(document).on('change', '#salle', function(){
                var clavier = $(this).val();
                $('#souris_data').DataTable().destroy();
                if(souris != '')
                {
                    load_data(souris);
                }
                else
                {
                    load_data();
                }
            });
        });
        //Fin Souris
    </script>

<?php
include('../../includes/footer.php');
include('../../includes/scripts.php');
