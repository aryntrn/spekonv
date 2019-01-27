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


if(!function_exists('ambil_prioritas'))
{
	function ambil_prioritas($beasiswaID,$subkriteriaID)
	{
		$CI=& get_instance();
		$CI->load->library('m_db');
		$s=array(
		'beasiswa_id'=>$beasiswaID,
		'subkriteria_id'=>$subkriteriaID,
		);
		$item=$CI->m_db->get_row('subkriteria_hasil',$s,'prioritas');
		return $item;
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