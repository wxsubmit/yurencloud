<!-- =========================
 SECTION: CONTACT INFO
============================== -->
<?php
	$parallax_one_contact_info_item = get_theme_mod('parallax_one_contact_info_content',
		json_encode(
			array(
					array("icon_value" => "icon-basic-mail" ,"text" => "contact@site.com", "link" => "#" ),
					array("icon_value" => "icon-basic-geolocalize-01" ,"text" => "Company address", "link" => "#" ),
					array("icon_value" => "icon-basic-tablet" ,"text" => "0 332 548 954", "link" => "#" )
				)
		)
	);

	if( !parallax_one_general_repeater_is_empty($parallax_one_contact_info_item) ){
		$parallax_one_contact_info_item_decoded = json_decode($parallax_one_contact_info_item);
	?>
			<?php parallax_hook_contact_before(); ?>
			<div class="contact-info" id="contactinfo" role="region" aria-label="<?php esc_html_e('Contact Info','parallax-one'); ?>">
				<?php parallax_hook_contact_top(); ?>
				<div class="section-overlay-layer">
					<div class="container">

						<!-- CONTACT INFO -->
						<div class="row contact-links">

							<?php

								if(!empty($parallax_one_contact_info_item_decoded)){

										foreach($parallax_one_contact_info_item_decoded as $parallax_one_contact_item){
											if(!empty($parallax_one_contact_item->link)){
												parallax_hook_contact_entry_before();
												echo '<div class="col-sm-4 contact-link-box col-xs-12">';
												parallax_hook_contact_entry_top();
												if(!empty($parallax_one_contact_item->icon_value)){
													echo '<div class="icon-container"><span class="'.esc_attr($parallax_one_contact_item->icon_value).' colored-text"></span></div>';
												}
												if(!empty($parallax_one_contact_item->text)){
													echo '<a href="'.$parallax_one_contact_item->link.'" class="strong">'.html_entity_decode($parallax_one_contact_item->text).'</a>';
												}
												parallax_hook_contact_entry_bottom();
												echo '</div>';
												parallax_hook_contact_entry_after();
											} else {
												parallax_hook_contact_entry_before();
												echo '<div class="col-sm-4 contact-link-box  col-xs-12">';
												parallax_hook_contact_entry_top();
												if(!empty($parallax_one_contact_item->icon_value)){
													echo '<div class="icon-container"><span class="'.esc_attr($parallax_one_contact_item->icon_value).' colored-text"></span></div>';
												}
												if(!empty($parallax_one_contact_item->text)){
													if(function_exists('icl_t')){
														echo '<a href="" class="strong">'.icl_t('Contact',$parallax_one_contact_item->id.'_contact',html_entity_decode($parallax_one_contact_item->text)).'</a>';
													} else {
														echo '<a href="" class="strong">'.html_entity_decode($parallax_one_contact_item->text).'</a>';
													}
												}
												parallax_hook_contact_entry_bottom();
												echo '</div>';
												parallax_hook_contact_entry_after();
											}
										}
								}

							?>
						</div><!-- .contact-links -->
					</div><!-- .container -->
				</div>
				<?php parallax_hook_contact_bottom(); ?>
			</div><!-- .contact-info -->
			<?php parallax_hook_contact_after(); ?>
<?php
	}
?>