
  <div class="table-responsive">
    <table class="table table-bordered" id="datatable" >
      <thead>
        <tr>
          <th>Event</th>
          <th>XTID</th>
          <th>Name</th>
          <th>College</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>Group</th>
          <th>Leader Name</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require '../portal/connectdb.php';
        $eid = $_GET['event_id'];

        if($eid!=0){
          $query = " SELECT *,tbl_student.id as sid FROM tbl_participation INNER JOIN tbl_student ON
          tbl_participation.student_id = tbl_student.id INNER JOIN tbl_event ON
          tbl_participation.event_id = tbl_event.id INNER JOIN tbl_college ON
          tbl_student.college = tbl_college.id WHERE tbl_participation.event_id = :eid";
          $stmt = $conn->prepare($query);
          $stmt->bindParam(':eid',$eid,PDO::PARAM_INT);
        }
        else{
          $query = " SELECT *,tbl_student.id as sid FROM tbl_participation INNER JOIN tbl_student ON
          tbl_participation.student_id = tbl_student.id INNER JOIN tbl_event ON
          tbl_participation.event_id = tbl_event.id INNER JOIN tbl_college ON
          tbl_student.college = tbl_college.id";
          $stmt = $conn->prepare($query);
        }


        if($query_run= $stmt->execute()){
          while($row = $stmt->fetch()){
            if($row['group_event'] == 0){
              $group = "N/A";
              $leaderxtasyid = "N/A";
              $leadername = "N/A";
            }
            else{
              $query = "SELECT * FROM tbl_groups WHERE id = :gr";
              $stmpt = $conn->prepare($query);
              $stmpt->bindParam(':gr',$row['team'],PDO::PARAM_STR);
              $stmpt->execute();
              $row1 = $stmpt->fetch();
              $group = $row1['group_name'];
              //echo $group;
              $leaderid = $row1['leader'];
              //echo $leaderid." ".$row['sid'];
              if($leaderid==$row['sid']){
                $leadername = "Self";
                $leaderxtasyid = "Self";
              }
              else{
                $query = "SELECT * FROM tbl_student WHERE id = :id";
                $st = $conn->prepare($query);
                $st->bindParam(':id',$leaderid,PDO::PARAM_STR);
                $st->execute();
                $row2 = $st->fetch();
                $leadername = $row2['first_name']." ".$row2['last_name'];
                $leaderxtasyid = $row2['xtasy_id'];
              }
            }
        ?>
          <tr>
            <td><?php echo $row['event_name']?></td>
            <td><?php echo $row['xtasy_id']?></td>
            <td><?php echo $row['first_name']." ".$row['last_name']?></td>
            <td><?php echo $row['college_name']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['mobile']?></td>
            <td><?php echo $group?></td>
            <td><?php echo $leadername?></td>
          </tr>
        <?php } }?>
      </tbody>
    </table>
    <script type="text/javascript">
      //Add dataTable Functions
      $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.dataTables();
          $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
          $('.dataTables_length select').addClass('form-control');
      });
    </script>
  </div>
  <div>
    <a href="data.csv">
    <button type="button" class="btn btn-success">Download</button>
    </a>
  </div>
