<?php
session_start();
require_once('../db/config.php');
require_once('../const/web-info.php');
require_once('../const/check_session.php');
require_once('const/dashboard.php');
switch($res) {
	case '0':
	$_SESSION['reply'] = "006";
	header("location:../login");
	break;

	case '2':
	$_SESSION['reply'] = "005";
	header("location:../login");
	break;

	case '3':
	$_SESSION['reply'] = "007";
	header("location:../login");
	break;
}

if ($role == "admin") {
}else{
$_SESSION['reply'] = "008";
header("location:../login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="icon" href="../icon/<?php echo AppIcon; ?>" sizes="32x32">
	<meta name="description" content="<?php echo AppDesc; ?>">
	<meta name="author" content="Bwire Mashauri">
	<title><?php echo AppName; ?> – Dashboard</title>

</head>
<body>

	<header class="header">
		<div class="header__content">

			<a href="../" class="header__logo">
				<img class="inner_logo" src="../img/<?php echo AppLogo; ?>" alt="">
			</a>

			<button class="header__btn" type="button">
				<span></span>
				<span></span>
				<span></span>
			</button>

		</div>
	</header>

	<div class="sidebar">
		<a href="../" class="sidebar__logo">
			<img class="inner_logo" src="../img/<?php echo AppLogo; ?>" alt="">
		</a>

		<div class="sidebar__user">
			<div class="sidebar__user-img">
				<img class="profile_in" src="../img/users/<?php echo $image; ?>" alt="">
			</div>

			<div class="sidebar__user-title">
				<span>Website Admin</span>
				<p><?php echo $rusername; ?></p>
			</div>

			<a class="sidebar__user-btn" href="../logout">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z"/></svg>
			</a>
		</div>

		<ul class="sidebar__nav">
			<li class="sidebar__nav-item">
				<a href="./" class="sidebar__nav-link sidebar__nav-link--active"><i class="side_icon feather icon-home"></i> <span>Dashboard</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="catalog" class="sidebar__nav-link "><i class="side_icon feather icon-grid"></i> <span>Catalog</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="genre" class="sidebar__nav-link "><i class="side_icon feather icon-layers"></i> <span>Genres</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="plans" class="sidebar__nav-link "><i class="side_icon feather icon-box"></i> <span>Pricing Plans</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="coupons" class="sidebar__nav-link "><i class="side_icon feather icon-gift"></i> <span>Coupons</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="users" class="sidebar__nav-link "><i class="side_icon feather icon-users"></i> <span>Users</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="comments" class="sidebar__nav-link "><i class="side_icon feather icon-message-square"></i> <span>Comments</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="reviews" class="sidebar__nav-link "><i class="side_icon feather icon-star"></i> <span>Reviews</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="smtp" class="sidebar__nav-link "><i class="side_icon feather icon-mail"></i> <span>SMTP Settings</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="account" class="sidebar__nav-link "><i class="side_icon feather icon-user"></i> <span>Account Settings</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="payment_gateways" class="sidebar__nav-link "><i class="side_icon feather icon-credit-card"></i> <span>Payment Gateways</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="settings" class="sidebar__nav-link "><i class="side_icon feather icon-settings"></i> <span>General Settings</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="more_settings" class="sidebar__nav-link"><i class="side_icon feather icon-life-buoy"></i> <span>Additional Settings</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="../" class="sidebar__nav-link "><i class="side_icon feather icon-arrow-left-circle"></i> <span>Back to <?php echo AppName; ?></span></a>
			</li>
		</ul>

		<div class="sidebar__copyright">© <?php echo AppName; ?>, <?php echo date('Y'); ?>. <br>Developed by <a href="https://instagram.com/beatsbybwire" target="_blank">Bwire Mashauri</a></div>

	</div>

	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="main__title">
						<h2>Dashboard</h2>

						<a href="add-item" class="main__title-link">add item</a>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>Registered Users</span>
						<p><?php echo number_format($registered_users); ?></p>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z"></path></svg>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>Items Added</span>
						<p><?php echo number_format($items_added); ?></p>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,13H4a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,19H5V15H9ZM20,3H14a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V4A1,1,0,0,0,20,3ZM19,9H15V5h4Zm1,7H18V14a1,1,0,0,0-2,0v2H14a1,1,0,0,0,0,2h2v2a1,1,0,0,0,2,0V18h2a1,1,0,0,0,0-2ZM10,3H4A1,1,0,0,0,3,4v6a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V4A1,1,0,0,0,10,3ZM9,9H5V5H9Z"/></svg>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>Sales Today</span>
						<p><?php if (AppCurrency == "") {}else{ print AppCurrency;} echo number_format($sales_today,2); if (AppCurrency == "") {print ' '.strtoupper(AppISO).'';}else{}?></p>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a10 10 0 1 0 10 10H12V2zM21.18 8.02c-1-2.3-2.85-4.17-5.16-5.18"/></svg>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>Sales All Time</span>
						<p><?php if (AppCurrency == "") {}else{ print AppCurrency;} echo number_format($sales_all_time,2); if (AppCurrency == "") {print ' '.strtoupper(AppISO).'';}else{}?></p>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18.6 18.6L12 12V2.5"/><circle cx="12" cy="12" r="10"/></svg>
					</div>
				</div>

				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,6a1,1,0,0,0-1,1V17a1,1,0,0,0,2,0V7A1,1,0,0,0,12,6ZM7,12a1,1,0,0,0-1,1v4a1,1,0,0,0,2,0V13A1,1,0,0,0,7,12Zm10-2a1,1,0,0,0-1,1v6a1,1,0,0,0,2,0V11A1,1,0,0,0,17,10Zm2-8H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1Z"/></svg> Popular items</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__more" href="catalog">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--1">
							<table class="main__table main__table--dash">
								<thead>
									<tr>
										<th>TITLE</th>
										<th>CATEGORY</th>
										<th>RATING</th>
										<th>VIEWS</th>
										<th>STATUS</th>
									</tr>
								</thead>
								<tbody>
									<?php
									function number_abbr($number)
									{
									$abbrevs = [12 => 'T', 9 => 'B', 6 => 'M', 3 => 'K', 0 => ''];

									foreach ($abbrevs as $exponent => $abbrev) {
										if (abs($number) >= pow(10, $exponent)) {
											$display = $number / pow(10, $exponent);
											$decimals = ($exponent >= 3 && round($display) < 100) ? 1 : 0;
											$number = number_format($display, $decimals).$abbrev;
											break;
										}
									}

									return $number;
									}
									try {
									$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

									$stmt = $conn->prepare("SELECT * FROM tbl_items ORDER BY views DESC LIMIT 5");
									$stmt->execute();
									$result = $stmt->fetchAll();

									foreach($result as $row) {
									$st1 = preg_replace("/[^a-zA-Z]/", " ", $row[1]);
									$st2 =  preg_replace('/\s+/', ' ', $st1);
									$item_title = strtolower(str_replace(' ', '-', $st2));

									if ($row[14] < 10) {
										$rates = ''.$row[14].'.0';
									}else{
										$rates = $row[14];
									}

									?>
									<tr>
										<td>
											<div class="main__table-text"><a href="../item/<?php echo $row[2]; ?>/<?php echo $item_title; ?>"><?php echo $row[1]; ?></a></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo $row[8]; ?></div>
										</td>
										<td>
											<div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> <?php echo $rates; ?></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo number_abbr($row[15]); ?></div>
										</td>
										<td>
											<div class="main__table-text main__table-text--<?php if ($row[16] == "Visible") { print 'green';}else{print'red';} ?>"><?php echo $row[16]; ?></div>
										</td>

									</tr>
									<?php
									}

									}catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
									?>


								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z"/></svg> Latest items</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__more" href="catalog">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--2">
							<table class="main__table main__table--dash">
								<thead>
									<tr>
										<th>TITLE</th>
										<th>CATEGORY</th>
										<th>RATING</th>
										<th>VIEWS</th>
										<th>STATUS</th>
									</tr>
								</thead>
								<tbody>
									<?php

									try {
									$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

									$stmt = $conn->prepare("SELECT * FROM tbl_items ORDER BY c_id DESC LIMIT 5");
									$stmt->execute();
									$result = $stmt->fetchAll();

									foreach($result as $row) {
									$st1 = preg_replace("/[^a-zA-Z]/", " ", $row[1]);
									$st2 =  preg_replace('/\s+/', ' ', $st1);
									$item_title = strtolower(str_replace(' ', '-', $st2));

									if ($row[14] < 10) {
										$rates = ''.$row[14].'.0';
									}else{
										$rates = $row[14];
									}

									?>
									<tr>
										<td>
											<div class="main__table-text"><a href="../item/<?php echo $row[2]; ?>/<?php echo $item_title; ?>"><?php echo $row[1]; ?></a></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo $row[8]; ?></div>
										</td>
										<td>
											<div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> <?php echo $rates; ?></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo number_abbr($row[15]); ?></div>
										</td>
										<td>
											<div class="main__table-text main__table-text--<?php if ($row[16] == "Visible") { print 'green';}else{print'red';} ?>"><?php echo $row[16]; ?></div>
										</td>

									</tr>
									<?php
									}

									}catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
									?>


								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z"/></svg> Latest users</h3>

							<div class="dashbox__wrap">

								<a class="dashbox__more" href="users">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--3">
							<table class="main__table main__table--dash">
								<thead>
									<tr>
										<th>ID</th>
										<th>FULL NAME</th>
										<th>EMAIL</th>
										<th>USERNAME</th>
									</tr>
								</thead>
								<tbody>

									<?php

									try {
									$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

									$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE role = 'user' ORDER BY reg_date DESC LIMIT 5");
									$stmt->execute();
									$result = $stmt->fetchAll();

									foreach($result as $row) {


									?>
									<tr>
										<td>
											<div class="main__table-text"><?php echo $row[0]; ?></div>
										</td>
										<td>
											<div class="main__table-text"><a href="edit-user?node=<?php echo $row[0]; ?>"><?php echo $row[1]; ?> <?php echo $row[2]; ?></a></div>
										</td>
										<td>
											<div class="main__table-text main__table-text--grey"><a href="mailto:<?php echo $row[3]; ?>"><?php echo $row[3]; ?></a></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo $row[4]; ?></div>
										</td>
									</tr>
									<?php
									}

									}catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
									?>



								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> Latest reviews</h3>

							<div class="dashbox__wrap">

								<a class="dashbox__more" href="reviews">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--4">
							<table class="main__table main__table--dash">
								<thead>
									<tr>

										<th>ITEM</th>
										<th>USER</th>
										<th>COMMENT</th>
										<th>RATING</th>
									</tr>
								</thead>
								<tbody>
									<?php
									function truncate_string ($string, $maxlength, $extension) {

										$cutmarker = "**cut_here**";

										if (strlen($string) > $maxlength) {
											$string = wordwrap($string, $maxlength, $cutmarker);

											$string = explode($cutmarker, $string);

											$string = $string[0] . $extension;
										}

										return $string;

										}

									try {
									$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$tot = 0;

									$stmt = $conn->prepare("SELECT * FROM tbl_reviews LEFT JOIN tbl_items ON tbl_reviews.item = tbl_items.item_id LEFT JOIN tbl_users ON tbl_reviews.user = tbl_users.id ORDER BY tbl_reviews.id DESC");
									if (!empty($_GET['keywords'])) {
									$stmt->execute([$keyword]);
									}else{
									$stmt->execute();
									}

									$result = $stmt->fetchAll();

									foreach($result as $row) {
										$st1 = preg_replace("/[^a-zA-Z]/", " ", $row[8]);
										$st2 =  preg_replace('/\s+/', ' ', $st1);
										$item_title = strtolower(str_replace(' ', '-', $st2));

										if ($row[5] < 10) {
											$review = ''.$row[5].'.0';
										}else{
											$review = ''.$row[5].'';
										}

									?>
									<tr>
										<td>
											<div class="main__table-text"><a href="../item/<?php echo $row[1]; ?>/<?php echo $item_title; ?>"><?php echo $row[8]; ?></a></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo $row[28]; ?> <?php if ($row[34] == "1") {print '<img title="Verified Account" id="verified" class="verification_inside" src="../img/check.svg">';} ?></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo truncate_string ($row[6], 35, " ..."); ?></div>
										</td>
										<td>
											<div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> <?php echo $review; ?></div>
										</td>
									</tr>

									<?php
									}

									}catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
									?>


								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</main>

	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/smooth-scrollbar.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/admin.js"></script>
</body>

</html>
