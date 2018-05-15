<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function compress()
{   
    if (function_exists('ini_set')) {
        @ini_set('max_execution_time', 600);
        @ini_set("pcre.recursion_limit", "16777");
    }
    $CI =& get_instance();
    if($CI->Csz_model->chkIPBaned() !== FALSE){
        set_status_header(401);
        echo '<!DOCTYPE html><html lang="en"><head><meta name="generator" content="'.$CI->Csz_admin_model->cszGenerateMeta().'" /><title>401 Unauthorized!</title></head><body>';
        echo '<h1>401 Unauthorized!</h1>';
        echo '<h2>Your IP Address can not access to this website!</h2><br><br>';
        echo '<h5>By '.EMAIL_DOMAIN.' ('.$CI->Csz_admin_model->cszGenerateMeta().')</h5>';
        echo '</body></html>';
        exit(0);
    }
    $buffer = $CI->output->get_output();
    $config = $CI->Csz_model->load_config();
    $new_buffer = NULL;
    if($config->html_optimize_disable != 1){
        $new_buffer = $CI->Csz_model->compress_html($buffer);
    }
    // We are going to check if processing has working
    if ($new_buffer === NULL)
    {
        $new_buffer = $buffer;
    }
    $CI->output->set_output($new_buffer);
    unset($config, $buffer, $new_buffer);
    $CI->output->_display();
}

/* End of file compress.php */
/* Location: ./system/application/hooks/compress.php */