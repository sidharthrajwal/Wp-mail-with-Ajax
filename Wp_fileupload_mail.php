<form method="POST" id="ajaxformid">
                                <input type="hidden" name="action" value="training_requirement">
                                <input type="hidden" id="pagename" name="pagename" value="<?php echo get_the_title();?>">
                                <input type="hidden" name="author" value="info">
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <input type="text" name="fname" id="fname" class="form-field" placeholder="First name">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <input type="text" name="lname" id="lname" class="form-field" placeholder="Last name">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <input type="number" name="phone"  id="phone" class="form-field numbersOnly" placeholder="Contact number">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <input type="email" name="email" id="email" class="form-field" placeholder="Email address">
                                    </div>
                                                                        <div class="col-12 form-group uplaodfilee">
                                                <input type="file" name="file_data"  id="my_image" >
<!--         <input type="submit" id="inviaForm" value="Invia" name="submit_value"> -->
                                    </div>
                                    <div class="col-12 form-group">
                                        <textarea class="form-field" name="message" placeholder="Enter your message here" id="message" rows="8"></textarea>
                                    </div>
                                    <div class="col-12 form-group">
                                        <!-- <div id="recaptcha" class="g-recaptcha" data-sitekey="6Ld7LKgUAAAAAM-K1-uSPNtkAn1PFblKVsO8_sZW" data-callback="vc">
                                        </div> -->
                                        <span class="msg-error" style="color:red;"></span>
                                        <br/>
                                    </div>

                                    <div class="col-sm-12 form-group formButton">
                                    <div class="alert alert-success" role="alert" style="display:none;">
                                    Thank you for your enquiry. Our representative will be in touch shortly.
                                    </div>  
                                    <div class="alert alert-danger" role="alert" style="display:none;">
                                    Something went wrong!!    
                                    </div>
                                        <button type="submit" class="commonButton blueBtn">Send <img style="display: none;margin-left: 10px;width: 25px;" src="<?php echo get_template_directory_uri(); ?>/images/loader.gif" class="loading_image"></button>
                                    </div>
                                </div>
                            </form>
