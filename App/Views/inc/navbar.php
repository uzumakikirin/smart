<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>"><i class="fa fa-home"></i> ホーム</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/shops"><i class="fa fa-store"></i> ショップ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/blogs"><i class="fa fa-rss"></i> ブログ</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i> <?php echo (isLoggedIn()) ? $_SESSION['full_name'] : 'ユーザー'; ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="navbarDropdown">
            <?php if (!isLoggedIn()) : ?>
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/login">ログイン</a>
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/register">新規登録</a>
            <?php else : ?>
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/profile/<?php echo $_SESSION['user_id']; ?>">プロフィール</a>
              <?php if ($_SESSION['type'] == 1) : ?>
                <a class="dropdown-item" href="<?php echo URLROOT; ?>/cpanels">シーパネル</a>
              <?php endif; ?>
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/carts">カート</a>
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/changepassword/<?php echo $_SESSION['user_id']; ?>">パスワードの変更</a>
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout">ログアウト</a>
            <?php endif; ?>
          </div>
        </li>
      </ul>
    </div>
</nav>