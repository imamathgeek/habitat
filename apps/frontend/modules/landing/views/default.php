<div class="row page-wrapper">
  <div class="col-md-12">
    <div class="jumbotron">
      <div>
        <h1>
          <?php echo Dinkly::translate('Welcome to Habitat!'); ?> (v0)
        </h1>
        <p>
          <?php echo Dinkly::getConfigValue('app_description'); ?>
        </p>
      </div>
    </div>
    <div>
      <form>
        <p>Please log in with your UVM Net ID and password.</p>
        <div class="form-group">
          <label for="net-id">UVM Net ID</label>
          <input type="text" class="form-control" name="net-id" id="net-id">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-default">Log In</button>
      </form>
    </div>
  </div>
</div>