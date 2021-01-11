<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/myIoTsocial.css">

</head>

<?php include 'header.php';?>
<body>

<div class="grid-container">

    <div class="grid-itemDos">
        <button class="botonSocialOpciones">Members</button>
        <button class="botonSocialOpciones">Friends</button>
        <button class="botonSocialOpciones">Messages</button>
        <button class="botonSocialOpciones">Edit profile</button>
    </div>

</div>
<h2 style="padding: 10px">Your messages</h2>

<form method='post' action='messages.php?view=$view'>
    <fieldset data-role="controlgroup" data-type="horizontal">
        <legend>Type here to leave a message</legend>
        <input type='radio' name='pm' id='public' value='0' checked='checked'>
        <label for="public">Public</label>
        <input type='radio' name='pm' id='private' value='1'>
        <label for="private">Private</label>
    </fieldset>
    <textarea name='text'></textarea>
    <input data-transition='slide' type='submit' value='Post Message'>
</form><br>

<p>No messages yet!</p>

</body>
<?php include 'footer.php';?>
</html>

