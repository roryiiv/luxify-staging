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
@endsection

@section('content')
    <div class="page-content container-fluid p-0">
                <div class="row row-0 mailbox">
                    <div class="col-md-5">
                        <ul class="media-list inbox">
                            <li class="media">
                                <div class="pull-left">
                                    <div class="form-group has-feedback mb-0">
                                        <input type="text" aria-describedby="inputSearchInbox" placeholder="Search inbox/db." class="form-control rounded"><span aria-hidden="true" class="ti-search form-control-feedback"></span><span id="inputSearchInbox" class="sr-only">(default)</span>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <div role="toolbar" aria-label="Toolbar with button groups" class="btn-toolbar">
                                        <div role="group" aria-label="First group" class="btn-group">
                                            <button type="button" class="btn btn-outline btn-default"><i class="ti-archive"></i></button>
                                            <button type="button" class="btn btn-outline btn-default"><i class="ti-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="checkbox-custom pull-left">
                                    <input id="mailboxCheckbox1" type="checkbox" value="value1">
                                    <label for="mailboxCheckbox1"></label>
                                </div>
                                <a href="javascript:;">
                                    <div class="media-left avatar"><img src="/db/images/users/02.jpg" alt="" class="media-object img-circle"> </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Mark Barnett</h6>
                                        <h5 class="title">Posuere convallis sociis nisi euismod</h5>
                                        <p class="summary">Arcu sed in tortor non convallis laoreet commodo ullamcorper ultrices/db.</p>
                                    </div>
                                    <div class="media-right text-nowrap">
                                        <time datetime="2015-12-10T20:50:48+07:00" class="fs-11">9 mins</time>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <div class="checkbox-custom pull-left">
                                    <input id="mailboxCheckbox2" type="checkbox" value="value2">
                                    <label for="mailboxCheckbox2"></label>
                                </div>
                                <a href="javascript:;">
                                    <div class="media-left avatar"><img src="/db/images/users/11.jpg" alt="" class="media-object img-circle"> </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Alexander Gilbert</h6>
                                        <h5 class="title">Posuere convallis sociis nisi euismod</h5>
                                        <p class="summary">Arcu sed in tortor non convallis laoreet commodo ullamcorper ultrices/db.</p>
                                    </div>
                                    <div class="media-right text-nowrap"><i class="ti-clip"></i>
                                        <time datetime="2015-12-10T20:42:40+07:00" class="fs-11">15 mins</time>
                                    </div>
                                </a>
                            </li>
                            <li class="media read">
                                <div class="checkbox-custom pull-left">
                                    <input id="mailboxCheckbox3" type="checkbox" value="value3">
                                    <label for="mailboxCheckbox3"></label>
                                </div>
                                <a href="javascript:;">
                                    <div class="media-left avatar"><img src="/db/images/users/12.jpg" alt="" class="media-object img-circle"> </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Amanda Collins</h6>
                                        <h5 class="title">Posuere convallis sociis nisi euismod</h5>
                                        <p class="summary">Arcu sed in tortor non convallis laoreet commodo ullamcorper ultrices/db.</p>
                                    </div>
                                    <div class="media-right text-nowrap">
                                        <time datetime="2015-12-10T20:35:35+07:00" class="fs-11">22 mins</time>
                                    </div>
                                </a>
                            </li>
                            <li class="media active">
                                <div class="checkbox-custom pull-left">
                                    <input id="mailboxCheckbox4" type="checkbox" value="value4">
                                    <label for="mailboxCheckbox4"></label>
                                </div>
                                <a href="javascript:;">
                                    <div class="media-left avatar"><img src="/db/images/users/13.jpg" alt="" class="media-object img-circle"> </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Christian Lane</h6>
                                        <h5 class="title">Posuere convallis sociis nisi euismod</h5>
                                        <p class="summary">Arcu sed in tortor non convallis laoreet commodo ullamcorper ultrices/db.</p>
                                    </div>
                                    <div class="media-right text-nowrap"><i class="ti-clip"></i>
                                        <time datetime="2015-12-10T20:27:48+07:00" class="fs-11">30 mins</time>
                                    </div>
                                </a>
                            </li>
                            <li class="media read">
                                <div class="checkbox-custom pull-left">
                                    <input id="mailboxCheckbox5" type="checkbox" value="value5">
                                    <label for="mailboxCheckbox5"></label>
                                </div>
                                <a href="javascript:;">
                                    <div class="media-left avatar"><img src="/db/images/users/01.jpg" alt="" class="media-object img-circle"> </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Edward Garcia</h6>
                                        <h5 class="title">Posuere convallis sociis nisi euismod</h5>
                                        <p class="summary">Arcu sed in tortor non convallis laoreet commodo ullamcorper ultrices/db.</p>
                                    </div>
                                    <div class="media-right text-nowrap">
                                        <time datetime="2015-12-10T20:35:35+07:00" class="fs-11">Yesterday</time>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7">
                        <div class="single-mail">
                            <div class="clearfix">
                              <h5 class='avatar' style="display: flex; align-items: center; justify-content: space-between; align-content: center;">
                                 <div style="flex-grow: 5; text-align: center;">
                                    <img src="/db/images/users/13.jpg" alt="" class="media-object img-circle"  style="display:inline-block;">
                                    <a href="mailto:christian.lane@gmail.com"  style="display:inline-block;">Christian Lane</a>
                                 </div>

                                <a href="#" style="flex-grow: 1; text-align:right;"><i class="ti-reload"></i></a>
                              </h5>

                              <!--
                                <div class="media">
                                  <div class="media-left avatar">
                                    <img src="/db/images/users/13.jpg" alt="" class="media-object img-circle"> </div>
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
    <script>

      var messages = [
        { from: 'Tom', fromId: 1, to: 'Peter', toId: 2, content: 'Hello, Peter' },
        { from: 'Peter', fromId: 2, to: 'Tom', toId: 1, content: 'Hello, Tom' },
        { from: 'Tom', fromId: 1, to: 'Peter', toId: 2, content: 'What about the price' },
        { from: 'Peter', fromId: 2, to: 'Tom', toId: 1, content: 'I would said $5000 ok? It is completed new' },
        { from: 'Tom', fromId: 1, to: 'Peter', toId: 2, content: 'Nah, i would say $4000, how about it?' },
        { from: 'Tom', fromId: 1, to: 'Peter', toId: 2, content: 'Is it a certified place?' },
        { from: 'Peter', fromId: 2, to: 'Tom', toId: 1, content: 'Yes. It is certified.' },
      ];
      var conversations = {
        other: {
          userId: 1,
          name: "Tom",
          avatar: "file:///Users/martins/Downloads/dashboard_final/images/users/fm.jpg" ,

        },
        owner: {
          userId: 2,
          name: "Peter",
          avatar: "file:///Users/martins/Downloads/dashboard_final/images/users/13.jpg",
        },
        messages: messages
      };

      function genMessage(other, message) {
        
      }

      function initChatroom() {
        $(conversations.messages).each(function(idx,msg) {
          var msgHTML = genMessage(conversations.other, msg);
          $(msgHTML).appendTo('#chat-list');
        });

        $('#chat-list').mCustomScrollbar({
          setHeight: 480,
        }).mCustomScrollbar("scrollTo", "bottom");
      }

      initChatroom();

      function addMsg() {
        var msg = {
          fromId: 1,
          toId: 2,
          content: $('#msgTxt').val()
        };
        conversations.messages.push(msg);
        var msgHTML = genMessage(conversations.other, msg);
        $(msgHTML).appendTo('#chat-list .mCSB_container');
        $('#msgTxt').val('');
        $('#chat-list').mCustomScrollbar('update');
        $('#chat-list').mCustomScrollbar("scrollTo", "bottom");
      }
      $('#sendMsg').on('click', function() {
        addMsg();
      });
      $('#msgTxt').on('keyup', function(e) {
        if (e.which === 13) {
         addMsg();
        }
      })
    </script>
@endsection
