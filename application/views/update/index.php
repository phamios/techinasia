<?php // Request webpage

// Load Helpers
$this->load->helper('url');
// Load Models
$this->load->model('Mtopics');
$this->load->model('Mcurl');
$curl = new Mcurl();
$curl->setCookie(uniqid('dad') . '.txt');

$i = $page;
$curl->setUrl('http://www.techinasia.com/page' . $i);
$curl->setReferer('http://www.techinasia.net/');
$curl->setOpt();
$page_content = $curl->getPage();

if (strpos($page_content, '<span class="desktop-recent-post-left">')) {
	// Get post list
	$posts = trim($curl->getStr($page_content, '<span class="desktop-recent-post-left">', '<nav class="page-navigation">'));
	//$posts = trim(preg_replace('/\s+/', ' ', $posts));
	$posts = explode('<div role="article" class="posts-listing">', $posts);

	echo 'Parsing page number: ' . $i . '...<br />';
	$is_next = false;
	foreach ($posts as $post) {
		if (strpos($post, 'href="http://www.techinasia.com/')) {
			$slug = $curl->getStr($post, '<h2 class="loop-post-title"><a href="', '"');
			$model = new Mtopics();
			$id = $model->createTopic(array(
				'content' => $post,
				'slug' => $slug,
				'status' => 'P'
			));

			if ($id) $is_next = true;
		}
	}

	if ($is_next) {
		$i++;
		redirect('/update/index/' . $i, 'refresh');
	}
	else {
		//redirect('/update/post');
		echo 'Done';
	}
}
else {
	//redirect('/update/post');
	echo 'Done';
}
?>