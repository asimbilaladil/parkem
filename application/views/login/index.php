<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h1>Login</h1>
                </div>
                <div class="login-form">
                    <form action="<?php echo site_url('Login/adminLogin') ?>" method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input required type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input required type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                       
                        
                    </form>
                </div>
            </div>
        </div>
    </div>