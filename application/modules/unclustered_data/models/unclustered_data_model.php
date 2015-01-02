<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Unclustered_data_model extends BF_Model {

	protected $table_name	= "unclustered";
	protected $key			= "un_id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";

	protected $log_user 	= FALSE;

	protected $set_created	= false;
	protected $set_modified = false;

	/*
		Customize the operations of the model without recreating the insert, update,
		etc methods by adding the method names to act as callbacks here.
	 */
	protected $before_insert 	= array();
	protected $after_insert 	= array();
	protected $before_update 	= array();
	protected $after_update 	= array();
	protected $before_find 		= array();
	protected $after_find 		= array();
	protected $before_delete 	= array();
	protected $after_delete 	= array();

	/*
		For performance reasons, you may require your model to NOT return the
		id of the last inserted row as it is a bit of a slow method. This is
		primarily helpful when running big loops over data.
	 */
	protected $return_insert_id 	= TRUE;

	// The default type of element data is returned as.
	protected $return_type 			= "object";

	// Items that are always removed from data arrays prior to
	// any inserts or updates.
	protected $protected_attributes = array();

	/*
		You may need to move certain rules (like required) into the
		$insert_validation_rules array and out of the standard validation array.
		That way it is only required during inserts, not updates which may only
		be updating a portion of the data.
	 */
	protected $validation_rules 		= array(
		array(
			"field"		=> "unclustered_data_un_link",
			"label"		=> "Link",
			"rules"		=> "max_length[255]"
		),
		array(
			"field"		=> "unclustered_data_un_title",
			"label"		=> "Title",
			"rules"		=> "max_length[255]"
		),
		array(
			"field"		=> "unclustered_data_un_merk",
			"label"		=> "Merk",
			"rules"		=> "max_length[255]"
		),
		array(
			"field"		=> "unclustered_data_un_harga",
			"label"		=> "Harga",
			"rules"		=> "max_length[255]"
		),
		array(
			"field"		=> "unclustered_data_un_berat",
			"label"		=> "Berat",
			"rules"		=> "max_length[255]"
		),
		array(
			"field"		=> "unclustered_data_un_ukrn_layar",
			"label"		=> "Ukuran Layar",
			"rules"		=> "max_length[255]"
		),
		array(
			"field"		=> "unclustered_data_un_rom",
			"label"		=> "ROM",
			"rules"		=> "max_length[255]"
		),
		array(
			"field"		=> "unclustered_data_un_ram",
			"label"		=> "RAM",
			"rules"		=> "max_length[255]"
		),
		array(
			"field"		=> "unclustered_data_un_kec_cpu",
			"label"		=> "Kecepatan CPU",
			"rules"		=> "max_length[255]"
		),
		array(
			"field"		=> "unclustered_data_un_kamera_blk",
			"label"		=> "Kamera Belakang",
			"rules"		=> "max_length[255]"
		),
		array(
			"field"		=> "unclustered_data_un_os",
			"label"		=> "Sistem Operasi",
			"rules"		=> "max_length[255]"
		),
		array(
			"field"		=> "unclustered_data_un_resolusi",
			"label"		=> "Resolusi",
			"rules"		=> "max_length[255]"
		),
		array(
			"field"		=> "unclustered_data_tipe_baterai",
			"label"		=> "Tipe Baterai",
			"rules"		=> "max_length[255]"
		),
		array(
			"field"		=> "unclustered_data_kap_baterai",
			"label"		=> "Kapasitas Baterai",
			"rules"		=> "max_length[255]"
		),
	);
	protected $insert_validation_rules 	= array();
	protected $skip_validation 			= FALSE;

	//--------------------------------------------------------------------

}
