<div class="container-fluid">
<?php include_once('include/header.php'); ?>
<?php include_once('include/slider.php'); ?>
<style>
    a {
    color: #d5dde4;
    text-decoration: none;
}
    </style>
<div class="container contact-form">
            <div class="contact-image">
                <img src="" />
            </div>
            <form method="post">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">
                            <a type="submit" name="btnSubmit" class="btnContact">Send Message</a>
                        </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
</div>
<?php include_once('include/footer.php'); ?>
<div class="container-fluid">
