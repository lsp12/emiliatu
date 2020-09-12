
<?php
    $title = 'Emiliatu';
    include_once('componentes/head.php');
    include_once('componentes/header.php');
    /* include_once('componentes/portada.php'); */
    include_once('componentes/busqueda.php');
?>


    
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