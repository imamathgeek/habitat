<ol class="breadcrumb">
  <li><a href="/admin/user/">Users</a></li>
  <li><a href="/admin/user/detail/id/<?php echo $user->getId(); ?>">User Detail</a></li>
  <li class="active">Edit User Info</li>
</ol>

<?php if($errors != array()): ?>
<div class="alert alert-danger">
    <button type="button" class="close message-close" aria-hidden="true">&times;</button>
    <ul>
      <?php foreach($errors as $error): ?>
        <li><?php echo $error; ?></li>
      <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<h3>Edit User Info</h3>
<hr>
<div class="row">
  <div class="col-md-5">
    <?php include('form_user.php'); ?>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('.btn-cancel-user').click(function() {
		window.location = "/admin/user/detail/id/<?php echo $user->getId(); ?>";
	});
});
</script>