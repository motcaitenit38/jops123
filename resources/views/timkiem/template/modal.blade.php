<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="tab" role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Sign In</a></li>
                        <li role="presentation"><a href="#register" role="tab" data-toggle="tab">Sign Up</a></li>
                    </ul>
                    <div class="tab-content" id="myModalLabel2">
                        <div role="tabpanel" class="tab-pane fade in active" id="login"><img src="img/logo.png" class="img-responsive" alt="" />
                            <div class="subscribe wow fadeInUp">
                                <form class="form-inline" method="post">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Username" required="">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                            <div class="center">
                                                <button type="submit" id="login-btn" class="submit-btn"> Login </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="register"><img src="img/logo.png" class="img-responsive" alt="" />
                            <form class="form-inline" method="post">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Your Name" required="">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email" required="">
                                        <input type="email" name="email" class="form-control" placeholder="Username" required="">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                        <div class="center">
                                            <button type="submit" id="subscribe" class="submit-btn"> Create Account </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="apply-job" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="apply-job-box"><img src="img/com-1.jpg" class="img-responsive" alt="">
                    <h4>Product Designer</h4>
                    <p>Google Pvt.</p>
                </div>
                <div class="apply-job-form">
                    <form class="form-inline" method="post">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                                <input type="email" name="email" class="form-control" placeholder="Your Email" required="">
                                <textarea class="form-control" placeholder="About You / Paste your CV"></textarea>
                                <div class="fileUpload"><span>Upload CV</span>
                                <input type="file" class="upload" /> </div>
                                <div class="center">
                                    <button type="submit" id="subscribe" class="submit-btn"> Apply Now </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>