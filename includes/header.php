<style>
    /* DATE AND TIME */
    .page-title-box {
        color: #18372E;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .day {
        font-size: 20px;
        letter-spacing: 0.2rem;
    }

    .date {
        font-size: 12px;
    }

    .time {
        font-size: 15px;
        color: black;
        background-color: white;
        padding: 8px 5px;
        border-left: 4px solid #18372E;
    }

    /* LOGO */
    .header-left {
        background-color: #204A3D;
    }

    /* NOTIFICATION BELL */
    .fa-bell-o {
        color: black;
    }

    /* USER PROFILE */
    .user-img {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .user-img img,
    .user-img span {
        margin: 0;
        width: 1.2rem;
    }

    .user-container .nav-link {
        color: white;
        text-shadow: 1px 1px 2px black;
        font-size: 0.8rem;
    }

    /* WEATHER ICON */
    .weather-icon {
        width: 3.3rem;
    }

    /* TOGGLE ICON */
    .bar-icon span {
        background-color: #000;
    }
</style>

<div class="header">
    <!-- LOGO -->
    <div class="header-left">
        <a href="./admin-index.php" class="logo">
            <img src="./assets/img/pcc-logo.png" width="40" height="40" alt="PCC Logo">
        </a>
    </div>

    <!-- SIDEBAR TOGGLE -->
    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- DATE AND TIME -->
    <div class="page-title-box">
        <div class="d-flex flex-row">
            <img class="weather-icon" src="./assets/img/clouds.png">
        </div>

        <div class="d-flex flex-column">
            <h3 id="day" class="day mb-0"></h3>
            <h4 id="date" class="date"></h4>
        </div>

        <div class="d-flex flex-row">
            <div class="black-line"></div>
            <div class="d-flex flex-column align-items-end">
                <h4 id="time" class="time ml-3"></h4>
            </div>
        </div>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

    <ul class="nav user-menu">

        <!-- NOTIFICATION BELL -->
        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fa fa-bell" style="color: #000;"></i> <span class="badge badge-pill">#</span>
            </a>
            <div class="dropdown-menu notifications">
                <!-- NOTIICATION SAMPLE CONTENT -->
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li>

<!-- IMPORTANT -->
        <?php
        $sql = "SELECT * from repo_admin";
        $query = $dbh->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        $cnt = 1;
        ?>
<!-- IMPORTANT -->

        <!-- USER PROFILE -->
        <li class="nav-item dropdown has-arrow main-drop">
            <div class="user-container" id="userDropdown">
                <a href="#" class="nav-link" data-toggle="dropdown">
                    <span class="user-img">
                        <!--FIX-->
                        <img src="../profiles/<?php echo htmlentities($result->Picture); ?>" alt="User Picture">
                    </span>
                    <span class="user-text"></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">My Profile</a>
                    <a class="dropdown-item" href="settings.php">Settings</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </li>
        <!-- END USER PROFILE -->

    </ul>

    <!-- MOBILE MENU -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.php">My Profile</a>
            <a class="dropdown-item" href="settings.php">Settings</a>
            <a class="dropdown-item" href="login.php">Logout</a>
        </div>
    </div>
    <!-- END MOBILE MENU -->

</div>


<script>
    // DATE AND TIME
    function updateDateTime() {
        let now = new Date();

        // Format the day
        let dayOptions = {
            weekday: 'long'
        };
        let dayString = now.toLocaleDateString('en-US', dayOptions);
        document.getElementById("day").textContent = dayString + ", ";

        // Format the date
        let dateOptions = {
            month: 'long',
            day: 'numeric',
            year: 'numeric'
        };
        let dateString = now.toLocaleDateString('en-US', dateOptions);
        document.getElementById("date").textContent = dateString;

        // Format the time
        let timeOptions = {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        };
        let timeString = now.toLocaleTimeString('en-US', timeOptions);
        document.getElementById("time").textContent = timeString;
    }

    // Update the date and time every second
    setInterval(updateDateTime, 1000);

    updateDateTime();
</script>