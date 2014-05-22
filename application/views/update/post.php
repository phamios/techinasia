<?php // Request webpage

// Load Helpers
$this->load->helper('url');
// Load Models
$this->load->model('Mtopics');
$this->load->model('Mposts');
$this->load->model('Musers');
$this->load->model('Mcurl');
$curl = new Mcurl();
$curl->setCookie(uniqid('dad') . '.txt');

$model_topic = new Mtopics();
$model_post  = new Mposts();
$model_user = new Musers();
$data = $model_topic->listTopics();

foreach ($data as $topic) {
	// Create user
	$user_display_name = $curl->getStr($topic->content, 'rel="author nofollow">', '</a>');
	$user_slug = $curl->getStr($topic->content, '<a href="http://www.techinasia.com/author/', '/"');

	$id_user = $model_user->createUser(array(
		'email' => 'N/A',
		'password' => 'N/A',
		'display_name' => $user_display_name,
		'slug' => $user_slug,
		'image' => 'N/A',
		'description' => 'N/A',
		'website' => 'N/A',
		'status' => 'P',
		'register_time' => '',
		'last_login_time' => ''
	));

	// Create post
	$title = $curl->getStr($topic->content, '<h2 class="loop-post-title"><a href="'.$topic->slug.'" title="', '"');
	$slug = $topic->slug;
	$publish = $curl->getStr($topic->content, '<div class="loop-meta-readmore">', '<a class="loop-readmore');
	$image = $curl->getStr($topic->content, 'src="', '"');
	$description = trim($curl->getStr($topic->content, '<div class="loop-excerpt">', '</div>'));
	$content = trim($curl->getStr($topic->content, '<li><ul class="post-categories">', '</ul></li>'));

	$id = $model_post->createPost(array(
		'user_id' => $id_user,
		'title' => $title,
		'slug' => $slug,
		'description' => $description,
		'content' => $content,
		'publish' => $publish,
		'image' => @$image,
		'status' => 'P'
	));

	if ($id) $model_topic->updateStatus($topic->id);
}

//redirect('/update/content');
?>