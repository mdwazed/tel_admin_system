
<div class="hmenu" style="width:950px;">
<?php
	echo anchor('stat/all_perm', 'All Perm Connection','title="Show List of all perm connection"');
	echo anchor('stat/all_casual', 'All Casual Connection', 'title="Show list of all casual connection"');
	echo anchor('stat/disconn_casual', 'Disconnect Casual Connection', 'title="Disconnect a casual connection"');
	echo anchor('complain/address_complain', 'Complain', 'title="Complain"');
	echo '<br/>' ;
	echo anchor('login/register', 'Add user', 'title="New User"');
	echo anchor('stat/show_users', 'User List', 'title="User"');
	echo anchor('admin_panel/add_unit', 'Add New Unit', 'title="Unit"');
	echo anchor('manage_conn/manage_pending_req', 'Manage Pending Req', 'title="Manage req"');
	echo anchor('', 'New Tel No', 'title="New No"');

?>
</div>