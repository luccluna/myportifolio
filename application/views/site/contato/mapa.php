<!--  wrapper  -->
<div id="wrapper">
    <!-- content-->
    <div class="content">
        <!-- map-view-wrap --> 
        <div class="map-view-wrap">
            <div class="container">
                <div class="map-view-wrap_item">
                    <div class="list-single-main-item-title fl-wrap">
                        <h3>Contato</h3>
                    </div>
                    <div class="box-widget-list mar-top">
                        <ul>
                            <li><span><i class="fal fa-map-marker"></i> Endereço :</span> <a ><?php echo $contato->endereco ?></a></li>
                            <li><span><i class="fal fa-phone"></i> Telefone :</span> <a ><?php echo $contato->telefone1 ?></a></li>
                            <li><span><i class="fal fa-envelope"></i> Email :</span> <a ><?php echo $contato->email ?></a></li>
                            <li><span><i class="fal fa-browser"></i> Website :</span> <a >hotelmundial.com</a></li>
                        </ul>
                    </div>
                    <div class="list-widget-social">
                        <ul>
                            <li><a href="<?php echo $contato->facebook ?>" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/hotel_mundial" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <!-- <li><a href="#" target="_blank" ><i class="fab fa-vk"></i></a></li> -->
                            <li><a href="<?php echo $contato->instagram ?>" target="_blank" ><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--map-view-wrap end --> 
        <!-- Map -->
        <div class="map-container fw-map2">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3808.2475663951423!2d-44.95127098512405!3d-17.351816388099945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xaa0ba4996cb409%3A0x42b845b42cb52835!2sR.+Tiradentes%2C+333+-+Centro%2C+Pirapora+-+MG%2C+39270-000!5e0!3m2!1spt-BR!2sbr!4v1548420489096" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <!-- Map end --> 

    </div>
    <!-- content end-->
</div>
