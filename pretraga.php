<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/zanr.php";
include "server/domain/film.php";

$zanrovi=Zanr::vratiSve($mysqli);

?>

<html>

<head>

    <?php
        include('head.php');
    ?>

    <title>Pretraga filmova</title>

    <script>
        function find() {

            var pretraga = $("#zanr").val();
            $.ajax({
                url: "server/pretraga.php",
                data: "id_zanra=" + pretraga,
                success: function (result) {
                    $('#output').html(result);
                },

            });

        }
    </script>
</head>

<body>
    

    <?php
        include('header.php');
    ?>

    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
        </div>
    </div>
    <div id="find-form" class="row form-container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="" method="POST" role="form">
                <div class="form-group">
                    <label for="zanr">Zanr filma:</label>
                    <div class="d-flex">
                        <select class="form-control" name="zanr" id="zanr">
                            <?php foreach($zanrovi as $v): ?>
                            <option value="<?php echo $v->id_zanra;?>">
                                <?php echo $v->naziv_zanra;?>
                            </option>
                            <?php endforeach; ?>
                        </select>

                        <button type="button" id="btn_find" name="pronadji" class="btn-round-custom"
                            onclick="find()">Pronađi</button>
                    </div>

                </div>

            </form>
            <div id="output">

            </div>

        </div>
        <div class="col-md-2"></div>
    </div>


</body>


</html>