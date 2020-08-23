
<?php
    $title = 'Emiliatu';
    include_once('componentes/head.php');
    include_once('componentes/header.php');
    include_once('componentes/portada.php');
?>


    <!-- where_togo_area_start  -->
    <div class="where_togo_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="form_area">
                        <h3>¿Donde quieras ir?</h3>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="search_wrap">
                        <form class="search_form" action="#">
                            <div class="input_field">
                                <input type="text" placeholder="¿Dónde ir?">
                            </div>
                            <div class="input_field">
                                <input id="datepicker" placeholder="Fecha">
                            </div>
                            <div class="input_field">
                                <select class='form-control'>
                                    <option data-display="Tipo de viaje">Tipo de viaje</option>
                                    <option value="1">Primera opcion</option>
                                    <option value="2">Segunda opcion</option>
                                </select>
                            </div>
                            <div class="search_btn">
                                <button class="boxed-btn4 " type="submit" >Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- where_togo_area_end  -->
    
    <?php
        include_once('componentes/destinos.php');
        include_once('componentes/banner-registre-email.php');
        include_once('componentes/populares.php');
    ?>

    <div class="video_area video_bg overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video_wrap text-center">
                        <h3>Disfruta del video</h3>
                        <div class="video_icon">
                            <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=RDbe-4Z5bvQ">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        include_once('componentes/servicios-adicionales.php');
        include_once('componentes/footer.php');
    ?>