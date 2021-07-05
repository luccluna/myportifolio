<!-- Start page content -->
<section id="page-content" class="page-wrapper">
    <!-- Start contact address area  -->
    <div class="zm-section bg-white ptb-65">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-4 col-sm-8">
                    <div class="section-title-2 mb-40">
                        <h3 class="inline-block uppercase">Fale Conosco</h3>
                        <p>Dúvidas ou sugestões? Envie uma mensagem e entraremos em contato em breve!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="single-address text-center">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <h4>Endereço</h4>
                        <p><?php echo $contato->endereco ?></p><p><strong>CEP: </strong><?php echo $contato->CEP ?> <strong>Cidade: </strong><?php echo $contato->cidade ?></p>
                        <p></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 xs-mt-30">
                    <div class="single-address text-center">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <h4 class="uppercase">Nosso E-mail</h4>
                        <p><a><?php echo $contato->email ?></a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 xs-mt-30">
                    <div class="single-address text-center">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h4 class="uppercase">Número Fixo/Celular</h4>
                        <br>
                        <p><?php echo $contato->telefone1 ?><?php if ($contato->telefone2): ?>
                        / </span><?php echo $contato->telefone2 ?>
                        <?php endif; ?></p><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End contact address area  -->
    <!-- Start Google Map area -->
    <div class="zm-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3821.186829999002!2d-43.86006048511344!3d-16.717527250788834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x754ab51fddb7855%3A0xf1e025914715915f!2sR.+Jos%C3%A9+Ant%C3%B4nio+Rodrigues%2C+350+-+Alto+S%C3%A3o+Jo%C3%A3o%2C+Montes+Claros+-+MG%2C+39400-308!5e0!3m2!1spt-BR!2sbr!4v1558702167935!5m2!1spt-BR!2sbr" width="1400" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Google Map area -->
    <!-- Start contact message area -->
    <div class="zm-section bg-white pt-60 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="section-title-2 mb-40">
                        <h3 class="inline-block uppercase">Deixe-nos uma mensagem</h3>
                    </div>
                </div>
            </div>
            <div class="message-box">
                <form action="mail.php"  id="contact-form" method="post">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" required="" placeholder="Nome Completo*">
                            <input type="email" name="email" required="" placeholder="Seu E-mail*">
                            <input type="text" name="phone" required="" placeholder="Seu Telefone*">
                            <input type="text" name="website" placeholder="Website">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="message" required="" placeholder="Escreva sua mensagem... *"></textarea>
                            <strong>Os campos marcados em * são obrigatórios.</strong>
                            <button class="submit-button" type="submit">Enviar Mensagem</button>
                        </div>
                    </div>
                </form>
                <p class="form-messege"></p>
            </div>
        </div>
    </div>
    <!-- End contact message area -->
</section>
<!-- End page content -->
<!-- Body main wrapper end -->


<!-- Placed js at the end of the document so the pages load faster -->
<!-- jquery latest version -->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/vendor/jquery-1.12.1.min.js"></script>
<!-- Bootstrap framework js -->
<script src="js/bootstrap.min.js"></script>
<!-- All js plugins included in this file. -->
<script src="js/plugins.js"></script>
<script src="js/ajax-mail.js"></script>
<script src="js/owl.carousel.min.js"></script>
<!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIVeErlZaaAwruruTK1YVDXoByfnqRF4c"></script>
<script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 12,

                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(23.7286, 90.3854), // New York

                // How you would like to style the map. 
                // This is where you would paste any style found on Snazzy Maps.
                styles: [
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#e9e9e9"
                    },
                    {
                        "lightness": 17
                    }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#f5f5f5"
                    },
                    {
                        "lightness": 20
                    }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 17
                    }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 29
                    },
                    {
                        "weight": 0.2
                    }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 18
                    }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 16
                    }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#f5f5f5"
                    },
                    {
                        "lightness": 21
                    }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#dedede"
                    },
                    {
                        "lightness": 21
                    }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 16
                    }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "saturation": 36
                    },
                    {
                        "color": "#333333"
                    },
                    {
                        "lightness": 40
                    }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                    {
                        "visibility": "off"
                    }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#f2f2f2"
                    },
                    {
                        "lightness": 19
                    }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                    {
                        "color": "#fefefe"
                    },
                    {
                        "lightness": 20
                    }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                    {
                        "color": "#fefefe"
                    },
                    {
                        "lightness": 17
                    },
                    {
                        "weight": 1.2
                    }
                    ]
                }
                ]
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('googleMap');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(23.7286, 90.3854),
                map: map,
                title: 'VinTV',
                animation:google.maps.Animation.BOUNCE

            });
            var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<div id="bodyContent">'+
            '<h4>Head Office</h4>'+       
            '<p>721/A Central Street</p>'+       
            '</div>'+
            '</div>';
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            infowindow.open(map, marker);
        }
    </script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>
</html>