<?php
    include '../Essential Kits/php/conn.php';
    include "../Essential Kits/php/session.php";
    check_session();
	if ($_SESSION['role'] == 'student') {
		if(isset($_GET['did']) and isset($_GET['dopt'])) {
			$did = $_GET['did'];
			$dopt = $_GET['dopt'];
			if($dopt == "del") {
				$dltq="DELETE FROM demand WHERE AccNo = '$did'";
				$dltquery=mysqli_query($conn,$dltq);
				$dltq="UPDATE books SET Status = 'Available' WHERE AccNo = '$did'";
				$dltquery=mysqli_query($conn,$dltq);
				header('location:Dashboard.php');
			}
			if($dopt == "borr") {
				$borq="DELETE FROM demand WHERE AccNo = '$did'";
				$borquery=mysqli_query($conn,$borq);
				$borq="INSERT INTO borrowed (LibID, AccNo, `Group`) VALUES ('".$_SESSION['user']."', '$did', '".$_SESSION['group']."')";
				$borquery=mysqli_query($conn,$borq);
				$borq="UPDATE books SET Status = 'Borrowed' WHERE AccNo = '$did'";
				$borquery=mysqli_query($conn,$borq);
				header('location:Dashboard.php');
			}
		}
		if(isset($_GET['bid']) and isset($_GET['bopt'])) {
			$bid = $_GET['bid'];
			$bopt = $_GET['bopt'];
			if($bopt == "ret") {
				$borq="DELETE FROM borrowed WHERE AccNo = '$bid'";
				$borquery=mysqli_query($conn,$borq);
				$borq="UPDATE books SET Status = 'Available' WHERE AccNo = '$bid'";
				$borquery=mysqli_query($conn,$borq);
				header('location:Dashboard.php');
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../Essential Kits/php/Metadata.php'; ?>
    <link rel="stylesheet" href="../Essential Kits/css/Navbar.css">
    <link rel="stylesheet" href="../Essential Kits/css/Search Results.css">
    <link rel="stylesheet" href="./Dashboard-style.css">
	<script src="../Essential Kits/js/Navbar.js" defer></script>
    <script src="Dashboard-script.js" defer></script>
    <script src="https://kit.fontawesome.com/bef3bec8c1.js" crossorigin="anonymous" defer></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" defer></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" defer></script>
    <title>Welcome back <?php echo $_SESSION['name']; ?></title>
</head>

<body>
    <?php
        include '../Essential Kits/php/Navbar.php';
    ?>
    <div class="sidebar">
        <!-- <header>
            <h3><span class="fa-solid fa-bars"></span><div class="sideopt-text">Dashboard</div></h3>
        </header> -->
		<ul>
			<?php
				if ($_SESSION['role'] == 'student') {
			?>
            <li class="sideopt active">
				<a href="#home">
					<b></b><b></b>
					<span class="fa fa-home"></span>
					<div class="sideopt-text">Home</div>
				</a>
			</li>
            <li class="sideopt">
				<a href="#demanded-books">
					<b></b><b></b>
					<span class="fa fa-book"></span>
					<div class="sideopt-text">Demanded Books</div>
				</a>
			</li>
            <li class="sideopt">
				<a href="#borrowed-books">
					<b></b><b></b>
					<span class="fa fa-book"></span>
					<div class="sideopt-text">Borrowed Books</div>
				</a>
			</li>
			<?php
				}
				else {
			?>
            <li class="sideopt active">
				<a href="#home">
					<b></b><b></b>
					<span class="icon" style = "width: auto; padding-top: 3px;">
						<ion-icon name="home"></ion-icon>
					</span>
					<div class="sideopt-text">Home</div>
				</a>
			</li>
            <li class="sideopt">
				<a href="#request">
					<b></b><b></b>
					<span class="icon" style = "width: auto; padding-top: 3px;">
						<ion-icon name="arrow-undo"></ion-icon>
					</span>
					<div class="sideopt-text">Requests</div>
				</a>
			</li>
            <li class="sideopt">
				<a href="#book-management">
					<b></b><b></b>
					<span class="icon" style = "width: auto; padding-top: 3px;">
						<ion-icon name="book"></ion-icon>
					</span>
					<div class="sideopt-text">Manage Books</div>
				</a>
			</li>
			<li class="sideopt">
				<a href="#notification">
					<b></b><b></b>
					<span class="icon" style = "width: auto; padding-top: 3px;">
						<ion-icon name="notifications"></ion-icon>
					</span>
					<div class="sideopt-text">Notification</div>
				</a>
			</li>
			<li class="sideopt">
				<a href="#account-management">
					<b></b><b></b>
					<span class="icon" style = "width: auto; padding-top: 3px;"><ion-icon name="people"></ion-icon></span><div class="sideopt-text">Accounts</div></a></li>
			<?php
				}
			?>
        </ul>
    </div>
    <div id="main-content">
        <div class="main-content">
            <?php
				if ($_SESSION['role'] == 'student') {
			?>
			<section id="home">
                <h2>Hello there,</h2>
                <h2><?php echo $_SESSION['name']; ?></h2>
                <div>
                    <div class="gridbox">
                        <div class="gridcard">
                            <div class="gridcard-content">
                                <?php
                                    $q='select * from borrowed where LibID="'.$_SESSION['user'].'" ORDER BY `borrowed`.`BorrDt` DESC';
                                    $query = mysqli_query($conn,$q);
                                    // echo mysqli_num_rows($query);
                                    if(mysqli_num_rows($query)>0) {
                                        $res=mysqli_fetch_array($query);
                                        $q='select * from books where AccNo="'.$res['AccNo'].'"';
                                        $res=mysqli_fetch_array(mysqli_query($conn,$q));
                                ?>
                                <h3 class="gridcard-heading">Recently borrowed book</h3>
                                <div class="gridcard-context">
                                        <p><?php echo $res['Title']?>
                                        </p>by <?php echo $res['Author']?>
                                </div>
                                <?php
                                    }
                                    else {
                                ?>
                                    <h3 class="gridcard-heading">You have not taken any books yet</h3>
                                    <div class="gridcard-context">Borrow a book now!!</div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="gridcard">
                            <div class="gridcard-content">
                                <?php
                                    $q='select * from demand where StdID="'.$_SESSION['user'].'" ORDER BY `demand`.`DemandDate` DESC';
                                    $query = mysqli_query($conn,$q);
                                    // echo mysqli_num_rows($query);
                                    if(mysqli_num_rows($query)>0) {
                                        $res=mysqli_fetch_array($query);
                                        $q='select * from books where AccNo="'.$res['AccNo'].'"';
                                        $res=mysqli_fetch_array(mysqli_query($conn,$q));
                                ?>
                                    <h3 class="gridcard-heading">Recently demanded book</h3>
                                    <div class="gridcard-context">
                                        <p><?php echo $res['Title']?>
                                        </p>by <?php echo $res['Author']?>
                                    </div>
                                <?php
                                    }
                                    else {
                                ?>
                                    <h3 class="gridcard-heading">You have not demanded any books yet</h3>
                                    <div class="gridcard-context">Demand a book now!!</div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="gridcard">
                            <div class="gridcard-content">
                                <h3 class="gridcard-heading">Box 3</h3>
                                <div class="gridcard-context">Context 3</div>
                            </div>
                        </div>
                        <div class="gridcard">
                            <div class="gridcard-content">
                                <h3 class="gridcard-heading">Box 4</h3>
                                <div class="gridcard-context">Context 4</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="demanded-books">
                <h2>Demanded Books (<?php echo mysqli_num_rows(mysqli_query($conn,"select * from demand where StdID='".$_SESSION['user']."'")); ?>)</h2>
                <div>
					<div class="available-books-content">
						<?php
							$q="select * from demand where StdID='".$_SESSION['user']."' order by DemandDate DESC";
							$demanddata = mysqli_query($conn,$q);
							if(mysqli_num_rows($demanddata) > 0) {
								
						?>
							<div class="search-results">
						<?php
								while($demandinfo = mysqli_fetch_array($demanddata)) {
									$bookinfo=mysqli_fetch_array(mysqli_query($conn,'select * from books where AccNo="'.$demandinfo['AccNo'].'"'));
						?>
							<div class="search-results-bookinfo">
								<div class="search-results-bookinfo-bookpic">
									<img src="../Essential Kits/pic/photorealistic.jpg" alt="Book Cover">
								</div>
								<div class="search-results-bookinfo-bookinfo">
									<div class="search-results-bookinfo-secinfo">Demand Date: <?php echo date_format(date_create($demandinfo['DemandDate']),"M j, Y"); ?></div>
									<div class="search-results-bookinfo-secinfo">Demand Time: <?php echo date_format(date_create($demandinfo['DemandDate']),"g:i A"); ?></div>
									<div class="search-results-bookinfo-secinfo">Acc. No.:<?php echo $bookinfo['AccNo']; ?></div>
									<div class="search-results-bookinfo-title"><?php echo $bookinfo['Title']; ?></div>
									<div class="search-results-bookinfo-edition">(<?php echo $bookinfo['Edition']; ?> Edition)</div>
									<div class="search-results-bookinfo-secinfo">By <?php echo $bookinfo['Author']; ?></div>
									<div class="search-results-bookinfo-publisher"><?php echo $bookinfo['Publisher']; ?></div>
									<div class="search-results-bookinfo-secinfo">Click to show options</div>
								</div>
								<div class="search-results-bookinfo-options">
									<?php
									$q1='select TIME_TO_SEC(TIMEDIFF(CURRENT_TIMESTAMP, "'.$demandinfo['DemandDate'].'")) as timediff';
									$res1=mysqli_fetch_array(mysqli_query($conn,$q1));
									$mindiff = 86400;  //Sets minimum difference time of 1 day
									if($res1['timediff'] >= $mindiff) {  //If user has demanded a book after minimum day
									?>
									<div class="search-results-bookinfo-optionset">
										<button onclick="window.location = ('../Dashboard/Dashboard.php?did=<?php echo $demandinfo['AccNo']; ?>&dopt=del')" class="search-results-bookinfo-optionset-btn red">
											Remove from demand list
										</button>
										<button onclick="window.location = ('../Dashboard/Dashboard.php?did=<?php echo $demandinfo['AccNo']; ?>&dopt=borr')" class="search-results-bookinfo-optionset-btn green">
											Borrow this book
										</button>
									</div>
									<?php
									}
									else {
									?>
									<div class="search-results-bookinfo-optionset">
                                        <div class="search-results-bookinfo-optionset-pretext">
                                            Options currently not available!
                                        </div>
                                        <div class="search-results-bookinfo-optionset-text">
                                            Please check after sometime
                                        </div>
									</div>
									<?php
									}
									?>
								</div>
							</div>
						<?php
								}
						?>
							</div>
							<?php
							}
							else {
							?>
							<div class="nobooks">
								<img src="../Essential Kits/pic/asdd.png" alt="">
								<p class="nobooks">Oops!! Seems like there are no such books that you have searched</p>
								<p class="nobooks">Try to search something else...</p>
							</div>
							<?php
							}
							?>
					</div>
                </div>
            </section>
            <section id="borrowed-books">
                <h2>Borrowed Books (<?php echo mysqli_num_rows($conn->query("select * from borrowed where LibID='".$_SESSION['user']."'")); ?>)</h2>
                <div>
                <div class="available-books-content">
						<?php
							$q="select * from borrowed where LibID='".$_SESSION['user']."' order by BorrDt DESC";
							$borrowdata = mysqli_query($conn,$q);
							if(mysqli_num_rows($borrowdata) > 0) {
								
						?>
							<div class="search-results">
						<?php
								while($borrowinfo = mysqli_fetch_array($borrowdata)) {
									$bookinfo=mysqli_fetch_array(mysqli_query($conn,'select * from books where AccNo="'.$borrowinfo['AccNo'].'"'));
						?>
							<div class="search-results-bookinfo">
								<div class="search-results-bookinfo-bookpic">
									<img src="../Essential Kits/pic/photorealistic.jpg" alt="Book Cover">
								</div>
								<div class="search-results-bookinfo-bookinfo">
                                    <div class="search-results-bookinfo-secinfo">Borrow Date: <?php echo date_format(date_create($borrowinfo['BorrDt']),"M j, Y"); ?></div>
									<div class="search-results-bookinfo-secinfo">Borrow Time: <?php echo date_format(date_create($borrowinfo['BorrDt']),"g:i A"); ?></div>
                                    <div class="search-results-bookinfo-secinfo">Acc. No.:<?php echo $bookinfo['AccNo']; ?></div>
									<div class="search-results-bookinfo-title"><?php echo $bookinfo['Title']; ?></div>
									<div class="search-results-bookinfo-edition">(<?php echo $bookinfo['Edition']; ?> Edition)</div>
									<div class="search-results-bookinfo-secinfo">By <?php echo $bookinfo['Author']; ?></div>
									<div class="search-results-bookinfo-publisher"><?php echo $bookinfo['Publisher']; ?></div>
									<div class="search-results-bookinfo-secinfo">Click to show options</div>
								</div>
								<div class="search-results-bookinfo-options">
									<?php
									$q1='select TIME_TO_SEC(TIMEDIFF(CURRENT_TIMESTAMP, "'.$borrowinfo['BorrDt'].'")) as timediff';
									$res1=mysqli_fetch_array(mysqli_query($conn,$q1));
									$mindiff = 86400;  //Sets minimum difference time of 1 day
									if($res1['timediff'] >= $mindiff) {  //If user has demanded a book after minimum day
									?>
									<div class="search-results-bookinfo-optionset">
                                        <div class="search-results-bookinfo-optionset-pretext">
                                            Return this book to the Library
                                        </div>
										<button onclick="window.location = ('../Dashboard/Dashboard.php?bid=<?php echo $borrowinfo['AccNo']; ?>&bopt=ret')" class="search-results-bookinfo-optionset-btn green">
											Return book
										</button>
									</div>
									<?php
									}
									else {
									?>
									<div class="search-results-bookinfo-optionset">
                                        <div class="search-results-bookinfo-optionset-pretext">
                                            Options currently not available!
                                        </div>
                                        <div class="search-results-bookinfo-optionset-text">
                                            Please check after sometime
                                        </div>
									</div>
									<?php
									}
									?>
								</div>
							</div>
						<?php
								}
						?>
							</div>
							<?php
							}
							else {
							?>
							<div class="nobooks">
								<img src="../Essential Kits/pic/asdd.png" alt="">
								<p class="nobooks">Oops!! Seems like there are no such books that you have searched</p>
								<p class="nobooks">Try to search something else...</p>
							</div>
							<?php
							}
							?>
					</div>
                </div>
            </section>
			<?php
				}
			else {
			?>
			<section id="home">
				<h2>Hey <?php echo $_SESSION['name']; ?>,</h2>
			</section>
			<section id="request">
				<h2>Requests<?php ?></h2>
				<div id="request-panel">
					<div id="request-panel-options">
						<div id="demand-request-page" class="active">Demand Requests (<?php echo 0; ?>)</div>
						<div id="borrow-request-page">Borrow Requests (<?php echo 0; ?>)</div>
						<div id="group-request-page">Group Requests (<?php echo 0; ?>)</div>
					</div>
					<div id="request-panel-requests">

					</div>
				</div>
			</section>
			<section id="book-management">
				<h2>Books (<?php echo mysqli_num_rows($conn -> query("SELECT * FROM books")); ?>)</h2>
			</section>
			<section id="notification">
				<h2>Notification Page</h2>
				
			</section>
			<section id="account-management">

			</section>
			<?php
			}
			?>
        </div>
    </div>
</body>

</html>
<?php mysqli_close($conn); ?>