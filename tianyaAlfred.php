<?php 
require_once('workflows.php');

$query = "{query}";

function getList($url) {
	$wf = new Workflows();
	
	$icon = "icon.png";
	$data = $wf->request($url);
	$data = json_decode($data);

	$int = 1;
	$list = $data->data->list;

	for( $i=0; $i<count($list); $i++) {
  	$item = $list[$i];
 	 
  	$share_url = 'http://bbs.tianya.cn/post-'.$item->categoryId.'-'.$item->noteId.'-1.shtml';
 	$statistics = '点击量：'.$item->clickCount.'    回复量：'.$item->replyCount;
  	$wf->result( $int++.'.'.time(), $share_url , $item->title, $statistics, $icon );
	}

	echo $wf->toxml();
}

switch ($query) {
	case '1':
		{
			getList("http://wireless.tianya.cn/v/forumStand/hotw?pageSize=50&orderBy=1");
		}
		break;
	case '2':
		{
			getList("http://wireless.tianya.cn/v/forumStand/list?categoryId=funinfo&pageSize=50&orderBy=2");
		}
		break;
	case '5':
		{
			getList("http://wireless.tianya.cn/v/forumStand/list?categoryId=worldlook&pageSize=50&orderBy=2");
		}
		break;
	case '4':
		{
			getList("http://wireless.tianya.cn/v/forumStand/list?categoryId=free&pageSize=50&orderBy=2");
		}
		break;
	case '3':
		{
			getList("http://wireless.tianya.cn/v/forumStand/list?categoryId=feeling&pageSize=50&orderBy=2");
		}
		break;
	case '6':
		{
			getList("http://wireless.tianya.cn/v/forumStand/list?categoryId=16&pageSize=50&orderBy=2");
		}
		break;
	case '8':
		{
			getList("http://wireless.tianya.cn/v/forumStand/list?categoryId=develop&pageSize=50&orderBy=2");
		}
		break;
	case '7':
		{
			getList("http://wireless.tianya.cn/v/forumStand/list?categoryId=no04&pageSize=50&orderBy=2");
		}
		break;
		
	default:
		break;
	
}



?>