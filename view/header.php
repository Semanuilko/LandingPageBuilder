
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Homepage - Semantic</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.3/dist/semantic.min.css">

  <style type="text/css">

    .hidden.menu {
      display: none;
    }

    .masthead.segment {
      #min-height: 700px;
      padding: 1em 0em;
    }
    .masthead .logo.item img {
      margin-right: 1em;
    }
    .masthead .ui.menu .ui.button {
      margin-left: 0.5em;
    }
    .masthead h1.ui.header {
      margin-top: 3em;
      margin-bottom: 0em;
      font-size: 4em;
      font-weight: normal;
    }
    .masthead h2 {
      font-size: 1.7em;
      font-weight: normal;
    }

    .ui.vertical.stripe {
      padding: 8em 0em;
    }
    .ui.vertical.stripe h3 {
      font-size: 2em;
    }
    .ui.vertical.stripe .button + h3,
    .ui.vertical.stripe p + h3 {
      margin-top: 3em;
    }
    .ui.vertical.stripe .floated.image {
      clear: both;
    }
    .ui.vertical.stripe p {
      font-size: 1.33em;
    }
    .ui.vertical.stripe .horizontal.divider {
      margin: 3em 0em;
    }

    .quote.stripe.segment {
      padding: 0em;
    }
    .quote.stripe.segment .grid .column {
      padding-top: 5em;
      padding-bottom: 5em;
    }

    .footer.segment {
      padding: 5em 0em;
    }

    .secondary.pointing.menu .toc.item {
      display: none;
    }

    @media only screen and (max-width: 700px) {
      .ui.fixed.menu {
        display: none !important;
      }
      .secondary.pointing.menu .item,
      .secondary.pointing.menu .menu {
        display: none;
      }
      .secondary.pointing.menu .toc.item {
        display: block;
      }
      .masthead.segment {
        min-height: 350px;
      }
      .masthead h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .masthead h2 {
        margin-top: 0.5em;
        font-size: 1.5em;
      }
    }

  </style>
 
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>  
  <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.3/dist/semantic.min.js"></script>



</head>
<body>




<!-- Following Menu -->
<div class="ui large top fixed hidden menu">
  <div class="ui container">
    <a class="active item">Home</a>
    <a class="item">Work</a>
    <a class="item">Company</a>
    <a class="item">Careers</a>
    <div class="right menu">
      <div class="item">
        <a class="ui button">Log in</a>
      </div>
      <div class="item">
        <a class="ui primary button">Sign Up</a>
      </div>
    </div>
  </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
  <a class="active item">Home</a>
  <a class="item">Work</a>
  <a class="item">Company</a>
  <a class="item">Careers</a>
  <a class="item">Login</a>
  <a class="item">Signup</a>
</div>


<!-- Page Contents -->
<div class="pusher">
    <div class="ui inverted vertical masthead center aligned segment">
        <div class="ui container">
            <div class="ui large secondary inverted pointing menu">
                <a class="toc item">
                <i class="sidebar icon"></i>
                </a>
                <a class="active item">Home</a>
                <a class="item">Work</a>
                <a class="item">Company</a>
                <a class="item">Careers</a>
                <div class="right item">                   
                    <?
                        $user=AuthController::get_current_user();
                        if ( !$user ) {
                          echo "<a  class='ui inverted button' href='" . PageController::get_link("login") . "'>Авторизация\Регистрация</a>";
                        } else {
                          echo "<a  class='ui inverted button' href='" . PageController::get_link("cabinet") . "'>" . $user->name . "</a>";
                          echo "<a  class='ui inverted button' href='" . PageController::get_link("login", "logout") . "'>Выйти</a>";
                        } 
                    ?>
                </div>
            </div>
        </div>

    </div>




  