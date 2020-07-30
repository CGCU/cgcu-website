<?php require_once('redirect_if_not_logged_in.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title><?php echo $title ?></title>
</head>
<style>
    pre {
        overflow-x: auto;
        white-space: pre-wrap;
        white-space: -moz-pre-wrap;
        white-space: -pre-wrap;
        white-space: -o-pre-wrap;
        word-wrap: break-word;
        font-family: sans-serif;
    }
</style>
<body>

<div class="container" style="padding-top: 20px">
    <a class="btn btn-danger" href="login.php" role="button" style="float: right; margin-top: 10px; margin-right: 10px">Logout</a>
    <a class="btn btn-primary" href="awards.php" role="button" style="float: right; margin-top: 10px; margin-right: 10px">Index</a>
    <a class="btn btn-secondary" href="awards.php<?php echo $is_index ? "" : "?type=" . $type?>" role="button" style="float: right; margin-top: 10px; margin-right: 10px">Back</a>

    <h1><?php echo $title; ?></h1>
    <?php if(!$is_index):?>
        <h3><?php echo $award_title; ?></h3>
    <?php endif; ?>
</div>

<?php if($is_index): ?>
<div class="container">
    <?php foreach ($nominations[$type] as $key => $items):?>
        <?php $name = $items["nom_name"] ?>
        <a href="awards.php?name=<?php echo $name; ?>&type=<?php echo $type;?>&index=<?php echo $key?>"><?php echo $name?></a><br>
    <?php endforeach; ?>
</div>
<?php else: ?>
<div class="container">
    <p><b>Nominator: </b><?php echo $nominations[$type][$nom_index]['your_name']?></p>
    <p><b>Nominator's club: </b><?php echo $nominations[$type][$nom_index]['club_name']?></>
    <p><b>Further Evidence?: </b><?php echo $nominations[$type][$nom_index]['further_evidence'] ? "Yes": "No" ?></>
    <h2>Nomination:</h2>
    <pre><?php echo $nominations[$type][$nom_index]['nom']?></pre>
</div>
<?php endif; ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>