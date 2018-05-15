
                <ul class="nav nav-pills nav-background">
                    <li <?php if($page == null){ ?>class="active"<?php } ?>><a href="/companies/view/<?php echo $id ;?>" >Details</a>
                    </li>
                    <li <?php if($page == 'contacts'){ ?>class="active"<?php } ?>><a href="/companies/view/<?php echo $id ;?>/contacts/" >Contacts</a>
                    </li>
                    <li <?php if($page == 'history'){ ?>class="active"<?php } ?>><a href="/companies/view/<?php echo $id ;?>/history/" >History</a>
                    </li>
                </ul>