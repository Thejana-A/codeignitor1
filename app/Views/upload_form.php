<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Form</title>
</head>
<body>

<?php foreach ($errors as $error): ?>
    <li><?= esc($error) ?></li>
<?php endforeach ?>

<?= form_open_multipart('upload/upload') ?>

Image : <input type="file" name="userfile" size="20" /><br />
Title : <input type="text" name="image_title" />
<br /><br />

<input type="submit" value="upload" name="upload" />

</form>

</body>
</html>

