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

if (isset($_GET['node'])) {
$user = $_GET['node'];

try {
$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE id = ?");
$stmt->execute([$user]);
$result = $stmt->fetchAll();

if (count($result) < 1) {
  header("location:./");
}else{
  foreach($result as $row)
  {
    $u_fname = $row[1];
    $u_lname = $row[2];
    $u_email = $row[3];
    $u_username = $row[4];
    $u_status = $row[5];
    $u_img = $row[8];
    $u_badge = $row[10];
  }
}

$stmt = $conn->prepare("SELECT * FROM tbl_user_plans WHERE user = ?");
$stmt->execute([$user]);
$result = $stmt->fetchAll();

if (count($result) > 0) {
foreach($result as $row) {
$expire__date = $row[4];

if (new DateTime() > new DateTime($expire__date)) {
  $plan_name = "Free Plan";
  $expire_date = "Forever";
  $color = "red";
} else {
  $plan_name = $row[2];
  $color = "green";
  $old_date = $expire__date;
  $old_date_timestamp = strtotime($old_date);
  $new_date = date('d M, Y h:i:s', $old_date_timestamp);
  $expire_date = $new_date;
}

}
}else{
  $plan_name = "Free Plan";
  $expire_date = "Forever";
  $color = "red";
}

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}else{
header("location:./");
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
	<link type="text/css" rel="stylesheet" href="../plugins/loader/waitMe.css">
	<link rel="stylesheet" href="../plugins/datatable/css/jquery.dataTables.min.css">
	<link rel="icon" href="../icon/<?php echo AppIcon; ?>" sizes="32x32">
	<meta name="description" content="<?php echo AppDesc; ?>">
	<meta name="author" content="Bwire Mashauri">
	<title><?php echo AppName; ?> – Edit User</title>

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
				<a href="./" class="sidebar__nav-link"><i class="side_icon feather icon-home"></i> <span>Dashboard</span></a>
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
						<h2>Edit user</h2>
					</div>
				</div>

				<div class="col-12">
					<div class="profile__content">

						<div class="profile__user">
							<div class="profile__avatar">
								<img class="profile_in" src="../img/users/<?php echo $u_img; ?>" alt="">
							</div>

							<div class="profile__meta profile__meta--<?php echo $color; ?>">
								<h3><?php echo $u_username; ?> <?php if ($u_badge == "1") {print '<img title="Verified Account" id="verified" class="verification_inside" src="../img/check.svg">';} ?> <span>(<?php echo $plan_name; ?>)</span></h3>
								<span>FlixTV ID: <?php echo $user; ?></span>
							</div>
						</div>

						<ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Profile</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Comments</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Reviews</a>
							</li>
						</ul>

						<div class="profile__mobile-tabs" id="profile__mobile-tabs">
							<div class="profile__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="Profile">
								<span></span>
							</div>

							<div class="profile__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Profile</a></li>

									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Comments</a></li>

									<li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Reviews</a></li>

								</ul>
							</div>
						</div>

						<div class="profile__actions">
							<a href="#modal-status3" class="profile__action profile__action--<?php if ($u_status == "1") {print'view';}else{print'banned';} ?> open-modal"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,13a1.49,1.49,0,0,0-1,2.61V17a1,1,0,0,0,2,0V15.61A1.49,1.49,0,0,0,12,13Zm5-4V7A5,5,0,0,0,7,7V9a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V12A3,3,0,0,0,17,9ZM9,7a3,3,0,0,1,6,0V9H9Zm9,12a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1Z"/></svg></a>
							<a href="#modal-delete3" class="profile__action profile__action--delete open-modal"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg></a>
						</div>

					</div>
				</div>

				<div class="col-12"><?php require_once('../const/check_reply.php'); ?></div>

				<div class="tab-content" id="myTabContent">

					<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
						<div class="col-12">
							<div class="sign__wrap">
								<div class="row">

									<div class="col-12 col-lg-6">
                    <form method="POST" id="app_frm" action="core/update_user_profile" class="sign__form sign__form--profile sign__form--first" enctype="multipart/form-data" autocomplete="OFF">
		                  <div class="row">
		                    <div class="col-12">
		                      <h4 class="sign__title">Profile details</h4>
		                    </div>

		                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
		                      <div class="sign__group">
		                        <label class="sign__label label_white">First Name</label>
		                        <input value="<?php echo $u_fname; ?>" type="text" name="first_name" class="sign__input txt-cap" required>
		                      </div>
		                    </div>

		                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
		                      <div class="sign__group">
		                        <label class="sign__label label_white">Last Name</label>
		                        <input value="<?php echo $u_lname; ?>" type="text" name="last_name" class="sign__input txt-cap" required>
		                      </div>
		                    </div>

		                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
		                      <div class="sign__group">
		                        <label class="sign__label label_white">Email</label>
		                        <input value="<?php echo $u_email; ?>" type="email" name="email" class="sign__input" required>
		                      </div>
		                    </div>

		                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
		                      <div class="sign__group">
		                        <label class="sign__label label_white">Username</label>
		                        <input value="<?php echo $u_username; ?>" type="text" name="username" class="sign__input" required>
		                      </div>
		                    </div>

		                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
		                      <div class="sign__group">
		                        <label class="sign__label label_white" >Avator</label>
		                        <div class="form__gallery">
		    											<label id="gallery1" for="form__gallery-upload">(Leave blank if no update)</label>
		    											<input data-name="#gallery1" id="form__gallery-upload" name="avator" class="form__gallery-upload" type="file" accept=".png, .jpg, .jpeg">
		    										</div>
		                      </div>
		                    </div>

												<input type="hidden" name="image" value="<?php echo $u_img; ?>">

                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                          <div class="sign__group">
                            <label class="sign__label" for="rights">Verification</label>
                            <select name="verification" required class="js-example-basic-single" id="rights">
                              <option <?php if ($u_badge == "1") { print ' selected '; } ?> value="1">Verified Account</option>
                              <option <?php if ($u_badge == "0") { print ' selected '; } ?> value="0">Unverified Account</option>
                            </select>
                          </div>
                        </div>

												<input type="hidden" name="user_id" value="<?php echo $user; ?>">

		                    <div class="col-6">
		                      <button name="submit" value="1" class="sign__btn" type="submit">Save Changes</button>
		                    </div>
												<?php
												if ($u_img == "user.svg") {
												}else{
												?>
												<div class="col-6">
													<a onclick="return confirm('Delete image?');" href="core/drop_user_avator?node=<?php echo $user; ?>" class="sign__btn">Delete Image</a>
												</div>
												<?php
												}
												?>
		                  </div>
		                </form>
									</div>

									<div class="col-12 col-lg-6">
											<form method="POST" id="app_frmc2" action="core/update_user_password" class="sign__form sign__form--profile sign__form--first" autocomplete="OFF">
											<div class="row">
												<div class="col-12">
													<h4 class="sign__title">Change password</h4>
												</div>

												<div class="col-12 col-md-6 col-lg-12 col-xl-6">
													<div class="sign__group">
														<label class="sign__label" for="newpass">New password</label>
														<input id="newpass" type="password" name="newpass" class="sign__input">
													</div>
												</div>

												<div class="col-12 col-md-6 col-lg-12 col-xl-6">
													<div class="sign__group">
														<label class="sign__label" for="confirmpass">Confirm new password</label>
														<input id="confirmpass" type="password" name="confirmpass" class="sign__input">
													</div>
												</div>
												<input type="hidden" name="user_id" value="<?php echo $user; ?>">

												<div class="col-12">
												 <button name="submit" value="1" class="sign__btn" type="submit">Save Changes</button>
												</div>
											</div>
										</form>


										<form method="POST" id="app_frmb" action="core/offer_plan" class="sign__form sign__form--profile sign__form--first mt-10" autocomplete="OFF">
										<div class="row">
											<div class="col-12">
												<h4 class="sign__title">Create Plan</h4>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="plan_box">Select Plan</label>
													<select name="plan" required class="js-example-basic-single" id="plan_box">
														<?php
														try {
														$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
														$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

														$stmt = $conn->prepare("SELECT * FROM tbl_plans ORDER BY plan");
														$stmt->execute();
														$result = $stmt->fetchAll();

														foreach($result as $row)
												    {
															?><option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option><?php
														}
														}catch(PDOException $e)
												    {
												    echo "Connection failed: " . $e->getMessage();
												    }
														?>
													</select>
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label">Enter Days</label>
													<input type="number" name="days" class="sign__input">
												</div>
											</div>
											<input type="hidden" name="user_id" value="<?php echo $user; ?>">

											<div class="col-12">
											 <button name="submit" value="1" class="sign__btn" type="submit">Save Changes</button>
											</div>
										</div>
									</form>
									</div>



								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">

						<div class="col-12">
							<div class="main__table-wrap">
								<table id="datatbl" class="main__table">
									<thead>
										<tr>
											<th>ITEM</th>
		                  <th>USER</th>
		                  <th>COMMENT</th>
											<th>CREATED DATE</th>
											<th>ACTIONS</th>
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

		                $stmt = $conn->prepare("SELECT * FROM tbl_comments LEFT JOIN tbl_items ON tbl_comments.item = tbl_items.item_id LEFT JOIN tbl_users ON tbl_comments.user = tbl_users.id WHERE tbl_users.id = ? ORDER BY tbl_comments.id DESC");
										$stmt->execute([$user]);

		                $result = $stmt->fetchAll();
										$tot = count($result);

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
												<div class="main__table-text"><a target="_blank" href="../item/<?php echo $row[1]; ?>/<?php echo $item_title; ?>"><?php echo $row[8]; ?></a></div>
											</td>
		                  <td>
		                    <div class="main__table-text"><?php echo $row[28]; ?> <?php if ($row[34] == "1") {print '<img title="Verified Account" id="verified" class="verification_inside" src="../img/check.svg">';} ?></div>
		                  </td>

		                  <td >
		                    <div class="main__table-text" ><?php echo truncate_string ($row[4], 50, " ..."); ?></div>
		                  </td>
											<td>
												<div class="main__table-text"><?php echo $row[3]; ?></div>
											</td>

											<td>
												<div class="main__table-btns">

													<a href="#modal-view<?php echo $row[0];?>" class="main__table-btn main__table-btn--view open-modal">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</a>
													<a onclick="return confirm('Are yuo sure you want to delete?');" href="core/drop_comment.php?node=<?php echo $row[0];?>&href=edit-user?node=<?php echo $user; ?>" class="main__table-btn main__table-btn--delete">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
													</a>
												</div>
											</td>

		                  <div id="modal-view<?php echo $row[0];?>" class="zoom-anim-dialog mfp-hide modal modal--view">
		                    <div class="reviews__autor">
		                      <img class="reviews__avatar" src="../img/users/<?php echo $row[32]; ?>" alt="">
		                      <span class="comments__name"><?php echo $row[25]; ?> <?php echo $row[26]; ?> <?php if ($row[34] == "1") {print '<img title="Verified Account" id="verified" class="verification_inside" src="../img/check.svg">';} ?></span>
		                      <span class="comments__time"><?php echo $row[3]; ?></span>
		                    </div>
		                    <p class="comments__text"><?php echo $row[4]; ?></p>
		                  </div>

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

					<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">

						<div class="col-12">
							<div class="main__table-wrap">
								<table id="datatbl2" class="main__table">
									<thead>
										<tr>
											<th>ITEM</th>
		                  <th>USER</th>
											<th>RATING</th>
		                  <th>TITLE</th>
											<th>CREATED DATE</th>
											<th>ACTIONS</th>
										</tr>
									</thead>

									<tbody>

		                <?php




		                try {
		                $conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
		                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$tot = 0;

		                $stmt = $conn->prepare("SELECT * FROM tbl_reviews LEFT JOIN tbl_items ON tbl_reviews.item = tbl_items.item_id LEFT JOIN tbl_users ON tbl_reviews.user = tbl_users.id WHERE tbl_reviews.user = ? ORDER BY tbl_reviews.id DESC");
										$stmt->execute([$user]);

		                $result = $stmt->fetchAll();
										$tot = count($result);

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
												<div class="main__table-text"><a target="_blank" href="../item/<?php echo $row[1]; ?>/<?php echo $item_title; ?>"><?php echo $row[8]; ?></a></div>
											</td>
		                  <td>
		                    <div class="main__table-text"><?php echo $row[28]; ?> <?php if ($row[34] == "1") {print '<img title="Verified Account" id="verified" class="verification_inside" src="../img/check.svg">';} ?></div>
		                  </td>
											<td>
												<div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> <?php echo $review; ?></div>
											</td>
		                  <td >
		                    <div class="main__table-text" ><?php echo truncate_string ($row[3], 40, " ..."); ?></div>
		                  </td>
											<td>
												<div class="main__table-text"><?php echo $row[4]; ?></div>
											</td>

											<td>
												<div class="main__table-btns">

													<a href="#modal-view<?php echo $row[0];?>" class="main__table-btn main__table-btn--view open-modal">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</a>
													<a onclick="return confirm('Are yuo sure you want to delete?');" href="core/drop_review.php?node=<?php echo $row[0];?>&href=edit-user?node=<?php echo $user; ?>" class="main__table-btn main__table-btn--delete">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
													</a>
												</div>
											</td>

		                  <div id="modal-view<?php echo $row[0];?>" class="zoom-anim-dialog mfp-hide modal modal--view">
		                    <div class="reviews__autor">
		                      <img class="reviews__avatar" src="../img/users/<?php echo $row[32]; ?>" alt="">
		                      <span class="reviews__name"><?php echo truncate_string ($row[3], 60, " ..."); ?></span>
		                      <span class="reviews__time"><?php echo $row[4]; ?> by <?php echo $row[25]; ?> <?php echo $row[26]; ?> <?php if ($row[34] == "1") {print '<img title="Verified Account" id="verified" class="verification_inside" src="../img/check.svg">';} ?></span>

		                      <span class="reviews__rating"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> <?php echo $review; ?></span>
		                    </div>
		                    <p class="reviews__text"><?php echo $row[6]; ?></p>
		                  </div>

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
		</div>
	</main>


	<div id="modal-status3" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Status change</h6>

		<p class="modal__text">Are you sure about immediately change status?</p>

    <div class="modal__btns">
      <?php
      if ($u_status == "1") {
      ?>
      <a href="core/ban_acc?node=<?php echo $user; ?>&ref=edit-user?node=<?php echo $user; ?>" class="modal__btn modal__btn--apply">Ban User</a>
      <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
      <?php
      }else{
      ?>
      <a href="core/un_ban_acc?node=<?php echo $user; ?>&ref=edit-user?node=<?php echo $user; ?>" class="modal__btn modal__btn--apply">Activate User</a>
      <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
      <?php
      }
      ?>

    </div>
	</div>

	<div id="modal-delete3" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">User delete</h6>

		<p class="modal__text">Are you sure to permanently delete <?php echo $u_fname; ?> <?php echo $u_lname; ?>?</p>

		<div class="modal__btns">
			<a href="core/delete_user?node=<?php echo $user; ?>" class="modal__btn modal__btn--apply" type="button">Delete</a>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>


	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="../plugins/loader/waitMe.js"></script>
	<script src="js/smooth-scrollbar.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/admin.js"></script>
	<script src="../js/forms.js"></script>
	<script src="../plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready( function () {
		$('#datatbl').DataTable({
			searching: false,
		"bLengthChange": false,
		"ordering": false
});
} );

$(document).ready( function () {
	$('#datatbl2').DataTable({
		searching: false,
	"bLengthChange": false,
	"ordering": false
});
} );
</script>
</body>

</html>
