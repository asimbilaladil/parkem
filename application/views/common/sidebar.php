
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="<?php echo base_url('includes/website/assets/img/ParkemLong.png'); ?>" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="<?php echo base_url('includes/website/assets/img/ParkemLong.png'); ?>" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo site_url('Admin') ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Settings</h3><!-- /.menu-title -->
                    <li class="">
                         <a href="<?php echo site_url('Admin') ?>"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Admin</a>
                        
                    </li>

                    <li >
                        <a href="<?php echo site_url('Operator') ?>"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Operator</a>
                        
                    </li>
                    <li >
                        <a href="<?php echo site_url('Lot') ?>"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Lot</a>
                        
                    </li>
                     <li >
                        <a href="<?php echo site_url('Register_Number_Plates') ?>"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Register Number Plates</a>
                        
                    </li>       
                    <li >
                        <a href="<?php echo site_url('Blacklist') ?>"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Blacklist</a>
                        
                    </li>                                            
                    <li >
                        <a href="<?php echo site_url('Citation') ?>"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Citation</a>
                        
                    </li>                                      
                   
                   

                   
                    <h3 class="menu-title">User</h3><!-- /.menu-title -->
                    <li class="">
                        <a href="<?php echo site_url('Login/logout') ?>"  aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Logout</a>
                       
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->