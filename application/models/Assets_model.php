<?php
class Assets_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_assets_by_item($item_id)
    {
        return $this->db->get_where('assets', ['item_id' => $item_id])->result_array();
    }

    function update_asset_status($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('assets', ['status' => $status]);
    }
}
