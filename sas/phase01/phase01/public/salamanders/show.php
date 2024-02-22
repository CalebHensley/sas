<?php require_once('../../private/initialize.php'); 

$id = $_GET['id'] ?? 1;

$pageTitle = 'Salamander Details';
include('../../private/shared/salamander-header.php');
?>

<h2>Salamander Details</h2>
<p>Page ID: <?= h($id); ?></p>
<p><a href="<?= urlFor('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php include('../../private/shared/salamander-footer.php'); ?>