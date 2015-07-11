<?php Session::init(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $this->title ?></title>


    <link rel="stylesheet" href="<?= URL ?>public/css/default.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="<?= URL ?>public/js/index.js"></script>

</head>

<body>

<div class="header">
    <div class="name_and_login_signup">
        <span class="company-name">Varsity Community</span>

        <div class="login-signup">

            <?php if (Session::get('loggedIn') == true): ?>
                <a href="<?php echo URL; ?>home/logout">
                    <span style="margin-left: 2px" href="#" class="button" id="toggle-signup">Log out</span>
                </a>

                <div class="profile_">
                    <div class="profile_image" style="float: left; margin-right: 10px;">
                        <?php if (Session::get('image') != null): ?>
                            <img src="<?= URL . Session::get('image') ?>" height="25" width="25"/>
                        <?php else:
                            if (Session::get('gender') == "m"): ?>
                                <img src="<?= URL ?>public/images/male.png" height="25" width="25"/>
                            <?php else: ?>
                                <img src="<?= URL ?>public/images/female.png" height="25" width="25"/>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="profile_name" style="padding-top:3px; float: left">
                        <?= Session::get('name') ?>
                    </div>
                </div>
                <div id="profile_">
                    <div id="profile_triangle"></div>

                    <div id="profile_body">
                        <a href="#"><p>Profile</p></a>
                        <a href="#"><p>Friends</p></a>
                        <a href="#"><p>Messages</p></a>
                    </div>
                </div>
            <?php else: ?>

                <span style="margin-left: 2px" href="#" class="button" id="toggle-signup">Sign Up</span>

                <div id="signup">
                    <div id="signup-triangle"></div>
                    <h1>Sign Up</h1>

                    <form action="<?= URL ?>index/signup" method="post">
                        <input type="text" placeholder="First Name" name="f_name"/>

                        <div class="name">
                            <input type="text" placeholder="Middle Name" name="m_name"/>
                            <input type="text" placeholder="Last Name" name="l_name"/>
                        </div>
                        <select name="gender">
                            <option selected>Gender</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                        </select>
                        <input type="date" placeholder="Birth Date" name="birth_date"/>
                        <input type="email" placeholder="Email" name="email"/>
                        <input type="password" placeholder="Password" name="pass"/>
                        <input type="password" placeholder="Retype Password" name="re_pass"/>
                        <input type="submit" value="Sign Up"/>
                    </form>
                </div>

                <span href="#" class="button" id="toggle-login">Log in</span>

                <div id="login">
                    <div id="login-triangle"></div>
                    <h1>Log in</h1>

                    <form action="<?= URL ?>index/login" method="post">
                        <input type="email" placeholder="Email" name="email"/>
                        <input type="password" placeholder="Password" name="pass"/>
                        <input type="submit" value="Log in"/>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="clear"></div>
</div>

<div class="container">