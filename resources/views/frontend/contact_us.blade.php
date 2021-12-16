@extends('frontend/layout')

<!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">{{__('title.Contact Us')}}</h2>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="wn_contact_area bg--white pt--80">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-8 col-12">
        				<div class="contact-form-wrap">
        					<h2 class="contact__title">{{__('title.Get in touch')}}</h2>
                            <form id="contact-form" action="mail.php" method="post">
                                <div class="single-contact-form space-between">
                                    <input type="text" name="firstname" placeholder="{{__('title.First Name*')}}">
                                    <input type="text" name="lastname" placeholder="{{__('title.Last Name*')}}">
                                </div>
                                <div class="single-contact-form space-between">
                                    <input type="email" name="email" placeholder="{{__('title.Email*')}}">
                                    <input type="text" name="website" placeholder="{{__('title.Website*')}}">
                                </div>
                                <div class="single-contact-form">
                                    <input type="text" name="subject" placeholder="{{__('title.Subject*')}}">
                                </div>
                                <div class="single-contact-form message">
                                    <textarea name="message" placeholder="{{__('title.Type your message here..')}}"></textarea>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit">{{__('title.Send Email')}}</button>
                                </div>
                            </form>
                        </div> 
                        <div class="form-output">
                            <p class="form-messege">
                        </div>
        			</div>
        			<div class="col-lg-4 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__address">
        					<h2 class="contact__title">{{__('title.Get office info.')}}</h2>
        					
        					<div class="wn__addres__wreapper">

        						<div class="single__address">
        							<i class="icon-location-pin icons"></i>
        							<div class="content">
        								<span>{{__('title.address:')}}</span>
        								<p>666 5th Ave New York, NY, United</p>
        							</div>
        						</div>

        						<div class="single__address">
        							<i class="icon-phone icons"></i>
        							<div class="content">
        								<span>{{__('title.Phone Number:')}}</span>
        								<p>716-298-1822</p>
        							</div>
        						</div>

        						<div class="single__address">
        							<i class="icon-envelope icons"></i>
        							<div class="content">
        								<span>{{__('title.Email address:')}}</span>
        								<p>716-298-1822</p>
        							</div>
        						</div>

        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <br>
        <!-- End Contact Area -->