<nav>
    <ul>
        <li>
            <a href="../About/About.php">
                <img id="logo" src="../Essential Kits/pic/LOGO.png" alt="img-1">
            </a>
        </li>
        
        <li class="title">
            <a href="../About/About.php">
                CTS Library
            </a>
        </li>

        <!-- If screen size is very small then mini options will appear -->

        <li id="minoptions">
            <span class="icon-iconmonstr-menu-right-lined"></span>
            <ul id="minoption-optionlist">
                <?php
                    global $aboutflag;
                    if(!isset($_SESSION['user'])) {
                        if(!isset($aboutflag)) {
                ?>
                <li class="minoption-optionlist-options">
                    <a href="../About/About.php"><span class="fa fa-home"></span>About</a>
                </li>
                <?php
                        }
                    }
                    else {
                        if($aboutflag) {
                ?>
                <li class="minoption-optionlist-options">
                    <a href="../Dashboard/Dashboard.php"><span class="fa fa-home"></span>Go to Dashboard</a>
                </li>
                <?php
                        }
                        else {
                ?>
                <li class="minoption-optionlist-options">
                    <a href="../About/About.php"><span class="fa fa-home"></span>About</a>
                </li>
                <?php
                        }
                    }
                ?>
                <?php
                    global $searchflag;
                    if(!isset($_SESSION['user'])) {
                        if(!isset($searchflag)) {
                ?>
                <li class="minoption-optionlist-options">
                    <a href="../Search Book/Searchbook.php"><span class="fa fa-magnifying-glass"></span>Search Book</a>
                </li>
                <?php
                        }
                    }
                    else {
                        if($searchflag) {
                ?>
                <li class="minoption-optionlist-options">
                    <a href="../Dashboard/Dashboard.php"><span class="fa fa-home"></span>Go to Dashboard</a>
                </li>
                <?php
                        }
                        else {
                ?>
                <li class="minoption-optionlist-options">
                    <a href="../Search Book/Searchbook.php"><span class="fa fa-magnifying-glass"></span>Search Book</a>
                </li>
                <?php
                        }
                    }
                ?>
                <li class="minoption-optionlist-options">
                    <a class="show-contactus"><span class="fa fa-address-card"></span>Contact Us</a>
                </li>
                <li class="minoption-optionlist-options">
                    <div id="light-icon-theme" class="icon"><ion-icon name="sunny-outline"></ion-icon>Light Theme</div>
                    <div id="dark-icon-theme"><span class="fa-solid fa-moon"></span>Dark Theme</div>
                </li>

            </ul>
        </li>

        <!-- For medium to bigger screens -->

        <?php
            global $aboutflag;
            if(!isset($_SESSION['user'])) {
                if(!isset($aboutflag)) {
        ?>
        <li class="option">
            <a href="../About/About.php"><span class="fa fa-home"></span>About</a>
        </li>
        <?php
                }
            }
            else {
                if($aboutflag) {
        ?>
        <li class="option">
            <a href="../Dashboard/Dashboard.php"><span class="fa fa-home"></span>Go to Dashboard</a>
        </li>
        <?php
                }
                else {
        ?>
        <li class="option">
            <a href="../About/About.php"><span class="fa fa-home"></span>About</a>
        </li>
        <?php
                }
            }
        ?>
        
        <?php
            global $searchflag;
            if(!isset($_SESSION['user'])) {
                if(!isset($searchflag)) {
        ?>
        <li class="option">
            <a href="../Search Book/Searchbook.php"><span class="fa fa-magnifying-glass"></span>Search Book</a>
        </li>
        <?php
                }
            }
            else {
                if($searchflag) {
        ?>
        <li class="option">
            <a href="../Dashboard/Dashboard.php"><span class="fa fa-home"></span>Go to Dashboard</a>
        </li>
        <?php
                }
                else {
        ?>
        <li class="option">
            <a href="../Search Book/Searchbook.php"><span class="fa fa-magnifying-glass"></span>Search Book</a>
        </li>
        <?php
                }
            }
        ?>
        
        <li class="option">
            <a class="show-contactus"><span class="fa fa-address-card"></span>Contact Us</a>
        </li>
        
        <li id="option" class="option-btns">
            <span class="fa-solid fa-caret-down"></span>
            <ul class="sublist">
                <?php
                    global $aboutflag;
                    if(!isset($_SESSION['user'])) {
                        if(!isset($aboutflag)) {
                ?>
                <li class="suboption">
                    <a href="../About/About.php"><span class="fa fa-home"></span>About</a>
                </li>
                <?php
                        }
                    }
                    else {
                        if($aboutflag) {
                ?>
                <li class="suboption">
                    <a href="../Dashboard/Dashboard.php"><span class="fa fa-home"></span>Go to Dashboard</a>
                </li>
                <?php
                        }
                        else {
                ?>
                <li class="suboption">
                    <a href="../About/About.php"><span class="fa fa-home"></span>About</a>
                </li>
                <?php
                        }
                    }
                ?>
                <?php
                    global $searchflag;
                    if(!isset($_SESSION['user'])) {
                        if(!isset($searchflag)) {
                ?>
                <li class="suboption">
                    <a href="../Search Book/Searchbook.php"><span class="fa fa-magnifying-glass"></span>Search Book</a>
                </li>
                <?php
                        }
                    }
                    else {
                        if($searchflag) {
                ?>
                <li class="suboption">
                    <a href="../Dashboard/Dashboard.php"><span class="fa fa-home"></span>Go to Dashboard</a>
                </li>
                <?php
                        }
                        else {
                ?>
                <li class="suboption">
                    <a href="../Search Book/Searchbook.php"><span class="fa fa-magnifying-glass"></span>Search Book</a>
                </li>
                <?php
                        }
                    }
                ?>
                <li class="suboption">
                    <a class="show-contactus"><span class="fa fa-address-card"></span>Contact Us</a>
                </li>
            </ul>
        </li>
        
        <li class="option-btns">
            <span id="light-icon" class="icon"><ion-icon name="sunny-outline"></ion-icon></span><span id="dark-icon" class="fa-solid fa-moon"></span>
        </li>
        
        <li class="option-btns">
            <span class="fa fa-bell"></span>
        </li>
        
        <?php
            if (!isset($_SESSION['user'])) {
        ?>
        <li id="login-btn">
            <button class="btn" onclick="window.location = ('../Sign In/signin.php')">
                <span class="fa fa-sign-in"></span>Sign In
            </button>
        </li>
        <?php
            }
            else {
        ?>
        <li id="session-btn" class="option-btns">
            <div class="account">
                <?php
                    if ($_SESSION['role'] == 'student') {?>
                <span class="fa-solid fa-user-graduate"></span>
                <?php
                    }
                    else {
                ?>
                <span class="fa-solid fa-user-shield"></span>
                <?php
                    }
                ?>
                <?php echo $_SESSION['name']; ?> 
            </div>
            <div class="dropdown">
                <a id="open-modal"><span class="icon"><ion-icon name="person-outline"></ion-icon></span>My Account</a>
                <a href="#"><span class="icon"><ion-icon name="settings-outline"></ion-icon></span>Settings</a>
                <a name = "logout" href="../Essential Kits/php/logout.php?logout=logout"><span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>Sign Out</a>
            </div>
        </li>
        <?php
            }
        ?>
    </ul>
</nav>
<?php
    include '../Essential Kits/php/Modal.php';
    include '../Essential Kits/php/contact-us.php';
?>