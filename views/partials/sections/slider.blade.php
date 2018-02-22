@if($group = Slide::findBySlug('anasayfa'))
    @php
        $sliders = $group->sliders()->published()->beetweendates()->get();
    @endphp
    @if(count($sliders)>0)
        <div class="rev_slider_wrapper">
            <div class="overlay"></div>
            <div id="rev_slider" class="rev_slider tp-overflow-hidden fullscreenbanner">
                <ul>
                    @foreach($sliders as $slide)
                        <li data-transition="fade" data-slotamount="6" data-masterspeed="1000"
                            data-fsmasterspeed="1000"
                            data-thumb="{{ $slide->present()->firstImage(100,100,'fit',70) }}"
                            data-delay="{{ $slide->settings->delay*1000 ?? '4000' }}">

                            <!-- Main image-->

                            <img data-lazyload="{{ $slide->present()->firstImage(1920,1080,'fit',70) }}" data-bgparallax="5"
                                 alt="{{ $slide->sub_title }}"
                                 data-bgposition="center 0" data-bgfit="cover" data-bgrepeat="no-repeat"
                                 class="rev-slidebg">

                            @if(!empty($slide->sub_title))
                            <div class="slider-title tp-caption tp-resizeme z-depth-text-5"
                                 data-color="{{ $slide->settings->title_color ?? '#ffffff' }}"
                                 data-textalign="{{ $slide->settings->title_align ?? 'left' }}"
                                 data-x="{{ $slide->settings->title_position_h ?? 'left' }}" data-hoffset="{!! $slide->present()->settings('range', 'title_position_x', '', json_encode([0,0,0,0]), true) !!}"
                                 data-y="{{ $slide->settings->title_position_v ?? 'center' }}" data-voffset="{!! $slide->present()->settings('range', 'title_position_y', '', json_encode([0,0,0,0]), true) !!}"
                                 data-fontsize="{!! $slide->present()->settings('range', 'title_font_size', 'title_font_responsive', json_encode([74,66,46,36]), true) !!}"
                                 data-lineheight="{!! $slide->present()->settings('range', 'title_line_height', 'title_font_responsive', json_encode([74,66,46,36]), true) !!}"
                                 data-width="{!! $slide->present()->settings('range', 'title_width', 'title_height', json_encode([0,0,0,0]), true) !!}"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;"
                                 data-transform_in="x:[-155%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                 data-start="500"
                                 data-splitin="chars"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 data-elementdelay="0.05" style="font-weight:500; letter-spacing:-0.1em;">{{ $slide->sub_title }}
                            </div>
                            @endif

                            @if(!empty($slide->content))
                                <div class="tp-caption tp-resizeme"
                                     data-color="{{ $slide->settings->content_color ?? '#ffffff' }}"
                                     data-textalign="{{ $slide->settings->content_align ?? 'left' }}"
                                     data-x="{{ $slide->settings->content_position_h ?? 'left' }}" data-hoffset="{!! $slide->present()->settings('range', 'content_position_x', '', json_encode([0,0,0,0]), true) !!}"
                                     data-y="{{ $slide->settings->content_position_v ?? 'center' }}" data-voffset="{!! $slide->present()->settings('range', 'content_position_y', '', json_encode([0,0,0,0]), true, 30) !!}"
                                     data-fontsize="{!! $slide->present()->settings('range', 'content_font_size', 'content_font_responsive', json_encode([74,66,46,36]), true) !!}"
                                     data-lineheight="{!! $slide->present()->settings('range', 'content_line_height', 'content_font_responsive', json_encode([74,66,46,36]), true) !!}"
                                     data-width="{!! $slide->present()->settings('range', 'content_width', 'content_height', json_encode([0,0,0,0]), true) !!}"
                                     data-height="auto"
                                     data-whitespace="['normal','normal','normal','normal']"
                                     data-transform_in="x:[-155%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                                     data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                     data-start="1000"
                                     data-responsive_offset="on">
                                    {{ $slide->content }}
                                </div>
                            @endif

                            @if($slide->link_type != 'none')
                            <!-- Layer 7 -->
                            <div class="slider-title tp-caption"
                                 data-x="{{ $slide->settings->link_position_h ?? 'left' }}" data-hoffset="{!! $slide->present()->settings('range', 'link_position_x', '', json_encode([50,40,30,20]), true) !!}"
                                 data-y="{{ $slide->settings->link_position_v ?? 'center' }}" data-voffset="{!! $slide->present()->settings('range', 'link_position_y', '', json_encode([200,140,110,90]), true, 5) !!}"
                                 data-textAlign="['left']"
                                 data-fontsize="['18']"
                                 data-lineheight="['20']"
                                 data-height="none"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;"
                                 data-transform_in="x:[-105%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                 data-mask_in="x:50px;y:0px;s:inherit;e:inherit;"
                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                 data-start="1500"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 data-elementdelay="0.05" style="font-weight:600;">
                                <a href="{{ $slide->link->url }}" target="{{ $slide->link->target }}" class="slider-link link-arrow">{{ $slide->link->title }} <i class="icon ion-ios-arrow-thin-right"></i>
                                </a>
                            </div>
                            @endif
                        </li>
                    @endforeach
                </ul>

            </div>

        </div>

        @push('js-stack')
        {!! Theme::script('js/jquery.revolution.min.js') !!}
        {!! Theme::script('js/rev-slider-init.js') !!}
        @endpush

        @push('css-inline')
        <style>
            .slider-link {
                color: {{ $slide->settings->link_color ?? '#ffffff' }};
            }
        </style>
        @endpush

    @endif
@endif