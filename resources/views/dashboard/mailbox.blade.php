@extends('layouts.dashboard')

@section('head')
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="/db/css/pace-theme-flash.css">
    <script type="text/javascript" src="/db/js/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="/db/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="/db/css/themify-icons.css">
    <!-- Malihu Scrollbar-->
    <link rel="stylesheet" type="text/css" href="/db/css/jquery.mCustomScrollbar.min.css">
    <!-- Animo.js-->
    <link rel="stylesheet" type="text/css" href="/db/css/animate-animo.min.css">
    <!-- Flag Icons-->
    <link rel="stylesheet" type="text/css" href="/db/css/flag-icon.min.css">
    <!-- Bootstrap Progressbar-->
    <link rel="stylesheet" type="text/css" href="/db/css/bootstrap-progressbar-3.3.4.min.css">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="/db/css/font-awesome.min.css">
    <!-- Summernote-->
    <link rel="stylesheet" type="text/css" href="/db/css/summernote.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="/db/css/first-layout.css">
    <style>
      html, body, .main-container, .page-container, .page-content, .mailbox, .mailbox > .col-md-5,
      .mailbox > .col-md-5 > #inbox,  .mailbox > .col-md-7, .mailbox > .col-md-7 > .single-mail{
        height: 100%;
      }
      .page-content {
        max-height: none;
        min-height: 0;
      }
      .main-container {
        overflow-y: hidden;
      }
      .single-mail {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding; 15px 20px 75px 20px;
      }
      .single-mail > div:nth-child(1) {
        flex-basis: 60px;
      }
      .single-mail > .chat-box {
        flex-basis: auto;
        height: 73%;
      }
      .single-mail > .input-box {
        flex-basis: 50px;
        height: 50px;
      }
      .mailbox .inbox:nth-child(1) {
        margin-bottom: 0;
      }
    </style>
@endsection

@section('content')
    <div class="page-container">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mt-0 mb-5">Inquiries</h4>
                        <ol class="breadcrumb mb-0">
                            <li><a href="">Customer Messages</a></li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group mt-5">
                            <button type="button" class="btn btn-default btn-outline"><i class="flag-icon flag-icon-us mr-5"></i> English</button>
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-outline dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                            <!--
<ul class="dropdown-menu dropdown-menu-right animated fadeInDown">
    <li><a href="mailbox.html#"><i class="flag-icon flag-icon-de mr-5"></i> German</a></li>
    <li><a href="mailbox.html#"><i class="flag-icon flag-icon-fr mr-5"></i> French</a></li>
    <li><a href="mailbox.html#"><i class="flag-icon flag-icon-es mr-5"></i> Spanish</a></li>
    <li><a href="mailbox.html#"><i class="flag-icon flag-icon-it mr-5"></i> Italian</a></li>
    <li><a href="mailbox.html#"><i class="flag-icon flag-icon-jp mr-5"></i> Japanese</a></li>
</ul>
-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content container-fluid p-0">
                {!! csrf_field() !!}
                <div class="row row-0 mailbox">
                    <div class="col-md-5">
                        <ul class="media-list inbox">
                          <li data-brackets-id="207" class="media">
                                <div data-brackets-id="208" class="pull-left">
                                    <div data-brackets-id="209" class="form-group has-feedback mb-0">
                                        <input data-brackets-id="210" type="text" aria-describedby="inputSearchInbox" placeholder="Search inbox..." class="form-control rounded"><span data-brackets-id="211" aria-hidden="true" class="ti-search form-control-feedback"></span><span data-brackets-id="212" id="inputSearchInbox" class="sr-only">(default)</span>
                                    </div>
                                </div>
                                <div data-brackets-id="213" class="pull-right">
                                    <div data-brackets-id="214" role="toolbar" aria-label="Toolbar with button groups" class="btn-toolbar">
                                        <div data-brackets-id="215" role="group" aria-label="First group" class="btn-group">
                                            <button data-brackets-id="216" type="button" class="btn btn-outline btn-default"><i data-brackets-id="217" class="ti-archive"></i></button>
                                            <button data-brackets-id="218" id="msg-del-btn" type="button" class="btn btn-outline btn-default"><i data-brackets-id="219" class="ti-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="media-list inbox" id="inbox">
                        </ul>
                    </div>
                    <div class="col-md-7">
                        <div class="single-mail">
                            <div class="clearfix">
                              <h5 class='avatar' style="display: flex; align-items: center; justify-content: space-between; align-content: center;">
                                 <div style="flex-grow: 5; text-align: center;">
                                    <img id="otherImg" src="" alt="" class="media-object img-circle"  style="display:inline-block;">
                                    <a id="otherEmail" href="#"  style="display:inline-block;"></a>
                                 </div>

                                 <a href="#" style="flex-grow: 1; text-align:right;"><i class="ti-reload"></i></a>
                              </h5>

                              <!--
                                <div class="media">
                                  <div class="media-left avatar">
                                    <img src="../images/users/13.jpg" alt="" class="media-object img-circle"> </div>
                                    <div style="width:auto; text-align:center;" class="media-body">
                                      <h5 class="media-heading"><a href="mailto:christian.lane@gmail.com" >Christian Lane</a></h5>
                                    </div>
                                    <div class="pull-right">
                                       <div class="btn-group">
                                            <button type="button" class="btn btn-outline btn-default"><i class="ti-reload"></i></button>
                                      </div>
                                  </div>
                                </div>
-->
                                <div class="pull-right">
                                    <div role="toolbar" aria-label="Toolbar with button groups" class="btn-toolbar">


                                           <!--
                                            <ul role="menu" class="dropdown-menu pull-right animated fadeInDown">
                                                <li><a href="mailbox.html#">Reply</a></li>
                                                <li><a href="mailbox.html#">Reply To All</a></li>
                                                <li><a href="mailbox.html#">Forward</a></li>
                                                <li><a href="mailbox.html#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="mailbox.html#">Print</a></li>
                                                <li><a href="mailbox.html#">Mark as spam</a></li>
                                                <li><a href="mailbox.html#">Mark as unread</a></li>
                                                <li><a href="mailbox.html#">Delete this message</a></li>
                                            </ul>
                                        </div>
                                        -->
                                        <!--
                                        <div role="group" aria-label="Second group" class="btn-group">
                                            <button type="button" class="btn btn-outline btn-default"><i class="ti-angle-left"></i></button>
                                            <button type="button" class="btn btn-outline btn-default"><i class="ti-angle-right"></i></button>
                                          </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="chat-box">
                              <ul class="chat-content mCustomScrollbar" id="chat-list">

                              </ul>

                            </div>

                            <div class="input-group inbox-text-input-box">
                              <input type="text" id="msgTxt" class="form-control input-lg" placeholder="">
                              <span class="input-group-btn">
                                <button type="button" id="sendMsg" class="btn btn-raised btn-success btn-lg">Send</button>
                              </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/template" id="msgListTemplate">
            <li class="media" data-conv-id="{hashedId}">
                <div class="checkbox-custom pull-left">
                    <input id="mailboxCheckbox{idx}" name="msgsToDelete[]" type="checkbox" value="{hashedId}">
                    <label for="mailboxCheckbox{idx}"></label>
                </div> <a class="loadMsg" href="javascript:loadMsg({otherId}, {listingId}, false, null, null);">
                    <div class="media-left avatar"><img src="{{func::img_url('{otherAvatar}', 34, 34)}}" alt="" class="media-object img-circle"></div>
                    <div class="media-body">
                        <h6 class="media-heading">{otherName}</h6>
                        <h5 class="title">Re: {listingTitle}</h5>
                        <p class="summary">{body}</p>
                    </div>
                    <div class="media-right text-nowrap">{}</i>
                        <time datetime="{sentAt}" class="fs-11">{sendAtHuman} ago</time>
                    </div>
                </a>
            </li>
        </script>
        <script type="text/template" id="leftMsg">
          <li class="media">
            <div class="media-left avatar">
              <img src="{{func::img_url('{user.companyLogoUrl}', 34, 34)}}" alt="" class="media-object img-circle mCS_img_loaded" data-pin-nopin="true">
             </div>
             <div class="media-body">
               <p>{msg.body}</p>
               <time datetime="{msg.sentAt}" class="fs-11 text-muted">{msg.sentAt}</time>
             </div>
          </li>
        </script>

        <script type="text/template" id="rightMsg">
          <li class="media other">
            <div class="media-body">
              <p>{msg.body}</p>
              <time datetime="{msg.sentAt}" class="fs-11 text-muted pull-right">{msg.sentAt}</time>
            </div>
            <div class="media-right avatar">
              <img src="{{func::img_url('{user.companyLogoUrl}', 34, 34)}}" alt="" class="media-object img-circle mCS_img_loaded" data-pin-nopin="true">
              <span class="status bg-success"></span>
            </div>
          </li>
        </script>

@endsection

@section('scripts')
    <!-- jQuery-->
    <script type="text/javascript" src="/db/js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="/db/js/bootstrap.min.js"></script>
    <!-- Malihu Scrollbar-->
    <script type="text/javascript" src="/db/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Animo.js-->
    <script type="text/javascript" src="/db/js/animo.min.js"></script>
    <!-- Bootstrap Progressbar-->
    <script type="text/javascript" src="/db/js/bootstrap-progressbar.min.js"></script>
    <!-- jQuery Easy Pie Chart-->
    <script type="text/javascript" src="/db/js/jquery.easypiechart.min.js"></script>
    <!-- Summernote-->
    <script type="text/javascript" src="/db/js/summernote.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="/db/js/app.js"></script>
    <script type="text/javascript" src="/db/js/demo.js"></script>
    <script type="text/javascript" src="/db/js/mustache.min.js"></script>
    <script type="text/javascript" src="/db/js/mailbox.js"></script>
    <script type="text/javascript" src="/db/js/nano.js"></script>
    <script type="text/javascript" src="/db/js/moment.min.js"></script>
    <script type="text/javascript" src="/db/js/lodash.min.js"></script>

    <script>

    var selfId = {{Auth::user()->id}};
    var chatroom = [];
    var currentRoom = 0;
    var currentListingId = 0;
    var dealer = {};
    var left = $('#leftMsg').html();
    var right = $('#rightMsg').html();

    function genMessages(otherId, listingId, newMessage) {
        if (typeof newMessage === 'undefined') {
           newMessage = false;
        }
        var other = _.find(chatroom, {"id": otherId.toString(), "listingId": listingId.toString()});
        $('#otherImg').attr('src', "{{func::img_url('',34 ,34)}}" + other.profile.companyLogoUrl);
        $("#otherEmail").attr("href", 'mailto:'+other.profile.email).html(other.headline.otherName);
        if (!newMessage) {
            $('#chat-list').mCustomScrollbar("destroy");
            $("#chat-list").html("");

            for( var i =0; i < other.messages.length; i++){
                if (other.messages[i].fromUserId === other.profile.id){
                    $(nano(left, {user: other.profile, msg: other.messages[i]})).prependTo('#chat-list');
                } else {
                    $(nano(right, {user: dealer, msg: other.messages[i]})).prependTo('#chat-list');
                }
            }
            var mHeight = parseInt($('.single-mail').css('height').replace('px', ''));
            $('#chat-list').mCustomScrollbar({
                theme: 'dark',
                setHeight: mHeight - 280,
            }).mCustomScrollbar("scrollTo", "bottom");
        } else {
            $('#chat-list').mCustomScrollbar("disable");
            if (other.messages[0].fromUserId === other.profile.id){
                $(nano(left, {user: other.profile, msg: other.messages[0]})).appendTo('#chat-list .mCustomScrollBox .mCSB_container');
            } else {
                $(nano(right, {user: dealer, msg: other.messages[0]})).appendTo('#chat-list .mCustomScrollBox .mCSB_container');
            }
            $('#chat-list').mCustomScrollbar('update');
            $('#chat-list').mCustomScrollbar("scrollTo", "bottom");

        }
    }

    function loadMsg(otherId, listingId, newMessage, page, size) {
        if (typeof newMessage === 'undefined') {
           newMessage = false;
        }
        if (typeof page === 'undefined') {
           page = 0;
        }
        if (typeof size === 'undefined') {
           size = 10;
        }

        if(typeof listingId === 'number') {
            listingId = listingId.toString();
        }
        if(typeof otherId === 'number'){
            otherId = otherId.toString();
        }
        $.ajax({
            url: '/api/mailbox',
            method: 'POST',
            dataType: "json" ,
            data: {
                page: page,
                size: size,
                otherId: otherId,
                listingId: listingId
            },
            headers: {'X-CSRF-Token': $('input[name=_token]').val()},
            success: function(res) {
                if (res.result === 1 ){

                    currentRoom = otherId;
                    currentListingId = listingId;
                    res.users.dealer.companyLogoUrl = res.users.dealer.companyLogoUrl || 'placeholder.png';
                    res.users.other.companyLogoUrl =  res.users.other.companyLogoUrl || 'placeholder.png';

                    dealer = res.users.dealer;

                    if(!_.find(chatroom, {"id": res.users.other.id, "listingId": listingId}).profile) {
                        _.find(chatroom, {"id": res.users.other.id, "listingId": listingId}).profile = res.users.other;
                    }
                    _.find(chatroom, {"id": res.users.other.id, "listingId": listingId}).messages = res.messages;
                    genMessages(otherId, listingId, newMessage);
                } else {
                    $("#chat-list").html("<li>"+ res.message +"</li>");
                }
            }
        });
    }
    function genChatList() {
        $('ul#inbox').html('');
        chatroom = _.sortBy(chatroom, function(room){
          return -(moment(room.headline.sentAt).unix());
        });

        chatroom.forEach(function(room) {
          var newConv = $(nano($('#msgListTemplate').html(), room.headline));
          newConv.appendTo('ul#inbox');
          newConv.find('a').on('click', function() {
            var that  = this;
            $('li.active').toggleClass('active');
            $(that).closest('li').toggleClass('active');
          });
        });
        $('#inbox li:first-child').toggleClass('active');
    }

    function initChatroom() {
      $.ajax({
        url: '/api/mailbox',
        method: 'GET',
        dataType: 'json',
        headers: {'X-CSRF-Token': $('input[name=_token]').val()},
        success: function(res) {
          if (res.result === 1) {
            if(res.messages.length > 0){
              $(res.messages).each(function(idx, msg) {
                msg.idx = idx;
                msg.senderCompanyLogoUrl = msg.senderCompanyLogoUrl || 'placeholder.png';
                msg.receiverCompanyLogoUrl = msg.receiverCompanyLogoUrl || 'placeholder.png';
                msg.sendAtHuman = moment(msg.sentAt).toNow(true);
                msg.listingTitle = (msg.listingTitle === null || msg.listingId === "0") ?'Enquiry on your dealer page': msg.listingTitle;
                var newRoom = {};
                newRoom.id = (msg.senderId !== selfId.toString()) ? msg.senderId : msg.receiverId;
                msg.otherName = (msg.senderId !== selfId.toString()) ? (msg.senderCompanyName || ((msg.sendFirstName && ( msg.senderFirstName + msg.senderLastName).trim() !== '') ? (msg.senderFirstName + " " + msg.senderLastName): ('User ' + msg.senderId))) : (msg.receiverCompanyName || (( msg.receiverFirstName && (msg.receiverFirstName + msg.receiverLastName).trim() !== '') ? (msg.receiverFirstName + " "+ msg.receiverLastName): ('User ' + msg.receiverId)));
                msg.otherAvatar = (msg.senderId !== selfId.toString()) ? msg.senderCompanyLogoUrl : msg.receiverCompanyLogoUrl;
                msg.otherId = newRoom.id;
                newRoom.listingId = msg.listingId
                newRoom.active = false;

                newRoom.headline = msg;
                chatroom.push(newRoom);
              });

              console.log(chatroom);
              genChatList();

              loadMsg(chatroom[0].id, chatroom[0].headline.listingId);
            }
          }
        },
        error: function(errMsg){
            console.log(errMsg.responseText);
        }
      });
    }

    initChatroom();

    function sendMsg() {
        var that = this;
        this.msg = {
            toUserId: currentRoom,
            listingId: currentListingId,
            content: $('#msgTxt').val()
        };

        $.ajax({
          url: "/api/mailbox/send",
          method: 'POST',
          data: msg,
          dataType: 'json',
          headers: {'X-CSRF-Token': $('input[name=_token]').val()},
          success: function(res) {
            $('#msgTxt').val('');
            var room = _.find(chatroom, {
                id: res.newMessage.toUserId.toString(),
                listingId: res.newMessage.listingId.toString()
            });
            room.messages.push(res.newMessage);
            room.headline.body = res.newMessage.body;
            room.headline.sentAt = res.newMessage.sentAt.date;
            room.headline.sendAtHuman = 'a second';
            genChatList();
            console.log(chatroom);
            loadMsg(res.newMessage.toUserId !== selfId.toString() ? res.newMessage.toUserId : res.newMessage.fromUserId , res.newMessage.listingId, true);
          }
        });
    }
    $('#sendMsg').on('click', function() {
        sendMsg();
    });
    $('#msgTxt').on('keyup', function(e) {
        if (e.which === 13) {
            sendMsg();
        }
    });


    $('#msg-del-btn').on('click', function(e) {
      e.preventDefault();
      var delMsgs = $('[name*=msgsToDelete]:checked').map(function(idx,ele) {
         return $(ele).val();
      });
      if (delMsgs.length > 0) {
        $.ajax({
          url: "/api/mailbox/delete",
          type: "POST",
          data: {
            "msgsToDelete[]": delMsgs.toArray()
          },
          dataType: 'json',
          headers: {'X-CSRF-Token': $('input[name=_token]').val()},
          success: function(res) {
            if (res.result == 1) {
               chatroom = [];
               currentRoom = 0;
               currentListingId = 0;
               dealer = {};
               initChatroom();
            }
          }
        });
      }
    });
    </script>
@endsection
