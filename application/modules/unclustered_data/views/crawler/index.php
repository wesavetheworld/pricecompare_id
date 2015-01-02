<?php

$num_columns	= 15;
$can_delete	= $this->auth->has_permission('Unclustered_Data.Crawler.Delete');
$can_edit		= $this->auth->has_permission('Unclustered_Data.Crawler.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

?>
<div class="admin-box">
	<h3>Unclustered Data</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($can_delete && $has_records) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Link</th>
					<th>Title</th>
					<th>Merk</th>
					<th>Harga</th>
					<th>Berat</th>
					<th>Ukuran Layar</th>
					<th>ROM</th>
					<th>RAM</th>
					<th>Kecepatan CPU</th>
					<th>Kamera Belakang</th>
					<th>Sistem Operasi</th>
					<th>Resolusi</th>
					<th>Tipe Baterai</th>
					<th>Kapasitas Baterai</th>
				</tr>
			</thead>
			<?php if ($has_records) : ?>
			<tfoot>
				<?php if ($can_delete) : ?>
				<tr>
					<td colspan="<?php echo $num_columns; ?>">
						<?php echo lang('bf_with_selected'); ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('unclustered_data_delete_confirm'))); ?>')" />
					</td>
				</tr>
				<?php endif; ?>
			</tfoot>
			<?php endif; ?>
			<tbody>
				<?php
				if ($has_records) :
					foreach ($records as $record) :
				?>
				<tr>
					<?php if ($can_delete) : ?>
					<td class="column-check"><input type="checkbox" name="checked[]" value="<?php echo $record->id; ?>" /></td>
					<?php endif;?>
					
				<?php if ($can_edit) : ?>
					<td><?php echo anchor(SITE_AREA . '/crawler/unclustered_data/edit/' . $record->id, '<span class="icon-pencil"></span>' .  $record->un_link); ?></td>
				<?php else : ?>
					<td><?php e($record->un_link); ?></td>
				<?php endif; ?>
					<td><?php e($record->un_title) ?></td>
					<td><?php e($record->un_merk) ?></td>
					<td><?php e($record->un_harga) ?></td>
					<td><?php e($record->un_berat) ?></td>
					<td><?php e($record->un_ukrn_layar) ?></td>
					<td><?php e($record->un_rom) ?></td>
					<td><?php e($record->un_ram) ?></td>
					<td><?php e($record->un_kec_cpu) ?></td>
					<td><?php e($record->un_kamera_blk) ?></td>
					<td><?php e($record->un_os) ?></td>
					<td><?php e($record->un_resolusi) ?></td>
					<td><?php e($record->tipe_baterai) ?></td>
					<td><?php e($record->kap_baterai) ?></td>
				</tr>
				<?php
					endforeach;
				else:
				?>
				<tr>
					<td colspan="<?php echo $num_columns; ?>">No records found that match your selection.</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>