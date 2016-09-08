@extends('layouts.front')

@section('title')
    <title>{{ func::genTitle('Luxify FAQs', false)}}</title>
@endsection

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>
@section('meta-data')
    <meta name="keywords" content="online shopping,luxury goods,pre-owned,vintage, luxify faqs, luxury frequently asked questions">
    <meta name="description" content="Asia's leading marketplace for luxury.">
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
@endsection
@section('content')
    <!-- main banner of the page -->
    <section class="inner-banner parallax top-banner-image"style="background-image:url({{func::img_url('banners/faq-main.jpg', '', '', false, true)}});"
        <div class="container">
            <div class="banner-text faq-class">
                <div class="banner-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Frequently Asked Questions</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main" class="faq-page">
        <!-- terms and condition text block -->
        <div class="content-wrapper">
            <div class="container">
                <!-- new grid -->
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">

                        <div class="title">FAQs</div>

                        <!-- About Luxify -->
                        <div class="FAQTitle"><u>About Luxify</u></div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    What is Luxify?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    Luxify is Asia’s leading marketplace for luxury. Luxury enthusiasts visit our platform to discover, search and browse through a whole host of the very finest new, vintage and pre-owned luxury goods in a safe and simple way.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    Where is Luxify located?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    Our headquarters is located in Hong Kong and we have operating offices in London, Singapore and Shanghai as well as partners in Jakarta and Manilla.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    How does Luxify work?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    Buying on Luxify is free of charge. Luxify simply connects buyers with the best dealers of luxury around the world.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    Who visits Luxify?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    Luxify is the leading marketplace for luxury in Asia. Our audience is from across the world with a primary user base made of affluent shoppers from Asia (China, Hong Kong and South East Asia).
                                </div>
                            </div>
                        </div>
                        <!-- ---- -->
                        <div class="FAQTitle"><u>Buying on Luxify</u></div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    Is it safe to buy luxury products on Luxify?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    Luxify only partners with the most reputable dealers of luxury around the world. We have genuine and established business relationships with all our dealers. We also adhere to a very strict screening process to onboard new dealers Luxify.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    Are the products listed on Luxify genuine and authentic?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    Luxify only showcases products from reputable luxury dealers, all of which are carefully selected through an approval process. Additionally, we have very strict acceptance criteria on the products listed on Luxify and our Concierge team check and manually approved every single listing before they are released on Luxify. As part of the listing process, our dealers are encouraged to provide proof of authenticity.
                                    <br/><br/>
                                    As a buyer, we highly encourage you to ask for any stamps or marks that verify the authenticity of your desired product in your discussions with the dealer.
                                    <br/><br/>
                                    Finally, depending on the product category, Luxify has access to a network of qualified experts that can help you in assessing both the authenticity and value of a product that is of interest to you.

                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    Does Luxify evaluate products prior to being featured on Luxify?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    All our listings are carefully and manually evaluated, checked and vetted against a set of stringent criteria. However, as a marketplace we do not hold any inventory.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    How do I get in touch with a dealer?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    On Luxify you can directly contact the dealer. Simply click on the button “Contact Dealer” located on the product description page and fill in the required details. Some dealers also
                                    <br/><br/>
                                    provide their phone number in their Luxify dealer page that you can access by clicking the “Dealer page” button.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    Can I negotiate on Luxify?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    On Luxify you can communicate directly with a dealer. Starting a conversation is key in any transaction and you can negotiate on any particular item with a seller.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    How do I do if a dealer does not respond?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    In some cases, a dealer may have a small operation and you may need to allow them a few days to respond to your inquiry. However, if you do not hear from them, please contact us at concierge@luxify.com and we will assist you in connecting with the dealer.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    How much does it cost to buy on Luxify?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    Buying on Luxify is free of charge. As a buyer you simply contact Luxify dealers directly online and settle the transaction offline or offline.
                                </div>
                            </div>
                        </div>
                        <!-- ---- -->
                        <div class="FAQTitle"><u>Selling on Luxify</u></div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    What is the process to become a dealer on Luxify?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    Luxify only showcases products from reputable luxury dealers, all of which are carefully selected through an approval process. To become a Luxify dealers, simply apply <a href="https://www.luxify.com/dealer-application"> HERE </a> and our Concierge team will review your application within two working days.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    As a Seller how do I add a product on Luxify?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    Once our Concierge team has approved your account, you will be notified by email that you can start uploading your products. Products can be uploaded manually or automatically. We have experience in working with large dealers and can easily integrate with a wide of systems to make the listing process of large quantity of products effortless.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    Can I cancel or edit a product on Luxify?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    Once a product is listing on Luxify, you can cancel it if it has been sold and edit all the parameters such products description, photos or price information.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    How much does it cost to list on Luxify?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    We do not take commissions and our pricing model is based on subscription plans that are tailored the type of features needed.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    Do you provide other value add services?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    We offer a wide range of marketing services to promote your brand and products to our audience including email marketing, social media marketing including Chinese social channels such as WeChat & Weibo and content creation and distribution in our luxury blog.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    Does Luxify play an active role in the transaction process?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    We do not take any commission and get involved in the transactions between buyers and Luxify dealers. Luxify dealers use our platform to promote both their brands and products to our highly targeted audience and to generate new leads.
                                </div>
                            </div>
                        </div>
                        <div class="FAQBox">
                            <div class="question"><div class="BigQA">Q.</div>
                                <div class="BigQAction">
                                    Can I sell on Luxify if I am a private seller?
                                </div>
                            </div>
                            <div class="answer"><div class="BigQA">A.</div>
                                <div class="BigQAction">
                                    Luxify only showcases products from Luxify registered luxury dealers, all of which are carefully selected through an approval process. We do not work with private sellers but can assist you in leveraging our dealer network.
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- end of new grid -->
                </div>
            </div>
            <!-- end of terms and conditions -->
    </main>
    <!-- end of main part -->
@endsection
@section('scripts')
    <script>

        $(document).ready(function(){

            $('.FAQBox').click(function(e) {
                console.log('b');
                var $this = $(this).find('.answer');
                $('.max-height600px').removeClass('max-height600px');
                $this.addClass('max-height600px');

            });


        });
    </script>
@endsection
