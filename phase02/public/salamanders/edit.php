<?php
require_once('../../private/initialize.php');

$test = $_GET['test'] ?? '';

if($test == '404') {
    error_404();
} elseif($test == '500') {
    error_500();
} elseif($test == 'redirect') {
    redirect_to(url_for('salamanders/create.php'));
}


$page_title = 'Edit Salamander';
include(SHARED_PATH . '/salamander-header.php');
?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject edit">
        <h1>Edit Salamander</h1>

        <form action="" method="post">
            <dl>
                <dt>Salamander Name</dt>
                <dd><input type="text" name="salamander_name" value="" /></dd>
            </dl>
            <dl>
                <dt>ID</dt>
                <dd>
                    <select name="id">
                        <option value="1">1</option>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0" />
                    <input type="checkbox" name="visible" value="1" />
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Salamander" />
            </div>
        </form>
    </div>
</div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
