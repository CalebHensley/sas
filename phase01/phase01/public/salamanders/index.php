<?php require_once('../../private/initialize.php'); ?>

<?php
$salamanders = [
        ['id' => 1, 'salamanderName' => 'Red-Legged Salamander'],
        ['id' => 2, 'salamanderName' => 'Pigeon Mountain Salamander'],
        ['id' => 3, 'salamanderName' => 'ZigZag Salamander'],
        ['id' => 4, 'salamanderName' => 'Slimy Salamander']
    ];
?>

<?php 
 $pageTitle = "Salamanders";
 include('../../private/shared/salamander-header.php');
 ?>


<h1>Salamanders</h1>

  <a href="#">Create Salamander</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

      <?php foreach($salamanders as $salamander) { ?>
        <tr>
        <td><?php echo $salamander['id']; ?></td>
        <td><?php echo $salamander['salamanderName']; ?></td>
        <td><a href="<?php echo urlFor('show.php?id='.h(u($salamander['id']))); ?>">View</a></td>
        <td><a href="#">Edit</a></td>
        <td><a href="#">Delete</a></td> 
        </tr>
      <?php } ?>
  	</table>
 <!-- <td>Display the salamander id</td> -->
    	    <!-- <td>Display the salamander name</td> -->
          <!-- Use url_for with show.php AND h(u) with the salamander['id'] -->

<?php include('../../private/shared/salamander-footer.php'); ?>
