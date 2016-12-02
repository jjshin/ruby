
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">My Account</h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class=" col-md-9 col-lg-9 ">

          <table class="table table-user-information">
            <tbody>
              <tr>
                <td>Full Name</td>
                <td></td>
              </tr>
              <tr>
                <td>E-mail Address</td>
                <td></td>
              </tr>
              <tr>
                <td>Date of Birth</td>
                <td></td>
              </tr>
              <tr>
              <tr>
                <td>Gender</td>
                <td></td>
              </tr>
                <tr>
                <td>Home Address</td>
                <td></td>
              </tr>
                <td>Phone Number</td>
                <td></td>

              </tr>

            </tbody>
          </table>

          <?= $this->Html->link('My Orders', ['action'=>'order'], ['class'=>'btn btn-info']);?>
          <!-- <?= $this->Html->link('Edit My Profile', ['controller'=>'users'],['action'=>'view'], ['class'=>'btn btn-info']);?> -->
        </div>
      </div>
