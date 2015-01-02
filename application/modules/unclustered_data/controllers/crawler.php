<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * crawler controller
 */
class crawler extends Admin_Controller {
    //--------------------------------------------------------------------

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();

        $this->auth->restrict('Unclustered_Data.Crawler.View');
        $this->load->model('unclustered_data_model', null, true);
        $this->lang->load('unclustered_data');
        $this->load->library('simple_html_dom');

        Template::set_block('sub_nav', 'crawler/_sub_nav');

        Assets::add_module_js('unclustered_data', 'unclustered_data.js');
    }

    //--------------------------------------------------------------------

    /**
     * Displays a list of form data.
     *
     * @return void
     */
    public function index() {

        // Deleting anything?
        if (isset($_POST['delete'])) {
            $checked = $this->input->post('checked');

            if (is_array($checked) && count($checked)) {
                $result = FALSE;
                foreach ($checked as $pid) {
                    $result = $this->unclustered_data_model->delete($pid);
                }

                if ($result) {
                    Template::set_message(count($checked) . ' ' . lang('unclustered_data_delete_success'), 'success');
                } else {
                    Template::set_message(lang('unclustered_data_delete_failure') . $this->unclustered_data_model->error, 'error');
                }
            }
        }

        $records = $this->unclustered_data_model->find_all();

        Template::set('records', $records);
        Template::set('toolbar_title', 'Manage Unclustered Data');
        Template::render();
    }

    //--------------------------------------------------------------------

    /**
     * Creates a Unclustered Data object.
     *
     * @return void
     */
    public function create() {
        $this->auth->restrict('Unclustered_Data.Crawler.Create');

        if (isset($_POST['save'])) {
            if ($insert_id = $this->save_unclustered_data()) {
                // Log the activity
                log_activity($this->current_user->id, lang('unclustered_data_act_create_record') . ': ' . $insert_id . ' : ' . $this->input->ip_address(), 'unclustered_data');

                Template::set_message(lang('unclustered_data_create_success'), 'success');
                redirect(SITE_AREA . '/crawler/unclustered_data');
            } else {
                Template::set_message(lang('unclustered_data_create_failure') . $this->unclustered_data_model->error, 'error');
            }
        }
        Assets::add_module_js('unclustered_data', 'unclustered_data.js');

        Template::set('toolbar_title', lang('unclustered_data_create') . ' Unclustered Data');
        Template::render();
    }

    //--------------------------------------------------------------------

    /**
     * Allows editing of Unclustered Data data.
     *
     * @return void
     */
    public function edit() {
        $id = $this->uri->segment(5);

        if (empty($id)) {
            Template::set_message(lang('unclustered_data_invalid_id'), 'error');
            redirect(SITE_AREA . '/crawler/unclustered_data');
        }

        if (isset($_POST['save'])) {
            $this->auth->restrict('Unclustered_Data.Crawler.Edit');

            if ($this->save_unclustered_data('update', $id)) {
                // Log the activity
                log_activity($this->current_user->id, lang('unclustered_data_act_edit_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'unclustered_data');

                Template::set_message(lang('unclustered_data_edit_success'), 'success');
            } else {
                Template::set_message(lang('unclustered_data_edit_failure') . $this->unclustered_data_model->error, 'error');
            }
        } else if (isset($_POST['delete'])) {
            $this->auth->restrict('Unclustered_Data.Crawler.Delete');

            if ($this->unclustered_data_model->delete($id)) {
                // Log the activity
                log_activity($this->current_user->id, lang('unclustered_data_act_delete_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'unclustered_data');

                Template::set_message(lang('unclustered_data_delete_success'), 'success');

                redirect(SITE_AREA . '/crawler/unclustered_data');
            } else {
                Template::set_message(lang('unclustered_data_delete_failure') . $this->unclustered_data_model->error, 'error');
            }
        }
        Template::set('unclustered_data', $this->unclustered_data_model->find($id));
        Template::set('toolbar_title', lang('unclustered_data_edit') . ' Unclustered Data');
        Template::render();
    }

    //--------------------------------------------------------------------
    //--------------------------------------------------------------------
    // !PRIVATE METHODS
    //--------------------------------------------------------------------

    /**
     * Summary
     *
     * @param String $type Either "insert" or "update"
     * @param Int	 $id	The ID of the record to update, ignored on inserts
     *
     * @return Mixed    An INT id for successful inserts, TRUE for successful updates, else FALSE
     */
    private function save_unclustered_data($type = 'insert', $id = 0) {
        if ($type == 'update') {
            $_POST['id'] = $id;
        }

        // make sure we only pass in the fields we want

        $data = array();
        $data['un_link'] = $this->input->post('unclustered_data_un_link');
        $data['un_title'] = $this->input->post('unclustered_data_un_title');
        $data['un_merk'] = $this->input->post('unclustered_data_un_merk');
        $data['un_harga'] = $this->input->post('unclustered_data_un_harga');
        $data['un_berat'] = $this->input->post('unclustered_data_un_berat');
        $data['un_ukrn_layar'] = $this->input->post('unclustered_data_un_ukrn_layar');
        $data['un_rom'] = $this->input->post('unclustered_data_un_rom');
        $data['un_ram'] = $this->input->post('unclustered_data_un_ram');
        $data['un_kec_cpu'] = $this->input->post('unclustered_data_un_kec_cpu');
        $data['un_kamera_blk'] = $this->input->post('unclustered_data_un_kamera_blk');
        $data['un_os'] = $this->input->post('unclustered_data_un_os');
        $data['un_resolusi'] = $this->input->post('unclustered_data_un_resolusi');
        $data['tipe_baterai'] = $this->input->post('unclustered_data_tipe_baterai');
        $data['kap_baterai'] = $this->input->post('unclustered_data_kap_baterai');

        if ($type == 'insert') {
            $id = $this->unclustered_data_model->insert($data);

            if (is_numeric($id)) {
                $return = $id;
            } else {
                $return = FALSE;
            }
        } elseif ($type == 'update') {
            $return = $this->unclustered_data_model->update($id, $data);
        }

        return $return;
    }

    //--------------------------------------------------------------------

    function get_data($url) {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0');

        $html = curl_exec($curl);

        curl_close($curl);

        $fullpage = new simple_html_dom();
        $fullpage->load($html);

        $data = array();

        if ($html) {
            //input link
            $data['un_link'] = $url;

            //crawl title
            $data['un_title'] = $fullpage->find('#prod_title', 0)->plaintext;

            //crawl merek
            $data['un_merk'] = $fullpage->find('#prod_brand a', 0)->plaintext;

            //crawl spesifikasi
            $table_string = $fullpage->find('table', 0)->outertext;

            $table = new simple_html_dom();
            $table->load($table_string);
            foreach ($table->find('tr') as $tr) {
                $var = $tr->find('td,th', 0);
                $val = $tr->find('td', -1);

                if ($var->plaintext == "Harga") {
                    $data['un_harga'] = $val->plaintext;
                }

                if ($var->plaintext == "Ukuran Layar (in) ") {
                    $data['un_ukrn_layar'] = $val->plaintext;
                }

                if ($var->plaintext == "Resolusi Layar") {
                    $data['un_resolusi'] = $val->plaintext;
                }

                if ($var->plaintext == "Berat (kg)") {
                    $data['un_berat'] = $val->plaintext;
                }

                if ($var->plaintext == "Hard Disk") {
                    $data['un_rom'] = $val->plaintext;
                }

                if ($var->plaintext == "RAM") {
                    $data['un_ram'] = $val->plaintext;
                }

                if ($var->plaintext == "Kecepatan CPU") {
                    $data['un_kec_cpu'] = $val->plaintext;
                }

                if ($var->plaintext == "Megapiksel") {
                    $data['un_kamera_blk'] = $val->plaintext;
                }

                if ($var->plaintext == "Sistem Operasi") {
                    $data['un_os'] = $val->plaintext;
                }

                if ($var->plaintext == "Tipe Baterai") {
                    $data['tipe_baterai'] = $val->plaintext;
                }

                if ($var->plaintext == "Kapasitas Baterai") {
                    $data['kap_baterai'] = $val->plaintext;
                }
            }

            return $data;
        } else {
            return FALSE;
        }
    }

    public function crawl() {
        if ($this->uri->segment(5)) {
            $start_url = "http://www.lazada.co.id/beli-smartphone/?page=".$this->uri->segment(5);
        } else {
            $start_url = "http://www.lazada.co.id/beli-smartphone/?page=5";
        }

        $current_url = $start_url;
        $next_url = $current_url;

        do {
            $current_url = $next_url;

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_URL, $current_url);
            curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0');

            $html = curl_exec($curl);

            curl_close($curl);

            $fullpage = new simple_html_dom();
            $fullpage->load($html);

            foreach ($fullpage->find('.component-product_list a') as $item) {
                $data = $this->get_data($item->href);
                if ($data) {
                    $existing_data = $this->unclustered_data_model->find_by('un_link', $data['un_link']);
                    if ($existing_data) {
                        $this->unclustered_data_model->update($existing_data->un_id, $data);
                    } else {
                        $this->unclustered_data_model->insert($data);
                    }
                } else {
                    $page_num = explode("=",$current_url);
                    $page_num = $page_num[1]++;
                    redirect(SITE_AREA . '/crawler/unclustered_data/crawl/'.$page_num.'');
                }
            }

            $next_url = $fullpage->find('.next_link', 0);
        } while ($current_url != $next_url);
    }

}
