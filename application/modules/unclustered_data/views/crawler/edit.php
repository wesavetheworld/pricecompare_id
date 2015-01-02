<?php

$validation_errors = validation_errors();

if ($validation_errors) :
?>
<div class="alert alert-block alert-error fade in">
	<a class="close" data-dismiss="alert">&times;</a>
	<h4 class="alert-heading">Please fix the following errors:</h4>
	<?php echo $validation_errors; ?>
</div>
<?php
endif;

if (isset($unclustered_data))
{
	$unclustered_data = (array) $unclustered_data;
}
$id = isset($unclustered_data['id']) ? $unclustered_data['id'] : '';

?>
<div class="admin-box">
	<h3>Unclustered Data</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('un_link') ? 'error' : ''; ?>">
				<?php echo form_label('Link', 'unclustered_data_un_link', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_un_link' type='text' name='unclustered_data_un_link' maxlength="255" value="<?php echo set_value('unclustered_data_un_link', isset($unclustered_data['un_link']) ? $unclustered_data['un_link'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('un_link'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('un_title') ? 'error' : ''; ?>">
				<?php echo form_label('Title', 'unclustered_data_un_title', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_un_title' type='text' name='unclustered_data_un_title' maxlength="255" value="<?php echo set_value('unclustered_data_un_title', isset($unclustered_data['un_title']) ? $unclustered_data['un_title'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('un_title'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('un_merk') ? 'error' : ''; ?>">
				<?php echo form_label('Merk', 'unclustered_data_un_merk', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_un_merk' type='text' name='unclustered_data_un_merk' maxlength="255" value="<?php echo set_value('unclustered_data_un_merk', isset($unclustered_data['un_merk']) ? $unclustered_data['un_merk'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('un_merk'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('un_harga') ? 'error' : ''; ?>">
				<?php echo form_label('Harga', 'unclustered_data_un_harga', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_un_harga' type='text' name='unclustered_data_un_harga' maxlength="255" value="<?php echo set_value('unclustered_data_un_harga', isset($unclustered_data['un_harga']) ? $unclustered_data['un_harga'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('un_harga'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('un_berat') ? 'error' : ''; ?>">
				<?php echo form_label('Berat', 'unclustered_data_un_berat', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_un_berat' type='text' name='unclustered_data_un_berat' maxlength="255" value="<?php echo set_value('unclustered_data_un_berat', isset($unclustered_data['un_berat']) ? $unclustered_data['un_berat'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('un_berat'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('un_ukrn_layar') ? 'error' : ''; ?>">
				<?php echo form_label('Ukuran Layar', 'unclustered_data_un_ukrn_layar', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_un_ukrn_layar' type='text' name='unclustered_data_un_ukrn_layar' maxlength="255" value="<?php echo set_value('unclustered_data_un_ukrn_layar', isset($unclustered_data['un_ukrn_layar']) ? $unclustered_data['un_ukrn_layar'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('un_ukrn_layar'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('un_rom') ? 'error' : ''; ?>">
				<?php echo form_label('ROM', 'unclustered_data_un_rom', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_un_rom' type='text' name='unclustered_data_un_rom' maxlength="255" value="<?php echo set_value('unclustered_data_un_rom', isset($unclustered_data['un_rom']) ? $unclustered_data['un_rom'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('un_rom'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('un_ram') ? 'error' : ''; ?>">
				<?php echo form_label('RAM', 'unclustered_data_un_ram', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_un_ram' type='text' name='unclustered_data_un_ram' maxlength="255" value="<?php echo set_value('unclustered_data_un_ram', isset($unclustered_data['un_ram']) ? $unclustered_data['un_ram'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('un_ram'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('un_kec_cpu') ? 'error' : ''; ?>">
				<?php echo form_label('Kecepatan CPU', 'unclustered_data_un_kec_cpu', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_un_kec_cpu' type='text' name='unclustered_data_un_kec_cpu' maxlength="255" value="<?php echo set_value('unclustered_data_un_kec_cpu', isset($unclustered_data['un_kec_cpu']) ? $unclustered_data['un_kec_cpu'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('un_kec_cpu'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('un_kamera_blk') ? 'error' : ''; ?>">
				<?php echo form_label('Kamera Belakang', 'unclustered_data_un_kamera_blk', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_un_kamera_blk' type='text' name='unclustered_data_un_kamera_blk' maxlength="255" value="<?php echo set_value('unclustered_data_un_kamera_blk', isset($unclustered_data['un_kamera_blk']) ? $unclustered_data['un_kamera_blk'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('un_kamera_blk'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('un_os') ? 'error' : ''; ?>">
				<?php echo form_label('Sistem Operasi', 'unclustered_data_un_os', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_un_os' type='text' name='unclustered_data_un_os' maxlength="255" value="<?php echo set_value('unclustered_data_un_os', isset($unclustered_data['un_os']) ? $unclustered_data['un_os'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('un_os'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('un_resolusi') ? 'error' : ''; ?>">
				<?php echo form_label('Resolusi', 'unclustered_data_un_resolusi', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_un_resolusi' type='text' name='unclustered_data_un_resolusi' maxlength="255" value="<?php echo set_value('unclustered_data_un_resolusi', isset($unclustered_data['un_resolusi']) ? $unclustered_data['un_resolusi'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('un_resolusi'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('tipe_baterai') ? 'error' : ''; ?>">
				<?php echo form_label('Tipe Baterai', 'unclustered_data_tipe_baterai', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_tipe_baterai' type='text' name='unclustered_data_tipe_baterai' maxlength="255" value="<?php echo set_value('unclustered_data_tipe_baterai', isset($unclustered_data['tipe_baterai']) ? $unclustered_data['tipe_baterai'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('tipe_baterai'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('kap_baterai') ? 'error' : ''; ?>">
				<?php echo form_label('Kapasitas Baterai', 'unclustered_data_kap_baterai', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='unclustered_data_kap_baterai' type='text' name='unclustered_data_kap_baterai' maxlength="255" value="<?php echo set_value('unclustered_data_kap_baterai', isset($unclustered_data['kap_baterai']) ? $unclustered_data['kap_baterai'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('kap_baterai'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('unclustered_data_action_edit'); ?>"  />
				<?php echo lang('bf_or'); ?>
				<?php echo anchor(SITE_AREA .'/crawler/unclustered_data', lang('unclustered_data_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Unclustered_Data.Crawler.Delete')) : ?>
				or
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('unclustered_data_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('unclustered_data_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>