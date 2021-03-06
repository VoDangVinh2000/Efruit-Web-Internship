<?php
$settings = get_setting_options();
$start_year = env('START_YEAR', 2013);
$current_year = date('Y');
$copy_right_year = $start_year != $current_year ? $start_year . '-' . $current_year : $start_year;
?>
<!-- FOOTER -->
<footer class="footer">
	<div class="container">
		<div class="footer--wrapper">
			<a href="" class="footer-img--link">
				<img src="http://www.localhost/themes/efruit/child/happy/assets/img/main_logo.png" alt="" class="footer-img">
			</a>
		</div>
		<div class="footer--info">
			<ul class="footer--info-list">
				<li class="footer--info-item">
					<a href="#" class="footer--info-title">About us</a>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">Introduction</a>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">Image gallery</a>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">Jobs</a>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">Terms and Conditions</a>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">Returns and Exchanges</a>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">Privacy Policy</a>
				</li>
			</ul>
			<!-- Col 2 -->
			<ul class="footer--info-list">
				<li class="footer--info-item">
					<a href="#" class="footer--info-title">You may want to know</a>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">Products</a>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">Shipping</a>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">Place Order</a>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">Guarantee</a>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">Promotion</a>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">Other questions</a>
				</li>
			</ul>
			<!-- Col 3 -->
			<ul class="footer--info-list">
				<li class="footer--info-item">
					<a href="#" class="footer--info-title">Contact</a>
				</li>
				<li class="footer--info-item">
					<div class="footer--info-link">
						<div class="footer--info-address">
							<!-- <i class="fa fa-home"></i> -->
							<span bind-translate="C???a h??ng">C???a h??ng</span>: <span class="efruit-vi">
								<?= getvalue($main_branch, 'short_address') ?>
							</span><span class="efruit-en efruitjs"><?= getvalue($main_branch, 'en_address')
																	?></span>
						</div>
					</div>
				</li>
				<li class="footer--info-item">
					<div class="footer--info-link">
						<div class="footer--info-address">
							<!-- <i class="fa fa-home"></i> -->
							<?php if (!empty($settings['company_address'])) : ?>
								<dd></i> <span bind-translate="C??ng ty">C??ng ty</span>: <span><?= $settings['company_address']
																													?></span></dd>
							<?php endif; ?>
							<!-- <span class="footer--info-address footer--info-address__title">
								Company:
							</span>
							<span class="footer--info-address footer--info-address__des">
								388 Huynh Van Banh, Ward 14, Phu Nhuan District, HCM city
							</span> -->
						</div>
					</div>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">
						<div class="footer--info-address footer--info-address-envolope">
							<i class="fa fa-phone"></i>
							<span class="footer--info-address footer--info-address__des">
								0938.70.70.15
							</span>
						</div>
					</a>
				</li>
				<li class="footer--info-item">
					<div href="#" class="footer--info-link">
						<div class="footer--info-address footer--info-address-envolope">
							<i class="fas fa-envelope"></i>
							<a href="#" class="contact--link">info@localhost</a>
							<i class="far fa-envelope"></i>
							<a href="#" class="contact--link">cskh@localhost</a>
						</div>
					</div>
				</li>
				<li class="footer--info-item">
					<a href="#" class="footer--info-link">
						<div class="footer--info-address footer--info-address-envolope">
							<i class="fab fa-facebook-f"></i>
							<span class="footer--info-address footer--info-address__des">
								https://www.facebook.com/happyfruitsvietnam/
							</span>
						</div>
					</a>
				</li>
			</ul>
		</div>
		<div class="footer--form-submit">
			<div class="footer--form-submit footer--form-submit-wrapper">
				<input class="input--form" type="email" name="" value="" placeholder="Your email address." aria-label="email@example.com">
				<button class="btn-submit" type="submit" name="">SUBSCRIBE</button>
			</div>
		</div>

		<div class="footer--group-icon">
			<div class="footer--group-icon__wrapper">
				<a href=""> <i class="fab fa-facebook-f"></i>
					<span class="icon-name">facebook</span>
				</a>
				<a href=""><i class="fab fa-twitter"></i>
					<span class="icon-name">twitter</span></a>
				<a href=""><i class="fab fa-instagram"></i>
					<span class="icon-name">instagram</span></a>
				<a href=""><i class="fab fa-youtube"></i>
					<span class="icon-name">youtube</span></a>
			</div>
		</div>

		<div class="footer--company-info">
			<span>C??ng Ty TNHH Th????ng M???i D???ch V??? MID. ??C: 388 Hu???nh V??n B??nh, Ph?????ng 14, Qu???n Ph?? Nhu???n, TP
				HCM</span>
			<span>S??? gi???y ph??p ??KKD: 0312974791 do s??? K??? ho???ch v?? ?????u T?? TPHCM c???p</span>
			<span>Gi???y ch???ng nh???n c?? s??? ????? ??i???u ki???n an to??n th???c ph???m s??? 1384/2016/ATTP-CN??K</span>
		</div>
	</div>
</footer>
<!-- END FOOTER -->



<!-- <div class="y-foot">
	<div class="wrapper">
		<div class="identity">
			<span class="site-name <? //= strlen($settings['short_site_name']) > 12 ? 'small' : (strlen($settings['short_site_name']) > 8 ? 'medium' : '') 
									?>"><? //= get_setting('short_site_name') 
										?></span>
			<span class="copyright">&copy; <span class="number"><? //= $copy_right_year 
																?></span> <? //= get_setting('short_site_name') 
																			?></span><br />
			<a class="share-btn" target="_blank" href="javascript:window.location=%22http://www.facebook.com/sharer.php?u=%22+encodeURIComponent(document.location)+%22&#38;t=%22+encodeURIComponent(document.title)"><i class="fa fa-facebook"></i>&nbsp;&nbsp;&nbsp;<span bind-translate="Chia s???">Chia s???</span></a><br /><br />
			<?php //if (env('GOV_LINK')) : 
			?>
				<a target="_blank" href="<? //= env('GOV_LINK') 
											?>"><img loading="lazy" src="<? //= get_theme_assets_url() 
																			?>img/dathongbao.png" style="width: 130px;height: auto;" /></a>
			<?php //endif; 
			?>
		</div>
		<div class="column">
			<div class="group-1">
				<dl>
					<dt bind-translate="V??? ch??ng t??i">V??? ch??ng t??i</dt>
					<dd><a href="/vi/gioi-thieu" bind-translate="Gi???i thi???u">Gi???i thi???u</a></dd>
					<dd><a href="/vi/thu-vien-hinh-anh" bind-translate="Th?? vi???n h??nh ???nh">Th?? vi???n h??nh ???nh</a></dd>
					<dd><a href="/tuyen-dung" target="_blank" bind-translate="Tuy???n d???ng">Tuy???n d???ng</a></dd>
					<dd><a href="/vi/chinh-sach-quy-dinh-chung" bind-translate="Ch??nh s??ch, quy ?????nh chung">Ch??nh s??ch, quy ?????nh chung</a></dd>
					<dd><a href="/vi/chinh-sach-doi-tra" bind-translate="Ch??nh s??ch ?????i tr???">Ch??nh s??ch ?????i tr???</a></dd>
					<dd><a href="/vi/chinh-sach-bao-mat-thong-tin" bind-translate="Ch??nh s??ch b???o m???t th??ng tin">Ch??nh s??ch b???o m???t th??ng tin</a></dd>
				</dl>
			</div>
		</div>
		<div class="column questions">
			<div class="group-2">
				<dl>
					<dt bind-translate="C?? th??? b???n th???c m???c">C?? th??? b???n th???c m???c</dt>
					<dd><a href="/vi/san-pham" bind-translate="S???n ph???m">S???n ph???m</a></dd>
					<dd><a href="/vi/giao-hang" bind-translate="Ph????ng th???c giao h??ng">Ph????ng th???c giao h??ng</a></dd>
					<dd><a href="/vi/dat-hang" bind-translate="Ph????ng th???c ?????t h??ng">Ph????ng th???c ?????t h??ng</a></dd>
					<dd><a href="/vi/cam-ket-san-pham" bind-translate="Cam k???t s???n ph???m">Cam k???t s???n ph???m</a></dd>
					<dd><a href="/vi/uu-dai-thanh-vien" bind-translate="??u ????i th??nh vi??n">??u ????i th??nh vi??n</a></dd>
					<dd><a href="/vi/cau-hoi-khac" bind-translate="C??u h???i kh??c">C??u h???i kh??c</a></dd>
				</dl>
			</div>
		</div>
		<div class="column contact">
			<div class="group-3">
				<dl>
					<dt bind-translate="Li??n h???">Li??n h???</dt>
					<dd><i class="fa fa-home"></i> <span bind-translate="C???a h??ng">C???a h??ng</span>: <span class="efruit-vi"><?= getvalue($main_branch, 'short_address') ?></span><span class="efruit-en efruitjs"><? //= getvalue($main_branch, 'en_address') 
																																																					?></span></dd>
					<? //php// if (!empty($settings['company_address'])) : 
					?>
						<dd><i class="fa fa-home"></i> <span bind-translate="C??ng ty">C??ng ty</span>: <span><? //= $settings['company_address'] 
																											?></span></dd>
					<?php //endif; 
					?>
					<dd><i class="fa fa-phone"></i> <span><? //= getvalue($main_branch, 'phone_number', '0938.70.70.15 - 0906.70.70.15') 
															?></span></dd>
					<dd><i class="fa fa-envelope"></i> <a id="info-email">Info email</a>&nbsp;&nbsp;<i class="fa fa-envelope-o"></i> <a id="cskh-email">CSKH</a></dd>
					<? //php// if (!empty($settings['facebook_link'])) : 
					?>
						<dd><i class="fa fa-facebook"></i>&nbsp;&nbsp;<a href="<? //= $settings['facebook_link'] 
																				?>" target="_blank"><? //= $settings['facebook_link'] 
																									?></a></dd>
					<? //php endif; 
					?>
				</dl>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php //if (!empty($settings['company_name']) && !empty($settings['company_address'])) : 
?>
	<div class="footer-company-info">
		<span style="color: #999; clear: both; display: block;"><? //= $settings['company_name'] 
																?>. ??C: <? //= $settings['company_address'] 
																		?></span>
		<?php //if (!empty($settings['company_info'])) : 
		?>
			<span style="color: #999; clear: both; display: block;"><? //= $settings['company_info'] 
																	?></span>
		<? //php endif; 
		?>
		<? //php// if (!empty($settings['company_extra_1'])) : 
		?>
			<span style="color: #999; clear: both; display: block;"><? //= $settings['company_extra_1'] 
																	?></span>
		<? //php endif; 
		?>
		<? //php if (!empty($settings['company_extra_2'])) : 
		?>
			<span style="color: #999; clear: both; display: block;"><? //= $settings['company_extra_2'] 
																	?></span>
		<? //php endif; 
		?>
	</div>
<? //php endif; 
?> -->