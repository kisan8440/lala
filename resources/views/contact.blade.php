@extends('layouts.app')

@section('css')

    {{-- Page title --}}
    <title>Contact us | Upswale.com</title>

    {{-- Required option css internal and external --}}

    <style>
        .contact-outer > p > span:nth-child(1){
            display: inline-block;
            height: 20px;
            width: 20px;
            text-align: center;
        }
    </style>


@endsection

@section('content')

    {{-- Page content --}}
    <section>
        
        {{-- Contact us --}}
        <div class="container">
            <h4 class="page-heading">
                Contact us
            </h4>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form class="row custom-form mb-sm-3 mb-md-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input required type="text" class="form-control font-12">
                                <label class="m-0 font-12">Your Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input required type="text" class="form-control font-12">
                                <label class="m-0 font-12">Your mobile number</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input required type="text" class="form-control font-12">
                                <label class="m-0 font-12">Your email</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input required type="text" class="form-control font-12">
                                <label class="m-0 font-12">Subject</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group textarea">
                                <textarea required class="form-control" rows="3"></textarea>
                                <label class="m-0 font-12">Your message</label>
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button class="flash theme-btn">Submit</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3490.275364467254!2d77.70868081461207!3d28.979210175057478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390c7ad5d536498b%3A0x59294abbd0bab704!2sJDM%20Technologies%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1604260693205!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>

        

        <div class="container mt-2">
            <h4 class="page-heading">
                Our branches
            </h4>
        </div>

        {{-- Our other branches --}}
        <div class="container mt-4 mb-4">
            <div class="row">
                <!-- left side main box -->
                <div class="col-md-12">
                    <!-- why choose us -->                    
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="theme-block parent box-hover-effect">
                                <div class="contact-outer">
                                    <h5 class="d-i-b">MEERUT</h5>
                                    <p class="font-12 p-0 m-0 mt-3 mb-1">
                                        <span><i class="fa fa-home text-yellow"> </i></span>
                                        <span>Upswale.com</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map-marker text-yellow"> </i></span>
                                        <span>1st Floor, Narendra Sadan Complex, Near Ismail Degree College,Budhana Gate, Meerut.</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map text-yellow"> </i></span>
                                        <span>250001</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-phone text-yellow"> </i></span>
                                        <span>8393887799</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-user text-yellow"> </i></span>
                                        <span>Prince Bathla</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-envelope text-yellow"> </i></span>
                                        <span>prince@upswale.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="theme-block parent box-hover-effect">
                                <div class="contact-outer">
                                    <h5 class="d-i-b">NOIDA</h5>
                                    <p class="font-12 p-0 m-0 mt-3 mb-1">
                                        <span><i class="fa fa-home text-yellow"> </i></span>
                                        <span>Upswale.com</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map-marker text-yellow"> </i></span>
                                        <span>C-22 Sector 49, Noida.</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map text-yellow"> </i></span>
                                        <span>201301</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-phone text-yellow"> </i></span>
                                        <span>9319337799</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-user text-yellow"> </i></span>
                                        <span>Brijesh Maurya</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-envelope text-yellow"> </i></span>
                                        <span>brijesh@upswale.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="theme-block parent box-hover-effect">
                                <div class="contact-outer">
                                    <h5 class="d-i-b">GHAZIABAD</h5>
                                    <p class="font-12 p-0 m-0 mt-3 mb-1">
                                        <span><i class="fa fa-home text-yellow"> </i></span>
                                        <span>Upswale.com</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map-marker text-yellow"> </i></span>
                                        <span>401 Sector-1 Vasundhra ,Ghaziabad.</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map text-yellow"> </i></span>
                                        <span>201010</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-phone text-yellow"> </i></span>
                                        <span>8392993377, 931937799</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-user text-yellow"> </i></span>
                                        <span>Megha Bhola</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-envelope text-yellow"> </i></span>
                                        <span>info@upswale.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="theme-block parent box-hover-effect">
                                <div class="contact-outer">
                                    <h5 class="d-i-b">LUCKNOW</h5>
                                    <p class="font-12 p-0 m-0 mt-3 mb-1">
                                        <span><i class="fa fa-home text-yellow"> </i></span>
                                        <span>Upswale.com</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map-marker text-yellow"> </i></span>
                                        <span>E-4/1319, Type- LIG , Sector-O MANSAROVAR KANPUR ROAD, LUCKNOW UTTAR PRADESH</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map text-yellow"> </i></span>
                                        <span>226005</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-phone text-yellow"> </i></span>
                                        <span>9319647211, 9319337799</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-user text-yellow"> </i></span>
                                        <span>Santosh Maurya</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-envelope text-yellow"> </i></span>
                                        <span>santosh@upswale.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="theme-block parent box-hover-effect">
                                <div class="contact-outer">
                                    <h5 class="d-i-b">BAREILLY</h5>
                                    <p class="font-12 p-0 m-0 mt-3 mb-1">
                                        <span><i class="fa fa-home text-yellow"> </i></span>
                                        <span>Upswale.com</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map-marker text-yellow"> </i></span>
                                        <span>1525/6 Subhash Nagar, Awadhpuri Colony,Bareilly.</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map text-yellow"> </i></span>
                                        <span>243001</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-phone text-yellow"> </i></span>
                                        <span>8392977799, 9319337799</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-user text-yellow"> </i></span>
                                        <span>Amit Kumar</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-envelope text-yellow"> </i></span>
                                        <span>bly@upswale.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="theme-block parent box-hover-effect">
                                <div class="contact-outer">
                                    <h5 class="d-i-b">MORADABAD</h5>
                                    <p class="font-12 p-0 m-0 mt-3 mb-1">
                                        <span><i class="fa fa-home text-yellow"> </i></span>
                                        <span>Upswale.com</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map-marker text-yellow"> </i></span>
                                        <span>128/2 Civil lines Opp Vivekanand Hospital,Moradabad.</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map text-yellow"> </i></span>
                                        <span>244001</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-phone text-yellow"> </i></span>
                                        <span>8171227799, 9319337799</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-user text-yellow"> </i></span>
                                        <span>Kusum Chaudhary</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-envelope text-yellow"> </i></span>
                                        <span>sales@upswale.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="theme-block parent box-hover-effect">
                                <div class="contact-outer">
                                    <h5 class="d-i-b">SAHARANPUR</h5>
                                    <p class="font-12 p-0 m-0 mt-3 mb-1">
                                        <span><i class="fa fa-home text-yellow"> </i></span>
                                        <span>Upswale.com</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map-marker text-yellow"> </i></span>
                                        <span>C-29 Comminity Center,Shivalik Nagar,Saharanpur</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map text-yellow"> </i></span>
                                        <span>247001</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-phone text-yellow"> </i></span>
                                        <span>9358837799, 9319337799</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-user text-yellow"> </i></span>
                                        <span>Priyanka Bhola</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-envelope text-yellow"> </i></span>
                                        <span>services@upswale.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="theme-block parent box-hover-effect">
                                <div class="contact-outer">
                                    <h5 class="d-i-b">MUZAFFAR NAGAR</h5>
                                    <p class="font-12 p-0 m-0 mt-3 mb-1">
                                        <span><i class="fa fa-home text-yellow"> </i></span>
                                        <span>Upswale.com</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map-marker text-yellow"> </i></span>
                                        <span>302 New Mandi ,Muzaffarnagar.</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-map text-yellow"> </i></span>
                                        <span>251001</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-phone text-yellow"> </i></span>
                                        <span>9319499472, 9319337799</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-user text-yellow"> </i></span>
                                        <span>Vinay Shrivastava</span>
                                    </p>
                                    <p class="font-12 p-0 m-0 mb-1">
                                        <span><i class="fa fa-envelope text-yellow"> </i></span>
                                        <span>lubna@upswale.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="theme-block parent box-hover-effect">
                                <div class="contact-outer d-flex align-items-center justify-content-center" style="height: 100%; flex-direction: column;">
                                    <p>For any enquiry please</p>
                                    <h5 class="mb-3">Feel free to call us</h5>
                                    <a href="tel:+918171227799" class="theme-btn flash">CALL NOW</a>
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

    {{-- Required optional JS --}}

@endsection