<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('header');?>
  </head>
  <body>
    <?php $this->load->view('menu'); ?>
    <div class="navbar-header" style="position:relative; margin-left: 500px; margin-top: -10px;">
      <div class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Policies <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/policy">Signature Policy</a></li>
              <?php if ($is_request): ?>
                <li><a href="/policy_request">Signature Policy Change Request</a></li>
              <?php endif ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </body>
</html>