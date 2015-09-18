<div style="display:none;" class="modal fade" id="modal_email" tabindex="-1" role="dialog" aria-labelledby="modal_register_label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_register_label">Ajánlatot kérek</h4>

            </div>


            <div class="modal-body">




                <div id="message_company_email">
                    <div class="alert alert-success" style="display:none;"></div>
                    <div class="alert alert-danger" style="display:none;"></div>
                </div>

                <form name="company_message_form" id="company_message_form" method="post" action="">
                    <div class="control-group">
                        <label class="control-label" for="name">
                            Cégnév
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input class="input-block-level" type="text" id="from_name" name="from_name" required>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            E-mail
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input class="input-block-level" type="text" id="from_email" name="from_email" required>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="control-group">
                        <label class="control-label" for="inputPhone">
                            Telefonszám
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input class="input-block-level" type="text" id="from_phone" name="from_phone" required>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group --> 

                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Munkakör
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input class="input-block-level" type="text" id="job_name" name="job_name" required>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->                            

                    <div class="control-group">
                        <label class="control-label" for="message">
                            Munkakör leírása
                            <span class="form-required" title="This field is required.">*</span>
                        </label>

                        <div class="controls">
                            <textarea class="input-block-level" id="job_desc" name="job_desc" required></textarea>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <input type="hidden" name="area" value="ceg" />

                    <div class="form-actions">
                        <button type="submit" id="footer_msg_send_button" class="btn btn-primary arrow-right">Küldés</button>
                    </div><!-- /.form-actions -->

                </form>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">Bezár</button>
            </div>

        </div>
    </div>
</div>