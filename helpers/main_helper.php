<?php
function breadcrumb(){
  $CI = &get_instance();
  $t = $CI->uri->segment('1');
  echo "
  <section class='content-header'>
      <h1>
          $t
          <small>Control panel</small>
      </h1>
      <ol class='breadcrumb'>
          <li><a href='#'><i class='fa fa-dashboard'></i> Home </a></li>
          <li class='active'> $t </li>
      </ol>
  </section>
  ";
}

function encrypt($string){
  return md5($string);
}

function amankan($input){
  $CI        = &get_instance();
  $get_input = $CI->input->post($input);
  return htmlspecialchars(strip_tags( $get_input ));
}
function get_induk($data, $table){
  $CI = &get_instance();
  $CI->db->select($data);
  return $CI->db->get($table)->result();
}
