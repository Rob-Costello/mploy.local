<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="<?php echo base_url()."assets/";?>dist/img/user.png" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php echo ucwords($user->username); ?> </span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="<?php echo base_url()."assets/";?>dist/img/user.png" class="img-circle" alt="User Image">

            <p style="color:#000" >
				<?php echo ucwords($user->username); ?>

            </p>
        </li>
        <!-- Menu Body -->

        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-mploy-submit btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="/auth/logout" class="btn btn-mploy-cancel btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
