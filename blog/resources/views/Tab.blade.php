<!DOCTYPE html>
<html lang="en">
    <head>
        <title>French Corner</title>
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
                top: 200px;
                position: fixed;
            }


            @media screen and (max-width: 810px) {
                #section1, #section2, #section3, #section4,#section5,#section6,#section7,#section8 {
                    margin-left: 150px;
                }
            }

            #exTab1 .tab-content {
                color : white;
                background-color: #428bca;
                padding : 5px 15px;
            }

            #exTab2 h3 {
                color : white;
                background-color: #428bca;
                padding : 5px 15px;
            }

            /* remove border radius for the tab */

            #exTab1 .nav-pills > li > a {
                border-radius: 0;
            }

            /* change border radius for the tab , apply corners on top*/

            #exTab3 .nav-pills > li > a {
                border-radius: 4px 4px 0 0 ;
            }

            #exTab3 .tab-content {
                color : white;
                background-color: #428bca;
                padding : 5px 15px;
            }
        </style>
    </head>
    <body>
        {{Session::get('locale')}}
        {{App::getLocale()}}
        {{ trans('messages.logo') }}
        <div class="container"><h2>Example tab 2 (using standard nav-tabs)</h2></div>

        <div id="exTab2" class="container">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a  href="#unTranslatedTab" data-toggle="tab">Untranslated</a>
                </li>
                <li><a href="#historyTab" data-toggle="tab">History</a>
                </li>
            </ul>

            <div class="tab-content ">
                <div class="tab-pane active" id="unTranslatedTab" data-spy="scroll" data-target="#myScrollspy" data-offset="-200">
                    <div class="container-fluid">
                        <div class="row content">

                            <nav class="col-sm-3" id="myScrollspy">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="#section1">Grammar</a></li>
                                    <li><a href="#section2">Writing</a></li>
                                    <li><a href="#section3">Oral</a></li>
                                    <li><a href="#section4">Listenning</a></li>
                                </ul>
                            </nav>

                            <div class="col-sm-9">
                                <div id="section1">
                                    <h1>Grammar11111</h1>
                                    <h4><small>RECENT POSTS</small></h4>
                                    <hr>
                                    <h2>I Love Food</h2>
                                    <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>
                                    <h5><span class="label label-danger">Food</span> <span class="label label-primary">Ipsum</span></h5><br>
                                    <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <br><br>

                                    <h4><small>RECENT POSTS</small></h4>
                                    <hr>
                                    <h2>Officially Blogging</h2>
                                    <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, Sep 24, 2015.</h5>
                                    <h5><span class="label label-success">Lorem</span></h5><br>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <hr>

                                    <h4>Leave a Comment:</h4>
                                    <form role="form">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                    <br><br>

                                    <p><span class="badge">2</span> Comments:</p><br>
                                </div>

                                <div id="section2">
                                    <h1>Grammar</h1>
                                    <h4><small>RECENT POSTS</small></h4>
                                    <hr>
                                    <h2>I Love Food</h2>
                                    <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>
                                    <h5><span class="label label-danger">Food</span> <span class="label label-primary">Ipsum</span></h5><br>
                                    <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <br><br>

                                    <h4><small>RECENT POSTS</small></h4>
                                    <hr>
                                    <h2>Officially Blogging</h2>
                                    <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, Sep 24, 2015.</h5>
                                    <h5><span class="label label-success">Lorem</span></h5><br>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <hr>

                                    <h4>Leave a Comment:</h4>
                                    <form role="form">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                    <br><br>

                                    <p><span class="badge">2</span> Comments:</p><br>
                                </div>
                                <div id="section3">
                                    <h1>Grammar</h1>
                                    <h4><small>RECENT POSTS</small></h4>
                                    <hr>
                                    <h2>I Love Food</h2>
                                    <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>
                                    <h5><span class="label label-danger">Food</span> <span class="label label-primary">Ipsum</span></h5><br>
                                    <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <br><br>

                                    <h4><small>RECENT POSTS</small></h4>
                                    <hr>
                                    <h2>Officially Blogging</h2>
                                    <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, Sep 24, 2015.</h5>
                                    <h5><span class="label label-success">Lorem</span></h5><br>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <hr>

                                    <h4>Leave a Comment:</h4>
                                    <form role="form">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                    <br><br>

                                    <p><span class="badge">2</span> Comments:</p><br>
                                </div>
                                <div id="section4">
                                    <h1>Grammar</h1>
                                    <h4><small>RECENT POSTS</small></h4>
                                    <hr>
                                    <h2>I Love Food</h2>
                                    <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>
                                    <h5><span class="label label-danger">Food</span> <span class="label label-primary">Ipsum</span></h5><br>
                                    <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <br><br>

                                    <h4><small>RECENT POSTS</small></h4>
                                    <hr>
                                    <h2>Officially Blogging</h2>
                                    <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, Sep 24, 2015.</h5>
                                    <h5><span class="label label-success">Lorem</span></h5><br>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <hr>

                                    <h4>Leave a Comment:</h4>
                                    <form role="form">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                    <br><br>

                                    <p><span class="badge">2</span> Comments:</p><br>
                                </div>

                            </div>

                        </div>
                    </div>
                    <footer class="container-fluid">
                        <p>Footer Text</p>
                    </footer>

                </div>
                <div class="tab-pane" id="historyTab" data-spy="scroll" data-target="#myScrollspy2" data-offset="20">
                    <div class="container">
                        <div class="row">
                            <nav class="col-sm-3" id="myScrollspy2">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="#section5">Section 1</a></li>
                                    <li><a href="#section6">Section 2</a></li>
                                    <li><a href="#section7">Section 3</a></li>
                                    <li><a href="#section8">Section 4</a></li>

                                </ul>
                            </nav>
                            <div class="col-sm-9">
                                <div id="section5">
                                    <h1>Section 1</h1>
                                    <p>Try to scroll this section and look at the navigation list while scrolling!</p>
                                </div>
                                <div id="section6">
                                    <h1>Section 2</h1>
                                    <p>Try to scroll this section and look at the navigation list while scrolling!</p>
                                </div>
                                <div id="section7">
                                    <h1>Section 3</h1>
                                    <p>Try to scroll this section and look at the navigation list while scrolling!</p>
                                </div>
                                <div id="section8">
                                    <h1>Section 4-1</h1>
                                    <p>Try to scroll this section and look at the navigation list while scrolling!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>