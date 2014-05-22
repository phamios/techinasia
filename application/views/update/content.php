<?php // Request webpage

// Load Helpers
$this->load->helper('url');
// Load Models
$this->load->model('Mtopics');
$this->load->model('Mposts');
$this->load->model('Mpostcategories');
$this->load->model('Mcategories');
$this->load->model('Mcurl');
$curl = new Mcurl();
$curl->setCookie(uniqid('dad') . '.txt');

$model_post = new Mposts();
$model_category = new Mcategories();
$model_post_category = new Mpostcategories();
$data = $model_post->listPosts(20);
$flag = count($data);

foreach ($data as $post) {
	// Save category
	preg_match_all('/<a href=\"([^\"]*)\" title="(.*)" rel="(.*)">(.*)<\/a>/siU', $post->content, $match);

	foreach ($match[1] as $i => $slug) {
		$categories = $model_category->findBySlug($slug);

		if (empty($categories)) {
			$j = $model_category->createCategory(array(
				'title' => $match[4][$i],
				'slug' => $slug
			));

			if ($j) {
				$j = $model_post_category->createRelation(array(
					'post_id' => $post->id,
					'category_id' => $j,
					'is_primary' => ''
				));
			}
		}
		else {
			foreach ($categories as $category) {
				$j = $model_post_category->createRelation(array(
					'post_id' => $post->id,
					'category_id' => $category->id,
					'is_primary' => ''
				));
			}
		}
	}

	// Save content
	$curl->setUrl($post->slug);
	$curl->setReferer('http://www.techinasia.com/');
	$curl->setOpt();
	$page = $curl->getPage();
	$content = $curl->getStr($page, '<section class="entry-content clearfix" itemprop="articleBody">', '</section> <!-- end article section -->');
	$model_post->updateContent($post->id, $content, 'A');

	// Save image
	/*
	$slug = str_replace(array('http://www.techinasia.com/', '.html'), array('', ''), $post->slug);
	$ext = pathinfo($post->image, PATHINFO_EXTENSION);
	$image = FCPATH . '/images/' . $post->id . '-' . $slug . '.' . $ext;
	file_put_contents($image, file_get_contents($post->image));
	$model_post->updateImage($post->id, $post->id . '-' . $slug . '.' . $ext, 'A');
	*/

	echo 'Done: ' . $post->id . '.<br />';
}

if ($flag == 0) {
	echo 'Finished!';
}
else {
	echo 'Updated ' . $flag . ' posts!';
	echo '<meta http-equiv="refresh" content="1">';
}
?>