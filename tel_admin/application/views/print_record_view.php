<h4>Tel Admin Proforma<h4>

<table width="200" border="1" cellpadding="2" cellspacing="0" bordercolor="#DEF2F3" bgcolor="#ECFFFF">
  <tr>
    <th scope="row">NO: </th>
    <td><?php echo $iteam[0]->ba_no ?></td>
  </tr>
  <tr>
    <th scope="row">Rank:</th>
    <td><?php echo $iteam[0]->rank ?></td>
  </tr>
  <tr>
    <th scope="row">Name</th>
    <td><?php echo $iteam[0]->name ?></td>
  </tr>
  <tr>
    <th scope="row">Unit</th>
    <td><?php echo $iteam[0]->unit ?></td>
  </tr>
  <tr>
    <th scope="row">Appt</th>
    <td><?php echo $iteam[0]->appt ?></td>
  </tr>
  <tr>
    <th scope="row">Tel No </th>
    <td><?php echo $iteam[0]->tel_no ?></td>
  </tr>
  <tr>
    <th scope="row">Recom By: </th>
    <td><?php echo $iteam[0]->recom_auth ?></td>
  </tr>
  <tr>
    <th scope="row">Approve By: </th>
    <td><?php echo $iteam[0]->app_auth ?></td>
  </tr>
  <tr>
    <th scope="row">Conn Date </th>
    <td><?php 
			
			echo $iteam[0]->conn_date; 
		?></td>
  </tr>
</table>

