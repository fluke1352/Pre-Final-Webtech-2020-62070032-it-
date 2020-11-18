<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <title>2EzQuiz</title>
    <style>
        #fluke[mode="first"] {
            display: none;
        }

        #top[mode="first"] {
            display: flex;
        }

        #fluke[mode="sec"] {
            display: flex;
        }

        #top[mode="sec"] {
            display: none;
        }
    </style>

</head>

<body>
    <?php
    $string = file_get_contents("https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json");
    $result = json_decode($string);
    $jso = $result->tracks->items;
    ?>

    <div class="container">
        <div class="row">


            <div class="row" style="width: 100%;">
                <div class="row" id="fluke" style="width: 100%;">
                    <p>ระบุการค้นหา</p>
                </div>
                <div class="row" style="width: 100%;">
                    <div class="col-md-9">
                        <input type="text" style="width: 100%;" id="name">
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary" style="width: 100%;" onclick="search('sec')">ค้นหา</button>
                    </div>
                </div>
            </div>


            <div class="row" mode="first" id="top">
                <?php
                foreach ($jso as $key) {
                    echo  '<div class="col-md-4 mt-5">';
                    echo '<div class="card">';
                    echo '<img class="card-img-top" src="' . $key->album->images[0]->url . '" alt="Card image cap">';
                    echo '<div class="card-body">';
                    echo '<b>' . $key->album->name . '</b><br>';
                    echo '<p> Artists : ' . $key->album->artists[0]->name . '</p>';
                    echo '<p> Release date : ' . $key->album->release_date . '</p>';
                    $arr = $key->album->available_markets;
                    echo '<p> Available' . sizeof($arr) . '</p>';
                    // echo $key->album->images[0]->url;


                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>

            </div>


            <div class="row" mode="first" id="fluke">
                <div>

                </div>
                
            </div>
        </div>
    </div>


</body>
<script>
    function search(a) {
        var a = document.getElementById("name");
        document.getElementById("fluke").setAttribute("mode", "sec");
        document.getElementById("top").setAttribute("mode", "sec");
        var list = a.split(" ");
        console.log(list[0])

    }
</script>

</html>