{{-- <div class="ps-banner">
    <div class=" rev_slider fullscreenbanner" id="home-banner">
        <ul>

            @foreach ($bannerHome as $bannerItem)
              

                <li class="ps-banner ps-banner--white" data-transition="random" data-slotamount="default"
                    data-hideafterloop="0" data-hideslideonmobile="off" data-rotate="0">
                    <img class="rev-slidebg" src="{{ asset("$URL_IMG_BANNER/$bannerItem->img_banner") }}" alt=""
                        data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5"
                        data-no-retina>
                    <div class="tp-caption ps-banner__header" data-x="left" data-hoffset="['-60','15','15','15']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-150','-120','-150','-170']"
                        data-width="['none','none','none','400']" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                        <p>
                            {{ $bannerItem->title_banner }}
                        </p>
                    </div>
                    <div class="tp-caption ps-banner__title" data-x="['left','left','left','left']"
                        data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['-60','-40','-50','-70']" data-type="text" data-responsive_offset="on"
                        data-textAlign="['center','center','center','center']"
                        data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                        <p class="text-uppercase">Recovery</p>
                    </div>
                    <div class="tp-caption ps-banner__description" data-x="['left','left','left','left']"
                        data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['30','50','50','50']" data-type="text" data-responsive_offset="on"
                        data-textAlign="['center','center','center','center']"
                        data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">

                        <div>
                            {!! $bannerItem->description_banner !!}
                        </div>
                    </div>
                    <a class="tp-caption ps-btn" href="#" data-x="['left','left','left','left']"
                        data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['120','140','200','200']" data-type="text" data-responsive_offset="on"
                        data-textAlign="['center','center','center','center']"
                        data-frames="[{&quot;delay&quot;:1500,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">Purchase
                        Now<i class="ps-icon-next"></i>
                    </a>
                </li>
            @endforeach


        </ul>
    </div>
</div> --}}
<div data-aos="fade-up" data-aos-duration="1000" data-aos-easing="linear" class="ps-banner ps-owl-root pt-5">




    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ps__banner ps-home-testimonial">


                {{-- data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000"
                data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1"
                data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
                data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut" --}}

                <div class=" ps-owl--colection owl-slider  owl-carousel" data-owl-auto="true" data-owl-loop="true"
                    data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="1"
                    data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1"
                    data-owl-duration="1000" data-owl-mousedrag="on">
                    @foreach ($bannerHome as $bannerItem)
                        <div class="ps-banner__item">
                            <div style="background-image: url('{{ asset("$URL_IMG_BANNER/$bannerItem->img_banner") }}')"
                                class="ps-banner__img">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="ps__banner-owl-nav ps-owl-actions">
                    <a class="ps__banner-owl-nav_item ps-prev" href="#">
                        <i class="icofont-stylish-left"></i>
                    </a>
                    <a class="ps__banner-owl-nav_item ps-next" href="#">
                        <i class="icofont-stylish-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
