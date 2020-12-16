<?php
$mescols[0]['label']='ville';
$mescols[0]['type']='string';
$mescols[1]['label']='nbspectateurs';
$mescols[1]['type']='number';

$i=0;
foreach ($mesinfos as $info){
    $mesdata[$i]['c']=array(array('v' =>$info->abo_ville),
                            array('v' =>$info->totalresabo));
                   $i++;
}
$final=array('cols' =>$mescols, 'rows' =>$mesdata);

echo json_encode($final, JSON_NUMERIC_CHECK);