@if(Session::has('locale'))
{{App::setLocale(Session::get('locale'))}}
@endif
<!DOCTYPE html>
<html>
    <head>
        <title>{{ trans('messages.logo') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        </style>
    </head>
    <body data-spy="scroll" data-target="#myScrollspyList" data-offset="0">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/') }}">{{ trans('messages.logo') }}</a>
                </div>
                <ul class="nav navbar-nav">
                    <li ><a href="{{ url('/') }}">{{ trans('messages.home') }}</a></li>
                    <li class="active"><a href="#">{{ trans('messages.answer') }}</a></li>
                    <li ><a href="{{ url('/Answered') }}">{{ trans('messages.history') }}</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        @unless (Auth::check())
                        <a id="loginoutBtn" href="{{ url('/Answer') }}">
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


        @can('Answer')
        <!-- If you are Answer account -->
        <div class="container-fluid">
            <div class="row content">

                <nav class="col-sm-2" id="myScrollspyList">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#section1">{{ trans('messages.grammar') }}</a></li>
                        <li><a href="#section2">{{ trans('messages.writing') }}</a></li>
                        <li><a href="#section3">{{ trans('messages.oral') }}</a></li>
                        <li><a href="#section4">{{ trans('messages.listening') }}</a></li>
                    </ul>
                </nav>

                <div class="col-sm-8">
                    <div class="container" id="section1">
                        <h1>{{ trans('messages.grammar') }}</h1>
                        <h4><small>{{ trans('messages.recentpost') }}</small></h4>
                        <hr>
                        @foreach ($grammar as $gr)
                        <div class="container col-sm-10">
                            <h2>{{ $gr->title }}</h2>
                            <h5><span class="glyphicon glyphicon-time"></span> Post by {{ $gr->name }}, {{ $gr->created_at}}.</h5>
                            <p class="well well-lg">{{ $gr->questionEn }}</p>
                            <h4 class="alert alert-info">{{ trans('messages.answer') }}:</h4>
                            <!--<form role="form" name="questionForm" action="/RESTFullQuestionsAPI" method="POST">-->
                            <form role="form" name="questionForm" action="{{url('/RESTFullQuestionsAPI/answer')}}" method="POST" onsubmit=" return submitQuestionForm(this)">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea  class="form-control" rows="4" name="Answer" required></textarea>
                                    <!--<input type="text" class="form-control" name="Translation">-->
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="ID" required  value="{{ $gr->id }}">
                                </div>
                                <div class="col-sm-9">
                                    <button type="button" onclick="deleteQuestion(this)" class="btn btn-danger" id="{{'btnDel_' . $gr->id}}">Delete</button>
                                    <button type="button" onclick="enableEditBox(this)" class="btn btn-primary" id="{{'btnEdit_' . $gr->id}}">Edit</button>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" onclick="resetAnswer(this)" class="btn btn-primary">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    </div>

                    <div  class="container" id="section2">
                        <h1>{{ trans('messages.writing') }}</h1>
                        <h4><small>{{ trans('messages.recentpost') }}</small></h4>
                        <hr>
                        @foreach ($writing as $wg)
                        <div class="container col-sm-10">
                            <h2>{{ $wg->title }}</h2>
                            <h5><span class="glyphicon glyphicon-time"></span> Post by {{ $wg->name }}, {{ $wg->created_at}}.</h5>
                            <p class="well well-lg">{{ $wg->questionEn }}</p>
                            <h4 class="alert alert-info">{{ trans('messages.answer') }}:</h4>
                            <!--<form role="form" name="questionForm" action="/RESTFullQuestionsAPI" method="POST">-->
                            <form role="form" name="questionForm" action="{{url('/RESTFullQuestionsAPI/answer')}}" method="POST" onsubmit=" return submitQuestionForm(this)">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea  class="form-control" rows="4" name="Answer" required></textarea>
                                    <!--<input type="text" class="form-control" name="Translation">-->
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="ID" required  value="{{ $wg->id }}">
                                </div>
                                <div class="col-sm-9">
                                    <button type="button" onclick="deleteQuestion(this)" class="btn btn-danger" id="{{'btnDel_' . $wg->id}}">{{ trans('messages.delete') }}</button>
                                    <button type="button" onclick="enableEditBox(this)" class="btn btn-primary" id="{{'btnEdit_' . $wg->id}}">{{ trans('messages.edit') }}</button>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" onclick="resetAnswer(this)" class="btn btn-primary">Reset</button>
                                    <button type="submit" class="btn btn-success">{{ trans('messages.submit') }}</button>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    </div>

                    <div  class="container" id="section3">
                        <h1>{{ trans('messages.oral') }}</h1>
                        <h4><small>{{ trans('messages.recentpost') }}</small></h4>
                        <hr>
                        @foreach ($oral as $ol)
                        <div class="container col-sm-10">
                            <h2>{{ $ol->title }}</h2>
                            <h5><span class="glyphicon glyphicon-time"></span> Post by {{ $ol->name }}, {{ $ol->created_at}}.</h5>
                            <p class="well well-lg">{{ $ol->questionEn }}</p>
                            <h4 class="alert alert-info">{{ trans('messages.answer') }}:</h4>
                            <!--<form role="form" name="questionForm" action="/RESTFullQuestionsAPI" method="POST">-->
                            <form role="form" name="questionForm" action="{{url('/RESTFullQuestionsAPI/answer')}}" method="POST" onsubmit=" return submitQuestionForm(this)">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea  class="form-control" rows="4" name="Answer" required></textarea>
                                    <!--<input type="text" class="form-control" name="Translation">-->
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="ID" required  value="{{ $ol->id }}">
                                </div>
                                <div class="col-sm-9">
                                    <button type="button" onclick="deleteQuestion(this)" class="btn btn-danger" id="{{'btnDel_' . $ol->id}}">{{ trans('messages.delete') }}</button>
                                    <button type="button" onclick="enableEditBox(this)" class="btn btn-primary" id="{{'btnEdit_' . $ol->id}}">{{ trans('messages.edit') }}</button>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" onclick="resetAnswer(this)" class="btn btn-primary">Reset</button>
                                    <button type="submit" class="btn btn-success">{{ trans('messages.submit') }}</button>
                                </div>
                            </form>

                        </div>
                        @endforeach
                    </div>

                    <div  class="container" id="section4">
                        <h1>{{ trans('messages.listening') }}</h1>
                        <h4><small>{{ trans('messages.recentpost') }}</small></h4>
                        <hr>
                        @foreach ($listening as $lg)
                        <div class="container col-sm-10">
                            <h2>{{ $lg->title }}</h2>
                            <h5><span class="glyphicon glyphicon-time"></span> Post by {{ $lg->name }}, {{ $lg->created_at}}.</h5>
                            <p class="well well-lg">{{ $lg->questionEn }}</p>
                            <h4 class="alert alert-info">{{ trans('messages.answer') }}:</h4>
                            <!--<form role="form" name="questionForm" action="/RESTFullQuestionsAPI" method="POST">-->
                            <form role="form" name="questionForm" action="{{url('/RESTFullQuestionsAPI/answer')}}" method="POST" onsubmit=" return submitQuestionForm(this)">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea  class="form-control" rows="4" name="Answer" required></textarea>
                                    <!--<input type="text" class="form-control" name="Translation">-->
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="ID" required  value="{{ $lg->id }}">
                                </div>
                                <div class="col-sm-9">
                                    <button type="button" onclick="deleteQuestion(this)" class="btn btn-danger" id="{{'btnDel_' . $lg->id}}">{{ trans('messages.delete') }}</button>
                                    <button type="button" onclick="enableEditBox(this)" class="btn btn-primary" id="{{'btnEdit_' . $lg->id}}">{{ trans('messages.edit') }}</button>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" onclick="resetAnswer(this)" class="btn btn-primary">Reset</button>
                                    <button type="submit" class="btn btn-success">{{ trans('messages.submit') }}</button>
                                </div>
                            </form>
                            <br><br>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Other Account are not allow to see more-->
        <h1>Sorry, You are not an answer!</h1>
        @endcan
        <footer class="container-fluid">
            <p>{{ trans('messages.footer') }}</p>
            <p> &copy; 2017-{{date("Y")}}</p>
        </footer>
        <script>
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
                    data += ("&Answer=" + textareaElement.val());
                    $.post(url, data, function (response, status) {
                        // do something here on success
                        //alert("response: " + response + "\nStatus: " + status);
                        alert("Your answer has been posted!");
                        textareaElement.attr('disabled', 'true');
                    });
                } else {
                    alert("Your Answer was not changed!");
                }
                return false;
            }
            function enableEditBox(btnEditElement) {
                $(btnEditElement).parent().parent().find('textarea').first().removeAttr('disabled');
            }
            function resetAnswer(btnResetElement) {
                var textareaElement = $(btnResetElement).parent().parent().find('textarea').first();
                if (textareaElement.attr('disabled') === undefined) {
                    textareaElement.val('');
                }
            }
        </script>
    </body>
</html>