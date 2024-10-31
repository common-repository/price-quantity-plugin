<?php
/*
Copyright (C) 2011  Advidco

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

Plugin Name: Price Quantity Plugin
Plugin URI: http://advidco.com
Description: This Plugin is for adding a Price Break and Quantity Section in your Post or pages.
Version: 1.0
Author: Vikas Sharma

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


add_action('admin_menu', 'add_price_quantity_pages');

 function add_price_quantity_pages() {
	add_theme_page('Quantity Table Options', 'Qty. Table Options', 8, 'priceoptions', 'priceoptions');
	
}
function priceoptions () {  ?>
<div class="wrap"> <?php echo "<h2 style='margin-bottom:25px;'>" . __( get_option('blogname')) . " Price Quantity Settings</h2>"; 
define('PRICE_QUANTITY_PLUGIN_URL', plugin_dir_url( __FILE__ ));
include_once dirname( __FILE__ ) . '/colorbox.php';
?>


	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); 
		
		?>
        <div class="inside">
         	<h4><?php _e('Price Quantity Table Options');?></h4>
            
            <div class="table">
                <table class="form-table">
               		
                    
                    	<tr valign="top">
                        <td width="150" align="right"><label for="menu_title"><?php _e('Sample Short Code :');?></label></td>
                        <td>
                        <?php _e(' [showQtyPriceTable value="0-25:$45,26-100:$30,100-200:$50" ]') ?>
                                         </td>
                    </tr>
                    
                      <tr valign="top">
                        <td width="150" align="right"><label for="menu_title"><?php _e('Table Border Color');?></label></td>
                        <td>
                         <input type="text" name="pq_bordercolor" id="pq_bordercolor" size="50" value="<?php echo get_option('pq_bordercolor'); ?>" />
                                  <input type="button" value="Set Color" onclick="set_val('pq_bordercolor');">
                                         </td>
                    </tr>
                    <tr valign="top">
                        <td width="150" align="right"><label for="menu_title"><?php _e('Font Color');?></label></td>
                        <td>
                         <input type="text" name="pq_fontcolor" id="pq_fontcolor" size="50" value="<?php echo get_option('pq_fontcolor'); ?>" />
                                <input type="button" value="Set Color" onclick="set_val('pq_fontcolor');">
                                         </td>
                    </tr>  
                  <tr valign="top">
                        <td width="150" align="right"><label for="menu_title"><?php _e('Font Face');?></label></td>
                        <td>
                         <input type="text" name="pq_fontface" id="pq_fontface" size="50" value="<?php echo get_option('pq_fontface'); ?>" />
                                
                                         </td>
                    </tr>  
                   <tr valign="top">
                        <td width="150" align="right"><label for="menu_title"><?php _e('Font Size in Pixels');?></label></td>
                        <td>
                         <input type="text" name="pq_fontsize" id="pq_fontsize" size="50" value="<?php echo get_option('pq_fontsize'); ?>" />
                                
                                         </td>
                    </tr>  
					
                    
                    </table>
                    </div>
                    </div>
        
      
       
                    
                    
      <div class="table">
							  
	    <div align="left">
	      <table width="800" border="1" cellspacing="0" cellpadding="0">
            <tr><br />
              <td width="334"><div align="right"></div></td>
              <td width="460"><input type="submit" value="<?php _e('Save Changes') ?>" name="submit_gallery" id="submit_gallery" /></td>
            </tr>
                                      </table>
	      </td>
        </div>
      </div>
		
				
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="pq_bordercolor,pq_fontcolor,pq_fontface,pq_fontsize" />
    
       
	</form>
	
	<br />
          <?php include_once dirname( __FILE__ ) . '/about-company.txt'; ?>
         
        
        
        <br />
	
</div>
<?php 

}
?>
<?php 

function quantity_price($attribute)
{
 global $quantityarray;
 $quantityarray=array();
 $quantityarray=explode(',',$attribute['value']);
	$data=""; 
	
	?>
    <style type="text/css">
	.main{border:4px #<?php echo get_option('pq_bordercolor'); ?> solid;}
	.feild1{ font:bold <?php echo get_option('pq_fontsize'); ?>px <?php echo get_option('pq_fontface'); ?>; color:#<?php echo get_option('pq_fontcolor'); ?>; border-bottom:2px #<?php echo get_option('pq_bordercolor'); ?> solid; padding:5px; border-left:2px #<?php echo get_option('pq_bordercolor'); ?> solid;}  
	.feild2{ font:normal <?php echo get_option('pq_fontsize'); ?>px <?php echo get_option('pq_fontface'); ?>; color:#<?php echo get_option('pq_fontcolor'); ?>; border-bottom:2px #<?php echo get_option('pq_bordercolor'); ?> solid; padding:5px; border-left:2px #<?php echo get_option('pq_bordercolor'); ?> solid;}
	.first { border-left:none;} 
	.last{  font:normal <?php echo get_option('pq_fontsize'); ?>px <?php echo get_option('pq_fontface'); ?>; color:#<?php echo get_option('pq_fontcolor'); ?>; }
</style>
    <?php
	$data .='<table border="0" class="main" cellpadding="0" width="100%" cellspacing="0">
  <tr>
    <td class="feild1 first" align="center">Quantity</td>';
	?>

    <?php for($i=0;$i<count($quantityarray);$i++) { 
		$pricearray=explode(':',$quantityarray[$i]);
	$data .='<td class="feild1" align="center">'.$pricearray[0].'</td>';
	?>
   
    
    <?php }
	
	$data .=' <td class="feild1" align="center">(EA)</td>
  </tr>
  <tr>
    <td class="feild2 first">&nbsp;</td>';
	 ?>
   
   
    <?php for($i=0;$i<count($quantityarray);$i++) { 
		$pricearray=explode(':',$quantityarray[$i]);
	$data .='<td class="feild2" align="center">'.$pricearray[1].'</td>';
	?>
    
    <?php }
	$data .='<td class="feild2">&nbsp;</td>
  </tr>
  <tr>
  <td>&nbsp;</td>';
	 ?>
    
    
   <?php for($i=0;$i<count($quantityarray);$i++) { 
		
	$data .='<td>&nbsp;</td>';
	?>
     <?php }
	 
	 $data.='<td class="last" align="center">('.count($quantityarray).'Q)</td>';
	 
	 $data.=' </tr>
</table>';
	  ?>
    
    
 
<?php 
 
  return $data;
}
add_shortcode('showQtyPriceTable', 'quantity_price');

?>