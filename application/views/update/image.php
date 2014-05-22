<?php // Request webpage

// Load Helpers
$this->load->helper('url');
// Load Models
$this->load->model('Mposts');
$this->load->model('Mcurl');
$curl = new Mcurl();
$curl->setCookie(uniqid('dad') . '.txt');

$model_post = new Mposts();
$data = $model_post->listPosts(20);
$flag = count($data);

foreach ($data as $post) {
	// Save image
	$slug = str_replace(array('http://theme123.net/', '.html'), array('', ''), $post->slug);
	$ext = pathinfo($post->image, PATHINFO_EXTENSION);
	$image = FCPATH . '/images/' . $post->id . '-' . $slug . '.' . $ext;
	file_put_contents($image, file_get_contents($post->image));
	$model_post->updateImage($post->id, $post->id . '-' . $slug . '.' . $ext, 'I');

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