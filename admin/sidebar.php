<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="http://graph.facebook.com/<?= $_SESSION['fbid']; ?>/picture?height=200&width=200" alt="Dennis K Bijo" class="img-responsive img-circle" />
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?= $row['name']; ?>
					</div>
					<div class="profile-usertitle-job">
						Administrator
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="index.php">
							<i class="glyphicon glyphicon-home"></i>
							Get Current Location </a>
						</li>
						<!--<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Location History </a>
						</li> -->
						<li>
							<a href="assign.php">
							<i class="glyphicon glyphicon-ok"></i>
							Assign Organisation </a>
						</li>
						<li>
							<a href="tracker.php">
							<i class="glyphicon glyphicon-flag"></i>
							See who's out </a>
						</li>
						<li>
							<a href="logout.php">
							<i class="glyphicon glyphicon-flag"></i>
							Logout </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>