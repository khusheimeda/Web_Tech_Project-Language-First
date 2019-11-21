<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color:lightblue;
      color: navy;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px; color: navy;}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

    #text_to_post{
      background-color: beige;
    }
    textarea{
        margin-bottom: 1%;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-info navbar-dark"> <!--navbar-inverse bg-info">-->
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="LOGO.jpg" alt="LOGO" style="width:50px;height:50px">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#sideoptions" id="domains" data-toggle="collapse" data-target="#submenu1" aria-expanded="false">DOMAINS</a></li>
        <li><a href="#">MY PROFILE</a></li>
        <li><a href="#">REPORT</a></li>
        <li><a href="#">ABOUT</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Languages<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="#">German</a></li>
            <li><a href="#">French</a></li>
            <li><a href="#">Spanish</a></li>
            </ul>
        </li>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
  <!--      <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                  SELECT LANGUAGE
                </a>
                <div class="dropdown-menu" data-available="en_US,fr_CA,es_MX" data-flags="true">
                  <a class="dropdown-item glyphicon bfh-flag-US" data-toggle="bfh-selectbox" href="#">English</a>
                  <a class="dropdown-item glyphicon bfh-flag-CA" href="#">French</a>
                  <a class="dropdown-item glyphicon bfh-flag-MX" href="#">Spanish</a>
                </div>
              </li>
      </ul>
    -->
     <!-- <div class=" bfh-languages" data-language="en_US" data-available="en_US,fr_CA,es_MX" data-flags="true">
          <input type="hidden" name="" value="en_US">
          <a class="bfh-selectbox-toggle form-control" role="button" data-toggle="bfh-selectbox" href="#">
              <span class="bfh-selectbox-option">
                  <i class="glyphicon bfh-flag-US"></i>English</span>
                  <span class="caret selectbox-caret"></span>
                </a><div class="bfh-selectbox-options"><div role="listbox">
                    <ul role="option"><li><a tabindex="-1" href="#" data-option=""></a>
                    </li><li><a tabindex="-1" href="#" data-option="en_US">
                        <i class="glyphicon bfh-flag-US"></i>English</a></li>
                        <li><a tabindex="-1" href="#" data-option="fr_CA">
                            <i class="glyphicon bfh-flag-CA"></i>Français</a></li>
                            <li><a tabindex="-1" href="#" data-option="es_MX"><i class="glyphicon bfh-flag-MX"></i>Español</a></li></ul>
                        </div></div></div>-->
    <li class="radio">
        <label class="radio-inline">
            <input type="radio" name="gr" value="0" onchange="val(this)">German</label>
        <label class="radio-inline">
            <input type="radio" name="gr" value="1" onchange="val(this)">French</label>
            <label class="radio-inline">
            <input type="radio" name="gr" value="1" onchange="val(this)">Spanish</label>
    </li>
    </div>
  </div>
</nav>
  
<div  class="nav collapse" id="submenu1" role="menu" aria-labelledby="domains">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#">Basic Grammar</a></p>
      <p><a href="#">Introduction and Greetings</a></p>
      <p><a href="#">Culture</a></p>
      <p><a href="#">Places</a></p>
      <p><a href="#">News</a></p>
      <p><a href="#">Other</a></p>
    </div>

    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default text-left">
                  <div class="panel-body" id="text_to_post">
                    <form class="form-group">
            <textarea class="form-control" id="post_textarea" placeholder="Write Here" rows="3"></textarea>
            <button type="submit" class="btn btn-default btn-sm" style="border: wheat;">POST</button>
                    </form>
                    </div>
                </div>    
            </div>
        </div>

    <div class="row">
        <div class="col-sm-2">
            <div class="well">
            <p>John</p>
            <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
            </div>
        </div>
        <div class="col-sm-10" >
            <div class="well">
            <p>Bite(Please)</p>
            </div>
        </div>
        </div>
    </div>
  </div>
</div>
</body>
</html>
