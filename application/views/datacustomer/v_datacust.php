<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Data Customer</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Data</a></li>
      <li class="active">Data Customer</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Home Address</th>
                  <th>Office Address</th>
                  <th>Phone Number</th>
                  <th>City</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($cust as $key => $rows) 
                  {
                    echo "<tr>";
                    echo "<td>".$rows['Name']."</td>";
                    echo "<td>".$rows['HomeAddress']."</td>";
                    echo "<td>".$rows['OfficeAddress']."</td>";
                    echo "<td>".$rows['City']."</td>";
                    echo "<td>".$rows['Phone']."</td>";
                    echo "<td>".$rows['Status']."</td>";
                    echo "<td><a href='".base_url('index.php')."/datacust/viewCustomer' value='".$rows['ID']."'><i class='fa fa-search-plus'></i> View</a></td>";
                    echo "</tr>";
                  }
                ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>