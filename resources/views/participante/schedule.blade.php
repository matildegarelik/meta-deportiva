@extends('layouts.app')

@section('pagetitle','Events')

@section('css')
<style>
.section-featured-header.all-sports-events {
    min-height: 122px;
    /*background: url(../images/page-featured-img-category.jpg) no-repeat center center;*/
}
.section-featured-header.all-sports-events .section-content {
    padding: 0px 0 0px;
}
</style>
@endsection

@section('content')

<section class="section-featured-header all-sports-events">
    <div class="container">
        <div class="section-content">
            
        </div>
    </div>
</section>
<section class="section-page-header">
    <div class="container">
        <h1 class="entry-title">Mis eventos</h1>
    </div>
</section>

<section class="section-refine-search">
    <div class="container">
        <div class="row">
            <form class="row">
                <div class="keyword col-sm-6 col-md-4">
                    <label>Search Keyword</label>
                    <input type="text" class="form-control hasclear" placeholder="Search">
                    <span class="clearer"><img src="images/clear.png" alt="clear"></span>
                </div>
                <div class="month col-sm-6 col-md-3">
                    <label>Month</label>
                    <select class="selectpicker dropdown" id="filter-month">
                        <option>Select Month</option>
                        <option value="0">January</option>
                        <option value="1">February</option>
                        <option value="2">March</option>
                        <option value="3">April</option>
                        <option value="4">May</option>
                        <option value="5">June</option>
                        <option value="6">July</option>
                        <option value="7">August</option>
                        <option value="8">September</option>
                        <option value="9">October</option>
                        <option value="10">November</option>
                        <option value="11">December</option>
                    </select>
                </div>
                <div class="year col-sm-6 col-md-3">
                    <label>Year</label>
                    <select class="selectpicker dropdown" id="filter-year">
                        <option>Select Year</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2024">2027</option>
                        <option value="2025">2028</option>
                        <option value="2026">2029</option>
                    </select>
                </div>
                <div class="col-sm-6 col-md-2">
                    <input type="submit" value="Search">
                </div>
            </form>
        </div>
    </div>
</section>

<section class="section-full-events-schedule">
    <div class="container">
        <div class="row">
            <div class="section-header">
                <ul class="nav nav-tabs event-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#tab1" role="tab" data-toggle="tab">
                            <strong>Saturday</strong>
                            22 
                            <span class="m-y">August 2016</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#tab2" role="tab" data-toggle="tab">
                            <strong>Sunday</strong>
                            23 
                            <span class="m-y">August 2016</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#tab3" role="tab" data-toggle="tab">
                            <strong>Monday</strong>
                            24 
                            <span class="m-y">August 2016</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#tab4" role="tab" data-toggle="tab">
                            <strong>Tuesday</strong>
                            25 
                            <span class="m-y">August 2016</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#tab5" role="tab" data-toggle="tab">
                            <strong>Wednesday</strong>
                            26 
                            <span class="m-y">August 2016</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#tab6" role="tab" data-toggle="tab">
                            <strong>Thursday</strong>
                            27 
                            <span class="m-y">August 2016</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#tab7" role="tab" data-toggle="tab">
                            <strong>Friday</strong>
                            28 
                            <span class="m-y">August 2016</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#tab8" role="tab" data-toggle="tab">
                            <strong>Saturday</strong>
                            29 
                            <span class="m-y">August 2016</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#tab9" role="tab" data-toggle="tab">
                            <strong>Sunday</strong>
                            30 
                            <span class="m-y">August 2016</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#tab10" role="tab" data-toggle="tab">
                            <strong>Monday</strong>
                            31 
                            <span class="m-y">August 2016</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="section-content">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab1">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <ul class="nav" role="tablist">
                                    @foreach(Auth::user()->events_inscripto as $key => $ei)
                                    <li class="@if($key==0) active @endif">
                                        <a href="#tab1-hr{{++$key}}" aria-controls="tab1-hr{{++$key}}" role="tab" data-toggle="tab">
                                            <span class="schedule-time">08:00 <strong>AM</strong></span>
                                            <span class="schedule-title">{{$ei->event->name}}</span>
                                            <span class="schedule-ticket-info">{{$ei->category->name}}</span>
                                        </a>
                                    </li>
                                    @endforeach
                              </ul>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="tab-content">
                                    @foreach(Auth::user()->events_inscripto as $key => $ei)
                                    <div role="tabpanel" class="tab-pane @if($key==0) active @endif" id="tab1-hr{{++$key}}">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>{{$ei->event->name}}</h2>
                                                <span class="ticket-left-info">{{$ei->category->name}}</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">{{date_format(new Datetime($ei->event->start_date),'l')}}, {{date_format(new Datetime($ei->event->start_date),'F  j, Y')}} | 08:00 AM</span>
                                                <span class="event-venue-info">{{$ei->event->location}}</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                {!! $ei->event->description !!}
                                                <a class="book-ticket" href="#">Ver resultados</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--<div role="tabpanel" class="tab-pane" id="tab1-hr2">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Envato Author Meetup in Boston</h2>
                                                <span class="ticket-left-info">20 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Saturday, August 22 2016 | 09:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab1-hr3">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>BMW Open Championship</h2>
                                                <span class="ticket-left-info">9 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Saturday, August 22 2016 | 10:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab1-hr4">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>UEFA CHAMPIONS LEAGUE</h2>
                                                <span class="ticket-left-info">13 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Saturday, August 22 2016 | 09:00 PM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab1-hr5">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>FORMULA 1 SEPANG</h2>
                                                <span class="ticket-left-info">13 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Saturday, August 22 2016 | 10:00 PM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>									
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab2">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <ul class="nav" role="tablist">
                                    <li class="active">
                                        <a href="#tab2-hr1" aria-controls="tab2-hr1" role="tab" data-toggle="tab">
                                            <span class="schedule-time">08:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Kiai Kanjeng Orchestra</span>
                                            <span class="schedule-ticket-info">18 tickets left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab2-hr2" aria-controls="tab2-hr2" role="tab" data-toggle="tab">
                                            <span class="schedule-time">09:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Envato Author Meetup</span>
                                            <span class="schedule-ticket-info">20 tickets left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab2-hr3" aria-controls="tab2-hr2" role="tab" data-toggle="tab">
                                            <span class="schedule-time">10:00 <strong>AM</strong></span>
                                            <span class="schedule-title">BMW Open Championship</span>
                                            <span class="schedule-ticket-info">9 tickets left</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab2-hr1">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Kiai Kanjeng Orchestra</h2>
                                                <span class="ticket-left-info">18 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Sunday, August 23 2016 | 08:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab2-hr2">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Envato Author Meetup in Boston</h2>
                                                <span class="ticket-left-info">20 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Sunday, August 23 2016 | 09:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab2-hr3">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>BMW Open Championship</h2>
                                                <span class="ticket-left-info">9 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Sunday, August 23 2016 | 10:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>									
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab3">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <ul class="nav" role="tablist">
                                    <li class="active">
                                        <a href="#tab3-hr1" aria-controls="tab3-hr1" role="tab" data-toggle="tab">
                                            <span class="schedule-time">08:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Kiai Kanjeng Orchestra</span>
                                            <span class="schedule-ticket-info">18 tickets left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab3-hr2" aria-controls="tab3-hr2" role="tab" data-toggle="tab">
                                            <span class="schedule-time">09:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Envato Author Meetup</span>
                                            <span class="schedule-ticket-info">20 tickets left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab3-hr3" aria-controls="tab3-hr3" role="tab" data-toggle="tab">
                                            <span class="schedule-time">10:00 <strong>AM</strong></span>
                                            <span class="schedule-title">BMW Open Championship</span>
                                            <span class="schedule-ticket-info">9 tickets left</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab3-hr1">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Kiai Kanjeng Orchestra</h2>
                                                <span class="ticket-left-info">18 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Monday, August 24 2016 | 08:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab3-hr2">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Envato Author Meetup in Boston</h2>
                                                <span class="ticket-left-info">20 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Monday, August 24 2016 | 09:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab3-hr3">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>BMW Open Championship</h2>
                                                <span class="ticket-left-info">9 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Monday, August 24 2016 | 10:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>									
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab4">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <ul class="nav" role="tablist">
                                    <li class="active">
                                        <a href="#tab4-hr1" aria-controls="tab4-hr1" role="tab" data-toggle="tab">
                                            <span class="schedule-time">08:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Kiai Kanjeng Orchestra</span>
                                            <span class="schedule-ticket-info">18 tickets left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab4-hr2" aria-controls="tab4-hr2" role="tab" data-toggle="tab">
                                            <span class="schedule-time">09:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Envato Author Meetup</span>
                                            <span class="schedule-ticket-info">20 tickets left</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab4-hr1">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Kiai Kanjeng Orchestra</h2>
                                                <span class="ticket-left-info">18 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Tuesday, August 25 2016 | 08:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab4-hr2">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Envato Author Meetup in Boston</h2>
                                                <span class="ticket-left-info">20 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Tuesday, August 25 2016 | 09:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>									
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab5">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <ul class="nav" role="tablist">
                                    <li class="active">
                                        <a href="#tab5-hr1" aria-controls="tab5-hr1" role="tab" data-toggle="tab">
                                            <span class="schedule-time">08:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Kiai Kanjeng Orchestra</span>
                                            <span class="schedule-ticket-info">18 tickets left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab5-hr2" aria-controls="tab5-hr2" role="tab" data-toggle="tab">
                                            <span class="schedule-time">09:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Envato Author Meetup</span>
                                            <span class="schedule-ticket-info">20 tickets left</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab5-hr1">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Kiai Kanjeng Orchestra</h2>
                                                <span class="ticket-left-info">18 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Wednesday, August 26 2016 | 08:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab5-hr2">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Envato Author Meetup in Boston</h2>
                                                <span class="ticket-left-info">20 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Wednesday, August 26 2016 | 09:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>									
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab6">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <ul class="nav" role="tablist">
                                    <li class="active">
                                        <a href="#tab6-hr1" aria-controls="tab6-hr1" role="tab" data-toggle="tab">
                                            <span class="schedule-time">08:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Kiai Kanjeng Orchestra</span>
                                            <span class="schedule-ticket-info">18 tickets left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab6-hr2" aria-controls="tab6-hr2" role="tab" data-toggle="tab">
                                            <span class="schedule-time">09:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Envato Author Meetup</span>
                                            <span class="schedule-ticket-info">20 tickets left</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab6-hr1">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Kiai Kanjeng Orchestra</h2>
                                                <span class="ticket-left-info">18 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Thursday, August 27 2016 | 08:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab6-hr2">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Envato Author Meetup in Boston</h2>
                                                <span class="ticket-left-info">20 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Thursday, August 27 2016 | 09:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>									
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab7">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <ul class="nav" role="tablist">
                                    <li class="active">
                                        <a href="#tab7-hr1" aria-controls="tab7-hr1" role="tab" data-toggle="tab">
                                            <span class="schedule-time">08:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Kiai Kanjeng Orchestra</span>
                                            <span class="schedule-ticket-info">18 tickets left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab7-hr2" aria-controls="tab7-hr2" role="tab" data-toggle="tab">
                                            <span class="schedule-time">09:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Envato Author Meetup</span>
                                            <span class="schedule-ticket-info">20 tickets left</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab7-hr1">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Kiai Kanjeng Orchestra</h2>
                                                <span class="ticket-left-info">18 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Friday, August 28 2016 | 08:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab7-hr2">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Envato Author Meetup in Boston</h2>
                                                <span class="ticket-left-info">20 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Friday, August 28 2016 | 09:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>									
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab8">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <ul class="nav" role="tablist">
                                    <li class="active">
                                        <a href="#tab8-hr1" aria-controls="tab8-hr1" role="tab" data-toggle="tab">
                                            <span class="schedule-time">08:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Kiai Kanjeng Orchestra</span>
                                            <span class="schedule-ticket-info">18 tickets left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab8-hr2" aria-controls="tab8-hr2" role="tab" data-toggle="tab">
                                            <span class="schedule-time">09:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Envato Author Meetup</span>
                                            <span class="schedule-ticket-info">20 tickets left</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab8-hr1">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Kiai Kanjeng Orchestra</h2>
                                                <span class="ticket-left-info">18 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Saturday, August 29 2016 | 08:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab8-hr2">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Envato Author Meetup in Boston</h2>
                                                <span class="ticket-left-info">20 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Saturday, August 29 2016 | 09:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>									
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab9">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <ul class="nav" role="tablist">
                                    <li class="active">
                                        <a href="#tab9-hr1" aria-controls="tab9-hr1" role="tab" data-toggle="tab">
                                            <span class="schedule-time">08:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Kiai Kanjeng Orchestra</span>
                                            <span class="schedule-ticket-info">18 tickets left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab9-hr2" aria-controls="tab9-hr2" role="tab" data-toggle="tab">
                                            <span class="schedule-time">09:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Envato Author Meetup</span>
                                            <span class="schedule-ticket-info">20 tickets left</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab9-hr1">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Kiai Kanjeng Orchestra</h2>
                                                <span class="ticket-left-info">18 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Sunday, August 30 2016 | 08:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab9-hr2">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Envato Author Meetup in Boston</h2>
                                                <span class="ticket-left-info">20 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Sunday, August 30 2016 | 09:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>									
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab10">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <ul class="nav" role="tablist">
                                    <li class="active">
                                        <a href="#tab10-hr1" aria-controls="tab10-hr1" role="tab" data-toggle="tab">
                                            <span class="schedule-time">08:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Kiai Kanjeng Orchestra</span>
                                            <span class="schedule-ticket-info">18 tickets left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab10-hr2" aria-controls="tab10-hr2" role="tab" data-toggle="tab">
                                            <span class="schedule-time">09:00 <strong>AM</strong></span>
                                            <span class="schedule-title">Envato Author Meetup</span>
                                            <span class="schedule-ticket-info">20 tickets left</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab10-hr1">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Kiai Kanjeng Orchestra</h2>
                                                <span class="ticket-left-info">18 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Monday, August 31 2016 | 08:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab10-hr2">
                                        <img src="images/full-event-schedule-img.jpg" alt="image">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h2>Envato Author Meetup in Boston</h2>
                                                <span class="ticket-left-info">20 Tickets Left</span>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">Monday, August 31 2016 | 09:00 AM</span>
                                                <span class="event-venue-info">220 Morrissey Blvd. Boston, MA 02125</span>
                                            </div>
                                            <div class="full-event-info-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                <a class="book-ticket" href="#">Book Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>									
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
<script>
$(document).ready(()=>{
    const d = new Date()
    $('#filter-month').val(d.getMonth())
    $('#filter-year').val(d.getFullYear())
    $('#filter-month,#filter-year').on('change', function(){
        $('.m-y').html($('#filter-month option:selected').text()+' '+$('#filter-year').val())
    })
    $('.m-y').html($('#filter-month option:selected').text()+' '+d.getFullYear())
})
</script>
@endsection