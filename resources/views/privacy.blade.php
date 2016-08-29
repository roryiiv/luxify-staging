@extends('layouts.front')

@section('title')
  <title>{{ func::genTitle('Privacy Policy', false)}}</title>
@endsection

<?php $user_id = Auth::user() ? Auth::user()->id : ''; ?>

@section('meta-data')
  <meta name="keywords" content="luxify privacy policy"> 
  <meta name="description" content=" Privacy Policy and Personal Information Collection Statement related to the access to the LUXIFY website.">
@endsection

@section('style')
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/assets/css/luxify.css">
@endsection
@section('content')
    <!-- main banner of the page -->
	<section class="inner-banner parallax" style="background-image:url(/assets/images/about-banner.jpg);">
		<div class="container">
            <div class="banner-text">
                <div class="banner-center">
				  <div class="row">
					  <div class="col-lg-12">
						<h1>Privacy Policy</h1>
					   </div>
				   </div>
				  <div class="row">
					  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
						<ul class="privacy-list">
							<li><a class="smooth-scroll" href="#uk">UK</a></li>
							<li><a class="smooth-scroll" href="#hk">Hong Kong</a></li>
							<li><a class="smooth-scroll" href="#singapore">Singapore</a></li>
						</ul>
					   </div>
				   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of banner -->
    <!-- main informative part of the page -->
    <main id="main">
        <!-- terms and condition text block -->
        <div class="content-wrapper m_privacy">
            <div class="container">
                <!-- new grid -->
                      <div class="row">
                          <div class="col-sm-10 col-sm-offset-1">
                <article class="privacy-section" id="uk">
                    <h1 class="text-bold">Privacy Policy</h1>
                    <h3 class="space"></h3>
                    <h3 class="btm-space">Privacy Policy and Personal Information Collection Statement ("Privacy Statement")</h3>
                  <p>Welcome to www.luxify.com‘s online platform operated by Luxify Limited ("LUXIFY", the "Company", "we", "our", or "us"). By accessing to the LUXIFY website, all other websites owned and operated by LUXIFY including www.luxifyit.com, www.luxify.com.hk and www.luxify.com.hk that redirect to www.luxify.com, and its related websites (collectively, the "Site") and using of our platform and related services owned and operated by LUXIFY (collectively, the "Services"), you acknowledge that you have read, understood, and agree to the Privacy Policy and Personal Information Collection Statement (collectively, the "Privacy Statement"). Please note that this Privacy Statement may be amended from time to time without prior notice. You are advised to check for the latest version on a regular basis.</p>

                  <p>Your privacy is important to LUXIFY and we respect the privacy rights of visitors or users to the Site and of members who use the Company’s Services.</p>

                  <p>We are committed to protecting the privacy, confidentiality and security of the personal data we hold by complying with the requirements of Personal Data (Privacy) Ordinance (Chapter 486) under the laws of Hong Kong Special Administration Region of the People’s Republic of China ("HKSAR") (the "PDPO") with respect to the management of personal data. In doing so, we endeavor to ensure that our employees shall comply with the PDPO in the strictest standards of security and confidentiality.</p>

                    <h3 class="btm-space">Purpose of Collection and Use of Personal Data</h3>
                  
                  <p>In order to facilitate or accessing certain Services in the Site, you may be requested by LUXIFY to give your personal data. You may decline to provide the Company with the requested personal data, but in such case the Company may not be able to provide certain Services to you.</p>

                  <p>Types of personal data are collected by the Company may include:</p>
<ul class="condition-list">
<li>Your personal identification information and contact details (i.e. your name, gender, date of birth, identity card number, email address(es), telephone number(s), postal address, nationality, educational level, occupation and interests);</li>
<li>Your business information (i.e. company name, business title, address of principal registered office and nature of the business);</li>
<li>Your social media platforms account information (i.e. facebook accounts, WeChat accounts and etc.); and
Other information (i.e. account activities, all sale and purchase transactions, types and specifications of the goods, pricing and delivery information, IP addresses, browser software, operating system, software and hardware attributes, pages viewed and etc.)</li>
</ul>
                  
<p>Personal data collected online shall only be disclosed within our corporate group for internal use and to the Buyer/Seller for facilitation of transaction only.  We shall in no event provide your personal data to any other third parties for direct marketing or other unrelated purposes except with your express consent.</p>

<p>We collect and may use your personal data for the following purposes:</p>

<ul class="condition-list">
  <li>To process of your membership application for the Services;</li>
  <li>To enable the provision of the Services to you that you request;</li>
  <li>To administer and manage account and account activities;</li>
  <li>To analyze, verify, enforce contractual rights, and/or check your credit, payment and/or status in relation to the provision of the Service to you;</li>
  <li>To process payment instructions, direct debit facilities and/or credit facilities in relation to the provision of the Services in which we may transfer your PayPal account and credit card information to the seller and/or the payment processor we designate from time to time;</li>
  <li>To process orders placing by the Users and deliver the respective products and services to the Users in which we may transfer your address and contact details to the seller or the logistic partners we designate from time to time;</li>
  <li>To improve our marketing and promotional efforts by conducting market research or customers’ surveys for service improvement;</li>
  <li>To advertise, promote and market our Services to you by the Company, related companies, agents and contractors;</li>
  <li>To compile aggregate statistics on website usage, generate reports and analyze the same;</li>
  <li>To improve our content and product offerings;</li>
  <li>To customize our Site’s content, layout and service specifically for you;</li>
  <li>To handle your account enquiries and your complaints;</li>
  <li>To investigate your complaints and suspected suspicious transactions;</li>
  <li>To facilitate proper operation of our Site and business activities of its Users including without limitation to facilitation of effective communication between buyers and Sellers and marketing activities of Users;</li>
  <li>To make such disclosures as required by the applicable laws, rules and regulations; and</li>
  <li>Any other purposes relating to the activities identified above.</li>
</ul>
                    <h3 class="btm-space">Cookies</h3>
<p>We may use "Cookie" to store and track specific information about you and your visit to the Site, including your IP addresses, the types and configurations of browsers, internet service providers, language settings, geo-locations, operating systems, previous sites visited, and time/ durations and the pages visited (the "Visitor Data"). We may use the Visitor Data for website enhancement and optimization purposes. We do not use, and have no intention to use the visitor data to personally identify anyone.</p>

<p>"Cookies" used in any part of the Site shall in no event be deployed for collecting personally identifiable information. For your information, a "Cookie" is a small amount of data that is sent to your browser and can be stored in your computers’ hard drive for the purposes of obtaining configuration information and analyzing your viewing habits.</p>

<p>Most web browsers are initially set up to accept cookies. You can choose not to accept or reject the "cookies" by modifying the relevant Internet options or browsing preferences of your computer system at any time, but if you do so you may find that certain functions or Services provided or to be provided by us on the Site unavailable.</p>

                    <h3 class="btm-space">Direct Marketing</h3>
                  
<p>Your personal identification information and contact details including your name, telephone number, mobile telephone number, email address, residential address, facebook account, and/or any other social medial platforms accounts collected by us will be used for direct marketing purposes in providing you with any information about our Services and special offers on the Services in relation to motors, yachting, fine wine and spirits, watches, jewellery, fashion, bags and footwear to be provided by us.</p>

<p>We cannot use your personal data unless we have received your consent or indication of no objection.</p>

                    <h3 class="btm-space">Retention of Personal Data</h3>
                  
<p>The Company will only retain your personal data for as long as is necessary to fulfill the purposes specified above for which the personal data were originally created, unless there is a mandatory legal requirement for us to keep your personal data for a specified period.</p>

<p>The Company will destroy periodically any unnecessary personal data it may hold in its system in accordance with our internal policy.</p>

<h3 class="btm-space">Access to and Correction of Personal Data</h3>

<p>Under the PDPO, you have the right to:</p>

<ul class="condition-list">
  <li>ascertain whether the Company holds any of your personal data and if so, obtain copies of such data;</li>
  <li>request access to your personal data held by us;</li>
  <li>request to correct your personal data which is inaccurate;</li>
  <li>ascertain the Company’s policies and practices established from time to time in relation to personal data and the types of personal data held by us.</li>
</ul>


<p>If you want to access and/or correct your personal data, or if you want to ascertain the kind of your personal data held by us, please contact our data protection officer in writing either by post or email at:</li>

<p style="text-align:center; padding: 20px  50px">Level 9, Core C, Cyberport 3, 100 Cyberport Road, Hong Kong Email: <a href="mailto:concierge@luxify.com" target="_blank">concierge@luxify.com</a></p>

<p>The Company reserves the right to charge you a reasonable fee for complying with a data access request as permitted under the PDPO.</p>

<h3 class="btm-space">Security, Transfer and Disclosure of Personal Data</h3>

<p>All personal data you have submitted to the Site is secured on our website with restricted access by authorized personnel only. Our own personnel will be instructed to observe duty of confidentiality and the terms of this Privacy Statement when accessing your personal data.  All data transmission will be encrypted so as to ensure its privacy is maintained. However, no data transmission over the Internet or any wireless network can be guaranteed to be perfectly secured. You acknowledge that we cannot absolutely guarantee the security of any information you provide to us and you do so at your own risk.</p>

<p>All personal data collected and held by the Company will be kept confidential. However, we reserve the rights, where such disclosure is necessary, to transfer or disclose your personal data and other related information you have provided to us to the following parties:</p>

<ul class="condition-list">
<li>any company within the group of LUXIFY, their respective subsidiaries, our agents, contractors for the provision of products and/or services that you ordered and/or subscribed to;</li>
<li>competent court of law, law enforcement agencies, statutory or regulatory authorities, institutions or organizations;</li>
<li>banks, financial institutions, credit card issuing companies, debt collection agencies and other related service providers involved in the sale, administration or provision of the Services;</li>
<li>our professional advisers;</li>
<li>the counterparty of the transaction concluded through us for the purpose of facilitating transfer of funds;</li>
<li>any of our actual or proposed assignees or transferees of our rights with respect to you.</li>
</ul>
<h3 class="btm-space">Language</h3>

<p>In case there is any inconsistency or conflict between the English and Chinese versions, the English version shall prevail.</p>

                
                </div>
                 </div> <!-- end of new grid -->
            </div>
        </div>
        <!-- end of terms and conditions -->
    </main>
    <!-- end of main part -->
@endsection
@section('scripts')
@endsection
