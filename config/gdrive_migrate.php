<?php
// One-time move of existing menu photos to Google Drive.
// Run from the site root: php config/gdrive_migrate.php
// Needs config/gdrive_key.php and the photo files in assets/uploads/products and /catalog.
if (PHP_SAPI !== 'cli') exit;

require __DIR__ . '/db.php';
require __DIR__ . '/gdrive.php';
new db;
if (!gdrive_config()) exit("config/gdrive_key.php is not set up\n");

$tables = ['product' => 'products', 'product_catalog' => 'catalog'];
$finfo = new finfo(FILEINFO_MIME_TYPE);
$cache = []; // same file used twice -> upload once

foreach ($tables as $table => $dir) {
	$rows = mysqli_query(db::$connect, "SELECT id, img FROM `$table` WHERE img <> ''");
	$upd = mysqli_prepare(db::$connect, "UPDATE `$table` SET img = ? WHERE id = ?");

	while ($row = mysqli_fetch_assoc($rows)) {
		$name = $row['img'];
		if (preg_match('/^[\w-]{20,}$/', $name)) continue; // already on Drive

		$path = dirname(__DIR__) . "/assets/uploads/$dir/$name";
		if (!is_file($path)) { echo "missing: $dir/$name\n"; continue; }

		$id = $cache[$path] ?? gdrive_upload($path, $name, $finfo->file($path));
		if (!$id) { echo "failed: $dir/$name\n"; continue; }
		$cache[$path] = $id;

		mysqli_stmt_bind_param($upd, 'si', $id, $row['id']);
		mysqli_stmt_execute($upd);
		echo "ok: $table #{$row['id']} -> $id\n";
	}
}
