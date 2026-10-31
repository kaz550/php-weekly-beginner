<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>タスク管理</title>
<link rel="stylesheet" href="/style.css">
</head>
<body>
<main>
<h1>タスク管理</h1>
<form method="post">
<input type="hidden" name="csrf_token"
 value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
<input type="hidden" name="action" value="add">
<label>タスク名 <input name="title" maxlength="200" required></label>
<button type="submit">追加</button>
</form>
<ul>
<?php foreach ($items as $item): ?>
<li>
<?= htmlspecialchars((string) $item['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>
<form method="post">
<input type="hidden" name="csrf_token"
 value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
<input type="hidden" name="action" value="toggle">
<input type="hidden" name="id" value="<?= (int) $item['id'] ?>">
<input type="hidden" name="done" value="<?= $item['is_done'] ? 0 : 1 ?>">
<button type="submit"><?= $item['is_done'] ? '未完了に戻す' : '完了にする' ?></button>
</form>
<form method="post">
<input type="hidden" name="csrf_token"
 value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
<input type="hidden" name="action" value="delete">
<input type="hidden" name="id" value="<?= (int) $item['id'] ?>">
<button type="submit">削除</button>
</form>
</li>
<?php endforeach; ?>
</ul>
</main>
</body>
</html>
