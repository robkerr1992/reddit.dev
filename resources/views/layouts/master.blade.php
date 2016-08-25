<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reddit</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
    <style>
        .nav-pills li a:hover {
            color: black;
            background-color: rebeccapurple;
        }
        .nav-pills li a:active {
            color: black;
            background-color: rebeccapurple;
        }
        .nav_container {
            height: 100px;

        }
        #nav {
            position: absolute;
            bottom: 0;
            right: 25px;

        }
        .listItem {
            color: rebeccapurple;
            font-weight: bold;
        }
    </style>

</head>
<body>
    <!--partial view for navbar-->
    <nav style="background-color: black;" class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 nav_container" id="header_nav">
                    <ul class="nav nav-pills" id="nav">
                        @if(Auth::check())
                            <li role="presentation" class="navbutton" id="decks"><a class="listItem" href="/user/{{Auth::id()}}">{{Auth::user()->name}}</a></li>
                            <li role="presentation" class="navbutton" id="decks"><a class="listItem" href="/posts/create">Create Post</a></li>
                            <li role="presentation" class="navbutton" id="decks"><a class="listItem" href="/posts">View Posts</a></li>
                            <li role="presentation" class="navbutton" id="logout"><a class="listItem" href="/auth/logout">Logout</a></li>
                        @else
                            <li role="presentation" class="navbutton" id="logIn"><a class="listItem" href="/auth/login">LogIn</a></li>
                            <li role="presentation" class="navbutton" id="logIn"><a class="listItem" href="/auth/register">Register</a></li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @if (session()->has('message'))
        <div style="margin-top: 120px;" class="alert alert-success">{{ session('message') }}</div>
    @endif

    @yield('content')
    <script
            src="https://code.jquery.com/jquery-3.1.0.min.js"
            integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="
            crossorigin="anonymous">

    </script>
    <script>
        $('.vote').on('click', function (event) {
            event.preventDefault();
            var vote = $(this).data('vote');
            var post = $(this).data('post');
            $('#vote').val(vote);
            $('#post_id').val(post);
            var form = $('#post-vote');
            form.submit();
        });


//        function doAjax(){};
    </script>
</body>
</html>