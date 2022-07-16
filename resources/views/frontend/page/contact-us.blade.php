@extends('frontend.layout')
@section('layout-conten')
    <div class="ps-contact ps-section pb-80 mt-5">
        {{-- <div id="contact-map" data-address="New York, NY" data-title="Sky Store!" data-zoom="17"></div> --}}
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29936.576131571437!2d106.39300786496426!3d20.2972860295298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313607642d3e91e9%3A0x50df8cf00aa647e0!2zWHXDom4gUGjDuiwgWHXDom4gVHLGsOG7nW5nLCBOYW0gxJDhu4tuaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1635242490609!5m2!1svi!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="ps-section__header mb-50">
                        <h2 class="ps-section__title" data-mask="Contact">- Get in touch</h2>
                        <form class="ps-contact__form" action="do_action" method="post">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <label>Name <sub>*</sub></label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <label>Email <sub>*</sub></label>
                                        <input class="form-control" type="email" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                    <div class="form-group mb-25">
                                        <label>Your Message <sub>*</sub></label>
                                        <textarea class="form-control" rows="6"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="ps-btn">Send Message<i class="ps-icon-next"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="ps-section__content">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="ps-contact__block" data-mh="contact-block">
                                    <header>
                                        <h3>USA <span> San Francisco</span></h3>
                                    </header>
                                    <footer>
                                        <p><i class="fa fa-map-marker"></i> 19C Trolley Square Wilmington, DE 19806</p>
                                        <p><i class="fa fa-envelope-o"></i><a
                                                href="mailto@supportShoes@shoes.net">supportShoes@shoes.net</a></p>
                                        <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324 - 9401 123 003</p>
                                    </footer>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="ps-contact__block" data-mh="contact-block">
                                    <header>
                                        <h3>Ireland <span> Dublin</span></h3>
                                    </header>
                                    <footer>
                                        <p><i class="fa fa-map-marker"></i> 19C Trolley Square Wilmington, DE 19806</p>
                                        <p><i class="fa fa-envelope-o"></i><a
                                                href="mailto@supportShoes@shoes.net">supportShoes@shoes.net</a></p>
                                        <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324 - 9401 123 003</p>
                                    </footer>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="ps-contact__block" data-mh="contact-block">
                                    <header>
                                        <h3>Brazil <span> São Paulo</span></h3>
                                    </header>
                                    <footer>
                                        <p><i class="fa fa-map-marker"></i> 19C Trolley Square Wilmington, DE 19806</p>
                                        <p><i class="fa fa-envelope-o"></i><a
                                                href="mailto@supportShoes@shoes.net">supportShoes@shoes.net</a></p>
                                        <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324 - 9401 123 003</p>
                                    </footer>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="ps-contact__block" data-mh="contact-block">
                                    <header>
                                        <h3>Philippines <span> Quezon City</span></h3>
                                    </header>
                                    <footer>
                                        <p><i class="fa fa-map-marker"></i> 19C Trolley Square Wilmington, DE 19806</p>
                                        <p><i class="fa fa-envelope-o"></i><a
                                                href="mailto@supportShoes@shoes.net">supportShoes@shoes.net</a></p>
                                        <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324 - 9401 123 003</p>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
