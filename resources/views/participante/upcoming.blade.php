@extends('layouts.app',['extra_pages'=>$extra_pages])

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
        <h1 class="entry-title">All Upcoming Events</h1>
    </div>
</section>

<section class="section-calendar-events">
    <div class="container">
        <div class="row">
            <div class="section-header">
                <ul class="nav nav-tabs event-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#tab1" role="tab" data-toggle="tab">May <span>2016</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab2" role="tab" data-toggle="tab">Jun <span>2016</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab3" role="tab" data-toggle="tab">Jul <span>2016</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab4" role="tab" data-toggle="tab">Aug <span>2016</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab5" role="tab" data-toggle="tab">Sep <span>2016</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab6" role="tab" data-toggle="tab">Oct <span>2016</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab7" role="tab" data-toggle="tab">Nov <span>2016</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab8" role="tab" data-toggle="tab">Dec <span>2016</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab9" role="tab" data-toggle="tab">Jan <span>2017</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab10" role="tab" data-toggle="tab">Feb <span>2017</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab11" role="tab" data-toggle="tab">Mar <span>2017</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab12" role="tab" data-toggle="tab">Apr <span>2017</span></a>
                    </li>
                </ul>
            </div>
            <div class="section-content">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab1">
                        <ul class="clearfix">
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">25</span>
                                        <span class="month">May</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-1.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>BMW Open Championship <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">26</span>
                                        <span class="month">May</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-2.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Kiai Kanjeng Orchestra <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">27</span>
                                        <span class="month">May</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-3.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Envato Author SF Meetup <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">28</span>
                                        <span class="month">May</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-4.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>FIFA WORLD CUP 2016 <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">29</span>
                                        <span class="month">May</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-5.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Prep Football America <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">29</span>
                                        <span class="month">May</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-6.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>UEFA Champions League <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab2">
                        <ul class="clearfix">
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">25</span>
                                        <span class="month">Jun</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-1.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>BMW Open Championship <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">26</span>
                                        <span class="month">Jun</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-2.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Kiai Kanjeng Orchestra <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">27</span>
                                        <span class="month">Jun</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-3.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Envato Author SF Meetup <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                        </ul>
                    
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab3">
                        <ul class="clearfix">
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">28</span>
                                        <span class="month">Jul</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-4.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>FIFA WORLD CUP 2016 <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">29</span>
                                        <span class="month">Jul</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-5.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Prep Football America <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">29</span>
                                        <span class="month">Jul</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-6.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>UEFA Champions League <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                        </ul>
                    
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab4">
                        <ul class="clearfix">
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">29</span>
                                        <span class="month">Aug</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-6.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>UEFA Champions League <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab5">
                        <ul class="clearfix">
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">25</span>
                                        <span class="month">Sep</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-1.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>BMW Open Championship <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">26</span>
                                        <span class="month">Sep</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-2.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Kiai Kanjeng Orchestra <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">27</span>
                                        <span class="month">Sep</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-3.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Envato Author SF Meetup <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">28</span>
                                        <span class="month">Sep</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-4.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>FIFA WORLD CUP 2016 <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                        </ul>
                    
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab6">
                        <ul class="clearfix">
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">28</span>
                                        <span class="month">Oct</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-4.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>FIFA WORLD CUP 2016 <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">29</span>
                                        <span class="month">Oct</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-5.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Prep Football America <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">29</span>
                                        <span class="month">Oct</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-6.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>UEFA Champions League <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab7">
                        <ul class="clearfix">
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">25</span>
                                        <span class="month">Nov</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-1.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>BMW Open Championship <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">26</span>
                                        <span class="month">Nov</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-2.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Kiai Kanjeng Orchestra <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">27</span>
                                        <span class="month">Nov</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-3.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Envato Author SF Meetup <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                        </ul>
                    
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab8">
                        <ul class="clearfix">
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">29</span>
                                        <span class="month">Dec</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-5.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Prep Football America <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                        </ul>
                    
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab9">
                        <ul class="clearfix">
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">28</span>
                                        <span class="month">Jan</span>
                                        <span class="year">2017</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-4.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>FIFA WORLD CUP 2016 <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                        </ul>
                    
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab10">
                        <ul class="clearfix">
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">27</span>
                                        <span class="month">Feb</span>
                                        <span class="year">2017</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-3.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Envato Author SF Meetup <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                        </ul>
                    </div>
        
                    <div role="tabpanel" class="tab-pane" id="tab11">
                        <ul class="clearfix">
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">29</span>
                                        <span class="month">Mar</span>
                                        <span class="year">2017</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-5.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Prep Football America <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">29</span>
                                        <span class="month">Mar</span>
                                        <span class="year">2017</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-6.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>UEFA Champions League <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                    <div role="tabpanel" class="tab-pane" id="tab12">
                        <ul class="clearfix">
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">25</span>
                                        <span class="month">Apr</span>
                                        <span class="year">2017</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-1.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>BMW Open Championship <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li>
                                <div class="date">
                                    <a href="#">
                                        <span class="day">26</span>
                                        <span class="month">Apr</span>
                                        <span class="year">2017</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/upcoming-event-2.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Kiai Kanjeng Orchestra <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-newsletter">
    <div class="container">
        <div class="section-content">
            <h2>Stay Up to date With Your Favorite Events!</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh <br> euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
            <div class="newsletter-form clearfix">
                <input type="email" placeholder="Your Email Address">
                <input type="submit" value="Subscribe">
            </div>
        </div>
    </div>
</section>


@endsection