<!-- Custom styles for this page -->

<!--<link href="../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">-->
<link href="../vendor/DataTables/datatables.min.css" rel="stylesheet">
<style>
    @media (max-width: 758px) {
        .mg-2 {
            padding-left: 2px;
            padding-right: 2px;
        }
    }
</style>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista do murals</h6>
    </div>
    <div class="card-body mg-2">
        <div class="table-responsive">
            <table class="table table-bordered compact hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($noticias); $i += 1) : $noticia = $noticias[$i]; ?>
                    <tr>
                        <td><?php echo $noticia['titulo'] ?></td>
                        <td><?php echo $noticia['created_at'] ?></td>
                        <td>
                            <button class="btn btn-sm" onclick="apagar(<?php echo $noticia['id'] ?>)"
                                    id="<?php echo $noticia['id'] ?>">Apagar
                            </button>
                        </td>
                    </tr>
                <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--<script src="../assets/js/jquery.dataTables.min.js"></script>-->
<script src="../vendor/DataTables/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            "language": {
                "url": "../vendor/DataTables/Portuguese.json"
            }
        });
    });

    function apagar(idx) {
        $.ajax({
            url: "../class/apagar_mural.php",
            type: 'post',
            data: {
                id: idx
            },
            beforeSend: function () {
                $('#' + idx).html("Enviando...");
            }
        })
            .done(function () {
                $('#' + idx).html('Apagado');
            })
            .fail(function (jqXHR, textStatus, msg) {
                alert(msg);
            });
    }
</script>