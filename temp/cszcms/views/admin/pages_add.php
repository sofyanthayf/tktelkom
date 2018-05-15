<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i><span class="glyphicon glyphicon-globe"></span></i> <?php echo  $this->lang->line('pages_addnew') ?>
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="h2 sub-header"><?php echo  $this->lang->line('pages_addnew') ?>  <a role="button" href="<?php echo  $this->Csz_model->base_link() ?>/admin/pages/new" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span> <?php echo  $this->lang->line('pages_addnew') ?></a></div>
        <?php echo form_open($this->Csz_model->base_link(). '/admin/pages/insert'); ?>

        <div class="control-group">	
            <?php echo form_error('page_name', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
            <label class="control-label" for="page_name"><?php echo $this->lang->line('pages_name'); ?>*</label>
            <?php
            $data = array(
                'name' => 'page_name',
                'id' => 'page_name',
                'required' => 'required',
                'autofocus' => 'true',
                'class' => 'form-control',
                'maxlength' => '255',
                'value' => set_value('page_name', $this->Csz_admin_model->getDraftArray('page_name') , FALSE)
            );
            echo form_input($data);
            ?>			
        </div> <!-- /control-group -->

        <div class="control-group">	
            <?php echo form_error('page_title', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>									
            <label class="control-label" for="page_title"><?php echo $this->lang->line('pages_title'); ?>*</label>
            <?php
            $data = array(
                'name' => 'page_title',
                'id' => 'page_title',
                'required' => 'required',
                'autofocus' => 'true',
                'class' => 'form-control',
                'maxlength' => '255',
                'value' => set_value('page_title', $this->Csz_admin_model->getDraftArray('page_title'), FALSE)
            );
            echo form_input($data);
            ?>				
        </div> <!-- /control-group -->
        
        <div class="control-group">	
            <?php echo form_error('page_keywords', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>									
            <label class="control-label" for="page_keywords"><?php echo $this->lang->line('pages_keywords'); ?>*</label>
            <?php
            $data = array(
                'name' => 'page_keywords',
                'id' => 'page_keywords',
                'required' => 'required',
                'autofocus' => 'true',
                'class' => 'form-control',
                'maxlength' => '255',
                'value' => set_value('page_keywords', $this->Csz_admin_model->getDraftArray('page_keywords'), FALSE)
            );
            echo form_input($data);
            ?>				
        </div> <!-- /control-group -->

        <div class="control-group">
            <?php echo form_error('page_desc', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
            <label class="control-label" for="page_desc"><?php echo $this->lang->line('pages_desc'); ?>*</label>
            <?php
            $data = array(
                'name' => 'page_desc',
                'id' => 'page_desc',
                'required' => 'required',
                'autofocus' => 'true',
                'class' => 'form-control',
                'value' => set_value('page_desc', $this->Csz_admin_model->getDraftArray('page_desc'), FALSE)
            );
            echo form_input($data);
            ?>			
        </div> <!-- /control-group -->

        <div class="control-group">	
            <label class="control-label" for="lang_iso"><?php echo $this->lang->line('pages_lang'); ?>*</label>
            <?php
                $att = 'id="lang_iso" class="form-control"';
                $data = array();
                if (!empty($lang)) {
                    foreach ($lang as $lg) {
                        $data[$lg->lang_iso] = $lg->lang_name;
                    }
                }
                echo form_dropdown('lang_iso', $data, $this->Csz_admin_model->getDraftArray('lang_iso'), $att);
            ?>	
        </div> <!-- /control-group -->
        <br>
        <div class="control-group">										
            <label class="form-control-static" for="active">
            <?php
            $data = array(
                'name' => 'active',
                'id' => 'active',
                'value' => '1'
            );
            echo form_checkbox($data);
            ?> <?php echo $this->lang->line('lang_active'); ?></label>	
        </div> <!-- /control-group -->
        <br>
        <?php if($this->Csz_auth_model->is_group_allowed('pages cssjs additional', 'backend') !== FALSE){ ?>
            <div class="control-group">            
                <label class="control-label" for="more_metatag"><?php echo $this->lang->line('settings_add_meta'); ?></label>
                <?php
                $data = array(
                    'name' => 'more_metatag',
                    'id' => 'more_metatag',
                    'class' => 'form-control',
                    'value' => set_value('more_metatag', $this->Csz_admin_model->getDraftArray('more_metatag'), FALSE)
                );
                echo form_textarea($data);
                ?>			
            </div> <!-- /control-group -->
            <div class="control-group">            
                <label class="control-label" for="custom_css"><?php echo $this->lang->line('pages_custom_css'); ?></label>
                <?php
                $data = array(
                    'name' => 'custom_css',
                    'id' => 'custom_css',
                    'class' => 'form-control',
                    'value' => set_value('custom_css', $this->Csz_admin_model->getDraftArray('custom_css'), FALSE)
                );
                echo form_textarea($data);
                ?>			
            </div> <!-- /control-group -->
            <div class="control-group">            
                <label class="control-label" for="custom_js"><?php echo $this->lang->line('pages_custom_js'); ?></label>
                <?php
                $data = array(
                    'name' => 'custom_js',
                    'id' => 'custom_js',
                    'class' => 'form-control',
                    'value' => set_value('custom_js', $this->Csz_admin_model->getDraftArray('custom_js'), FALSE)
                );
                echo form_textarea($data);
                ?>			
            </div> <!-- /control-group -->
        <?php } ?>
        <div class="control-group">
            <?php
             $starter_html = '<div class="container">
                            <div class="row">
                            <div class="col-md-12">
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                            </div>
                            </div>
                            </div><br><br>';
            ?>
            <label class="control-label" for="content"><?php echo $this->lang->line('pages_content'); ?></label>
            <textarea name="content" id="content" class="form-control body-tinymce"><?php if($this->Csz_admin_model->getDraftArray('content')){ echo $this->Csz_admin_model->getDraftArray('content'); }else{ echo $starter_html; } ?></textarea>
        </div> <!-- /control-group -->
        <br><br>
        <?php
            $data = array(
                'type' => 'button',
                'name' => 'save_draft',
                'id' => 'save_draft',
                'class' => 'btn btn-lg btn-warning',
                'value' => $this->lang->line('btn_save_draft'),
            );
            echo form_input($data);
            ?> <span id="save_draft_res" class="text-success"></span>
            <input type="hidden" name="current_url" id="current_url" value="<?php echo current_url(); ?>">
        <br><br>
        <div class="form-actions">
            <?php
            $data = array(
                'name' => 'submit',
                'id' => 'submit',
                'class' => 'btn btn-lg btn-primary',
                'value' => $this->lang->line('btn_save_exit'),
            );
            echo form_submit($data);
            ?> 
            <a class="btn btn-lg" href="<?php echo $this->csz_referrer->getIndex(); ?>"><?php echo $this->lang->line('btn_cancel'); ?></a>
        </div> <!-- /form-actions -->
        <?php echo form_close(); ?>
        <!-- /widget-content --> 
    </div>
</div>