<?php
// Menu photo upload to Google Drive through an Apps Script web app (see gdrive.gs).
// Settings live in gdrive_key.php (not in git): copy gdrive_key.example.php.

function gdrive_config(): ?array {
	$file = __DIR__ . '/gdrive_key.php';
	if (!is_file($file)) return null;
	$cfg = require $file;
	return (!empty($cfg['url']) && !empty($cfg['secret'])) ? $cfg : null;
}

// Sends one file to Drive. Returns the Drive file id or null.
function gdrive_upload(string $path, string $name, string $mime): ?string {
	$cfg = gdrive_config();
	if (!$cfg) return null;

	$ch = curl_init($cfg['url']);
	curl_setopt_array($ch, [
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => http_build_query([
			'secret' => $cfg['secret'],
			'name' => $name,
			'mime' => $mime,
			'data' => base64_encode(file_get_contents($path)),
		]),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true, // Apps Script answers through a redirect
		CURLOPT_TIMEOUT => 120,
	]);
	$res = json_decode((string) curl_exec($ch), true);
	curl_close($ch);

	$id = $res['id'] ?? '';
	return preg_match('/^[\w-]{20,}$/', $id) ? $id : null;
}

// Handles $_FILES['file'] from the admin form.
// Goes to Drive when it is set up, otherwise saves to $local_dir as before.
function menu_img_upload(string $local_dir): array {
	$fail = ['error' => '<p style="color:red">Файлды жүктей алмады</p>', 'success' => '', 'file' => '', 'url' => ''];
	$file = $_FILES['file'] ?? null;
	if (!$file || !empty($file['error']) || !is_uploaded_file($file['tmp_name'])) return $fail;

	$types = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif'];
	$mime = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);
	if (!isset($types[$mime])) return $fail;

	$base = preg_replace('/[^a-z0-9-]+/i', '-', pathinfo($file['name'], PATHINFO_FILENAME));
	$name = date('Ymd-His') . '-' . trim($base, '-') . '.' . $types[$mime];

	if (gdrive_config()) {
		$id = gdrive_upload($file['tmp_name'], $name, $mime);
		if (!$id) return $fail;
		$saved = $id;
	} else {
		if (!move_uploaded_file($file['tmp_name'], $local_dir . $name)) return $fail;
		$saved = $name;
	}

	$dir = basename(rtrim($local_dir, '/'));
	return ['error' => '', 'success' => '<p style="color: green">Файл жүктелді</p>', 'file' => $saved, 'url' => fun::img($saved, $dir)];
}
