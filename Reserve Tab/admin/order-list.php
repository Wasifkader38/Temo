<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>


<?php

require('../backends/connection-pdo.php');

$sql = 'SELECT * from reservation';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);



?>
						

<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>Reservations</h3>
	</div>

  <?php

    if (isset($_SESSION['msg'])) {
        echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: red; color: white;">
        <div class="col s12">
            <h6>'.$_SESSION['msg'].'</h6>
            </div>
        </div></div>';
        unset($_SESSION['msg']);
    }

    ?>
	
	<div class="section center" style="padding: 20px;">
		<table class="centered responsive-table">
        <thead>
          <tr>
              <th>User Name</th>
              <th>Food Name</th>
              <th>Quantity</th>
              <th>Date</th>
              <th>Time Zone</th>
              <th>Telephone</th>
              <th>Number of Tables</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php

            foreach ($arr_all as $key) {

          ?>
          <tr>
            <td><?php echo $key['f_name']; ?></td>
            <td><?php echo $key['foodname']; ?></td>
            <td><?php echo $key['quantity']; ?></td>
            <td><?php echo $key['rdate']; ?></td>
            <td><?php echo $key['time_zone']; ?></td>
            <td><?php echo $key['telephone']; ?></td>
            <td><?php echo $key['num_tables']; ?></td>
            <td><a href="../backends/admin/reserve-del.php?id=<?php echo $key['reserv_id']; ?>"><span class="new badge" data-badge-caption="">Delete</span></a></td>
          </tr>

          <?php } ?>
         
        </tbody>
      </table>
	</div>
</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>