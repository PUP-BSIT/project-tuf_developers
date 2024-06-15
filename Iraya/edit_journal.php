<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Journal</title>
</head>
<body>
  <button type="button">Back</button>
  <form>
    <div>
      <label for="journal_title">Title</label>
      <input type="text" name="journal_title" id="journal_title" 
          value="<?= $row['journal_title'] ?>">
    </div>
    <div>
    <label for="journal_content">Content</label>
    <textarea name="journal_content" 
        id="journal_content"><?= $row['journal_content'] ?></textarea>
    </div>
  </form>
</body>
</html>