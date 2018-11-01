<?php include 'inc/helpers.php'; ?>

<!doctype html>
<html>
<head>
    <title>Open RSC</title>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=9">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">

    <link rel="stylesheet" href="/css/style.css" media="all"/>
    <link rel="stylesheet" href="/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Exo">

    <link rel="import" href="inc/discord.html">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.js"
            type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/excanvas.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js" type="text/javascript"></script>
    <script src="/js/cufon.js" type="text/javascript"></script>

    <script src="/js/helpers.js" type="text/javascript"></script>

</head>
<body lang="en">

<header>
    <div class="large">
        Open RSC
    </div>
    <div class="small white">
        Striving for a replica RSC game and more
    </div>
</header>

<div class="navigation">
    <nav class="navbar">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/board/index">Forum</a></li>
            <li><a href="/chat">Game Chat</a></li>
            <li><a href="/highscores">Highscores</a></li>
            <li><a href="/worldmap">Player Map</a></li>
            <li><a href="/database">Database</a></li>
        </ul>
    </nav>

    <div class="account-panel">
        <?php if ($user->data['is_registered']) { ?>
            <div class="account-text">
                <span class="welcome-message block">
                    Welcome back, <?php print $user->data['username']; ?>
                </span>
                <ul>
                    <li class="welcome-text"><a href="/accounts">Account Management</a></li>
                    <li class="welcome-text">
                        <a href="/board/ucp?i=pm&folder=inbox">
                            <?php print $user->data['user_unread_privmsg']; ?>
                        </a>
                    </li>
                    <li class="welcome-text">
                        <a href="/board/ucp?mode=logout&amp;sid=<?php print $user->data['session_id']; ?>">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="avatar-box">
                <a href="/board/ucp?i=profile&mode=avatar">
                    <img src="/board/download/file.php?avatar=<?php print $user->data['user_avatar']; ?>"/>
                </a>
            </div>
        <?php } else { ?>
            <div class="sidenavbar">
                <ul>
                    <li><a id="inline" href="#data">Login</a></li>
                    <li><a href="/board/ucp?mode=register">Register</a></li>
                </ul>
            </div>
        <?php } ?>
        <div style="display:none">
            <div id="data">
                <div class="panel-login">
                    <div class="popupbox">
                        <h4 style="margin-left: 40px;">Open RSC Login</h4>
                        <form method="post" action="/board/ucp?mode=login">
                            <input type="text" name="username" class="name" id="loginname" placeholder="Username"/>
                            <input type="password" name="password" class="password" id="loginpass"
                                   placeholder="Password"/>
                            <input type="hidden" checked="yes" name="autologin" class="autologin" id="autologin"/>
                            <input type="submit" value="Log In" name="login" class="submit"/>
                            <input type="hidden" name="redirect" value="/"/>
                        </form>
                        <a class="submit"
                           href="/board/ucp?mode=register">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
if (curPageURL() != "" && !is_array(curPageURL()) && curPageURL() != 'index') {
    if (file_exists("pages/" . curPageURL() . ".php")) {
        include("pages/" . curPageURL() . ".php");
    } else {
        include("pages/error.php");
    }
} else if (is_array(curPageURL()) && curPageURL() != 'index') {
    $page = curPageURL();
    $subpage = $page[1];
    $page = $page[0];
    if (file_exists("pages/" . $page . ".php")) {
        include("pages/" . $page . ".php");
    } else {
        include("pages/error.php");
    }
} else {
    ?>

    <main class="main">
        <div class="content">
            <article>
                <div class="panel">
                    <img class="logo" src="css/images/logo.png" alt="Open RSC Logo"/>
                    <div class="main-links">
                        <ul>
                            <li><a href="board/ucp?mode=register">Register</a></li>
                            <li><a href="https://game.openrsc.com/downloads/OpenRSC.jar">Download</a></li>
                            <li><a href="/downloads/openrsc.apk">Android</a></li>
                            <li><a href="https://discordapp.com/invite/94vVKND">Discord</a></li>
                        </ul>
                    </div>

                    <hr>

                    <div class="news">
                        <?php include 'inc/news.php' ?>
                    </div>
                </div>
            </article>
        </div>
    </main>
<?php } ?>

<aside>
    <div class="box">
        <div class="side-panel">
            <div>
                <h5>Statistics</h5>
                <dl class="side-menu">
                    <dt>Players Online:</dt>
                    <dd><?php echo playersOnline(); ?></dd>
                    <dt>Server Status:</dt>
                    <dd><?php echo checkStatus("game.openrsc.com", "43594"); ?></dd>
                    <dt>Registrations Today:
                    <dd>
                        <a class="lime" href="/registrationstoday">
                            <?php echo newRegistrationsToday(); ?>
                        </a>
                    </dd>
                    <dt>Logins Today:</dt>
                    <dd>
                        <a class="lime" href="/loginstoday">
                            <?php echo loginsToday(); ?>
                        </a>
                    </dd>
                    <dt>Unique Players:</dt>
                    <dd><?php echo uniquePlayers(); ?></dd>
                    <dt>Total Players:</dt>
                    <dd><?php echo totalGameCharacters(); ?></dd>
                    <dt>Gold:</dt>
                    <dd><?php echo banktotalGold(); ?></dd>
                    <dt>Time Played:</dt>
                    <dd><?php echo totalTime(); ?></dd>
                </dl>
            </div>
            <div>
                <iframe src="/inc/discord.html"></iframe>
            </div>
        </div>
    </div>
</aside>

</body>
</html>
