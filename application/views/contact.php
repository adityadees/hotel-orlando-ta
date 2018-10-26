
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="js/themefunction.js"></script>
    <script type="text/javascript">
            google.maps.event.addDomListener(window, 'load', init);

            function init() {
                var mapOptions = {
                    zoom: 11,

                    center: new google.maps.LatLng(40.6700, -73.9400),
                    styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#D5A677"},{"visibility":"on"}]}]
                };
                var mapElement = document.getElementById('map');

                var map = new google.maps.Map(mapElement, mapOptions);

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(40.6700, -73.9400),
                    map: map,
                    title: 'Snazzy!'
                });
            }
    </script>


    <section class="rh-detail-bg list-view-column2 event">
        <div class="container">
            <div class="row">
                <div class="rh-detail-widgets ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="rh text-center">
                            <h2>Contact Us</h2>
                            <p>Captions line here</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="rh section-booking">
        <section class="rh rh-100 rh-contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="rh-section-title">
                            <h2>Contact Us</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="rh-contact-add">
                            <div class="icon-box">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                            <p>1011 Kevin James Street, San Diego, CA 92101</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="rh-contact-add">
                            <div class="icon-box">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <p><a href="mailto:info@Bsquaresoft.com">info@Bsquaresoft.com</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="rh-contact-add">
                            <div class="icon-box">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <p><a href="tel:+91123345-6789">(+91) 123 345-6789</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="rh rh-100 rh-contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="rh-c-form">
                            <div class="form-area">  
                                <form action="#">
                                    <h3>Contact Form</h3>
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6 rh-xs-12">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6 rh-xs-12">
                                            <input type="text" class="form-control" id="formemail" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6 rh-xs-12">
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6 rh-xs-12">
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <textarea class="form-control" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                                            <span class="help-block" id="characterLeft">You have reached the limit</span>
                                        </div>
                                        <div class="rh col-xs-12">
                                            <a href="javascript:;" class="rh-check-btn">Submit Form</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Conatct Us Form Close -->
