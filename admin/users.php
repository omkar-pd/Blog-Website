		<?php  include('../config.php'); ?>
		<?php  include('./class/Admin.php'); ?>
		<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
		<title>Admin | Manage users</title>
		</head>
		<?php 
		$admin= new Admin();
        if (isset($_POST['create_admin'])) {
		$admin->createAdmin();
		}
        if (isset($_GET['edit-admin'])) {
		$isEditingUser = true;
		$admin_id = $_GET['edit-admin'];
		$admin->editAdmin($admin_id);
		}
        if (isset($_POST['update_admin'])) {
		$admin->updateAdmin($_POST);
        }
        if (isset($_GET['delete-admin'])) {
		$admin_id = $_GET['delete-admin'];
		$admin->deleteAdmin($admin_id);
		}
		// Get all admin users from DB
		$admins = $admin->getAdminUsers();
		$roles = ['Admin', 'Author','NULL'];				
		?>
		<body>
		<!-- admin navbar -->
		<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
		<?php include(ROOT_PATH . '/includes/banner.php') ?>

		<div class="container row content justify-content-center align-items-center col-12 m-1  p-1">
		<!-- Left side menu -->
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>
		<!-- Middle form - to create and edit  -->

		<div class="action col-lg-4 col-md-7 col-12">
		<h1 class="page-title">Create/Edit Admin User</h1>
		<form method="post" action="<?php echo BASE_URL . 'admin/users.php'; ?>" >

		<!-- validation errors for the form -->
		<?php include(ROOT_PATH . '/includes/errors.php') ?>

		<!-- if editing user, the id is required to identify that user -->
		<?php if ($isEditingUser === true): ?>
		<input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
		<?php endif ?>

		<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
		<input type="email" name="email" value="<?php echo $email ?>" placeholder="Email">
		<input type="password" name="password" placeholder="Password">
		<input type="password" name="passwordConfirmation" placeholder="Password confirmation">
		<select name="role">
		<option value="" selected disabled>Assign role</option>
		<?php foreach ($roles as $key => $role): ?>
		<option value="<?php echo $role; ?>"><?php echo $role; ?></option>
		<?php endforeach ?>
				</select>

		<!-- if editing user, display the update button instead of create button -->
		<?php if ($isEditingUser === true): ?> 
		<button type="submit" class="btn" name="update_admin">UPDATE</button>
		<?php else: ?>
		<button type="submit" class="btn" name="create_admin">Save User</button>
		<?php endif ?>
		</form>
		</div>
	
		<!-- Display records from DB-->
		<div class="table-div col-lg-6 col-12">
		<!-- Display notification message -->
		<?php include(ROOT_PATH . '/admin/includes/messages.php') ?>
		<?php if (empty($admins)): ?>
		<h1>No admins in the database.</h1>
		<?php else: ?>
		<table class="table">
			<thead>
				<th>No</th>
				<th>Admin</th>
				<th>Role</th>
				<th colspan="2">Action</th>
			</thead>
		<tbody>
		<?php foreach ($admins as $key => $admin): ?>
				<tr>
				<td><?php echo $key + 1; ?></td>
				<td>
				<a target="_blank" href="user_profile.php?userid=<?php echo $admin['id'] ?>"> <?php echo $admin['username']; ?>, &nbsp;
				<?php echo $admin['email']; ?>	</a>
				</td>
				<td><?php echo $admin['role']; ?></td>
				<td>
				<a class="fa fa-pencil btn edit" href="users.php?edit-admin=<?php echo $admin['id'] ?>"></a>
				</td>
				<td>
				<a class="fa fa-trash btn delete" href="users.php?delete-admin=<?php echo $admin['id'] ?>"></a>
				</td>
				</tr>
				<?php endforeach ?>
				</tbody>
				</table>
			<?php endif ?>

		<?php 
		$prev = $page - 1;
		$next = $page + 1; 
		?>
		<nav class="mt-5">
        <ul class="pagination justify-content-center mt-4">
        <li class="page-item <?php if($page <=1){ echo 'disabled'; } ?>">
        <a class="page-link" href="<?php if($page < 1){ echo '#'; } else { echo "users.php?page=".$prev; } ?>">Previous</a>
        </li>

        <?php for($i = 1; $i <= $total_pages; $i++ ): ?>

        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
        <a class="page-link" href="users.php?page=<?= $i; ?>"> <?= $i; ?> </a>
        </li>
        <?php endfor; ?>

        <li class="page-item <?php if($page >= $total_pages) { echo 'disabled'; } ?>">
        <a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else {echo "users.php?page=".$next; } ?>">Next</a>
        </li>
        </ul>
        </nav>
		</div>
		<!-- // Display records from DB -->
		</div>
	
	</body>
	</html>