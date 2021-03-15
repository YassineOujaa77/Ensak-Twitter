<html>
  <head>
      <style>
          @import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

@import url(https://fonts.googleapis.com/css?family=Titillium+Web:300);
.fa-2x {
font-size: 2em;
}
.menu2{
position: relative;
display: table-cell;
width: 60px;
height: 80px;
text-align: center;
vertical-align: middle;
font-size:40px;
}


.main-menu:hover,nav.main-menu.expanded {
width:250px;
overflow:visible;
}

.main-menu {
background: #6EC6C6;
border-right:1px solid #e5e5e5;
position:fixed;
top:60px;
bottom:0;
height:100%;
left:0;
width:60px;
overflow:hidden;
-webkit-transition:width .05s linear;
transition:width .05s linear;
-webkit-transform:translateZ(0) scale(1,1);
z-index:1000;
}

.main-menu>ul {
margin:7px 0;
}

.main-menu li {
position:relative;
display:block;
width:250px;
}

.main-menu li>a {
position:relative;
display:table;
border-collapse:collapse;
border-spacing:0;
color:#000;
 font-family: arial;
font-size: 14px;
text-decoration:none;
-webkit-transform:translateZ(0) scale(1,1);
-webkit-transition:all .1s linear;
transition:all .1s linear;
  
}

.main-menu .nav-icon {
position:relative;
display:table-cell;
width:60px;
height:20px;
text-align:center;
vertical-align:middle;
font-size:18px;
}

.main-menu .nav-text {
position:relative;
display:table-cell;
vertical-align:middle;
width:190px;
font-family: 'Titillium Web', sans-serif;
font-weight: 700;
font-size: larger;
}

.main-menu>ul.logout {
position:absolute;
left:0;

}

.no-touch .scrollable.hover {
overflow-y:hidden;
}

.no-touch .scrollable.hover:hover {
overflow-y:auto;
overflow:visible;
}

a:hover,a:focus {
text-decoration:none;
}

nav {
-webkit-user-select:none;
-moz-user-select:none;
-ms-user-select:none;
-o-user-select:none;
user-select:none;
}

nav ul,nav li {
outline:0;
margin:0;
padding:0;
}
.main-menu li:hover>a,nav.main-menu li.active>a,.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus,.no-touch .dashboard-page nav.dashboard-menu ul li:hover a,.dashboard-page nav.dashboard-menu ul li.active a {
color:#fff;
background-color:#5fa2db;
}
.area {
float: left;
background: #e2e2e2;
width: 4%;
height: 100%;
}
@font-face {
  font-family: 'Titillium Web';
  font-style: normal;
  font-weight: 300;
  src: local('Titillium WebLight'), local('TitilliumWeb-Light'), url(http://themes.googleusercontent.com/static/fonts/titilliumweb/v2/anMUvcNT0H1YN4FII8wpr24bNCNEoFTpS2BTjF6FB5E.woff) format('woff');
}

      </style>
 
  </head>
  
  <body><nav class="main-menu" id="navbar">
            <ul>
                <li>
                    <a href="<?php echo "maison.php?id_profile=$id_user&id_user=$id_user";?>">
                        <i class="fa fa-home fa-2x menu2"></i>
                        <span class="nav-text">
                            Home
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <a href="<?php echo "profile.php?id_profile=$id_user";?>">
                        <i class="fa fa-user-circle fa-2x  menu2"></i>
                        <span class="nav-text">
                            Profile
                        </span>
                    </a>
                    
                </li>
                
                <li class="has-subnav">
                    <a href="<?php echo "messages.php?id_user=$id_user";?>">
                       <i class="fa fa-inbox fa-2x menu2"></i>
                        <span class="nav-text">
                            Messages
                        </span>
                    </a>
                   
                </li>
                <li class="has-subnav">
                    <a href="settings.php">
                       <i class="fa fa-tools fa-2x menu2"></i>
                        <span class="nav-text">
                            Setting
                        </span>
                    </a>
                    
                </li>
                <li>
                    <a href="Aboutus.php">
                        <i class="fa fa-address-card fa-2x menu2"></i>
                        <span class="nav-text">
                            About us
                        </span>
                    </a>
                </li>

            <ul class="logout">
                <li>
                   <a href="<?php unset($_SESSION['id_user']); echo "index.php"; ?>">
                        <i class="fa fa-power-off fa-2x menu2"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
        <script>
            // When the user scrolls the page, execute myFunction  unset($_SESSION['id_user']); session_destroy();
            window.onscroll = function() {myFunction()};

            // Get the navbar
            var navbar = document.getElementById("navbar");

            // Get the offset position of the navbar
            var sticky = navbar.offsetTop;

            // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
            } 
        </script>
  </body>
    </html>