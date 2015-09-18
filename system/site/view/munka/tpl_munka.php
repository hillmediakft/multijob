<!-- CONTENT -->
<div id="content">
    <div class="container">
        <div id="main">

            <div class="row">
                <div class="span12">
                    <div id="feedback_message">
                        <?php $this->renderFeedbackMessages(); ?>
                    </div>
                </div>
            </div>		

            <div class="row">
                <div class="span9">

                    <h1 class="page-header">Munka részletek</h1>

                    <div class="job-detail">

                        <h2><i class="fa fa-check-square"></i> <?php echo $job_data['job_title']; ?></h2>
                        <table class="table table-striped">
                            <tbody>
                                <tr>                        
                                    <td><i class="fa fa-cogs fa-fw"></i><strong> Kategória: </strong></td>
                                    <td><?php echo $job_data['job_list_name']; ?></td>
                                </tr>
                                <tr>                        
                                    <td><i class="fa fa-file fa-fw"></i> <strong> Leírás: </strong></td>
                                    <td><?php echo $job_data['job_description']; ?></td>
                                </tr>
                                <tr>                        
                                    <td><i class="fa fa-clock-o fa-fw"></i><strong> Munka ideje: </strong></td>
                                    <td><?php echo $job_data['job_working_hours']; ?></td>
                                </tr>						
                                <tr>                        
                                    <td><i class="fa fa-money fa-fw"></i> <strong> Fizetés: </strong></td>
                                    <td><?php echo $job_data['job_pay']; ?></td>
                                </tr>
                                <tr>                        
                                    <td><i class="fa fa-map-marker fa-fw"></i> <strong> Helye: </strong></td>
                                    <td><?php
                                        if ($job_data['county_name'] == 'Budapest') {
                                            echo 'Budapest, ' . $job_data['district_name'] . ' kerület';
                                        } else {
                                            echo $job_data['city_name'];
                                        }
                                        ?></td>
                                </tr>

                                    <?php if (!empty($job_data['job_conditions'])) { ?>	
                                    <tr>                        
                                        <td> <i class="fa fa-exclamation-triangle fa-fw"></i> <strong>Feltételek: </strong></td>
                                        <td> <?php echo $job_data['job_conditions']; ?></td>
                                    </tr>
                                    <?php } ?>	



                            </tbody>
                        </table>

                                    <div class="widget our-agents">
                                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54ce95b307a4e457" async="async"></script>
                                        <!-- add this social share buttons-->
                                        <div class="addthis_sharing_toolbox"></div>

                                    </div>

                        <div class="widget our-agents">
                            <div class="content">
                                <div class="agent">

                                    <p>A részletekkel kapcsolatban keresd kollégánkat:</p>
                                    <div class="image">
                                        <img alt="" src="<?php echo Config::get('user.upload_path') . $job_data['user_photo']; ?>">
                                    </div><!-- /.image -->
                                    <div class="name"> <?php echo $job_data['user_first_name'] . ' ' . $job_data['user_last_name']; ?></div><!-- /.name -->
                                    <div class="phone"><i class="fa fa-phone fa-fw"></i> <?php echo $job_data['user_phone']; ?></div><!-- /.phone -->
                                    <div class="email"><i class="fa fa-envelope fa-fw"></i> <?php echo Util::safe_mailto($job_data['user_email']); ?></div><!-- /.email -->
                                </div><!-- /.agent -->


                            </div>
                        </div>

                        <br />
                        <button class="btn btn-primary" type="button" id="jelentkezes_button" name="jelentkezes" <?php //echo (Session::get('user_site_logged_in') === true) ? "" : "disabled"; ?>>Jelentkezés</button>

                        <div id="jelentkezes_feedback">
                            <div class="alert alert-success" style="display:none;"></div>
                            <div class="alert alert-danger" style="display:none;"></div>
                        </div>
                       
                        <div id="jelentkezes_box" style="display: none;">
                        <br />
                            <form method="post" class="contact-form" action="" id="jelentkezes_form">
                                <div class="control-group">
                                    <label class="control-label" for="from_name">Név <span class="form-required" title="Kötelező kitölteni.">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="from_name" id="from_name" required >
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="from_email">E-mail <span class="form-required" title="Kötelező kitölteni.">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="from_email" id="from_email" required >
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->
                                
                                <div class="control-group">
                                    <label class="control-label" for="from_telefon">Telefon</label>
                                    <div class="controls">
                                        <input type="text" name="from_telefon" id="from_telefon" >
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="message">Üzenet <span class="form-required" title="Kötelező kitölteni.">*</span></label>
                                    <div class="controls">
                                        <textarea id="message" name="message" required ></textarea>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <input type="hidden" value="<?php echo $job_data['job_id']; ?>" name="job_id">
                                <input type="hidden" value="<?php echo $job_data['user_email']; ?>" name="ref_email">

                                <div class="form-actions">
                                    <input type="submit" class="btn btn-primary arrow-right" value="Jelentkezés elküldése">
                                </div><!-- /.form-actions -->
                            </form>
                       </div>
                   
                   
                    </div>	


                </div>
                <div class="sidebar span3">
                    <?php include('system/site/view/_template/tpl_sidebar.php'); ?>                  
                </div>
            </div>

        </div>
    </div>


</div><!-- /#content -->

</div><!-- /#wrapper-inner -->