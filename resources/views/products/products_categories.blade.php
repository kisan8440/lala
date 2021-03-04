@extends('layouts.app')

@section('css')

    {{-- Page title --}}
    <title>Products categories | Upswale.com</title>

    {{-- Required option css internal and external --}}

    <style>
        .service-c .main-image img{
            height: auto;
            max-height: 80%;
            width: auto;
            max-width: 80%;
        }
        .bg-cool-svg{
            background-position: 0% 190% !important;
            background-repeat: no-repeat !important;
        }
        .theme-block p{
            color: #2e2e2e;
        }
    </style>

@endsection

@section('content')

    {{-- Page content --}}
    <section>
        <div class="container">
            <h4 class="page-heading text-capitalize">
                {{ $category ?? '' }} Product
            </h4>
        </div>
        <div class="container mb-2">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="theme-block parent box-hover-effect bg-cool-svg">
                        <div class="row products-row d-flex align-items-center justify-content-center service-c">
                            <div class="col-sm-6">
                                <p class="mb-0 mt-2 text-justify">
                                    American Power Conversion (APC) provides protection against some of the leading causes of downtime, data loss and hardware damage: power problems and temperature. As a global leader in network-critical physical infrastructure (NCPI) solutions, APC sets the standard in its industry for quality, innovation and support. Its comprehensive solutions, which are designed for both home and corporate environments, improve the manageability, availability and performance of sensitive electronic, network, communications and industrial equipment of all sizes.
                                </p>
                                <div class="text-center">
                                    <a class="theme-btn mb-2 mt-4 text-uppercase flash" href="{{ route('products.categories', 'su-kam') }}">Go to page</a>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-center justify-content-center main-image">
                                <img src="{{ asset('./public/assets/images/images/cat-1.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="theme-block parent box-hover-effect bg-cool-svg">
                        <div class="row products-row d-flex align-items-center justify-content-center service-c flex-md-row-reverse">
                            <div class="col-sm-6">
                                <p class="mb-0 mt-2 text-justify">
                                    In a country like India where 24 x 7 power supply is still a distant dream, BPE has been an active participant in fulfilling this goal for over a decade with the mission to provide cost effective and reliable power solutions to its customers driven by our belief that work should never stop. BPE with its headquarters at Noida, India, was established in the year 2000. The company has strategically expanded itself step by step, year after year, by providing power solutions for IT, Industrial & Critical equipment, telecom, data centers & electro-medical gadgets.
                                </p>
                                <div class="text-center">
                                    <a class="theme-btn mb-2 mt-4 text-uppercase flash" href="{{ route('products.categories', 'su-kam') }}">Go to page</a>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-center justify-content-center main-image">
                                <img src="{{ asset('./public/assets/images/images/cat-2.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="theme-block parent box-hover-effect bg-cool-svg">
                        <div class="row products-row d-flex align-items-center justify-content-center service-c">
                            <div class="col-sm-6">
                                <p class="mb-0 mt-2 text-justify">
                                    CyberPower is a leading provider of professional power management solutions. We provide reliable computer battery backup systems, power management applications, and series of computer accessories for desktop, workstation, and network equipment. Available through authorized distributors, VARs, retail, mail order and e-commerce resellers, CyberPower state-of-the-art UPS systems include advanced features in a compact, lightweight, easy-to-use system.CyberPower produces the most affordable line of dependable uninterruptible power systems and offers the most feature-rich intelligent battery backup power protection units on the market today.
                                </p>
                                <div class="text-center">
                                    <a class="theme-btn mb-2 mt-4 text-uppercase flash" href="{{ route('products.categories', 'su-kam') }}">Go to page</a>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-center justify-content-center main-image">
                                <img src="{{ asset('./public/assets/images/images/cat-3.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="theme-block parent box-hover-effect bg-cool-svg">
                        <div class="row products-row d-flex align-items-center justify-content-center service-c flex-md-row-reverse">
                            <div class="col-sm-6">
                                <p class="mb-0 mt-2 text-justify">
                                    Eaton’s power quality portfolio encompasses a comprehensive suite of power management solutions, including uninterruptible power supplies (UPSs), surge protective devices, power distribution units (PDUs), remote monitoring, software, power factor correction, airflow management, rack enclosures and services. With all our products, Eaton strives for continued success in leveraging technical innovation to develop next-generation solutions. Eaton has continually grown its power quality business through developing innovative products and services as well as strategic acquisitions of companies like Powerware, MGE Office Protection Systems, Best Power,Pulizzi and Aphel.
                                </p>
                                <div class="text-center">
                                    <a class="theme-btn mb-2 mt-4 text-uppercase flash" href="{{ route('products.categories', 'su-kam') }}">Go to page</a>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-center justify-content-center main-image">
                                <img src="{{ asset('./public/assets/images/images/cat-4.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="theme-block parent box-hover-effect bg-cool-svg">
                        <div class="row products-row d-flex align-items-center justify-content-center service-c">
                            <div class="col-sm-6">
                                <p class="mb-0 mt-2 text-justify">
                                    Luminous Power Technologies is the leading home electrical specialist in India having a vast portfolio comprising of Power back up solutions such as Home UPS, Inverter Batteries and Solar Applications to Electrical offerings such as Fans, Wires & Switches. With 7 manufacturing units, more than 28 sales offices in India and presence in over 36 countries our 6000 employees serve more than 60,000 channel partners and millions of customers. Our motto has always been Customer Delight through Innovation & Passion with focus on Execution & Team-work. At Luminous, we passionately innovate to make life comfortable and efficient.
                                </p>
                                <div class="text-center">
                                    <a class="theme-btn mb-2 mt-4 text-uppercase flash" href="{{ route('products.categories', 'su-kam') }}">Go to page</a>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-center justify-content-center main-image">
                                <img src="{{ asset('./public/assets/images/images/cat-5.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="theme-block parent box-hover-effect bg-cool-svg">
                        <div class="row products-row d-flex align-items-center justify-content-center service-c flex-md-row-reverse">
                            <div class="col-sm-6">
                                <p class="mb-0 mt-2 text-justify">
                                    Su-Kam is India’s most well-known solar power solutions company. According to a recent report, it is leading India’s residential solar market with maximum market share. Its solar products have won many awards and certifications.Su-Kam is one of the most successful examples of ‘Make in India’. Founded in 1998 as a startup, Su-Kam has grown at an exponential rate to become an Indian MNC. Innovation has always been the key mantra at Su-Kam due to which the company holds a record for filing maximum patents in India in power back-up sector.
                                </p>
                                <div class="text-center">
                                    <a class="theme-btn mb-2 mt-4 text-uppercase flash" href="{{ route('products.categories', 'su-kam') }}">Go to page</a>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-center justify-content-center main-image">
                                <img src="{{ asset('./public/assets/images/images/cat-6.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="theme-block parent box-hover-effect bg-cool-svg">
                        <div class="row products-row d-flex align-items-center justify-content-center service-c">
                            <div class="col-sm-6">
                                <p class="mb-0 mt-2 text-justify">
                                    MICROTEK INTERNATIONAL P. LTD., is the country’s Largest Power Products manufacturer having products like LINE INTERACTIVE UPS, ONLINE UPS, DIGITAL & INTELLI PURE SINE-WAVE INVERTERS / UPS EB / UPS E²+ and HYBRID UPS 24×7. Microtek has set up State-of-the-art automatic Manufacturing Plants equipped with Hi-Tech Machines. Some of them are SMT, ICT and Automatic Assembly Lines etc. MICROTEK has set up modern In-house Comprehensive R&D, comprising of a Team of highly qualified and experienced professionals. The R&D is fully equipped with latest design software’s, development hardware’s with testing and field condition simulation equipments.
                                </p>
                                <div class="text-center">
                                    <a class="theme-btn mb-2 mt-4 text-uppercase flash" href="{{ route('products.categories', 'su-kam') }}">Go to page</a>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-center justify-content-center main-image">
                                <img src="{{ asset('./public/assets/images/images/cat-7.png') }}" alt="">
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
