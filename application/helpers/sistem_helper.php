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