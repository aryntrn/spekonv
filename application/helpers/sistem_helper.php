<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('set_header_message'))
{
	function set_header_message($tipe,$title,$message)
	{
		$CI=& get_instance();
		
		$CI->session->set_flashdata('message_header',array(
		'tipe'=>$tipe,
		'title'=>$title,
		'message'=>$message,
		));		
	}
}

if(!function_exists('menu_active'))
{
	function menu_active($slug2)
	{
		$CI=& get_instance();
		$s=$CI->uri->segment(2);
		if($slug2==$s)
		{
			return true;
		}else{
			return false;
		}
	}
}

if(!function_exists('ambil_nilai_kriteria'))
{
	function ambil_nilai_kriteria($dari,$tujuan)
	{
		$CI=& get_instance();
		$CI->load->library('m_db');
		$s=array(
		'id_kriteria_asal'=>$dari,
		'id_kriteria_tujuan'=>$tujuan,
		);
		$item=$CI->m_db->get_row('nilai_kriteria',$s,'nilai_prioritas_kriteria');
		return $item;
	}
}

if(!function_exists('ambil_nilai_ratings'))
{
	function ambil_nilai_ratings($dari,$tujuan)
	{
		$CI=& get_instance();
		$CI->load->library('m_db');
		$s=array(
		'id_ratings_asal'=>$dari,
		'id_ratings_tujuan'=>$tujuan,
		);
		$item=$CI->m_db->get_row('nilai_ratings',$s,'kepentingan_ratings');
		return $item;
	}
}

if(!function_exists('prio_ratings'))
{
	function prio_ratings($idam,$idd3,$idkrit)
	{
		$CI=& get_instance();
		$CI->load->library('datatables');

		$CI->db->select('r.priorities_ratings');
        $CI->db->from('sintesis_alternatif as s');
        $CI->db->join('ratings as r','r.id_ratings = s.id_ratings', 'INNER');
        $CI->db->where('r.id_kriteria',$idkrit);
        $CI->db->where('s.id_mk_amikom',$idam);
        $CI->db->where('s.id_mk_asal',$idd3);
        return $CI->db->get('ratings')->row()->priorities_ratings;
	}
}

if(!function_exists('count_baris'))
{
	function count_baris($id)
	{
		$CI=& get_instance();
		$CI->load->library('m_db');
		$s=array(
		'id_mk_amikom'=>$id,
		);
		$item=$CI->m_db->count_data('perhitungan',$s);
		return $item;
	}
}

if(!function_exists('get_tothit'))
{
	function get_tothit($idam,$idd3)
	{
		$CI=& get_instance();
		$CI->load->library('datatables');

		// $CI->db->select('total_hitung_ahp');
  //       $CI->db->from('perhitungan');
        $CI->db->where('id_mk_amikom',$idam);
        $CI->db->where('id_mk_asal',$idd3);
        return $CI->db->get('perhitungan')->row()->total_hitung_ahp;
	}
}

if(!function_exists('hitkonv'))
{
 	function hitkonv($idjur){

 		$CI=& get_instance();
 		// $CI->load->library('datatables');
		$CI->load->model('Kriteria_model');
		$CI->load->model('Sintesis_alternatif_model');
		$CI->load->model('Perhitungan_model');

        $prio = $CI->Kriteria_model->get_all();
        $konv = $CI->Sintesis_alternatif_model->get_by_univ($idjur);

        foreach($konv as $k){
            $sum=0; $subt=0;
            foreach($prio as $p){
                $pk = $p->id_kriteria;
                $pr = prio_ratings($k->id_mk_amikom,$k->id_mk_asal,$p->id_kriteria);
                $subt = $pk*$pr;
                $sum += $subt;
            }
            $data=array(
                'id_mk_amikom'=> $k->id_mk_amikom,
                'id_mk_asal' => $k->id_mk_asal,
                'total_hitung_ahp'=>$sum,
            );
            $id_=$CI->Perhitungan_model->get_id($k->id_mk_amikom,$k->id_mk_asal);
            if(!$id_){
                $CI->Perhitungan_model->insert($data);
            }else{
                $CI->Perhitungan_model->update($id_, $data);
            }
        }
    }
}

if(!function_exists('getdetkonv'))
{
	function getdetkonv($id){
        $this->db->select('p.*,m_as.*,m_am.*');
        $this->db->from('perhitungan as p');
        $this->db->join('mk_kampus_asal as m_as','p.id_mk_asal=m_as.id_mk_asal');
        $this->db->join('mk_amikom as m_am','p.id_mk_amikom=m_am.id_mk_amikom');
        $this->db->join('kampus_asal as k','k.id_jurusan = m_as.id_jurusan');
        $this->db->where('m_as.id_jurusan',$id);
        $this->db->order_by('p.total_hitung_ahp', $this->order);
        $this->db->group_by('p.id_mk_asal');
        return $this->db->get($this->table)->result();
    }
}

if(!function_exists('com_choice'))
{
	function com_choice($type,$name,$data,$firstVal,$att=array(),$ciVal=TRUE,$inline=FALSE)
	{
		if(!empty($data))
		{			
			$o='';			
			foreach($data as $k=>$r)
			{
				$ci='';
				if($ciVal==TRUE)
				{
					if($type="radio")
					{
						$ci=set_radio($name,$r);
					}elseif($type="checkbox"){
						$ci=set_checkbox($name,$r);
					}
				}
				$chk='';
				if($r==$firstVal)
				{
					$chk='checked="checked"';
				}
				$lblcls='';
				$div1='';
				$div2='';
				if($inline==TRUE)
				{					
					$lblcls='class="'.$type.'-inline"';
				}else{
					$div1='<div class="'.$type.'">';
					$div2='</div>';
				}
				$o.=$div1;
				$o.='<label '.$lblcls.'>';
				$o.='<input type="'.$type.'" id="'.$type.'-'.$r.'" name="'.$name.'" '.string_implode_array($att).' '.$chk.' value="'.$r.'" data-id="'.$r.'" '.$ci.'/>';
				$o.=ucwords(str_replace("-"," ",$r));
				$o.='</label>';
				$o.=$div2;
				
			}
			return $o;
		}else{
			return "";
		}
	}
}

if ( ! function_exists('string_implode_array'))
{
	function string_implode_array($attributes)
	{
		if (empty($attributes))
		{
			return '';
		}

		if (is_object($attributes))
		{
			$attributes = (array) $attributes;
		}

		if (is_array($attributes))
		{
			$atts = '';

			foreach ($attributes as $key => $val)
			{
				$atts .= ' '.$key.'="'.$val.'"';
			}

			return $atts;
		}

		if (is_string($attributes))
		{
			return ' '.$attributes;
		}

		return FALSE;
	}
}