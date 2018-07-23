@if(Session::has('locale'))
{{App::setLocale(Session::get('locale'))}}
@endif
<!DOCTYPE html>
<html>
    <head>
        <title>{{ trans('messages.logo') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:type" content="website" >
        <meta property="og:url" content="https://lipis.github.io/flag-icon-css/" ><!--This is for country flag icon-->
        <link href="{{asset('assets/flagstyle/css/docs.css')}}" rel="stylesheet"><!--This is for country flag icon-->
        <link href="{{asset('assets/flagstyle/css/flag-icon.css')}}" rel="stylesheet"><!--This is for country flag icon-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"><!--This is for country flag icon-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{asset('assets/flagstyle/js/docs.js')}}" type="text/javascript"></script><!--This is for country flag icon-->

        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
            .row.content {height: 1500px}

            /* Set gray background color and 100% height */
            .sidenav {
                background-color: #f1f1f1;
                height: 100%;
            }

            /* Set black background color, white text and some padding */
            footer {
                background-color: #555;
                color: white;
                padding: 15px;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {height: auto;}
            }

            body {
                position: relative;
            }
            ul.nav-pills {
                left:30px;
                top: 200px;
                position: fixed;
            }
            @media screen and (max-width: 810px) {
                #section1, #section2, #section3, #section4 {
                    margin-left:150px;
                }
            }

            p {
                word-wrap: break-word;
            }

            .flag-size {
                width: 20px;
                height: 17px;
            }
        </style>
    </head>
    <body data-spy="scroll" data-target="#myScrollspy" data-offset="0">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/') }}">{{ trans('messages.logo') }}</a>
                </div>
                <ul class="nav navbar-nav">
                    <li ><a href="{{ url('/') }}">{{ trans('messages.home') }}</a></li>
                    <li><a href="{{ url('/UnTranslated') }}">{{ trans('messages.translator') }}</a></li>
                    <li ><a href="{{ url('/Answer') }}">{{ trans('messages.answer') }}</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ trans('messages.language') }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/lang/en"><div class="flag-size img-thumbnail flag flag-icon-background flag-icon-gb" title="gb" id="gb"></div> {{ trans('messages.english') }}</a></li>
                            <li><a href="/lang/fr"><div class="flag-size img-thumbnail flag flag-icon-background flag-icon-fr" title="fr" id="fr"></div> {{ trans('messages.french') }}</a></li>
                            <li><a href="/lang/ch"><div class="flag-size img-thumbnail flag flag-icon-background flag-icon-cn" title="cn" id="cn"></div> {{ trans('messages.chinese') }}</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a id="loginoutBtn" href="{{ url('/auth/register') }}">
                            {{ trans('messages.register') }}
                        </a>
                    </li>
                    <li>
                        @unless (Auth::check())
                        <a id="loginoutBtn" href="{{ url('/auth/login') }}">
                            <span class="glyphicon glyphicon-log-in"></span> {{ trans('messages.login') }}
                        </a>
                        @else
                        <a id="loginoutBtn" href="{{ url('/auth/logout') }}">
                            {{ trans('messages.logout') }} <span class="glyphicon glyphicon-log-out"></span>
                        </a>
                        @endunless
                    </li>
                </ul>
            </div>
        </nav>
        <img src="{{asset('assets/images/Ask.gif')}}" data-toggle="modal" data-target="#myModal" style="width:100px;height:60px; position: fixed; right: 10px;top:150px;z-index: 10;" class="img-circle" alt="I want to Ask">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="text-primary modal-title">{{ trans('messages.askQuestion') }}</h4>
                    </div>
                    <div class="modal-body row">
                        <div class="col-sm-2"></div>
                        <form class="form-horizontal col-sm-8" action="{{url('/RESTFullQuestionsAPI/ask')}}" id="questionForm" method="POST" onsubmit=" return submitQuestionForm(this)" >

                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('messages.askTitle') }}(*):</label>
                                <div class="col-sm-10">
                                    <input class="form-control" autofocus id="questionTitle" name="questionTitle" type="text" maxlength="100" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('messages.askName') }}:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="name" name="name" type="text" maxlength="50">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="questionType" class="col-sm-2 control-label" required>{{ trans('messages.askType') }}(*):</label>
                                <div class="col-sm-10">
                                    <select id="questionType" name="questionType" class="form-control">
                                        <option value="Grammar">{{ trans('messages.grammar') }}</option>
                                        <option value="Oral">{{ trans('messages.oral') }}</option>
                                        <option value="Writing">{{ trans('messages.writing') }}</option>
                                        <option value="Listening">{{ trans('messages.listening') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="questionBody" class="col-sm-2 control-label">{{ trans('messages.askContent') }}(*):</label>
                                <textarea  class="form-control col-sm-10" rows="6" id="questionBody" name="questionBody" maxlength="1000" required></textarea>

                            </div>
                            <div class="alert alert-info col-sm-12">
                                <strong>{{ trans('messages.askNote') }}:</strong> {{ trans('messages.noteContent') }}
                            </div>
                        </form>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="questionForm"  class="btn btn-primary">{{ trans('messages.submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row content">
                <div class="row">
                    <nav class="col-sm-2" id="myScrollspy">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#section1">{{ trans('messages.grammar') }}</a></li>
                            <li><a href="#section2">{{ trans('messages.writing') }}</a></li>
                            <li><a href="#section3">{{ trans('messages.oral') }}</a></li>
                            <li><a href="#section4">{{ trans('messages.listening') }}</a></li>
                        </ul>
                    </nav>

                    <div class="col-sm-8">
                        <div   id="section1">
                            <h1>{{ trans('messages.grammar') }}</h1>
                            <h4><small>{{ trans('messages.recentpost') }}</small></h4>
                            <hr>
                            @foreach ($grammar as $gq)
                            <div class="container col-sm-12">
                                <h2 class="text-warning">{{ $gq->title }}</h2>
                                <h5><span class="glyphicon glyphicon-time"></span> Post by {{ $gq->name }}, {{ $gq->created_at}}.</h5>
                                <p class="bg-success"><lable><strong class="text-danger">Original:</strong></lable>{{ $gq->questionOrg }}</p>
                                <p class="bg-info"><lable><strong class="text-danger">Translated:</strong></lable>{{ $gq->questionEn }}</p>
                                <h5>Answer:</h5>
                                <p class="bg-warning">{{ $gq->answerEn }}</p>
                                <hr>
                            </div>
                            <hr>
                            @endforeach
                        </div>

                        <div   id="section2">
                            <h1>{{ trans('messages.writing') }}</h1>
                            <h4><small>{{ trans('messages.recentpost') }}</small></h4>
                            <hr>
                            @foreach ($writing as $wq)
                            <div class="container col-sm-12">
                                <h2 class="text-warning">{{ $wq->title }}</h2>
                                <h5><span class="glyphicon glyphicon-time"></span> Post by {{ $wq->name }}, {{ $wq->created_at}}.</h5>
                                <p class="bg-success"><lable><strong class="text-danger">Original:</strong></lable>{{ $wq->questionOrg }}</p>
                                <p class="bg-info"><lable><strong class="text-danger">Translated:</strong></lable>{{ $wq->questionEn }}</p>
                                <h5>Answer:</h5>
                                <p class="bg-warning">{{ $wq->answerEn }}</p>
                                <hr>
                            </div>
                            @endforeach
                        </div>
                        <div   id="section3">
                            <h1>{{ trans('messages.oral') }}</h1>
                            <h4><small>{{ trans('messages.recentpost') }}</small></h4>
                            <hr>
                            @foreach ( $oral as $oq)
                            <div class="container col-sm-12">
                                <h2 class="text-warning">{{ $oq->title }}</h2>
                                <h5><span class="glyphicon glyphicon-time"></span> Post by {{ $oq->name }}, {{ $oq->created_at}}.</h5>
                                <p class="bg-success"><lable><strong class="text-danger">Original:</strong></lable>{{ $oq->questionOrg }}</p>
                                <p class="bg-info"><lable><strong class="text-danger">Translated:</strong></lable>{{ $oq->questionEn }}</p>
                                <h5>Answer:</h5>
                                <p class="bg-warning">{{ $oq->answerEn }}</p>
                                <hr>
                            </div>
                            @endforeach
                        </div>
                        <div  id="section4">
                            <h1>{{ trans('messages.listening') }}</h1>
                            <h4><small>{{ trans('messages.recentpost') }}</small></h4>
                            <hr>
                            @foreach ( $listening as $lq)
                            <div class="container col-sm-12">
                                <h2 class="text-warning">{{ $lq->title }}</h2>
                                <h5><span class="glyphicon glyphicon-time"></span> Post by {{ $lq->name }}, {{ $lq->created_at}}.</h5>
                                <p class="bg-success"><lable><strong class="text-danger">Original:</strong></lable>{{ $lq->questionOrg }}</p>
                                <p class="bg-info"><lable><strong class="text-danger">Translated:</strong></lable>{{ $lq->questionEn }}</p>
                                <h5>Answer:</h5>
                                <p class="bg-warning">{{ $lq->answerEn }}</p>
                                <hr>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container-fluid">
            <p>{{ trans('messages.footer') }}</p>
            <p> &copy; 2017-{{date("Y")}}</p>
        </footer>
        <script>
            function   submitQuestionForm(formElement) {
                var url = $(formElement).attr('action');
                var data = $(formElement).serialize();
                $.post(url, data, function (response, status) {
                    // do something here on success
                    //alert("response: " + response + "\nStatus: " + status);
                    alert("You Question has been saved! You will not see it in home page until the answer is given properly.");
                    $(formElement).find('.form-control').val('');
                });
                return false;
            }
            /*
             function deleteQuestion(btnElement) {
             var r = confirm("Do you really want to delete it?");
             if (r === true) {
             var id = $(btnElement).parent().prev().children().first().val();
             var urlRequest = "/RESTFullQuestionsAPI/" + id;
             $.get(urlRequest, function (data, status) {
             $(btnElement).parent().parent().parent().slideUp();
             alert("This question has been deleted!");
             //alert("Data: " + data + "\nStatus: " + status);
             });
             }
             }
             function submitQuestionForm(formElement) {
             var textareaElement = $(formElement).find('textarea').first();
             //alert(textareaElement.val());
             if (textareaElement.attr('disabled') === undefined) {
             var url = $(formElement).attr('action');
             var data = $(formElement).serialize();
             data += ("&Translation=" + textareaElement.val());
             $.post(url, data, function (response, status) {
             // do something here on success
             //alert("response: " + response + "\nStatus: " + status);
             alert("You translation has been saved!");
             textareaElement.attr('disabled', 'true');
             });
             } else {
             alert("Your translation was not changed!");
             }
             return false;
             }
             function enableEditBox(btnEditElement) {
             $(btnEditElement).parent().parent().find('textarea').first().removeAttr('disabled');
             }
             function resetAnswer(btnResetElement) {
             $(btnResetElement).parent().parent().find('textarea').first().val('');
             }
             */
        </script>
    </body>
</html>