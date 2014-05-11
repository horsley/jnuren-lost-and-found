<div class="row">
  <div class="col-xs-offset-3 col-xs-6">
      <div class="page-header">
          <h3>登陆</h3>
      </div>
      <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
      <?php echo form_open('login') ?>
        <div class="form-group">
          <label for="username">用户名</label>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
          <label for="password">密码</label>
          <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">登陆</button>
      </form>
  </div>
</div>